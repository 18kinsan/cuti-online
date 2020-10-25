@extends('layouts.appuser')

@section('cuti', 'active')

@section('title', 'Tambah Cuti | Pegawai')
@section('title2', 'Tambah Cuti Pegawai')


@section('content1')
<div class="card">
    <br>
    <div class="row">
        <div class="col-md-2 col-md-offset-10">
            @foreach ($cutii as $cek)
                @if($cek['progress'] == 0 || $cek['progress'] == 1)
                    <?php $tombol = false ?>
                    @break
                @endif
            @endforeach
            @if ($count > 0)
                @if ($tombol == true)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                    style="background:blue; border:#2e6da4; color:white"><i class="fa fa-plus"></i>Tambah Cuti</button>
                @else
                <button type="button" class="btn btn-primary"
                    style="background:#337ab7; opacity:.65; border:#2e6da4; color:white" data-toggle="modal"
                    data-target="#myModal" disabled><i class="fa fa-plus"></i>Tambah Cuti</button>
                @endif
            @else
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                style="background:blue; border:#2e6da4; color:white"><i class="fa fa-plus"></i>Tambah Cuti</button>
            @endif
        </div>
    </div>

    <div class="content table-responsive">
      @if(session('status_success'))
        <div class="alert alert-success">
            {{session('status_success')}}
        </div>
      @endif
      @if(session('status_fail'))
        <div class="alert alert-danger">
            {{session('status_fail')}}
        </div>
      @endif
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <th style="width:50px">NO</th>
                <th>Lama Cuti</th>
                <th>Tanggal</th>
                <th>Jenis Cuti</th>
                <th>Alasan</th>
                <th>Status</th>
                <th>Formulir Cuti</th>
            </thead>
            <tbody>
                @foreach ($cutii as $x)
                @foreach ($tgl as $y)
                @if($y->cuti_id === $x['id_cuti'])
                <?php $temp = substr($y->tgl_cuti,6,1); ?>
                @break
                @endif
                @endforeach
                <tr>
                    <td>{{$in++}}.</td>
                    <td>{{$x['lama_cuti']}} hari</td>
                    <td>
                        @if($count > -1)
                        @foreach ($tgl as $y)
                        @if ($y->cuti_id === $x['id_cuti'])
                        <?php
                            $monthNum = substr($y->tgl_cuti, 6, 1);
                            $month = date('F', mktime(0, 0, 0, $monthNum, 10));
                            $year = substr($y->tgl_cuti, 0, 4);
                        ?>
                        @if ($temp !== $monthNum)
                        {{date('F', mktime(0, 0, 0, $temp, 10))}} {{$year}}<br>
                        <?php $temp = $monthNum ?>
                        @endif

                        {{substr($y->tgl_cuti, 8)}},
                        @endif
                        @endforeach
                        {{$month}} {{$year}}
                        @endif
                    </td>
                    <td>{{$x['kategori']}}</td>
                    <td><button type="button" style="background-color: Transparent; border: none" class="popover-bottom"
                            data-toggle="popover" data-content="{{$x['alasan']}}"
                            data-trigger="hover">{{substr($x['alasan'], 0, 10) . '...' }}</button></td>
                    <td>
                        @if ($x['progress'] == 0)
                        <span class="label label-warning">Menunggu Konfirmasi</span>
                        @elseif($x['progress'] == 1)
                        <span class="label label-success">Disetujui Atasan 1</span>
                        @elseif($x['progress'] == 2)
                        <span class="label label-success">Disetujui Atasan 2</span>
                        @elseif($x['progress'] == 3)
                        <span class="label label-primary">Diubah Atasan 1</span>
                        @elseif($x['progress'] == 4)
                        <span class="label label-primary">Diubah Atasan 2</span>
                        @elseif($x['progress'] == 5)
                        <span class="label" style="background:black">Ditangguhkan Atasan 1</span>
                        @elseif($x['progress'] == 6)
                        <span class="label" style="background:black">Ditangguhkan Atasan 2</span>
                        @elseif($x['progress'] == 98)
                        <span class="label label-danger">Ditolak Atasan 1</span>
                        @elseif($x['progress'] == 99)
                        <span class="label label-danger">Ditolak Atasan 2</span>
                        @endif
                    </td>
                    <td>
                        @if ($x['progress'] == 3 || $x['progress'] == 4)
                        <button data-id="{{$x['id_cuti']}}" style="font-size: 12px; font-weight: bold"
                            class="btn btn-primary btn-fill btn-xs edit-tanggal" data-toggle="modal"
                            data-target="#edit_cuti"><i class="fa fa-edit"></i>Ubah Tanggal</button>
                        @elseif($x['progress'] == 2)
                            @if ($x['kategori'] == 'Cuti Sakit')
                                <a href="{{route('pdf.print', $x['id_cuti'])}}" class="btn btn-primary btn-fill btn-xs"
                                target="_blank"><i class="fa fa-print"></i>Cetak Form</a>
                            @else
                                <a href="{{route('pdf.print', $x['id_cuti'])}}" class="btn btn-primary btn-fill btn-xs"
                                target="_blank"><i class="fa fa-print"></i>Cetak Form</a>
                            @endif
                        @else
                        --
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>

    </div>
</div>
@stop

@section('modal')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-11">
                        <h3 class="modal-title" id="exampleModalLabel" style="text-align: center;">TAMBAH CUTI</h3>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{route('cuti.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="recipient-name" class="col-form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="recipient-name" value="{{$pegawai->nama}}"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="recipient-name" class="col-form-label">NIP</label>
                                <input type="text" class="form-control" id="recipient-name" value="{{$pegawai->nip}}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Jabatan</label>
                        <input type="text" class="form-control" id="recipient-name" value="{{$pegawai->jabatan}}"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Jenis Cuti</label>
                        <select class="form-control" id="kategori" name="kategori" required autofocus>
                            <option value="-- Pilih Kategori --">-- Pilih Jenis Cuti --</option>
                            <option value="Cuti Tahunan">1. Cuti Tahunan</option>
                            <option value="Cuti Sakit">2. Cuti Sakit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Alasan</label>
                        <textarea class="form-control" placeholder="Tulis Alasan Cuti Disini..." name="alasan" id="alasan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Alamat Selama Menjalankan Cuti</label>
                        <input class="form-control" placeholder="Tulis Alamat Disini..." name="alamat" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">No. HP</label>
                        <input type="number" placeholder="Tulis No.Telp Disini..." class="form-control" name="hp" id="hp" required>
                    </div>
                    <div class="card">
                      <div class="card-body" style="padding: 10px 10px">
                        @if ($sisa > 0)
                        Ambil cuti selama
                        <div id="totalC" style="display:inline">
                            <select name="hari1" id="totalCuti1" required>
                            @for ($i = 1; $i < $sisa+1; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            </select>
                        </div>
                        hari
                      </div>
                    </div>
                    <div class="form-group" id="jenisCutiAll" style="margin-top: -20px">
                        <label for="message-text" class="col-form-label">Pengambilan Waktu Cuti Secara :</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" value="1" name="jenisCuti" id="noBerurutan" checked>
                            <label class="form-check-label" for="materialInline1">Berurutan</label> <br>
                            <input type="radio" class="form-check-input" value="0" name="jenisCuti" id="berurutan">
                            <label class="form-check-label" for="materialInline2">Tidak Berurutan</label>
                        </div>
                    </div>
                    <label for="message-text" class="col-form-label" id="text-tanggal2">Mulai tanggal</label>
                    <small class="text-danger" style="font-size: 9px"><i> *Format Tanggal {{ date('d/m/Y') }}</i></small>
                    <div id="wo">
                        <div id="noUr">
                            <input class="1 form-control" type="date" name="tanggalCuti1" id="tanggalCuti" required><br class="wow">
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-fill" data-dismiss="modal">Kembali</button>
                        <button type="submit" type="button" class="btn btn-primary btn-fill">Simpan</button>
                    </div>
                    @else
                    ANDA TIDAK MEMILIKI CUTI
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-fill" data-dismiss="modal">Kembali</button>
                        <button type="submit" type="button" class="btn btn-primary btn-fill" disabled>Simpan</button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('modal3')
<div class="modal fade modal-mini modal-primary" id="edit_cuti" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="content">
                    <div class="modal-body">
                        <form id="form-edit" enctype="multipart/form-data" action="" method="POST">
                            @method('PUT')
                            <input id="aidi1" name="id" value="" hidden>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <h3>Ubah Tanggal Cuti</h3>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="kategori">Kategori Cuti</label>
                                        <input type="text" class="form-control" placeholder="Kategori Cuti"
                                            name="kategori1" id="kategori1" value="" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama">Alasan</label>
                                        <input type="text" class="form-control" placeholder="alasan" name="alasan1"
                                            id="alasan1" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Alamat Selama Menjalani Cuti</label>
                                <input class="form-control" name="alamat" id="alamat">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">No. HP</label>
                                <input type="number" class="form-control" name="hp" id="hp">
                            </div>

                            <div class="form-group">
                                Ambil cuti selama
                                <div id="totalC" style="display:inline">
                                    <select name="hari1" id="totalCuti2">
                                    </select>
                                </div>
                                hari
                            </div>

                            <div class="form-group" id="jenisCutiAll1">
                                <label for="message-text" class="col-form-label">Pengambilan Waktu Cuti Secara :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="1" name="jenisCuti2"
                                        id="noBerurutan2" checked>
                                    <label class="form-check-label" for="materialInline1">Berurutan</label> &nbsp;
                                    <input type="radio" class="form-check-input" value="0" name="jenisCuti2"
                                        id="berurutan2">
                                    <label class="form-check-label" for="materialInline2">Tidak Berurutan</label>
                                </div>
                            </div>

                            <label for="message-text" class="col-form-label" id="text-tanggal">Mulai tanggal</label>
                            <div id="wo">
                                <div id="noUrut2">
                                    <input class="2 form-control" type="date" name="tanggalCuti1" id="tanggalCuti1" required><br class="wow1">
                                </div>
                            </div>

                            <div class="row">
                            </div>

                            <div class="row">
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-fill" data-dismiss="modal">Kembali</button>
                                <button type="submit" type="button" class="btn btn-primary btn-fill">Simpan</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script>
    $(document).ready(function () {
        $(".popover-bottom").popover({
            placement: 'bottom'
        });

        $('#kategori').change(function () {
            if ($(this).val() === 'Cuti Sakit') {
                $('#totalCuti1').remove();
                $('#noUr').remove();
                $('#totalC').append(
                    '<select name="hari1" id="totalCuti1"> @for ($i = 1; $i < 6; $i++) <option value="{{$i}}">{{$i}}</option> @endfor </select>'
                    )
                document.getElementById("noBerurutan").checked = true;
                document.getElementById("berurutan").disabled = true;
                $('#wo').append(
                    '<div id="noUr"><input class="1 form-control" type="date" name="tanggalCuti1" id="tanggalCuti" required><br class="wow"></div>'
                    );
            } else if ($(this).val() === 'Cuti Tahunan') {
                $('#totalCuti1').remove();
                document.getElementById("berurutan").disabled = false;
                $('#totalC').append(
                    '<select name="hari1" id="totalCuti1"> @for ($i = 1; $i < $sisa+1; $i++) <option value="{{$i}}">{{$i}}</option> @endfor </select>'
                    )
            }
        });
        $("#totalCuti1").change(function () {
            var temp = document.getElementById("temp");
            var selectValue = document.getElementById('totalCuti1').value;
            var elem = document.getElementById('berurutan');
            if (elem.checked) {
                switch (selectValue) {
                    @for($i = 1; $i < $sisa + 1; $i++)
                    case "{{$i}}":
                        @for($k = 1; $k < $sisa + 1; $k++)
                        $('input.{{$k}}').remove();
                        $('br.wow').remove();
                        @endfor
                        @for($j = 1; $j < $i + 1; $j++)
                        $("#noUr").append(
                            '<input class="{{$j}} form-control" type="date" name="tanggalCuti{{$j}}" id="tanggalCuti" required><br class="wow">'
                            );
                        @endfor
                        break;
                        @endfor
                };
            }
        });
        $("input[name=jenisCuti]").click(function () {
            var elem = document.getElementById("berurutan");
            if (this.value == '1') {
                $('#text-tanggal2').text("Mulai Tanggal");
                @for($k = 1; $k < $sisa + 1; $k++)
                $('input.{{$k}}').remove();
                $('br.wow').remove();
                @endfor
                $("#noUr").append(
                    '<input class="1 form-control" type="date" name="tanggalCuti1" id="tanggalCuti" required><br class="wow">'
                    );
            } else {
                $('#text-tanggal2').text("Pilih Tanggal");
                var kelas1 = document.getElementById('totalCuti1');
                var selectValue = kelas1.value;
                switch (selectValue) {
                    @for($i = 1; $i < $sisa + 1; $i++)
                    case "{{$i}}":
                        @for($k = 1; $k < $sisa + 1; $k++)
                        $('input.{{$k}}').remove();
                        $('br.wow').remove();
                        @endfor
                        @for($j = 1; $j < $i + 1; $j++)
                        $("#noUr").append(
                            '<input class="{{$j}} form-control" type="date" name="tanggalCuti{{$j}}" id="tanggalCuti" required><br class="wow">'
                            );
                        @endfor
                        break;
                        @endfor
                };
            }
        });
    });

</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });

</script>
<script>
    $(document).ready(function () {
        $('.edit-tanggal').on('click', function () {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('cuti.edit') }}",
                method: "POST",
                data: {
                    id: id
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name=csrf]').attr('content')
                },
                success: function (data) {
                    $('#aidi1').val(id);
                    $('#kategori1').val(data.kategori);
                    $('#alasan1').val(data.alasan);
                    for (i = 1; i < data.sisa + 1; i++) {
                        $('#totalCuti2').append($("<option></option>").attr("value", i).text(i));
                    }
                    $('#form-edit').attr('action', "{!! route('cuti.update') !!}");
                }
            });
        });
        $("#totalCuti2").change(function () {
            var temp = document.getElementById("temp");
            var selectValue = document.getElementById('totalCuti2').value;
            var elem = document.getElementById('berurutan2');
            if (elem.checked) {
                switch (selectValue) {
                    @for($i = 1; $i < $sisa + 1; $i++)
                    case "{{$i}}":
                        @for($k = 1; $k < $sisa + 1; $k++)
                            $('input.{{$k}}').remove();
                            $('br.wow1').remove();
                        @endfor
                        @for($j = 1; $j < $i + 1; $j++)
                        $("#noUrut2").append(
                            '<input class="{{$j}} form-control" type="date" name="tanggalCuti{{$j}}" id="tanggalCuti1" required><br class="wow1">'
                            );
                        @endfor
                        break;
                        @endfor
                };
            }
        });
        $("input[name=jenisCuti2]").click(function () {
            var elem = document.getElementById("berurutan2");
            if (this.value == '1') {
                $('#text-tanggal').text("Mulai Tanggal");
                @for($k = 1; $k < $sisa + 1; $k++)
                $('input.{{$k}}').remove();
                $('br.wow1').remove();
                @endfor
                $("#noUrut2").append(
                    '<input class="1 form-control" type="date" name="tanggalCuti1" id="tanggalCuti1" required><br class="wow1">'
                    );
            } else {
                $('#text-tanggal').text("Pilih Tanggal");
                var kelas = document.getElementById('totalCuti2');
                var selectValue = kelas.value;
                switch (selectValue) {
                    @for($i = 1; $i < $sisa + 1; $i++)
                    case "{{$i}}":
                        @for($k = 1; $k < $sisa + 1; $k++)
                        $('input.{{$k}}').remove();
                        $('br.wow1').remove();
                        @endfor
                        @for($j = 1; $j < $i + 1; $j++)
                        $("#noUrut2").append(
                            '<input class="{{$j}} form-control" type="date" name="tanggalCuti{{$j}}" id="tanggalCuti1" required><br class="wow1">'
                            );
                        @endfor
                        break;
                        @endfor
                };
            }
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.input-tanggal').datepicker();
    });

</script>
@endpush
