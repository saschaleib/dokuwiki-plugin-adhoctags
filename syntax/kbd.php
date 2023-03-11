<?php
/**
 * Keyboard Input element component for the adhoctags plugin
 *
 * Defines  <kbd> ... </kbd> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/kbd
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_kbd extends syntax_plugin_adhoctags_abstractinline {

    protected $special_pattern = ''; // (no empty tags!)
    protected $entry_pattern   = '<kbd\b.*?>(?=.*?</kbd>)';
    protected $exit_pattern    = '</kbd>';
	protected $output_tag      = 'kbd';
}