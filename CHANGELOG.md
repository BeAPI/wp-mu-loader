# Changelog

All notable changes to this project are documented in this file. Releases correspond to [GitHub tags](https://github.com/BeAPI/wp-mu-loader/tags).

The format is inspired by [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

## [Unreleased]

## [1.0.4] - 2026-04-07

### Changed

- Update plugin header with BeAPI metadata ([#4](https://github.com/BeAPI/wp-mu-loader/pull/4)).
- Add `CHANGELOG.md` (release history aligned with [GitHub tags](https://github.com/BeAPI/wp-mu-loader/tags)) and link it from the README.

## [1.0.3] - 2016-08-26

### Fixed

- Do not run the loader while WordPress is installing or upgrading (`WP_INSTALLING`) ([#3](https://github.com/BeAPI/wp-mu-loader/pull/3)).
- Fix cache flushing for network admins on multisite.
- Remove case-insensitive flag from plugin discovery for more predictable matching.

### Changed

- Do not wait for MU plugins to be loaded before requiring the bootstrap file for subdirectory plugins.
- Author and package metadata updates.

### Other

- Extra loader improvements from community contributions.

## [1.0.2] - 2015-01-21

### Fixed

- Avoid error messages during installation when database tables are not yet available ([e1fcd9b](https://github.com/BeAPI/wp-mu-loader/commit/e1fcd9b); originally merged from rexblack on the upstream project).

## [1.0.1] - 2014-12-10

### Changed

- README expanded with more installation and usage information.

## [1.0] - 2014-02-06

### Added

- Initial release: load WordPress MU plugins that live in subdirectories of `wp-content/mu-plugins/`.

[Unreleased]: https://github.com/BeAPI/wp-mu-loader/compare/v1.0.4...HEAD
[1.0.4]: https://github.com/BeAPI/wp-mu-loader/compare/v1.0.3...v1.0.4
[1.0.3]: https://github.com/BeAPI/wp-mu-loader/compare/v1.0.2...v1.0.3
[1.0.2]: https://github.com/BeAPI/wp-mu-loader/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/BeAPI/wp-mu-loader/compare/v1.0...v1.0.1
[1.0]: https://github.com/BeAPI/wp-mu-loader/releases/tag/v1.0
