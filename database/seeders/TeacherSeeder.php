<?php

namespace Database\Seeders;

use App\Models\Description;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Models\User;
use App\Models\Koordinator;
use App\Models\School;
use App\Models\District;
use App\Models\Rank;
use App\Models\Village;
use App\Models\Role;
use App\Models\Major;
use App\Models\Position;
use App\Models\Subject;
use App\Models\Smp\Employee as EmployeeSmp;
use App\Models\Smp\Teacher as TeacherSmp;
use App\Models\Smp\Student as StudentSmp;
use App\Models\Smp\Facility as FacilitySmp;
use App\Models\Smp\Need as NeedSmp;
use App\Models\Paud\Employee as EmployeePaud;
use App\Models\Paud\Teacher as TeacherPaud;
use App\Models\Paud\Student as StudentPaud;
use App\Models\Paud\Facility as FacilityPaud;
use App\Models\Paud\Need as NeedPaud;
use App\Models\Room;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::beginTransaction();
        try {    
            Role::insert([
                ['nama' => 'superadmin'],
                ['nama' => 'paud'],
                ['nama' => 'sd'],
                ['nama' => 'smp'],
                ['nama' => 'adminpaud'],
                ['nama' => 'adminsd'],
                ['nama' => 'adminsmp'],
            ]);
    
            Description::insert([
                [
                    'nama' => 'RUANG KELAS'
                ],
                [
                    'nama' => 'MEJA'
                ],
                [
                    'nama' => 'KURSI'
                ],
                [
                    'nama' => 'LAPANGAN OLAHRAGA'
                ],
                [
                    'nama' => 'RUANG GURU'
                ],
                [
                    'nama' => 'RUANG TU'
                ],
                [
                    'nama' => 'RUANG BP / BK'
                ],
                [
                    'nama' => 'RUANG UKS'
                ],
                [
                    'nama' => 'PERPUSTAKAAN'
                ],
                [
                    'nama' => 'LABORATORIUM IPA'
                ],
                [
                    'nama' => 'LABORATORIUM BAHASA'
                ],
                [
                    'nama' => 'LAB.KOMPUTER'
                ],
            ]);
    
            Room::insert([
                [
                    'kelas' => 'TK A 1',
                    'role_id' => '2',
                    'no_urut' => '0',
                ],
                [
                    'kelas' => 'TK A 2',
                    'role_id' => '2',
                    'no_urut' => '0',
                ],
                [
                    'kelas' => 'TK B',
                    'role_id' => '2',
                    'no_urut' => '0',
                ],
                [
                    'kelas' => 'KB',
                    'role_id' => '2',
                    'no_urut' => '0',
                ],
                [
                    'kelas' => 'I/A',
                    'role_id' => '3',
                    'no_urut' => '1',
                ],
                [
                    'kelas' => 'I/B',
                    'role_id' => '3',
                    'no_urut' => '1',
                ],
                [
                    'kelas' => 'I/C',
                    'role_id' => '3',
                    'no_urut' => '1',
                ],
                [
                    'kelas' => 'I/D',
                    'role_id' => '3',
                    'no_urut' => '1',
                ],
                [
                    'kelas' => 'I/E',
                    'role_id' => '3',
                    'no_urut' => '1',
                ],
                [
                    'kelas' => 'I/F',
                    'role_id' => '3',
                    'no_urut' => '1',
                ],
                [
                    'kelas' => 'I/G',
                    'role_id' => '3',
                    'no_urut' => '1',
                ],
                [
                    'kelas' => 'I/H',
                    'role_id' => '3',
                    'no_urut' => '1',
                ],
                [
                    'kelas' => 'I/I',
                    'role_id' => '3',
                    'no_urut' => '1',
                ],
                [
                    'kelas' => 'I/J',
                    'role_id' => '3',
                    'no_urut' => '1',
                ],
                [
                    'kelas' => 'II/A',
                    'role_id' => '3',
                    'no_urut' => '2',
                ],
                [
                    'kelas' => 'II/B',
                    'role_id' => '3',
                    'no_urut' => '2',
                ],
                [
                    'kelas' => 'II/C',
                    'role_id' => '3',
                    'no_urut' => '2',
                ],
                [
                    'kelas' => 'II/D',
                    'role_id' => '3',
                    'no_urut' => '2',
                ],
                [
                    'kelas' => 'II/E',
                    'role_id' => '3',
                    'no_urut' => '2',
                ],
                [
                    'kelas' => 'II/F',
                    'role_id' => '3',
                    'no_urut' => '2',
                ],
                [
                    'kelas' => 'II/G',
                    'role_id' => '3',
                    'no_urut' => '2',
                ],
                [
                    'kelas' => 'II/H',
                    'role_id' => '3',
                    'no_urut' => '2',
                ],
                [
                    'kelas' => 'II/I',
                    'role_id' => '3',
                    'no_urut' => '2',
                ],
                [
                    'kelas' => 'II/J',
                    'role_id' => '3',
                    'no_urut' => '2',
                ],
                [
                    'kelas' => 'III/A',
                    'role_id' => '3',
                    'no_urut' => '3',
                ],
                [
                    'kelas' => 'III/B',
                    'role_id' => '3',
                    'no_urut' => '3',
                ],
                [
                    'kelas' => 'III/C',
                    'role_id' => '3',
                    'no_urut' => '3',
                ],
                [
                    'kelas' => 'III/D',
                    'role_id' => '3',
                    'no_urut' => '3',
                ],
                [
                    'kelas' => 'III/E',
                    'role_id' => '3',
                    'no_urut' => '3',
                ],
                [
                    'kelas' => 'III/F',
                    'role_id' => '3',
                    'no_urut' => '3',
                ],
                [
                    'kelas' => 'III/G',
                    'role_id' => '3',
                    'no_urut' => '3',
                ],
                [
                    'kelas' => 'III/H',
                    'role_id' => '3',
                    'no_urut' => '3',
                ],
                [
                    'kelas' => 'III/I',
                    'role_id' => '3',
                    'no_urut' => '3',
                ],
                [
                    'kelas' => 'III/J',
                    'role_id' => '3',
                    'no_urut' => '3',
                ],
                [
                    'kelas' => 'IV/A',
                    'role_id' => '3',
                    'no_urut' => '4',
                ],
                [
                    'kelas' => 'IV/B',
                    'role_id' => '3',
                    'no_urut' => '4',
                ],
                [
                    'kelas' => 'IV/C',
                    'role_id' => '3',
                    'no_urut' => '4',
                ],
                [
                    'kelas' => 'IV/D',
                    'role_id' => '3',
                    'no_urut' => '4',
                ],
                [
                    'kelas' => 'IV/E',
                    'role_id' => '3',
                    'no_urut' => '4',
                ],
                [
                    'kelas' => 'IV/F',
                    'role_id' => '3',
                    'no_urut' => '4',
                ],
                [
                    'kelas' => 'IV/G',
                    'role_id' => '3',
                    'no_urut' => '4',
                ],
                [
                    'kelas' => 'IV/H',
                    'role_id' => '3',
                    'no_urut' => '4',
                ],
                [
                    'kelas' => 'IV/I',
                    'role_id' => '3',
                    'no_urut' => '4',
                ],
                [
                    'kelas' => 'IV/J',
                    'role_id' => '3',
                    'no_urut' => '4',
                ],
                [
                    'kelas' => 'V/A',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'V/B',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'V/C',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'V/D',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'V/E',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'V/F',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'V/G',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'V/H',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'V/I',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'V/J',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'VI/A',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'VI/B',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'VI/C',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'VI/D',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'VI/E',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'VI/F',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'VI/G',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'VI/H',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'VI/I',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'VI/J',
                    'role_id' => '3',
                    'no_urut' => '6',
                ],
                [
                    'kelas' => 'VII/A',
                    'role_id' => '4',
                    'no_urut' => '7',
                ],
                [
                    'kelas' => 'VII/B',
                    'role_id' => '4',
                    'no_urut' => '7',
                ],
                [
                    'kelas' => 'VII/C',
                    'role_id' => '4',
                    'no_urut' => '7',
                ],
                [
                    'kelas' => 'VII/D',
                    'role_id' => '4',
                    'no_urut' => '7',
                ],
                [
                    'kelas' => 'VII/E',
                    'role_id' => '4',
                    'no_urut' => '7',
                ],
                [
                    'kelas' => 'VII/F',
                    'role_id' => '4',
                    'no_urut' => '7',
                ],
                [
                    'kelas' => 'VII/G',
                    'role_id' => '4',
                    'no_urut' => '7',
                ],
                [
                    'kelas' => 'VII/H',
                    'role_id' => '4',
                    'no_urut' => '7',
                ],
                [
                    'kelas' => 'VII/I',
                    'role_id' => '4',
                    'no_urut' => '7',
                ],
                [
                    'kelas' => 'VII/J',
                    'role_id' => '4',
                    'no_urut' => '7',
                ],
                [
                    'kelas' => 'VIII/A',
                    'role_id' => '4',
                    'no_urut' => '8',
                ],
                [
                    'kelas' => 'VIII/B',
                    'role_id' => '4',
                    'no_urut' => '8',
                ],
                [
                    'kelas' => 'VIII/C',
                    'role_id' => '4',
                    'no_urut' => '8',
                ],
                [
                    'kelas' => 'VIII/D',
                    'role_id' => '4',
                    'no_urut' => '8',
                ],
                [
                    'kelas' => 'VIII/E',
                    'role_id' => '4',
                    'no_urut' => '8',
                ],
                [
                    'kelas' => 'VIII/F',
                    'role_id' => '4',
                    'no_urut' => '8',
                ],
                [
                    'kelas' => 'VIII/G',
                    'role_id' => '4',
                    'no_urut' => '8',
                ],
                [
                    'kelas' => 'VIII/H',
                    'role_id' => '4',
                    'no_urut' => '8',
                ],
                [
                    'kelas' => 'VIII/I',
                    'role_id' => '4',
                    'no_urut' => '8',
                ],
                [
                    'kelas' => 'VIII/J',
                    'role_id' => '4',
                    'no_urut' => '8',
                ],
                [
                    'kelas' => 'IX/A',
                    'role_id' => '4',
                    'no_urut' => '9',
                ],
                [
                    'kelas' => 'IX/B',
                    'role_id' => '4',
                    'no_urut' => '9',
                ],
                [
                    'kelas' => 'IX/C',
                    'role_id' => '4',
                    'no_urut' => '9',
                ],
                [
                    'kelas' => 'IX/D',
                    'role_id' => '4',
                    'no_urut' => '9',
                ],
                [
                    'kelas' => 'IX/E',
                    'role_id' => '4',
                    'no_urut' => '9',
                ],
                [
                    'kelas' => 'IX/F',
                    'role_id' => '4',
                    'no_urut' => '9',
                ],
                [
                    'kelas' => 'IX/G',
                    'role_id' => '4',
                    'no_urut' => '9',
                ],
                [
                    'kelas' => 'IX/H',
                    'role_id' => '4',
                    'no_urut' => '9',
                ],
                [
                    'kelas' => 'IX/I',
                    'role_id' => '4',
                    'no_urut' => '9',
                ],
                [
                    'kelas' => 'IX/J',
                    'role_id' => '4',
                    'no_urut' => '9',
                ],
    
                
            ]);
    
            Rank::insert([
                ['nama' => 'IV/a'],
                ['nama' => 'IV/b'],
                ['nama' => 'IV/c'],
                ['nama' => 'IV/d'],
                ['nama' => 'III/a'],
                ['nama' => 'III/b'],
                ['nama' => 'III/c'],
                ['nama' => 'III/d'],
                ['nama' => 'II/a'],
                ['nama' => 'II/b'],
                ['nama' => 'II/c'],
                ['nama' => 'II/d'],
                ['nama' => 'I/a'],
                ['nama' => 'I/b'],
                ['nama' => 'I/c'],
                ['nama' => 'I/d'],
            ]);
    
            Position::insert([
                ['nama' => 'Kepsek'],
                ['nama' => 'Guru'],
                ['nama' => 'Kepala TU'],
                ['nama' => 'Pelaksana'],
                ['nama' => 'Staff Perpustakaan'],
                ['nama' => 'Staff TU'],
                ['nama' => 'Satpam'],
                ['nama' => 'Resepsionis'],
                ['nama' => 'Penjaga Sekolah'],
                ['nama' => 'Kebun Sekolah'],
            ]);
    
            Major::insert([
                ['nama' => 'Pendidikan Bahasa dan Sastra Indonesia'],
                ['nama' => 'Pendidikan Bahasa Inggris'],
                ['nama' => 'Pendidikan Biologi'],
                ['nama' => 'Pendidikan Fisika'],
                ['nama' => 'Pendidikan Kimia'],
                ['nama' => 'Pendidikan Matematika'],
                ['nama' => 'Pendidikan Ekonomi'],
                ['nama' => 'Pendidikan Pancasila dan Kewarganegaraan'],
                ['nama' => 'Teknologi Pendidikan'],
                ['nama' => 'Pendidikan Guru Sekolah Dasar(PGSD)'],
                ['nama' => 'Pendidikan Guru Pendidikan Anak Usia Dini (PGPAUD)'],
            ]);
    
            Subject::insert([
                [
                    'nama' => 'Kepala Sekolah',
                    'role_id' => 3,
                ],
                [
                    'nama' => 'Kepala Sekolah',
                    'role_id' => 2,
                ],
                [
                    'nama' => 'Kepala Sekolah',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'Bahasa dan Sastra Indonesia',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'Bahasa Inggris',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'Biologi',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'Fisika',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'Kimia',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'Matematika',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'Ekonomi',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'Pancasila dan Kewarganegaraan',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'PJOK',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'PRAKARYA',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'Bahasa dan Sastra Indonesia',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'Pancasila dan Kewarganegaraan',
                    'role_id' => 3,
                ],
                [
                    'nama' => 'PJOK',
                    'role_id' => 3,
                ],
                [
                    'nama' => 'PRAKARYA',
                    'role_id' => 3,
                ],
                [
                    'nama' => 'BK',
                    'role_id' => 3,
                ],
                [
                    'nama' => 'BK',
                    'role_id' => 4,
                ],
                [
                    'nama' => 'PJOK',
                    'role_id' => 2,
                ],
                [
                    'nama' => 'PRAKARYA',
                    'role_id' => 2,
                ],
                [
                    'nama' => 'Mewarnai',
                    'role_id' => 2,
                ],
                [
                    'nama' => 'Membaca',
                    'role_id' => 2,
                ],
                [
                    'nama' => 'Berhitung',
                    'role_id' => 2,
                ]
            ]);
    
            // District::insert([
            //     [
            //         'nama' => 'Kota Arga Makmur',
            //     ],
            //     [
            //         'nama' => 'Kecamatan 2',
            //     ],
            //     [
            //         'nama' => 'Kecamatan 3',
            //     ],
            // ]);
    
            // Village::insert([
            //     [
            //         'nama' => 'Karang Anyar II',
            //         'district_id' => '1',
            //     ],
            //     [
            //         'nama' => 'Karang Anyar III',
            //         'district_id' => '1',
            //     ],
            //     [
            //         'nama' => 'Karang Anyar IV',
            //         'district_id' => '1',
            //     ],
            //     [
            //         'nama' => 'Desa V',
            //         'district_id' => '1',
            //     ],
            //     [
            //         'nama' => 'Desa VI',
            //         'district_id' => '2',
            //     ],
            //     [
            //         'nama' => 'Desa VII',
            //         'district_id' => '2',
            //     ],
            //     [
            //         'nama' => 'Desa VIII',
            //         'district_id' => '2',
            //     ],
            // ]);
    
            Koordinator::insert([
                [
                    'nama' => '1',
                ],
                [
                    'nama' => '2',
                ],
            ]);
    
            // School::insert([
            //     [
            //         'nama_sekolah' => 'SMP Negeri 01 Bengkulu Utara', 
            //         'nss' => '20.1.26.01.11.001', 
            //         'npsn' => '10700307', 
            //         'status_sekolah' => 'NEGERI', 
            //         'tahun_berdiri' => '1978-09-02', 
            //         'akreditasi' => 'A', 
            //         'nilai_akreditasi' => '92', 
            //         'alamat_sekolah' => 'Jalan R.A. Kartini', 
            //         'district_id' => 1, 
            //         'village_id' => 1, 
            //         'telepon_sekolah' => "(0737) 521249", 
            //         'email' => "smpnonearma@gmail.com", 
            //         'kurikulum' => 'K13', 
            //         'koordinator_id' => 1, 
            //         'kepala_sekolah' => "Dra. Tiswarni, M.Pd", 
            //         'nip_kepala_sekolah' => "196305021988032010",
            //         'sertifikasi_kepala_sekolah' => "Tersertifikasi", 
            //         'hp_kepala_sekolah' => "085366831223",
            //         'role_id' => 4,
            //     ],
            //     [
            //         'nama_sekolah' => 'SD Negeri 01 Bengkulu Utara', 
            //         'nss' => '20.1.26.01.11.001', 
            //         'npsn' => '654654465', 
            //         'status_sekolah' => 'NEGERI', 
            //         'tahun_berdiri' => '1978-09-02', 
            //         'akreditasi' => 'A', 
            //         'nilai_akreditasi' => '92', 
            //         'alamat_sekolah' => 'Jalan Jend Sudirman', 
            //         'district_id' => 1, 
            //         'village_id' => 1, 
            //         'telepon_sekolah' => "(0737) 521249", 
            //         'email' => "sdonearma@gmail.com", 
            //         'kurikulum' => 'K13', 
            //         'koordinator_id' => 1, 
            //         'kepala_sekolah' => "Dra. Tursina, M.Pd", 
            //         'nip_kepala_sekolah' => "123131132",
            //         'sertifikasi_kepala_sekolah' => "Tersertifikasi", 
            //         'hp_kepala_sekolah' => "085366831223",
            //         'role_id' => 3,
            //     ],
            //     [
            //         'nama_sekolah' => 'TK Pembina Bangsa', 
            //         'nss' => '20.1.26.01.11.001', 
            //         'npsn' => '654654654', 
            //         'status_sekolah' => 'NEGERI', 
            //         'tahun_berdiri' => '1978-09-02', 
            //         'akreditasi' => 'A', 
            //         'nilai_akreditasi' => '92', 
            //         'alamat_sekolah' => 'Jalan Jend Sudirman', 
            //         'district_id' => 1, 
            //         'village_id' => 1, 
            //         'telepon_sekolah' => "(0737) 521249", 
            //         'email' => "tkpembina@gmail.com", 
            //         'kurikulum' => 'K13', 
            //         'koordinator_id' => 1, 
            //         'kepala_sekolah' => "Dra. Tursina, M.Pd", 
            //         'nip_kepala_sekolah' => "123131132",
            //         'sertifikasi_kepala_sekolah' => "Tersertifikasi", 
            //         'hp_kepala_sekolah' => "085366831223",
            //         'role_id' => 3,
            //     ],
            // ]);
    
            User::insert([
                [
                    'name' => 'superadmin',
                    'role_id' => 1,
                    'status'  => '1',
                    'email' => 'superadmin@gmail.com',
                    'school_id' => NULL,
                    'password' => Hash::make('password123'),
                ],
                // [
                //     'name' => 'operator smpn 1',
                //     'role_id'  => 4,
                //     'status'  => '1',
                //     'email' => 'smpn01@gmail.com',
                //     'school_id' => 1,
                //     'password' => Hash::make('password123'),
    
                // ],
                // [
                //     'name' => 'operator sdn 1',
                //     'role_id'  => 3,
                //     'status'  => '1',
                //     'email' => 'sdn01@gmail.com',
                //     'school_id' => 2,
                //     'password' => Hash::make('password123'),
    
                // ],
                // [
                //     'name' => 'operator tk pembina',
                //     'role_id'  => 2,
                //     'status'  => '1',
                //     'email' => 'tkpembina@gmail.com',
                //     'school_id' => 3,
                //     'password' => Hash::make('password123'),
    
                // ],
                [
                    'name' => 'bidang paud',
                    'role_id'  => 5,
                    'status'  => '1',
                    'email' => 'bidangpaud@gmail.com',
                    'school_id' => NULL,
                    'password' => Hash::make('password123'),
    
                ],
                [
                    'name' => 'bidang sd',
                    'role_id'  => 6,
                    'status'  => '1',
                    'email' => 'bidangsd@gmail.com',
                    'school_id' => NULL,
                    'password' => Hash::make('password123'),
    
                ],
                [
                    'name' => 'bidang smp',
                    'role_id'  => 7,
                    'status'  => '1',
                    'email' => 'bidangsmp@gmail.com',
                    'school_id' => NULL,
                    'password' => Hash::make('password123'),
    
                ],
            ]);
            
               
            // for ($i=0; $i < 80; $i++) { 
            //     $village = Village::inRandomOrder()->first();
            //     $position = Position::where('id', '!=', '1')->where('id', '!=', '2')->inRandomOrder()->first();
            //     $rank = Rank::inRandomOrder()->first();
            //     $major = Major::inRandomOrder()->first();
            //     $subject = Subject::where('id', '!=', '1')->inRandomOrder()->first();
                
            //     if ($i == 0) {
            //         TeacherSmp::create([
            //             'nama' => $faker->name,
            //             'nuptk' => rand(1111111111111111,9999999999999999), 
            //             'nip' => rand(1111111111111111,9999999999999999), 
            //             'tmt_sebagai_guru' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'golongan' => $rank->nama, 
            //             'tmt_gol_terakhir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tmt_sekolah' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'jabatan' => 'Kepsek', 
            //             'tmt_jabatan' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tempat_lahir' => $faker->city, 
            //             'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'alamat_rumah' => $faker->city, 
            //             'mapel' => 'Kepsek', 
            //             'sertifikasi' => '1',
            //             'jenis_kelamin' => $faker->randomElement(['L', 'P']), 
            //             'status_pegawai' => 'PNS', 
            //             'pendidikan' => 'S2', 
            //             'jurusan' => $major->nama, 
            //             'jjm' => NULL,
            //             'user_id' => 2,
            //             'school_id' => 1,
            //             'district_id' => $village->district_id,
            //             'village_id' => $village->id,
            //             'koordinator_id' => 1,
            //         ]);  
            //     }else{
            //         TeacherSmp::create([
            //             'nama' => $faker->name,
            //             'nuptk' => rand(1111111111111111,9999999999999999), 
            //             'nip' => rand(1111111111111111,9999999999999999), 
            //             'tmt_sebagai_guru' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'golongan' => $rank->nama, 
            //             'tmt_gol_terakhir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tmt_sekolah' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'jabatan' => 'Guru', 
            //             'tmt_jabatan' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tempat_lahir' => $faker->city, 
            //             'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'alamat_rumah' => $faker->city, 
            //             'mapel' => $subject->nama, 
            //             'sertifikasi' => $faker->randomElement(['1', '0']),
            //             'jenis_kelamin' => $faker->randomElement(['L', 'P']), 
            //             'status_pegawai' => $faker->randomElement(['PNS', 'GBD', 'GTT', 'GTY']), 
            //             'pendidikan' => $faker->randomElement(['SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3']), 
            //             'jurusan' => $major->nama,
            //             'jjm' => rand(15,30),
            //             'user_id' => 2,
            //             'school_id' => 1,
            //             'district_id' => $village->district_id,
            //             'village_id' => $village->id,
            //             'koordinator_id' => 1,
            //         ]);
    
            //         TeacherPaud::create([
            //             'nama' => $faker->name,
            //             'nip' => rand(1111111111111111,9999999999999999),
            //             'golongan' => $rank->nama, 
            //             'tmt_gol_terakhir' => $faker->date($format = 'Y-m-d', $max = 'now'),
            //             'jabatan' => $position->nama,  
            //             'tmt_gol_terakhir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tmt_capeg' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tempat_lahir' => $faker->city, 
            //             'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tanggal_mulai_bekerja' => $faker->date($format = 'Y-m-d', $max = 'now'),
            //             'alamat_rumah' => $faker->city, 
            //             'sertifikasi' => $faker->randomElement(['1', '0']),
            //             'sertifikasi_tahun' => $faker->randomElement(['2000', '2001', '2002', '2003']), 
            //             'jenis_kelamin' => $faker->randomElement(['L', 'P']), 
            //             'status_pegawai' => $faker->randomElement(['PNS', 'GBD', 'GTT', 'GTY']), 
            //             'pendidikan' => $faker->randomElement(['SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3']),
            //             'tugas_mengajar' => 'TK A',
            //             'user_id' => 4,
            //             'school_id' => 3,
            //             'district_id' => $village->district_id,
            //             'village_id' => $village->id,
            //             'koordinator_id' => 1,
            //         ]);
                
            //     }
            // }

            // for ($i=0; $i < 50; $i++) { 
            //     if ($i == 0) {
            //         EmployeeSmp::create([
            //             'nama' => $faker->name,
            //             'nuptk' => rand(1111111111111111,9999999999999999), 
            //             'nip' => rand(1111111111111111,9999999999999999), 
            //             'tmt_sebagai_guru' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'golongan' => $rank->nama, 
            //             'tmt_gol_terakhir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tmt_sekolah' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'jabatan' => 'Kepala TU', 
            //             'tmt_jabatan' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tempat_lahir' => $faker->city, 
            //             'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'alamat_rumah' => $faker->city, 
            //             'jenis_kelamin' => $faker->randomElement(['L', 'P']), 
            //             'status_pegawai' => $faker->randomElement(['PNS', 'PTY', 'PTT']), 
            //             'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3']), 
            //             'user_id' => 2,
            //             'school_id' => 1,
            //             'district_id' => $village->district_id,
            //             'village_id' => $village->id,
            //             'koordinator_id' => 1,
            //         ]);
            //     }else{
            //         EmployeeSmp::create([
            //             'nama' => $faker->name,
            //             'nuptk' => rand(1111111111111111,9999999999999999), 
            //             'nip' => rand(1111111111111111,9999999999999999), 
            //             'tmt_sebagai_guru' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'golongan' => $rank->nama, 
            //             'tmt_gol_terakhir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tmt_sekolah' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'jabatan' => 'Staff TU', 
            //             'tmt_jabatan' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tempat_lahir' => $faker->city, 
            //             'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'alamat_rumah' => $faker->city, 
            //             'jenis_kelamin' => $faker->randomElement(['L', 'P']), 
            //             'status_pegawai' => $faker->randomElement(['PNS', 'PTY', 'PTT']), 
            //             'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3']), 
            //             'user_id' => 2,
            //             'school_id' => 1,
            //             'district_id' => $village->district_id,
            //             'village_id' => $village->id,
            //             'koordinator_id' => 1,
            //         ]);

            //         EmployeePaud::create([
            //             'nama' => $faker->name,
            //             'nip' => rand(1111111111111111,9999999999999999),
            //             'golongan' => $rank->nama, 
            //             'tmt_gol_terakhir' => $faker->date($format = 'Y-m-d', $max = 'now'),
            //             'jabatan' => $position->nama,  
            //             'tmt_gol_terakhir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tmt_capeg' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tempat_lahir' => $faker->city, 
            //             'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'), 
            //             'tanggal_mulai_bekerja' => $faker->date($format = 'Y-m-d', $max = 'now'),
            //             'alamat_rumah' => $faker->city, 
            //             'jenis_kelamin' => $faker->randomElement(['L', 'P']), 
            //             'status_pegawai' => $faker->randomElement(['PNS', 'GBD', 'GTT', 'GTY']), 
            //             'pendidikan' => $faker->randomElement(['SMA', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3']),
            //             'user_id' => 4,
            //             'school_id' => 3,
            //             'district_id' => $village->district_id,
            //             'village_id' => $village->id,
            //             'koordinator_id' => 1,
            //         ]);
            //     }
                
                
            // }

            // for ($i=0; $i < 30; $i++) {
            //     $roomSmp = Room::where('id', $i+65)->first();
            //     StudentSmp::create([
            //         'room_id' => $roomSmp->id, 
            //         'siswa_l' => rand(1,10), 
            //         'siswa_p' => rand(1,10), 
            //         'usia_11' => rand(1,10), 
            //         'usia_12' => rand(1,10), 
            //         'usia_13' => rand(1,10), 
            //         'usia_14' => rand(1,10), 
            //         'usia_15' => rand(1,10), 
            //         'usia_16' => rand(1,10), 
            //         'usia_17' => rand(1,10), 
            //         'usia_18' => rand(1,10), 
            //         'usia_19' => rand(1,10), 
            //         'islam' => rand(1,10), 
            //         'katolik' => rand(1,10), 
            //         'protestan' => rand(1,10), 
            //         'hindu' => rand(1,10), 
            //         'budha' => rand(1,10), 
            //         'lain' => rand(1,10), 
            //         'user_id' => 2,
            //         'school_id' => 1,
            //         'no_urut' => $roomSmp->no_urut
            //     ]);
            // }

            // for ($i=0; $i < 4; $i++) {
            //     $roomPaud = Room::where('id', $i+1)->first();
            //     StudentPaud::create([
            //         'room_id' => $roomPaud->id, 
            //         'siswa_l' => rand(1,10), 
            //         'siswa_p' => rand(1,10), 
            //         'usia_2' => rand(1,10), 
            //         'usia_3' => rand(1,10), 
            //         'usia_4' => rand(1,10), 
            //         'usia_5' => rand(1,10), 
            //         'usia_6' => rand(1,10),
            //         'islam' => rand(1,10), 
            //         'katolik' => rand(1,10), 
            //         'protestan' => rand(1,10), 
            //         'hindu' => rand(1,10), 
            //         'budha' => rand(1,10), 
            //         'lain' => rand(1,10), 
            //         'user_id' => 4,
            //         'school_id' => 3,
            //         'no_urut' => $roomPaud->no_urut
            //     ]);
            // }

            // for ($i=0; $i < 10; $i++) {
            //     $subjectsmp = Subject::where('id', $i+3)->first();
            //     NeedSmp::create([
            //         'mapel' => $subjectsmp->nama, 
            //         'rombel' => rand(1,10) , 
            //         'jam_rombel' => rand(1,10) , 
            //         'jam_perminggu' => rand(1,10) , 
            //         'jumlah_guru' => rand(1,10) , 
            //         'status_kepegawaian' => $faker->randomElement(['PNS', 'GBD', 'GTT', 'GTY']), 
            //         'keterangan' => $faker->randomElement(['CUKUP', 'KURANG']), 
            //         'user_id' => 2,
            //         'school_id' => 1,
            //     ]);
            // }

            // for ($i=0; $i < 3; $i++) {
            //     $subjectpaud = Subject::where('id', $i+20)->first();
            //         NeedPaud::create([
            //         'mapel' => $subjectpaud->nama, 
            //         'rombel' => rand(1,10) , 
            //         'jam_rombel' => rand(1,10) , 
            //         'jam_perminggu' => rand(1,10) , 
            //         'jumlah_guru' => rand(1,10) , 
            //         'status_kepegawaian' => $faker->randomElement(['PNS', 'GBD', 'GTT', 'GTY']), 
            //         'keterangan' => $faker->randomElement(['CUKUP', 'KURANG']), 
            //         'user_id' => 4,
            //         'school_id' => 3,
            //     ]);
            // }

            // for ($i=0; $i < 12; $i++) {
            //     $description = Description::where('id', $i+1)->first();
            //     FacilitySmp::create([
            //         'uraian' => $description->nama,
            //         'baik' => rand(1,10),
            //         'rusak_ringan' => rand(1,10),
            //         'rusak_sedang' => rand(1,10),
            //         'rusak_berat' => rand(1,10),
            //         'kebutuhan' => rand(1,10),
            //         'user_id' => 2,
            //         'school_id' => 1,
            //     ]);

            //     FacilityPaud::create([
            //         'uraian' => $description->nama,
            //         'baik' => rand(1,10),
            //         'rusak_ringan' => rand(1,10),
            //         'rusak_sedang' => rand(1,10),
            //         'rusak_berat' => rand(1,10),
            //         'kebutuhan' => rand(1,10),
            //         'user_id' => 4,
            //         'school_id' => 3,
            //     ]);
            // }

            DB::commit();
            
        } catch (QueryException $qe) {
            DB::rollback();
        }
    }
}
