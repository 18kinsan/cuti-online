@extends('layouts.app')

@section('dashboard')
active
@stop

@section('title')
<h4 class="title" style="font-family: sans-serif; margin-top: 14px; margin-left:15px;">Dashboard</h4>
@stop

@section('content')
<div class="card">
  <div class="container">
    <h4 style="font-family: sans-serif; text-align:center;">Aktivitas Cuti Pegawai</h4>
    <div class="row">
        <div class="col-md-12">
            <canvas id="myChart" style="display:inline;width:100%"></canvas>
        </div>
    </div>

    <div class="row">
      <div class="header">
          <br>
          <h3 class="title" style="text-align: center; font-family: sans-serif;">Aktivitas Cuti Tahun {{date('Y')}}</h3>
          <hr style="width:30%; margin: 10px auto; border: 1px solid grey">
      </div>
        <div class="col-md-6">
            <div class="content table-responsive">
                <h4 style="font-family: sans-serif; text-align:center;">Cuti Tahunan</h4>
                <table class="table table-hover table-striped">
                    <thead>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>STATUS </th>
                    </thead>
                    <tbody>
                        @foreach($cuti as $c)
                        @if(!$c->user->role)

                        @if($c->kategori == "Cuti Tahunan")
                        <tr>
                            <td>{{$ii++}}</td>
                            <td>{{$c->user->nip}}</td>
                            <td>{{$c->user->nama}}</td>
                            <td>
                                @if($c->progress == 0)
                                <span class="label label-warning">Menunggu Konfirmasi...</span>
                                @elseif($c->progress == 1)
                                <span class="label label-success">Disetujui Atasan 1</span>
                                @elseif($c->progress == 2)
                                <span class="label label-success">Disetujui Atasan 2</span>
                                @elseif($c->progress == 4)
                                <span class="label label-primary">Dirubah Atasan 2</span>
                                @elseif($c->progress == 6)
                                <span class="label label-warning">Ditangguhkan Atasan 2</span>
                                @elseif($c->progress == 99)
                                <span class="label label-danger">Ditolak Atasan 2</span>
                                @elseif($c->progress==98)
                                <span class="label label-danger">Ditolak Atasan 1</span>
                                @elseif($c->progress==3)
                                <span class="label label-primary">Dirubah Atasan 1</span>
                                @elseif($c->progress==5)
                                <span class="label label-warning">Ditangguhkan Atasan 1</span>
                                @endif
                            </td>
                            @else
                        </tr>
                        @endif
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="content table-responsive">
                <h4 style="font-family: sans-serif; text-align:center;">Cuti Sakit</h4>
                <table class="table table-hover table-striped">
                    <thead>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>STATUS </th>
                    </thead>
                    <tbody>
                        @foreach($cuti as $c)
                        @if(!$c->user->role)

                        @if($c->kategori == "Cuti Sakit")
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$c->user->nip}}</td>
                            <td>{{$c->user->nama}}</td>
                            <td>
                                @if($c->progress == 0)
                                <span class="label label-warning">Menunggu Konfirmasi...</span>
                                @elseif($c->progress == 1)
                                <span class="label label-success">Disetujui Atasan 1</span>
                                @elseif($c->progress == 2)
                                <span class="label label-success">Disetujui Atasan 2</span>
                                @elseif($c->progress == 4)
                                <span class="label label-primary">Dirubah Atasan 2</span>
                                @elseif($c->progress == 6)
                                <span class="label label-warning">Ditangguhkan Atasan 2</span>
                                @elseif($c->progress == 99)
                                <span class="label label-danger">Ditolak Atasan 2</span>
                                @elseif($c->progress==98)
                                <span class="label label-danger">Ditolak Atasan 1</span>
                                @elseif($c->progress==3)
                                <span class="label label-primary">Dirubah Atasan 1</span>
                                @elseif($c->progress==5)
                                <span class="label label-warning">Ditangguhkan Atasan 1</span>
                                @endif
                            </td>
                            @else
                        </tr>
                        @endif
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom: 50px">
      <div class="header">
          <br>
          <h3 class="title" style="text-align: center; font-family: sans-serif;">Aktivitas Izin Bulan {{ date('m') }} Tahun {{date('Y')}}</h3>
          <hr style="width:30%; margin: 10px auto; border: 1px solid grey">
      </div>
        <div class="col-md-12">
            <div class="content table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>KATEGORI</th>
                        <th>TANGGAL IZIN</th>
                        <th>KEPERLUAN</th>
                        <th>YANG MEMBERI IZIN</th>
                        <th>STATUS</th>
                    </thead>
                    <tbody>
                        @foreach($izins as $izin)
                        @if(substr($izin['tanggal_sekarang'], 5, 2) == date('m'))
                        <tr>
                            <td>{{$iii++}}</td>
                            <td>{{$izin['nip']}}</td>
                            <td>{{$izin['nama']}}</td>
                                @if($izin['kategori'] == 0)
                                    <td><span class="label label-primary">Izin Tidak Masuk Kerja</span></td>
                                @elseif($izin['kategori'] == 1)
                                    <td><span class="label label-info">Izin Keluar Kantor</span></td>
                                @elseif($izin['kategori'] == 2)
                                    <td><span class="label label-warning">Izin Mendahului Pulang</span></td>
                                @endif
                            <td>{{ $izin['tanggal_izin'] }}</td>
                            <td><button type="button" style="background-color: Transparent; border: none" class="popover-bottom" data-toggle="popover" data-content="{{$izin['keperluan']}}" data-trigger="hover">{{substr($izin['keperluan'], 0, 10).'...'}}</button></td>
                            <td>{{ $izin['atasan'] }}</td>
                            <td><span class="label label-success">Izin Diterima</span></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
    <input type="text" id="jan" value="{{$jan}}" hidden>
    <input type="text" id="feb" value="{{$feb}}" hidden>
    <input type="text" id="mar" value="{{$mar}}" hidden>
    <input type="text" id="apr" value="{{$apr}}" hidden>
    <input type="text" id="mei" value="{{$mei}}" hidden>
    <input type="text" id="jun" value="{{$jun}}" hidden>
    <input type="text" id="jul" value="{{$jul}}" hidden>
    <input type="text" id="agu" value="{{$agu}}" hidden>
    <input type="text" id="sep" value="{{$sep}}" hidden>
    <input type="text" id="okt" value="{{$okt}}" hidden>
    <input type="text" id="nov" value="{{$nov}}" hidden>
    <input type="text" id="des" value="{{$des}}" hidden>
    @stop

    @push('scripts')
    <script>
        $(".popover-bottom").popover({
            placement : 'bottom'
        });
        var ctx = document.getElementById("myChart").getContext('2d');
        var dt = new Date();
        var jan = document.getElementById('jan').value;
        var feb = document.getElementById('feb').value;
        var mar = document.getElementById('mar').value;
        var apr = document.getElementById('apr').value;
        var mei = document.getElementById('mei').value;
        var jun = document.getElementById('jun').value;
        var jul = document.getElementById('jul').value;
        var agu = document.getElementById('agu').value;
        var sep = document.getElementById('sep').value;
        var okt = document.getElementById('okt').value;
        var nov = document.getElementById('nov').value;
        var des = document.getElementById('des').value;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [{
                    label: 'Cuti Tahun ' + dt.getFullYear(),
                    data: [
                        jan, feb, mar, apr, mei, jun, jul, agu, sep, okt, nov, des
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 0, 0, 0.5)',
                        'rgba(0, 0, 139,0.5)',
                        'rgba(252, 165,3,0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255,0,0,1)',
                        'rgba(0, 0, 139,1)',
                        'rgba(252,165,3,1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235,1)'

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    @endpush
