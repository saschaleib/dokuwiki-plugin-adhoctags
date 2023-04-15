<?php
/**
 * Date/Time element component for the adhoctags plugin
 *
 * Defines  <time> ... </time> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/time
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_time extends syntax_plugin_adhoctags_abstractinline {

	protected $tag	= 'time';

	/* allow link attributes: */
	function allowAttribute(&$name, &$value) {
		//dbg('<time>:allowAttribute(' . $name . ', "' . $value . '")');

		return ( $name == 'datetime' && preg_match('/^[\w\d\s_+-:]+$/i', $value) );

	}
}