<?php
/**
 * Variable  element component for the adhoctags plugin
 *
 * Defines  <var> ... </var> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/var
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_var extends syntax_plugin_adhoctags_abstractinline {

    protected $special_pattern = ''; // (no empty tags!)
    protected $entry_pattern   = '<var\b.*?>(?=.*?</var>)';
    protected $exit_pattern    = '</var>';
	protected $output_tag      = 'var';
}