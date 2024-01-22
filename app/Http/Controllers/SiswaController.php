<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kategori;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;




class SiswaController extends Controller
{
    public function index()
    {
        $kategori = Kategori::pluck('nama', 'id');

        return view('siswa.index', compact('kategori'));
    }

    public function exportExcel()
    {
        $id_kategori = request('id_kategori');

        return Excel::download(new SiswaExport($id_kategori), 'siswa.xlsx');
    }


    public function getData()
    {
        $siswa = Siswa::select(['siswa.id', 'siswa.nama', 'siswa.email',  'siswa.nis', 'siswa.foto', 'kategori.nama as kategori'])
            ->leftJoin('kategori', 'siswa.id_kategori', '=', 'kategori.id');

        if (request()->has('id_kategori') && !empty(request()->id_kategori)) {
            $siswa->where('siswa.id_kategori', request()->id_kategori);
        }

        return DataTables::of($siswa)
            ->addColumn('action', function ($siswa) {
                return '<a href="#" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true);

        return DataTables::of($siswa)
            ->addColumn('action', function ($siswa) {
                $editUrl = route('siswa.edit', $siswa->id);

                return '<a href="' . $editUrl . '" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $kategori = Kategori::pluck('nama', 'id');
        return view('siswa.create', compact('kategori'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $id,
            'nama' => 'required',
            'email' => 'required|email',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->email = $request->email;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos', 'public');
            $siswa->foto = $fotoPath;
        }

        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diupdate.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:siswa,nis',
            'nama' => 'required',
            'email' => 'required|email',
            'foto' => 'required|image|mimes:jpeg,png|max:100',
        ], [
            'nis.required' => 'NIS harus diisi.',
            'nis.numeric' => 'NIS harus berupa angka.',
            'nis.unique' => 'NIS sudah digunakan, harap pilih NIS yang lain.',
            'nama.required' => 'Nama siswa harus diisi.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'foto.required' => 'Foto siswa harus diunggah.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format foto harus berupa JPG atau PNG.',
            'foto.max' => 'Ukuran foto tidak boleh melebihi 100KB.',
        ]);

        $siswa = new Siswa;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->email = $request->email;
        $siswa->id_kategori = $request->kategori_id;

        // Upload foto
        $fotoPath = $request->file('foto')->store('path', 'public');
        $siswa->foto = $fotoPath;

        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }


    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return response()->json(['success' => 'Siswa berhasil dihapus.']);
    }
}
