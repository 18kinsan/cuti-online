<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\KategoriCuti;
use App\TanggalCuti;
use App\Cuti;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\SisaCuti;
use Illuminate\Support\Facades\DB;
use App\Setting;
use Illuminate\Support\Facades\Validator;
use App\Izin;

class PegawaiController extends Controller {

   public function index()
   {
        $id = Auth::user()->id_pegawai;
        $sisa = 0;
        $setting = Setting::first()->maks_cuti;
        $sisa1 = SisaCuti::where('pegawai_id', $id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
        $sisa2 = SisaCuti::where('pegawai_id', $id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
        // dd([$sisa1, $sisa2]);
        if($sisa1 != null){
            if($sisa1->jumlah_cuti != 0){
                if($sisa1->jumlah_cuti < 6){
                    $sisa = $sisa + 6 + ($setting - $sisa2->jumlah_cuti);
                }else{
                    $sisa = $sisa + ($setting - $sisa1->jumlah_cuti) + ($setting - $sisa2->jumlah_cuti);
                }
            }
        }else{
            $sisa = $setting - $sisa2->jumlah_cuti;
        }
        $tahun1 = SisaCuti::where('pegawai_id', $id)->where('tahun', date("Y")-2)->orderBy('updated_at', 'desc')->first();
        if($tahun1 == null){
            $new = SisaCuti::create([
                'tahun' => date("Y")-2,
                'jumlah_cuti' => 12,
                'pegawai_id' => $id
            ]);
            $new->save();
        }
        $tahun2 = SisaCuti::where('pegawai_id', $id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
        if($tahun2 != null){
            if($tahun2->jumlah_cuti < 6){
                $tahun2->jumlah_cuti = 6;
                $tahun2->save();
            }
        }else{
            $new = SisaCuti::create([
                'tahun' => date("Y")-1,
                'jumlah_cuti' => 12,
                'pegawai_id' => $id
            ]);
            $new->save();
        }
        $tahun3 = SisaCuti::where('pegawai_id', $id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
        if($tahun3 == null){
            $new = SisaCuti::create([
                'tahun' => date("Y"),
                'jumlah_cuti' => 0,
                'pegawai_id' => $id
            ]);
            $new->save();
        }
        $setting = Setting::first()->maks_cuti;
        $cutis = Cuti::where('pegawai_id', $id)->get();
        $cutii = [];
        $month1[] = null;
        $month2[] = null;
        foreach($cutis as $cuti){
            $cutii[] = [
                'id_cuti' => $cuti->id_cuti,
                'alasan' => $cuti->alasan,
                'progress' => $cuti->progress,
                'kategori' => $cuti->kategori,
                'lama_cuti' => $cuti->lama_cuti
            ];
        }
        $count = count($cutii);
        $tgl = DB::table('tanggal_cutis')->join('cutis', 'tanggal_cutis.cuti_id', '=', 'cutis.id_cuti')->select('tanggal_cutis.tgl_cuti', 'tanggal_cutis.cuti_id')->where('pegawai_id', $id)->orderBy('tgl_cuti')->get();
        // if($count > 0){
        //     $temp = substr($tgl[0]->tgl_cuti, 6, 1);
        //     $temp2 = substr($tgl[0]->tgl_cuti, 6, 1);
        //     foreach ($cutii as $x){
        //         foreach ($tgl as $y){
        //             if($y->cuti_id === $x['id_cuti']){
        //                 $monthNum = substr($y->tgl_cuti, 6, 1);
        //                 if($temp === $monthNum){
        //                     $month1 = date('F', mktime(0, 0, 0, $monthNum, 10));
        //                 }
        //                 else{
        //                     $month2 = date('F', mktime(0, 0, 0, $temp, 10));
        //                     $temp = $monthNum;
        //                 }
        //                 $date[] = [
        //                     'date' => substr($y->tgl_cuti, 8),
        //                 ];
        //             }
        //         }
        //     }
        // }
        $i = 1;
        $s = 1;
        return view('user.dashboarduser', compact(['tahun1', 'tahun2', 'tahun3', 'cutii', 'setting', 'kategori', 'month1', 'month2', 'date', 'count', 'i', 'tgl', 'temp2', 'temp1', 'id', 's', 'sisa']));
   }

    public function profil()
    {
        $user = Auth::user();
        if($user->atasan_1 != null){
            $a1 = User::where('nip', $user->atasan_1)->first();
            if ($a1) {
              $atasan1 = $a1->nama;
            }else {
              $atasan1 = '-';
            }
        }
        if($user->atasan_2 != null){
            $a2 = User::where('nip', $user->atasan_2)->first();
            if ($a2) {
              $atasan2 = $a2->nama;
            }else {
              $atasan2 = '-';
            }
        }

        return view('user.profile', compact('user', 'atasan1', 'atasan2'));
    }

    public function profilEdit(Request $req)
    {
        $user = Auth::user();

        $validator = Validator::make($req->all(),[
            'email' => 'email',
            'password' => 'confirmed'
        ]);

        if($validator->fails()){
            return redirect()->back()->with('status_fail', 'Harap Masukan Password Yang Sama');
        }else{
            if($req->email){
                $user->email = $req->email;
                if($req->password){
                    $user->password = bcrypt($req->password);
                }
                $user->save();
            }else{
                if($req->password){
                    $user->password = bcrypt($req->password);
                    $user->save();
                }else{
                    return redirect()->back();
                }
            }

            return redirect()->back()->with('status_success', 'Data Berhasil Dirubah');
        }
    }

    public function cuti(){
        $pegawai = Auth::user();
        $cutis = Cuti::where('pegawai_id', $pegawai->id_pegawai)->get();
        $cutii = [];
        foreach($cutis as $cuti){
            $cutii[] = [
                'id_cuti' => $cuti->id_cuti,
                'kategori' => $cuti->kategori,
                'alasan' => $cuti->alasan,
                'progress' => $cuti->progress,
                'kategori' => $cuti->kategori,
                'lama_cuti' => $cuti->lama_cuti
            ];
        }
        $count = count($cutii);
        $date = [];
        $month = null;
        $tgl = DB::table('tanggal_cutis')->join('cutis', 'tanggal_cutis.cuti_id', '=', 'cutis.id_cuti')->select('tanggal_cutis.tgl_cuti', 'tanggal_cutis.cuti_id')->where('pegawai_id', $pegawai->id_pegawai)->orderBy('tgl_cuti')->get();
        // dd($cutii[0]['id_cuti']);
        // if($count > 0){
        //     $temp = substr($tgl[0]->tgl_cuti, 6, 1);
        //     $temp2 = substr($tgl[0]->tgl_cuti, 6, 1);
        //     foreach ($cutii as $x){
        //         foreach ($tgl as $y){
        //             if($y->cuti_id === $x['id_cuti']){
        //                 $monthNum = substr($y->tgl_cuti, 6, 1);
        //                 if($temp === $monthNum){
        //                     $month1 = date('F', mktime(0, 0, 0, $monthNum, 10));
        //                 }
        //                 else{
        //                     $month2 = date('F', mktime(0, 0, 0, $monthNum, 10));
        //                     $temp = $monthNum;
        //                 }
        //                 $date[] = [
        //                     'date' => substr($y->tgl_cuti, 8),
        //                 ];
        //             }
        //         }
        //     }
        // }
        $setting = Setting::first()->maks_cuti;
        $year = date('Y');
        $sisa = 0;
        $sisa1 = SisaCuti::where('pegawai_id', $pegawai->id_pegawai)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
        $sisa2 = SisaCuti::where('pegawai_id', $pegawai->id_pegawai)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
        if($sisa1 != null){
            if($sisa1->jumlah_cuti != 0){
                if($sisa1->jumlah_cuti < 6){
                    $sisa = $sisa + 6 + ($setting - $sisa2->jumlah_cuti);
                }else{
                    $sisa = $sisa + ($setting - $sisa1->jumlah_cuti) + ($setting - $sisa2->jumlah_cuti);
                }
            }
        }else{
            $sisa = $setting - $sisa2->jumlah_cuti;
        }

        $i = 1;
        $in = 1;
        $tombol = true;
        return view('user.tambah_cuti', compact(['year', 'pegawai', 'kategori', 'i', 'terpakai', 'sisa', 'cutis', 'tgl', 'in', 'cutii', 'temp2', 'count', 'month', 'month1', 'month2', 'date', 'tombol']));
    }

    public function cutiStore(Request $req){
//         dd($req->all());
        if ($req->kategori == '-- Pilih Kategori --') {
          return redirect()->back()->with('status_fail', 'Pilih jenis cuti terlebih dahulu!');
        }

        $pegawai_id = Auth::user();
        $tgl = $req->tanggalCuti1;
        $setting = Setting::first()->maks_cuti;

        $cuti = Cuti::create([
            'alasan' => $req->alasan,
            'pegawai_id' => $pegawai_id->id_pegawai,
            'kategori' => $req->kategori,
            'alamat' => $req->alamat,
            'hp' => $req->hp,
            'lama_cuti' => $req->hari1,
        ]);

        if($req->jenisCuti == 0){
            for($i=1; $i<$req->hari1+1; $i++){
                $f = "tanggalCuti" . $i;
                $data = new TanggalCuti([
                    'tgl_cuti' => $req->$f
                ]);
                $cuti->tgl_cuti()->save($data);
            }
        } else {
            for($i=1; $i<$req->hari1+1; $i++){
                $data = new TanggalCuti([
                    'tgl_cuti' => $tgl
                ]);
                $date = new \DateTime($tgl);
                $date->add(new \DateInterval('P1D'));
                $fix = $date->format("Y-m-d");
                $tgl = $fix;
                $cuti->tgl_cuti()->save($data);
            }
        }

        // $sisaCuti1 = SisaCuti::where('pegawai_id', $pegawai_id->id_pegawai)->where('tahun', date("Y")-1)->first();
        // $sisaCuti2 = SisaCuti::where('pegawai_id', $pegawai_id->id_pegawai)->where('tahun', date("Y"))->first();

        if($req->kategori == "Cuti Tahunan"){
        //     if($sisaCuti1 != null){
        //         if($sisaCuti1->jumlah_cuti != 0){
        //             if($setting - $sisaCuti1->jumlah_cuti >= $req->hari){
        //                 $sisaCuti1->jumlah_cuti = $sisaCuti1->jumlah_cuti + $req->hari;
        //                 $cuti->tahun_before = $req->hari;
        //                 $cuti->save();
        //                 $sisaCuti1->save();
        //             }else{
        //                 $newReq = $req->hari - ($setting - $sisaCuti1->jumlah_cuti);
        //                 $sisaCuti1->jumlah_cuti = 12;
        //                 $cuti->tahun_before = $req->hari - $newReq;
        //                 $cuti->tahun_now = $newReq;
        //                 $cuti->save();
        //                 $sisaCuti1->save();
        //                 $sisaCuti2->jumlah_cuti = $sisaCuti2->jumlah_cuti + $newReq;
        //                 $sisaCuti2->save();
        //             }
        //         }else{
        //             $sisaCuti2->jumlah_cuti = $sisaCuti2->jumlah_cuti + $req->hari;
        //             $cuti->tahun_now = $newReq;
        //             $cuti->save();
        //             $sisaCuti2->save();
        //         }
        //     }else{
        //         $sisaCuti2->jumlah_cuti = $sisaCuti2->jumlah_cuti + $req->hari;
                $cuti->tahun_now = $req->hari1;
                $cuti->save();
                // $sisaCuti2->save();
        //     }
        }else{
            $cuti->progress  = 2;
            $cuti->tahun_now = $req->hari1;
            $cuti->save();

            $sisaCuti1 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
            $sisaCuti2 = SisaCuti::where('pegawai_id', $cuti->pegawai_id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();

            $cuti->sisacutis()->create([
              'tahun' => date('Y')-1,
              'jumlah_cuti' => $sisaCuti1->jumlah_cuti,
              'pegawai_id' => $pegawai_id->id_pegawai
            ]);

            $cuti->sisacutis()->create([
              'tahun' => date('Y'),
              'jumlah_cuti' => $sisaCuti2->jumlah_cuti,
              'pegawai_id' => $pegawai_id->id_pegawai
            ]);
        }

        return redirect()->back()->with('status_success', 'Cuti Berhasil Diajukkan!');
    }

    function cutiEdit(Request $req){
        $user = Auth::user()->id_pegawai;
        $setting = Setting::first()->maks_cuti;
        $id = $req->id;
        $cuti = \App\Cuti::find($id);
        $sisa1 = SisaCuti::where('pegawai_id', $user)->where('tahun', date('Y')-1)->first();
        $sisa2 = SisaCuti::where('pegawai_id', $user)->where('tahun', date('Y'))->first();
        $sisa = 0;
        if($sisa1 != null){
            $sisa = $sisa + $setting - $sisa2->jumlah_cuti + $setting - $sisa1->jumlah_cuti;
        }else{
            $sisa = $sisa + $setting - $sisa2->jumlah_cuti;
        }
        $data = [
            'kategori' => $cuti->kategori,
            'alasan' => $cuti->alasan,
            'sisa' => $sisa
        ];

        return response()->json($data, 200);
    }

    function cutiUpdate(Request $req){
        $user = Auth::user()->id_pegawai;
        $cuti = Cuti::find($req->id);

        $cuti->alasan = $req->alasan1;
        $cuti->lama_cuti = $req->hari1;
        $cuti->progress = 0;
        $cuti->save();

        // $sisaCuti1 = SisaCuti::where('pegawai_id', $user)->where('tahun', date("Y")-1)->first();
        // $sisaCuti2 = SisaCuti::where('pegawai_id', $user)->where('tahun', date("Y"))->first();
        $tgl_cuti = TanggalCuti::where('cuti_id', $req->id)->delete();
        // $setting = Setting::first()->maks_cuti;
        $tgl = $req->tanggalCuti1;
        if($req->jenisCuti2 == 0){
            for($i=1; $i<$req->hari1+1; $i++){
                $f = "tanggalCuti" . $i;
                $data = new TanggalCuti([
                    'tgl_cuti' => $req->$f
                ]);
                $cuti->tgl_cuti()->save($data);
            }
        } else {
            for($i=1; $i<$req->hari1+1; $i++){
                $data = new TanggalCuti([
                    'tgl_cuti' => $tgl
                ]);
                $date = new \DateTime($tgl);
                $date->add(new \DateInterval('P1D'));
                $fix = $date->format("Y-m-d");
                $tgl = $fix;
                $cuti->tgl_cuti()->save($data);
            }
        }
        // if($sisaCuti1 != null){
        //     if($sisaCuti1->jumlah_cuti != 0){
        //         if($setting - $sisaCuti1->jumlah_cuti >= $req->hari1){
        //             $sisaCuti1->jumlah_cuti = $sisaCuti1->jumlah_cuti + $req->hari1;
        //             $cuti->tahun_before = $req->hari1;
        //             $cuti->save();
        //             $sisaCuti1->save();
        //         }else{
        //             $newReq = $req->hari1 - ($setting - $sisaCuti1->jumlah_cuti);
        //             $sisaCuti1->jumlah_cuti = 12;
        //             $cuti->tahun_before = $req->hari1 - $newReq;
        //             $cuti->tahun_now = $newReq;
        //             $cuti->save();
        //             $sisaCuti1->save();
        //             $sisaCuti2->jumlah_cuti = $sisaCuti2->jumlah_cuti + $newReq;
        //             $sisaCuti2->save();
        //         }
        //     }else{
        //         $sisaCuti2->jumlah_cuti = $sisaCuti2->jumlah_cuti + $req->hari1;
        //         $cuti->tahun_now = $newReq;
        //         $cuti->save();
        //         $sisaCuti2->save();
        //     }
        // }else{
        //     $sisaCuti2->jumlah_cuti = $sisaCuti2->jumlah_cuti + $req->hari1;
        //     $cuti->tahun_now = $req->hari1;
        //     $cuti->save();
        //     $sisaCuti2->save();
        // }

        return redirect()->back();
    }

    public function izin()
    {
        $us = Auth::user()->id_pegawai;
        $izin = Izin::where('pegawai_id', $us)->get();
        $data = \App\User::all();
        $a = 1;

        // dd($izin);

        return view('user.izin', compact('data', 'izin', 'a', 'us'));
    }

    public function izinStore(Request $req)
    {
        // dd($req->all());
        $izin = Izin::create([
            'atasan' => $req->atasan,
            'pegawai_id' => Auth::user()->id_pegawai,
            'kategori' => $req->kategori,
            'atasan' => $req->atasan,
            'tanggal_sekarang' => now(),
            'tanggal_izin' => $req->tgl_izin,
            'pukul_izin' => $req->pukul_izin,
            // 'tanggal_pulang' => date('Y-m-d'),
            // 'pukul_pulang' => date('Y-m-d'),
            'keperluan' => $req->alasan
        ]);

        return redirect()->back();
    }


}
