<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlamatPengiriman;

class AlamatPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        $itemalamatpengiriman = AlamatPengiriman::where('user_id', $itemuser->id)->paginate(10);
        $data = array('title' => 'Alamat Pengiriman',
                    'itemalamatpengiriman' => $itemalamatpengiriman);
        return view('alamatpengiriman.index', $data)->with('no', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_penerima' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kodepos' => 'required',
        ]);
        $itemuser = $request->user();//ambil data user yang sedang login
        $inputan = $request->all();//buat variabel dengan nama $inputan
        $inputan['user_id'] = $itemuser->id;
        $inputan['status'] = 'utama';
        $itemalamatpengiriman = AlamatPengiriman::create($inputan);
        // set semua status alamat pengiriman bukan utama
        AlamatPengiriman::where('id', '!=', $itemalamatpengiriman->id)
                    ->update(['status' => 'tidak']);
        return back()->with('success', 'Alamat pengiriman berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $itemalamatpengiriman = AlamatPengiriman::findOrFail($id);
        $itemalamatpengiriman->update(['status' => 'utama']);
        AlamatPengiriman::where('id', '!=', $id)->update(['status' => 'tidak']);
        return back()->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
