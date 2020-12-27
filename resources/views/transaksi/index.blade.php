@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Data Transaksi
          </h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Sub Total</th>
                  <th>Diskon</th>
                  <th>Ongkir</th>
                  <th>Total</th>
                  <th>Status Pembayaran</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    1
                  </td>
                  <td>
                    Inv-01
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    0                  
                  </td>
                  <td>
                    27.000
                  </td>
                  <td>
                    227.000
                  </td>
                  <td>
                    Belum dibayar
                  </td>
                  <td>
                    Checkout
                  </td>
                  <td>
                    <a href="{{ route('transaksi.show', 1) }}" class="btn btn-sm btn-info mb-2">
                      Detail
                    </a>
                    <a href="{{ route('transaksi.edit', 1) }}" class="btn btn-sm btn-primary mb-2">
                      Edit
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    2
                  </td>
                  <td>
                    Inv-02
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    0                  
                  </td>
                  <td>
                    27.000
                  </td>
                  <td>
                    227.000
                  </td>
                  <td>
                    Belum dibayar
                  </td>
                  <td>
                    Checkout
                  </td>
                  <td>
                    <a href="{{ route('transaksi.show', 2) }}" class="btn btn-sm btn-info mb-2">
                      Detail
                    </a>
                    <a href="{{ route('transaksi.edit', 2) }}" class="btn btn-sm btn-primary mb-2">
                      Edit
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    3
                  </td>
                  <td>
                    Inv-03
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    0                  
                  </td>
                  <td>
                    27.000
                  </td>
                  <td>
                    227.000
                  </td>
                  <td>
                    Belum dibayar
                  </td>
                  <td>
                    Checkout
                  </td>
                  <td>
                    <a href="{{ route('transaksi.show', 3) }}" class="btn btn-sm btn-info mb-2">
                      Detail
                    </a>
                    <a href="{{ route('transaksi.edit', 3) }}" class="btn btn-sm btn-primary mb-2">
                      Edit
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    4
                  </td>
                  <td>
                    Inv-04
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    0                  
                  </td>
                  <td>
                    27.000
                  </td>
                  <td>
                    227.000
                  </td>
                  <td>
                    Belum dibayar
                  </td>
                  <td>
                    Checkout
                  </td>
                  <td>
                    <a href="{{ route('transaksi.show', 4) }}" class="btn btn-sm btn-info mb-2">
                      Detail
                    </a>
                    <a href="{{ route('transaksi.edit', 4) }}" class="btn btn-sm btn-primary mb-2">
                      Edit
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    5
                  </td>
                  <td>
                    Inv-05
                  </td>
                  <td>
                    200.000
                  </td>
                  <td>
                    0                  
                  </td>
                  <td>
                    27.000
                  </td>
                  <td>
                    227.000
                  </td>
                  <td>
                    Belum dibayar
                  </td>
                  <td>
                    Checkout
                  </td>
                  <td>
                    <a href="{{ route('transaksi.show', 5) }}" class="btn btn-sm btn-info mb-2">
                      Detail
                    </a>
                    <a href="{{ route('transaksi.edit', 5) }}" class="btn btn-sm btn-primary mb-2">
                      Edit
                    </a>
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