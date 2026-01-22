@php
    $id = $getId();
    $statePath = $getStatePath();
    $isDisabled = $isDisabled();
    $isRequired = $isRequired();
    $options = $getOptions();
    $diskUrl = $getDiskUrl();
    $imageWidth = $getImageWidth();
    $imageHeight = $getImageHeight();
    $hasAnimation = $hasAnimation();
    $gridColumns = $getGridColumns();
    $hasInlineLabel = $hasInlineLabel();

    $gridColsClass = match ($gridColumns) {
        1 => 'sm:grid-cols-1',
        2 => 'sm:grid-cols-2',
        4 => 'sm:grid-cols-2 md:grid-cols-4',
        5 => 'sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5',
        6 => 'sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6',
        default => 'sm:grid-cols-2 md:grid-cols-3',
    };
@endphp

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <x-slot
        name="label"
        @class([
            'sm:pt-1.5' => $hasInlineLabel,
        ])
    >
        {{ $getLabel() }}
    </x-slot>

    @if (count($options) === 0)
        <div class="text-sm text-gray-500 dark:text-gray-400">
            {{ __('No options available') }}
        </div>
    @else
        <ul
            role="radiogroup"
            aria-labelledby="{{ $id }}-label"
            wire:key="{{ $id }}-options-list"
            @class([
                'grid gap-4 p-2',
                $gridColsClass,
            ])
        >
            @foreach ($options as $value => $image)
                <li
                    wire:key="{{ $id }}-option-{{ $value }}"
                    class="relative"
                >
                    <label
                        @class([
                            'group relative cursor-pointer block',
                            'opacity-50 cursor-not-allowed' => $isDisabled,
                        ])
                    >
                        <input
                            id="{{ $id }}-{{ $value }}"
                            name="{{ $id }}"
                            type="radio"
                            value="{{ $value }}"
                            @disabled($isDisabled)
                            @if ($isRequired)
                                required
                            @endif
                            {{ $applyStateBindingModifiers('wire:model') }}="{{ $statePath }}"
                            class="peer sr-only"
                        />

                        {{-- Image container --}}
                        <div
                            @class([
                                'relative overflow-hidden rounded-2xl',
                                'border-[6px] border-gray-300 dark:border-gray-600',
                                'peer-checked:border-primary-600',
                                'peer-focus-visible:ring-2 peer-focus-visible:ring-primary-600 peer-focus-visible:ring-offset-2',
                                'bg-white dark:bg-gray-950',
                                'shadow-sm peer-checked:shadow-lg peer-checked:shadow-primary-600/25',
                                'transition-all duration-300 ease-out' => $hasAnimation,
                                'hover:shadow-md hover:border-primary-600 dark:hover:border-primary-600' => $hasAnimation && ! $isDisabled,
                            ])
                        >
                            {{-- Selected indicator (corner ribbon) --}}
                            <span
                                @class([
                                    'absolute -top-[75px] z-10',
                                    'rtl:-right-[75px] ltr:-left-[75px]',
                                    'w-[150px] h-[150px]',
                                    'bg-primary-600',
                                    'rtl:rotate-[45deg] ltr:-rotate-[45deg]',
                                    'pointer-events-none',
                                    'opacity-0 group-has-[:checked]:opacity-100',
                                    'transition-opacity duration-300 ease-out' => $hasAnimation,
                                ])
                                aria-hidden="true"
                            ></span>

                            {{-- Checkmark with white circle background --}}
                            <div
                                @class([
                                    'absolute z-20',
                                    'top-2 rtl:right-2 ltr:left-2',
                                    'w-7 h-7 rounded-full',
                                    'bg-white shadow-md',
                                    'flex items-center justify-center',
                                    'opacity-0 scale-75 group-has-[:checked]:opacity-100 group-has-[:checked]:scale-100',
                                    'transition-all duration-300 ease-out' => $hasAnimation,
                                ])
                                aria-hidden="true"
                            >
                                <svg
                                    class="w-4 h-4 text-primary-600"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="3"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                            <img
                                src="{{ $diskUrl }}{{ $image }}"
                                alt="{{ $value }}"
                                loading="lazy"
                                @class([
                                    'w-full h-auto block',
                                    'transition-transform duration-300 ease-out' => $hasAnimation,
                                    'group-hover:scale-[1.02]' => $hasAnimation && ! $isDisabled,
                                ])
                            />
                        </div>
                    </label>
                </li>
            @endforeach
        </ul>
    @endif
</x-dynamic-component>
