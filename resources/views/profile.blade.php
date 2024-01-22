@extends('layout.app')

@section('content')
<div class="container mt-4">
        <h2>Profil Pengguna</h2>
        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>Nama:</strong> {{ $user->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <!-- Tambahkan informasi profil lainnya sesuai kebutuhan -->

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
