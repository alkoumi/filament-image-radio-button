<?php

namespace Alkoumi\FilamentImageRadioButton\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class ImageRadioGroup extends Field
{
    protected string $view = 'filament-image-radio-button::forms.components.image-radio-group';

    protected string|Closure|null $diskName = null;

    protected int|Closure $imageWidth = 120;

    protected int|Closure $imageHeight = 120;

    protected bool|Closure $hasAnimation = true;

    protected array|Closure $options = [];

    protected int|Closure $gridColumns = 3;

    public function options(array|Closure $options): static
    {
        $this->options = $options;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->evaluate($this->options);
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

    public function getDisk(): Filesystem
    {
        return Storage::disk($this->getDiskName());
    }

    /**
     * Get the base URL for the disk (cached for performance).
     */
    public function getDiskUrl(): string
    {
        return $this->getDisk()->url('');
    }

    public function imageWidth(int|Closure $width): static
    {
        $this->imageWidth = $width;

        return $this;
    }

    public function getImageWidth(): int
    {
        return $this->evaluate($this->imageWidth);
    }

    public function imageHeight(int|Closure $height): static
    {
        $this->imageHeight = $height;

        return $this;
    }

    public function getImageHeight(): int
    {
        return $this->evaluate($this->imageHeight);
    }

    public function animation(bool|Closure $hasAnimation = true): static
    {
        $this->hasAnimation = $hasAnimation;

        return $this;
    }

    public function hasAnimation(): bool
    {
        return $this->evaluate($this->hasAnimation);
    }

    public function gridColumns(int|Closure $columns): static
    {
        $this->gridColumns = $columns;

        return $this;
    }

    public function getGridColumns(): int
    {
        return $this->evaluate($this->gridColumns);
    }
}
