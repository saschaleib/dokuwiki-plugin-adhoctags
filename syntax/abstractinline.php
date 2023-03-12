<?php
/**
 * Div Syntax Component of the adhoctags Plugin
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_abstractinline extends DokuWiki_Syntax_Plugin {

	protected $tag				= 'unknown';
    protected $special_pattern	= '<%t%\b[^>\r\n]*?/>';
    protected $entry_pattern	= '<%t%\b.*?>(?=.*?</%t%>)'; // '%t%' is the placeholder for the tag name
    protected $exit_pattern		= '</%t%>';
	protected $extra_attr		= array(); /* non-standard attributes allowed here */
	protected $enabled			= false; /* will be set by the constructors of instances */
	protected $output_tag		= null; // override the tag name for output

	/* hook to override the registration process, if needed: */
	protected function registerTag() {
		
		$arr = explode(',', $this->getConf('inlineElements'));
		
		return in_array($this->tag, $arr);
	}

    function getType(){ return 'formatting';}
    function getAllowedTypes() { return array('formatting', 'substition', 'disabled'); }
    function getPType(){ return 'normal';}
    function getSort(){ return 196; }
    // override default accepts() method to allow nesting - ie, to get the plugin accepts its own entry syntax
    function accepts($mode) {
        if ($mode == substr(get_class($this), 7)) return true;
        return parent::accepts($mode);
    }

    /**
     * Connect pattern to lexer
     */
    function connectTo($mode) {

		if ($this->registerTag()) {
			if ($this->special_pattern !== '') {
				$this->Lexer->addSpecialPattern(str_replace('%t%', $this->tag, $this->special_pattern),$mode,'plugin_adhoctags_'.$this->getPluginComponent());
			}
			if ($this->entry_pattern !== '') {
				$this->Lexer->addEntryPattern(str_replace('%t%', $this->tag, $this->entry_pattern),$mode,'plugin_adhoctags_'.$this->getPluginComponent());
			}
		}
    }

    function postConnect() {

		if ($this->registerTag()) {
			if ($this->exit_pattern !== '') {
				$this->Lexer->addExitPattern(str_replace('%t%', $this->tag, $this->exit_pattern), 'plugin_adhoctags_'.$this->getPluginComponent());
			}
		}
    }

    /**
     * Handle the match
     */
    function handle($match, $state, $pos, Doku_Handler $handler){
        switch ($state) {
            case DOKU_LEXER_ENTER:
            case DOKU_LEXER_SPECIAL:
                $data = strtolower(trim(substr($match,strpos($match,' '),-1)," \t\n/"));
                return array($state, $data);

            case DOKU_LEXER_UNMATCHED :
                $handler->addCall('cdata', array($match), $pos);
                return false;

            case DOKU_LEXER_EXIT :
                return array($state, '');

        }
        return false;
    }

    /**
     * Create output
     */
    function render($format, Doku_Renderer $renderer, $indata) {
        static $type_stack = array ();

        if (empty($indata)) return false;
        list($state, $data) = $indata;

        if($format == 'xhtml'){
            switch ($state) {
                case DOKU_LEXER_ENTER:
                case DOKU_LEXER_SPECIAL:
                    $wrap = $this->loadHelper('adhoctags', true);
                    $attr = $wrap->buildAttributes($data, $this->extra_attr);

                    $renderer->doc .= '<'.($this->output_tag ? $this->output_tag : $this->tag).$attr.'>';
                    if ($state == DOKU_LEXER_SPECIAL) $renderer->doc .= '</'.($this->output_tag ? $this->output_tag : $this->tag).'>';
                    break;

                case DOKU_LEXER_EXIT:
                    $renderer->doc .= '</'.($this->output_tag ? $this->output_tag : $this->tag).'>';
                    break;
            }
            return true;
        }
        if($format == 'odt'){
            switch ($state) {
                case DOKU_LEXER_ENTER:
                    $wrap = plugin_load('helper', 'adhoctags');
                    array_push ($type_stack, $wrap->renderODTElementOpen($renderer, ($this->output_tag ? $this->output_tag : $this->tag), $data));
                    break;

                case DOKU_LEXER_EXIT:
                    $element = array_pop ($type_stack);
                    $wrap = plugin_load('helper', 'adhoctags');
                    $wrap->renderODTElementClose ($renderer, $element);
                    break;
            }
            return true;
        }
        return false;
    }
}
