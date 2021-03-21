<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Investasi;
use App\Infrastruktur;
use App\Pariwisata;
use App\PelayananPublik;
use App\Kota;
use App\RatingKota;
use Auth;
use App\User;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function beranda()
    {
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

    public function data_kota()
    {
        $daftar_kota = Kota::all();
        return view('manajemen_data/manajemen_kota',['daftar_kota'=>$daftar_kota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import_data_kota(Request $request)
    {
        $kota = new Kota;

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            dd(size(Storage::url($filename)));
            // if(size())
        }

        //--------------------------------------------
        // $filename=$_FILES["file"]["tmp_name"];	//	


        // if($_FILES["file"]["size"] > 0)
        // {
        //     $file = fopen($filename, "r");
        //     while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
        //     {
    
    
        //         $sql = "INSERT into investasi (ID_KOTA,ANGKATAN_KERJA,UMR,PDRB,TAHUN) 
        //         values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
        //         $result = mysqli_query($conn, $sql);
        //         if(!isset($result))
        //         {
        //             echo "<script type=\"text/javascript\">
        //             alert(\"Invalid File:Please Upload CSV File.\");
        //             window.location = \"../tampilan/daftar_investasi.php\"
        //             </script>";		
        //         }
        //         else {
        //             echo "<script type=\"text/javascript\">
        //             alert(\"CSV File has been successfully Imported.\");
        //             window.location = \"../tampilan/daftar_investasi.php\"
        //             </script>";
        //         }
        //     }
    
        //     fclose($file);	
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request){
        // $user = new user;
        // $user->name = 'sabri';
        // $user->email = 'sabri@gmail.com';
        // $user->password = bcrypt('1234');
        // $user->username = 'icap';

        // $user->save();

        if(auth()->attempt(['username' => $request->username, 'password' => $request->password])){

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
        return redirect()->back();
    }

    public function logout(){
        auth()->logout();
        return view('profile/login');
    }
}
