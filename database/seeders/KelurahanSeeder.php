<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelurahans = [
            //Banyumanik

            // Semarang Selatan (id: 1)
            ['kode' => 3374010001, 'kelurahan' => 'Barusari', 'kecamatan_id' => 11],
            ['kode' => 3374010002, 'kelurahan' => 'Bulustalan', 'kecamatan_id' => 11],
            ['kode' => 3374010003, 'kelurahan' => 'Lamper Kidul', 'kecamatan_id' =>11],
            ['kode' => 3374010004, 'kelurahan' => 'Lamper Lor', 'kecamatan_id' => 11],
            ['kode' => 3374010005, 'kelurahan' => 'Lamper Tengah', 'kecamatan_id' => 11],
            ['kode' => 3374010006, 'kelurahan' => 'Mugassari', 'kecamatan_id' => 11],
            ['kode' => 3374010007, 'kelurahan' => 'Peterongan', 'kecamatan_id' => 11],
            ['kode' => 3374010008, 'kelurahan' => 'Pleburan', 'kecamatan_id' => 11],

            // Tembalang (id: 2)
            ['kode' => 3374020001, 'kelurahan' => 'Bulusan', 'kecamatan_id' => 15],
            ['kode' => 3374020002, 'kelurahan' => 'Jangli', 'kecamatan_id' => 15],
            ['kode' => 3374020003, 'kelurahan' => 'Kramas', 'kecamatan_id' => 15],
            ['kode' => 3374020004, 'kelurahan' => 'Meteseh', 'kecamatan_id' => 15],
            ['kode' => 3374020005, 'kelurahan' => 'Mukti Harjo Kidul', 'kecamatan_id' => 15],
            ['kode' => 3374020006, 'kelurahan' => 'Mukti Harjo Lor', 'kecamatan_id' => 15],
            ['kode' => 3374020007, 'kelurahan' => 'Pandang', 'kecamatan_id' => 15],
            ['kode' => 3374020008, 'kelurahan' => 'Rowosari', 'kecamatan_id' => 15],
            ['kode' => 3374020009, 'kelurahan' => 'Sendangmulyo', 'kecamatan_id' => 15],
            ['kode' => 3374020010, 'kelurahan' => 'Sendangguwo', 'kecamatan_id' => 15],
            ['kode' => 3374020011, 'kelurahan' => 'Tandang', 'kecamatan_id' => 15],
            ['kode' => 3374020012, 'kelurahan' => 'Tembalang', 'kecamatan_id' => 15],

            // Semarang Tengah (id: 5)
            ['kode' => 3374050001, 'kelurahan' => 'Bendungan', 'kecamatan_id' => 12],
            ['kode' => 3374050002, 'kelurahan' => 'Gabahan', 'kecamatan_id' => 12],
            ['kode' => 3374050003, 'kelurahan' => 'Jagalan', 'kecamatan_id' => 12],
            ['kode' => 3374050004, 'kelurahan' => 'Kauman', 'kecamatan_id' => 12],
            ['kode' => 3374050005, 'kelurahan' => 'Kembangsari', 'kecamatan_id' => 12],
            ['kode' => 3374050006, 'kelurahan' => 'Kranggan', 'kecamatan_id' => 12],
            ['kode' => 3374050007, 'kelurahan' => 'Miroto', 'kecamatan_id' => 12],
            ['kode' => 3374050008, 'kelurahan' => 'Pandansari', 'kecamatan_id' => 12],
            ['kode' => 3374050009, 'kelurahan' => 'Pekunden', 'kecamatan_id' => 12],
            ['kode' => 3374050010, 'kelurahan' => 'Sekayu', 'kecamatan_id' => 12],

            // Semarang Utara (id: 3)
            ['kode' => 3374030001, 'kelurahan' => 'Bulu Lor', 'kecamatan_id' => 14],
            ['kode' => 3374030002, 'kelurahan' => 'Dadapsari', 'kecamatan_id' => 14],
            ['kode' => 3374030003, 'kelurahan' => 'Kuningan', 'kecamatan_id' => 14],
            ['kode' => 3374030004, 'kelurahan' => 'Panggung Lor', 'kecamatan_id' => 14],
            ['kode' => 3374030005, 'kelurahan' => 'Panggung Kidul', 'kecamatan_id' => 14],
            ['kode' => 3374030006, 'kelurahan' => 'Plombokan', 'kecamatan_id' => 14],
            ['kode' => 3374030007, 'kelurahan' => 'Tanjung Mas', 'kecamatan_id' => 14],

            // Semarang Timur (id: 4)
            ['kode' => 3374040001, 'kelurahan' => 'Bugangan', 'kecamatan_id' => 13],
            ['kode' => 3374040002, 'kelurahan' => 'Karangturi', 'kecamatan_id' => 13],
            ['kode' => 3374040003, 'kelurahan' => 'Karangtempel', 'kecamatan_id' => 13],
            ['kode' => 3374040004, 'kelurahan' => 'Kemijen', 'kecamatan_id' => 13],
            ['kode' => 3374040005, 'kelurahan' => 'Mlatibaru', 'kecamatan_id' => 13],
            ['kode' => 3374040006, 'kelurahan' => 'Mlatiharjo', 'kecamatan_id' => 13],
            ['kode' => 3374040007, 'kelurahan' => 'Rejosari', 'kecamatan_id' => 13],
            ['kode' => 3374040008, 'kelurahan' => 'Sambirejo', 'kecamatan_id' => 13],

            // Semarang Barat (id: 6)
            ['kode' => 3374060001, 'kelurahan' => 'Bojongsalaman', 'kecamatan_id' => 10],
            ['kode' => 3374060002, 'kelurahan' => 'Cabean', 'kecamatan_id' => 10],
            ['kode' => 3374060003, 'kelurahan' => 'Gisikdrono', 'kecamatan_id' => 10],
            ['kode' => 3374060004, 'kelurahan' => 'Krobokan', 'kecamatan_id' => 10],
            ['kode' => 3374060005, 'kelurahan' => 'Ngemplak Simongan', 'kecamatan_id' => 10],
            ['kode' => 3374060006, 'kelurahan' => 'Salamanmloyo', 'kecamatan_id' => 10],
            ['kode' => 3374060007, 'kelurahan' => 'Tambakharjo', 'kecamatan_id' => 10],
            ['kode' => 3374060008, 'kelurahan' => 'Tawangsari', 'kecamatan_id' => 10],
            ['kode' => 3374060009, 'kelurahan' => 'Tawangmas', 'kecamatan_id' => 10],

            // Pedurungan (id: 7)
            ['kode' => 3374070001, 'kelurahan' => 'Bangetayu Kulon', 'kecamatan_id' => 9],
            ['kode' => 3374070002, 'kelurahan' => 'Bangetayu Wetan', 'kecamatan_id' => 9],
            ['kode' => 3374070003, 'kelurahan' => 'Gemah', 'kecamatan_id' => 9],
            ['kode' => 3374070004, 'kelurahan' => 'Kalicari', 'kecamatan_id' => 9],
            ['kode' => 3374070005, 'kelurahan' => 'Muktiharjo Kidul', 'kecamatan_id' => 9],
            ['kode' => 3374070006, 'kelurahan' => 'Palebon', 'kecamatan_id' => 9],
            ['kode' => 3374070007, 'kelurahan' => 'Pedurungan Kidul', 'kecamatan_id' => 9],
            ['kode' => 3374070008, 'kelurahan' => 'Pedurungan Lor', 'kecamatan_id' => 9],
            ['kode' => 3374070009, 'kelurahan' => 'Pedurungan Tengah', 'kecamatan_id' => 9],
            ['kode' => 3374070010, 'kelurahan' => 'Plamongan Sari', 'kecamatan_id' => 9],
            ['kode' => 3374070011, 'kelurahan' => 'Tlogomulyo', 'kecamatan_id' => 9],

            // Banyumanik (id: 1)
            ['kode' => 3374100001, 'kelurahan' => 'Pudak Payung', 'kecamatan_id' => 1],
            ['kode' => 3374100002, 'kelurahan' => 'Gedawang', 'kecamatan_id' => 1],
            ['kode' => 3374100003, 'kelurahan' => 'Jabungan', 'kecamatan_id' => 1],
            ['kode' => 3374100004, 'kelurahan' => 'Padangsari', 'kecamatan_id' => 1],
            ['kode' => 3374100005, 'kelurahan' => 'Banyumanik', 'kecamatan_id' => 1],
            ['kode' => 3374100006, 'kelurahan' => 'Srondol Wetan', 'kecamatan_id' => 1],
            ['kode' => 3374100007, 'kelurahan' => 'Pedalangan', 'kecamatan_id' => 1],
            ['kode' => 3374100008, 'kelurahan' => 'Sumurboto', 'kecamatan_id' => 1],
            ['kode' => 3374100009, 'kelurahan' => 'Srondol Kulon', 'kecamatan_id' => 1],
            ['kode' => 3374100010, 'kelurahan' => 'Tinjomoyo', 'kecamatan_id' => 1],

            // Candisari (id: 2)
            ['kode' => 3374110001, 'kelurahan' => 'Jatingaleh', 'kecamatan_id' => 2],
            ['kode' => 3374110002, 'kelurahan' => 'Karanganyar Gunung', 'kecamatan_id' => 2],
            ['kode' => 3374110003, 'kelurahan' => 'Jomblang', 'kecamatan_id' => 2],
            ['kode' => 3374110004, 'kelurahan' => 'Candi', 'kecamatan_id' => 2],
            ['kode' => 3374110005, 'kelurahan' => 'Kaliwiru', 'kecamatan_id' => 2],
            ['kode' => 3374110006, 'kelurahan' => 'Wonotingal', 'kecamatan_id' => 2],
            ['kode' => 3374110007, 'kelurahan' => 'Tegalsari', 'kecamatan_id' => 2],

            // Gajahmungkur (id: 3)
            ['kode' => 3374120001, 'kelurahan' => 'Lempongsari', 'kecamatan_id' => 3],
            ['kode' => 3374120002, 'kelurahan' => 'Bendan Ngisor', 'kecamatan_id' => 3],
            ['kode' => 3374120003, 'kelurahan' => 'Bendungan', 'kecamatan_id' => 3],
            ['kode' => 3374120004, 'kelurahan' => 'Gajahmungkur', 'kecamatan_id' => 3],
            ['kode' => 3374120005, 'kelurahan' => 'Petompon', 'kecamatan_id' => 3],
            ['kode' => 3374120006, 'kelurahan' => 'Sampangan', 'kecamatan_id' => 3],

            // Gayamsari (id: 4)
            ['kode' => 3374080001, 'kelurahan' => 'Gayamsari', 'kecamatan_id' => 4],
            ['kode' => 3374080002, 'kelurahan' => 'Kaligawe', 'kecamatan_id' => 4],
            ['kode' => 3374080003, 'kelurahan' => 'Panden Lamper', 'kecamatan_id' => 4],
            ['kode' => 3374080004, 'kelurahan' => 'Sambirejo', 'kecamatan_id' => 4],
            ['kode' => 3374080005, 'kelurahan' => 'Sawah Besar', 'kecamatan_id' => 4],
            ['kode' => 3374080006, 'kelurahan' => 'Siwalan', 'kecamatan_id' => 4],
            ['kode' => 3374080007, 'kelurahan' => 'Tambakrejo', 'kecamatan_id' => 4],

            // Genuk (id: 5)
            ['kode' => 3374090001, 'kelurahan' => 'Bangetayu Wetan', 'kecamatan_id' => 5],
            ['kode' => 3374090002, 'kelurahan' => 'Bangetayu Kulon', 'kecamatan_id' => 5],
            ['kode' => 3374090003, 'kelurahan' => 'Banjardowo', 'kecamatan_id' => 5],
            ['kode' => 3374090004, 'kelurahan' => 'Genuksari', 'kecamatan_id' => 5],
            ['kode' => 3374090005, 'kelurahan' => 'Karangroto', 'kecamatan_id' => 5],
            ['kode' => 3374090006, 'kelurahan' => 'Kudu', 'kecamatan_id' => 5],
            ['kode' => 3374090007, 'kelurahan' => 'Muktiharjo Lor', 'kecamatan_id' => 5],
            ['kode' => 3374090008, 'kelurahan' => 'Penggaron Lor', 'kecamatan_id' => 5],
            ['kode' => 3374090009, 'kelurahan' => 'Semarang Hargo', 'kecamatan_id' => 5],
            ['kode' => 3374090010, 'kelurahan' => 'Terboyo Kulon', 'kecamatan_id' => 5],
            ['kode' => 3374090011, 'kelurahan' => 'Terboyo Wetan', 'kecamatan_id' => 5],

            // Gunungpati (id: 6)
            ['kode' => 3374130001, 'kelurahan' => 'Cepoko', 'kecamatan_id' => 6],
            ['kode' => 3374130002, 'kelurahan' => 'Gunung Pati', 'kecamatan_id' => 6],
            ['kode' => 3374130003, 'kelurahan' => 'Jatirejo', 'kecamatan_id' => 6],
            ['kode' => 3374130004, 'kelurahan' => 'Kalisegoro', 'kecamatan_id' => 6],
            ['kode' => 3374130005, 'kelurahan' => 'Kandri', 'kecamatan_id' => 6],
            ['kode' => 3374130006, 'kelurahan' => 'Mangunsari', 'kecamatan_id' => 6],
            ['kode' => 3374130007, 'kelurahan' => 'Nongkosawit', 'kecamatan_id' => 6],
            ['kode' => 3374130008, 'kelurahan' => 'Pakintelan', 'kecamatan_id' => 6],
            ['kode' => 3374130009, 'kelurahan' => 'Patemon', 'kecamatan_id' => 6],
            ['kode' => 3374130010, 'kelurahan' => 'Plalangan', 'kecamatan_id' => 6],
            ['kode' => 3374130011, 'kelurahan' => 'Pongangan', 'kecamatan_id' => 6],
            ['kode' => 3374130012, 'kelurahan' => 'Sadeng', 'kecamatan_id' => 6],
            ['kode' => 3374130013, 'kelurahan' => 'Sekaran', 'kecamatan_id' => 6],
            ['kode' => 3374130014, 'kelurahan' => 'Sukorejo', 'kecamatan_id' => 6],
            ['kode' => 3374130015, 'kelurahan' => 'Sumurrejo', 'kecamatan_id' => 6],
        ];

        foreach ($kelurahans as $kelurahan) {
            Kelurahan::updateOrCreate(
                ['kelurahan' => $kelurahan['kelurahan'], 'kecamatan_id' => $kelurahan['kecamatan_id']],
                $kelurahan
            );
        }
    }
}
