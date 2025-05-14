<?php
/**
 * Figure element component for the adhoctags plugin
 *
 * Defines  <figure> ... </figure> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figure
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_iframe extends syntax_plugin_adhoctags_abstractblock {

	protected $tag	= 'iframe';
	
	/* allow link attributes: */
	function allowAttribute(&$name, &$value) {

		switch ($name) {
			case 'allow':
				return true;

			case 'height':
			case 'width':
				return (preg_match('/^\d+$/', trim($value)));
				break;

			case 'src':
			if ($this->getConf('iFrameExtSrc') == 0) {
				$decodedVal = trim(urldecode($value));
				if (substr($decodedVal, 5) == "http:"
				 || substr($decodedVal, 6) == "https:"
				 || substr($decodedVal, 2) == "//") {
					return false;
				} else {
					return (preg_match("/^[\w\d\-\._~\/\?#\[\]@\!$&'()*+,;=%]+$/", trim($value)));; /* any URL without colon! */
				}
			} else {
				return (preg_match("/^[\w\d\-\._~:\/\?#\[\]@\!$&'()*+,;=%]+$/", trim($value)));; /* allow any URL! */
			}
			break;

			case 'sandbox':
				return (preg_match('/^[\w\-]+$/', trim($value)));
				break;

			case 'name':
				return (preg_match('/^[\w\d_\-]+$/', trim($value)));
				break;

			case 'loading':
				return in_array($value, array('eager','lazy'));
				break;

			case 'referrerpolicy':
				return in_array($value, array('no-referrer','no-referrer-when-downgrade','origin','origin-when-cross-origin','same-origin','strict-origin','strict-origin-when-cross-origin','unsafe-url'));
				break;

			case 'sandbox':
				return (preg_match('/^[\w\-]+$/', trim($value)));
				break;

			default:
				return false;
		}
	}
}