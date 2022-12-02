<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
date_default_timezone_set('Asia/Jakarta');

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mengembalikan view ke halaman rekomendasi
        return view('rekomendasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //deklarasi variabel
        $keluhan = $request->keluhan;
        $tanggal = date('Y',strtotime($request->tahun));
        $jamu = new Jamu();
        $saran = new Saran();

        $data = [
            'nama_jamu' => $jamu->namaJamu($request->keluhan)['nama_jamu'],
            'khasiat' => $jamu->namaJamu($request->keluhan)['khasiat'],
            'keluhan' => $request->keluhan,
            'umur' => $jamu->umur($request->tahun),
            'saran_penggunaan' => $saran->getSaran($request->keluhan,$request->tahun)
        ];
        
        return view('rekomendasi',compact('data'));
    }
}
class Jamu {
    public function namaJamu($keluhan){
        $data = [];
        if ( $keluhan == 'Keseleo' OR $keluhan == 'kurang nafsu makan'){
            $data['nama_jamu'] = 'Beras Kencur';
            $data['khasiat'] = 'Mengobati keseleo dan mengobati kurang nafsu makan';
        } else if ( $keluhan == 'pegal-pegal'){
            $data['nama_jamu'] = 'Kunyit Asam';
            $data['khasiat'] = 'Mengobati pegal-pegal';
        } else if ( $keluhan == 'darah tinggi' OR $keluhan == 'gula darah'){
            $data['nama_jamu'] = 'Brotowali';
            $data['khasiat'] = 'Darah tinggi dan gula darah';
        } else  if ( $keluhan == 'kram perut' OR $keluhan == 'masuk angin'){
            $data['nama_jamu'] = 'Temulawak';
            $data['khasiat'] = 'Mengobati kram perut dan mengobati masuk angin';
        }

        return $data;
    }

    public function umur($tahunLahir)
    {
        $t1 = date_create($tahunLahir);
        $t2 = date_create(date('Y-m-d'));
        $diff = date_diff($t1,$t2);
        return $diff->y;

    }

}

class Saran extends Jamu {
    public function getSaran($keluhan,$tahunLahir){
        if ( $this->umur($tahunLahir) <=10 ){
            if ( $this->namaJamu($keluhan)['nama_jamu'] == 'Beras Kencur' && $keluhan == 'keseleo'){
                return 'Dioleskan 1X';
            } else {
                return 'Dikonsumsi 1X';
            }
        } else {
            if ( $this->namaJamu($keluhan)['nama_jamu'] == 'Beras Kencur' && $keluhan == 'keseleo'){
                return 'Dioleskan 2X';
            } else {
                return 'Dikonsumsi 2X';
            }
        }
    }
}