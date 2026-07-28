<x-layouts::auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Brazilian Pet Foods')" :description="__('Faça login na sua conta.')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        {{-- @chisel-passkeys --}}
        {{-- <x-passkey-verify /> --}}
        {{-- @end-chisel-passkeys --}}

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Usuário -->
            <flux:input
                name="user"
                :label="__('Usuário')"
                :value="old('user')"
                type="text"
                required
                autofocus
                placeholder="user"
            />

            <!-- Senha -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Senha')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('********')"
                    viewable
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-sm end-0" :href="route('password.request')" wire:navigate>
                        {{ __('Esqueceu sua senha?') }}
                    </flux:link>
                @endif
            </div>

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full" data-test="login-button">
                    {{ __('Entrar') }}
                </flux:button>
            </div>
        </form>
    </div>
</x-layouts::auth>
