<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Configurações do Perfil') }}</flux:heading>

    <x-settings.layout :heading="__('Pefil')" :subheading="__('Atualize as informações do seu perfil.')">
        
        <div class="space-y-2">
            <label class="block text-sm font-medium">
                Foto de perfil
            </label>
            <div class="relative w-28 h-28 group">
                <img
                    id="avatarPreview"
                    src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://placehold.co/400x400' }}"
                    class="w-28 h-28 rounded-full object-cover border border-zinc-300 dark:border-zinc-700 transition duration-300 group-hover:brightness-50"
                >
        
                <label
                    for="avatarInput"
                    class="absolute inset-0 flex flex-col items-center justify-center rounded-full cursor-pointer opacity-0 group-hover:opacity-100 transition duration-300"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8 text-white mb-1"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
        
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 7h4l2-2h6l2 2h4v12H3V7zm9 9a4 4 0 100-8 4 4 0 000 8z"/>
                    </svg>
        
                    <span class="text-xs text-white font-medium">
                        Alterar foto
                    </span>
                </label>
            </div>
        
            <form id="avatarForm">
                @csrf
        
                <input
                    id="avatarInput"
                    type="file"
                    name="avatar"
                    accept="image/*"
                    data-upload-url="{{ route('update.avatar') }}"
                    class="hidden"
                >
            </form>
        </div>

        @if ( auth()->user()->type == 'externo' ) 
            <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
                <flux:input wire:model="user" :label="__('Usuário')" type="text" required autofocus autocomplete="user" readonly />

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
        @endif
    </x-settings.layout>
</section>
