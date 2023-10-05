<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supir;

class admincontroller extends Controller
{
    public function datapelanggan(){
        return view('admin.datapelanggan');
    }
    public function datasupir(){
        return view('admin.datasupir');
    }
    public function dataarmada(){
        return view('admin.dataarmada');
    }
    public function datajadwal(){
        return view('admin.datajadwal');
    }
    public function registersupir(Request $request){
        $validator = \Validator::make($request->all(),[
            'namasupir'=>'required',
            'notelpsupir'=>'required|numeric|unique:supirs',
            'nosimsupir'=>'required|numeric',
            'alamatsupir'=>'required'
        ],[
                'notelpsupir.numeric' => 'Mohon Masukan no telpon yang valid!',
                'nosimsupir.numeric' => 'Mohon Masukan no sim yang valid!'
        ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }
        if($validator->passes()){
            $supir = new supir();
            $supir->namasupir = $request->namasupir;
            $supir->notelpsupir = $request->notelpsupir;
            $supir->nosimsupir = $request->nosimsupir;
            $supir->alamatsupir = $request->alamatsupir;
            $res = $supir->save();
            return response()->json(['code'=>1]);
        }
    }
    public function tampil_supir(){
        $supir = supir::all();
        return response()->json([
            'supir' => $supir
        ]);
    }
}
