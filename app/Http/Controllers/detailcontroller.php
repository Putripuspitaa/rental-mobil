<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\detail_peminjaman;
use JWTAuth;
use DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class detailcontroller extends Controller
{
    public function index($id)
    {
        if(Auth::user()->level=="admin"){
            $dt_jenis=detail_peminjaman::get();
            return response()->json($dt_jenis);

    }else{
        return response()->json(['status'=>'anda bukan admin']);
    }
    }
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_pinjam'=>'required',
            'id_mobil'=>'required',
           
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=detail_peminjaman::create([
            'id_pinjam'=>$req->id_pinjam,
            'id_mobil'=>$req->id_mobil,
            
        ]);
        if($simpan){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Ditambahkan!"]);
        } else{
            return Response()->json(['status'=>0]);
        }
    }
    public function tampil_jenis ()
    {
        $data_jenis=detail_peminjaman::count();
        $data_jenis1=detail_peminjaman::all();
        return Response()->json(['count'=> $data_jenis, 'jenis'=> $data_jenis1, 'status'=>1]);
    }

    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_pinjam'=>'required',
            'id_mobil'=>'required',
            
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=detail_peminjaman::where('id',$id)->update([
            'id_pinjam'=>$req->id_pinjam,
            'id_mobil'=>$req->id_mobil,
            
            ]);
        if($ubah){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Diubah!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    public function destroy($id)
    {
        $hapus=detail_peminjaman::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Dihapus!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
