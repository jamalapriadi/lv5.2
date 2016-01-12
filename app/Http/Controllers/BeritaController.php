<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Berita;
use App\Models\Kberita;
use App\Models\Kategori;
use Illuminate\Support\Facades\Input;
use Validator,Redirect,DB,File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita=Berita::all();
        return View('berita.index')
            ->with('berita',$berita);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori=Kategori::all();
        $pertama=Kategori::first();

        return View('berita.create')
            ->with('kategori',$kategori)
            ->with('pertama',$pertama);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'judul'=>'required',
            'content'=>'required',
            'kategori'=>'required'
        ];

        $pesan=[
            'judul.required'=>'Judul harus diisi',
            'content.required'=>'Content harus diisi',
            'kategori.required'=>'Kategori harus diisi'
        ];

        $validasi=Validator::make($request->all(),$rules,$pesan);

        if($validasi->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validasi);
        }else{
            $berita=new Berita;
            $berita->judul=$request->input('judul');
            $berita->content=$request->input('content');
            $berita->kategori_id=$request->input('kategori');
            $berita->status=1;

            //upload foto
            if(Input::hasFile('foto')){
                $file=Input::file('foto');
                $filename=str_random(5).'-'.$file->getClientOriginalName();
                $destinationPath='uploads/';
                $file->move($destinationPath,$filename);
                $berita->feature_image=$filename;
            }

            $simpan=$berita->save();

            /*
            if($simpan){
                //last id $berita->id;
                $kategori=$request->input('kategori');
                foreach($kategori as $kat){
                    $data=array(
                        'berita_id'=>$berita->id,
                        'kategori_id'=>$kat
                    );
                    DB::table('kategori_berita')->insert($data);
                }
            }
            */

            return Redirect::to('admin/berita');
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
        $berita=Berita::find($id);
        $kategori=Kategori::all();

        return View('berita.edit')
            ->with('berita',$berita)
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
        $rules=[
            'judul'=>'required',
            'content'=>'required',
            'kategori'=>'required'
        ];

        $pesan=[
            'judul.required'=>'Judul harus diisi',
            'content.required'=>'Content harus diisi',
            'kategori.required'=>'Kategori harus diisi'
        ];

        $validasi=Validator::make($request->all(),$rules,$pesan);

        if($validasi->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validasi);
        }else{
            $berita=Berita::find($id);
            $berita->judul=$request->input('judul');
            $berita->content=$request->input('content');
            $berita->kategori_id=$request->input('kategori');
            $berita->status=1;

            //upload foto
            if(Input::hasFile('foto')){
                $file=Input::file('foto');
                $filename=str_random(5).'-'.$file->getClientOriginalName();
                $destinationPath='uploads/';
                $file->move($destinationPath,$filename);
                $berita->feature_image=$filename;
            }

            $simpan=$berita->save();

            /*
            if($simpan){
                //last id $berita->id;
                $kategori=$request->input('kategori');
                foreach($kategori as $kat){
                    $data=array(
                        'berita_id'=>$berita->id,
                        'kategori_id'=>$kat
                    );
                    DB::table('kategori_berita')->insert($data);
                }
            }
            */

            return Redirect::to('admin/berita');
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
        $berita=Berita::find($id);

        if($berita->feature_image){
            $fotolama=$berita->foto;
            $filepath=public_path().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$berita->feature_image;

            try{
                File::delete($filepath);
            }catch(FileNotFoundException $e){

            }
        }

        $berita->delete();

        return Redirect::to('admin/berita');
    }
}
