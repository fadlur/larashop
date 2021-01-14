@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Laporan Penjualan</h3>
          <div class="card-tools">
            <a href="{{ URL('admin/laporan') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          <h3 class="text-center">Periode {{ $bulan != ""? "Bulan ".$bulan: "" }} {{ $tahun }}</h3>
          <div class="row">
            <div class="col col-lg-4 col-md-4">
              <h4 class="text-center">Ringkasan Transaksi</h4>
              <!-- cetak totalnya -->
              <?php
              $total = 0;
              foreach ($itemtransaksi as $k) {
                $total += $k->cart->total;
              }
              ?>
              <!-- end cetak totalnya -->
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Total Penjualan</td>
                    <td>Rp. {{ number_format($total, 2) }}</td>
                  </tr>
                  <tr>
                    <td>Total Transaksi</td>
                    <td>{{ count($itemtransaksi) }} Transaksi</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col col-lg-8 col-md-8">
              <h4 class="text-center">Rincian Transaksi</h4>
              <div class="table-responsive">
                <table class="table table-stripped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Invoice</th>
                      <th>Subtotal</th>
                      <th>Ongkir</th>
                      <th>Diskon</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($itemtransaksi as $transaksi)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>
                      {{ $transaksi->cart->no_invoice }}
                      </td>
                      <td>
                      {{ number_format($transaksi->cart->subtotal, 2) }}
                      </td>
                      <td>
                      {{ number_format($transaksi->cart->ongkir, 2) }}
                      </td>                      
                      <td>
                      {{ number_format($transaksi->cart->diskon, 2) }}
                      </td>
                      <td>
                      {{ number_format($transaksi->cart->total, 2) }}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection