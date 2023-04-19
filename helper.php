<?php
/**
 * Helper Component for the Ad Hoc Tags Plugin
 *
 * @license	GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author Anika Henke <anika@selfthinker.org>
 * @author Sascha Leib <sascha.leib(at)kolmio.com>
 */

class helper_plugin_adhoctags extends DokuWiki_Plugin {

	/* list of languages which normally use RTL scripts */
	static protected $rtllangs = array('ar','dv','fa','ha','he','ks','ku','ps','ur','yi','arc');
	/* list of right-to-left scripts (may override the language defaults to rtl) */
	static protected $rtlscripts = array('arab','thaa','hebr','deva','shrd');
	/* selection of left-to-right scripts (may override the language defaults to ltr) */
	static protected $ltrscripts = array('latn','cyrl','grek','cyrs','armn');

	/* Helper plugins should return info about the methods supported. */
	public function getMethods() {
		$result = array();
		$result[] = array(
			'name' => 'buildAttributes',
			'desc' => 'writes out element attributes',
			'params' => array(
				'data' => 'string',
				'custom' => 'array',
				'addClass (optional)' => 'string',
				'mode (optional)' => 'string'
			),
			'return' => array('attributes' => 'array')
		);
		return $result;
	}

	/**
	 * build attributes
	 */
	function buildAttributes($data, $myObj, $addClass='', $mode='xhtml') {

		$attList = $this->getAttributes($data);
		$out = '';
		
		//dbg('attList=' . print_r($attList, true));

		if ($mode=='xhtml') {
			
			foreach($attList as $key => $val) {
				
				switch ($key) {

					/* common HTML attributes (always enabled) */

					case 'id':			/* id */
					case 'class':		/* custom classes */
					case 'title':		/* title */
					case 'lang':		/* language */
					case 'tabindex':	/* tabindex */
					case 'is':			/* is */
					
					/* Microformat attributes */
					case 'itemprop':	/* item property */
					case 'itemscope':	/* item scope */
					case 'itemref':		/* item reference */
					case 'itemid':		/* item id (microformat) */
					
						$out .= ' '.$key. (is_null($val) ? '' : '="'.$val.'"');
						break;

					case 'dir':		/* custom attribute: direction */
										
						if (in_array(strtolower(trim($val)), array('ltr','rtl','auto'))) {
							$out .= ' dir="'. hsc($val).'"';
						}
						break;


					case 'hidden':		/* custom attribute: hidden */
										
						if (in_array(strtolower(trim($val)), array('hidden','until-found'))) {
							$out .= ' hidden="'. hsc($val).'"';
						} else {
							$out .= ' hidden';
						}
						break;

					case 'style':		/* style can be disabled */
						if ($this->getConf('allowStyle') == '1') {
							$out .= ' '.$key.'="'.hsc($val).'"';
						}
						break;

					default:
					
						/* special case: data- attributes: */
						if (preg_match('/^data-[a-z][a-z0-9_-]*$/', $key)) {
							$out .= ' '.$key.'="'.hsc(strtolower($val)).'"';
						}
					
						/* any other attribute: ask the class if it is allowed: */
						
						if ($myObj->allowAttribute($key, $val)) {
							$out .= ' '.$key. (is_null($val) ? '' : '="'.$val.'"');
						}
				}
			}

			// special case: no class name specified, but there is one passed down from a plugin:
			if($addClass !== '' && !isset($attr['class'])) {
				$out .= ' class="'.$addClass.'"';
			}
			
		}

		return $out;
	}

	/**
	 * get attributes (pull apart the string between '<wrap' and '>')
	 *  and identify classes, width, lang and dir
	 *
	 * @author Sascha Leib <sascha.leib(at)kolmio.com>
	 * @author Anika Henke <anika@selfthinker.org>
	 * @author Christopher Smith <chris@jalakai.co.uk>
	 *   (parts taken from http://www.dokuwiki.org/plugin:box)
	 */
	function getAttributes($data) {

		//dbg('getAttributes("$data="' . $data . '"');

		// store the attributes here:
		$attr = array();
		// split up the attributes string (keep quoted and square brackets intact):
		$tokens = $this->tokenizeAttr($data);

		foreach ($tokens as $token) {

			//get language attribute
			if (preg_match('/^:([a-z\-]+)/', $token)) {
				$attr['lang'] = strtolower(trim($token,':'));
				continue;
			}

			//get id (IDs can not start with a number!)
			if (preg_match('/^#([A-Za-z]\w+)/', $token)) {
				$attr['id'] = trim($token,'#');
				continue;
			}

			// get title (any quoted string)
			if (preg_match('/^\"(.*)\"$/', $token)) {
				$attr['title'] = trim($token,'"');
				continue;
			}

			/* custom attributes */
			if (preg_match('/^\[([^\]]+)\]$/', $token)) {
				
				$cAttr = explode('=', trim($token,'[]'), 2);
				//dbg('$token = ' . $token . ', $cAttr = ' . print_r($cAttr, true));
				if ($cAttr) {
					$attr[$cAttr[0]] = ( isset($cAttr[1]) ? $cAttr[1] : null );
				}
				continue;
			}

			//add to list of classes if it matches the pattern for class names:
			if (preg_match('/^[\w\d\-\\_]*$/',$token)) {
				$attr['class'] = (isset($attr['class']) ? $attr['class'].' ' : '') . $token;
			}
		}

		 /* improved RTL detection to make sure it covers more cases: */
		if(!array_key_exists('dir', $attr) && array_key_exists('lang', $attr) && $attr['lang'] !== '') {

			// turn the language code into an array of components:
			$arr = explode('-', $attr['lang']);

			// is the language iso code (first field) in the list of RTL languages?
			$rtl = in_array($arr[0], self::$rtllangs);

			// is there a Script specified somewhere which overrides the text direction?
			$rtl = ($rtl xor (bool) array_intersect( $rtl ? self::$ltrscripts : self::$rtlscripts, $arr));

			$attr['dir'] = ( $rtl ? 'rtl' : 'ltr' );
		}

		return $attr;
	}

	/**
	 * Split the input data into suitable tokens
	 *
	 * @author Sascha Leib <sascha.leib(at)kolmio.com>
	 */
	 function tokenizeAttr($data) {

		$result = array();
		$token = ''; // temporary storage of each item
		$escaped = false; // should the next character be treated "as is"?
		$state = 0; // parser state (0 = default, 1 = in quotation, 2 = in square backets)

		// loop over all characters:
		forEach(str_split($data) as $c) {
			
			switch($c) {
			 case ' ': // Space
			 case '\t': // Horizontal tabulation
			 case '\n': // Newline
			 case '\r': // Carriage return
			
				if (!$escaped && $state == 0) {
					if (trim($token)!==''){array_push($result, $token);}
					$token = '';
				} else {
					$token .= ' ';
					$escaped = false;
				}
				break;

			 case '"': // Quote
				
				if (!$escaped) {
					switch ($state) {
					 case 0:
						if (trim($token)!==''){array_push($result, $token);}
						$state = 1;
						$token = $c;
						break;
						
					 case 1:
						$token .= $c;
						array_push($result, $token);
						$state = 0;
						$token = '';
						break;
				
					 case 2:
						$token .= $c;
						break;
				
					 default:
						// should never happen!
					}
				} else {
					$token .= $c;
					$escaped = false;
				}
				break;

			 case '[': // Opening Square Brackets

				if (!$escaped && $state == 0) {
					
					if (trim($token)!==''){array_push($result, $token);}
					$token = $c;
					$state = 2;				
				
				} else {
					$token .= $c;
				}
				break;

			 case ']': // Opening Square Brackets
			
				if (!$escaped && $state == 2) {
					
					$token .= $c;
					array_push($result, $token);
					$token = '';
					$state = 0;
					
				} else {
					$token .= $c;
					$escaped = false;
				}
				break;

			 case '\\': // Escape character
			
				if (!$escaped) {
					// next character is escaped:
					$escaped = true;
				} else {
					$token .= $c;
					$escaped = false;
				}
				break;

			 default:
				$token .= $c;
				$escaped = false;
			}
		}

		if (trim($token)!=='') {array_push($result, $token);}
		
		return $result;
	 }

	/* Does anyone miss ODT support? */
}