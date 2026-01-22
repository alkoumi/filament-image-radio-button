<?php

namespace Alkoumi\FilamentImageRadioButton;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentImageRadioButtonServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-image-radio-button';

    public static string $viewNamespace = 'filament-image-radio-button';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews(static::$viewNamespace);
    }
}
