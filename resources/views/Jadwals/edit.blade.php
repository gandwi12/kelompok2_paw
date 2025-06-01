<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jadwal Dokter') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                
                    <div class="mb-4">
                        <label for="dokter_id" class="block text-sm font-medium text-gray-700">Dokter</label>
                        <select name="dokter_id" id="dokter_id" required class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                            @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->id }}" {{ $dokter->id == $jadwal->dokter_id ? 'selected' : '' }}>
                                    {{ $dokter->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
                        <select name="hari" id="hari" required class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
                                <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                            @endforeach
                        </select>
                    </div>

                   
                    <div class="mb-4">
                        <label for="jam_mulai" class="block text-sm font-medium text-gray-700">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" value="{{ $jadwal->jam_mulai }}" required class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>

                  
                    <div class="mb-4">
                        <label for="jam_selesai" class="block text-sm font-medium text-gray-700">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai" value="{{ $jadwal->jam_selesai }}" required class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>

            
                    <div class="flex justify-end">
                        <a href="{{ route('jadwal.index') }}" class="mr-2 inline-flex items-center px-4 py-2 bg-gray-300 rounded text-sm">Batal</a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded text-sm hover:bg-green-700">
                            Update Jadwal
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
