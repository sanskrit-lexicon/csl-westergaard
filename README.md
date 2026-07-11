# csl-westergaard

_Created: 14-06-2026 · Last updated: 11-07-2026_

A CDSL **scanned-book** repository in the [Sanskrit Lexicon](https://github.com/sanskrit-lexicon) project: a self-contained web application that displays the scanned pages of **Westergaard's Dhātupāṭha** (the list of Sanskrit verbal roots), so that root entries in the Cologne dictionaries can link straight to the printed source image.

## What it is

The scan is served by a small PHP + JavaScript viewer under [`disp/`](https://github.com/sanskrit-lexicon/csl-westergaard/tree/main/disp):

- [`disp/index.php`](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/disp/index.php) — the viewer page. Deployed under a web root as the folder `Westergaard`, its relative URL is `Westergaard/disp/index.php`.
- [`disp/serveimg.php`](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/disp/serveimg.php) — streams the requested scan image.
- [`disp/transcoder.php`](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/disp/transcoder.php) — Sanskrit transliteration helper for the viewer.
- The frontend uses the bundled [YUI 2.6.0](https://github.com/sanskrit-lexicon/csl-westergaard/tree/main/disp/yui_2.6.0) TreeView plus [`disp/ajax.js`](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/disp/ajax.js) and [`disp/main.js`](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/disp/main.js).

The scanned pages themselves live in [`jpg/`](https://github.com/sanskrit-lexicon/csl-westergaard/tree/main/jpg) (40 `Westergaard_NNNN.jpg` images), inventoried in [`wgfiles.txt`](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/wgfiles.txt).

## Using the viewer

[`disp/index.php`](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/disp/index.php) accepts URL parameters:

- `?section=X` — jump to a section, `X` = 1 … 36.
- `?page=…` — open a specific page.

The Monier-Williams scan displays (e.g. the `MWScan` webtc interfaces at [sanskrit-lexicon.uni-koeln.de](https://www.sanskrit-lexicon.uni-koeln.de/scans/MWScan/2014/web/webtc1/index.php)) link into this viewer for roots such as *yā*, *su*, etc. See [`readme.txt`](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/readme.txt) for the original deployment note.

## History

The application originates from the Cologne project (viewer code dated 2009, localized CSS/JS in December 2014); the Git history in this repository begins with its 2026 migration to GitHub. The first tracked commit hardened [`disp/index.php`](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/disp/index.php) against a reflected-XSS via the `page` parameter ([#3](https://github.com/sanskrit-lexicon/csl-westergaard/pull/3)).

## Issues

This repository follows the [Cologne tooling-repo taxonomy](https://github.com/sanskrit-lexicon/csl-observatory/blob/main/runbook/cologne-tooling-runbook.md): each issue carries exactly one **type** label, one **severity** (`trivial` · `minor` · `major` · `critical`), and one **milestone** (API Stability · User Experience · Data Quality · Developer Experience · Community). Scanned-book domain labels (`domain:ocr`, `domain:image-quality`, `domain:metadata`) scope the work, and the org-wide [Tooling Roadmap](https://github.com/orgs/sanskrit-lexicon/projects/9) tracks it. Repo-specific conventions are in [`CLAUDE.md`](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/CLAUDE.md).

## License

[GNU General Public License v3.0](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/LICENSE), matching [`CITATION.cff`](https://github.com/sanskrit-lexicon/csl-westergaard/blob/main/CITATION.cff).

_Dr. Mārcis Gasūns_
