<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BobotKriteria;
use App\BobotKriteriaInfrastruktur;
use App\BobotKriteriaInvestasi;

class BobotController extends Controller
{

    public function index()
    {
        $bobot_kriteria = BobotKriteria::all();

        return view('manajemen_bobot/manajemen_bobot', [
            'bobot_kriteria' => $bobot_kriteria
        ]);
    }

    public function indexInvestasi()
    {
        $bobot_kriteria = BobotKriteriaInvestasi::all();

        return view('manajemen_bobot/manajemen_bobot_investasi', [
            'bobot_kriteria' => $bobot_kriteria
        ]);
    }

    public function indexInfrastruktur()
    {
        $bobot_kriteria = BobotKriteriaInfrastruktur::all();

        return view('manajemen_bobot/manajemen_bobot_infrastruktur', [
            'bobot_kriteria' => $bobot_kriteria
        ]);
    }

    public function updateBobot(Request $request){
        $bobotK = BobotKriteria::where('kriteria','INVESTASI')->first();
        $bobotK->bobot = $request->bobot1;
        $bobotK->atribut = $request->atribut1;
        $bobotK->update();

        $bobotK = BobotKriteria::where('kriteria','INFRASTRUKTUR')->first();
        $bobotK->bobot = $request->bobot2;
        $bobotK->atribut = $request->atribut2;;
        $bobotK->update();

        $bobotK = BobotKriteria::where('kriteria','PARIWISATA')->first();
        $bobotK->bobot = $request->bobot3;
        $bobotK->atribut = $request->atribut3;
        $bobotK->update();

        $bobotK = BobotKriteria::where('kriteria','PELAYANAN PUBLIK')->first();
        $bobotK->bobot = $request->bobot4;
        $bobotK->atribut = $request->atribut4;
        $bobotK->update();

        return redirect('/manajemen_bobot');
    }

    public function updateBobotInfrastruktur(Request $request){
        $bobotK = BobotKriteriaInfrastruktur::where('kriteria','KESEHATAN')->first();
        $bobotK->bobot = $request->bobot1;
        $bobotK->atribut = $request->atribut1;
        $bobotK->update();

        $bobotK = BobotKriteriaInfrastruktur::where('kriteria','PENDIDIKAN')->first();
        $bobotK->bobot = $request->bobot2;
        $bobotK->atribut = $request->atribut2;;
        $bobotK->update();

        $bobotK = BobotKriteriaInfrastruktur::where('kriteria','AKSES_JALAN')->first();
        $bobotK->bobot = $request->bobot3;
        $bobotK->atribut = $request->atribut3;
        $bobotK->update();

        return redirect('/manajemen_bobot_infrastruktur');
    }

    public function updateBobotInvestasi(Request $request){
        $bobotK = BobotKriteriaInvestasi::where('kriteria','ANGKATAN_KERJA')->first();
        $bobotK->bobot = $request->bobot1;
        $bobotK->atribut = $request->atribut1;
        $bobotK->update();

        $bobotK = BobotKriteriaInvestasi::where('kriteria','UMR')->first();
        $bobotK->bobot = $request->bobot2;
        $bobotK->atribut = $request->atribut2;;
        $bobotK->update();

        $bobotK = BobotKriteriaInvestasi::where('kriteria','PDRB')->first();
        $bobotK->bobot = $request->bobot3;
        $bobotK->atribut = $request->atribut3;
        $bobotK->update();

        return redirect('/manajemen_bobot_investasi');
    }

    
}
