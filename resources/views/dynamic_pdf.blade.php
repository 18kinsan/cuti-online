<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="{{url('/')}}/assets/images/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>PENGADILAN AGAMA WATES</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Animation library for notifications   -->
    <link href="{{url('/')}}/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{url('/')}}/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!-- Bootstrap core CSS     -->
    <link href="{{url('/')}}/assets/css/bootstrap.min.css" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{url('/')}}/assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{url('/')}}/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{url('/')}}/assets/images/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Pengadilan Agama <br>
                    Wates
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li class="active">
                    <a href="cuti.html">
                        <i class="pe-7s-note2"></i>
                        <p>Cuti</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-next-2"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Table List</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        
                       
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                      
                       
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-7">
                                        <p>
                                            Anak Lampiran 1.b <br>
                                            Peraturan Badan Kepegawaian Republik Negara R.I <br>
                                            Nomor 24 Tahun 2007 <br>
                                            Tentang Tata Cara Pemberian Cuti PNS <br><br>
                                            Wates, 14 Februari 2019 <br>
                                            Kepada <br>
                                            Yth. Ketua Pengadilan Agama Wates <br>
                                            di Wates
                                        </p> <br><br>
                                    </div>
                                </div>
                                <h4 class="title" style="text-align: center;">FORMULIR PERMINTAAN DAN PEMBERIAN CUTI</h4><br>
                            </div>
                            <div class="content">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <td colspan="4">I. DATA PEGAWAI</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">Nama</th>
                                      <td>Khoiril Basyar, S.H</td>
                                      <th scope="row">NIP</th>
                                      <td>19680523 199203 1 002</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Jabatan</th>
                                      <td>Panmud Permohonan</td>
                                      <th scope="row">Masa Kerja</th>
                                      <td>
                                        <input type="text" class="form-control" style="border: none">
                                      </td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Unit Kerja</th>
                                      <td colspan="4">Pengadilan Agama Wates</td>
                                    </tr>
                                  </tbody>
                                </table>

                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <td colspan="4">II. JENIS CUTI YANG DIAMBIL</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <td>
                                      <select class="form-control" id="exampleFormControlSelect1" style="border: none;">
                                        <option>--pilih--</option>
                                        <option>1. Cuti Tahunan</option>
                                        <option>2. Cuti Besar</option>
                                        <option>3. Cuti Sakit</option>
                                        <option>4. Cuti Melahirkan</option>
                                        <option>5. Cuti Karena Alasan Penting</option>
                                        <option>6. Cuti di Luar Tanggungan Negara</option>
                                      </select>
                                  </td>
                                </tbody>
                                </table>

                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <td colspan="4">III. ALASAN CUTI</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <textarea class="form-control" rows="5" id="comment" style="border: none;"></textarea>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>

                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <td colspan="4">IV. LAMA CUTI</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                        <th>Tanggal</th>
                                    </tr>
                                    <div id="selectContainer">
                                    <div id="Cuti">
                                      <tr>
                                          <th>
                                              <select id="Tahun">
                                                <option>Tahun</option>
                                              </select>
                                              <select id="Bulan">
                                                <option>Bulan</option>
                                              </select>
                                              <select id="Tanggal">
                                                <option>Tanggal</option>
                                              </select>
                                          </th>
                                      </tr>
                                    </div>
                                    </div>
                                    <tr>
                                      <td>
                                      <button onclick="cloneSelect()">Tambah Tanggal</button>
                                      <script type="text/javascript">
                                        var selectionCounter = 0
                                        function cloneSelect() {
                                          var select = document.getElementById("Tahun")
                                          var clone = select.cloneNode(true)
                                          var name = select.getAttribute("name") + selectionCounter++
                                          clone.id = name
                                          document.getElementById("selectContainer").appendChild(clone)
                                        }
                                      </script>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>

                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <td colspan="5">V. CATATAN CUTI***</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row" colspan="3">1. Cuti Tahunan</th>
                                      <th scope="row">2. Cuti Besar</th>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <th>Tahun</th>
                                      <th>Sisa</th>
                                      <th>Keterangan</th>
                                      <th scope="row">3. Cuti Sakit</th>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td>2017</td>
                                      <td></td>
                                      <td>Diambil ... sisa ...</td>
                                      <th scope="row">4. Cuti Melahirkan</th>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td>2018</td>
                                      <td></td>
                                      <td>Diambil ... sisa ...</td>
                                      <th scope="row">5. Cuti Karena Alesan Penting</th>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td>2019</td>
                                      <td></td>
                                      <td>Diambil ... sisa ...</td>
                                      <th scope="row">6. Cuti di Luar tanggungan Negara</th>
                                      <td></td>
                                    </tr>
                                  </tbody>
                                </table>

                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <td colspan="4">VI. ALAMAT SELAMA MENJALANKAN CUTI**</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row"></th>
                                      <td></td>
                                      <th scope="row">Telepon</th>
                                      <td>081234736890</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Jabatan</th>
                                      <td>Panmud Permohonan</td>
                                      <th scope="row">Masa Kerja</th>
                                      <td></td>
                                    </tr>
                                    
                                  </tbody>
                                </table>

                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <td colspan="4">VII. PERTIMBANGAN ATASAN LANGSUNG</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">DISETUJUI</th>
                                      <th scope="row">PERUBAHAN****</th>
                                      <th scope="row">DITANGGUHKAN****</th>
                                      <th scope="row">TIDAK DISETUJUI</th>
                                    </tr>
                                    <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>                                      
                                    </tr>

                                    <tr>
                                      <td colspan="3"></td>
                                      <td>
                                        <br>
                                        <br>
                                               (Drs. Abdul Adhim AT) <br>
                                               NIP. 19671228 199403 1 004
                                      </td> 
                                    </tr>
                                    
                                  </tbody>
                                </table>

                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <td colspan="4">VIII. KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI**</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">DISETUJUI</th>
                                      <th scope="row">PERUBAHAN****</th>
                                      <th scope="row">DITANGGUHKAN****</th>
                                      <th scope="row">TIDAK DISETUJUI</th>
                                    </tr>
                                    <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>                                      
                                    </tr>

                                    <tr>
                                      <td colspan="3"></td>
                                      <td>
                                        </br>
                                        </br>
                                               (Drs. Abdul Adhim AT) <br>
                                               NIP. 19671228 199403 1 004
                                      </td> 
                                    </tr>
                                    
                                  </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Catatan:</h5>
                                        <p>
                                            *Coret yang tidak perlu <br>
                                            **Pilih salah satu dg memberi tanda centang <br>
                                            ***Diisi oleh pejabat kepegawaian <br>
                                            ****Diberi tanda centang dan alasannya <br>
                                            N = Cuti tahun berjalan <br>
                                            N-1 = Sisa cuti 1 tahun sebelumnya <br>
                                            N-2 = Sisa cuti 2 tahun sebelumnya <br>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                <div class="col-md-2 col-md-offset-10">
                                    <a href="{{url('datacuti/pdf')}}" class="btn btn-danger">Cetak</a>
                                </div>
                            </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{url('/')}}/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="{{url('/')}}/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="{{url('/')}}/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="{{url('/')}}/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{url('/')}}/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{url('/')}}/assets/js/demo.js"></script>


</html>
