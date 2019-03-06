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
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="/table/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/table/css/util.css">
	<link rel="stylesheet" type="text/css" href="/table/css/main.css">
<!--===============================================================================================-->
<style>
.font-tabel
{
    color: #ecf0f1;
    font-weight: 500;
}
.header-jadwal
{
    background: #f1c40f;
}
.row-jadwal
{
    background: #292f54;
}
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
                        <h4 class="box-title">Jadwal Hari Ini </h4>
                        
                        <button type="button" class="btn btn-primary ml-5 float-right" data-toggle="modal" data-target="#exampleModal" id="full">
                            <i class="fas fa-external-link-alt"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body--">
                    <div class="d">
                        <div >
                            <div class="table100 ver1 m-b-110 ">
                                <div id="jadwal-index">
                                <div class="table100-head" >
                                    <table>
                                        <thead>
                                            <tr class="row100 head">
                                                <th class="cell100 column1 ">Tanggal</th>
                                                <th class="cell100 column2 ">Jam</th>
                                                <th class="cell100 column3 ">Kelas</th>
                                                <th class="cell100 column4 ">Tutor</th>
                                                <th class="cell100 column5 ">Mapel</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
            
                                <div class="table100-body row-jadwal ">
                                    <table id="jadwal">
                                        <tbody id="body-modal">
                                            <div >
                                            @foreach($jadwal_Today as $jadwal)
                                                <tr class="row100 body baris" id="baris-modal">
                                                    <td class="cell100 column1"><p class="font-tabel">{{$jadwal->tanggal}}</p> </td>
                                                    <td class="cell100 column2"><p class="font-tabel">{{$jadwal->jam}}</p> </td>
                                                    <td class="cell100 column3"><p class="font-tabel">{{$jadwal->kelas}}</p> </td>
                                                    <td class="cell100 column4"><p class="font-tabel">{{$jadwal->tentor}}</p> </td>
                                                    <td class="cell100 column5"><p class="font-tabel">{{$jadwal->mapel}}</p> </td>
                                                </tr>
                                            @endforeach
                                            </div>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                        {{-- <table class="table " id="jadwal">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Kelas</th>
                                    <th>Tutor</th>
                                    <th>Mapel</th>
                                </tr>
                            </thead>
                            <tbody id="body-index">
                                <div >
                                @foreach($jadwal_Today as $jadwal)
                                    <tr class="baris" id="baris-index">
                                        <td> {{$jadwal->tanggal}} </td>
                                        <td> {{$jadwal->jam}} </td>
                                        <td> {{$jadwal->kelas}} </td>
                                        <td>{{$jadwal->tentor}}</td>
                                        <td>{{$jadwal->mapel}}</td>
                                    </tr>
                                @endforeach
                                </div>
                            </tbody>
                        </table> --}}
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
        </div> <!-- /.col-md-4 -->
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Jumlah Siswa </h4>
                    <div class="form-inline">
                        <input type="text" class="form-control col-lg-4" placeholder="ketik tahun" id="tahun">
                        <button class="btn btn-success ml-3 btn-sortir">Sortir</button>
                    </div>
                    <canvas id="singelBarChart"></canvas>
                </div>
            </div>
        </div><!-- /# column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Jumlah Siswa</div>
                            <div class="stat-digit">{{$jumlahSiswa}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Persentase Rencana SMP </h4>
                    <canvas id="doughutChart1"></canvas>
                </div>
            </div>
        </div><!-- /# column -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Persentase Rencana SMA </h4>
                    <canvas id="doughutChart2"></canvas>
                </div>
            </div>
        </div><!-- /# column -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Persentase Rencana SMK </h4>
                    <canvas id="doughutChart3"></canvas>
                </div>
            </div>
        </div><!-- /# column -->
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
                        <img src="/logo.jpg" alt="" srcset="" height="100px" width="100px">
                      <h3 class="modal-title ml-4" id="exampleModalLabel">Jadwal Hari Ini</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" id="body-modal">
                        {{-- <div class="table-stats order-table ov-h">
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
                        </div>  --}}
                        {{-- <div id="jadwal-modal"> --}}
                            <div class="table100 ver1 m-b-110 " >
                                <div id="jadwal-modal">
                                {{-- <div class="table100-head" > --}}
                                    {{-- <table>
                                        <thead>
                                            <tr class="row100 head">
                                                <th class="cell100 column1 ">Tanggal</th>
                                                <th class="cell100 column2 ">Jam</th>
                                                <th class="cell100 column3 ">Kelas</th>
                                                <th class="cell100 column4 ">Tutor</th>
                                                <th class="cell100 column5 ">Mapel</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
            
                                <div class="table100-body row-jadwal ">
                                    <table>
                                        <tbody id="body-modal">
                                            <div >
                                            @foreach($jadwal_Today as $jadwal)
                                                <tr class="row100 body" id="baris-modal">
                                                    <td class="cell100 column1"><p class="font-tabel">{{$jadwal->tanggal}}</p> </td>
                                                    <td class="cell100 column2"><p class="font-tabel">{{$jadwal->jam}}</p> </td>
                                                    <td class="cell100 column3"><p class="font-tabel">{{$jadwal->kelas}}</p> </td>
                                                    <td class="cell100 column4"><p class="font-tabel">{{$jadwal->tentor}}</p> </td>
                                                    <td class="cell100 column5"><p class="font-tabel">{{$jadwal->mapel}}</p> </td>
                                                </tr>
                                            @endforeach
                                            </div>
                                        </tbody>
                                    </table> --}}
                                {{-- </div> --}}
                                </div>
                            </div>
                        {{-- </div> --}}
                    </div>
                    
                </div>
            </div>
        </div>
    
   
</div>
<!-- /.orders -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>

{{-- <script src="/assets/js/main.js"></script> --}}
<!--  Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
<script src="assets/js/init/chartjs-init.js"></script>
<!--Flot Chart-->
<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
$('#full').click(function()
{
    $('#jadwal-index').clone().appendTo('#jadwal-modal');
})
var jumlahSMP = @json($jumlahSMP);
var jumlahSMA = @json($jumlahSMA);
var jumlahSMK = @json($jumlahSMK);

var rencanaSMA = @json($rencanaSMA);
var rencanaSMK = @json($rencanaSMK);
var rencanaSMP = @json($rencanaSMP);

var labelSmp = []
var dataSmp = []

for(j = 0;j<rencanaSMP.length; j++ )
{
    labelSmp.push(rencanaSMP[j].rencana)
    dataSmp.push(rencanaSMP[j].jumlah)
}

var labelSma = []
var dataSma = []

for(i = 0;i<rencanaSMA.length; i++ )
{
    labelSma.push(rencanaSMA[i].rencana)
    dataSma.push(rencanaSMA[i].jumlah)
}

var labelSmk = []
var dataSmk = []

for(i = 0;i<rencanaSMK.length; i++ )
{
    labelSmk.push(rencanaSMK[i].rencana)
    dataSmk.push(rencanaSMK[i].jumlah)
}

console.log(labelSma)


    var ctx = document.getElementById( "singelBarChart" );

    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [ "SMP", "SMA", "SMK" ],
            datasets: [
                {
                    label: "Jumlah Siswa",
                    data: [ jumlahSMP, jumlahSMA, jumlahSMK ],
                    borderColor: [
                                        "rgb(3,161,164)",
                                        "rgb(238,149,36)",
                                        "rgb(239,48,120)",
                                    ],
                    borderWidth: "0",
                    backgroundColor: [
                                        "rgb(3,161,164)",
                                        "rgb(238,149,36)",
                                        "rgb(239,48,120)",
                                    ]
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );
    var ctx = document.getElementById( "doughutChart1" );
    ctx.height = 150;
    
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: dataSmp,
                backgroundColor: [
                                    "rgb(3,161,164)",
                                    "rgb(238,149,36)",
                                    "rgb(239,48,120)",
                                ],
                hoverBackgroundColor: [
                                    "rgba(0, 194, 146,0.9)",
                                    "rgba(0, 194, 146,0.7)",
                                    "rgba(0, 194, 146,0.5)",
                                ]

                            } ],
            labels: labelSmp
        },
        options: {
            responsive: true
        }
    } );

    var ctx = document.getElementById( "doughutChart2" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: dataSma,
                backgroundColor: [
                                    "rgb(3,161,164)",
                                    "rgb(238,149,36)",
                                    "rgb(239,48,120)",
                                    "rgb(28,124,187)",
                                    "rgb(28,120,183)"
                                ],
                hoverBackgroundColor: [
                                    "rgb(3,161,164)",
                                    "rgb(238,149,36)",
                                    "rgb(239,48,120)",
                                    "rgb(28,124,187)",
                                    "rgb(28,120,183)"
                                ]

                            } ],
            labels: labelSma
        },
        options: {
            responsive: true
        }
    } );

    var ctx = document.getElementById( "doughutChart3" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: dataSmk,
                backgroundColor: [
                                    "rgb(3,161,164)",
                                    "rgb(238,149,36)",
                                    "rgb(239,48,120)",
                                    "rgb(28,124,187)"
                                    
                                ],
                hoverBackgroundColor: [
                                    "rgb(3,161,164)",
                                    "rgb(238,149,36)",
                                    "rgb(239,48,120)",
                                ]

                            } ],
            labels: labelSmk
        },
        options: {
            responsive: true
        }
    } );
    $('.btn-sortir').click(function()
    {
        var tahun = $('#tahun').val();
        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: '/statTahun/' + tahun,
            success : function (data) 
            {
                var rencanaSMA = data['rencanaSMA'];
                var rencanaSMK = data['rencanaSMK'];
                var rencanaSMP = data['rencanaSMP'];

                var jumlahSMA = data['jumlahSMA'];
                var jumlahSMK = data['jumlahSMK'];
                var jumlahSMP = data['jumlahSMP'];

                var labelSmp = []
                var dataSmp = []
                $('singelBarChart').remove();
                var ctx = document.getElementById( "singelBarChart" );

                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'bar',
                    data: {
                        labels: [ "SMP", "SMA", "SMK" ],
                        datasets: [
                            {
                                label: "Jumlah Siswa",
                                data: [ jumlahSMP, jumlahSMA, jumlahSMK ],
                                borderColor: [
                                                    "rgb(3,161,164)",
                                                    "rgb(238,149,36)",
                                                    "rgb(239,48,120)",
                                                ],
                                borderWidth: "0",
                                backgroundColor: [
                                                    "rgb(3,161,164)",
                                                    "rgb(238,149,36)",
                                                    "rgb(239,48,120)",
                                                ]
                                        }
                                    ]
                    },
                    options: {
                        scales: {
                            yAxes: [ {
                                ticks: {
                                    beginAtZero: true
                                }
                                            } ]
                        }
                    }
                } );

                for(j = 0;j<rencanaSMP.length; j++ )
                {
                    labelSmp.push(rencanaSMP[j].rencana)
                    dataSmp.push(rencanaSMP[j].jumlah)
                }

                var labelSma = []
                var dataSma = []

                for(i = 0;i<rencanaSMA.length; i++ )
                {
                    labelSma.push(rencanaSMA[i].rencana)
                    dataSma.push(rencanaSMA[i].jumlah)
                }

                var labelSmk = []
                var dataSmk = []

                for(i = 0;i<rencanaSMK.length; i++ )
                {
                    labelSmk.push(rencanaSMK[i].rencana)
                    dataSmk.push(rencanaSMK[i].jumlah)
                }

                var ctx = document.getElementById( "doughutChart1" );
                ctx.height = 150;
                
                var myChart = new Chart( ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [ {
                            data: dataSmp,
                            backgroundColor: [
                                                "rgb(3,161,164)",
                                                "rgb(238,149,36)",
                                                "rgb(239,48,120)",
                                            ],
                            hoverBackgroundColor: [
                                                "rgba(0, 194, 146,0.9)",
                                                "rgba(0, 194, 146,0.7)",
                                                "rgba(0, 194, 146,0.5)",
                                            ]

                                        } ],
                        labels: labelSmp
                    },
                    options: {
                        responsive: true
                    }
                } );

                var ctx = document.getElementById( "doughutChart2" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [ {
                            data: dataSma,
                            backgroundColor: [
                                                "rgb(3,161,164)",
                                                "rgb(238,149,36)",
                                                "rgb(239,48,120)",
                                                "rgb(28,124,187)",
                                                "rgb(28,120,183)"
                                            ],
                            hoverBackgroundColor: [
                                                "rgb(3,161,164)",
                                                "rgb(238,149,36)",
                                                "rgb(239,48,120)",
                                                "rgb(28,124,187)",
                                                "rgb(28,120,183)"
                                            ]

                                        } ],
                        labels: labelSma
                    },
                    options: {
                        responsive: true
                    }
                } );

                var ctx = document.getElementById( "doughutChart3" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'doughnut',
                    data: {
                        datasets: [ {
                            data: dataSmk,
                            backgroundColor: [
                                                "rgb(3,161,164)",
                                                "rgb(238,149,36)",
                                                "rgb(239,48,120)",
                                                "rgb(28,124,187)"
                                                
                                            ],
                            hoverBackgroundColor: [
                                                "rgb(3,161,164)",
                                                "rgb(238,149,36)",
                                                "rgb(239,48,120)",
                                            ]

                                        } ],
                        labels: labelSmk
                    },
                    options: {
                        responsive: true
                    }
                } );

                
            }
        })
    })
</script>
@endsection
