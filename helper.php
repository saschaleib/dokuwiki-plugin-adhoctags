<?php
/**
 * Helper Component for the Wrap Plugin
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class helper_plugin_adhoctags extends DokuWiki_Plugin {
    static protected $boxes = array ('wrap_box', 'wrap_danger', 'wrap_warning', 'wrap_caution',
									 'wrap_notice', 'wrap_safety', 'wrap_info', 'wrap_important',
									 'wrap_alert', 'wrap_tip', 'wrap_help', 'wrap_todo',
									 'wrap_download', 'wrap_hi', 'wrap_spoiler');
    static protected $paragraphs = array ('wrap_leftalign', 'wrap_rightalign', 'wrap_centeralign',
									 'wrap_justify');

	/* list of languages which normally use RTL scripts */
	static protected $rtllangs = array('ar','dv','fa','ha','he','ks','ku','ps','ur','yi','arc');
	/* list of right-to-left scripts (may override the language defaults to rtl) */
	static protected $rtlscripts = array('arab','thaa','hebr','deva','shrd');
	/* selection of left-to-right scripts (may override the language defaults to ltr) */
	static protected $ltrscripts = array('latn','cyrl','grek','cyrs','armn');

    static $box_left_pos = 0;
    static $box_right_pos = 0;
    static $box_first = true;
    static $table_entr = 0;

    protected $column_count = 0;

	/* Helper plugins should return info about the methods supported. */
	public function getMethods() {
		$result = array();
		$result[] = array(
			'name' => 'getAttributes',
			'desc' => 'parses the tag attributes',
			'params' => array(
				'data' => 'string',
				'useNoPrefix (optional)' => 'boolean'
			),
			'return' => array('attributes' => 'array')
		);
		$result[] = array(
				'name' => 'buildAttributes',
			'desc' => 'writes out element attributes',
			'params' => array(
				'data' => 'string',
				'addClass (optional)' => 'string',
				'mode (optional)' => 'string'
			),
			'return' => array('attributes' => 'array')
		);
		return $result;
	}

    /**
     * get attributes (pull apart the string between '<wrap' and '>')
     *  and identify classes, width, lang and dir
     *
     * @author Anika Henke <anika@selfthinker.org>
     * @author Christopher Smith <chris@jalakai.co.uk>
     *   (parts taken from http://www.dokuwiki.org/plugin:box)
     */
    function getAttributes($data, $custom, $useNoPrefix=true) {

        $attr = array(
            'lang' => null,
            'class' => null,
            'width' => null,
            'id' => null,
            'dir' => null
        );
        $tokens = preg_split('/\s+/', $data, 9);

        // anonymous function to convert inclusive comma separated items to regex pattern
        $pattern = function ($csv) {
            return '/^(?:'. str_replace(['?','*',' ',','],
                                        ['.','.*','','|'], $csv) .')$/';
        };

        // noPrefix: comma separated class names that should be excluded from
        //   being prefixed with "wrap_",
        //   each item may contain wildcard (*, ?)
        $noPrefix = '*'; //($this->getConf('noPrefix') && $useNoPrefix) ? $pattern($this->getConf('noPrefix')) : '';

        // restrictedClasses : comma separated class names that should be checked
        //   based on restriction type (whitelist or blacklist),
        //   each item may contain wildcard (*, ?)
        $restrictedClasses = ($this->getConf('restrictedClasses')) ?
                            $pattern($this->getConf('restrictedClasses')) : '';
        $restrictionType = $this->getConf('restrictionType');

        foreach ($tokens as $token) {

            //get width
            if (preg_match('/^\d*\.?\d+(%|px|em|rem|ex|ch|vw|vh|pt|pc|cm|mm|in)$/', $token)) {
                $attr['width'] = $token;
                continue;
            }

            //get lang
            if (preg_match('/:([a-z\-]+)/', $token)) {
                $attr['lang'] = trim($token,':');
                continue;
            }

            //get id
            if (preg_match('/#([A-Za-z0-9_-]+)/', $token)) {
                $attr['id'] = trim($token,'#');
                continue;
            }

			/* custom attributes */
			//find datetime 
            if (in_array('datetime', $custom) && preg_match('/\&([A-Za-z0-9\-\+\:\.]+)/', $token)) {

				$attr['datetime'] = strtoupper(substr($token,1));
				//dbg('datetime: ' . $attr['datetime']));
				continue;
			}

            //get classes
            //restrict token (class names) characters to prevent any malicious data
            if (preg_match('/[^A-Za-z0-9_-]/',$token)) continue;
            if ($restrictedClasses) {
                $classIsInList = preg_match($restrictedClasses, $token);
                // either allow only certain classes or disallow certain classes
                if ($restrictionType xor $classIsInList) continue;
            }
            // prefix adjustment of class name
            $prefix = (preg_match($noPrefix, $token)) ? '' : 'wrap_';
            $attr['class'] = (isset($attr['class']) ? $attr['class'].' ' : '').$prefix.$token;

        }
        /*if ($this->getConf('darkTpl')) {
            $attr['class'] = (isset($attr['class']) ? $attr['class'].' ' : '').'wrap__dark';
        }*/
        /*if ($this->getConf('emulatedHeadings')) {
            $attr['class'] = (isset($attr['class']) ? $attr['class'].' ' : '').'wrap__emuhead';
        }*/

         /* improved RTL detection to make sure it covers more cases: */
		if($attr['lang'] && $attr['lang'] !== '') {

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
     * build attributes (write out classes, width, lang and dir)
     */
    function buildAttributes($data, $custom, $addClass='', $mode='xhtml') {

        $attr = $this->getAttributes($data, $custom);
        $out = '';

        if ($mode=='xhtml') {
            if($attr['class']) {
				$out .= ' class="'.hsc($attr['class']).' '.$addClass.'"';
			}
            // if used in other plugins, they might want to add their own class(es)
            elseif($addClass) {
				$out .= ' class="'.$addClass.'"';
			}
            if($attr['id']) {
				$out .= ' id="'.hsc($attr['id']).'"';
			}
            // width on spans normally doesn't make much sense, but in the case of floating elements it could be used
            if($attr['width']) {
                if (strpos($attr['width'],'%') !== false) {
                    $out .= ' style="width: '.hsc($attr['width']).';"';
                } else {
                    // anything but % should be 100% when the screen gets smaller
                    $out .= ' style="width: '.hsc($attr['width']).'; max-width: 100%;"';
                }
            }
            // write out the language and direction attribute:
			// (xml:lang is no longer required in HTML5)
            if($attr['lang']) {
				$out .= ' lang="'.$attr['lang'].'"';
			}
			// dir should be separated from lang:
            if($attr['dir']) {
				$out .= ' dir="'.$attr['dir'].'"';
			}

			// the attribute 'datetime' is only valid for specific tags:
            if(array_key_exists('datetime', $attr)) { 
				$out .= ' datetime="'.$attr['datetime'].'"';
			}

        }

        return $out;
    }
	
	/* ODT Functions removed */
}
