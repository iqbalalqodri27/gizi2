@extends('master_app.app')
@section('title', ' Data Posyandu')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Posyandu</h1>
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
                    @if (Session::has('CekData'))
                    <div class="alert alert-secondary " role="alert">
                        {{Session::get('CekData')}}
                    </div>
                    @endif
                    <div class="card-header">
                        {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                        <a class="btn btn-success" id="tampil-data" data-toggle="modal" data-target="#modal-lg">+ Tambah
                            Data Posyandu</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Anak</th>
                                    <th>JK</th>
                                    <th>RT/RW</th>
                                    <th>Berat Badan</th>
                                    <th>Tinggi Badan</th>
                                    <th>Lingkaran Kepala</th>
                                    <th>status Gizi</th>
                                    <th>Status IMT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($posyandus->count() > 0)
                                @foreach ($posyandus as $posyandu)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td class="align-middle">{{$posyandu->child->nama}}</td>
                                    <td class="align-middle">{{$posyandu->child->jenis_kelamin}}</td>
                                    <td class="align-middle">{{$posyandu->child->alamat_ot}}</td>
                                    <td class="align-middle">{{$posyandu->berat_badan}}</td>
                                    <td class="align-middle">{{$posyandu->tinggi_badan}} m</td>
                                    <td class="align-middle">{{$posyandu->lingkaran_kepala}}</td>
                                    <td class="align-middle">{{$posyandu->status_gizi}}</td>
                                    <td class="align-middle">{{$posyandu->bmi}}</td>
                                    
                                    <td>
                                        <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal{{$posyandu->id}}"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg></a> | |
                                        <form class="d-inline" action="{{route('dataposyandu.destroy',$posyandu->id)}}" method="POST" onsubmit="return confirm('delete data ?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-danger"><i class="far fa fa-trash" aria-hidden="true"></i></button>
                                        </form>

                                    </td>
                                </tr>
                                <div class="modal fade" id="modal{{$posyandu->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Posyandu</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                                              data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                                            <div class="modal-body">
                                                <form class="" action="{{route('dataposyandu.update',$posyandu->id)}}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Anak</label>
                                                        <div class="col-sm-8">
                                                            <select name="child_id" class="form-control select2" id="child_id" style="width: 100%;" required >
                                                                <option value="">Pilih Nama Anak</option>
                                                                @foreach ($children as $child)
                                                                <option @selected($child->id == $posyandu->child_id) value="{{ $child->id }}-{{ $child->usia }}-{{ $child->jenis_kelamin }} " required>{{ $child->nama }} -  usia {{ $child->usia }} Bulan</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Berat Badan</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="berat_badan" class="form-control" step="0.01" min="0" lang="en" value={{$posyandu->berat_badan}} required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tinggi Badan</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="tinggi_badan" class="form-control" step="0.01" min="0" lang="en" value={{$posyandu->tinggi_badan}} required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Lingkaran Kepala</label>
                                                        <div class="col-sm-8">
                                                            <input type="number" name="lingkaran_kepala" class="form-control" value={{$posyandu->lingkaran_kepala}} required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Input</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" name="updated_at" class="form-control" value='' required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center" colspan="9">Data Posyandu 0</td>
                                </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Anak</th>
                                    <th>JK</th>
                                    <th>RT/RW</th>
                                    <th>Berat Badan</th>
                                    <th>Tinggi Badan</th>
                                    <th>Lingkaran Kepala</th>
                                    <th>Status Gizi</th>
                                    <th>status IMT</th>
                                    <th>Aksi</th>
                                </tr>
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
                <h4 id="modal-tambah" class="modal-title">Tambah Data Posyandu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{Route('dataposyandu.store')}}" method="POST">
                    @csrf
                    <div id="modal-tambah" class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nama Anak</label>
                            <div class="col-sm-8">
                                <select name="child_id" class="form-control select2" id="child_id" style="width: 100%;" required>
                                    <option value="">Pilih Nama Anak</option>
                                    @foreach ($children as $child)
                                    <option value="{{$child->id}}-{{$child->usia}}-{{ $child->jenis_kelamin }}">{{$child->nama}} - usia  {{$child->usia}} bulan </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Berat Badan</label>
                            <div class="col-sm-8">
                                <input type="number" name="berat_badan" class="form-control" step="0.01" min="0" lang="en" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Tinggi Badan</label>
                            <div class="col-sm-8">
                                <input type="number" name="tinggi_badan" class="form-control" step="0.01" min="0" lang="en" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Lingkar Kepala</label>
                            <div class="col-sm-8">
                                <input type="number" name="lingkaran_kepala" class="form-control" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Input</label>
                            <div class="col-sm-8">
                                <input type="date" name="created_at" class="form-control" value="{{date("Y-m-d");}}" required>
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
