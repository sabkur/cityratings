<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Investasi;
use App\Infrastruktur;
use App\Pariwisata;
use App\PelayananPublik;
use App\Kota;
use App\RatingKota;
use App\BobotKriteria;
use App\BobotKriteriaInvestasi;
use App\BobotKriteriaInfrastruktur;

class TopsisController extends Controller
{   
    public function hitung_indeks($table_name){
        // Menginisialisasi model bobot kriteria yang akan dipakai
        if($table_name == "Investasi"){
            $kriteria_tmp = BobotKriteriaInvestasi::all();
        }else if($table_name == "Infrastruktur"){
            $kriteria_tmp = BobotKriteriaInfrastruktur::all();
        }else{
            $kriteria_tmp = BobotKriteria::all();
        }
        // Mengambil data pada bobotkriteria (investasi, infrastruktur atau bobot utama)
        $i = 0;
        foreach($kriteria_tmp as $kriteria_dump){
            $bobot[$i] =  $kriteria_dump->bobot;
            $atribut[$i] = $kriteria_dump->atribut;
            $i++;
        }

        $obj = $this->getArrayObject($table_name);
        $R = $this->makeNormalizedDecisionMatrix($table_name,$obj);
        $Y = $this->makeWeightedDecisionMatrix($bobot,$table_name,$R);
        $Apositif = $this->calculatePositiveIdealSolution($atribut,$Y);
        $Anegatif = $this->calculateNegativeIdealSolution($atribut,$Y);
        $Dpositif = $this->calculatePositiveDistances($Apositif,$Y);
        $Dnegatif = $this->calculateNegativeDistances($Anegatif,$Y);
        $Vindeks = $this->calculatePreferencedIndexes($Dpositif,$Dnegatif);
        
        // Simpan nilai indeks (Vindeks) pada table
        if($table_name == "Investasi"){
            $table = Investasi::all();
        }else if($table_name == "Infrastruktur"){
            $table = Infrastruktur::all();
        }else{
            $table = RatingKota::all();
        }

        $i = 0;
        foreach($table as $data){
            $data->indeks = $Vindeks[$i];
            $data->update();
            $i++;
        }

        if($table_name != "All"){
            return view('manajemen_data/manajemen_'.$table_name,['data'=>$table]);
        }else{
            $daftar_kota = RatingKota::with('kota')->orderBy('indeks','desc')->get();
            $daftar_infrastruktur = Infrastruktur::with('kota')->orderBy('indeks','desc')->get();
            $daftar_investasi = Investasi::with('kota')->orderBy('indeks','desc')->get();
            $daftar_pariwisata = Pariwisata::with('kota')->orderBy('indeks','desc')->get();
            $daftar_pelayanan_publik = PelayananPublik::with('kota')->orderBy('indeks','desc')->get();
    
            return view('dashboard/beranda', [
                'daftar_kota' => $daftar_kota,
                'daftar_infrastruktur' => $daftar_infrastruktur,
                'daftar_investasi' => $daftar_investasi,
                'daftar_pariwisata' => $daftar_pariwisata,
                'daftar_pelayanan_publik' => $daftar_pelayanan_publik
            ]);
        }

    }

    public function getArrayObject($table_name){

        $investasi_tmp = Investasi::all();
        $infrastruktur_tmp = Infrastruktur::all();
        $pariwisata_tmp = Pariwisata::all();
        $pelayanan_publik_tmp = PelayananPublik::all();

        $i = 0;
        foreach($investasi_tmp as $investasi_dump){
            $investasi[$i][0] = $investasi_dump->angkatan_kerja;
            $investasi[$i][1] = $investasi_dump->UMR;
            $investasi[$i][2] = $investasi_dump->PDRB;

            $allObj[$i][0] = $investasi_dump->indeks;
            $i++;
        }
        $i = 0;
        foreach($infrastruktur_tmp as $infrastruktur_dump){
            $infrastruktur[$i][0] = $infrastruktur_dump->kesehatan;
            $infrastruktur[$i][1] = $infrastruktur_dump->pendidikan;
            $infrastruktur[$i][2] = $infrastruktur_dump->akses_jalan;

            $allObj[$i][1] = $infrastruktur_dump->indeks;
            $i++;
        }
        $i = 0;
        foreach($pariwisata_tmp as $pariwisata_dump){
            $allObj[$i][2] = $pariwisata_dump->indeks;
            $i++;
        }
        $i = 0;
        foreach($pelayanan_publik_tmp as $pelayanan_publik_dump){
            $allObj[$i][3] = $pelayanan_publik_dump->indeks;
            $i++;
        }

        if($table_name == "Investasi"){
            return $investasi;
        }else if($table_name == "Infrastruktur"){   
            return $infrastruktur;
        }else{
            return $allObj;
        }
    }

    public function makeNormalizedDecisionMatrix($table_name,$obj){

        for($i=0; $i<sizeof($obj[0]); $i++){
            for($j=0; $j<sizeof($obj); $j++){
                $total_xij = 0;
                for($k=0; $k<sizeof($obj); $k++){
                    $total_xij = $total_xij + pow($obj[$k][$i],2);
                }
                $akar_total_xij = sqrt($total_xij);
                $R[$j][$i] = $obj[$j][$i] /  $akar_total_xij;
            }
        }
        return $R;
    }

    public function makeWeightedDecisionMatrix($bobot,$table_name,$R){
        // dd($bobot);
        for($i=0; $i<sizeof($R); $i++){
            for($j=0; $j<sizeof($R[0]); $j++){
                $Y[$i][$j] = $bobot[$j] * $R[$i][$j];
            }
        }
        return $Y;
    }

    public function calculatePositiveIdealSolution($atribut,$Y){
        //mapping alternatives value in a criteria to an array
        for($i=0; $i<sizeof($Y[0]); $i++){
            for($j=0; $j<sizeof($Y); $j++){
                $alt[$i][$j] = $Y[$j][$i];   
            }
        }
        //find y(i)+
        for($i=0; $i<sizeof($Y[0]); $i++){
            if($atribut[$i] == "KEUNTUNGAN"){
                $y[$i] = max($alt[$i]);
            }else{
                $y[$i] = min($alt[$i]);
            }
        }

        return $y;
    }

    public function calculateNegativeIdealSolution($atribut,$Y){
         //mapping alternatives value in a criteria to an array
         for($i=0; $i<sizeof($Y[0]); $i++){
            for($j=0; $j<sizeof($Y); $j++){
                $alt[$i][$j] = $Y[$j][$i];   
            }
        }
        //find y(i)-
        for($i=0; $i<sizeof($Y[0]); $i++){
            if($atribut[$i] == "KEUNTUNGAN"){
                $y[$i] = min($alt[$i]);
            }else{
                $y[$i] = max($alt[$i]);
            }
        }

        return $y;
    }

    public function calculatePositiveDistances($Apositif,$Y){
        for($i=0; $i<sizeof($Y); $i++){
            $total_selisih_kuadrat = 0;
            for($j=0; $j<sizeof($Y[0]); $j++){
                $selisih_kuadrat = pow(($Apositif[$j] - $Y[$i][$j]),2);
                $total_selisih_kuadrat = $total_selisih_kuadrat +  $selisih_kuadrat;
            }
            $Dpositif[$i] = sqrt($total_selisih_kuadrat);
        }
        return $Dpositif; 
    }
    
    public function calculateNegativeDistances($Anegatif,$Y){
        for($i=0; $i<sizeof($Y); $i++){
            $total_selisih_kuadrat = 0;
            for($j=0; $j<sizeof($Y[0]); $j++){
                $selisih_kuadrat = pow(($Y[$i][$j] - $Anegatif[$j]),2);
                $total_selisih_kuadrat = $total_selisih_kuadrat +  $selisih_kuadrat;
            }
            $Dnegatif[$i] = sqrt($total_selisih_kuadrat);
        }
        return $Dnegatif;
    }
    
    public function calculatePreferencedIndexes($Dpositif,$Dnegatif){
        for($i=0; $i<sizeof($Dpositif); $i++){
            $Vindeks[$i] = $Dnegatif[$i] / ($Dnegatif[$i] + $Dpositif[$i]);
        }
        return $Vindeks;
    }
    
   
}
