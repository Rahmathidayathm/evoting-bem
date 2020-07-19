@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('mahasiswa/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                </p>
            </div>
            <div class="box-body">
                <table class="table myTable">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $data as $e=>$dt )
                        <tr>
                            <td>
                                <p>
                                    <a href="{{ url('mahasiswa/' . $dt->id) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>

                                    <a href="{{ url('mahasiswa/' . $dt->id) }}" class="btn btn-xs btn-danger btn-hapus"><i class="fa fa-trash"></i></a>
                                </p>
                            </td>
                            <td>{{ $e + 1 }}</td>
                            <td>
                                <img src="{{ asset($dt->photo) }}" width="100" alt="">
                            </td>
                            <td>{{ $dt->nama }}</td>
                            <td>{{ $dt->nim }}</td>
                            <td>{{ $dt->alamat }}</td>
                            <td>{{ $dt->no_telp }}</td>
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
