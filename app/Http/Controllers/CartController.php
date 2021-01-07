<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\AlamatPengiriman;
use App\Order;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();//ambil data user
        $itemcart = Cart::where('user_id', $itemuser->id)
                        ->where('status_cart', 'cart')
                        ->first();
        if ($itemcart) {
            $data = array('title' => 'Shopping Cart',
                        'itemcart' => $itemcart);
            return view('cart.index', $data)->with('no', 1);            
        } else {
            return abort('404');
        }
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
        //
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

    public function kosongkan($id) {
        $itemcart = Cart::findOrFail($id);
        $itemcart->detail()->delete();//hapus semua item di cart detail
        $itemcart->updatetotal($itemcart, '-'.$itemcart->subtotal);
        return back()->with('success', 'Cart berhasil dikosongkan');
    }

    public function checkout(Request $request) {
        $itemuser = $request->user();
        $itemcart = Cart::where('user_id', $itemuser->id)
                        ->where('status_cart', 'cart')
                        ->first();
        $itemalamatpengiriman = AlamatPengiriman::where('user_id', $itemuser->id)
                                                ->where('status', 'utama')
                                                ->first();
        if ($itemcart) {
            $data = array('title' => 'Checkout',
                        'itemcart' => $itemcart,
                        'itemalamatpengiriman' => $itemalamatpengiriman);
            return view('cart.checkout', $data)->with('no', 1);
        } else {
            return abort('404');
        }
    }
}
