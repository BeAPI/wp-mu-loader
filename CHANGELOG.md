# Changelog

Notable changes for each release are listed here. Tagged releases match [GitHub tags](https://github.com/BeAPI/wp-mu-loader/tags). Format loosely follows [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

## [Unreleased]

## [1.0.4] - 2026-04-07

Maintenance under BeAPI: clearer docs, automated code-style checks in CI, and small hardening in PHP.

For the full patch, see commit [fc1a475](https://github.com/BeAPI/wp-mu-loader/commit/fc1a4752e391ec872fed78fe02ececb6cd3185f2).

### Added

- Automated checks with **PHPCS** and the **WordPress Coding Standards** on push and pull request (GitHub Actions).
- Local commands **`composer cs`** (check) and **`composer cbf`** (auto-fix) for the same rules.
- This **changelog** file, linked from the README.
- A **`.gitignore`** so Composer’s `vendor` folder (and lockfile, if you choose) stay out of version control by default.

### Changed

- **README** rewritten: what the loader does, how to install with Composer or by hand, and how to ship your own MU plugin.
- **`composer.json`** brought in line with the 1.0.4 release (license, dependencies, BeAPI as maintainer).
- **Plugin headers** updated for BeAPI ([#4](https://github.com/BeAPI/wp-mu-loader/pull/4)).
- **`mu-loader.php`** adjusted to match coding standards and current usage of WordPress APIs (including how subdirectory plugins are listed in the admin).

### Fixed

- If `mu-loader.php` is missing, the admin notice now **escapes the displayed path** so the message is safe to output.

## [1.0.3] - 2016-08-26

### Fixed

- **Install and upgrades:** the loader does nothing while WordPress is installing or updating (`WP_INSTALLING`), so it does not get in the way ([#3](https://github.com/BeAPI/wp-mu-loader/pull/3)).
- **Multisite:** cache flushing works more reliably for network administrators.
- **Discovery:** plugin matching is no longer case-insensitive, so behaviour is easier to predict.

### Changed

- Subdirectory plugins are required without waiting for all MU plugins to finish loading first.
- Author and package metadata updates, plus other small improvements from contributors.

## [1.0.2] - 2015-01-21

### Fixed

- **Fresh installs:** no confusing errors when the database tables are not there yet ([commit e1fcd9b](https://github.com/BeAPI/wp-mu-loader/commit/e1fcd9b); change originally came from the upstream project via rexblack).

## [1.0.1] - 2014-12-10

### Changed

- README gains more detail on installation and usage.

## [1.0] - 2014-02-06

### Added

- First release: load must-use plugins that live in **subfolders** of `wp-content/mu-plugins/`, not only single PHP files at the root.

[Unreleased]: https://github.com/BeAPI/wp-mu-loader/compare/v1.0.4...HEAD
[1.0.4]: https://github.com/BeAPI/wp-mu-loader/compare/v1.0.3...v1.0.4
[1.0.3]: https://github.com/BeAPI/wp-mu-loader/compare/v1.0.2...v1.0.3
[1.0.2]: https://github.com/BeAPI/wp-mu-loader/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/BeAPI/wp-mu-loader/compare/v1.0...v1.0.1
[1.0]: https://github.com/BeAPI/wp-mu-loader/releases/tag/v1.0
