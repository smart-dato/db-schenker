# Changelog

All notable changes to `db-schenker` will be documented in this file.

## 0.1.0 - 2026-09-23

**Breaking:** removed the placeholder `AccessPointRequest`, `BookRequest`, `IncotermRequest`, `PrintRequest`, `ProductRequest`, `ReferenceRequest` and `ServiceProviderRequest` (they only called `GET /example`). `DbSchenker` is now a real client with `save()` and `submit()`, and the facade works.

### What's Changed

* Bump dependabot/fetch-metadata from 3.0.0 to 3.1.0 by @dependabot[bot] in https://github.com/smart-dato/db-schenker/pull/13
* Bump actions/checkout from 6.0.3 to 7.0.1 by @dependabot[bot] in https://github.com/smart-dato/db-schenker/pull/16
* fix(ci): green run-tests, PHPStan and Pint by @michael-tscholl in https://github.com/smart-dato/db-schenker/pull/18
* ci: check code style instead of auto-committing it by @michael-tscholl in https://github.com/smart-dato/db-schenker/pull/19
* ci: commit the changelog through the API so it is signed by @michael-tscholl in https://github.com/smart-dato/db-schenker/pull/20
* docs: update README and fix issues found while documenting by @michael-tscholl in https://github.com/smart-dato/db-schenker/pull/21

**Full Changelog**: https://github.com/smart-dato/db-schenker/compare/0.0.4...0.1.0

## 0.0.3 - 2026-02-10

### What's Changed

* Bump dependabot/fetch-metadata from 2.3.0 to 2.4.0 by @dependabot[bot] in https://github.com/smart-dato/db-schenker/pull/2
* Bump aglipanci/laravel-pint-action from 2.5 to 2.6 by @dependabot[bot] in https://github.com/smart-dato/db-schenker/pull/4
* Bump dependabot/fetch-metadata from 2.4.0 to 2.5.0 by @dependabot[bot] in https://github.com/smart-dato/db-schenker/pull/8

### New Contributors

* @dependabot[bot] made their first contribution in https://github.com/smart-dato/db-schenker/pull/2

**Full Changelog**: https://github.com/smart-dato/db-schenker/compare/0.0.2...0.0.3

## 0.0.2 - 2025-05-07

**Full Changelog**: https://github.com/smart-dato/db-schenker/compare/0.0.1...0.0.2

## 0.0.1 - 2025-05-07

### What's Changed

* Add requests by @nahapet93 in https://github.com/smart-dato/db-schenker/pull/1

### New Contributors

* @nahapet93 made their first contribution in https://github.com/smart-dato/db-schenker/pull/1

**Full Changelog**: https://github.com/smart-dato/db-schenker/commits/0.0.1
