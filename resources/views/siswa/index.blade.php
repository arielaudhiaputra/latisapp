@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <div class="card mt-3 mb-5 shadow-sm p-3 mb-5 bg-body rounded">
            <div class="text-end">
                <div class="btn-group">
                    <a href="{{ route('siswa.create') }}" class="btn btn-success btn-block">Create</a>
                </div>
            </div>


            <div class="card-body">
                
               
            <form action="{{ route('siswa.export-excel') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id_kategori">Select Category:</label>
                    <select name="id_kategori" id="kategori_filter" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($kategori as $id => $nama)
                            <option value="{{ $id }}">{{ $nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Export to Excel</button>
            </form>

                <table id="siswa-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            var dataTable = $('#siswa-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("siswa.data") }}',
                    data: function (d) {
                        d.id_kategori = $('#kategori_filter').val();
                    }
                },
                columns: [
                    { data: 'id', name: 'siswa.id' },
                    { data: 'nis', name: 'siswa.nis' },
                    { data: 'nama', name: 'siswa.nama' },
                    { data: 'email', name: 'siswa.email' },
                    { 
                        data: 'foto', 
                        name: 'siswa.foto',
                        render: function (data, type, full, meta) {
                            var photoUrl = '{{ Storage::url("") }}' + data;
                            return '<a href="' + photoUrl + '" target="_blank"><img src="' + photoUrl + '" height="50" /></a>';
                        },
                        orderable: false,
                        searchable: false
                    },
                    { data: 'kategori', name: 'kategori.nama' },
                    { 
                            data: 'id', 
                            name: 'action', 
                            orderable: false, 
                            searchable: false,
                            render: function (data, type, full, meta) {
                                var editUrl = '{{ route("siswa.edit", ":id") }}'.replace(':id', data);
                                var deleteUrl = '{{ route("siswa.destroy", ":id") }}'.replace(':id', data);

                                return '<a href="' + editUrl + '" class="btn btn-sm btn-primary me-2">Edit</a>' +
                                    '<button class="btn btn-sm btn-danger btn-delete" data-id="' + data + '">Delete</button>';
                            }
                        },
                ]
            });

            $('#kategori_filter').change(function () {
                dataTable.ajax.reload(); 
            });

            $('#siswa-table').on('click', '.btn-delete', function () {
                var siswaId = $(this).data('id');
                
                if (confirm('Yakin ingin menghapus siswa?')) {
                    $.ajax({
                        url: '{{ url("siswa") }}/' + siswaId,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function (data) {
                            alert(data.success);
                            dataTable.ajax.reload();
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
s