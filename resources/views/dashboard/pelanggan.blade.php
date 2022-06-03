@extends('layouts.dashboard')
@section('title', 'Pelanggan')
@section('content')

<div class="modal fade" id="modal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="title"></h6> 
      </div>
        <form id="form-simpan" method="post">
        @csrf
        @method('POST')
          <input type="text" name="id" hidden="" id="id">
            <div class="modal-body">   
               <div class="form-group">
                    <label class="control-label mb-10">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" required="required"> 
                </div> 
               <div class="form-group">
                    <label class="control-label mb-10">Alamat Lengkap</label>
                    <textarea class="form-control" id="alamat" name="alamat"></textarea> 
                </div> 
               <div class="form-group">
                    <label class="control-label mb-10">No Telepon</label>
                    <input type="number" name="no_telp" id="no_telp" class="form-control">  
                </div> 
               <div class="form-group">
                    <label class="control-label mb-10">Email</label>
                    <input type="email" name="email" id="email" class="form-control"> 
                </div> 
            </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary" id="btn_simpan">Simpan</button>
          </div>
      </form>
    </div> 
  </div> 
</div>
<div class="page has-sidebar-left">
  <header class="my-3">
      <div class="container-fluid">
          <div class="card no-b">
            <div class="card-body">
              <a href="#" onclick="tambah()" class="btn btn-success btn-sm" style="float:right;"><i class="icon icon-plus pr-2"></i>Tambah Pelanggan</a>
              <div class="card-title"><h4>Data Pelanggan</h4></div><br>
              <table class="table table-striped data-tables">
                  <thead>
                      <tr>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No Telepon</th>
                          <th>Alamat</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody> 
                      @foreach ($dt_pelanggan as $pelanggan)
                        <tr>
                            <td>{{ $pelanggan->nama }}</td>
                            <td>{{ $pelanggan->email }}</td>
                            <td>{{ $pelanggan->no_telp }}</td>
                            <td>{{ $pelanggan->alamat }}</td>
                            <td>
                                <a onclick="edit({{$pelanggan->id}})" class="btn btn-primary btn-xs"><i class="icon icon-pencil pr-2"></i>Edit</a>
                                <a onclick="hapus_data({{$pelanggan->id}})"  class="btn btn-danger btn-xs"><i class="icon icon-trash pr-2"></i>Hapus</a>
                            </td>
                        </tr>
                     @endforeach
                  </tbody>
                </table>
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
    $('#title').html("Edit Pelanggan");
    $('#modal').modal('show');
    $.ajax({
      type: 'GET',
      url: 'pelanggan/get_select',
      dataType: 'json',
      data: "id="+id,
      success: function (resp) { 
              $("#nama").val(resp.nama); 
              $("#alamat").val(resp.alamat);  
              $("#no_telp").val(resp.no_telp);  
              $("#email").val(resp.email);   
          },
          error: function()
          {
          }
      }); 
  }

  function tambah()
  { 
     url = 'tambah';
    $('#title').html("Tambah Pelanggan");
    $('#modal').modal('show');
    $("#username_div").prop("hidden",false);
    $("#pass_div").prop("hidden",false);
  }

  $("#form-simpan").on('submit', function (e) {    

      $('#btn_simpan').html('Proses...');
      $('#btn_simpan').attr('disabled',true);    
      $.ajax({
          type: 'post',
          url: 'pelanggan/'+url,
          dataType: 'json',
          data: $('#form-simpan').serialize(),
          success: function (resp) { 
            $('#btn_simpan').html('Simpan');
            $('#btn_simpan').attr('disabled',true); 

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

function hapus_data(id)
{
   $('#id').val(id);
   swal({
      title: "Hapus pelanggan?",
      text: "",
      type: "warning",
      showLoaderOnConfirm: true,
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Hapus',
      cancelButtonText: "Batal",
      closeOnConfirm: false,
      closeOnCancel: true
   },
   function(isConfirm){ 
     if (isConfirm)
      {
        $.ajax({
            type: 'DELETE',
            url: 'pelanggan/hapus',
            dataType: 'json',
            data: "id="+id,
            success: function (resp) { 
                 swal({
                      title: "Proses Berhasil",
                      text:"",
                      type: "success"
                  }, function() {
                      location.reload(true);
                  }); 
            },
            error: function()
            {   
            }
        }); 
      }   
    }); 
}

</script> 
@endsection
