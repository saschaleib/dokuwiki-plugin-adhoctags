<?php
/**
 * List Item element component for the adhoctags plugin
 *
 * Defines  <li> ... </li> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/li
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_li extends syntax_plugin_adhoctags_abstractheadline {

	protected $tag	= 'li';

	/* allow link attributes: */
	function allowAttribute(&$name, &$value) {

		switch ($name) {
			case 'value':
				return (preg_match('/^([\d]+)$/', trim($value)));
				break;

			default:
				return false;
		}
	}


}