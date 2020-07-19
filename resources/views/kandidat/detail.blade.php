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
                <div class="row">
                    <center>
                        <h1>
                            <b>
                                <i>No. Urut {{ $kandidat->no_urut }}</i>
                            </b>
                        </h1>
                    </center>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <center>
                                <h4>
                                    <b>{{ $kandidat->mhs_calon_ketua->nama }}</b>
                                </h4>
                                <img src="{{ asset($kandidat->mhs_calon_ketua->photo) }}" width="200" alt="">
                            </center>
                        </div>
                        <div class="col-md-6">
                            <center>
                                <h4>
                                    <b>{{ $kandidat->mhs_calon_wakil->nama }}</b>
                                </h4>
                                <img src="{{ asset($kandidat->mhs_calon_wakil->photo) }}" width="200" alt="">
                            </center>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <center>
                            <h4>
                                <b>Visi dan Misi</b>
                            </h4>
                            {!! $kandidat->visi_misi !!}
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){

        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

    })
</script>

@endsection
