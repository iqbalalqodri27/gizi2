@extends('master_app.app')
@section('title', ' Data Anak')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Anak</h1>
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
                        <a class="btn btn-success" id="tampil-data" data-toggle="modal" data-target="#modal-lg">+ Tambah
                            Data Anak</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA ANAK</th>
                                    <th>NIK ANAK</th>
                                    <th>USIA</th>
                                    <th>JENIS KELAMIN </th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($childs->count() > 0)
                                @foreach ($childs as $child)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td class="align-middle">{{$child->nama}}</td>
                                    <td class="align-middle">{{$child->nik}}</td>
                                    <td class="align-middle">{{$child->usia}} Bulan</td>
                                    <td class="align-middle">{{$child->jenis_kelamin}}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modaledit{{$child->id}}">Edit</a> | |
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modaldetail{{$child->id}}">Detail</a>| |
                                        <form class="d-inline" action="{{route('dataanak.destroy',$child->id)}}" method="POST" onsubmit="return confirm('delete data ?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>

                                    </td>
                                </tr>

                                {{-- Modal Update Anak --}}
                                <div class="modal fade" id="modaledit{{$child->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Anak</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                                              data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                                            <div class="modal-body">
                                                <form class="" action="{{route('dataanak.update',$child->id)}}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Nama Anak</label>
                                                        <input type="hidden" name='id' class="form-control" value="<?php echo $child['id']; ?>">
                                                        <input type="text" name='nama' class="form-control" value="<?php echo $child['nama']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">NIK</label>
                                                        <textarea class="form-control" required name="nik" rows="5"><?php echo $child['nik']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Tempat Lahir</label>
                                                        <input type="text" name='tempat_lahir' class="form-control" value="<?php echo $child['tempat_lahir']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Alamat</label>
                                                        <input type="date" name='tanggal_lahir' class="form-control" value="<?php echo $child['tanggal_lahir']; ?>" required>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label for="exampleFormControlInput1">Usia</label>
                                                        <input type="number" name='usia' class="form-control" value="<?php echo $child['usia']; ?>" required>
                                                    </div> --}}
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis
                                                            Kelamin</label>
                                                        <div class=" d-inline">
                                                            <input type="radio" name="jenis_kelamin" {{ $child->jenis_kelamin == 'L' ? 'checked' : '' }} id="" value="L">

                                                            <label for="radioSuccess1">
                                                                Laki-Laki
                                                            </label>
                                                        </div>
                                                        <div class=" d-inline">
                                                            <input type="radio" name="jenis_kelamin" id="" value="P" {{ $child->jenis_kelamin == 'P' ? 'checked' : '' }}>

                                                            <label for="radioSuccess2">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Ibu</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="nama_ot"  class="form-control" value='{{$child->nama_ot}}' required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">NIK Ibu</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="nik_ot"  class="form-control" value='{{$child->nik_ot}}' required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="alamat_ot" class="form-control" value='{{$child->alamat_ot}}' required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Telpon</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="no_tlp_ot" class="form-control" value='{{$child->no_tlp_ot}}' required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{-- Modal Detail Data Anak --}}
                                <div class="modal fade" id="modaldetail{{$child->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Data Anak</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                                              data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                                            <div class="modal-body">
                                                <form class="" action="">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Anak :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text'  class="form-control">{{$child->nama}}</P>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nik :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">{{$child->nik}}</P>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tempat Lahir :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">{{$child->tempat_lahir}}</P>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Lahir :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">{{$child->tanggal_lahir}}</P>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Usia :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">{{$child->usia}} Bulan</P>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Kelamin :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">
                                                         @if($child->jenis_kelamin == 'L')

                                                         Laki-Laki
                                                            
                                                         @else
                                                         Perempuan
                                                         @endif
                                                         </P>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Ibu :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">{{$child->nama_ot}} </P>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nik Ibu :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">{{$child->nik_ot}} </P>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat Ibu :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">{{$child->alamat_ot}} </P>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Tlp Ibu :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">{{$child->no_tlp_ot}} </P>
                                                        </div>
                                                    </div>

                                                    
                                                    
                                                    


                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="6">Data Anak 0</td>
                                </tr>
                                @endif
                                </tfoot>
                        </table>
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
