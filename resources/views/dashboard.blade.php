<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-lg font-bold">User</h3>
                    <a href="{{ route('users.index') }}" class="text-blue-600 underline">Lihat</a>
                </div>
                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-lg font-bold">Booking</h3>
                    <a href="{{ route('bookings.index') }}" class="text-blue-600 underline">Lihat</a>
                </div>
                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-lg font-bold">Jadwal</h3>
                    <a href="{{ route('jadwals.index') }}" class="text-blue-600 underline">Lihat</a>
                </div>
                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-lg font-bold">Riwayat</h3>
                    <a href="{{ route('riwayats.index') }}" class="text-blue-600 underline">Lihat</a>
                </div>
                <div class="bg-white p-6 shadow rounded-lg">
                    <h3 class="text-lg font-bold">Resep</h3>
                    <a href="{{ route('reseps.index') }}" class="text-blue-600 underline">Lihat</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
