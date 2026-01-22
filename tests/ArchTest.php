<?php

arch('it will not use debugging functions')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'print_r'])
    ->each->not->toBeUsed();

arch('component extends Field')
    ->expect('Alkoumi\FilamentImageRadioButton\Forms\Components\ImageRadioGroup')
    ->toExtend('Filament\Forms\Components\Field');

arch('service provider extends PackageServiceProvider')
    ->expect('Alkoumi\FilamentImageRadioButton\FilamentImageRadioButtonServiceProvider')
    ->toExtend('Spatie\LaravelPackageTools\PackageServiceProvider');
