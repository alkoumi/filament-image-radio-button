# Filament Image Radio Button

A Filament form component that replaces traditional radio buttons with image selection. Supports RTL and Dark Mode.

[![Total Downloads](https://poser.pugx.org/alkoumi/filament-image-radio-button/downloads)](https://packagist.org/packages/alkoumi/filament-image-radio-button)
![Packagist Stars](https://img.shields.io/packagist/stars/alkoumi/filament-image-radio-button?color=yellow)
[![License](https://poser.pugx.org/alkoumi/filament-image-radio-button/license)](https://packagist.org/packages/alkoumi/filament-image-radio-button)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/alkoumi/filament-image-radio-button.svg)](https://packagist.org/packages/alkoumi/filament-image-radio-button)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/alkoumi/filament-image-radio-button/run-tests.yml?branch=main&label=tests)](https://github.com/alkoumi/filament-image-radio-button/actions?query=workflow%3Arun-tests+branch%3Amain)

![Demo](filament-image-radio-button.gif)

## Requirements

| Version | PHP  | Filament      | Livewire | Laravel          |
|---------|------|---------------|----------|------------------|
| 2.x     | 8.2+ | 3.x, 4.x, 5.x | 3.x, 4.x | 10.x, 11.x, 12.x |
| 1.x     | 8.1+ | 3.x, 4.x      | 3.x      | 10.x, 11.x       |

## Installation

```bash
composer require alkoumi/filament-image-radio-button
```

### Theme Setup (Filament 4+)

1. Create a custom theme: [Filament Docs](https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme)

2. Add the package views to your theme CSS:

```css
@source '../../../../vendor/alkoumi/filament-image-radio-button/resources/views/**/*.blade.php';
```

3. Register the theme in your Panel Provider:

```php
->viteTheme('resources/css/filament/admin/theme.css')
```

4. Build assets:

```bash
npm run build
```

## Usage

### Basic Usage

```php
use Alkoumi\FilamentImageRadioButton\Forms\Components\ImageRadioGroup;

ImageRadioGroup::make('report_id')
    ->disk('reports')
    ->options(fn () => Report::pluck('file', 'id')->toArray())
```

### Full API

```php
use Alkoumi\FilamentImageRadioButton\Forms\Components\ImageRadioGroup;

ImageRadioGroup::make('report_id')
    ->label(__('Report Design'))
    ->required()
    ->disk('reports')                    // Storage disk name
    ->options(fn () => [...])            // Array of [ id => image_path ]
    ->gridColumns(4)                     // Number of columns (default: 3)
    ->live()                             // Enable live updates
```

### Dynamic Options

```php
ImageRadioGroup::make('report_id')
    ->disk('reports')
    ->options(fn (Get $get) => Report::whereType($get('type_id'))->pluck('file', 'id')->toArray())
    ->afterStateUpdated(fn (Get $get, Set $set, ?string $state) =>
        $set('selected_report', Report::find($state))
    )
    ->live()
```

## Configuration

### Storage Disk Setup

Define a disk in `config/filesystems.php`:

```php
'reports' => [
    'driver' => 'local',
    'root' => storage_path('app/public/reports'),
    'url' => env('APP_URL') . '/storage/reports',
    'visibility' => 'public',
],
```

### Options Format

Options must be an array where:

- **Key**: The value to store (e.g., model ID)
- **Value**: The image path relative to the disk

```php
// Example: ['1' => 'storage/template1.jpg', '2' => 'storage/template2.png']
Report::pluck('image_path', 'id')->toArray()
```

## Screenshots

![Modes](filament-plugin-modes.jpg)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mohamed alkoumi](https://github.com/alkoumi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
