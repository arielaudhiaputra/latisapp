@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Siswa</div>

                    <div class="card-body">
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Add input form for 'nis' -->
                            <div class="form-group">
                                <label for="nis">NIS:</label>
                                <input type="text" name="nis" id="nis" class="form-control" value="{{ $siswa->nis }}">
                            </div>

                            <!-- Add input form for 'nama' -->
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}">
                            </div>

                            <!-- Add input form for 'email' -->
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $siswa->email }}">
                            </div>

                            <!-- Add input form for 'foto' -->
                            <div class="form-group">
                                <label for="foto">Foto:</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                                @if ($siswa->foto)
                                    <span class="text-muted">File URL: {{ asset(Storage::url($siswa->foto)) }}</span>
                                @endif
                            </div>

                            <!-- Add other input forms as needed -->

                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
