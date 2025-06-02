<nav>
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ route('bookings.index') }}">Booking Dokter</a>
</nav>

<style>
    nav {
        background-color: #4CAF50;
        padding: 10px;
    }
    nav a {
        color: white;
        text-decoration: none;
        margin-right: 15px;
        font-weight: bold;
    }
    nav a:hover {
        text-decoration: underline;
    }
</style>
