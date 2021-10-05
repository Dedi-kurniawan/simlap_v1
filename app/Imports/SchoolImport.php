<?php

namespace App\Imports;

use App\Models\School;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SchoolImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            if ($row['kategori'] == "paud") {
                $kategori = "2";
            }else if ($row['kategori'] == "sd") {
                $kategori = "3";
            }else if ($row['kategori'] == "smp") {
                $kategori = "4";
            }
            School::create([
                'nama_sekolah' => $row['nama'],
                'npsn'   => $row['npsn'],
                'status_sekolah'   => $row['status_sekolah'],
                'role_id' => $kategori,
            ]);
        }
    }
}
