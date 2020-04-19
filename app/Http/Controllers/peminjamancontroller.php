<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\peminjaman;
use JWTAuth;
use DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class peminjamancontroller extends Controller
{
    public function index($id)
    {
        if(Auth::user()->level=="admin"){
            $dt_jenis=peminjaman::get();
            return response()->json($dt_jenis);

    }else{
        return response()->json(['status'=>'anda bukan admin']);
    }
    }
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_petugas'=>'required',
            'id_penyewa'=>'required',
            'tgl_pinjam'=>'required',
            'deadline'=>'required',
            'denda'=>'required',
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=peminjaman::create([
            'id_petugas'=>$req->id_petugas,
            'id_penyewa'=>$req->id_penyewa,
            'tgl_pinjam'=>$req->tgl_pinjam,
            'deadline'=>$req->deadline,
            'denda'=>$req->denda,
        ]);
        if($simpan){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Ditambahkan!"]);
        } else{
            return Response()->json(['status'=>0]);
        }
    }
    public function tampil_peminjaman ()
    {
        $data_peminjaman=peminjaman::count();
        $data_peminjaman1=peminjaman::all();
        return Response()->json(['count'=> $data_peminjaman, 'peminjaman'=> $data_peminjaman1, 'status'=>1]);
    }

    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_petugas'=>'required',
            'id_penyewa'=>'required',
            'tgl_pinjam'=>'required',
            'deadline'=>'required',
            'denda'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=peminjaman::where('id',$id)->update([
            'id_petugas'=>$req->id_petugas,
            'id_penyewa'=>$req->id_penyewa,
            'tgl_pinjam'  =>$req->tgl_pinjam,
            'deadline'=>$req->deadline,
            'denda'=>$req->denda,
            ]);
        if($ubah){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Diubah!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    public function destroy($id)
    {
        $hapus=peminjaman::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Dihapus!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
