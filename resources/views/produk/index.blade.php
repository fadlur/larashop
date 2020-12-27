@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <!-- table produk -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Produk</h4>
          <div class="card-tools">
            <a href="{{ route('produk.create') }}" class="btn btn-sm btn-primary">
              Baru
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="#">
            <div class="row">
              <div class="col">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="ketik keyword disini">
              </div>
              <div class="col-auto">
                <button class="btn btn-primary">
                  Cari
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Gambar</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Jumlah Produk</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <img src="{{ asset('images/slide1.jpg') }}" alt="produk 1" width='150px'>
                    <div class="row mt-2">
                      <div class="col">
                        <input type="file" name="gambar" id="gambar">
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-primary">Upload</button>
                      </div>
                    </div>
                  </td>
                  <td>KATE-1</td>
                  <td>Baju Anak</td>
                  <td>12 Produk</td>
                  <td>
                    <a href="{{ route('produk.show', 2) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Detail
                    </a>
                    <a href="{{ route('produk.edit', 2) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <button class="btn btn-sm btn-danger mb-2">
                      Hapus
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <img src="{{ asset('images/slide1.jpg') }}" alt="produk 1" width='150px'>
                    <div class="row mt-2">
                      <div class="col">
                        <input type="file" name="gambar" id="gambar">
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-primary">Upload</button>
                      </div>
                    </div>
                  </td>
                  <td>KATE-2</td>
                  <td>Baju Wanita</td>
                  <td>20 Produk</td>
                  <td>
                    <a href="{{ route('produk.show', 2) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Detail
                    </a>
                    <a href="{{ route('produk.edit', 2) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <button class="btn btn-sm btn-danger mb-2">
                      Hapus
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <img src="{{ asset('images/slide1.jpg') }}" alt="produk 1" width='150px'>
                    <div class="row mt-2">
                      <div class="col">
                        <input type="file" name="gambar" id="gambar">
                      </div>
                      <div class="col-auto">
                        <button class="btn btn-sm btn-primary">Upload</button>
                      </div>
                    </div>
                  </td>
                  <td>KATE-3</td>
                  <td>Baju Wanita</td>
                  <td>20 Produk</td>
                  <td>
                    <a href="{{ route('produk.show', 2) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Detail
                    </a>
                    <a href="{{ route('produk.edit', 2) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <button class="btn btn-sm btn-danger mb-2">
                      Hapus
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection