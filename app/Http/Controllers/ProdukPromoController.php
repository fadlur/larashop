<?php

namespace App\Http\Controllers;

use App\ProdukPromo;
use App\Produk;
use Illuminate\Http\Request;

class ProdukPromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itempromo = ProdukPromo::orderBy('id','desc')->paginate(20);
        $data = array('title' => 'Produk Promo',
                    'itempromo'=>$itempromo);
        return view('promo.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // kita ambil data produk
        $itemproduk = Produk::orderBy('nama_produk', 'desc')
                            ->where('status', 'publish')
                            ->get();
        $data = array('title' => 'Form Produk Promo',
                    'itemproduk' => $itemproduk);
        return view('promo.create',$data);
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
            'produk_id' => 'required',
            'harga_awal' => 'required',
            'harga_akhir' => 'required',
            'diskon_persen' => 'required',
            'diskon_nominal' => 'required',
        ]);
        // cek dulu apakah sudah ada, produk hanya bisa masuk 1 promo
        $cekpromo = ProdukPromo::where('produk_id', $request->produk_id)->first();
        if ($cekpromo) {
            return back()->with('error', 'Data sudah ada');
        } else {
            $itemuser = $request->user();
            $inputan = $request->all();
            $inputan['user_id'] = $itemuser->id;
            $itempromo = ProdukPromo::create($inputan);
            return redirect()->route('promo.index')->with('success', 'Data berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProdukPromo  $produkPromo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProdukPromo  $produkPromo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itempromo = ProdukPromo::findOrFail($id);
        $data = array('title' => 'Detail Produk',
                    'itempromo' => $itempromo);
        return view('promo.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProdukPromo  $produkPromo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'produk_id' => 'required',
            'harga_awal' => 'required',
            'harga_akhir' => 'required',
            'diskon_persen' => 'required',
            'diskon_nominal' => 'required',
        ]);
        $itempromo = ProdukPromo::findOrFail($id);
        // cek dulu apakah sudah ada, produk hanya bisa masuk 1 promo
        $cekpromo = ProdukPromo::where('produk_id', $request->produk_id)
                            ->where('id', '!=', $itempromo->id)
                            ->first();
        if ($cekpromo) {
            return back()->with('error', 'Data sudah ada');
        } else {
            $itemuser = $request->user();
            $inputan = $request->all();
            $inputan['user_id'] = $itemuser->id;
            $itempromo->update($inputan);
            return redirect()->route('promo.index')->with('success', 'Data berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProdukPromo  $produkPromo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itempromo = ProdukPromo::findOrFail($id);
        if ($itempromo->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
}
