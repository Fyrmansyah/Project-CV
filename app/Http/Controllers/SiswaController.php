<?php

namespace App\Http\Controllers;
use App\Models\siswa;
use Iluminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('index', 'show');
    }

    public function index()
    {
         
        $data = siswa::get();
        return view('Mastersiswa',['datas'=>$data]);
        // return $data;
        // return view('siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $message=[
            'required' => ':attribute harus di isi!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!',
            'numeric' => ':attribute harus di isi dengan angka',
            'mimies' => 'file :atribute harus di bertipe mimes: jpg,png,jpeg',
            

        ];
        // validasi form
        $this->validate($request,[
            'nisn'=>'required |numeric',
            'nama'=>'required |min:7|max:30',
            'alamat'=>'required', 
            'jk'=>'required', 
            'foto'=>'required', 
            'about'=>'required',

        ],$message);

        //info file foto yang akan di up
        $file = $request->file('foto');

        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses up

        $tujuan_upload ='./template/img';
        $file->move($tujuan_upload,$nama_file);

        


        // insert data
        siswa::create([
            'nisn'=>$request->nisn, 
            'nama'=>$request->nama, 
            'alamat'=>$request->alamat, 
            'jk'=>$request->jk, 
            'foto'=>$nama_file,
            'about'=>$request->about, 

            

        ]);


        return redirect('/msiswa')->with('success','Data Anda Berhasil Di Tambahkan');
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa=siswa::find($id);
        $project=siswa::find($id)->project()->get();

        $kontaks =$siswa->kontak()->get();
        return view('siswa.show', compact('siswa', 'kontaks','project'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = siswa::find($id);
        return view('siswa.edit',['data'=>$data]);
        // return $data;
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
        $message=[
            'required' => ':attribute harus di isi!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!',
            'numeric' => ':attribute harus di isi dengan angka',
            'mimies' => 'file :atribute harus di bertipe mimes: jpg,png,jpeg'
            

        ];
        // validasi form
        $this->validate($request,[
            'nisn'=>'required |numeric',
            'nama'=>'required |min:7|max:30',
            'alamat'=>'required', 
            'jk'=>'required', 
            'foto'=>'required', 
            'about'=>'required'

        ],$message);

        if($request->foto !=''){
            //1. hapus file foto
            $siswa=siswa::find($id);
            File::delete('./template/img/'.$siswa->foto);

            //2. Ambil informasi file yg akan upload
            $file = $request->file('foto');
            //3
            $nama_file = time()."_".$file->getClientOriginalName();

            //4 proses upload
            $tujuan_upload='./template/img';
            $file->move($tujuan_upload,$nama_file);

            //5
            $siswa->nisn = $request-> nisn;
            $siswa->nama = $request-> nama;
            $siswa->alamat = $request-> alamat;
            $siswa->jk = $request-> jk;
            $siswa->about = $request-> about;
            $siswa->foto = $nama_file;
            $siswa->save();
            // Session::flash('success', "data berhasil diedit");
            return redirect ('/msiswa');
        }else{
            $siswa=siswa::find($id);
            $siswa->nisn = $request-> nisn;
            $siswa->nama = $request-> nama;
            $siswa->alamat = $request-> alamat;
            $siswa->jk = $request-> jk;
            $siswa->about = $request-> about;
            $siswa->save();
            // Session::flash('success', "data berhasil diedit");
            return redirect ('/msiswa');

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
        siswa::destroy($id);
        return back();
    }
}
