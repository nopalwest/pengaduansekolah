<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\InputAspirasi;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class AspirasiController extends Controller
{
    public function show($id){
        $inputaspirasi = InputAspirasi::find($id);
        return view('pages.aspirasi.create',compact('inputaspirasi'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'status'=>'required',
            'input_aspirasi_id'=>'required',
            'feedback'=>'required',
        ]);


        Aspirasi::Create([
            'status'=>$request->get('status'),
            'input_aspirasi_id'=>$request->get('input_aspirasi_id'),
            'feedback'=>$request->get('feedback'),
        ]);

        $inputaspirasi = InputAspirasi::find($request->get('input_aspirasi_id'));
        $inputaspirasi->update([
            'status'=>$request->get('status'),
        ]);
        return redirect()->route('inputaspirasi.index');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
            'feedback' => 'required',
        ]);

        // Update status pada pengaduan
        InputAspirasi::where('id', $request->input_aspirasi_id)->update([
            'status' => $request->get('status'),
        ]);

        // Update tanggapan
        $aspirasi = Aspirasi::find($id);
        $aspirasi->feedback = $request->get('feedback');
        $aspirasi->save();

        return redirect()->route('inputaspirasi.show', $aspirasi->input_aspirasi_id)->with('message', 'Tanggapan berhasil diupdate');
    }

    public function edit($id)
    {
        $aspirasi = Aspirasi::find($id);
        return view('pages.aspirasi.edit', compact('aspirasi'));
    }
}
