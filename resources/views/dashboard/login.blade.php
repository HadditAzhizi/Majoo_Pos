@extends('layouts.login')
@section('title', 'Login')
@section('content') 
<main>
    <div id="primary" class="green p-t-b-100 height-full responsive-phone">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="assets/img/logo_white.png" alt="" style="margin-top: 130px;">
                </div>
                <div class="col-lg-7 p-t-100">
                    <div class="text-white">
                        <h1>Selamat datang di Majoo POS</h1>
                        <p class="s-18 p-t-b-20 font-weight-lighter">Login - Majoo POS</p>
                    </div>
                     <form action="#" id="form-simpan">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                                    <input type="text" class="form-control form-control-lg no-b"
                                           placeholder="Username" name="username">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="password" class="form-control form-control-lg no-b"
                                           placeholder="Password" name="pass">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main> 
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
@endsection
@section('js')
<script type="text/javascript"> 
 $("#form-simpan").on('submit', function (e) {   
    e.preventDefault(); 
    $.ajax({
      type: 'POST',
      url: '/user/login',
      dataType: 'json',
      data: $('#form-simpan').serialize(),
      success: function (resp) 
        {   
            if(resp==0)
            {
                swal({
                    title: "Login Gagal",
                    text:"Check username dan password anda",
                    type: "warning"
                }); 
            }
            else
            {
                window.location.href = '/dashboard'; 
            }
        }
    }); 
    return false;
});
</script> 
@endsection
