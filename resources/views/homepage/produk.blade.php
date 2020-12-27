@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row mt-4">
    <div class="col col-lg-3 col-md-3 mb-2">
      <div class="card">
        <div class="card-header">
          Kategori
        </div>
        <ul class="list-group list-group-flush">
          <a href="#" class="text-decoration-none">
            <li class="list-group-item">Kategori Pertama</li>
          </a>
          <a href="#" class="text-decoration-none">
            <li class="list-group-item">Kategori Kedua</li>
          </a>
          <a href="#" class="text-decoration-none">
            <li class="list-group-item">Kategori Ketiga</li>
          </a>
        </ul>
      </div>
    </div>
    <div class="col col-lg-9 col-md-9 mb-2">
      <h3>Semua Kategori</h3>
      <div class="row mt-4">
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="{{ URL::to('produk/satu') }}">
              <img src="{{asset('images/slide2.jpg') }}" alt="foto produk" class="card-img-top">
            </a>
            <div class="card-body">
              <a href="{{ URL::to('produk/satu') }}" class="text-decoration-none">
                <p class="card-text">
                  Produk Pertama
                </p>
              </a>
              <div class="row mt-4">
                <div class="col">
                  <button class="btn btn-light">
                    <i class="far fa-heart"></i>
                  </button>
                </div>
                <div class="col-auto my-auto">
                  Rp. 10.000,00
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- produk kedua -->
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="{{ URL::to('produk/dua') }}">
              <img src="{{asset('images/slide2.jpg') }}" alt="foto produk" class="card-img-top">
            </a>
            <div class="card-body">
              <a href="{{ URL::to('produk/dua') }}" class="text-decoration-none">
                <p class="card-text">
                  Produk Kedua
                </p>
              </a>
              <div class="row mt-4">
                <div class="col">
                  <button class="btn btn-light">
                    <i class="far fa-heart"></i>
                  </button>
                </div>
                <div class="col-auto my-auto">
                  Rp. 10.000,00
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- produk ketiga -->
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <a href="{{ URL::to('produk/tiga') }}">
              <img src="{{asset('images/slide2.jpg') }}" alt="foto produk" class="card-img-top">
            </a>
            <div class="card-body">
              <a href="{{ URL::to('produk/tiga') }}" class="text-decoration-none">
                <p class="card-text">
                  Produk Ketiga
                </p>
              </a>
              <div class="row mt-4 align-middle">
                <div class="col">
                  <button class="btn btn-light">
                    <i class="far fa-heart"></i>
                  </button>
                </div>
                <div class="col-auto my-auto">
                  Rp. 10.000,00
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 