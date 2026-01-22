<?php

use Alkoumi\FilamentImageRadioButton\Forms\Components\ImageRadioGroup;

it('can be instantiated', function () {
    $component = ImageRadioGroup::make('test');

    expect($component)->toBeInstanceOf(ImageRadioGroup::class);
});

it('can set and get options', function () {
    $options = ['1' => 'image1.jpg', '2' => 'image2.jpg'];

    $component = ImageRadioGroup::make('test')
        ->options($options);

    expect($component->getOptions())->toBe($options);
});

it('can set and get disk name', function () {
    $component = ImageRadioGroup::make('test')
        ->disk('public');

    expect($component->getDiskName())->toBe('public');
});

it('uses default disk when none specified', function () {
    $component = ImageRadioGroup::make('test');

    expect($component->getDiskName())->toBe(config('filament.default_filesystem_disk'));
});

it('can set and get image width', function () {
    $component = ImageRadioGroup::make('test')
        ->imageWidth(200);

    expect($component->getImageWidth())->toBe(200);
});

it('has default image width of 120', function () {
    $component = ImageRadioGroup::make('test');

    expect($component->getImageWidth())->toBe(120);
});

it('can set and get image height', function () {
    $component = ImageRadioGroup::make('test')
        ->imageHeight(150);

    expect($component->getImageHeight())->toBe(150);
});

it('has default image height of 120', function () {
    $component = ImageRadioGroup::make('test');

    expect($component->getImageHeight())->toBe(120);
});

it('can enable animation', function () {
    $component = ImageRadioGroup::make('test')
        ->animation(true);

    expect($component->hasAnimation())->toBeTrue();
});

it('can disable animation', function () {
    $component = ImageRadioGroup::make('test')
        ->animation(false);

    expect($component->hasAnimation())->toBeFalse();
});

it('has animation enabled by default', function () {
    $component = ImageRadioGroup::make('test');

    expect($component->hasAnimation())->toBeTrue();
});

it('can set and get grid columns', function () {
    $component = ImageRadioGroup::make('test')
        ->gridColumns(4);

    expect($component->getGridColumns())->toBe(4);
});

it('has default grid columns of 3', function () {
    $component = ImageRadioGroup::make('test');

    expect($component->getGridColumns())->toBe(3);
});

it('can use closure for options', function () {
    $component = ImageRadioGroup::make('test')
        ->options(fn () => ['1' => 'dynamic.jpg']);

    expect($component->getOptions())->toBe(['1' => 'dynamic.jpg']);
});

it('can use closure for image width', function () {
    $component = ImageRadioGroup::make('test')
        ->imageWidth(fn () => 250);

    expect($component->getImageWidth())->toBe(250);
});

it('can use closure for image height', function () {
    $component = ImageRadioGroup::make('test')
        ->imageHeight(fn () => 180);

    expect($component->getImageHeight())->toBe(180);
});

it('can use closure for animation', function () {
    $component = ImageRadioGroup::make('test')
        ->animation(fn () => false);

    expect($component->hasAnimation())->toBeFalse();
});

it('can use closure for grid columns', function () {
    $component = ImageRadioGroup::make('test')
        ->gridColumns(fn () => 2);

    expect($component->getGridColumns())->toBe(2);
});

it('can chain multiple configuration methods', function () {
    $component = ImageRadioGroup::make('test')
        ->options(['1' => 'test.jpg'])
        ->disk('public')
        ->imageWidth(200)
        ->imageHeight(150)
        ->animation(false)
        ->gridColumns(4);

    expect($component->getOptions())->toBe(['1' => 'test.jpg'])
        ->and($component->getDiskName())->toBe('public')
        ->and($component->getImageWidth())->toBe(200)
        ->and($component->getImageHeight())->toBe(150)
        ->and($component->hasAnimation())->toBeFalse()
        ->and($component->getGridColumns())->toBe(4);
});
