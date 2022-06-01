@extends('layouts.dashboard')
@section('title', 'Laporan Pembelian')
@section('content')

<div class="page has-sidebar-left">
  <header class="my-3">
      <div class="container-fluid">
          <div class="card no-b">
            <div class="card-body">
              <div class="card-title"><h4>Laporan Pembelian</h4></div><br>
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>No Pembelian</th> 
                          <th>Pelanggan</th> 
                          <th>Tanggal</th> 
                          <th>Total</th>
                      </tr>
                  </thead>
                  <?php $total = 0; ?>
                    @foreach ($dt_pembelian as $pembelian)
                    <?php
                      $total += $pembelian->total;
                     ?>
                        <tr>
                            <td>{{ $pembelian->no_pembelian }}</td> 
                            <td>{{ $pembelian->nama }}</td> 
                            <td>{{ $pembelian->tgl_beli }}</td> 
                            <td>{{ $pembelian->total }}</td> 
                        </tr>
                     @endforeach 
                     <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Total Pembelian</td>
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