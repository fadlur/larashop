@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row mt-4">
    <div class="col col-lg-8 col-md-8">
      <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="{{ asset('images/slide1.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/slide2.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/slide3.jpg') }}" class="d-block w-100" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <!-- deskripsi produk -->
    <div class="col col-lg-4 col-md-4">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <span class="small">Kategori Pertama</span>
              <h5>Produk Pertama</h5>
              <p>
                Rp. 10.000,00
              </p>
              <button class="btn btn-sm btn-outline-secondary">
              <i class="far fa-heart"></i> Tambah ke wishlist
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <button class="btn btn-block btn-primary">
              <i class="fa fa-shopping-cart"></i> Tambahkan Ke Keranjang
              </button>
              <button class="btn btn-block btn-danger mt-4">
              <i class="fa fa-shopping-basket"></i> Beli Sekarang
              </button>
            </div>
            <div class="card-footer">
              <div class="row mt-4">
                <div class="col text-center">
                  <i class="fa fa-truck-moving"></i> 
                  <p>Pengiriman Cepat</p>
                </div>
                <div class="col text-center">
                  <i class="fa fa-calendar-week"></i> 
                  <p>Garansi 7 hari</p>
                </div>
                <div class="col text-center">
                  <i class="fa fa-money-bill"></i> 
                  <p>Pembayaran Aman</p>
                </div>
              </div>            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col">
      <div class="card">
        <div class="card-header">
          Deskripsi
        </div>
        <div class="card-body">
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis, error ipsa dolor rem doloribus recusandae debitis quis voluptates sed omnis iure, a ipsum id consectetur, amet sapiente reprehenderit dignissimos. Voluptatum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, veritatis dicta quisquam, deleniti in beatae delectus ab harum eum reiciendis voluptatibus rem distinctio soluta veniam blanditiis minima accusamus quos corporis.</p>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique alias nobis aliquam rem ex nesciunt explicabo distinctio, placeat ut voluptate, modi officiis error excepturi vitae odit quaerat commodi tenetur recusandae.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection