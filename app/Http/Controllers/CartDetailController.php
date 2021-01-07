<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\Produk;
use App\Cart;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return abort('404');
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
            'produk_id' => 'required',
        ]);
        $itemuser = $request->user();
        $itemproduk = Produk::findOrFail($request->produk_id);
        // cek dulu apakah sudah ada shopping cart untuk user yang sedang login
        $cart = Cart::where('user_id', $itemuser->id)
                    ->where('status_cart', 'cart')
                    ->first();
        
        if ($cart) {
            $itemcart = $cart;
        } else {
            $no_invoice = Cart::where('user_id', $itemuser->id)->count();
            //nyari jumlah cart berdasarkan user yang sedang login untuk dibuat no invoice
            $inputancart['user_id'] = $itemuser->id;
            $inputancart['no_invoice'] = 'INV '.str_pad(($no_invoice + 1),'3', '0', STR_PAD_LEFT);
            $inputancart['status_cart'] = 'cart';
            $inputancart['status_pembayaran'] = 'belum';
            $inputancart['status_pengiriman'] = 'belum';
            $itemcart = Cart::create($inputancart);
        }
        // cek dulu apakah sudah ada produk di shopping cart
        $cekdetail = CartDetail::where('cart_id', $itemcart->id)
                                ->where('produk_id', $itemproduk->id)
                                ->first();
        $qty = 1;// diisi 1, karena kita set ordernya 1
        $harga = $itemproduk->harga;//ambil harga produk
        $diskon = $itemproduk->promo != null ? $itemproduk->promo->diskon_nominal: 0;
        $subtotal = ($qty * $harga) - $diskon;
        // diskon diambil kalo produk itu ada promo, cek materi sebelumnya
        if ($cekdetail) {
            // update detail di table cart_detail
            $cekdetail->updatedetail($cekdetail, $qty, $harga, $diskon);
            // update subtotal dan total di table cart
            $cekdetail->cart->updatetotal($cekdetail->cart, $subtotal);
        } else {
            $inputan = $request->all();
            $inputan['cart_id'] = $itemcart->id;
            $inputan['produk_id'] = $itemproduk->id;
            $inputan['qty'] = $qty;
            $inputan['harga'] = $harga;
            $inputan['diskon'] = $diskon;
            $inputan['subtotal'] = ($harga * $qty) - $diskon;
            $itemdetail = CartDetail::create($inputan);
            // update subtotal dan total di table cart
            $itemdetail->cart->updatetotal($itemdetail->cart, $subtotal);
        }
        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CartDetail  $cartDetail
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
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itemdetail = CartDetail::findOrFail($id);
        $param = $request->param;
        
        if ($param == 'tambah') {
            // update detail cart
            $qty = 1;
            $itemdetail->updatedetail($itemdetail, $qty, $itemdetail->harga, $itemdetail->diskon);
            // update total cart
            $itemdetail->cart->updatetotal($itemdetail->cart, ($itemdetail->harga - $itemdetail->diskon));
            return back()->with('success', 'Item berhasil diupdate');
        }
        if ($param == 'kurang') {
            // update detail cart
            $qty = 1;
            $itemdetail->updatedetail($itemdetail, '-'.$qty, $itemdetail->harga, $itemdetail->diskon);
            // update total cart
            $itemdetail->cart->updatetotal($itemdetail->cart, '-'.($itemdetail->harga - $itemdetail->diskon));
            return back()->with('success', 'Item berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemdetail = CartDetail::findOrFail($id);
        // update total cart dulu
        $itemdetail->cart->updatetotal($itemdetail->cart, '-'.$itemdetail->subtotal);
        if ($itemdetail->delete()) {
            return back()->with('success', 'Item berhasil dihapus');
        } else {
            return back()->with('error', 'Item gagal dihapus');
        }
    }
}
