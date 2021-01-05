@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <!-- table kategori -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Kategori Produk</h4>
          <div class="card-tools">
            <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary">
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
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Gambar</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Jumlah Produk</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemkategori as $kategori)
                <tr>
                  <td>
                  {{ ++$no }}
                  </td>
                  <td>
                    <!-- image kategori -->
                    @if($kategori->foto != null)
                    <img src="{{ \Storage::url($kategori->foto) }}" alt="{{ $kategori->nama_kategori }}" width='150px' class="img-thumbnail mb-2">
                    <br>
                    <form action="{{ url('/admin/imagekategori/'.$kategori->id) }}" method="post" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm btn-danger mb-2">
                        Hapus
                      </button>                    
                    </form>
                    @else
                    <form action="{{ url('/admin/imagekategori') }}" method="post" enctype="multipart/form-data" class="form-inline">
                      @csrf
                      <div class="form-group">
                        <input type="file" name="image" id="image">
                        <input type="hidden" name="kategori_id" value={{ $kategori->id }}>
                      </div>
                      <div class="form-group">
                        <button class="btn btn-primary">Upload</button>
                      </div>
                    </form>
                    @endif
                    <!-- end image kategori -->
                  </td>
                  <td>
                  {{ $kategori->kode_kategori }}
                  </td>
                  <td>
                  {{ $kategori->nama_kategori }}
                  </td>
                  <td>
                  {{ count($kategori->produk) }} Produk
                  </td>
                  <td>
                  {{ $kategori->status }}
                  </td>
                  <td>
                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="post" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm btn-danger mb-2">
                        Hapus
                      </button>                    
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            <!-- untuk menampilkan link page, tambahkan skrip di bawah ini -->
            {{ $itemkategori->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection