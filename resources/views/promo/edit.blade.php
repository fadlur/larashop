@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Produk</h3>
          <div class="card-tools">
            <a href="{{ route('promo.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
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
          <form action="{{ route('promo.update', $itempromo->id) }}" method="post">
            {{ method_field('patch') }}
            @csrf            
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="kode_produk">Kode Produk</label>
                  <input type="text" name="kode_produk" id="kode_produk" class="form-control" disabled value={{ $itempromo->produk->kode_produk }}>
                  <input type="hidden" name="produk_id" value={{$itempromo->produk_id}}>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="nama_produk">Nama Produk</label>
                  <input type="text" name="nama_produk" id="nama_produk" class="form-control" disabled value={{ $itempromo->produk->nama_produk }}>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="harga_awal">Harga Awal</label>
              <input type="text" name="harga_awal" id="harga_awal" class="form-control" value={{ $itempromo->harga_awal }}>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="diskon_persen">Diskon Persen</label>
                  <input type="text" name="diskon_persen" id="diskon_persen" class="form-control" value={{ $itempromo->diskon_persen }}>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="diskon_nominal">Diskon Nominal</label>
                  <input type="text" name="diskon_nominal" id="diskon_nominal" class="form-control" value={{ $itempromo->diskon_nominal }}>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="harga_akhir">Harga Akhir</label>
              <input type="text" name="harga_akhir" id="harga_akhir" class="form-control" value={{ $itempromo->harga_akhir }}>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  // cari nominal diskon
  $('#diskon_persen').on('keyup', function() {
    var harga_awal = $('#harga_awal').val();
    var diskon_persen = $('#diskon_persen').val();
    var diskon_nominal = diskon_persen / 100 * harga_awal;
    var harga_akhir = harga_awal - diskon_nominal;
    $('#diskon_nominal').val(diskon_nominal);
    $('#harga_akhir').val(harga_akhir);
  })
  // cari nominal persen
  $('#diskon_nominal').on('keyup', function() {
    var harga_awal = $('#harga_awal').val();
    var diskon_nominal = $('#diskon_nominal').val();
    var diskon_persen = diskon_nominal / harga_awal * 100;
    var harga_akhir = harga_awal - diskon_nominal;
    $('#diskon_persen').val(diskon_persen);
    $('#harga_akhir').val(harga_akhir);
  })
  // load produk detail
  $('#produk_id').on('change', function() {
    var id = $('#produk_id').val();
    $.ajax({
      url: '{{ URL::to('admin/loadprodukasync') }}/'+id,
      type: 'get',
      dataType: 'json',
      success: function (data,status) {
        if (status == 'success') {
          $('#harga_awal').val(data.itemproduk.harga);
        }
      },
      error : function(x,t,m) {
      }
    })
  })

</script>
@endsection