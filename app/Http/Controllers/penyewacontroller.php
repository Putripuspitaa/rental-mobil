<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\penyewa;
use JWTAuth;
use DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class penyewacontroller extends Controller
{
    public function index($id)
    {
        if(Auth::user()->level=="admin"){
            $dt_jenis=penyewa::get();
            return response()->json($dt_jenis);

    }else{
        return response()->json(['status'=>'anda bukan admin']);
    }
    }
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_penyewa'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
            'nomor_ktp'=>'required',
            'foto'=>'required',
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=penyewa::create([
            'nama_penyewa'=>$req->nama_penyewa,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp,
            'nomor_ktp'=>$req->nomor_ktp,
            'foto'=>$req->foto,
        ]);
        if($simpan){
            return Response()->json(['status'=>1, 
            'message'=>"Data Berhasil Ditambahkan!"]);
        } else{
            return Response()->json(['status'=>0]);
        }
    }
    public function tampil_jenis ()
    {
        $data_jenis=penyewa::count();
        $data_jenis1=penyewa::all();
        return Response()->json(['count'=> $data_jenis, 
        'jenis'=> $data_jenis1, 'status'=>1]);
    }

    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_penyewa'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
            'nomor_ktp'=>'required',
            'foto'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=penyewa::where('id',$id)->update([
            'nama_penyewa'=>$req->nama_penyewa,
            'alamat'=>$req->alamat,
            'telp'  =>$req->telp,
            'nomor_ktp'=>$req->nomor_ktp,
            'foto'=>$req->foto,
            ]);
        if($ubah){
            return Response()->json(['status'=>1, 
            'message'=>"Data Berhasil Diubah!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    public function destroy($id)
    {
        $hapus=penyewa::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1, 
            'message'=>"Data Berhasil Dihapus!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
