@extends('layouts.dashboard')
@section('title', 'Product')
@section('content')

<div class="page has-sidebar-left">
  <header class="my-3">
      <div class="container-fluid">
          <div class="card no-b">
            <div class="card-body">
              <a href="/product_tambah" class="btn btn-success btn-sm" style="float:right;"><i class="icon icon-plus pr-2"></i>Tambah Product</a>
              <div class="card-title"><h4>Data Product</h4></div><br>
              <div class="card-body"> 
                 <div class="box-body table-responsive no-padding">
                   <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Kategori Product</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                       
                    </tbody>
                  </table>
                </div>
              </div>
            </div> 
        </div>
    </div>
  </header>
</div> 
@endsection

@section('js') 
<script type="text/javascript"> 
   function edit(id)
  { 
    url = 'edit'; 
    $('#id').val(id);
    $('#title').html("Edit Kategori Product");
    $('#modal').modal('show');
    $.ajax({
      type: 'GET',
      url: 'product_kateg/get_select',
      dataType: 'json',
      data: "id="+id,
      success: function (resp) { 
              $("#nama").val(resp.nama); 
          },
          error: function()
          {
          }
      }); 
  }
</script> 
@endsection
