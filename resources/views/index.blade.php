@extends('layouts.DashboardLayout')
@section('konten')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
<link href='/Calendar/fullcalendar.min.css' rel='stylesheet' />
<link href='/Calendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='/Calendar/lib/moment.min.js'></script>
<script src='/Calendar/lib/jquery.min.js'></script>
<script src='/Calendar/fullcalendar.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="/assets/js/init/fullcalendar-init.js"></script>
<style>
.modal-full {
    min-width: 100%;
    margin: 0;
}

.modal-full .modal-content {
    min-height: 100vh;
}
</style>
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="fa fa-calendar-alt"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{$jadwals}}</span></div>
                                <div class="stat-heading">Jadwal</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{$tutors}}</span></div>
                                <div class="stat-heading">tutor</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{$mapels}}</span></div>
                                <div class="stat-heading">Mata Pelajaran</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-4">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{$kelas}}</span></div>
                                <div class="stat-heading">Kelas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Orders -->
<div class="orders">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-inline">
                        <h4 class="box-title">Orders </h4>
                        
                        <button type="button" class="btn btn-primary ml-5 float-right" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-external-link-alt"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table " id="jadwal">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Kelas</th>
                                    <th>Tutor</th>
                                    <th>Mapel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jadwal_Today as $jadwal)
                                    <tr class="baris">
                                        <td> {{$jadwal->tanggal}} </td>
                                        <td> {{$jadwal->jam}} </td>
                                        <td> {{$jadwal->kelas}} </td>
                                        <td>{{$jadwal->tentor}}</td>
                                        <td>{{$jadwal->mapel}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div> <!-- /.card -->
        </div>  <!-- /.col-lg-8 -->

        <div class="col-xl-4">
                <div class="col-lg-6 col-xl-12">
                    <div class="card br-0">
                        <div class="card-body">
                            <div class="calender-cont widget-calender">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>

                <div class="row">
                        <div class="col-lg-6 col-xl-12">
                            <div class="card br-0">
                                <div class="card-body">
                                    <div class="chart-container ov-h">
                                        <div id="flotPie1" class="float-chart"></div>
                                    </div>
                                </div>
                            </div><!-- /.card -->
                </div>
            </div>
        </div> <!-- /.col-md-4 -->
    </div>
    {{-- <div class="modal fade none-border fullscreen" id="event-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Add New Event</strong></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-full ml-2" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Jadwal Bimbel Platinum</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table " id="jadwal-modal">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Kelas</th>
                                        <th>Tutor</th>
                                        <th>Mapel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jadwal_Today as $jadwal)
                                        <tr class="baris">
                                            <td> {{$jadwal->tanggal}} </td>
                                            <td> {{$jadwal->jam}} </td>
                                            <td> {{$jadwal->kelas}} </td>
                                            <td>{{$jadwal->tentor}}</td>
                                            <td>{{$jadwal->mapel}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                    
                </div>
            </div>
        </div>
    
   
</div>
<!-- /.orders -->


<script>


      

</script>
@endsection