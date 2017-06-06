<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Desa;
use App\Kecamatan;

class CrudDesa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemdesa = Desa::orderby('id','ASC')->with(['kecamatan'])->get();
        $itemkecamatan = array(''=>'Pilih Kecamatan');
        foreach (Kecamatan::orderBy('nama')->get() as $key) {
            $itemkecamatan[$key->id] = $key->kode." - ".$key->nama;
        }
        $data = array('itemdesa' => $itemdesa,
                    'itemkecamatan'=>$itemkecamatan);
        return view('admin.desa.index',$data)->with('no',1);
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
            'kecamatan_id'=>'required'
        ]);
        Desa::create($request->all());
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
        $itemdesa = Desa::find($id);
        if (count($itemdesa) > 0) {
            $itemkecamatan = array(''=>'Pilih Kecamatan');
            foreach (Kecamatan::orderBy('nama')->get() as $key) {
                $itemkecamatan[$key->id] = $key->kode." - ".$key->nama;
            }
            $data = array('itemdesa' => $itemdesa,
                        'itemkecamatan'=>$itemkecamatan);
            return view('admin.desa.edit',$data);
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
            'kecamatan_id'=>'required'
        ]);
        Desa::find($id)->update($request->all());
        return redirect()->route('desa.index')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Desa::find($id)->delete();
        return redirect()->route('desa.index')->with('success','Data berhasil dihapus');
    }
}
