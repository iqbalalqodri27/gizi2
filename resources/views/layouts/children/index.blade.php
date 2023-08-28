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
                                        <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modaledit{{$child->id}}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>
                                        </a> | |
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modaldetail{{$child->id}}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg></a>| |
                                        <form class="d-inline" action="{{route('dataanak.destroy',$child->id)}}" method="POST" onsubmit="return confirm('delete data ?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-danger"><i class="far fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>


                                {{-- modal Detail Anak --}}
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
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Orang Tua :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">{{$child->nama_ot}} </P>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nik Orang Tua :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">{{$child->nik_ot}} </P>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat Orang Tua :</label>
                                                        <div class="col-sm-8">
                                                         <p type='text' class="form-control">{{$child->alamat_ot}} </P>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nomor Tlp Orang Tua :</label>
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
                                                        
                                                        <input type="text" name='nik' class="form-control" maxlength="16" id="ccn" value="<?php echo $child['nik']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Tempat Lahir</label>
                                                        <textarea class="form-control" required name="tempat_lahir" rows="3"><?php echo $child['tempat_lahir']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Tanggal Lahir</label>
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
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Orang Tua</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="nama_ot"  class="form-control" value='{{$child->nama_ot}}' required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">NIK Orang Tua</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="nik_ot" maxlength="16" id="ccn"  class="form-control" value='{{$child->nik_ot}}' required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat Orang Tua</label>
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
                                <input type="text" maxlength="16" id="ccn" name="nik" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <textarea class="form-control"  name="tempat_lahir" rows="3" required></textarea>
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
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Orang Tua</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_ot" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nik Orang Tua</label>
                            <div class="col-sm-8">
                                <input type="text" maxlength="16" id="ccn" name="nik_ot" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat Orang Tua</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="alamat_ot" rows="3"required></textarea>
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

<script>
    var ccn = $('#ccn').val();
//Test the length, and use a regex to test 
//that there are 16 numbers
if( ccn.length < 16 || !/[0-9]{16}/.test(ccn) ) {
   dd('data melebihi 16 digit !')
}
</script>




@endsection
