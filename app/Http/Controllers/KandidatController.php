<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\M_mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KandidatController extends Controller
{
    public function index()
    {
        $title = 'List data kandidat';
        $kandidat = Kandidat::orderBy('no_urut', 'asc')->get();

        return view('kandidat.index', compact('title', 'kandidat'));
    }

    public function show($id)
    {
        $title = 'Data kandidat';
        $kandidat = Kandidat::findOrFail($id);

        return view('kandidat.detail', compact('title', 'kandidat'));
    }

    public function add()
    {
        $title = 'Tambah kandidat';
        $mahasiswa = M_mahasiswa::orderBy('nama', 'asc')->get();

        return view('kandidat.add', compact('title', 'mahasiswa'));
    }

    public function store(Request $request)
    {
        $no_urut = $request->no_urut;
        $calon_ketua = $request->calon_ketua;
        $calon_wakil = $request->calon_wakil;
        $visi_misi = $request->visi_misi;

        $kandidat = new Kandidat();
        $kandidat->no_urut = $no_urut;
        $kandidat->calon_ketua = $calon_ketua;
        $kandidat->calon_wakil = $calon_wakil;
        $kandidat->visi_misi = $visi_misi;
        $kandidat->save();

        Session::flash('sukses', 'Data berhasil ditambahkan');

        return redirect('kandidat/add');
    }

    public function edit($id)
    {
        $title = 'Edit kandidat';
        $mahasiswa = M_mahasiswa::orderBy('nama','asc')->get();
        $kandidat = Kandidat::findOrFail($id);

        return view('kandidat.edit', compact('title','mahasiswa', 'kandidat'));
    }

    public function update(Request $request, $id)
    {
        $no_urut = $request->no_urut;
        $calon_ketua = $request->calon_ketua;
        $calon_wakil = $request->calon_wakil;
        $visi_misi = $request->visi_misi;

        $kandidat = Kandidat::findOrFail($id);
        $kandidat->no_urut = $no_urut;
        $kandidat->calon_ketua = $calon_ketua;
        $kandidat->calon_wakil = $calon_wakil;
        $kandidat->visi_misi = $visi_misi;
        $kandidat->save();

        Session::flash('sukses', 'Kandidat berhasil diedit');

        return redirect()->back();
    }

    public function delete($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        $kandidat->delete();

        Session::flash('sukses', 'Kandidat berhasil dihapus');

        return redirect()->back();
    }
}
