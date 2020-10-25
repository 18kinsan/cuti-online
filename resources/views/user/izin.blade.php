@extends('layouts.appuser')

@section('izin', 'active')

@section('title', 'Izin Kerja | Pegawai')
@section('title2', 'Izin Kerja Pegawai')
@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content1')
<div class="card">
  <br>
  <div class="row">
      <div class="col-md-2 col-md-offset-10">
        <button type="button" data-toggle="modal" data-target="#izin-modal" class="btn btn-fill btn-primary"><i class="fa fa-plus"></i> Tambah Izin</button>
      </div>
  </div>
  <br>
  <div class="row table-responsive">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <table id="izin-table" class="ui celled table table-striped table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Tanggal Izin</th>
                <th>Pukul</th>
                <th>Alasan</th>
                <th>Cetak</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($izin as $i)
                <tr>
                    <td>{{$a++}}</td>
                    @if ($i->kategori == '0')
                        <td>Izin Tidak Masuk Kerja</td>
                    @elseif($i->kategori == '1')
                        <td>Izin Keluar Kantor</td>
                    @else
                        <td>Izin Mendahului Pulang</td>
                    @endif
                    <td>{{date('d F Y', strtotime($i->tanggal_izin))}}</td>
                    <td>{{$i->pukul_izin ? $i->pukul_izin . ' WIB' : '-'}}</td>
                    <td>{{$i->keperluan}}</td>
                    <td><a class="btn btn-primary btn-fill btn-xs print-window" target="_blank" style="padding:5px" href="{{route('izin.print', $i['id'])}}"><i class="fa fa-print"></i>Cetak Surat Izin</a></td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-1"></div>
  </div>
  <br><br>
</div>

@stop

@section('modal')
<div class="modal fade" id="izin-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-11">
                        <h3 class="modal-title" id="exampleModalLabel" style="text-align: center;">Tambah Izin</h3>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{route('izin.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="tgl_sekarang" value="{{ now() }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kategori">Kategori Izin</label><small class="text-danger"> *</small>
                                <select class="form-control opt" id="kategori" name="kategori" required>
                                    <option>-- Pilih Kategori --</option>
                                    <option value="0">1. Izin Tidak Masuk Kerja</option>
                                    <option value="1">2. Izin Keluar Kantor</option>
                                    <option value="2">3. Izin Mendahului Pulang</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <label>Atasan Yang Memberi Izin</label><small class="text-danger"> *</small>
                                        <select id="atasan123" style="width:100%" name="atasan" required>
                                            <option value="">-</option>
                                            @foreach ($data as $user)
                                                @if ($user->id_pegawai != $us && !$user->role)
                                                    <option value="{{$user->nip}}">{{$user->nama}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                        </div>

                    </div><br>
                    <div class="form-group" id="tgl_izin">
                        <label for="message-text" class="col-form-label" id="jenisIzin">Tidak Masuk Kerja Pada</label><small class="text-danger"> *</small>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" class="form-control" name="tgl_izin" required>
                                    <small class="text-danger" style="font-size: 10px">Format {{ date('d/m/Y') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pukul</label>
                                    <input type="text" class="form-control" id="time" placeholder="Time" name="pukul_izin" required>
                                    <small class="text-danger" style="font-size: 10px">Format {{ date('H:i') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="alasan">
                            <div class="form-group">
                                <label for="nama">Keperluan atau Alasan</label><small class="text-danger"> *</small>
                                <textarea class="form-control" placeholder="Keperluan atau Alasan" name="alasan" required></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-fill" data-dismiss="modal">Kembali</button>
                        <button type="submit" type="button" class="btn btn-primary btn-fill">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop


@push('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('#atasan123').select2();

    $('#kategori').change(function(){
        if($(this).val() === '0'){
            $('#jenisIzin').text("Tidak Masuk Kerja Pada")
            document.getElementById("time").disabled = false;
        }
        else if($(this).val() === '1') {
            $('#jenisIzin').text("Keluar Kantor Pada")
            document.getElementById("time").disabled = false;
        }
        else{
            $('#jenisIzin').text("Mendahului Pulang Pada")
            document.getElementById("time").disabled = false;
        }
    })

    var timepicker = new TimePicker('time', {
    lang: 'en',
    theme: 'dark'
    });
    timepicker.on('change', function(evt) {

    var value = (evt.hour || '00') + ':' + (evt.minute || '00');
    evt.element.value = value;

    });

  });
</script>
@endpush
