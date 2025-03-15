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

class syntax_plugin_adhoctags_img extends syntax_plugin_adhoctags_abstractblock {

    protected $special_pattern = '<%t%\b[^>\r\n]*?>';
	protected $tag	= 'img';
	
	/* allow link attributes: */
	function allowAttribute(&$name, &$value) {

		switch ($name) {
			case 'src':
				return true; /* allow any URL! */
				break;

			case 'height':
			case 'width':
				return (preg_match('/^\d+$/', trim($value)));
				break;

			case 'crossorigin':
				return in_array($value, array('anonymous','use-credentials'));
				break;

			case 'decoding':
				return in_array($value, array('sync','async','auto'));
				break;

			case 'loading':
				return in_array($value, array('eager','lazy'));
				break;

			case 'referrerpolicy':
				return (preg_match('/^[\w\-]+$/', trim($value)));
				break;

			default:
				return false;
		}
	}

}

