@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('mahasiswa') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">
                <form method="post" action="{{ url('mahasiswa/add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                              <label for="nim">NIM</label>
                              <input type="number" name="nim" class="form-control" id="nim" placeholder="NIM">
                            </div>
                            <div class="form-group">
                              <label for="nama">Nama</label>
                              <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                              <label for="foto">Foto</label>
                              <input type="file" name="foto" id="foto">
                            </div>
                          </div>
                          <!-- /.box-body -->

                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                              <label for="no_telp">No. Telepon</label>
                              <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="No. Telepon">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="5"></textarea>
                            </div>
                          </div>
                          <!-- /.box-body -->
                    </div>
                </form>
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
