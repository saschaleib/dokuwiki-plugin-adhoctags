<?php
/**
 * Span element component for the adhoctags plugin
 *
 * Defines  <span> ... </span> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/span
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_span extends syntax_plugin_adhoctags_abstractinline {

    protected $special_pattern = '<span\b[^>\r\n]*?/>';
    protected $entry_pattern   = '<span\b.*?>(?=.*?</span>)';
    protected $exit_pattern    = '</span>';
	protected $output_tag      = 'span';

	/* the <span> tag can be disabled in the settings! */
	protected function registerTag() {
		return (bool) $this->getConf('handleSpan');
	}

}