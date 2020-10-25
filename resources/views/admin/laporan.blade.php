@extends('layouts.app')

@section('laporan')
active
@stop

@section('title')
<h4 class="title" style="font-family: sans-serif; margin-top: 14px; margin-left:7px;">Laporan</h4>
@stop

@section('content')
<div class="card">
<div class="content table-responsive">
   <a href="{{route('rekapcuti.print')}}" class="btn btn-danger btn-fill" target="_blank"><i class="fas fa-file-pdf"> &nbsp;</i>
      Cetak Rekap Cuti</a><br><br>
   <table class="table table-hover table-bordered table-striped">
       <thead>
         <tr>
           <th rowspan="2" style="text-align: center">NO</b></th>
           <th rowspan="2" style="text-align: center">NAMA</th>
           <th rowspan="2" style="text-align: center">NIP</th>
           <th rowspan="2" style="text-align: center">JABATAN</th>
           <th colspan="3" width=15% style="text-align: center">SALDO CUTI AWAL</th>
           <th colspan="3" width=25% style="text-align: center">PENGAMBILAN CUTI</th>
           <th colspan="3" width=15% style="text-align: center">SISA CUTI</th>
         </tr>
         <tr>
            <th style="text-align: center">{{date('Y')-1}}</th>
            <th style="text-align: center">{{date('Y')}}</th>
            <th style="text-align: center">CT.SAKIT</th>

            <th style="text-align: center">tanggal</th>
            <th style="text-align: center">surat cuti</th>
            <th style="text-align: center">lama</th>

            <th style="text-align: center">{{date('Y')-1}}</th>
            <th style="text-align: center">{{date('Y')}}</th>
            <th style="text-align: center">CT.SAKIT</th>
         </tr>
       </thead>
       <tbody>
               @foreach($data as $u)

                   @if(!$u['role'] && $u['progress'] == 2)
                  <tr>

                       <td>{{$i++}}</td>
                       <td>{{$u['nama']}}</td>
                       <td>{{$u['nip']}}</td>
                       <td>{{$u['jabatan']}}</td>

                       <td class="text-center">
                              @if($u['2018'] == date('Y')-1)
                                @if(!$u['kategori'])
                                    {{($setting - $u['2018_2']) + $u['before']}}
                                @else
                                    {{$setting - $u['2018_2']}}
                                @endif
                              @endif
                        </td>

                        <td class="text-center">
                                @if($u['2019'] == date('Y'))
                                  @if($setting - $u['2019_2'] >= 12)
                                      {{$setting - $u['2019_2']}}
                                  @else
                                      {{$u['kategori'] ? $setting - $u['2019_2'] : ($setting - $u['2019_2']) + $u['now']}}
                                  @endif
                                @endif
                        </td>

                       <td>
                         @if($u['kategori'])
                            <div class="text-center">5</div>
                         @else
                            <div class="text-center">0</div>
                         @endif
                       </td>


                  <td width="8%" class="text-center">
                    @if(!$u['kategori'])
                       {{$u['tanggal']}}
                    @else
                    -
                    @endif
                  </td>
                  <td width="18%" class="text-center">
                    @if(!$u['kategori'])
                        {{ $u['no_surat'] }}
                        @else
                        -
                    @endif
                  </td>
                  <td width="5%">{{$u['lama_cuti']}} hari</td>

                            <td class="text-center">
                              @if($u['2018'] == date('Y')-1)
                                    {{$setting - $u['2018_2']}}
                              @endif
                           </td>
                        <td class="text-center">
                          @if($u['2019'] == date('Y'))
                                {{$setting - $u['2019_2']}}
                          @endif
                        </td>
                       <td>
                         @if($u['kategori'])
                            <div class="text-center">{{ 5 - $u['lama_cuti'] }}</div>
                         @else
                            <div class="text-center">5</div>
                         @endif
                       </td>

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

@endpush
