@extends('layouts.app')

@section('datacuti')
active
@stop

@section('title')
<h4 class="title" style="font-family: sans-serif; margin-top: 14px; margin-left:7px;">Data Cuti</h4>


@stop

@section('modal')
<div class="modal fade modal-mini modal-primary" id="setuju" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="content">
                        <form enctype="multipart/form-data" action="{{route('noSurat')}}" method="POST">
                            @csrf
                            <input type="hidden" id="aidi" value="" name="id">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 style="text-align:center">Tambah Nomor dan Tanggal Surat</h4>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nomor Surat</label>
                                        <input type="text" class="form-control" placeholder="Nomor Surat" name="nomor_surat">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggal Surat</label>
                                        <input type="date" class="form-control" placeholder="Tanggal Surat" name="tanggal_surat">
                                    </div>
                                </div>
                            </div>

                            <button style="margin-top:20px" type="submit" class="btn btn-primary btn-fill pull-right">Simpan</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('modal2')
<div class="modal fade modal-mini modal-primary" id="myModal2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p>Apakah anda yakin untuk menghapus data cuti ini?</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('hapus.cuti')}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" class="id-cuti" name="id" value="">
                    <button type="submit" class="btn btn-danger btn-fill pull-right">Yakin</button>
                </form>
                <button type="button" class="btn btn-secondary btn-simple pull-right" data-dismiss="modal">Tutup</button>

            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="card">

<div class="content table-responsive">
        @if(session('status_fail'))
        <div class="alert alert-danger">
            {{session('status_fail')}}
        </div>
        @endif
    <table class="table table-hover table-striped">
        <thead>
            <th>NO</th>
            <th>NIP</th>
            <th>NAMA</th>
            <th>JABATAN</th>
            <th style="width=50px;">JENIS CUTI</th>
            <th>ALASAN</th>
            <th>FORM</th>
            <th>ATASAN 1</th>
            <th>ATASAN 2</th>
           <th>HAPUS</th>
           <th>CETAK SURAT </th>
        </thead>
        <tbody>
                @foreach($cuti as $c)
                    @if(!$c->user->role)


                   <tr>

                        <td>{{$i++}}</td>
                        <td>{{$c->user->nip}}</td>
                        <td>{{$c->user->nama}}</td>
                        <td>{{$c->user->jabatan}}</td>
                        <td>{{$c->kategori}}</td>
                   <td><button type="button" style="background-color: Transparent; border: none" class="popover-bottom" data-toggle="popover" data-content="{{$c->alasan}}" data-trigger="hover">{{substr($c->alasan, 0, 10).'...'}}</button></td>
                   <td>
                      <a href="{{route('pdf.print', $c->id_cuti)}}" target="_blank" style="font-size: 10px; font-weight: bold" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat</a>
                   </td>

                    @if(empty($c->user->atasan_2))

                        <td>
                            @if($c->progress == 0)
                           <div class="select">
                            <a href="#" style="font-size: 10px; font-weight: bold" data-toggle="popover2" data-id="{{$c->id_cuti}}" class="btn btn-warning konfir2"><i class="fa fa-check-circle"></i> Konfirmasi</a>
                            </div>
                            @elseif($c->progress == 2 || $c->kategori == "Cuti Sakit")
                            <span  class="label label-success">Disetujui</span>
                            @elseif($c->progress == 4)
                            <span  class="label label-primary">Dirubah</span>
                            @elseif($c->progress == 6)
                            <span  class="label label-warning">Ditangguhkan</span>
                            @elseif($c->progress == 99)
                            <span  class="label label-danger">Ditolak</span>
                            @endif
                        </td>
                        <td>
                        </td>

                    @else

                    <td>
                        <span style="display:{{$c->progress == 1 || $c->progress == 2 || $c->progress == 4 || $c->progress == 6 || $c->progress == 99 || $c->kategori == "Cuti Sakit" ? '' : 'none'}}" class="label label-success">Disetujui</span>
                        <span style="display:{{$c->progress == 3 ? '' : 'none'}}" class="label label-primary">Dirubah</span>
                        <span style="display:{{$c->progress == 5 ? '' : 'none'}}" class="label label-warning">Ditangguhkan</span>
                        <span style="display:{{$c->progress == 98 ? '' : 'none'}}" class="label label-danger">Ditolak</span>
                        <div class="select" style="display:{{$c->progress == 0 ? '' : 'none'}}">
                            <a href="#" style="font-size: 10px; font-weight: bold" data-toggle="popover" data-id="{{$c->id_cuti}}" class="btn btn-warning konfir1"><i class="fa fa-check-circle"></i> Konfirmasi</a>

                        </div>
                    </td>
                    <td>


                        @if($c->progress==98)
                        <span class="label label-danger">Ditolak</span>
                        @elseif($c->progress==3)
                        <span class="label label-primary">Dirubah</span>
                        @elseif($c->progress==5)
                        <span class="label label-warning">Ditangguhkan</span>
                        @else
                        <div class="select">
                            @if($c->progress == 2 || $c->kategori == "Cuti Sakit")
                            <span  class="label label-success">Disetujui</span>
                            @elseif($c->progress == 4)
                            <span  class="label label-primary">Dirubah</span>
                            @elseif($c->progress == 6)
                            <span  class="label label-warning">Ditangguhkan</span>
                            @elseif($c->progress == 99)
                            <span  class="label label-danger">Ditolak</span>
                            @else
                            <a href="#" style="font-size: 10px; font-weight: bold; " data-toggle="popover2" data-id="{{$c->id_cuti}}" class="btn btn-warning konfir2"><i class="fa fa-check-circle"></i> Konfirmasi</a>
                            @endif
                        </div>
                        @endif
                    </td>
                    @endif
                    <td>
                    <button data-id="{{$c->id_cuti}}" style="font-size: 12px; font-weight: bold" class="btn btn-danger btn-fill btn-xs hapus_cuti" data-toggle="modal"
                                    data-target="#myModal2">Hapus</button>
                            {{-- <a href="{{route('hapus.cuti', $c->id_cuti)}}" data-method="delete" type="button" class="btn btn-danger btn-fill btn-xs" name="id" >Hapus</a> --}}
                        </td>
                        <td> <a href="{{route('surat.print', $c->id_cuti)}}" class="btn btn-warning btn-fill btn-xs" target="_blank" style="display:{{$c->progress==2 && $c->kategori != 'Cuti Sakit' ? '' : 'none'}}"><i class="fas fa-file-pdf"> &nbsp;</i>
          Cetak</a></td>
                    </tr>


                       @endif
                 @endforeach
        </tbody>
    </table>

    <div class="text-center">
            {{ $cuti->links() }}
    </div>


</div>
</div>
@stop



@push('scripts')
<script type="text/javascript">

$(document).ready(function () {
            $('.hapus_cuti').on('click', function () {
                var id = $(this).data('id');
                $('.id-cuti').val(id);
            });
});
    $(document).ready(function(){

        $(".popover-bottom").popover({
            placement : 'bottom'
        });

        $(document).on('click', '.konfir1', function(){
            id = $(this).data('id');
            console.log(id);
            $('.btn-disetujui').attr('href', '{{url("/")}}/admin/disetujui/'+id);
            $('.btn-dirubah').attr('href', '{{url("/")}}/admin/dirubah/'+id);
            $('.btn-ditangguhkan').attr('href', '{{url("/")}}/admin/ditangguhkan/'+id);
            $('.btn-ditolak').attr('href', '{{url("/")}}/admin/ditolak/'+id);
        });

        $(document).on('click', '.konfir2', function(){
            id2 = $(this).data('id');
            console.log(id2);
            $('.btn2-disetujui').attr('id', id2);
            $('.btn2-dirubah').attr('href', '{{url("/")}}/admin/dirubah2/'+id2);
            $('.btn2-ditangguhkan').attr('href', '{{url("/")}}/admin/ditangguhkan2/'+id2);
            $('.btn2-ditolak').attr('href', '{{url("/")}}/admin/ditolak2/'+id2);
        });

        $(document).on('click', '.setuju2', function(){
            id3 = $(this).attr('id');
            console.log(id3);
            $('#aidi').val(id3);
        });
    });


      $(document).ready(function(){
         $('[data-toggle="popover"]').popover({
               placement : 'bottom',
               html : true,
               title : 'Konfirmasi <a href="#" class="close" data-dismiss="alert">&times;</a>',
               content : '<a href="" class="btn btn-success btn-fill btn-disetujui"><i class="fa fa-check"></i> Disetujui</a><br><a class="btn btn-info btn-fill btn-dirubah" style="margin-top:10px"><i class="fa fa-edit"></i> Dirubah</a><br><a class="btn btn-warning btn-fill btn-ditangguhkan" style="margin-top:10px"><i class="fa fa-arrow-left"></i> Ditangguhkan</button><br><a class="btn btn-danger btn-fill btn-ditolak" style="margin-top:10px"><i class="fa fa-times"></i> Ditolak</a>'
           });
        $(document).on("click", ".popover .close" , function(){
            $(this).parents(".popover").popover('hide');
        });

         $('[data-toggle="popover2"]').popover({
               placement : 'bottom',
               html : true,
               title : 'Konfirmasi <a href="#" class="close" data-dismiss="alert">&times;</a>',
               content : '<a id="" class="btn btn-success btn-fill btn2-disetujui setuju2" data-toggle="modal" data-target="#setuju"><i class="fa fa-check"></i> Disetujui</a><br><a class="btn btn-info btn-fill btn2-dirubah" style="margin-top:10px"><i class="fa fa-edit"></i> Dirubah</a><br><a class="btn btn-warning btn-fill btn2-ditangguhkan" style="margin-top:10px"><i class="fa fa-arrow-left"></i> Ditangguhkan</button><br><a class="btn btn-danger btn-fill btn2-ditolak" style="margin-top:10px"><i class="fa fa-times"></i> Ditolak</a>'
           });
        $(document).on("click", ".popover2 .close" , function(){
            $(this).parents(".popover2").popover('hide');
        });
      });
    </script>

@endpush
