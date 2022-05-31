@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="page has-sidebar-left">
    <header class="my-3">
        <div class="container-fluid">
            <div class="row my-3">
                <div class="col-md-3">
                    <div class="counter-box white r-5 p-3">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-male text-light-blue s-48"></span>
                            </div>
                            <div class="counter-title">Laki - Laki</div>
                            <h5 class="sc-counter mt-3"></h5>
                        </div> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter-box white r-5 p-3">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-female pink-text s-48"></span>
                            </div>
                            <div class="counter-title ">Perempuan</div>
                            <h5 class="sc-counter mt-3"></h5>
                        </div> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter-box white r-5 p-3">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-male text-light-blue s-48"></span>
                                <span class="icon icon-female pink-text s-48"></span>
                            </div>
                            <div class="counter-title">Total Siswa</div>
                            <h5 class="sc-counter mt-3"></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter-box white r-5 p-3">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-user light-green-text s-48"></span>
                            </div>
                            <div class="counter-title">User</div>
                            <h5 class="sc-counter mt-3"></h5>
                        </div>
                    </div>
                </div>
            </div>
         <div class="card no-b">
            <div class="card-body">
                <a href="#" onclick="tambah()" class="btn btn-primary btn-sm" style="float:right;"><i class="icon icon-plus pr-2"></i>Tambah Siswa</a>
                <div class="card-title"><h4>Data Siswa</h4></div><br>
                    <table class="table table-striped data-tables">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </header> 
</div> 
 
@endsection

@section('js')  
@endsection
