@extends('layouts.appuser')

@section('dashboard', 'active')

@section('title', 'Dashboard | Pegawai')
@section('title2', 'Dashboard')


@section('content')
<div class="col-md-4">
    <div class="card">
        <div class="header">
            <h5 class="title" style="text-align: center; font-family: sans-serif;">TAHUN {{date('Y')-2}}</h5>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-6" >
                    <div class="card" style="width: 100%; border: none">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-align:center; font-family: sans-serif;">Dipakai</li>
                            @if ($tahun1 != null)
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">
                                {{$tahun1->jumlah_cuti}}</li>
                            @else
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">0</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-6" style="margin-left: 0">
                    <div class="card" style="width: 100%; border: none;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-align:center; font-family: sans-serif;">Sisa</li>
                            @if ($tahun1 != null)
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">
                                {{$setting - $tahun1->jumlah_cuti}}</li>
                            @else
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">12</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <div class="header">
            <h5 class="title" style="text-align: center; font-family: sans-serif;">TAHUN {{date('Y')-1}}</h5>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-6" >
                    <div class="card" style="width: 100%; border: none">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-align:center; font-family: sans-serif;">Dipakai</li>
                            @if ($tahun2 != null)
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">
                                {{$tahun2->jumlah_cuti}}</li>
                            @else
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">0</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-6" style="margin-left: 0">
                    <div class="card" style="width: 100%; border: none;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-align:center">Sisa</li>
                            @if ($tahun2 != null)
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">
                                {{$setting - $tahun2->jumlah_cuti}}</li>
                            @else
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">12</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="header">
            <h5 class="title" style="text-align: center; font-family: sans-serif;">TAHUN {{date('Y')}}</h5>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-6" >
                    <div class="card" style="width: 100%; border: none">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-align:center; font-family: sans-serif;">Dipakai</li>
                            @if ($tahun3 != null)
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">
                                {{$tahun3->jumlah_cuti}}</li>
                            @else
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">0</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-6" style="margin-left: 0">
                    <div class="card" style="width: 100%; border: none;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="text-align:center">Sisa</li>
                            @if ($tahun3 != null)
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">
                                {{$setting - $tahun3->jumlah_cuti}}</li>
                            @else
                            <li class="list-group-item"
                                style="text-align:center; color: blue; font-weight: bold; font-size: 400%">12</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="header">
            <br>
            <h5 class="title" style="text-align: center; font-family: sans-serif;">TABEL CUTI TAHUN {{date('Y')}}</h5>
            <hr style="width:30%; margin: 10px auto; border: 1px solid grey">
        </div>
        <div class="content" style="padding: 20px 50px">
            <h5>Cuti Tahunan</h5>
            <table class="table table-hover table-striped">
                <thead>
                    <th style="width: 5%">NO</th>
                    <th style="width: 10%">Lama Cuti</th>
                    <th style="width: 25%">Tanggal</th>
                    <th style="width: 20%">Alasan</th>
                    <th style="width: 20%">Status</th>
                    <th style="width: 20%">Formulir Cuti</th>
                </thead>
                <tbody>
                    @foreach ($cutii as $x)
                    <?php $temp = substr($tgl[0]->tgl_cuti,6,1); ?>
                    @if ($x['kategori'] === "Cuti Tahunan")
                    <tr>
                        <td>{{$i++}}</td>
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
                        <td><button type="button" style="background-color: Transparent; border: none"
                                class="popover-bottom" data-toggle="popover" data-content="{{$x['alasan']}}"
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
                                <button data-id="{{$x['id_cuti']}}" style="font-size: 10px; font-weight: bold" class="btn btn-primary btn-fill edit-tanggal" data-toggle="modal" data-target="#edit_cuti"><i class="fa fa-edit"></i>Ubah Tanggal</button>
                            @elseif($x['progress'] == 2)
                                <a href="{{route('pdf.print', $x['id_cuti'])}}" class="btn btn-primary btn-fill btn-xs" target="_blank"><i class="fa fa-print"></i>Cetak Form</a>
                            @else
                            --
                            @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="content" style="padding: 20px 50px">
            <br>
            <p>Cuti Sakit</p>
            <table class="table table-hover table-striped">
                <thead>
                    <th style="width: 5%">NO</th>
                    <th style="width: 10%">Lama Cuti</th>
                    <th style="width: 25%">Tanggal</th>
                    <th style="width: 20%">Alasan</th>
                    <th style="width: 20%">Status</th>
                    <th style="width: 20%">Formulir Cuti</th>
                </thead>
                <tbody>
                    @foreach ($cutii as $x)
                        @foreach ($tgl as $y)
                            @if($y->cuti_id === $x['id_cuti'])
                                <?php $temp = substr($y->tgl_cuti,6,1); ?>
                                @break
                            @endif
                        @endforeach
                    @if ($x['kategori'] === "Cuti Sakit")
                    <tr>
                        <td>{{$s++}}</td>
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
                        <td><button type="button" style="background-color: Transparent; border: none"
                                class="popover-bottom" data-toggle="popover" data-content="{{$x['alasan']}}"
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
                                <button data-id="{{$x['id_cuti']}}" style="font-size: 10px; font-weight: bold" class="btn btn-primary btn-fill edit-tanggal" data-toggle="modal" data-target="#edit_cuti"><i class="fa fa-edit"></i>Ubah Tanggal</button>
                            @elseif($x['progress'] == 2)
                                <a href="{{route('pdf.print', $x['id_cuti'])}}" class="btn btn-primary btn-fill btn-xs" target="_blank"><i class="fa fa-print"></i>Cetak Form</a>
                            @else
                            --
                            @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
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
                                    <input class="2" type="date" name="tanggalCuti1" id="tanggalCuti1"><br class="wow1">
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
                            '<input class="{{$j}}" type="date" name="tanggalCuti{{$j}}" id="tanggalCuti1"><br class="wow1">'
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
                    '<input class="1" type="date" name="tanggalCuti1" id="tanggalCuti1"><br class="wow1">'
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
                            '<input class="{{$j}}" type="date" name="tanggalCuti{{$j}}" id="tanggalCuti1"><br class="wow1">'
                            );
                        @endfor
                        break;
                        @endfor
                };
            }
        });
    });
</script>



@endpush
