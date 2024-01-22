@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tambah Siswa</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nis">NIS (Nama harus unik dan angka):</label>
                        <input type="text" name="nis" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Siswa:</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto (JPG atau PNG, maksimal 100KB):</label>
                        <input type="file" name="foto" class="form-control-file" accept=".jpg, .jpeg, .png" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="kategori_id">Kategori:</label>
                        <select id="kategori_id" name="kategori_id" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $id => $nama)
                                <option value="{{ $id }}">{{ $nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
