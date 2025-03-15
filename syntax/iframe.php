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
				return true; /* allow any URL! */
				break;

			case 'sandbox':
			case 'referrerpolicy':
				return (preg_match('/^[\w\-]+$/', trim($value)));
				break;
				
			case 'name':
			case 'referrerpolicy':
				return (preg_match('/^[\w\d_\-]+$/', trim($value)));
				break;

			case 'loading':
				return in_array($value, array('eager','lazy'));
				break;

			default:
				return false;
		}
	}

}

