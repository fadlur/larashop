<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        $data = array('title' => 'Homepage');
        return view('homepage.index', $data);
    }

    public function about() {
        $data = array('title' => 'Tentang Kami');
        return view('homepage.about', $data);
    }

    public function kontak() {
        $data = array('title' => 'Kontak Kami');
        return view('homepage.kontak', $data);
    }

    public function kategori() {
        $data = array('title' => 'Kategori Produk');
        return view('homepage.kategori', $data);
    }

    public function produk() {
        $data = array('title' => 'Produk');
        return view('homepage.produk', $data);
    }

    public function produkdetail($id) {
        $data = array('title' => 'Produk Detail');
        return view('homepage.produkdetail', $data);
    }
}
