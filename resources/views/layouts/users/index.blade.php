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
                    
                    <!-- /.card-header -->
                    
                        <div class="card card">
                            <div class="card-header">
                              <h3 class="card-title">Pengaturan Akun</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="{{route('akun.update',$users->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                              <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">username</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="inputtext3" name='name' placeholder="name" value="{{$users->name}}">
                                    </div>
                                  </div>
                                <div class="form-group row">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                  <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" name='email' placeholder="Email" value="{{$users->email}}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" name='password' placeholder="Password" value="">
                                  </div>
                                </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Update Akun</button>
                              </div>
                              <!-- /.card-footer -->
                            </form>
                          </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>




@endsection
