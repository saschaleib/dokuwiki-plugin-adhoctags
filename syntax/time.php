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

    protected $special_pattern = ''; // (no empty tags!)
    protected $entry_pattern   = '<time\b.*?>(?=.*?</time>)';
    protected $exit_pattern    = '</time>';
	protected $output_tag      = 'time';
	protected $extra_attr      = array('datetime');
}