<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        $itemwishlist = Wishlist::where('user_id', $itemuser->id)
                                ->paginate(10);
        $data = array('title' => 'Wishlist',
                    'itemwishlist' => $itemwishlist);
        return view('wishlist.index', $data)->with('no', ($request->input('page', 1) - 1) * 10);
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
        $validasiwishlist = Wishlist::where('produk_id', $request->produk_id)
                                    ->where('user_id', $itemuser->id)
                                    ->first();
        if ($validasiwishlist) {
            $validasiwishlist->delete();//kalo udah ada, berarti wishlist dihapus
            return back()->with('success', 'Wishlist berhasil dihapus');
        } else {
            $inputan = $request->all();
            $inputan['user_id'] = $itemuser->id;
            $itemwishlist = Wishlist::create($inputan);
            return back()->with('success', 'Produk berhasil ditambahkan ke wishlist');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
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
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemwishlist = Wishlist::findOrFail($id);
        if ($itemwishlist->delete()) {
            return back()->with('success', 'Wishlist berhasil dihapus');
        } else {
            return back()->with('error', 'Wishlist gagal dihapus');
        }
    }
}
