<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Configurações de Tema') }}</flux:heading>

    <x-settings.layout :heading="__('Tema')" :subheading=" __('Atualize as configurações de aparência da sua conta.')">
        <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
            <flux:radio value="light" icon="sun">{{ __('Claro') }}</flux:radio>
            <flux:radio value="dark" icon="moon">{{ __('Escuro') }}</flux:radio>
            <flux:radio value="system" icon="computer-desktop">{{ __('Padrão do Sistema') }}</flux:radio>
        </flux:radio.group>
    </x-settings.layout>
</section>
