<?php
/**
 * Definition element syntax component for the adhoctags plugin
 *
 * Defines  <dfn> ... </dfn> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dfn
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_dfn extends syntax_plugin_adhoctags_abstractinline {

    protected $special_pattern = ''; // (no empty tags!)
    protected $entry_pattern   = '<dfn\b.*?>(?=.*?</dfn>)';
    protected $exit_pattern    = '</dfn>';
	protected $output_tag      = 'dfn';
}