@props([
    'sidebar' => false,
])

@if($sidebar)
    <flux:sidebar.brand :name="config('app.name', 'Brazilian Pet Foods')" {{ $attributes }}>
        <div class="flex aspect-square size-10 items-center justify-center rounded-md">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="size-15 fill-current text-white dark:text-black" />
        </div>
    </flux:sidebar.brand>
@else
    <flux:brand :name="config('app.name', 'Brazilian Pet Foods')" {{ $attributes }}>
        <div class="flex aspect-square size-10 items-center justify-center rounded-md">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="size-15 fill-current text-white dark:text-black" />
        </div>
    </flux:brand>
@endif
