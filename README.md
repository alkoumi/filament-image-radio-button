# This is Filament Form Radio Button But With Images 💁 🎉
# RTL & Dark Mode Supported 🎉

[![Total Downloads](https://poser.pugx.org/alkoumi/filament-image-radio-button/downloads)](https://packagist.org/packages/alkoumi/filament-image-radio-button)
![Packagist Stars](https://img.shields.io/packagist/stars/alkoumi/filament-image-radio-button?color=yellow)
[![License](https://poser.pugx.org/alkoumi/filament-image-radio-button/license)](https://packagist.org/packages/alkoumi/filament-image-radio-button)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/alkoumi/filament-image-radio-button.svg)](https://packagist.org/packages/alkoumi/filament-image-radio-button)
![GitHub release (latest by date)](https://img.shields.io/github/v/release/alkoumi/filament-image-radio-button)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/alkoumi/filament-image-radio-button/run-tests.yml?branch=main&label=tests)](https://github.com/alkoumi/filament-image-radio-button/actions?query=workflow%3Arun-tests+branch%3Amain)

If you want Filament field to choose and select an Image from a group of images with a Radio button
This is Image Radio button to replacing traditional radio buttons with images selection.

##

![filament-image-radio-button.gif](stubs/filament-image-radio-button.gif)

## Installation

You can install the package via composer:

```bash
composer require alkoumi/filament-image-radio-button
```

# Important
### 1- OPTIONS
The radio buttom has options then the scenario Here is you have 
Model `Report` and you want to choose a design of a report 

so options here must return `return Report::pluck('file', 'id')->toArray();` 
the options will be like 

`[ 1 => reort1.jpg , 2 => reort2.jpg]`
then the user will choose the design.

### 2- Images
You must define where you stored the images in `filesystems` disks 
somthing like `local` or `public` so in this example I am using `->disk('reports')` 
So the component can find the images files

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            'serve' => true,
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        'reports' => [
            'driver' => 'local',
            'root' => storage_path('app/public/reports'),
            'url' => env('APP_URL') . '/reports',
            'visibility' => 'public',
            'throw' => false,
        ],

## Usage in basic scenario
```php
use Alkoumi\FilamentImageRadioButton\Forms\Components\ImageRadioGroup;

ImageRadioGroup::make('report_id')
                    ->disk('reports')
                    ->options(fn () => Report::pluck('file', 'id')->toArray()),
```

## Usage in advanced scenario

```php
use Alkoumi\FilamentImageRadioButton\Forms\Components\ImageRadioGroup;

ImageRadioGroup::make('report_id')
                    ->animation(true)
                    ->required()
                    ->label(__('Report Design'))
                    ->disk('reports')
                    ->options(fn (Get $get) => Report::whereType($get('type_id'))->pluck('file', 'id')->toArray())
                    ->afterStateUpdated(fn(Get $get, Set $set, ?string $state) => $set('reportdesign', ['report' => Report::find($state), 'date' => explode(' ', $get('report_date'))[0]])) 
                    ->live(),
```
## Screenshots
![filament-plugin-modes.jpg](stubs/filament-plugin-modes.jpg)

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
