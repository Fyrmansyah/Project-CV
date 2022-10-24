<?php

namespace App\Http\Controllers;
use App\Models\project;
use App\Models\siswa;

use Illuminate\Http\Request;

class ProjectController extends Controller
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
        return view('MasterProject', compact('datas'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    

    }
    public function tambah($id)
    {
        $data=Siswa::find($id);
        return view ('project.create', compact('data'));
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
            'nama_project' => 'required|min:7|max:30',
            'deskripsi' => 'required|min:10',
            'tanggal' => 'required',
        ]);
        $validasi["id_siswa"] = $request->id;
        project::create($validasi);
        return redirect("/mproject")->with('success', 'data telah ditambahkan');

        // return $validasi;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $project = siswa::where('id', $id)->with("project")->get();
        $project=Siswa::find($id)->project()->get();
        return view('project.show', compact('project'));
      
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=project::find($id);
        return view('project.edit',[
            "data"=> $project
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
            "nama_project" => $request->nama_project ,
            "deskripsi" => $request->deskripsi ,
            "tanggal" => $request->tanggal
        ];

        project::where('id', $id)->update($update);
        return redirect("/mproject")->with('success', 'data telah diperbarui');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($msiswa)
    {
        project::destroy($msiswa);
        return redirect("/mproject")->with('success', 'data telah dihapus');
    }

    
}
