<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style>
		* { font-family: DejaVu Sans, sans-serif; font-size: 12px}
	</style>

  <title>PENGADILAN AGAMA WATES</title>
  <style>
    table, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: left;
        padding-left: 5px;
        font-size: 14px
    }
    th{
        border: 1px solid black;
        border-collapse: collapse;
    }
    table {
        width:115%;
        margin-right: 10%;
        margin-left: 10%;
    }
  </style>


</head>
<body>
<h2 style="text-align: center;">PENGADILAN AGAMA WATES<br>REKAP CUTI PEGAWAI<br>BULAN {{strtoupper(date('F'))}} TAHUN {{date('Y')}}</h2><br>
      <table>
            <thead>
                    <tr>
                      <th rowspan="2" style="text-align: center" width="3%">NO</b></th>
                      <th rowspan="2" style="text-align: center">NAMA</th>
                      <th rowspan="2" style="text-align: center">NIP</th>
                      <th rowspan="2" style="text-align: center">JABATAN</th>
                      <th colspan="3" width=12% style="text-align: center">SALDO CUTI AWAL</th>
                      <th colspan="3" width=17% style="text-align: center">PENGAMBILAN CUTI</th>
                      <th colspan="3" width=12% style="text-align: center">SISA CUTI</th>
                    </tr>
                    <tr>
                       <th style="text-align: center">2018</th>
                       <th style="text-align: center">2019</th>
                       <th style="text-align: center">CT.SAKIT</th>

                       <th style="text-align: center">Tanggal</th>
                       <th style="text-align: center">Surat Cuti</th>
                       <th style="text-align: center">Lama</th>

                       <th style="text-align: center">2018</th>
                       <th style="text-align: center">2019</th>
                       <th style="text-align: center">CT.SAKIT</th>
                    </tr>
                  </thead>
                  <tbody>
                          @foreach($data as $u)
                              @if(!$u['role'] && $u['progress'] == 2)
                             <tr>

                                  <td style="text-align: center">{{$i++}}</td>
																	<td>{{$u['nama']}}</td>
					                        <td>{{$u['nip']}}</td>
					                        <td>{{$u['jabatan']}}</td>

					                        <td style="text-align: center">
					                               @if($u['2018'] == date('Y')-1)
					                                 @if(!$u['kategori'])
					                                     {{($setting - $u['2018_2']) + $u['before']}}
					                                 @else
					                                     {{$setting - $u['2018_2']}}
					                                 @endif
					                               @endif
					                         </td>

																	 <td style="text-align: center">
																					 @if($u['2019'] == date('Y'))
																						 @if($setting - $u['2019_2'] >= 12)
																								 {{$setting - $u['2019_2']}}
																						 @else
																								 {{$u['kategori'] ? $setting - $u['2019_2'] : ($setting - $u['2019_2']) + $u['now']}}
																						 @endif
																					 @endif
																	 </td>

																	<td style="text-align: center">
																		@if($u['kategori'])
																			 <div class="text-center">✔</div>
																		@endif
																	</td>


														 <td width="8%" style="text-align: center">
															 @if(!$u['kategori'])
																	{{$u['tanggal']}}
															 @else
															 -
															 @endif
														 </td>
														 <td width="18%" style="text-align: center">
															 @if(!$u['kategori'])
																	 {{ $u['no_surat'] }}
																	 @else
																	 -
															 @endif
														 </td>
														 <td width="5%" style="text-align: center">{{$u['lama_cuti']}} hari</td>

																			 <td style="text-align: center">
																				 @if($u['2018'] == date('Y')-1)
																							 {{$setting - $u['2018_2']}}
																				 @endif
																			</td>
																	 <td style="text-align: center">
																		 @if($u['2019'] == date('Y'))
																					 {{$setting - $u['2019_2']}}
																		 @endif
																	 </td>
																	<td style="text-align: center">
																		@if($u['kategori'])
																			 <div class="text-center">✔</div>
																		@endif
																	</td>

															</tr>
																 @endif
													 @endforeach
                  </tbody>
                </table>
                <br><br>
                <table style="border:hidden">
                    <tr>
                        <td width="3%"></td>
                        <td style="border:hidden">
                            Mengetahui,<br>
                            Ketua,<br>
                            <br><br><br>
                            Drs. Nasrul, M.A.<br>
                            19660201.199403.1.005
                        </td>
                        <td style="padding-left:50%; border:hidden">
                            Dibuat oleh,<br>
                            Kasubbag. Kepegawaian Ortala,<br>
                            <br><br><br>
                            Nur Asiyah, SE<br>
                            19790907.201101.2.004
                        </td>
                    </tr>
                </table>
        </body>
    </html>
