@extends('layouts.dashboard')
@section('title', 'Product')
@section('content')
 <style>
        .progress { position:relative; width:100%; }
        .bar { background-color: #00ff00; width:0%; height:20px; }
        .percent { position:absolute; display:inline-block; left:50%; color: #040608;}
   </style>
<div class="page has-sidebar-left">
  <header class="my-3">
      <div class="container-fluid">
          <div class="card mb-3 shadow no-b r-0">
            <div class="card-header white">
                <h6>Tambah Product</h6>
            </div>
            <div class="card-body"> 
              <div id="validation-errors" class="error"></div>
              <form id="form-simpan" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
                  <div class="form-group">
                      <label class="control-label mb-10">No Pembelian</label>
                      <input type="text" name="no_pembelian" class="form-control"> 
                  </div> 
                 <div class="form-group">
                      <label class="control-label mb-10">Tanggal pembelian</label>
                      <input type="date" name="tgl_pembelian" class="form-control"> 
                  </div> 
                   <div class="form-group">
                      <label class="control-label mb-10">Supplier</label>
                      <select class="form-control select2" name="supplier">
                        @foreach ($dt_supplier as $supplier)
                          <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                        @endforeach
                      </select>
                  </div>  
                   <div class="form-group">
                      <label class="control-label mb-10">Product</label>
                        <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>Nama</th>
                                  <th>Qty</th>
                                  <th>Harga</th>
                                  <th>Subtotal</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody id="tmp_product">
                            <tr class="baris1">
                              <td>
                                  <select class="form-control select2 product" name="product[]" onchange="pil_product(1)">
                                    <option value="">Pilih Produk</option>
                                    @foreach ($dt_product as $product)
                                      <option data-harga="{{ $product->harga }}" value="{{ $product->id }}">{{ $product->nama }}</option>
                                    @endforeach
                                  </select>
                              </td>
                              <td>
                                  <input type="number" class="form-control qty" min="1" value="1" name="qty[]" placeholder="Qty">
                              </td>
                              <td>
                                  <input type="number" class="form-control harga" name="harga[]" placeholder="Harga">
                              </td>
                              <td class="subtotal"></td>
                              <td></td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <td><b>Total</b></td>
                            <td></td> 
                            <td><h3 id="total">Rp </h3>
                              <input type="text" name="total" id="total_inp" value="" hidden="">
                            </td>
                            <td>
                            <button type="button" class="btn btn-primary" onclick="add_prod()"><i class="icon icon-plus pr-0"></i></button></td>
                          </tfoot>
                        </table>
                  </div>   
                  <button class="btn btn-success" type="submit" id="btn_simpan">Simpan</button>
              </form>
            </div>
        </div>
    </div>
  </header>
</div> 
@endsection

@section('js') 
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript"> 
  var x=1;
  $("#form-simpan").on('submit', function (e) {     
      $.ajax({
          type: 'post',
          url: 'pembelian/tambah',
          dataType: 'json',
          data: $('#form-simpan').serialize(),
          success: function (resp) {
          console.log(resp); 
                swal({
                    title: "Proses Berhasil",
                    text:"",
                    type: "success"
                }, function() {
                    location.reload(true);
                });  
          },
          error: function()
          {}
      });  
   return false;
});

 function add_prod()
 {
  x++;
  $("#tmp_product").append('<tr class="baris'+x+'"><td><select class="form-control select2 product"  onchange="pil_product('+x+')" name="product[]"><option value="">Pilih Produk</option>@foreach ($dt_product as $product)<option data-harga="{{ $product->harga }}" value="{{ $product->id }}">{{ $product->nama }}</option>@endforeach/select></td><td><input type="number" min="1" value="1" class="form-control qty" name="qty[]" placeholder="Qty"></td><td><input type="number" class="form-control harga" name="harga[]" placeholder="Harga"></td><td class="subtotal"></td><td><button type="button" class="btn btn-danger" onclick="remove_prod('+x+')"><i class="icon icon-close pr-0"></i></button></td></tr>');
 }
 function pil_product(id_baris)
 {
  var harga = $(".baris"+id_baris+" .product").find(':selected').data("harga");
  $(".baris"+id_baris+" .harga").val(harga);
 }

$(function() {

  function refreshTotals() {
    var vTotalPrice = 0;
    var r;

    $(".subtotal").each(function(index, element) {
      r = parseFloat($(element).text().trim().substring(1));
      vTotalPrice += r;
    });

    $('#total_inp').text((vTotalPrice));
  }

  function changePrice(Row) {
    var Quantity = parseInt($(".qty", Row).val());
    var UnitPrice = parseFloat($(".harga", Row).val().substring(1));
    alert(Quantity);
    var TotalPrice = Quantity * UnitPrice;

    $(".subtotal", Row).html((TotalPrice));

    refreshTotals();
  }

  $(".product, .qty, .harga").change(function() {
    changePrice($(this).closest("tr"));
  });

  refreshTotals();
});

</script> 
@endsection 