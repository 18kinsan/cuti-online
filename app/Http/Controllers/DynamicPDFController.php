<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use \App\Cuti;
use App\TanggalCuti;
use App\SisaCuti;
use App\Setting;
use App\User;
use App\Izin;

class DynamicPDFController extends Controller
{
    function index()
    {
        $cuti = Cuti::orderBy('updated_at', 'desc')->paginate(10);
        $i = 1;

        return view('admin.datacuti', compact(['cuti', 'i']));
    }

    function pdf($id)
    {
        $u = Cuti::find($id);
        $a = $u->user->nama;
        $tgl = TanggalCuti::where('cuti_id', $id)->orderBy('tgl_cuti', 'asc')->first();
        $sisa1 = SisaCuti::where('pegawai_id', $u->user->id_pegawai)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
        $sisa2 = SisaCuti::where('pegawai_id', $u->user->id_pegawai)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
        $setting = Setting::first()->maks_cuti;
        // dd($setting - $sisa2->jumlah_cuti);
        $atasan1 = User::where('id_pegawai', $u->user->id_pegawai)->first()->atasan_1;
        $nama_atasan1 = User::where('nip', $atasan1)->first() ? User::where('nip', $atasan1)->first()->nama : '-';
        // dd($nama_atasan1);
        $atasan2 = User::where('id_pegawai', $u->user->id_pegawai)->first()->atasan_2;
        if($atasan2 == null){
            $nama_atasan2 = " ";
        }else{
        $nama_atasan2 = User::where('nip', $atasan2)->first() ? User::where('nip', $atasan2)->first()->nama : '-';
        }
        $pdf = PDF::loadview('pddf', compact('u', 'tgl', 'sisa1', 'sisa2', 'setting', 'atasan1', 'nama_atasan1', 'atasan1', 'nama_atasan2'))->setPaper('Legal', 'potrait');

        // return view('pddf',compact('u', 'tgl', 'sisa1', 'sisa2', 'setting'));
        return $pdf->stream('Form Cuti '. $a . '.pdf');
    }

    public function kartuKendali($id)
    {
        $user = User::where('id_pegawai', $id)->first();
        $a = $user->nama;
        $i = 1;
        $cuti = Cuti::where('pegawai_id', $id)->get();
        $tgl = DB::table('tanggal_cutis')->join('cutis', 'tanggal_cutis.cuti_id', '=', 'cutis.id_cuti')->select('tanggal_cutis.tgl_cuti', 'tanggal_cutis.cuti_id')->where('pegawai_id', $id)->orderBy('tgl_cuti', 'asc')->get();
        $total = 0;
        $set = Setting::first()->maks_cuti;
        $cuti1 = SisaCuti::where('pegawai_id', $id)->where('tahun', date("Y")-1)->orderBy('updated_at', 'desc')->first();
        $cuti2 = SisaCuti::where('pegawai_id', $id)->where('tahun', date("Y"))->orderBy('updated_at', 'desc')->first();
        if($cuti1 == null){
            $total = $total + ($set - $cuti2->jumlah_cuti);
        }else{
            $total = $total + ($set - $cuti2->jumlah_cuti) + ($set - $cuti1->jumlah_cuti);
        }
        $pdf = PDF::loadview('kartukendali', compact('user','i', 'set', 'cuti', 'tgl', 'total'))->setPaper('Legal', 'landscape');

        // return view('kartukendali', compact('user','i','cuti','tgl', 'total'));
        return $pdf->stream('Kartu Kendali '. $a . '.pdf');
    }

    function suratCuti($id)
    {
        $cuti = Cuti::find($id);
        $user = User::find($cuti->pegawai_id);
        $tgl = TanggalCuti::where('cuti_id', $id)->orderBy('tgl_cuti', 'asc')->first()->tgl_cuti;
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $bulanIndo = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $pdf = PDF::loadview('surat', compact('cuti', 'user', 'tgl', 'bulanRomawi', 'bulanIndo'))->setPaper('A4', 'potrait');

        // return view('surat',compact('cuti', 'user', 'tgl', 'bulanRomawi', 'bulanIndo'));
        return $pdf->stream('Surat Cuti.pdf');
    }

    function suratIzin($id)
    {
        $izin = Izin::find($id);
        $user = User::find($izin->pegawai_id);
        $atasan = User::where('nip', $izin->atasan)->first();
        if($atasan == NULL){
            $atasan = [
                'nama' => '-',
                'jabatan' => '-'
            ];
        }

        $bulanIndo = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        // dd($izin);
        if($izin->kategori == 0){
            // $pdf = PDF::loadview('izin_surat1', compact('izin', 'user', 'atasan', 'bulanIndo'))->setPaper('A4', 'potrait');
            return view('izin_surat1', compact('izin', 'user', 'atasan', 'bulanIndo'));
        }elseif($izin->kategori == 1){
            // $pdf = PDF::loadview('izin_surat3', compact('izin', 'user', 'atasan', 'bulanIndo'))->setPaper('A4', 'potrait');
            return view('izin_surat3', compact('izin', 'user', 'atasan', 'bulanIndo'));
        }else{
            // $pdf = PDF::loadview('izin_surat2', compact('izin', 'user', 'atasan', 'bulanIndo'))->setPaper('A4', 'potrait');
            return view('izin_surat2', compact('izin', 'user', 'atasan', 'bulanIndo'));
        }

        return $pdf->stream('Surat Izin.pdf');
    }

}
