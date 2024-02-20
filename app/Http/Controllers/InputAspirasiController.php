<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use App\Models\Siswa;
use Illuminate\Http\Request;

use PDF;
class InputAspirasiController extends Controller
{
    public function index(){
        $inputaspirasis = InputAspirasi::latest()->get();
        return view('pages.inputaspirasi.index', compact('inputaspirasis'));

    }
    public function create()
    {
        return view('pages.inputaspirasi.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',
            'foto' => 'required'
        ]);

        $name = $request->foto;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $name = time() . '.' . $foto->getClientOriginalExtension();
            $destinationPath = public_path('/foto');
            $foto->move($destinationPath, $name);

            if (Siswa::get()->where('nisn', $request->nisn)->count() > 0) {
                InputAspirasi::create([
                    'nisn' => $request->get('nisn'),
                    'kategori_id' => $request->get('kategori_id'),
                    'lokasi' => $request->get('lokasi'),
                    'keterangan' => $request->get('keterangan'),
                    'foto' => $name,
                ]);
                return redirect('/#lapor')->with('message', 'pengaduan berhasil ditambahkan');
            } else {
                return redirect('/#lapor')->with('message-error', 'NISN blum didaftarkan harap hubungi admin');
            }
        };
    }
    public function destroy($id){
        $inputaspirasi = InputAspirasi::find($id);
        $inputaspirasi->delete();
        return redirect()->back()->with('message','pengaduan berhasil diapus');
    }

    public function edit($id){
        $inputaspirasis = InputAspirasi::findOrFail($id);
        return view('pages.inputaspirasi.edit', compact('inputaspirasis'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nisn' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',
            'foto' => ''
        ]);
        $name = $request->foto;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $name = time() . '.' . $foto->getClientOriginalExtension();
            $destinationPath = public_path('/foto');
            $foto->move($destinationPath, $name);
        }
     $inputaspirasis = InputAspirasi::find($id);
     $inputaspirasis->nisn = $request->get('nisn');
     $inputaspirasis->lokasi = $request->get('lokasi');
     $inputaspirasis->keterangan = $request->get('keterangan');
     $inputaspirasis->foto = $name;
     $inputaspirasis->save();

     return redirect()->route('inputaspirasi.index');


}
public function show($id){
    $inputaspirasi = InputAspirasi::find($id);
    return view('pages.inputaspirasi.detail',compact('inputaspirasi'));
}

public function search(Request $request)
{
    $keyword = $request->input('keyword');

    $inputaspirasis = InputAspirasi::where('keterangan', 'like', "%$keyword%")->get();

    return view('search', compact('inputaspirasis', 'keyword'));
}
public function laporan(){
    $inputaspirasis = InputAspirasi::latest()->get();
    return view('pages.inputaspirasi.laporan', compact('inputaspirasis'));
}

public function pdf(){
    $inputaspirasis = InputAspirasi::latest()->get();
    $pdf = PDF::loadview('pages.inputaspirasi.pdf',compact('inputaspirasis'));
        return $pdf->download('laporan.pdf');
}
public function profil(){
    return view('pages.profil');
}
}
