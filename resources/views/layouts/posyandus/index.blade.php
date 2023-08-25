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
                                    <th>Jenis Kelamin</th>
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
                                    <td class="align-middle">{{$posyandu->berat_badan}}</td>
                                    <td class="align-middle">{{$posyandu->tinggi_badan}} m</td>
                                    <td class="align-middle">{{$posyandu->lingkaran_kepala}}</td>
                                    <td class="align-middle">{{$posyandu->status_gizi}}</td>
                                    <td class="align-middle">{{$posyandu->bmi}}</td>
                                    
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal{{$posyandu->id}}">Edit</a> | |
                                        <form class="d-inline" action="{{route('dataposyandu.destroy',$posyandu->id)}}" method="POST" onsubmit="return confirm('delete data ?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-danger">Hapus</button>
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
                                                            <select name="child_id" class="form-control select2" id="child_id" style="width: 100%;">
                                                                <option value="0">Pilih Nama Anak</option>
                                                                @foreach ($children as $child)
                                                                <option @selected($child->id == $posyandu->child_id) value="{{ $child->id }}-{{ $child->usia }}-{{ $child->jenis_kelamin }} " required>{{ $child->nama }} -  usia {{ $child->usia }}</option>
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

                                                    {{-- <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Status</label>
                                                        <div class="col-sm-8">
                                                            <select name="status" class="form-control select2" id="" style="width: 100%;" required>
                                                                <option value="">Pilih Status</option>
                                                                <option value="N" {{ $posyandu->status =='N' ? 'selected' : '' }}>Naik</option>
                                                                <option value="B" {{ $posyandu->status =='B' ? 'selected' : '' }}>Baru</option>
                                                                <option value="T" {{ $posyandu->status =='T' ? 'selected' : '' }}>Turun</option>
                                                                <option value="TP" {{ $posyandu->status =='TP' ? 'selected' : '' }}>Tetap</option>
                                                                <option value="O" {{ $posyandu->status =='O' ? 'selected' : '' }}>Bulan Lalu Tidak Hadir</option>
                                                            </select>
                                                        </div>
                                                    </div> --}}

                                                    {{-- <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Status Gizi</label>
                                                        <div class="col-sm-8">
                                                            <select name="status_gizi" class="form-control select2" style="width: 100%;" required>
                                                                <option value="">Pilih Status Gizi</option>
                                                                <option value="O" {{ $posyandu->status_gizi =='O' ? 'selected' : '' }}>Baik</option>
                                                                <option value="K" {{ $posyandu->status_gizi =='K' ? 'selected' : '' }}>Cukup</option>
                                                                <option value="H" {{ $posyandu->status_gizi =='H' ? 'selected' : '' }}>Sangat Bagus</option>
                                                                <option value="BKM" {{ $posyandu->status_gizi =='BKM' ? 'selected' : '' }}>Sangat Kurang / Gizi Buruk</option>
                                                            </select>
                                                        </div>
                                                    </div> --}}

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Input</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" name="updated_at" class="form-control" value='{{$posyandu->updated_at}}' required>
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
                                    <th>Jenis Kelamin</th>
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
                                <select name="child_id" class="form-control select2" id="child_id" style="width: 100%;">
                                    <option value="0">Pilih Nama Anak</option>
                                    @foreach ($children as $child)
                                    <option value="{{$child->id}}-{{$child->usia}}-{{ $child->jenis_kelamin }}">{{$child->nama}} - usia  {{$child->usia}} bulan </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Berat Badan</label>
                            <div class="col-sm-8">
                                <input type="number" name="berat_badan" class="form-control" step="0.01" min="0" lang="en">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Tinggi Badan</label>
                            <div class="col-sm-8">
                                <input type="number" name="tinggi_badan" class="form-control" step="0.01" min="0" lang="en">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Lingkar Kepala</label>
                            <div class="col-sm-8">
                                <input type="number" name="lingkaran_kepala" class="form-control">
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select name="status" class="form-control select2" id="" style="width: 100%;" required>
                                    <option value="">Pilih Status</option>
                                    <option value="N">Naik</option>
                                    <option value="B">Baru</option>
                                    <option value="T">Turun</option>
                                    <option value="TP">Tetap</option>
                                    <option value="O">Bulan Lalu Tidak Hadir</option>
                                </select>
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Status Gizi</label>
                            <div class="col-sm-8">
                                <select name="status_gizi" class="form-control select2" style="width: 100%;" required>
                                    <option value="">Pilih Status Gizi</option>
                                    <option value="O">Baik</option>
                                    <option value="K">Cukup</option>
                                    <option value="H">Sangat Bagus</option>
                                    <option value="BKM">Sangat Kurang / Gizi Buruk</option>
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Input</label>
                            <div class="col-sm-8">
                                <input type="date" name="created_at" class="form-control" required>
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
