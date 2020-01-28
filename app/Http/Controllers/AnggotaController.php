<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnggotaModel;
use Validator;
use JWTAuth;
use Auth;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level=="admin") {
        $data=AnggotaModel::all();
        return response()->Json($data);
        } else {
            echo "Maaf, anda bukan admin.";
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
        if(Auth::user()->level=="admin") {
        $validator=Validator::make($request->all(),[
            'nama_anggota'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        } else {
            $insert=AnggotaModel::insert([
                'nama_anggota'=>$request->nama_anggota,
                'alamat'=>$request->alamat,
                'no_telp'=>$request->no_telp
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
            echo "Maaf, anda bukan admin.";
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
        if(Auth::user()->level=="admin") {
        $validator=Validator::make($req->all(),
            [
                'nama_anggota'=>'required',
                'alamat'=>'required',
                'no_telp'=>'required'
            ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=AnggotaModel::where('id',$id)->update([
                'nama_anggota'=>$req->nama_anggota,
                'alamat'=>$req->alamat,
                'no_telp'=>$req->no_telp
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
            
        }
    } else
        {
            echo "Maaf, anda bukan admin.";
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
        if(Auth::user()->level=="admin") {
        $hapus=AnggotaModel::where('id',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    } else 
        {
            echo "Maaf, anda bukan admin.";
        }
    }
}

