<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Jadwal Dokter') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-4xl mx-auto sm:px-6 lg:px-8">
        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol tambah --}}
        <div class="mb-4">
            <a href="{{ route('jadwal.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Jadwal</a>
        </div>

        {{-- Tabel daftar jadwal --}}
        <table class="min-w-full bg-white rounded shadow-sm">
            <thead>
                <tr class="border-b">
                    <th class="px-4 py-2 text-left">Dokter</th>
                    <th class="px-4 py-2 text-left">Hari</th>
                    <th class="px-4 py-2 text-left">Jam Mulai</th>
                    <th class="px-4 py-2 text-left">Jam Selesai</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwals as $jadwal)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $jadwal->dokter->name ?? 'Dokter tidak ditemukan' }}</td>
                        <td class="px-4 py-2">{{ $jadwal->hari }}</td>
                        <td class="px-4 py-2">{{ $jadwal->jam_mulai }}</td>
                        <td class="px-4 py-2">{{ $jadwal->jam_selesai }}</td>
                        <td class="px-4 py-2 text-center space-x-2">
                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">Belum ada jadwal dokter.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
