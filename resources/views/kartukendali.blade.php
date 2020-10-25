<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>PENGADILAN AGAMA WATES</title>
    <style>
        table,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: left;
            padding-left: 5px;
            font-size: 14px
        }

        th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            width: 115%;
            margin-right: 10%;
            margin-left: 10%;
        }

    </style>
</head>

<body>
    <h2 style="text-align:center;">KARTU KENDALI CUTI PEGAWAI</h2>
    <p>Nama: {{$user->nama}}</p>
    <p>NIP: {{$user->nip}}</p>

        <table style="text-align:left; margin:0em;width:100%;">
            <thead>
                <tr>
                    <th rowspan="2" style="text-align: center" width="3%">NO</b></th>
                    <th rowspan="2" width=10% style="text-align: center">CUTI TAHUNAN <br> TAHUN </th>
                    <th colspan="2" width=20% style="text-align: center">SURAT IZIN CUTI</th>
                    <th colspan="2" width=20% style="text-align: center">LAMA CUTI</th>
                    <th colspan="1" width=10% style="text-align: center">KET</th>
                </tr>
                <tr>
                    <th style="text-align: center">TANGGAL</th>
                    <th style="text-align: center">NOMOR SURAT</th>
                    <th style="text-align: center">TANGGAL</th>
                    <th style="text-align: center">LAMA (Hari)</th>
                    <th style="text-align: center">SISA CUTI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cuti as $c)
                @if($c->progress == 2)
                  @if($c['kategori'] === "Cuti Tahunan")
                    @foreach ($tgl as $t)
                      @if ($t->cuti_id === $c['id_cuti'])
                        <tr>
                            <td style="text-align:center">{{$i}}</td>
                            <td style="text-align:center">{{substr($t->tgl_cuti,0,4)}}</td>
                            <td style="text-align:center">{{date('d F Y', strtotime($c['tgl_surat']))}}</td>
                            <td style="text-align:center">{{$c['no_surat']}}</td>
                            <td style="text-align:center">{{date('d F Y', strtotime($t->tgl_cuti))}}</td>
                            <td style="text-align:center">{{$c['lama_cuti']}}</td>
                            <td style="text-align:center">{{($set - $c->sisacutis[0]->jumlah_cuti) + ($set - $c->sisacutis[1]->jumlah_cuti)}}</td>
                        </tr>
                        @break
                      @endif
                    @endforeach
                  @endif
                @endif
                @endforeach
            </tbody>
        </table>
        <br><br>
        <table style="width:100%;text-align:left; margin:0em">
            <thead>
                <tr>
                    <th rowspan="2" style="text-align: center" width="3%">NO</b></th>
                    <th rowspan="2" width=10% style="text-align: center">CUTI SAKIT <br> TAHUN </th>
                    <th colspan="2" width=20% style="text-align: center">SURAT IZIN CUTI</th>
                    <th colspan="2" width=20% style="text-align: center">LAMA CUTI</th>
                    <th colspan="1" width=10% style="text-align: center">KET</th>
                </tr>
                <tr>
                    <th style="text-align: center">TANGGAL</th>
                    <th style="text-align: center">NOMOR SURAT</th>
                    <th style="text-align: center">TANGGAL</th>
                    <th style="text-align: center">LAMA (Hari)</th>
                    <th style="text-align: center">SISA CUTI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cuti as $c)
                <?php $last = $loop->count ?>
                @if($c->progress == 2)
                  @if($c['kategori'] === "Cuti Sakit")
                    @foreach ($tgl as $t)
                      @if ($t->cuti_id === $c['id_cuti'])
                        <tr>
                            <td style="text-align:center">{{$i}}</td>
                            <td style="text-align:center">{{substr($t->tgl_cuti,0,4)}}</td>
                            <td style="text-align:center">{{date('d F Y', strtotime($c['tgl_surat']))}}</td>
                            <td style="text-align:center">{{$c['no_surat'] ? $c['no_surat'] : '-'}}</td>
                            <td style="text-align:center">{{date('d F Y', strtotime($t->tgl_cuti))}}</td>
                            <td style="text-align:center">{{$c['lama_cuti']}}</td>
                            <td style="text-align:center">{{($set - $c->sisacutis[0]->jumlah_cuti) + ($set - $c->sisacutis[1]->jumlah_cuti)}}</td>
                        </tr>
                        @break
                      @endif
                    @endforeach
                  @endif
                @endif
                @endforeach
            </tbody>
        </table>
</body>

</html>
