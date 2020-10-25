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
    button {
        position:relative;
        width:300px;
        font-size:30px;
        font-weight:bold;
        color:#FFF;
        border: solid 1px #16a085;
        background: #1abc9c;
    }
    button:hover {
        background: red;
    }
  </style>
    <link rel="stylesheet" href="/css/print.css" media="print" type="text/css">


</head>
<body>
    <table style="border:hidden;width:100%">
        <tr>
            <td style="padding-left:40px;border:hidden">
                <img src="/assets/images/logopawt.png">
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

  <p style="text-align:center"> <u> <b> IZIN MENDAHULUI PULANG </b></u><br>
              Nomor : FM/AS/{{date('m')}}/{{date("d")}} </p>

    <blockquote style="text-align:left" >
    <p>Yang bertandatangan dibawah ini : {{$atasan['nama']}}</p>
    <p>Selaku : {{$atasan['jabatan']}}</p>
    <p>Dengan ini memberikan izin kepada :</p>
    <p style="margin-left:50px">Nama : {{$user->nama}}</p>
    <p style="margin-left:50px">NIP : {{$user->nip}}</p>
    <p>Untuk tidak masuk kerja pada :</p>
    <p style="margin-left:50px">Tanggal :  {{substr($izin->tanggal_izin,8,2)}} {{$bulanIndo[substr($izin->tanggal_izin, 6,1)]}} {{substr($izin->tanggal_izin,0,4)}}</p>
    <p style="margin-left:50px">Pukul : {{$izin->pukul_izin}} WIB</p>
    <p>Untuk keperluan : {{$izin->keperluan}}</p>
    <br>
    <p>Demikian izin ini diberikan kepada yang bersangkutan untuk digunakan sebagaimana mestinya</p>
    </blockquote>
    <br><br>


    <table style="width:100%">
        <td style="width:60%"></td>
        <td style="border:hidden">
            <br>
            Yogyakarta, {{date('d M Y')}} <br>
            <br><br><br>
            {{$atasan['nama']}}<br>
        </td>
    </table>

    <button class="down" id="print" onclick="myFunction()">Cetak Surat</button>

    <script>
    function myFunction() {
        document.getElementById('print').style.visibility = 'hidden';
        window.print();
        document.getElementById('print').style.visibility = 'visible';
    }
    </script>

</body>
</html>
