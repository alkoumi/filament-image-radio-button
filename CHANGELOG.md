# Changelog

All notable changes to `filament-image-radio-button` will be documented in this file.

## v2.0.0 - 2025-01-20

### Added
- Support for Filament 5.x
- Support for Livewire 4.x
- Support for Laravel 12.x
- Tailwind CSS v4 compatibility
- New `gridColumns()` method to control grid layout (1-6 columns)
- New `getDiskUrl()` method for better performance
- Disabled state support with proper styling
- Keyboard accessibility with focus-visible ring
- Empty state message when no options available
- Lazy loading for images (`loading="lazy"`)
- Proper ARIA attributes for accessibility

### Changed
- Minimum PHP version is now 8.2
- Updated dependencies to support broader version ranges
- Migrated to CSS-based Tailwind configuration (v4)
- Removed deprecated `tailwind.config.js` in favor of CSS `@theme` directive
- **Breaking:** Removed unused Facade class
- **Breaking:** Removed unused `FilamentImageRadioButton` class
- Optimized Blade view - disk URL is now cached outside the loop
- `imageWidth` and `imageHeight` are now actually applied to images
- `animation()` toggle now properly enables/disables hover effects
- Simplified ServiceProvider (removed ~100 lines of dead code)
- Removed unused JavaScript build process
- Improved test coverage with 20+ unit tests

### Fixed
- Performance: Disk URL no longer called for every image in loop
- Images now respect `imageWidth` and `imageHeight` settings
- Animation toggle now properly affects hover/transition effects

### Removed
- Unused `FilamentImageRadioButton` class
- Unused `FilamentImageRadioButton` Facade
- Unused `TestsFilamentImageRadioButton` mixin
- Empty JavaScript build (no JS needed)
- Redundant `HasLabel` trait (already in parent class)
- All commented-out code from ServiceProvider

**Full Changelog**: https://github.com/alkoumi/filament-image-radio-button/compare/v1.1.6...v2.0.0

## v1.1.6 - 2025-07-03

**Full Changelog**: https://github.com/alkoumi/filament-image-radio-button/compare/v1.1.5...v1.1.6

## v1.1.5 - 2025-07-02

**Full Changelog**: https://github.com/alkoumi/filament-image-radio-button/compare/v1.1.4...v1.1.5

## Support Filament v4 - 2025-06-15

Support Filament v4

## v1.1.3 - 2025-03-16

Update the Documentation

## Update Documentation v1.1.3 - 2025-03-16

**Full Changelog**: https://github.com/alkoumi/filament-image-radio-button/compare/v1.1.2...v1.1.3

## v1.1.2 - 2025-03-09

Update the DOCUMENTATION

## v1.1.1 - 2025-03-07

Add RTL & LTR Support

## v1.1.0 - 2025-03-06

The initial Release

## 1.0.0 - 2025-02-01

- initial release to make Radio button image to replacing traditional radio buttons with images selection
