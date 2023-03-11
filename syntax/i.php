<?php
/**
 * Idiomatic Text (Italic) component for the adhoctags plugin
 *
 * Defines  <i> ... </i> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/i
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_i extends syntax_plugin_adhoctags_abstractinline {

    protected $special_pattern = ''; // (no empty tags!)
    protected $entry_pattern   = '<i\b.*?>(?=.*?</i>)';
    protected $exit_pattern    = '</i>';
	protected $output_tag      = 'i';
}