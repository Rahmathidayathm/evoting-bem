@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('kandidat/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                </p>
            </div>
            <div class="box-body">
                <table class="table myTable">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>No. Urut</th>
                            <th>Calon Ketua</th>
                            <th>Calon Wakil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $kandidat as $e=>$dt )
                        <tr>
                            <td>
                                <p>
                                    <a href="{{ url('kandidat/' . $dt->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>

                                    <a href="{{ url('kandidat/' . $dt->id) }}" class="btn btn-xs btn-danger btn-hapus"><i class="fa fa-trash"></i></a>

                                    <a href="{{ url('kandidat/detail/' . $dt->id) }}" class="btn btn-xs btn-success "><i class="fa fa-eye"></i></a>
                                </p>
                            </td>
                            <td>{{ $dt->no_urut }}</td>
                            <td>{{ $dt->mhs_calon_ketua->nama }} - {{$dt->mhs_calon_ketua->nim }}</td>
                            <td>{{ $dt->mhs_calon_wakil->nama}} - {{$dt->mhs_calon_wakil->nim }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
