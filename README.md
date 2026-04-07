# MU Plugins Subdirectory Loader

WordPress only executes **single PHP files** placed directly in `wp-content/mu-plugins/`. It does **not** load plugins that live in subfolders, unlike normal plugins in `wp-content/plugins/`.

This small must-use (MU) package bridges that gap: it discovers MU plugins that live in **subdirectories**, loads their main bootstrap file, and lists them neatly under the loader entry in **Plugins → Must-Use** in the admin.

## What it does

- Scans `mu-plugins` with WordPress’s own [`get_plugins()`](https://developer.wordpress.org/reference/functions/get_plugins/) so discovery stays aligned with core behaviour.
- Skips loose PHP files at the root of `mu-plugins` and skips the `mu-loader` folder itself, then `require_once`s each detected plugin’s bootstrap file.
- During installation (`WP_INSTALLING`), it does nothing so core install/upgrade is not disturbed.
- In the admin, each loaded subdirectory plugin appears as an indented row under the main MU loader line for easier reading.

## Credits

The project was originally created and published as **`wemakecustom/wp-mu-loader`** by **[WeMakeCustom](https://github.com/wemakecustom)**. BeAPI now maintains this fork as **`beapi/wp-mu-loader`**. Thanks to WeMakeCustom for the original work.

Further background:

- [Original idea (gist)](https://gist.github.com/lavoiesl/6302907) — Sébastien Lavoie  
- [Blog post explaining MU subdirectories](http://blog.lavoie.sl/2013/08/wordpress-mu-plugins-subdirectory-loader.html)

WordPress does not expose hooks on `get_mu_plugins()`, which is why a dedicated loader like this one is still useful.

## Installation

### Composer

Require the package (maintained under the BeAPI vendor name):

```json
{
    "require": {
        "beapi/wp-mu-loader": "^1.0"
    }
}
```

Then run `composer install` so the package is installed under `mu-plugins/mu-loader/` (see `composer.json` `extra.installer-name` in this repo).

### Manual

1. Clone or extract this repository into `wp-content/mu-plugins/mu-loader/`.
2. **Copy or symlink** `mu-require.php` into `wp-content/mu-plugins/` so WordPress loads the loader.  
   Only `mu-require.php` must sit at the root of `mu-plugins`; the rest stays in the `mu-loader` folder.

If `mu-loader/mu-loader.php` is missing (e.g. incomplete install), an admin notice suggests running `composer install`.

## Usage for your own MU plugin

If you ship a must-use plugin that should install into a folder under `mu-plugins`, use Composer’s `wordpress-muplugin` type and optionally set `extra.installer-name`:

```json
{
    "name": "my-vendor/my-plugin",
    "type": "wordpress-muplugin",
    "keywords": ["wordpress", "plugins"],
    "license": "GPL-2.0-or-later",
    "require": {
        "composer/installers": "^1.0 || ^2.0"
    },
    "extra": {
        "installer-name": "my-plugin"
    }
}
```

`extra.installer-name` is optional; use it when you want the directory name under `mu-plugins` to differ from the Composer package name (this repo uses `mu-loader` for `beapi/wp-mu-loader`).

`keywords` and `license` are optional but recommended for published packages.

## Custom install paths

If WordPress is not at the project root, point `composer/installers` to your real `wp-content` paths, for example:

```json
{
    "extra": {
        "installer-paths": {
            "htdocs/wp-content/plugins/{$name}/": ["type:wordpress-plugin"],
            "htdocs/wp-content/mu-plugins/{$name}/": ["type:wordpress-muplugin"],
            "htdocs/wp-content/themes/{$name}/": ["type:wordpress-theme"]
        }
    }
}
```

Adjust the `htdocs/...` segments to match your layout.

## Changelog

Release notes are in [CHANGELOG.md](CHANGELOG.md). Tagged versions are listed on [GitHub](https://github.com/BeAPI/wp-mu-loader/tags).

## License

GPL-2.0-or-later (see `composer.json` and plugin header in `mu-require.php`).
