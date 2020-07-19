@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('kandidat') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">
                <form method="post" action="{{ url('kandidat/'. $kandidat->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                      <div class="form-group">
                        <label for="no_urut">No. Urut</label>
                        <input type="number" value="{{ $kandidat->no_urut }}" class="form-control" name="no_urut" id="no_urut" placeholder="No. Urut">
                      </div>
                      <div class="form-group">
                        <label for="calon_ketua">Calon Ketua</label>
                        <select name="calon_ketua" id="calon_ketua" class="form-control select2">
                            @foreach( $mahasiswa as $mhs )
                                <option value="{{ $mhs->id }}" {{ ($kandidat->mhs_calon_ketua->id === $mhs->id) ? 'selected' : '' }} >{{ $mhs->nama }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="calon_wakil">Calon Wakil</label>
                        <select name="calon_wakil" id="calon_wakil" class="form-control select2">
                            @foreach( $mahasiswa as $mhs )
                                <option {{ ($kandidat->mhs_calon_wakil->id === $mhs->id) ? 'selected' : '' }} value="{{ $mhs->id }}">{{ $mhs->nama }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                          <label for="visi_misi">Visi dan Misi</label>
                          <textarea name="visi_misi" id="visi_misi" class="form-control summernote">{{ $kandidat->visi_misi }}</textarea>
                      </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>

@endsection
