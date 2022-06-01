@extends('layouts.dashboard')
@section('title', 'Laporan Penjualan')
@section('content')

<div class="page has-sidebar-left">
  <header class="my-3">
      <div class="container-fluid">
          <div class="card no-b">
            <div class="card-body">
              <div class="card-title"><h4>Laporan Penjualan</h4></div><br>
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>No Penjualan</th>  
                          <th>Tanggal Penjualan</th>  
                          <th>Product</th> 
                          <th>Harga</th> 
                          <th>Kuantitas</th> 
                          <th>Total</th>
                      </tr>
                  </thead>
                  <?php $total = 0; ?>
                    @foreach ($dt_penjualan as $penjualan)
                    <?php
                      $total += $penjualan->harga * $penjualan->qty;
                     ?>
                        <tr>
                            <td>{{ $penjualan->no_penjualan }}</td> 
                            <td>{{ $penjualan->tgl_jual }}</td> 
                            <td>{{ $penjualan->product }}</td> 
                            <td>{{ $penjualan->harga }}</td> 
                            <td>{{ $penjualan->qty }}</td> 
                            <td>{{ $penjualan->harga * $penjualan->qty }}</td> 
                        </tr>
                     @endforeach 
                     <tr>
                        <td colspan="4">&nbsp;</td>
                        <td>Total</td>
                        <td><?php echo $total;?></td>
                     </tr>
                </table>
            </div> 
        </div>
    </div>
  </header>
</div>
@endsection

@section('js')  
@endsection