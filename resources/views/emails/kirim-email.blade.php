<x-guest-layout>
    {{-- Container untuk pesan status, mirip dengan di layout auth Breeze --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Kirim Email</h2>

        <form action="{{ route('post-email') }}" method="post">
            @csrf

            {{-- Nama --}}
            <div class="mt-4">
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Nama Anda" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            {{-- Email Tujuan --}}
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email Tujuan')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Email Tujuan" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Subjek --}}
            <div class="mt-4">
                <x-input-label for="subject" :value="__('Subjek')" />
                <x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')" required placeholder="Subjek Email" />
                <x-input-error :messages="$errors->get('subject')" class="mt-2" />
            </div>

            {{-- Body Deskripsi --}}
            <div class="mt-4">
                <x-input-label for="body" :value="__('Body Deskripsi')" />
                {{-- Menggunakan textarea dengan styling mirip x-text-input --}}
                <textarea name="body" id="body" rows="6" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>{{ old('body') }}</textarea>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-6">
                {{-- Tombol Kirim Email --}}
                <x-primary-button>
                    {{ __('Kirim Email') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>