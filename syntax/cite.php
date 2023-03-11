<?php
/**
 * Citation element syntax component for the adhoctags plugin
 *
 * Defines  <cite> ... </cite> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/cite
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_cite extends syntax_plugin_adhoctags_abstractinline {

    protected $special_pattern = ''; // (no empty tags!)
    protected $entry_pattern   = '<cite\b.*?>(?=.*?</cite>)';
    protected $exit_pattern    = '</cite>';
	protected $output_tag      = 'cite';
}