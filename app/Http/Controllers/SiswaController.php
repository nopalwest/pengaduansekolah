<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function index()
    {
        $siswas = Siswa::latest()->get();
        return view('pages.siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('pages.siswa.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'kelas' => 'required',
        ]);
        Siswa::create([
            'nisn' => $request->get('nisn'),
            'kelas' => $request->get('kelas')
        ]);
        return redirect()->route('siswa.index');
    }
    public function destroy($nisn){
        $siswas = Siswa::find($nisn);
        $siswas->delete();
        return redirect()->back()->with('message','siswa berhasil diapus');
    }

    public function edit($nisn){
        $siswas = Siswa::find($nisn);
        return view('pages.siswa.edit',compact('siswas'));
    }
    public function update(Request $request){
        $this->validate($request, [
            'nisn' => 'required',
            'kelas' => 'required',
        ]);
        $siswas = Siswa::find($request->nisn_lama);

        $siswas->nisn = $request->get('nisn');
        $siswas->kelas = $request->get('kelas');
        $siswas->save();

        return redirect()->route('siswa.index');
    }
}
