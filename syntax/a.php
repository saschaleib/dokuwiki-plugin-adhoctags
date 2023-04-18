<?php
/**
 * "Anchor" (Link) element component for the adhoctags plugin
 *
 * Defines  <a> ... </a> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/b
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_a extends syntax_plugin_adhoctags_abstractinline {

	protected $tag	= 'a';

	/* allow link attributes: */
	function allowAttribute(&$name, &$value) {
		//dbg('<a>:allowAttribute(' . $name . ', "' . $value . '")');

		switch ($name) {
			case 'href':
			
				if ($this->getConf('allowJSLinks') == '0'
				 && substr($value, 0, 11) === 'javascript:') {
					return false;
				}
				return true;

			case 'rel':
				return (preg_match('/^([\w\d]+ ?)+$/', trim($value)));
				break;

			case 'target':
				return (preg_match('/^[\w\d_-]+$/', trim($value)));
				break;

			case 'hreflang':
				return (preg_match('/^[\w\-]+$/', trim($value)));
				break;

			case 'download':
				return (preg_match('/^[\w\-_\.]+$/', trim($value)));
				break;

				return true;
				break;
			default:
				return false;
		}
	}
    /**
     * ODT Renderer Functions
     */
    function renderODTElementOpen($renderer, $HTMLelement, $data) {
		
		$helper = $this->loadHelper('adhoctags', true);
		$attr = $helper->getAttributes($data);
		$href = ( array_key_exists('href', $attr) ? $attr['href'] : '#' );
		$renderer->externallink($href, '#');
		$renderer->underline_open();
    }
    function renderODTElementClose($renderer, $element) {
		$renderer->underline_close();
    }
}