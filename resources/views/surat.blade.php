<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>PENGADILAN AGAMA WATES</title>
  <style>
    h5{
        text-align: center;
        font-size: 16px;
    }
    img{
        width:100px;
    }
  </style>


</head>
<body>
    <table style="border:hidden;width:100%">
        <tr>
            <td style="padding-left:40px;border:hidden">
                <img src="assets/images/logopawt.png">
            </td>
            <td style="width:100%;padding-left:5%;padding-right:5%;border:hidden">
            <h5>PENGADILAN AGAMA WATES KELAS I B <br>
                Jl. K.H. Ahmad Dahlan KM. 2,6 Wates, Kab. Kulon Progo D.I.Y. <br>
                Telepon : (0274) 773059, Fax : 773478 | Kode Pos : 55611 <br>
                Email : pa.wates@yahoo.com | Website : http://www.pa-wates.go.id</h5>
            </td>
        </tr>
    </table>
    <hr border-width="25px">

  <p style="text-align:center"> <u> <b> SURAT IZIN CUTI TAHUNAN </b></u><br>
              Nomor : W12-A5/{{$cuti->no_surat}}/KP.05.2/{{$bulanRomawi[(int)substr(date('m'),1,1)]}}/{{date("Y")}} </p>

    <blockquote style="text-align:left" >
    <p>1. Diberikan cuti {{strtolower(substr($cuti->kategori,5))}} kepada pegawai Negeri Sipil :</p>
    </blockquote>
    <blockquote style="text-align:left; padding-left:10%" >
    <table>
        <tr>
            <td>Nama</td>
            <td>: {{$cuti->user->nama}}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>: {{$cuti->user->nip}}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: {{$cuti->user->jabatan}}</td>
        </tr>
        <tr>
            <td>Satuan Organisasi</td>
            <td>: Pengadilan Wates</td>
        </tr>
    </table>
    </blockquote>
    <blockquote style="text-align:left" >
    <p>2. Selama {{$cuti->lama_cuti}} hari kerja, terhitung mulai tanggal {{date('d F Y', strtotime($tgl))}} dengan ketentuan sebagai berikut : <br>
        &nbsp;&nbsp;&nbsp;&nbsp;a. Sebelum menjalankan cuti tahunan wajib menyerahkan pekerjaannya kepada atasan <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; langsungnya. <br>
        &nbsp;&nbsp;&nbsp;&nbsp;b. Setelah selesai menjalankan cuti tahunan wajib melaporkan diri kepada atasan langsungnya <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; dan bekerja kembali sebagaimana biasa. <br><br>
       3. Demikianlah surat izin cuti tahunan ini dibuat untuk dapat dipergunakan sebagaimana<br>&nbsp;&nbsp;&nbsp; mestinya.</p>
    </blockquote>
    <br><br>

    <table style="width:100%">
        <td style="width:60%"></td>
        <td style="border:hidden">
            <?php $tgl = substr($cuti->tgl_surat,9,1) ?>
            Wates, {{substr($cuti->tgl_surat, 9,1) . ' ' . $bulanIndo[substr($cuti->tgl_surat, 6,1)] . ' ' . date('Y') }} <br>
            Ketua <br>
            <br><br><br>
            Drs. Nasrul, MA<br>
            NIP. 19960201 199403 1 005
        </td>
    </table>

</body>
</html>
