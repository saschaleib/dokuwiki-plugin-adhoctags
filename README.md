# DokuWiki Plugin Ad-Hoc Tags
A secure but flexible way to insert HTML tags into DokuWiki

This is a development plugin to experiment with ways to insert HTML tags into DokuWiki pages in a secure but flexible way. Much of the code is taken from the excellent [Wrap Plugin](https://www.dokuwiki.org/plugin:wrap). The reason for this unofficial fork is to make experimentation much easier and hopefully also allow faster turnaround of new features. The end goal is to merge much of the code back into Wrap again and turn this into an "add-on" to Wrap that provides the additional functionalities.

## Attributes

Instead of specifying the attributes in the HTML format, this plugin uses the format from the wrap plugin, which allows to specify the attributes as follows:

`<tag #tagid csswidth :lang &datetime classname classname2>`

- `<tag`– a valid tag name (see below) [required]

- `#tagid` – any valid HTML id, prefixed by a hash (`#`) will be used as the element’s ID.

- `csswidth` – a valid width specification, as used by CSS (examples: `50%`, `24em`, `460px`, etc.).

  Note: This option is still included for compatibility, but it is generally not recommended because it can cause layout issues on smaller screens (e.g. smartphones).

- `:lang` – a colon (`:`), followed by a valid [BCP47](https://www.rfc-editor.org/info/bcp47) language code. Examples: `:en`, `:fr-CH`, `:grc-Latn`, etc. See also: “[Declaring language in HTML](https://www.w3.org/International/questions/qa-html-language-declarations)”.

  Note: this will also set the HTML `dir` attribute: either by setting a language code that has a default RTL script, or by appending a script tag that refers to a RTL script (e.g. `Arab` or `Hebr`).
  
- `&datetime` – an ampersand (`&`), followed by a valid date and/or time, or period specification. Examples: `&2022-12-24T18:00` ([more examples](https://www.w3schools.com/Tags/att_time_datetime.asp)).

  Note: This attribute is only valid for `<time>` elements.

  Note2: for technical reasons, there can be no spaces in this attribute. Please use one of the formats that do not include a space.
  
- `classname` – anything that does not match the criteria above will be treated as a class name.


Generally, attributes can appear in any order are always optional!

## Tags/Elements

The following HTML tags are added by this plugin:

### 1. Inline elements

Inline elements can appear inside a paragraph or other running text.

- `<abbr>` – “[Abbreviation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/abbr)”

- `<b>`– “[Bring Attention To](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/b)” (also known as “bold”)

- `<cite>` – “[Citation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/cite)”

- `<dfn>` – “[Definition ](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dfn)”

- `<i>` – “[Idiomatic Text](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/i)” (also known as “italic”)

- `<kbd>` – “[Keyboard Input](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/kbd)”

- `<q>` – “[Inline Quotation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/q)”

- `<s>` – “[Strikethrough](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/s)”

- `<samp>` – “[Sample Output](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/samp)”

- `<time>` – “[Date/Time](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/time)”

- `<u>` – “[Unarticulated Annotation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/u)” (also known as “underline”)

- `<var>` – “[Variable](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/var)”

### 1. Block-level elements

There are currently no block-level elements defined. These are however planned for the near future.

## Work in Progress

This plugin is still “work in progress” and should not be used in a production environment. Any aspect of it may still change without notice. Feedback and suggestions are of course always welcome!
