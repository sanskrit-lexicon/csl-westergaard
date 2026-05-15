# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**csl-westergaard** is a self-contained PHP application that displays scanned images of Westergaard's *Dhātupātha* (list of Sanskrit verbal roots). It is linked from the Monier-Williams dictionary display for root entries.

Deployed at: `https://www.sanskrit-lexicon.uni-koeln.de/scans/Westergaard/disp/index.php`

When installed locally under XAMPP, access via: `http://localhost/Westergaard/disp/index.php`

## Architecture

| Directory/File | Purpose |
|---|---|
| `disp/` | PHP web application: `index.php` serves scanned page images, `index_cologne.css`, etc. |
| `jpg/` | Scanned page images of the Westergaard Dhātupātha |
| `wgfiles.txt` | Index of scanned image files |
| `readme.txt` | Installation and usage notes |

### URL parameters

`index.php` accepts `?section=X` where X = 1–36 to jump to a specific section of the Dhātupātha. This parameter is used by the MW dictionary display to link directly to the relevant root section.

## Dependencies

- **PHP** (CLI + Apache/XAMPP)
- Scanned images in `jpg/`
