<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('pemesanan')->truncate();
        DB::table('jadwal')->truncate();
        DB::table('kereta')->truncate();
        DB::table('penumpang')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Users: 1 admin + 3 sample users
        DB::table('users')->insert([
            ['name'=>'Administrator','email'=>'admin@kaiexpress.id','password'=>Hash::make('admin123'),'role'=>'admin','no_hp'=>'081100000001','nik'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Budi Santoso','email'=>'budi@email.com','password'=>Hash::make('password'),'role'=>'user','no_hp'=>'081234567890','nik'=>'3201234567890001','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Siti Rahayu','email'=>'siti@email.com','password'=>Hash::make('password'),'role'=>'user','no_hp'=>'082345678901','nik'=>'3201234567890002','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Ahmad Fauzi','email'=>'ahmad@email.com','password'=>Hash::make('password'),'role'=>'user','no_hp'=>'083456789012','nik'=>'3201234567890003','created_at'=>now(),'updated_at'=>now()],
        ]);

        // Penumpang
        DB::table('penumpang')->insert([
            ['nama_penumpang'=>'Budi Santoso','nik'=>'3201234567890001','no_hp'=>'081234567890','created_at'=>now(),'updated_at'=>now()],
            ['nama_penumpang'=>'Siti Rahayu','nik'=>'3201234567890002','no_hp'=>'082345678901','created_at'=>now(),'updated_at'=>now()],
            ['nama_penumpang'=>'Ahmad Fauzi','nik'=>'3201234567890003','no_hp'=>'083456789012','created_at'=>now(),'updated_at'=>now()],
            ['nama_penumpang'=>'Dewi Lestari','nik'=>'3201234567890004','no_hp'=>'084567890123','created_at'=>now(),'updated_at'=>now()],
            ['nama_penumpang'=>'Rizky Pratama','nik'=>'3201234567890005','no_hp'=>'085678901234','created_at'=>now(),'updated_at'=>now()],
        ]);

        // Kereta
        DB::table('kereta')->insert([
            ['nama_kereta'=>'Argo Bromo Anggrek','kelas'=>'Eksekutif','created_at'=>now(),'updated_at'=>now()],
            ['nama_kereta'=>'Gajayana Express','kelas'=>'Bisnis','created_at'=>now(),'updated_at'=>now()],
            ['nama_kereta'=>'Matarmaja','kelas'=>'Ekonomi','created_at'=>now(),'updated_at'=>now()],
        ]);

        // Jadwal
        DB::table('jadwal')->insert([
            ['id_kereta'=>1,'stasiun_asal'=>'Jakarta Gambir','stasiun_tujuan'=>'Surabaya Pasar Turi','tanggal_berangkat'=>'2025-06-10','jam_berangkat'=>'08:00:00','created_at'=>now(),'updated_at'=>now()],
            ['id_kereta'=>2,'stasiun_asal'=>'Jakarta Gambir','stasiun_tujuan'=>'Bandung','tanggal_berangkat'=>'2025-06-11','jam_berangkat'=>'10:30:00','created_at'=>now(),'updated_at'=>now()],
            ['id_kereta'=>3,'stasiun_asal'=>'Bandung','stasiun_tujuan'=>'Yogyakarta','tanggal_berangkat'=>'2025-06-12','jam_berangkat'=>'14:00:00','created_at'=>now(),'updated_at'=>now()],
            ['id_kereta'=>1,'stasiun_asal'=>'Surabaya Pasar Turi','stasiun_tujuan'=>'Bandung','tanggal_berangkat'=>'2025-06-13','jam_berangkat'=>'07:00:00','created_at'=>now(),'updated_at'=>now()],
            ['id_kereta'=>2,'stasiun_asal'=>'Yogyakarta','stasiun_tujuan'=>'Jakarta Gambir','tanggal_berangkat'=>'2025-06-14','jam_berangkat'=>'09:15:00','created_at'=>now(),'updated_at'=>now()],
        ]);

        // Pemesanan
        DB::table('pemesanan')->insert([
            ['user_id'=>2,'id_penumpang'=>1,'id_jadwal'=>1,'tanggal_pesan'=>'2025-05-01','jumlah_tiket'=>3,'status'=>'confirmed','created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>3,'id_penumpang'=>2,'id_jadwal'=>2,'tanggal_pesan'=>'2025-05-02','jumlah_tiket'=>1,'status'=>'confirmed','created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>4,'id_penumpang'=>3,'id_jadwal'=>3,'tanggal_pesan'=>'2025-05-03','jumlah_tiket'=>4,'status'=>'confirmed','created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>2,'id_penumpang'=>4,'id_jadwal'=>4,'tanggal_pesan'=>'2025-05-04','jumlah_tiket'=>2,'status'=>'confirmed','created_at'=>now(),'updated_at'=>now()],
            ['user_id'=>3,'id_penumpang'=>5,'id_jadwal'=>5,'tanggal_pesan'=>'2025-05-05','jumlah_tiket'=>5,'status'=>'confirmed','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}
