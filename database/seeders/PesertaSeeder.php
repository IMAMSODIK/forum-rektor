<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $satker = ["UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan", "UIN Sumatera Utara Medan"];
        $jabatan = ["Panitia", "Panitia", "Panitia", "Panitia", "Panitia", "Panitia", "Panitia", "Panitia", "Panitia", "Panitia", "Panitia", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta", "Peserta"];
        $pangkat = ["IV", "IV", "IV", "IV", "IV", "IV", "III", "III", "IV", "IX", "IV", "IV", "IV", "IV", "IV", "IV", "IV", "IV", "IV", "IV", "IV", "IV", "III", "IV", "IV", "III", "IV", "IV", "III", "III", "III", "IV", "IV", "III", "IV", "III", "III", "III", "III", "IX", "IX", "IX", "III", "IV", "IX", "IX", "IX", "-", "IX", "III", "IX", "X", "VII", "III", "-", "-", "-", "-"];
        $nip = ["197405172003122003", "197911292009121003", "197212041998031002", "196907121993031002", "196610231986031001", "197803102003121013", "198108122009011013", "197503212003121002", "197203031998032003", "198805142025211010", "197307192000031002", "196507051993031003", "196901111991031004", "197011101997032004", "197505312007101001", "197602222007011018", "196906291997031003", "198407062009121006", "197107272007011031", "197111041997032002", "197703212009011008", "198212092009122002", "197405062011011001", "197204062007011047", "197604232003121002", "198304152011011008", "198205152009121007", "198412242015031004", "199205062019031014", "197902172005012004", "199009262018031001", "196606241994031001", "196912082007011037", "198509182011012012", "197305072000121001", "198310132009101002", "198504132011011009", "197412152009101002", "197705222007011020", "199304172023211024", "199103192025211001", "198101012024211022", "199710272022032001", "197006122001122002", "199510222023212025", "199112042025212005", "199710272023212015", "-", "199606232025212007", "198101072005021003", "199804092024211015", "199507112025212003", "198804112025212002", "199608092025051004", "-", "-", "-", "-"];
        $nama = ["Prof. Dr. Nurhayati, M.Ag.", "Dr. Abrar M. Dawud Faza, M.A", "Prof. Dr. Azhari Akmal Tarigan, M.Ag", "Dr. H. Ibnu Sadan, M.Pd.", "Dr. Tohar Bayoangin, M.Ag", "Abdul Basid, S.Pd, M.Pd", "Darwis, S.E., M.Si.", "Muhammad Akhir Nasution, S.Pd.I", "Hafni Hafsah, S.Ag., M.A.", "Dwi Sandhi Romadhon, S.E.", "Illyas Gompar Harahap, S.Pd.I, M.Pd", "Prof. Dr. Katimin, M.A.", "Prof. Dr. H. Muzakkir, M.Ag.", "Prof. Dr. Tien Rafida, M.Hum.", "Prof. Dr. Syafruddin Syam, M.Ag.", "Prof. Dr. Hasan Sazali, MA.", "Dr. Maraimbang, MA.", "Prof. Dr. Syukri Albani Nasution, MA", "Prof. Dr. Mesiono, S. Ag, M.Pd.", "Dr. Nursapia Harahap, MA.", "Prof. Dr. Zulham, M.Hum.", "Prof. Dr. Nurussakinah Daulay,M.Psi", "Hotbin Hasugian, S.E., M.Si.", "Prof. Dr. Nispul Khoiri, M.Ag.", "Prof. Dr. Muhammad Yafiz, M.Ag.", "Muhammad Ikhsan, S.T., M.Kom.", "Prof. Dr. Watni Marpaung, S.H.I., M.A.", "Dr. Fauzi Arif Lubis, M.A.", "Idris Siregar, M.Ag.", "Hildayati Raudah Hutasoit, S.Sos.", "Rahmat Daim Harahap, S.E.I., M.Ak.", "Prof. Dr. Ansari, M.A.", "Dr. Syawaluddin Nasution, M.Ag.", "Asmahani Mukhtar Ghaffar, S.E., M.Si.", "Subhan Dawawi, S. Pd.I., M.M.", "Munawir, SE", "Arif Rahman, S.E.", "Syakdun S.Pd.I., M.AP.", "Mardi, SE", "Akhyar Aslam Sipahutar, S.T", "Muhammad Yusuf Ramadhan, S.Kom", "Muhammad Arief, S.H", "Nur Faznita Elmi, S.Akun.", "Hj. Ernawati, S.E., M.A.P.", "Heprina Hera Rezeki, S.Akun.", "Sri Cahyanti, S.Sos.I", "Indri Octa Miransyah, S.Pd", "M.Ilham Luthfi", "Safrida, SE", "Ahmad Rizal, S.Si, M.Kom", "Muhammad Ari Ihsan, ST", "dr.rahcmah ubat Harahap", "Syahroini AMK", "Imam El Islami, M. Sos", "Kari Kiraman", "Rahmad Subandri", "Sopyan ", "Suryadi Suryadarma Tanjung"];

        for($i = 0; $i < count($nama) - 1; $i++){
            Peserta::create([
                'nama' => $nama[$i],
                'nip' => $nip[$i],
                'pangkat' => $pangkat[$i],
                'satker' => $satker[$i],
                'jabatan' => $jabatan[$i],
                'no_hp' => $i
            ]);
        }

    }
}
