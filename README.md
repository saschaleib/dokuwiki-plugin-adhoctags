# DokuWiki Plugin Ad-Hoc Tags
A secure but flexible way to insert HTML tags into DokuWiki

This is an attempt to enable direct insertion of HTML tags in DokuWiki that is not reliant on the HTML option, which will not be available any more in the near future.

More information on the [Plugin Page on DokuWiki](https://www.dokuwiki.org/plugin:adhoctags).

## Tags/Elements

The following HTML tags are added by this plugin (in alphabetic order):

- `<abbr>` – “[Abbreviation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/abbr)”

- `<address>` – “[Address](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/address)”

- `<article>` – “[Article](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/article)”

- `<aside>` – “[Aside](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/aside)”

- `<b>` – “[Bring Attention To](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/b)” (also known as “bold”)

- `<bdi>` – “[Bidirectional Isolate](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/bdi)” and `<bdo>` – “[Bidirectional Text Override](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/bdo)” 

- `<cite>` – “[Citation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/cite)”

- `<details>` – “[Details](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details)” and `<summary>` – “[Summary](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/summary)”

- `<dfn>` – “[Definition ](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dfn)”

- `<div>` – “[Generic block](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/div)”

- `<figure>` – “[Figure](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figure)” and `<figcaption>` – “[Figure caption](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figcaption)”

- `<h1>` … `<h6>` – “[Section Heading Elements](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements)”

- `<i>` – “[Idiomatic Text](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/i)” (also known as “italic”)

- `<kbd>` – “[Keyboard Input](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/kbd)”

- `<mark>` — “[Mark text](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/mark)”

- `<pre>` – “[Preformatted Text](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/pre)”

- `<q>` – “[Inline Quotation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/q)”

- `<s>` – “[Strikethrough](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/s)”

- `<samp>` – “[Sample Output](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/samp)”

- `<section>` – “[Section](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/section)”

- `<small>` — “[Side content](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/small)” (smaller)

- `<span>` — “[Content span](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/span)”

- `<time>` – “[Date/Time](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/time)”

- `<u>` – “[Unarticulated Annotation](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/u)” (also known as “underline”)

- `<var>` – “[Variable](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/var)”

## Attributes

Instead of specifying the attributes in the HTML format, this plugin replicates and expands the formats used by the **wrap** plugin, which allows to specify the attributes as in the following example:

`<tagname #tagid csswidth :lang &datetime classname classname2>`

- `#tagid` – any valid HTML id, prefixed by a hash (`#`) will be used as the element’s ID.

- `csswidth` – a valid width specification, as used by CSS (examples: `50%`, `24em`, `460px`, etc.).

  Note: This option is still included for compatibility, but it is generally not recommended because it can cause layout issues on smaller screens (e.g. smartphones).

- `:lang` – a colon (`:`), followed by a valid [BCP47](https://www.rfc-editor.org/info/bcp47) language code. Examples: `:en`, `:fr-CH`, `:grc-Latn`, etc. See also: “[Declaring language in HTML](https://www.w3.org/International/questions/qa-html-language-declarations)”.

  Note: this will also set the HTML `dir` attribute: either by setting a language code that has a default RTL script, or by appending a script tag that refers to a RTL script (e.g. `Arab` or `Hebr`).
  
- `"Title text"` – A string that is enclosed in double quotes will be rendered as `title`.
  
- Testing: `&datetime` – an ampersand (`&`), followed by a valid date and/or time, or period specification. Examples: `&2022-12-24T18:00` ([more examples](https://www.w3schools.com/Tags/att_time_datetime.asp)). (note: this might be changed in one of the comming releases).

  Note: This attribute is only valid for `<time>` elements.

  Note2: for technical reasons, there can be no spaces in this attribute. Please use one of the formats that do not include a space.
  
- `classname` – anything that does not match the criteria above will be treated as a class name.

Generally, attributes can appear in any order and are always optional!

