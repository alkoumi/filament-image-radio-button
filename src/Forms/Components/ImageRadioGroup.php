<?php

namespace Alkoumi\FilamentImageRadioButton\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Concerns\HasLabel;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class ImageRadioGroup extends Field
{
    use HasLabel;

    protected string $view = 'filament-image-radio-button::forms.components.image-radio-group';

    protected string|Closure|null $diskName = null;

    protected int|Closure|null $imageWidth = 120;

    protected int|Closure|null $imageHeight = 120;

    protected bool|Closure $hasAnimation = true;

    protected array|Closure $options = [];

    public function options(array|Closure $options): static
    {
        $this->options = $options;

        return $this;
    }

    public function getDisk(): Filesystem
    {
        return Storage::disk($this->getDiskName());
    }

    public function disk(string|Closure|null $name): static
    {
        $this->diskName = $name;

        return $this;
    }

    public function getDiskName(): string
    {
        return $this->evaluate($this->diskName) ?? config('filament.default_filesystem_disk');
    }


    public function imageWidth(int|Closure $width): static
    {
        $this->imageWidth = $width;

        return $this;
    }

    public function imageHeight(int|Closure $height): static
    {
        $this->imageHeight = $height;

        return $this;
    }

    public function animation(bool|Closure $hasAnimation = true): static
    {
        $this->hasAnimation = $hasAnimation;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->evaluate($this->options);
    }

    public function getImageWidth(): int
    {
        return $this->evaluate($this->imageWidth);
    }

    public function getImageHeight(): int
    {
        return $this->evaluate($this->imageHeight);
    }

    public function hasAnimation(): bool
    {
        return $this->evaluate($this->hasAnimation);
    }
}
