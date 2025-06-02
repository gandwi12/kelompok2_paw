<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <h1 class="text-2xl font-bold mb-6 text-center">Halaman Utama</h1>

    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">
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
</body>
</html>
