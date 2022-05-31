@extends('layouts.dashboard')
@section('title', 'User')
@section('content')

<div class="page has-sidebar-left">
  <header class="my-3">
      <div class="container-fluid">
          <div class="card no-b">
            <div class="card-body">
              <a href="#" onclick="tambah()" class="btn btn-primary btn-sm" style="float:right;"><i class="icon icon-plus pr-2"></i>Tambah User</a>
              <div class="card-title"><h4>Data User</h4></div><br>
              <table class="table table-striped data-tables">
                  <thead>
                      <tr>
                          <th>Nama</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody> 
                      @foreach ($dt_admin as $admin)
                        <tr>
                            <td>{{ $admin->username }}</td>
                            <td>
                                <a onclick="edit({{$admin->id}})" class="btn btn-primary btn-xs"><i class="icon icon-pencil pr-2"></i>Edit</a>
                                <a onclick="hapus_data({{$admin->id}})"  class="btn btn-danger btn-xs"><i class="icon icon-trash pr-2"></i>Hapus</a>
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
<div class="modal fade" id="modal">
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
                    <label class="control-label mb-10">Username</label>
                    <input type="text" name="username" id="username" class="form-control"> 
                </div>   
               <div class="form-group">
                    <label class="control-label mb-10">Password</label>
                    <input type="password" name="pass" id="pass" class="form-control"> 
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
@endsection

@section('js') 
 <script type="text/javascript">

  function edit(id)
  { 
    url = 'edit'; 
    $('#id').val(id);
    $('#title').html("Edit User");
    $('#modal').modal('show');
    $.ajax({
      type: 'GET',
      url: 'user/get_select',
      dataType: 'json',
      data: "id="+id,
      success: function (resp) { 
              $("#nis").val(resp.nis);  
          },
          error: function()
          {
          }
      }); 
  }

  function tambah()
  { 
     url = 'tambah';
    $('#title').html("Tambah User");
    $('#modal').modal('show');
  }

  $("#form-simpan").on('submit', function (e) {    

      $('#btn_simpan').html('Proses...');
      $('#btn_simpan').attr('disabled',true);    
      $.ajax({
          type: 'post',
          url: 'user/'+url,
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
 $.ajax({
      type: 'DELETE',
      url: 'user/hapus',
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

</script> 
@endsection
