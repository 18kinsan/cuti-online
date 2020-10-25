<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\User;
use App\Setting;
use App\SisaCuti;
use App\Cuti;
use App\TanggalCuti;
use App\KategoriCuti;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
  public function nip_validation(Request $req)
  {
    $nip = $req->nip;
    $user = \App\User::select('nip')->where('nip', $nip)->first();
    if ($nip == null) {
       return "Tidak Boleh Kosong!";
    }else if ($user != null) {
       return "Sudah Terdaftar!";
    }
  }

  public function email_validation(Request $req)
  {
    $email = $req->email;
    $user = \App\User::select('email')->where('email', $email)->first();
    if ($user != null) {
       return "Sudah Terdaftar!";
    }
  }

    public function index()
    {
        $cuti = Cuti::orderBy('updated_at', 'desc')->limit(10)->get();
        $tahunan = Cuti::where('kategori', "Cuti Tahunan")->get();
        $sakit = Cuti::where('kategori', "Cuti Sakit")->get();
        $izin = \App\Izin::orderBy('updated_at', 'desc')->limit(10)->get();
        $izins = [];
        foreach ($izin as $i) {
            $atasanIzinData = \App\User::where('nip', $i->atasan)->first();
            $atasanIzin = $atasanIzinData ? $atasanIzinData->nama : '-';
            $it = 0;
            $izins[] = [
                'nip' => $i->user->nip,
                'nama' => $i->user->nama,
                'kategori' => $i->kategori,
                'tanggal_izin' => $i->tanggal_izin,
                'tanggal_sekarang' => $i->tanggal_sekarang,
                'keperluan' => $i->keperluan,
                'atasan' => $atasanIzin
            ];
        }
        // dd($izins);
        $i = 1;
        $ii = 1;
        $iii = 1;
        $tgl = TanggalCuti::get();
        $jan = 0;
        $feb = 0;
        $mar = 0;
        $apr = 0;
        $mei = 0;
        $jun = 0;
        $jul = 0;
        $agu = 0;
        $sep = 0;
        $okt = 0;
        $nov = 0;
        $des = 0;
        $tgl2 = [];
        foreach($tgl as $x){
          if ($x->cuti->progress == 2) {
            if(date('M', strtotime($x->tgl_cuti)) == 'Jan'){
              $pegawai_cuti_jan[] = $x->cuti->pegawai_id;
              $jan = count(array_unique($pegawai_cuti_jan));
            }elseif(date('M', strtotime($x->tgl_cuti)) == 'Feb'){
              $pegawai_cuti_feb[] = $x->cuti->pegawai_id;
              $feb = count(array_unique($pegawai_cuti_feb));
            }elseif(date('M', strtotime($x->tgl_cuti)) == 'Mar'){
              $pegawai_cuti_mar[] = $x->cuti->pegawai_id;
              $mar = count(array_unique($pegawai_cuti_mar));
            }elseif(date('M', strtotime($x->tgl_cuti)) == 'Apr'){
              $pegawai_cuti_apr[] = $x->cuti->pegawai_id;
              $apr = count(array_unique($pegawai_cuti_apr));
            }elseif(date('M', strtotime($x->tgl_cuti)) == 'May'){
              $pegawai_cuti_may[] = $x->cuti->pegawai_id;
              $mei = count(array_unique($pegawai_cuti_may));
            }elseif(date('M', strtotime($x->tgl_cuti)) == 'Jun'){
              $pegawai_cuti_jun[] = $x->cuti->pegawai_id;
              $jun = count(array_unique($pegawai_cuti_jun));
            }elseif(date('M', strtotime($x->tgl_cuti)) == 'Jul'){
              $pegawai_cuti_jul[] = $x->cuti->pegawai_id;
              $jul = count(array_unique($pegawai_cuti_jul));
            }elseif(date('M', strtotime($x->tgl_cuti)) == 'Aug'){
              $pegawai_cuti_aug[] = $x->cuti->pegawai_id;
              $agu = count(array_unique($pegawai_cuti_aug));
            }elseif(date('M', strtotime($x->tgl_cuti)) == 'Sep'){
              $pegawai_cuti_sep[] = $x->cuti->pegawai_id;
              $sep = count(array_unique($pegawai_cuti_sep));
            }elseif(date('M', strtotime($x->tgl_cuti)) == 'Okt'){
              $pegawai_cuti_okt[] = $x->cuti->pegawai_id;
              $okt = count(array_unique($pegawai_cuti_okt));
            }elseif(date('M', strtotime($x->tgl_cuti)) == 'Nov'){
              $pegawai_cuti_nov[] = $x->cuti->pegawai_id;
              $nov = count(array_unique($pegawai_cuti_nov));
            }elseif(date('M', strtotime($x->tgl_cuti)) == 'Dec'){
              $pegawai_cuti_dec[] = $x->cuti->pegawai_id;
              $des = count(array_unique($pegawai_cuti_dec));
            }
          }
        }

        return view('admin.dashboard', compact(['cuti', 'iii', 'izins', 'tahunan', 'sakit', 'i', 'ii', 'jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu', 'sep', 'okt', 'nov', 'des']));
    }

    public function pegawaiData()
    {
      $users = \App\User::orderBy('created_at', 'desc')->paginate(10);
      $userAll = \App\User::all();
      $i = 1;

      return view('admin.pegawai', compact(['users', 'userAll', 'i']));
    }

    public function laporan()
    {
      $cuti = \App\Cuti::orderBy('updated_at', 'desc')->paginate(10);
      $bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
      $thn = date('Y');
      $i = 1;
      $a = 0;
      $sisa = \App\SisaCuti::where('tahun', date('Y')-1)->get();
      $data = [];
      foreach ($cuti as $u) {
          if ($u->sisacutis != null && $u->progress == 2) {
            $data[] = [
              'role' => $u->user->role,
              'progress' => $u->progress,
              'nama' => $u->user->nama,
              'nip' => $u->user->nip,
              'jabatan' => $u->user->jabatan,
              'tanggal' => $u->tgl_surat,
              'no_surat' => "W12-A5/{$u->no_surat}/KP.05.2/{$bln[date('n')]}/{$thn}",
              'lama_cuti' => $u->lama_cuti,
              'kategori' => $u->kategori == 'Cuti Sakit' ? 1 : 0,
              '2018' => $u->sisacutis[0]->tahun,
              '2019' => $u->sisacutis[1]->tahun,
              '2018_2' => $u->sisacutis[0]->jumlah_cuti,
              '2019_2' => $u->sisacutis[1]->jumlah_cuti,
              'before' => $u->tahun_before,
              'now' => $u->tahun_now,
            ];
          }
      }
      // dd($cuti);
      $setting = \App\Setting::first()->maks_cuti;

      return view('admin.laporan', compact(['data', 'cuti', 'i', 'setting']));
    }

    function pdf()
    {
      $cuti = \App\Cuti::all();
      $bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
      $thn = date('Y');
      $i = 1;
      $a = 0;
      $sisa = \App\SisaCuti::where('tahun', date('Y')-1)->get();
      $data = [];
      foreach ($cuti as $u) {
          if ($u->sisacutis != null) {
            $data[] = [
              'role' => $u->user->role,
              'progress' => $u->progress,
              'nama' => $u->user->nama,
              'nip' => $u->user->nip,
              'jabatan' => $u->user->jabatan,
              'tanggal' => $u->tgl_surat,
              'no_surat' => "W12-A5/{$u->no_surat}/KP.05.2/{$bln[date('n')]}/{$thn}",
              'lama_cuti' => $u->lama_cuti,
              'kategori' => $u->kategori == 'Cuti Sakit' ? 1 : 0,
              '2018' => $u->sisacutis[0]->tahun,
              '2019' => $u->sisacutis[1]->tahun,
              '2018_2' => $u->sisacutis[0]->jumlah_cuti,
              '2019_2' => $u->sisacutis[1]->jumlah_cuti,
              'before' => $u->tahun_before,
              'now' => $u->tahun_now,
            ];
          }
      }
      // dd($data);
      $setting = \App\Setting::first()->maks_cuti;

        $pdf = PDF::loadview('rekapcuti', compact('data', 'i', 'sisa', 'setting'))->setPaper('Legal', 'landscape');
        return $pdf->stream('Rekap Cuti Pegawai.pdf');
    }

    public function kartuKendali($id)
    {
        $users = \App\User::find($id);
        $a = $users->nama;
        $pdf = PDF::loadview('kartukendali', compact('users'))->setPaper('Legal', 'landscape');

        return view('kartukendali', compact('u'));
        // return $pdf->stream('Kartu Kendali '. $a . '.pdf');
    }

    public function pengaturan()
    {
      $maks = \App\Setting::first()->maks_cuti;
      return view('admin.pengaturan', compact('maks'));
    }

    public function editPengaturan(Request $req)
    {
      $maks = \App\Setting::first();
      $maks->maks_cuti = $req->maks;

      $maks->save();
      return redirect()->back();
    }


    public function create()
    {
        return view('admin.pegawai');
    }
    public function store(Request $request)
    {
        $cuti = Setting::first();
//         dd($request->all());

        $validator = Validator::make($request->all(), [
          'nip' => 'required',
          'nama' => 'required',
          'jabatan' => 'required',
          'no_telp' => 'required',
          'alamat' => 'required',
          'email' => 'required',
          'tgl_masuk' => 'required',
          'password' => 'required',
        ]);
        if($validator->fails()){
          return redirect()->back()->with('status_fail', 'Dimohon untuk Melengkapi Data Terlebih Dahulu');
        }else{
        $new_user = \App\User::create([
           'nip'=>$request->get('nip'),
           'nama'=> $request->get('nama'),
           'jabatan' => $request->get('jabatan'),
            'no_telp' => $request->get('no_telp'),
            'alamat' => $request->get('alamat'),
           'email' => $request->get('email'),
           'tgl_masuk' => date($request->get('tgl_masuk')),
           'atasan_1' => $request->get('atasan1'),
           'atasan_2' => $request->get('atasan2'),
           'password' => bcrypt($request->get('password'))
        ]);

        $new_user->sisacuti()->create([
          'tahun' => date('Y'),
          'jumlah_cuti' => $cuti->maks_cuti-$request->jumlah_cuti3
        ]);

        $new_user->sisacuti()->create([
          'tahun' => date('Y')-1,
          'jumlah_cuti' => $cuti->maks_cuti-$request->jumlah_cuti2
        ]);

        $new_user->sisacuti()->create([
          'tahun' => date('Y')-2,
          'jumlah_cuti' => $cuti->maks_cuti-$request->jumlah_cuti1
        ]);

        return redirect()->back()->with('status_tambah', 'Data Pegawai Berhasil Ditambahkan');
        }
    }

    public function show($id)
    {
        $user = \App\User::findOrFail($id);

        return view('dashboard.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = \App\User::find($id);

        return view('dashboard.pegawai', compact('users'));
    }

    public function pegawaiEdit(Request $req)
    {
      $id = $req->id;
      $pegawai = \App\User::find($id);
      $setting = \App\Setting::first()->maks_cuti;
      $jum1 = 0;
      $jum2 = 0;
      $jum3 = 0;
      $jumlah_cuti1 = \App\SisaCuti::where('pegawai_id', $id)->where('tahun', date("Y")-2)->first();
      if($jumlah_cuti1 != null){
        $jum1 = $setting - $jumlah_cuti1->jumlah_cuti;
      }
      $jumlah_cuti2 = \App\SisaCuti::where('pegawai_id', $id)->where('tahun', date("Y")-1)->first();
      if($jumlah_cuti2 != null){
        $jum2 = $setting - $jumlah_cuti2->jumlah_cuti;
      }
      $jumlah_cuti3 = \App\SisaCuti::where('pegawai_id', $id)->where('tahun', date("Y"))->first();
      if($jumlah_cuti3 != null){
        $jum3 = $setting - $jumlah_cuti3->jumlah_cuti;
      }
      $nip1 = $pegawai->atasan_1;
      $nip2 = $pegawai->atasan_2;
      $atasan1 = "-";
      $atasan1_nip = "-";
      $atasan2 = "-";
      $atasan2_nip = "-";
      if(\App\User::where('nip', $nip1)->first())
      {
         $atasan1 = \App\User::where('nip', $nip1)->first()->nama;
         $atasan1_nip = \App\User::where('nip', $nip1)->first()->nip;
      }else{
        $atasan1 = '-';
      }
      if(\App\User::where('nip', $nip2)->first())
      {
         $atasan2 = \App\User::where('nip', $nip2)->first()->nama;
         $atasan2_nip = \App\User::where('nip', $nip2)->first()->nip;
      }else{
        $atasan2 = '-';
      }
      $data = [
          'nama' => $pegawai->nama,
          'nip' => $pegawai->nip,
          'jabatan' => $pegawai->jabatan,
          'no_telp' => $pegawai->no_telp,
          'alamat' => $pegawai->alamat,
          'email' => $pegawai->email,
          'tgl_masuk' => date($pegawai->tgl_masuk),
          'atasan_1' => $atasan1,
          'atasan_1_nip' => $atasan1_nip,
          'atasan_2' => $atasan2,
          'atasan_2_nip' => $atasan2_nip,
          'jumlah_cuti1' => $jum1,
          'jumlah_cuti2' => $jum2,
          'jumlah_cuti3' => $jum3,
      ];

      return response()->json($data, 200);
    }

    public function update(Request $request)
    {
      //
      $user = \App\User::findOrFail($request->id);
      if ($request->password == null) {
         $password = $user->password;
      }else {
         $password = bcrypt($request->password);
      }
      $setting = Setting::first();
      $jumlah_cuti1 = \App\SisaCuti::where('pegawai_id', $user->id_pegawai)->where('tahun', date("Y")-2)->first();
      if($jumlah_cuti1 != null){
        $jumlah_cuti1->jumlah_cuti = $request->jumlah_cuti1;
        $jumlah_cuti1->save();
      }else{
        SisaCuti::create([
          'tahun' => date('Y')-2,
          'jumlah_cuti' => (($setting->maks_cuti)-($request->jumlah_cuti1)),
          'pegawai_id' => $user->id_pegawai
        ]);
      }
      $jumlah_cuti2 = \App\SisaCuti::where('pegawai_id', $user->id_pegawai)->where('tahun', date("Y")-1)->first();
      if($jumlah_cuti2 != null){
        $jumlah_cuti2->jumlah_cuti = $request->jumlah_cuti2;
        $jumlah_cuti2->save();
      }else{
        SisaCuti::create([
          'tahun' => date('Y')-1,
          'jumlah_cuti' => (($setting->maks_cuti)-($request->jumlah_cuti2)),
          'pegawai_id' => $user->id_pegawai
        ]);
      }
      $jumlah_cuti3 = \App\SisaCuti::where('pegawai_id', $user->id_pegawai)->where('tahun', date("Y"))->first();
      if($jumlah_cuti3 != null){
        $jumlah_cuti3->jumlah_cuti = $request->jumlah_cuti3;
        $jumlah_cuti3->save();
      }else{
        SisaCuti::create([
          'tahun' => date('Y'),
          'jumlah_cuti' => (($setting->maks_cuti)-($request->jumlah_cuti3)),
          'pegawai_id' => $user->id_pegawai
        ]);
      }


      // dd($request->all());
      $data = [
         'nip' => $request->nip,
         'nama' => $request->nama,
          'jabatan' => $request->jabatan,
          'no_telp' => $request->no_telp,
          'alamat' => $request->alamat,
         'email' => $request->email,
         'tgl_masuk' => date($request->tgl_masuk),
         'atasan_1' => $request->atasan1,
         'atasan_2' => $request->atasan2,
         'jumlah_cuti1' => $request->jumlah_cuti1,
         'jumlah_cuti2' => $request->jumlah_cuti2,
         'jumlah_cuti3' => $request->jumlah_cuti3,
         'password' => $password
      ];
          $user->update($data);
          return redirect()->back()->with('status_ubah','Data Pegawai Berhasil Diubah');
    }

    public function destroy(Request $req)
    {
        $id= $req->id;
        // dd($id);
        $user = \App\User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('status_hapus', 'Data Pegawai Berhasil Dihapus');
    }

    public function hapus_cuti(Request $req)
    {
        $id=$req->id;
        $cut = \App\Cuti::findOrFail($id);
        $cut->delete();

        return redirect()->back();
    }

    public function disetujui($id){

      $cuti = \App\Cuti ::find($id);
      $cuti->progress = 1;
      $sisaCuti1 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
      $sisaCuti2 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
      SisaCuti::create([
        'tahun' => date('Y')-1,
        'jumlah_cuti' => $sisaCuti1->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);
      SisaCuti::create([
        'tahun' => date('Y'),
        'jumlah_cuti' => $sisaCuti2->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);

      $cuti->save();
      return redirect()->back();
    }

    public function dirubah($id){
      $cuti = \App\Cuti ::find($id);
      $cuti->progress = 3;
      $sisaCuti1 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
      $sisaCuti2 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
      SisaCuti::create([
        'tahun' => date('Y')-1,
        'jumlah_cuti' => $sisaCuti1->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);
      SisaCuti::create([
        'tahun' => date('Y'),
        'jumlah_cuti' => $sisaCuti2->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);

      $cuti->save();
      return redirect()->back();
    }

    public function ditangguhkan($id){
      $cuti = \App\Cuti ::find($id);
      $cuti->progress = 5;
      $sisaCuti1 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
      $sisaCuti2 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
      SisaCuti::create([
        'tahun' => date('Y')-1,
        'jumlah_cuti' => $sisaCuti1->id_pegawai,
        'pegawai_id' => $cuti->user->pegawai_id,
        'cuti_id' => $id
      ]);
      SisaCuti::create([
        'tahun' => date('Y'),
        'jumlah_cuti' => $sisaCuti2->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);

      $cuti->save();
      return redirect()->back();
    }

    public function ditolak($id){
      $cuti = \App\Cuti ::find($id);

      $cuti->progress = 98;
      $cuti->save();
      $sisaCuti1 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
      $sisaCuti2 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
      SisaCuti::create([
        'tahun' => date('Y')-1,
        'jumlah_cuti' => $sisaCuti1->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);
      SisaCuti::create([
        'tahun' => date('Y'),
        'jumlah_cuti' => $sisaCuti2->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);
      return redirect()->back();
    }

    public function noSurat(Request $req){

      $cuti = \App\Cuti::find($req->id);
      // dd($cuti);
      $validator = Validator::make($req->all(),[
        'nomor_surat' => 'integer',
      ]);
      if($validator->fails()){
        return redirect()->back()->with('status_fail', 'Masukkan Nomor Surat Berupa Angka');
      }else{
      $cuti->no_surat = $req->nomor_surat;
      $cuti->tgl_surat = $req->tanggal_surat;
      $cuti->progress = 2;
      $sisaCuti1 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
      $sisaCuti2 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
      $setting = Setting::first()->maks_cuti;
      if($sisaCuti1 != null){
            if($sisaCuti1->jumlah_cuti != 0){
                    if($setting - $sisaCuti1->jumlah_cuti >= $cuti->lama_cuti){
                        $jmlh = $sisaCuti1->jumlah_cuti + $cuti->lama_cuti;
                        $cuti->tahun_before = $cuti->lama_cuti;
                        $cuti->tahun_now = 0;
                        $cuti->save();
                        SisaCuti::create([
                          'tahun' => date('Y')-1,
                          'jumlah_cuti' => $jmlh,
                          'pegawai_id' => $cuti->pegawai_id,
                          'cuti_id' => $req->id
                        ]);
                        SisaCuti::create([
                          'tahun' => date('Y'),
                          'jumlah_cuti' => $sisaCuti2->jumlah_cuti,
                          'pegawai_id' => $cuti->pegawai_id,
                          'cuti_id' => $req->id
                        ]);
                    }else{
                        $newReq = $cuti->lama_cuti - ($setting - $sisaCuti1->jumlah_cuti);
                        $sisaCuti1->jumlah_cuti = 12;
                        $cuti->tahun_before = $cuti->lama_cuti - $newReq;
                        $cuti->tahun_now = $newReq;
                        $cuti->save();

                        $jmlh = $sisaCuti2->jumlah_cuti + $newReq;

                        SisaCuti::create([
                          'tahun' => date('Y')-1,
                          'jumlah_cuti' => 12,
                          'pegawai_id' => $cuti->pegawai_id,
                          'cuti_id' => $req->id
                        ]);
                        SisaCuti::create([
                          'tahun' => date('Y'),
                          'jumlah_cuti' => $jmlh,
                          'pegawai_id' => $cuti->pegawai_id,
                          'cuti_id' => $req->id
                        ]);
                    }
            }else{
                    $jmlh = $sisaCuti2->jumlah_cuti + $cuti->lama_cuti;
                    $cuti->tahun_now = $newReq;
                    $cuti->save();
                    SisaCuti::create([
                      'tahun' => date('Y')-1,
                      'jumlah_cuti' => $sisaCuti1->jumlah_cuti,
                      'pegawai_id' => $cuti->pegawai_id,
                      'cuti_id' => $req->id
                    ]);
                    SisaCuti::create([
                      'tahun' => date('Y'),
                      'jumlah_cuti' => $jmlh,
                      'pegawai_id' => $cuti->pegawai_id,
                      'cuti_id' => $req->id
                    ]);
            }
      }else{
          $jmlh = $sisaCuti2->jumlah_cuti + $cuti->lama_cuti;
          $cuti->tahun_now = $cuti->lama_cuti;
          $cuti->save();

          SisaCuti::create([
            'tahun' => date('Y')-1,
            'jumlah_cuti' => $sisaCuti1->jumlah_cuti,
            'pegawai_id' => $cuti->id_pegawai,
            'cuti_id' => $req->id
          ]);

          SisaCuti::create([
            'tahun' => date('Y'),
            'jumlah_cuti' => $jmlh,
            'pegawai_id' => $cuti->id_pegawai,
            'cuti_id' => $req->id
          ]);
      }

      $cuti->save();
      return redirect()->back();

      }


    }

    public function dirubah2($id){
      $cuti = \App\Cuti ::find($id);

      $cuti->progress = 4;
      $cuti->save();
      $sisaCuti1 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
      $sisaCuti2 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
      SisaCuti::create([
        'tahun' => date('Y')-1,
        'jumlah_cuti' => $sisaCuti1->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);
      SisaCuti::create([
        'tahun' => date('Y'),
        'jumlah_cuti' => $sisaCuti2->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);
      return redirect()->back();
    }

    public function ditangguhkan2($id){
      $cuti = \App\Cuti ::find($id);
      $cuti->progress = 6;

      $cuti->save();
      $sisaCuti1 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
      $sisaCuti2 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
      SisaCuti::create([
        'tahun' => date('Y')-1,
        'jumlah_cuti' => $sisaCuti1->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);
      SisaCuti::create([
        'tahun' => date('Y'),
        'jumlah_cuti' => $sisaCuti2->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);
      return redirect()->back();
    }

    public function ditolak2($id){
      $cuti = \App\Cuti ::find($id);

      $cuti->progress = 99;
      $cuti->save();
      $sisaCuti1 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
      $sisaCuti2 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
      SisaCuti::create([
        'tahun' => date('Y')-1,
        'jumlah_cuti' => $sisaCuti1->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);
      SisaCuti::create([
        'tahun' => date('Y'),
        'jumlah_cuti' => $sisaCuti2->jumlah_cuti,
        'pegawai_id' => $cuti->user->id_pegawai,
        'cuti_id' => $id
      ]);
      return redirect()->back();
    }
}
