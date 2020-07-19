@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">

                @foreach($kandidat as $dt)
                <div  class="row">

                    <center>
                        <h1>
                            <b><i>
                                No Urut {{ $dt->no_urut }}
                            </i></b>

                            <p>
                                <button url="/get_visi_misi_by_kandidat/{{ $dt->id }}" class="btn btn-md btn-flat btn-success btn-visi">Visi dan Misi</button>
                                @if( !$sudah_memilih )
                                    <a href="{{ url('pemilihan/' . $dt->id) }}" class="btn btn-md btn-flat btn-primary">Pilih Kandidat Ini</a>
                                @endif
                            </p>
                        </h1>
                    </center>

                    <div class="col-md-6">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                          <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset($dt->mhs_calon_ketua->photo) }}" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <h3 class="widget-user-username">{{ $dt->mhs_calon_ketua->nama }}</h3>
                          <h5 class="widget-user-desc">Calon Ketua</h5>
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a href="#">Nim : {{ $dt->mhs_calon_ketua->nim }} <span class="pull-right badge bg-blue"></span></a></li>
                            <li><a href="#">Nama : {{ $dt->mhs_calon_ketua->nama }} <span class="pull-right badge bg-aqua"></span></a></li>
                            <li><a href="#">No Telp : {{ $dt->mhs_calon_ketua->no_telp }} <span class="pull-right badge bg-green"></span></a></li>
                            <li><a href="#">Alamat : {{ $dt->mhs_calon_ketua->alamat }} <span class="pull-right badge bg-red"></span></a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>

                    <div class="col-md-6">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                          <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset($dt->mhs_calon_wakil->photo) }}" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <h3 class="widget-user-username">{{ $dt->mhs_calon_wakil->nama }}</h3>
                          <h5 class="widget-user-desc">Lead Calon Wakil Ketua</h5>
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a href="#">Nim : {{ $dt->mhs_calon_wakil->nim }} <span class="pull-right badge bg-blue"></span></a></li>
                            <li><a href="#">Nama : {{ $dt->mhs_calon_wakil->nama }} <span class="pull-right badge bg-aqua"></span></a></li>
                            <li><a href="#">No Telp : {{ $dt->mhs_calon_wakil->no_telp }} <span class="pull-right badge bg-green"></span></a></li>
                            <li><a href="#">Alamat : {{ $dt->mhs_calon_wakil->alamat }} <span class="pull-right badge bg-red"></span></a></li>
                          </ul>
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>

                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

{{-- Visi misi --}}
<div class = "modal fade" id="modal-visi" role = "dialog">
    <div class = "modal-dialog modal-lg">
     <div class = "modal-content">
      <div class = "modal-header">
       <button type = "button" class="close" data-dismiss = "modal">×</button>
       <h4 class = "modal-title">Visi dan Misi</h4>
     </div>
     <div class="modal-body">

     </div>
     <div class="modal-footer">
       <button type = "button" class = "btn btn-primary" data-dismiss = "modal">Close</button>
     </div>
   </div>
 </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){

        $('.btn-visi').click(function(e) {
            e.preventDefault();
            let url = $(this).attr('url');
            $.ajax({
                type: 'get',
                dataType: 'json',
                url: url,
                success: function(data) {
                    $('#modal-visi').find('.modal-body').html(data)
                    $('#modal-visi').modal();
                }
            })
        })

        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

    })
</script>

@endsection
