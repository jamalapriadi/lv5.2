<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Auth;


use Carbon\Carbon;
use Input,Validator,Redirect,Flash;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori=\App\Models\Kategori::all();
        return View('kategori.index')
            ->with('kategori',$kategori);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules=['kategori'=>'required'];
        $pesan=['kategori.required'=>'Kategori harus diisi'];

        $validasi=Validator::make($request->all(),$rules,$pesan);

        if($validasi->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validasi);
        }else{
            $kategori=new Kategori;
            $kategori->kategori=$request->input('kategori');
            $simpan=$kategori->save();

            return Redirect::to('admin/kategori');
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
        $kategori=Kategori::find($id);

        return View('kategori.edit')
            ->with('kategori',$kategori);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=['kategori'=>'required'];
        $pesan=['kategori.required'=>'Kategori harus diisi'];

        $validasi=Validator::make($request->all(),$rules,$pesan);

        if($validasi->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validasi);
        }else{
            $kategori=Kategori::find($id);
            $kategori->kategori=$request->input('kategori');
            $simpan=$kategori->save();

            return Redirect::to('admin/kategori');
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
        Kategori::find($id)->delete();

        return Redirect::to('admin/kategori');
    }
}
