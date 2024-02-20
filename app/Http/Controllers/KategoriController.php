<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(){
        $kategoris = Kategori::latest()->get();
        return view('pages.kategori.index',compact('kategoris'));
    }
    public function create(){
        return view('pages.kategori.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'keterangan'=>'required',
        ]);

        Kategori::create([
            'keterangan'=>$request->get('keterangan'),
        ]);
        return redirect()->route('kategori.index');

    }
    public function destroy($id){
        $kategoris = Kategori::find($id);
        $kategoris->delete();
        return redirect()->back()->with('message','kategori berhasil diapus');

    }
    public function edit($id){
        $kategoris = Kategori::find($id);
        return view('pages.kategori.edit',compact('kategoris'));
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'keterangan' => 'required',
        ]);

        $kategoris = Kategori::find($id);
        $kategoris->keterangan = $request->get('keterangan');
        $kategoris->save();

        return redirect()->route('kategori.index');
    }
}
