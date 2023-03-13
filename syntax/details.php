<?php
/**
 * Details disclosure element component for the adhoctags plugin
 *
 * Defines  <details> ... </details> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_details extends syntax_plugin_adhoctags_abstractblock {

	protected $tag	= 'details';

	protected $extra_attr	= array('open');

}