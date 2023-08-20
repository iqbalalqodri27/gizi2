@extends('master_app.app')
@section('title', ' Data Anak')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if (Session::has('successUpdate'))
                    <div class="alert alert-warning" role="alert">
                        {{Session::get('successUpdate')}}
                    </div>
                    @endif
                    @if (Session::has('successDelete'))
                    <div class="alert alert-secondary " role="alert">
                        {{Session::get('successDelete')}}
                    </div>
                    @endif
                    <div class="card-header">
                        {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                            Data User</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            halaman User
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->




{{-- modal tambah data ibu --}}
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modal-tambah" class="modal-title">Tambah Data Anak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{Route('dataanak.store')}}" method="POST">
                    @csrf
                    <div id="modal-tambah" class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Anak</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">NIK Anak</label>
                            <div class="col-sm-8">
                                <input type="number" name="nik" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" name="tempat_lahir" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Usia</label>
                            <div class="col-sm-8">
                                <input type="text" name="usia" class="form-control" required>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="icheck-success d-inline">
                                <input type="radio" name="jenis_kelamin" checked id="radioSuccess1" value="L">

                                <label for="radioSuccess1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" name="jenis_kelamin" id="radioSuccess2" value="P">

                                <label for="radioSuccess2">
                                    Perempuan
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Ibu</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_ot" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-8">
                                <input type="number" name="nik_ot" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" name="alamat_ot" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Telpon</label>
                            <div class="col-sm-8">
                                <input type="number" name="no_tlp_ot" class="form-control" required>
                            </div>
                        </div>






                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- modal tambah data ibu --}}




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>




@endsection
