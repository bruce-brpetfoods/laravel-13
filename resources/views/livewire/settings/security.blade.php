<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Configurações de Segurança') }}</flux:heading>

    <x-settings.layout :heading="__('Atualizar senha')" :subheading="__('Certifique-se de que sua conta utilize uma senha longa e aleatória para manter a segurança.')">
        <form method="POST" wire:submit="updatePassword" class="mt-6 space-y-6">
            <flux:input
                wire:model="current_password"
                :label="__('Senha Atual')"
                type="password"
                required
                autocomplete="current-password"
                viewable
            />
            <flux:input
                wire:model="password"
                :label="__('Nova Senha')"
                type="password"
                required
                autocomplete="new-password"
                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                viewable
            />
            <flux:input
                wire:model="password_confirmation"
                :label="__('Cofirme a Nova Senha')"
                type="password"
                required
                autocomplete="new-password"
                passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                viewable
            />

            <div class="flex items-center gap-4">
                <flux:button variant="primary" type="submit" data-test="update-password-button">{{ __('Salvar') }}</flux:button>
            </div>
        </form>
    </x-settings.layout>
</section>
