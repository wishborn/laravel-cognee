# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.1] - 2026-01-16

### Changed
- Switch dependency from `wishborn/php-cognee-sdk` to `wishborn/alt-php-cognee-sdk`
  (independently publishable package, not a GitHub fork)

## [0.1.0] - 2026-01-16

### Added
- Initial release
- `CogneeServiceProvider` - Binds CogneeManager as singleton, publishes config
- `CogneeManager` - Wraps php-cognee-sdk client with Laravel-friendly API
- `Cognee` Facade - Static access to `datasets()`, `search()`, `health()`, `client()`
- Configuration file (`config/cognee.php`) with `base_url`, `api_key`, `timeout`, `retry_attempts`
- Support for Laravel 11.x and 12.x
- Unit tests for config loading and service provider bindings

### Dependencies
- Requires `wishborn/alt-php-cognee-sdk` ^0.1 (Cognee v0.5.1 compatible)
