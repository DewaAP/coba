<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\anggaran;

class anggaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$datas=anggaran::orderBy('id','ASC')->Paginate(10);
    	return view('hlogin.home', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new data
        return view('hlogin.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//validation
        $this->validate($request,[
          'kategori'    =>'required',
          'laporan'    =>'required',
          'biaya_konsumsi' =>'required|integer',
          'biaya_transport' =>'required|integer',
          'biaya_penginapan' =>'required|integer',
          'nama_penanggungjawab'  =>'required',
          'nip_penanggungjawab'  =>'required|integer',
        ]);
        //create new data
        $data = new anggaran;
        $data->kategori = $request->kategori;
        $data->laporan = $request->laporan;
        $data->biaya_konsumsi = $request->biaya_konsumsi;
        $data->biaya_transport = $request->biaya_transport;
        $data->biaya_penginapan = $request->biaya_penginapan;
        $data->nama_penanggungjawab = $request->nama_penanggungjawab;
        $data->nip_penanggungjawab = $request->nip_penanggungjawab;

        $data->save();
        return redirect()->route('home.index')->with('alert-success', 'data hasbeen saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = anggaran::findOrFail($id);
        $data->verifikasi = '1';

        $data->save();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = anggaran::findOrFail($id);
        return View('hlogin.edit',compact('data'));
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
        //validation
        $this->validate($request,[
          'kategori'    =>'required',
          'laporan'    =>'required',
          'biaya_konsumsi' =>'required|integer',
          'biaya_transport' =>'required|integer',
          'biaya_penginapan' =>'required|integer',
          'nama_penanggungjawab'  =>'required',
          'nip_penanggungjawab'  =>'required|integer',
        ]);
        $data = anggaran::findOrFail($id);

        $data->kategori = $request->kategori;
        $data->laporan = $request->laporan;
        $data->biaya_konsumsi = $request->biaya_konsumsi;
        $data->biaya_transport = $request->biaya_transport;
        $data->biaya_penginapan = $request->biaya_penginapan;
        $data->nama_penanggungjawab = $request->nama_penanggungjawab;
        $data->nip_penanggungjawab = $request->nip_penanggungjawab;

        $data->save();
        return redirect()->route('home.index')->with('alert-success', 'data hasbeen saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$blog = anggaran::findOrFail($id);
        $blog->delete();
        return redirect()->route('home.index')->with('alert-success', 'data hasbeen saved!');
    }
}
