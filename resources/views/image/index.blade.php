@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Image</h3>
        </div>
        <div class="card-body">
          <form action="{{ url('/admin/image') }}" method="post" enctype="multipart/form-data" class="form-inline">
          @csrf
          <div class="form-group">
            <input type="file" name="image" id="image">
          </div>
          <div class="form-group">
            <button class="btn btn-primary">Upload</button>
          </div>
          </form>
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
          <div class="row">
            @foreach($itemgambar as $gambar)
            <div class="col col-lg-3 col-md-3 mb-2">
              <img src="{{ \Storage::url($gambar->url) }}" alt="img" class="img-thumbnail mb-2">
              <form action="{{ url('/admin/image/'.$gambar->id) }}" method="post" style="display:inline;">
                @csrf
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-sm btn-danger mb-2">
                  Hapus
                </button>                    
              </form>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection