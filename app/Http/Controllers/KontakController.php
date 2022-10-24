<?php

namespace App\Http\Controllers;
use App\Models\kontak;
use App\Models\jenis_kontak;
use App\Models\siswa;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = siswa::paginate(1);
        // return $datas;
        return view('MasterKontak', compact('datas'));
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontak.create');
    }
    public function tambah($id)
    {
        $data=Siswa::find($id);
        $jenis = jenis_kontak::all();

        return view ('kontak.create', compact('data', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'jenis_kontak' => 'required|max:30',
            'deskripsi' => 'required'
        ]);
        
        kontak::create([
            'siswa_id' => $request->siswa_id,
            'jenis_kontak_id' => $request->jenis_kontak,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect("/mkontak")->with('success', 'data telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak=Siswa::find($id)->kontak()->get();
        return view('kontak.show', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak=kontak::find($id);
        $jenis = jenis_kontak::all();
        return view('kontak.edit',[
            "data"=> $kontak,
            "jenis" => $jenis
        ]);    
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
        $update = [
            "siswa_id" => $request->siswa_id ,
            "jenis_kontak_id" => $request->jenis_kontak ,
            "deskripsi" => $request->deskripsi ,
        ];

        kontak::find($id)->update($update);
        return redirect("/mkontak")->with('success', 'data telah diperbarui');
        // return $request;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = kontak::find($id);
        $siswa->delete();
        return redirect("/mkontak")->with('success', 'data telah dihapus');
    }
}
