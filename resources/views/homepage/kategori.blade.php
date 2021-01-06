@extends('layouts.template')
@section('content')
<div class="container">
  <!-- kategori produk -->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-center">Kategori Produk</h2>
    </div>
    @foreach($itemkategori as $kategori)
    <!-- kategori pertama -->
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <a href="{{ URL::to('kategori/'.$kategori->slug_kategori) }}">
          @if($kategori->foto != null)
          <img src="{{ \Storage::url($kategori->foto) }}" alt="{{ $kategori->nama_kategori }}" class="card-img-top">
          @else
          <img src="{{asset('images/bag.jpg') }}" alt="{{ $kategori->nama_kategori }}" class="card-img-top">
          @endif
        </a>
        <div class="card-body">
          <a href="{{ URL::to('kategori/'.$kategori->slug_kategori) }}" class="text-decoration-none">
            <p class="card-text">{{ $kategori->nama_kategori }}</p>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  <!-- end kategori produk -->
  <!-- produk Terbaru-->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-center">Terbaru</h2>
    </div>
    @foreach($itemproduk as $produk)
    <!-- produk pertama -->
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <a href="{{ URL::to('produk/'.$produk->slug_produk) }}">
          @if($produk->foto != null)
          <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
          @else
          <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
          @endif
        </a>
        <div class="card-body">
          <a href="{{ URL::to('produk/'.$produk->slug_produk ) }}" class="text-decoration-none">
            <p class="card-text">
              {{ $produk->nama_produk }}
            </p>
          </a>
          <div class="row mt-4">
            <div class="col">
              <button class="btn btn-light">
                <i class="far fa-heart"></i>
              </button>
            </div>
            <div class="col-auto">
              <p>
                Rp. {{ number_format($produk->harga, 2) }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
@endsection