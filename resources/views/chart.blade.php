
            <!-- /.card -->
 @extends('master_app.app')
@section('title', ' Data Grafik')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1>Data Anak</h1>/ --}}
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
        
        {{-- {{dd($monthsCount)}} --}}
        {{-- {{dd($months)}} --}}
         

       <div class="card">
        
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Data Grafik</h3>
                  {{-- <a href="javascript:void(0);">View Report</a> --}}
                </div>
              </div>
              <div class="card-body">
                <form class="form-horizontal" action="chart" method="POST">
                    @csrf
       <div class="form-group row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-3">
                            <select name="tahun" class="form-control select2" id='tahun' style="width: 100%;" required>
                                    <option value="">Pilih Tahun</option>
                                    @if(isset($tahun))
                                      <option value="2023" {{ $tahun == 2023 ? 'selected' : '' }}> 2023 </option>
                                    <option value="2024" {{ $tahun == 2024 ? 'selected' : '' }}> 2024 </option>
                                    <option value="2025" {{ $tahun == 2025 ? 'selected' : '' }}> 2025 </option>
                                    @else
                                    <option value="2023"> 2023 </option>
                                    <option value="2024"> 2024 </option>
                                    <option value="2025"> 2025 </option>
                                      
                                    @endif
                                    
                                    
                                    
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select name="bulan" class="form-control select2" id='bulan' style="width: 100%;" required>
                                    <option value="">Pilih Bulan</option>
                                    @if(isset($bulan))
                                      <option value="01" {{ $bulan == '01' ? 'selected' : '' }} >Januari</option>
                                    <option value="02" {{ $bulan == '02' ? 'selected' : '' }} >Februari</option>
                                    <option value="03" {{ $bulan == '03' ? 'selected' : '' }} >Maret</option>
                                    <option value="04" {{ $bulan == '04' ? 'selected' : '' }} >April</option>
                                    <option value="05" {{ $bulan == '05' ? 'selected' : '' }} >Mei</option>
                                    <option value="06" {{ $bulan == '06' ? 'selected' : '' }}>Juni</option>
                                    <option value="07" {{ $bulan == '07' ? 'selected' : '' }} >Juli</option>
                                    <option value="08" {{ $bulan == '08' ? 'selected' : '' }} >Agustus</option>
                                    <option value="09" {{ $bulan == '09' ? 'selected' : '' }} >September</option>
                                    <option value="10" {{ $bulan == '10' ? 'selected' : '' }} >Oktober</option>
                                    <option value="11" {{ $bulan == '11' ? 'selected' : '' }} >November</option>
                                    <option value="12" {{ $bulan == '12' ? 'selected' : '' }} >Desember</option>
                                    @else
                                      <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                    @endif
                                    
                                    
                                </select>
                                
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-info">Lihat</button>
                            </div>
                            </div>
                            
                </form>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                  @if(isset($bulan))
                    <i class="fas fa-square text-primary"></i> Bulan {{$bulan}} Tahun {{$tahun}}
                    
                  @else
                    <i class="fas fa-square text-primary"></i> Bulan 0 Tahun 0
                    
                  @endif
                  </span>

                  {{-- <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span> --}}

                  
                </div>
              </div>
            </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->



<script type='text/javascript'>
  var _ydata = {!! json_encode($labels) !!}
  var _xdata = {!! json_encode($data) !!}

</script>






@endsection
