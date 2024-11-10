<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pegawai::all();
        return view('pegawai.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file1' => 'mimes:docx,pdf,xlsx|max:2048',
            'file2' => 'mimes:docx,pdf,xlsx|max:2048',
            'file3' => 'mimes:docx,pdf,xlsx|max:2048',
        ]);
        $data = array(
            'nama'  => $request->nama,
            'nip'  => $request->nip,
        );

        if($request->hasFile('file1')){
            $fileName = time().rand(1,99).'_'.$request->file('file1')->getClientOriginalName();
            $request->file('file1')->move(public_path('uploads'), $fileName);
            $data['file1'] = $fileName;
        }

        if($request->hasFile('file2')){
            $fileName = time().rand(1,99).'_'.$request->file('file2')->getClientOriginalName();
            $request->file('file2')->move(public_path('uploads'), $fileName);
            $data['file2'] = $fileName;
        }

        if($request->hasFile('file3')){
            $fileName = time().rand(1,99).'_'.$request->file('file3')->getClientOriginalName();
            $request->file('file3')->move(public_path('uploads'), $fileName);
            $data['file3'] = $fileName;
        }

        $save = new Pegawai;
        $save->fill($data);
        if($save->save()){
            return redirect()->route('pegawai.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pegawai::findOrFail($id);
        $data->delete();
        return redirect()->route('pegawai.index');
    }
}
