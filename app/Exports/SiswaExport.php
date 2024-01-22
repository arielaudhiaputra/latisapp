<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    protected $id_kategori;

    public function __construct($id_kategori)
    {
        $this->id_kategori = $id_kategori;
    }

    public function collection()
    {
        // Logika untuk mengambil data sesuai kategori
        $siswa = Siswa::select('siswa.id', 'siswa.nis', 'siswa.nama', 'siswa.email', 'siswa.foto', 'kategori.nama as kategori')
            ->leftJoin('kategori', 'siswa.id_kategori', '=', 'kategori.id');

        if ($this->id_kategori) {
            $siswa->where('siswa.id_kategori', $this->id_kategori);
        }

        // Gunakan tag PHP di dalam string SQL jika diperlukan
      

        return $siswa->get();
    }

    public function headings(): array
    {
        // Kolom judul untuk file Excel
        return [
            'ID',
            'NIS',
            'Nama',
            'Email',
            'Foto',
            'Kategori',
            // Kolom lainnya
        ];
    }
}
