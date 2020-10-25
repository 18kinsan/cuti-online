@extends('layouts.app')

@section('master')
active
@stop

@section('title')
<h4 class="title" style="font-family: sans-serif; margin-top: 16px; margin-left:7px;">Data Master Pegawai</h4>
@stop

@section('modal1')
<div class="modal fade modal-mini modal-primary" id="myModal1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="content">
                    <form enctype="multipart/form-data" action="{{route('dashboard.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h4 style="text-align:center">Tambah Pegawai</h4>
                                <div class="alert alert-danger nip_err" style="display:none; border-radius: 7px;">
                                    <strong>NIP </strong><span id="nip_validation"></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIP</label>
                                    <input type="text" class="form-control nip_tambah" placeholder="NIP" name="nip" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" placeholder="Nama" name="nama">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control" placeholder="Jabatan" name="jabatan">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>No. Telp</label>
                                    <input type="number" class="form-control" placeholder="No. Telp" name="no_telp">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                              <div class="alert alert-danger nip_err_email" style="display:none; border-radius: 7px;">
                                  <strong>E-Mail </strong><span id="email_validation"></span>
                              </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control email_validation" placeholder="E-mail" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control" placeholder="Tanggal Masuk" name="tgl_masuk">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_masuk">Sisa Cuti Tahun {{date('Y')-2}}</label>
                                    <input type="text" class="form-control" placeholder="Sisa Cuti Tahun {{date('Y')-2}}" name="jumlah_cuti1">
                                    <i style="font-size:10px;color:red">*Bila tidak ada, kosongi atau isi dengan 0</i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_masuk">Sisa Cuti Tahun {{date('Y')-1}}</label>
                                    <input type="text" class="form-control" placeholder="Sisa Cuti Tahun {{date('Y')-1}}" name="jumlah_cuti2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_masuk">Sisa Cuti Tahun {{date('Y')}}</label>
                                    <input type="text" class="form-control" placeholder="Sisa Cuti Tahun {{date('Y')}}" name="jumlah_cuti3">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                    <label>Atasan 1 </label>
                                            <select class="atasan1" style="width:100%" name="atasan1">
                                                <option>-</option>
                                                @foreach ($userAll as $user)
                                                  @if (!$user->role)
                                                      <option value="{{$user->nip}}">{{$user->nama}}</option>
                                                  @endif
                                                @endforeach
                                            </select>
                            </div>

                            <div class="col-md-6">
                                <label>Atasan 2 </label>
                                            <select class="atasan2" style="border:none; width:100%;" name="atasan2">
                                                <option>-</option>
                                                @foreach ($userAll as $user)
                                                  @if (!$user->role)
                                                      <option value="{{$user->nip}}">{{$user->nama}}</option>
                                                  @endif
                                                @endforeach
                                            </select>

                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                            </div>
                        </div>
                        <button style="margin-top:20px" type="submit" class="btn btn-primary btn-fill pull-right simpan-btn">Simpan</button>
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
                <p>Apakah anda yakin untuk menghapus pegawai ini?</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('pegawai.hapus')}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" class="id-pegawai" name="id" value="">
                    <button type="submit" class="btn btn-danger btn-fill pull-right">Yakin</button>
                </form>
                <button type="button" class="btn btn-secondary btn-simple pull-right" data-dismiss="modal">Tutup</button>

            </div>
        </div>
    </div>
</div>
@stop

@section('modal3')
<div class="modal fade modal-mini modal-primary" id="edit-modal" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="content">

                    <form id="form-edit" enctype="multipart/form-data" action="" method="POST">
                        @method('PUT')
                        @csrf
                        <input id="aidi" type="hidden" name="id" value="">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 style="text-align:center;">Ubah Pegawai<h5>
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" placeholder="NIP" name="nip" id="nip" value="" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama"
                                        value="" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" id="jabatan"
                                        value="" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>No. Telp</label>
                                    <input type="number" class="form-control" placeholder="No. Telp" id="no_telp" name="no_telp" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" placeholder="Alamat" id="alamat" name="alamat" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" placeholder="E-mail" name="email" id="email"
                                        value="" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control" placeholder="Tanggal Masuk" name="tgl_masuk" id="tgl_masuk"
                                        value="" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_masuk">Sisa Cuti Tahun {{date('Y')-2}}</label>
                                    <input type="text" class="form-control" value="Sisa Cuti Tahun {{date('Y')-2}}" name="jumlah_cuti1" id="jumlah_cuti1" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_masuk">Sisa Cuti Tahun {{date('Y')-1}}</label>
                                    <input type="text" class="form-control" value="Sisa Cuti Tahun {{date('Y')-1}}" name="jumlah_cuti2" id="jumlah_cuti2" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_masuk">Sisa Cuti Tahun {{date('Y')}}</label>
                                    <input type="text" class="form-control" value="Sisa Cuti Tahun {{date('Y')}}" name="jumlah_cuti3" id="jumlah_cuti3" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                    <label>Atasan 1 </label>
                                            <select class="atasan1" style="width:100%" name="atasan1" required>
                                                <option class="ats_1" value=""></option>
                                                <option value="-">-</option>
                                                @foreach ($userAll as $user)
                                                  @if (!$user->role)
                                                      <option value="{{$user->nip}}">{{$user->nama}}</option>
                                                  @endif
                                                @endforeach
                                            </select>
                            </div>

                            <div class="col-md-6">
                                <label>Atasan 2 </label>
                                            <select class="atasan2" style="border:none; width:100%;" name="atasan2" required>
                                                <option class="ats_2" value=""></option>
                                                <option value="-">-</option>
                                                @foreach ($userAll as $user)
                                                  @if (!$user->role)
                                                      <option value="{{$user->nip}}">{{$user->nama}}</option>
                                                  @endif
                                                @endforeach
                                            </select>

                            </div>
                        </div><br>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Password Baru</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password"
                                        id="password" value="">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                        <button type="submit" class="btn btn-primary btn-fill pull-right"><i class="fa fa-save"></i>
                            Perbarui</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-mini modal-primary" id="lihat-modal" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="content">

                    <form enctype="multipart/form-data" action="" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                            <h5 style="text-align:center;">Lihat Pegawai<h5>
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" placeholder="NIP" name="nip" id="lihat-nip" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" placeholder="Nama" name="nama" id="lihat-nama" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" id="lihat-jabatan" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>No. Telp</label>
                                    <input type="number" class="form-control" placeholder="No. Telp" id="lihat-no_telp" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" placeholder="Alamat" id="lihat-alamat" disabled>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" placeholder="E-mail" name="email" id="lihat-email" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="tgl_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control" placeholder="Tanggal Masuk" name="tgl_masuk" id="lihat-tgl_masuk" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_masuk">Sisa Cuti Tahun {{date('Y')-2}}</label>
                                    <input type="text" class="form-control" placeholder="Sisa Cuti Tahun {{date('Y')-2}}" name="jumlah_cuti1" id="lihat-jumlah_cuti1" value="" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_masuk">Sisa Cuti Tahun {{date('Y')-1}}</label>
                                    <input type="text" class="form-control" placeholder="Sisa Cuti Tahun {{date('Y')-1}}" name="jumlah_cuti2" id="lihat-jumlah_cuti2" value="" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_masuk">Sisa Cuti Tahun {{date('Y')}}</label>
                                    <input type="text" class="form-control" placeholder="Sisa Cuti Tahun {{date('Y')}}" name="jumlah_cuti3" id="lihat-jumlah_cuti3" value="" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="email">Atasan 1</label>
                                    <input type="text" class="form-control" placeholder="Atasan 1" name="email" id="lihat-atasan1" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="email">Atasan 2</label>
                                    <input type="text" class="form-control" placeholder="Atasan 2" name="email" id="lihat-atasan2" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="card">

<div class="content table-responsive">
    @if(session('status_tambah'))
    <div class="alert alert-success">
        {{session('status_tambah')}}
    </div>
    @endif
    @if(session('status_hapus'))
    <div class="alert alert-danger">
        {{session('status_hapus')}}
    </div>
    @endif
    @if(session('status_ubah'))
    <div class="alert alert-info">
        {{session('status_ubah')}}
    </div>
    @endif
    @if(session('status_fail'))
    <div class="alert alert-danger">
        {{session('status_fail')}}
    </div>
    @endif
    <button class="btn btn-primary btn-fill" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus"></i>
        Tambah Pegawai</button><br><br>
    <table class="table table-hover table-striped">
        <thead>
            <th>NO</th>
            <th>NIP</th>
            <th>NAMA</th>
            <th>JABATAN</th>
            <th>KARTU KENDALI</th>
            <th width=30% style="text-align: center">ACTION</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            @if(!$user->role)
            <tr>

                <td>{{$i++}}</td>
                <td>{{$user->nip}}</td>
                <td>{{$user->nama}}</td>
                <td>{{$user->jabatan}}</td>
                <td><a href="{{route('kartukendali.print', $user->id_pegawai)}}" target="_blank" style="font-size: 12px; font-weight: bold" class="btn btn-warning btn-fill"><i class="fa fa-eye"></i>Lihat</a></td>
                <td align="center">
                    <button data-id="{{$user->id_pegawai}}" style="font-size: 12px; font-weight: bold" class="btn btn-info btn-fill lihat-pegawai" data-toggle="modal"
                        data-target="#lihat-modal"><i class="fa fa-eye"></i>Detail</button>
                    <button data-id="{{$user->id_pegawai}}" style="font-size: 12px; font-weight: bold" class="btn btn-primary btn-fill edit-pegawai" data-toggle="modal"
                        data-target="#edit-modal"><i class="fa fa-edit"></i>Ubah</button>
                    <button data-id="{{$user->id_pegawai}}" style="font-size: 12px; font-weight: bold" class="btn btn-danger btn-fill hapus_pegawai" data-toggle="modal"
                        data-target="#myModal2"><i class="fa fa-trash"></i>Hapus</button>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{ $users->links() }}
    </div>
</div>
</div>
@stop
@push('scripts')
<script>
    $(document).ready(function () {
        $('.hapus_pegawai').on('click', function () {
            var id = $(this).data('id');
            $('.id-pegawai').val(id);
        });

        //edit Data
        $('.edit-pegawai').on('click', function () {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('pegawai.edit.data') }}",
                method: "POST",
                data: {
                    id: id
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name=csrf]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                    var atasan1 = $('.atasan1').select2('data');
                    var atasan2 = $('.atasan2').select2('data');
                    $('#aidi').val(id);
                    $('#nip').val(data.nip);
                    $('#nama').val(data.nama);
                    $('#jabatan').val(data.jabatan);
                    $('#no_telp').val(data.no_telp);
                    $('#alamat').val(data.alamat);
                    $('#email').val(data.email);
                    $('#jumlah_cuti1').val(data.jumlah_cuti1);
                    $('#jumlah_cuti2').val(data.jumlah_cuti2);
                    $('#jumlah_cuti3').val(data.jumlah_cuti3);
                    $('.atasan1').val(data.atasan_1_nip).trigger('change');
                    $('.atasan2').val(data.atasan_2_nip).trigger('change');
                    $('#tgl_masuk').val(data.tgl_masuk);
                    $('#form-edit').attr('action', "{!! route('pegawai.update') !!}");
                }
            });
        });

        //lihat Data
        $('.lihat-pegawai').on('click', function () {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('pegawai.edit.data') }}",
                method: "POST",
                data: {
                    id: id
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name=csrf]').attr('content')
                },
                success: function (data) {
                    $('#lihat-nip').val(data.nip);
                    $('#lihat-nama').val(data.nama);
                    $('#lihat-jabatan').val(data.jabatan);
                    $('#lihat-no_telp').val(data.no_telp);
                    $('#lihat-alamat').val(data.alamat);
                    $('#lihat-email').val(data.email);
                    $('#lihat-jumlah_cuti1').val(data.jumlah_cuti1);
                    $('#lihat-jumlah_cuti2').val(data.jumlah_cuti2);
                    $('#lihat-jumlah_cuti3').val(data.jumlah_cuti3);
                    if (data.atasan_1 == '-') {
                       $('#lihat-atasan1').val(' - ');
                    }else {
                       $('#lihat-atasan1').val(data.atasan_1_nip + ' - ' + data.atasan_1);
                    }
                    if (data.atasan_2 == '-') {
                       $('#lihat-atasan2').val(' - ');
                    }else {
                       $('#lihat-atasan2').val(data.atasan_2_nip + ' - ' + data.atasan_2);
                    }
                    $('#lihat-tgl_masuk').val(data.tgl_masuk);
                }
            });
        });
    });

</script>
@endpush
@push('select2script')
<script>
    $(document).ready(function() {
        $('.atasan1').select2();
        $('.atasan2').select2();

        $('.nip_tambah').on('blur', function(event){
          event.preventDefault();
          var nip = $(this).val();
          $.ajax({
            url: "{{ route('nip.validation.pegawai') }}",
            method: "POST",
            headers: {
              "X-CSRF-TOKEN": $("meta[name=csrf]").attr('content')
            },
            data: { nip: nip },
            success: function(data){
              console.log(data);
              if (data) {
                $('.simpan-btn').prop('disabled', true);
                $('#nip_validation').text(data);
                $('.nip_err').show();
              }else {
                $('.simpan-btn').prop('disabled', false);
                $('.nip_err').hide();
              }
            },
            error: function(err)
            {
              console.log("Error: " + err);
            }
          });
        });

        $('.email_validation').on('blur', function(event){
          event.preventDefault();
          var email = $(this).val();
          $.ajax({
            url: "{{ route('email.validation.pegawai') }}",
            method: "POST",
            headers: {
              "X-CSRF-TOKEN": $("meta[name=csrf]").attr('content')
            },
            data: { email: email },
            success: function(data){
              console.log(data);
              if (data) {
                $('.simpan-btn').prop('disabled', true);
                $('#email_validation').text(data);
                $('.nip_err_email').show();
              }else {
                $('.simpan-btn').prop('disabled', false);
                $('.nip_err_email').hide();
              }
            }
          });
        });
    });
</script>
@endpush
