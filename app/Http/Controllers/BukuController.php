<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BukuModel;
use Validator;
use JWTAuth;
use Auth;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level=="admin") {
        $data=BukuModel::all();
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
            'judul'=>'required',
            'penerbit'=>'required',
            'pengarang'=>'required',
            'foto'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        } else {
            $insert=BukuModel::insert([
                'judul'=>$request->judul,
                'penerbit'=>$request->penerbit,
                'pengarang'=>$request->pengarang,
                'foto'=>$request->foto
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
                'judul'=>'required',
                'penerbit'=>'required',
                'pengarang'=>'required',
                'foto'=>'required'
            ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=BukuModel::where('id',$id)->update([
                'judul'=>$req->judul,
                'penerbit'=>$req->penerbit,
                'pengarang'=>$req->pengarang,
                'foto'=>$req->foto
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
        $hapus=BukuModel::where('id',$id)->delete();
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

