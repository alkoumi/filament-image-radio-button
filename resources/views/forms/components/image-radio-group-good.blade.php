<x-dynamic-component
    :component="$getFieldWrapperView()"
>
    <ul role="list" class="grid gap-8 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 p-4 relative">
        @foreach ($getOptions() as $value => $image)
            <li class="overflow-hidden relative">
                <label class="relative cursor-pointer block">
                    <input
                        id="{{ $getId() }}-{{ $value }}"
                        name="{{ $getId() }}"
                        type="radio"
                        value="{{ $value }}"
                    {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}"
                    class="rb-image"
                    />
                    <span class="img-radio-selected absolute"></span>
                    <div class="img-radio">
                        <img
                            src="{{ asset($getDisk()->url('')) }}{{ $image }}"
                            alt="{{ $value }}"
                            class="w-full cursor-pointer"
                        />
                    </div>
                </label>
            </li>
        @endforeach
    </ul>
</x-dynamic-component>

<style>
    input[name="{{ $getId() }}"]:checked + .img-radio-selected {
        background-color: rgba(var(--primary-500),var(--tw-bg-opacity));
        transform: rotate(0.8648rad);
        width: 110px;
        height: 60px;
        position: absolute;
        top: -10px;
        right: -40px;
        z-index: 99999;
    }

    input[name="{{ $getId() }}"]:checked ~ .img-radio {
        border: 3px solid rgba(var(--primary-500),var(--tw-bg-opacity));
    }

    .rb-image {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .img-radio {
        border: 1px solid #dee2e6;
        max-width: 100%;
        border-radius: 5px;
        cursor: pointer;
        display: block;
        height: auto;
        margin: auto;
        padding: 5px;
        position: relative;
        width: 100%;
        transition: border 0.2s ease;
    }

    .img-radio:hover img {
        -o-object-position: bottom;
        object-position: bottom;
    }

    .img-radio img {
        height: auto;
        max-height: 500px;
        -o-object-fit: contain;
        object-fit: contain;
        -o-object-position: center;
        object-position: center;
        transform-origin: 50% 50%;
        transition-duration: .1s;
        transition: all 1s ease;
        width: 100%;
    }

    .overflow-hidden {
        overflow: hidden;
    }
</style>
