<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeminjamanModel;
use App\DetailModel;
use App\AnggotaModel;
use Validator;
use JWTAuth;
use Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        if(Auth::user()->level=="petugas") {
            $peminjaman=PeminjamanModel::join('anggota', 'peminjaman.id_anggota', 'anggota.id')->where('peminjaman.id', $id)->get();

            $detail_buku="data";
            $data=array();
            foreach ($peminjaman as $pinjam){
                $ok = DetailModel::where('id_peminjaman', $pinjam->id)->get();
            
                $arr_detail=array();
                foreach ($ok as $ok){
                    $arr_detail[]=array(
                        'id_peminjaman' => $ok->id_peminjaman,
                        'id_buku' => $ok->id_buku,
                        'qty' => $ok->qty
                    );
                }
                $data[]=array(
                    'id' => $pinjam->id,
                    'id_anggota' => $pinjam->id_anggota,
                    'nama_anggota' => $pinjam->nama_anggota,
                    'id_petugas' => $pinjam->id_petugas,
                    'tgl_pinjam' => $pinjam->tgl_pinjam,
                    'deadline' => $pinjam->deadline,
                    'tgl_kembali' => $pinjam->tgl_kembali,
                    'denda' => $pinjam->denda,
                    'detail_buku' => $arr_detail
                );            
            }
            return response()->json(compact("data"));
        } else {
            return response()->json(['Hanya petugas yang bisa mengakses']);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->level=="petugas") {
        $validator=Validator::make($request->all(),[
            'id_anggota'=>'required',
            'id_petugas'=>'required',
            'tgl_pinjam'=>'required',
            'deadline'=>'required',
            'tgl_kembali'=>'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        } else {
            $insert=PeminjamanModel::insert([
                'id_anggota'=>$request->id_anggota,
                'id_petugas'=>$request->id_petugas,
                'tgl_pinjam'=>$request->tgl_pinjam,
                'deadline'=>$request->deadline,
                'tgl_kembali'=>$request->tgl_kembali,
            ]);
            if($insert){
                $status="sukses";
            } else {
                $status="gagal";
            }
            return response()->json(compact('status'));
        }
    } else 
        {
            echo "Maaf, anda bukan petugas.";
        }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $req)
    {
        if(Auth::user()->level=="petugas") {
        $validator=Validator::make($req->all(),
            [
                'id_anggota'=>'required',
                'id_petugas'=>'required',
                'tgl_pinjam'=>'required',
                'deadline'=>'required',
                'tgl_kembali'=>'required'
            ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=PeminjamanModel::where('id',$id)->update([
                'id_anggota'=>$req->id_anggota,
                'id_petugas'=>$req->id_petugas,
                'tgl_pinjam'=>$req->tgl_pinjam,
                'deadline'=>$req->deadline,
                'tgl_kembali'=>$req->tgl_kembali
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
            
        }
    } else
        {
            echo "Maaf, anda bukan petugas.";
        }
}
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->level=="petugas") {
        $hapus=PeminjamanModel::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    } else 
        {
            echo "Maaf, anda bukan petugas.";
        }
    }
    public function insert(Request $req){
        if(Auth::user()->level=="petugas") {
            $validator=Validator::make($req->all(),[
                'id_peminjaman'=>'required',
                'id_buku'=>'required',
                'qty'=>'required'
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
            } else {
                $insert=DetailModel::insert([
                    'id_peminjaman'=>$req->id_peminjaman,
                    'id_buku'=>$req->id_buku,
                    'qty'=>$req->qty
                ]);
                if($insert){
                    $status="sukses";
                } else {
                    $status="gagal";
                }
                return response()->json(compact('status'));
            }
        } else 
            {
                echo "Maaf, anda bukan petugas.";
            }
    }
    public function ubah($id,Request $req)
    {
        if(Auth::user()->level=="petugas") {
            $validator=Validator::make($req->all(),
                [
                    'id_peminjaman'=>'required',
                    'id_buku'=>'required',
                    'qty'=>'required'
                ]
            );
            if($validator->fails()){
                return Response()->json($validator->errors());
            }
            $ubah=DetailModel::where('id',$id)->update([
                    'id_peminjaman'=>$req->id_peminjaman,
                    'id_buku'=>$req->id_buku,
                    'qty'=>$req->qty
            ]);
            if($ubah){
                return Response()->json(['status'=>1]);
            } else {
                return Response()->json(['status'=>0]);
                
            }
        } else
            {
                echo "Maaf, anda bukan petugas.";
            }
    }
    public function hapus($id)
    {
        if(Auth::user()->level=="petugas") {
        $hapus=DetailModel::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    } else 
        {
            echo "Maaf, anda bukan petugas.";
        }
    }
}

