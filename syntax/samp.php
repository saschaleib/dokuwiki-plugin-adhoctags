<?php
/**
 * Sample Output element component for the wrap plugin
 *
 * Defines  <samp> ... </samp> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/samp
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_samp extends syntax_plugin_adhoctags_abstractinline {

    protected $special_pattern = ''; // (no empty tags!)
    protected $entry_pattern   = '<samp\b.*?>(?=.*?</samp>)';
    protected $exit_pattern    = '</samp>';
	protected $output_tag      = 'samp';
}