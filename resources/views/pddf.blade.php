<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style>
    * { font-family: DejaVu Sans, sans-serif; font-size: 11px}
  </style>

  <title>PENGADILAN AGAMA WATES</title>
  <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: left;
        padding-left: 10px;
    }
    table {
        width:115%;
        margin-right: 10%;
        margin-left: 10%;
    }
  </style>


</head>
<body>
        <small style="float:right">
          Anak Lampiran 1.b <br>
          Peraturan Badan Kepegawaian Republik Negara R.I <br>
          Nomor 24 Tahun 2007 <br>
          Tentang Tata Cara Pemberian Cuti PNS <br><br>
          Wates, {{date('d F Y')}} <br>
          Kepada <br>
          Yth. Ketua Pengadilan Agama Wates <br>
          di Wates
        </small>
      <br><br><br><br><br><br><br><br>
      <h4 style="text-align: center; clear: both">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h4>
      <table   >
          <thead>
            <tr>
              <td colspan="4">I. DATA PEGAWAI</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th width="15%">Nama</th>
              <td>{{ $u->user->nama }}</td>
              <th width="15%">NIP</th>
              <td>{{ $u->user->nip }}</td>
            </tr>
            <tr>
              <th>Jabatan</th>
              <td>{{ $u->user->jabatan }}</td>
              <th>Masa Kerja</th>
              <td>
                {{substr($u->user->tgl_masuk,0,4)}}
              </td>
            </tr>
            <tr>
              <th>Unit Kerja</th>
              <td colspan="3">Pengadilan Agama Wates</td>
            </tr>
          </tbody>
        </table>
        <br>
        <table   >
            <thead>
              <tr>
                <td colspan="4">II. JENIS CUTI YANG DIAMBIL</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1. Cuti Tahunan</td>
              <td style="text-align:center">{{$u->kategori == "Cuti Tahunan" ? '✔' : ''}}</td>
                <td>2. Cuti Besar</td>
                <td></td>
              </tr>
              <tr>
                <td>3. Cuti Sakit</td>
                <td style="text-align: center">{{$u->kategori == "Cuti Sakit" ? '✔' : ''}}</td>
                <td>4. Cuti Melahirkan</td>
                <td></td>
              </tr>
              <tr>
                <td>5. Cuti Karena Alasan Penting</td>
                <td></td>
                <td>6. Cuti di Luar Tanggungan Negara</td>
                <td></td>
              </tr>
            </tbody>
          </table>
          <br>
        <table   >
            <thead>
              <tr>
                <td colspan="4">III. ALASAN</td>
              </tr>
            </thead>
            <tbody>
              <tr>
              <td colspan="4">{{ $u->alasan }}</td>
              </tr>
            </tbody>
          </table>
          <br>
    <table   >
        <thead>
            <tr>
            <td colspan="4">IV. LAMA CUTI</td>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td colspan="2">Selama {{$u->lama_cuti}} hari</td>
            <td colspan="2">Mulai tanggal {{date('d F Y', strtotime($tgl->tgl_cuti))}}</td>
            </tr>
        </tbody>
        </table>
        <br>
        <table  >
            <thead>
            <tr>
                <td colspan="5">V. CATATAN CUTI***</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th colspan="3">1. Cuti Tahunan</th>
                <th width="45%">2. Cuti Besar</th>
                <td></td>
            </tr>
            <tr>
                <th width="10%">Tahun</th>
                <th width="10%">Sisa</th>
                <th width="25%">Keterangan</th>
                <th>3. Cuti Sakit</th>
                <td>{{$u->kategori == "Cuti Sakit" ? $u->lama_cuti : ''}}</td>
            </tr>
            <tr>
                <td>2017</td>
                <td>0</td>
                <td>Diambil 0 sisa 0</td>
                <th>4. Cuti Melahirkan</th>
                <td></td>
            </tr>
            <tr>
                <td>2018</td>
                @if($sisa1 != null)
                  <td>{{$setting - $sisa1->jumlah_cuti}}</td>
                @else
                  <td>0</td>
                @endif
                @if($sisa1 != null)
                  <td>Diambil {{$u->tahun_before}} sisa {{$setting - $sisa1->jumlah_cuti}}</td>
                @else
                  <td>Diambil 0 sisa 0</td>
                @endif
                <th>5. Cuti Karena Alesan Penting</th>
                <td></td>
            </tr>
            <tr>
                <td>2019</td>
                <td>{{$setting - $sisa2->jumlah_cuti}}</td>
                <td>Diambil {{$u->tahun_now}} sisa {{$setting - $sisa2->jumlah_cuti}}</td>
                <th>6. Cuti di Luar tanggungan Negara</th>
                <td></td>
            </tr>
            </tbody>
        </table>
        <br>
        <table>
            <thead>
                <tr>
                    <td colspan="4">VI. ALAMAT SELAMA MENJALANKAN CUTI**</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="2"></td>
                    <td width="15%">Telepon</td>
                    <td>{{$u->hp}}</td>
                </tr>
                <tr>
                    <td colspan="2">{{$u->alamat}}</td>
                    <td colspan="2" style="text-align:center">
                        Hormat Saya,
                        <br><br><br>
                        ({{$u->user->nama}})
                        <br>
                        NIP. {{$u->user->nip}}
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                <tr>
                    <td colspan="4">VII. PERTIMBANGAN ATASAN LANGSUNG**</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td width="20%">Disetujui</td>
                    <td width="20%">Perubahan****</td>
                    <td width="20%">Ditangguhkan****</td>
                    <td>Tidak Disetujui****</td>
                </tr>
                <tr>
                    <td style="text-align:center">{{$u->progress == 2 ? '✔' : ''}}</td>
                    <td style="text-align:center">{{$u->progress == 4 ? '✔' : ''}}</td>
                    <td style="text-align:center">{{$u->progress == 6 ? '✔' : ''}}</td>
                    <td style="text-align:center">{{$u->progress == 99 ? '✔' : ''}}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td style="text-align:center">
                    <br>
                    <br>
                            ({{$nama_atasan1}}) <br>
                            NIP. {{$u->user->atasan_1}}
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <table>
            <tbody>
                <tr>
                    <td colspan="4">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI**</td>
                </tr>
                <tr>
                    <td width="20%">Disetujui</td>
                    <td width="20%">Perubahan****</td>
                    <td width="20%">Ditangguhkan****</td>
                    <td>Tidak Disetujui****</td>
                </tr>
                <tr>

                  <td style="text-align:center">{{$u->progress == 2 && $u->user->atasan_2 != null ? '✔' : ''}}</td>
                  <td style="text-align:center">{{$u->progress == 4 && $u->user->atasan_2 != null ? '✔' : ''}}</td>
                  <td style="text-align:center">{{$u->progress == 6 && $u->user->atasan_2 != null ? '✔' : ''}}</td>
                  <td style="text-align:center">{{$u->progress == 99 && $u->user->atasan_2 != null ? '✔' : ''}}</td>


                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td style="text-align:center">
                    <br>
                    <br>
                            ({{$nama_atasan2}}) <br>
                            NIP. {{$u->user->atasan_2}}
                    </td>
                </tr>
                </tbody>
            </table>
            <h5 style="margin-left: 5%">Catatan:</h5>
            <p style="margin-left: 5%">
                *Coret yang tidak perlu <br>
                **Pilih salah satu dg memberi tanda centang <br>
                ***Diisi oleh pejabat kepegawaian <br>
                ****Diberi tanda centang dan alasannya <br>
                N = Cuti tahun berjalan <br>
                N-1 = Sisa cuti 1 tahun sebelumnya <br>
                N-2 = Sisa cuti 2 tahun sebelumnya <br>
            </p>
        </body>
    </html>
