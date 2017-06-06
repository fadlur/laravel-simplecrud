<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kecamatan;

class CrudKecamatan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemkecamatan = Kecamatan::get();
        $data = array('itemkecamatan' => $itemkecamatan);
        return view('admin.kecamatan.index',$data)->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode'=>'required',
            'nama'=>'required',
        ]);
        Kecamatan::create($request->all());
        return back()->with('success','Data berhasil disimpan');//kalo berhasil kembali ke halaman seblumnya dgn session success
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemkecamatan = Kecamatan::find($id);
        if (count($itemkecamatan) > 0) {
            $data = array('itemkecamatan' => $itemkecamatan);
            return view('admin.kecamatan.edit',$data);
        }else{
            return abort('404');
        }
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
        $this->validate($request,[
            'kode'=>'required',
            'nama'=>'required',
        ]);
        Kecamatan::find($id)->update($request->all());
        return redirect()->route('kecamatan.index')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kecamatan::find($id)->delete();
        return redirect()->route('kecamatan.index')->with('success','Data berhasil dihapus');
    }
}
