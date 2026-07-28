<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Configurações do Perfil') }}</flux:heading>

    <x-settings.layout :heading="__('Pefil')" :subheading="__('Atualize as informações do seu perfil.')">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" :label="__('Nome')" type="text" required autofocus autocomplete="name" />

            <div>
                <flux:input wire:model="email" :label="__('E-mail')" type="email" required autocomplete="email" />

                @if ($this->hasUnverifiedEmail)
                    <div>
                        <flux:text class="mt-4">
                            {{ __('Seu e-mail não foi verificado') }}

                            <flux:link class="text-sm cursor-pointer" wire:click.prevent="resendVerificationNotification">
                                {{ __('Clique aqui para reenviar a verificação') }}
                            </flux:link>
                        </flux:text>    

                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4">
                <flux:button variant="primary" type="submit">{{ __('Salvar') }}</flux:button>
            </div>
        </form>

        @if ($this->showDeleteUser)
        {{-- <livewire:settings.delete-user-form /> --}}
        @endif
    </x-settings.layout>
</section>
