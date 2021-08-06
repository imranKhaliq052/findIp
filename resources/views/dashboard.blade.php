<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="#">
                    <img src="{{ asset('images/ip.png') }}">
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('sendIps') }}">
                @csrf
                <!-- Name -->
                <div>
                    <x-label for="siteName" :value="__('siteName')" />

                    <x-input id="siteName" class="block w-full pt-0 mt-1" type="text" name="siteName"
                        :value="old('siteName')" Placeholder="Enter Site Name to Get Ip" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">

                    <x-button class="ml-4">
                        {{ __('Allowed Requests') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>

</x-app-layout>
