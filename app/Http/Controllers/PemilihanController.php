<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kandidat;
use App\Models\M_mahasiswa;
use App\Voting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PemilihanController extends Controller
{
    public function index()
    {
        $title = 'Pemilihan kandidat';
        $kandidat = Kandidat::orderBy('no_urut','asc')->get();

        $sudah_memilih = Voting::where('user_id', Auth::user()->id)->first();

        return view('pemilihan.index', compact('title', 'kandidat', 'sudah_memilih'));
    }

    public function get_visi_misi_by_kandidat($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        $visi_misi = $kandidat->visi_misi;

        return response()->json($visi_misi);
    }

    private function cek_apakah_kandidat($user_id)
    {
        $mhs = M_mahasiswa::where('user_id', $user_id)->first()->id;

        $apakah_kandidat = Kandidat::where('calon_ketua', $mhs)->orWhere('calon_wakil', $mhs)->first();

        return $apakah_kandidat;
    }

    private function cek_apakah_pemilihan_double($user_id)
    {
        $cek_voting = Voting::where('user_id', $user_id)->first();

        return $cek_voting;
    }

    public function store($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        $kandidat_id = $kandidat->id;
        $user_id = Auth::user()->id;


        if( $this->cek_apakah_kandidat($user_id) ) {
            Session::flash('gagal', 'Kandidat dilarang untuk memilih');

            return redirect()->back();
        }

        if( $this->cek_apakah_pemilihan_double($user_id) ) {
            Session::flash('gagal', 'Pemilihan tidak boleh dua kali');

            return redirect()->back();
        }

        $voting = new Voting();
        $voting->kandidat_id = $kandidat_id;
        $voting->user_id = $user_id;
        $voting->save();

        Session::flash('sukses', 'Pemilihan berhasil dilakukan');

        return redirect()->back();
    }
}
