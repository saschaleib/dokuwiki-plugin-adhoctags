<?php
/**
 * Action Component for the Ad-Hoc Tags Plugin
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Andreas Gohr <andi@splitbrain.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class action_plugin_adhoctags extends DokuWiki_Action_Plugin {

	/**
	* register the eventhandlers
	*
	* @author Andreas Gohr <andi@splitbrain.org>
	* @author     Sascha Leib <sascha.leib(at)kolmio.com>
	*/
	function register(Doku_Event_Handler $controller){
		$controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'handle_toolbar', array ());
	}

    function handle_toolbar(Doku_Event $event, $param) {
        $syntaxDiv = $this->getConf('syntaxDiv');
        $syntaxSpan = $this->getConf('syntaxSpan');

        $event->data[] = array (
            'type' => 'picker',
            'title' => "Inline elements",
            'icon' => '../../plugins/adhoctags/images/code-tags.svg',
			'id' => 'tbbtn_adhoctagsInline',
            'list' => array(
                array(
                    'type'   => 'format',
                    'title'  => "Bring Attention To (Bold)",
                    'icon'   => '../../plugins/adhoctags/images/format-bold.svg',
                    'open'   => '<b>',
                    'close'  => '</b>',
					'sample' => 'Bold'
                ),
                array(
                    'type'   => 'format',
                    'title'  => "Idiomatic Text (Italic)",
                    'icon'   => '../../plugins/adhoctags/images/format-italic.svg',
                    'open'   => '<i>',
                    'close'  => '</i>',
					'sample' => 'Italic'
                ),
                array(
                    'type'   => 'format',
                    'title'  => "Strikethrough",
                    'icon'   => '../../plugins/adhoctags/images/format-strikethrough-variant.svg',
                    'open'   => '<s>',
                    'close'  => '</s>',
					'sample' => 'Strikethrough'
                ),
                array(
                    'type'   => 'format',
                    'title'  => "Unarticulated Annotation (Underline)",
                    'icon'   => '../../plugins/adhoctags/images/format-underline-wavy.svg',
                    'open'   => '<u>',
                    'close'  => '</u>',
					'sample' => 'Underline'
                ),
                array(
                    'type'   => 'format',
                    'title'  => "Citation ",
                    'icon'   => '../../plugins/adhoctags/images/comment-quote-outline.svg',
                    'open'   => '<cite>',
                    'close'  => '</cite>',
					'sample' => 'Citation '
                ),
				array(
                    'type'   => 'format',
                    'title'  => "Inline Quotation",
                    'icon'   => '../../plugins/adhoctags/images/format-quote-open.svg',
                    'open'   => '<q>',
                    'close'  => '</q>',
					'sample' => 'Quotation'
                ),
                array(
                    'type'   => 'format',
                    'title'  => "Abbreviation",
                    'icon'   => '../../plugins/adhoctags/images/abbr.svg',
                    'open'   => '<abbr>',
                    'close'  => '</abbr>',
					'sample' => 'ABBR'
                ),
                array(
                    'type'   => 'format',
                    'title'  => "Definition",
                    'icon'   => '../../plugins/adhoctags/images/def.svg',
                    'open'   => '<dfn>',
                    'close'  => '</dfn>',
					'sample' => 'Definition'
                ),
                array(
                    'type'   => 'format',
                    'title'  => "Keyboard Input",
                    'icon'   => '../../plugins/adhoctags/images/keyboard-variant.svg',
                    'open'   => '<kbd>',
                    'close'  => '</kbd>',
					'sample' => 'Ctrl'
                ),
                array(
                    'type'   => 'format',
                    'title'  => "Sample Output",
                    'icon'   => '../../plugins/adhoctags/images/export.svg',
                    'open'   => '<samp>',
                    'close'  => '</samp>',
					'sample' => 'Output'
                ),
                array(
                    'type'   => 'format',
                    'title'  => "Variable",
                    'icon'   => '../../plugins/adhoctags/images/variable.svg',
                    'open'   => '<var>',
                    'close'  => '</var>',
					'sample' => 'x'
                ),
                array(
                    'type'   => 'format',
                    'title'  => "Date/Time",
                    'icon'   => '../../plugins/adhoctags/images/calendar-clock.svg',
                    'open'   => '<time>',
                    'close'  => '</time>',
					'sample' => 'datetime'
                )
            )
        );
        /* $event->data[] = array (
            'type' => 'picker',
            'title' => "Block elements",
            'icon' => '../../plugins/adhoctags/images/code-brackets.svg',
			'id' => 'tbbtn_adhoctagsBlock',
            'list' => array(
				
            )
        ); */
    }
}

