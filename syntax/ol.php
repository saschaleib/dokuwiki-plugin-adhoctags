<?php
/**
 * Ordered List element component for the adhoctags plugin
 *
 * Defines  <ol> ... </ol> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/ol
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_ol extends syntax_plugin_adhoctags_abstractblock {

	protected $tag	= 'ol';

	/* allow link attributes: */
	function allowAttribute(&$name, &$value) {

		switch ($name) {
			
			case 'reversed':
				return in_array($value, array('','reversed'));
				break;
			
			case 'start':
				return (preg_match('/^-?([\d]+)$/', trim($value)));
				break;

			case 'type':
				return in_array($value, array('a','A','i','I','1'));
				break;

			default:
				return false;
		}
	}


}