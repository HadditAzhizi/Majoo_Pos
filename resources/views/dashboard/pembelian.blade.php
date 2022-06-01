@extends('layouts.dashboard')
@section('title', 'Pembelian')
@section('content')

<div class="page has-sidebar-left">
  <header class="my-3">
      <div class="container-fluid">
          <div class="card no-b">
            <div class="card-body">
              <a href="/pembelian_tambah" class="btn btn-success btn-sm" style="float:right;"><i class="icon icon-plus pr-2"></i>Buat Pembelian</a>
              <div class="card-title"><h4>Data Pembelian</h4></div><br>
              <table class="table table-striped data-tables">
                  <thead>
                      <tr>
                          <th>No Pembelian</th> 
                          <th>Total pembelian</th>
                          <th>Tanggal</th> 
                          <th>Supplier</th> 
                      </tr>
                  </thead>
                  @foreach ($dt_pembelian as $pembelian)
                        <tr>
                            <td>{{ $pembelian->no_pembelian }}</td> 
                            <td>{{ $pembelian->tgl_beli }}</td> 
                            <td>{{ $pembelian->total }}</td> 
                            <td>{{ $pembelian->nama }}</td> 
                        </tr>
                     @endforeach
                  <tbody>  
                  </tbody>
                </table>
            </div> 
        </div>
    </div>
  </header>
</div>
@endsection

@section('js')  
@endsection
