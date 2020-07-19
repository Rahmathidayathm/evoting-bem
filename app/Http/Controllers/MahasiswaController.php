<?php

namespace App\Http\Controllers;

use App\Models\M_mahasiswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MahasiswaController extends Controller
{
    public function index()
    {
        $title = 'List data mahasiswa';
        $data = M_mahasiswa::orderBy('nama', 'asc')->get();

        return view('mahasiswa.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Data Mahasiswa';

        return view('mahasiswa.add', compact('title'));
    }

    public function store(Request $request)
    {
        $nim = $request->nim;
        $nama = $request->nama;
        $no_telp = $request->no_telp;
        $alamat = $request->alamat;

        $file = $request->file('foto');

        if( $file ) {
            $filename = rand() . $file->getClientOriginalName();
            $file->move('foto_mahasiswa', $filename);
            $foto = 'foto_mahasiswa/' . $filename;
        } else {
            $foto = '';
        }

        $user = new User();
        $user->email = $nim;
        $user->name = $nama;
        $user->password = bcrypt('123');
        $user->save();

        $user->mhs()->create([
            'nim' => $nim,
            'nama' => $nama,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'photo' => $foto
        ]);

        Session::flash('sukses', 'data berhasil ditambahkan');

        return redirect('mahasiswa/add');
    }

    public function edit($id)
    {
        $title = 'Edit data mahasiswa';
        $dt = M_mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $nim = $request->nim;
        $nama = $request->nama;
        $no_telp = $request->no_telp;
        $alamat = $request->alamat;

        $file = $request->file('foto');

        $data = M_mahasiswa::findOrFail($id);

        if( $file ) {
            $filename = rand() . $file->getClientOriginalName();
            $file->move('foto_mahasiswa', $filename);
            $foto = 'foto_mahasiswa/' . $filename;
        } else {
            $foto = $data->photo;
        }

        $data = M_mahasiswa::findOrFail($id);
        $data->nim = $nim;
        $data->nama = $nama;
        $data->no_telp = $no_telp;
        $data->alamat = $alamat;
        $data->photo = $foto;


        $data->save();

        $data->user()->update([
            'name' => $nama,
            'email' => $nim
        ]);

        Session::flash('sukses', 'data berhasil diedit');

        return redirect('mahasiswa');
    }

    public function delete($id)
    {
        $dt = M_mahasiswa::findOrFail($id);
        $dt->delete();

        Session::flash('sukses', 'Data berhasil dihapus');

        return redirect()->back();
    }
}
