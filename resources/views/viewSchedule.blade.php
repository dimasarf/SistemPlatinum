@extends('layouts.DashboardLayout')
@section('konten')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<div class="animated fadeIn">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 mx-auto col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>Cari Berdasarkan Tanggal</strong> 
                </div>
                <div class="card-body card-block">
                    <form action="/jadwal-cari" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class=" form-control-label">Tanggal</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="far fa-calendar-alt"></i></div>
                                <input class="form-control" type="date" name="tanggal" id="tanggal">
                            </div>                                            
                        </div>
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary btnTambah"><i class="fas fa-search"></i>&nbsp; Cari</button>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Orders -->
    @if(!empty($jadwals))    
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Jadwal </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table " id="jadwal">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="serial">ID</th>
                                            <th class="serial">Tanggal</th>
                                            <th class="avatar">Jam</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Tutor</th>
                                            <th>Kelas</th>
                                            <th class="mr-4">Aksi</th>
                                            {{-- <th>Quantity</th>
                                            <th>Status</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jadwals as $jadwal)                                            
                                            <tr class="text-center baris">
                                                <td class="id"> {{$jadwal->id}} </td>
                                                <td class="serial tanggal">{{$jadwal->tanggal}}</td>
                                                <td class="jam"> <span class="name">{{$jadwal->jam}}</span> </td>
                                                <td class="mapel"> {{$jadwal->mapel}} </td>
                                                <td class="tentor">  <span class="name">{{$jadwal->tentor}}</span> </td>
                                                <td class="kelas"> <span class="product">{{$jadwal->kelas}}</span> </td>
                                                {{-- <td><span class="count">231</span></td>
                                                <td>
                                                    <span class="badge badge-complete">Complete</span>
                                                </td> --}}
                                                <td> 
                                                    <a href="/jadwal-edit/{{$jadwal->id}}" class="btn btn-warning btn-sm btn-edit"> Edit </a>
                                                    <button type="button" class="btn btn-danger btn-sm btn-hapus" data-token="{{ csrf_token() }}"> Hapus </button>
                                                </td>
                                            </tr>                                         
                                        @endforeach                                   
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div> <!-- /.card -->
                </div>  <!-- /.col-lg-8 -->

                
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
                        <input type="hidden" name="" id="idJadwal">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <form action="">
                                <div class="form-group">
                                    <label class=" form-control-label">Jam</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-clock"></i></div>
                                        <select class="custom-select option-jam" id="option-jam">
                                            <option value="17.00 - 18.30" selected id="jam-selected">17.00 - 18.30</option>
                                            <option value="17.00 - 18.30" >17.00 - 18.30</option>
                                            <option value="18.30 - 20.00">18.30 - 20.00</option>
                                            <option value="20.30 - 22.00">20.00 - 21.30</option>
                                        </select>
                                    </div>                                            
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Kelas</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-users"></i></div>
                                        <select class="custom-select option-kelas" id="option-kelas">
                                            <option value="" id="kelas-selected">Tes</option>
                                            @foreach($kelas as $kela)
                                                <option value="{{$kela->id}}">{{$kela->kelas}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                            
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Pelajaran</label>
                                    <div class="input-group">
                                        <div class="input-group-addon option-pelajaran"><i class="fas fa-book"></i></div>
                                        <select class="custom-select" id="option-pelajaran">
                                            <option value="" id="mapel-selected">Tes</option>
                                            @foreach($mapels as $mapel)
                                                <option value="{{$mapel->id}}">{{$mapel->mapel}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                            
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Tutor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon option-tentor"><i class="fas fa-chalkboard-teacher"></i></div>
                                        <select class="custom-select" id="option-tentor">
                                            <option value="" id="tentor-selected">TES</option>
                                            @foreach($tentors as $tentor)
                                                <option value="{{$tentor->id}}">{{$tentor->tentor}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col text-center">
                                    <button type="button" class="btn btn-primary btn-simpan-edit" id="" data-dismiss="modal" aria-label="Close"><i class="far fa-save"></i>&nbsp; Simpan</button>
                                </div>
                            </form>
                    </div>                    
                </div>
            </div>
        </div>
    @endif
    <!-- /.orders -->    
    <!-- Calender Chart Weather  -->
    {{-- <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="box-title">Chandler</h4> -->
                    <div class="calender-cont widget-calender">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div><!-- /.card -->
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card ov-h">
                <div class="card-body bg-flat-color-2">
                    <div id="flotBarChart" class="float-chart ml-4 mr-4"></div>
                </div>
                <div id="cellPaiChart" class="float-chart"></div>
            </div><!-- /.card -->
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card weather-box">
                <h4 class="weather-title box-title">Weather</h4>
                <div class="card-body">
                    <div class="weather-widget">
                        <div id="weather-one" class="weather-one"></div>
                    </div>
                </div>
            </div><!-- /.card -->
        </div>
    </div> --}}       
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script> 
    $(document).on('click','.btn-edit', function(){
        var jam = $(this).closest('tr').find('.jam').text();
        var tanggal = $(this).closest('tr').find('.tanggal').text();
        var mapel = $(this).closest('tr').find('.mapel').text();
        var tentor = $(this).closest('tr').find('.tentor').text();
        var kelas = $(this).closest('tr').find('.kelas').text();
        var id = $(this).closest('tr').find('.id').text();

        $("#idJadwal").val(id);

        $("#jam-selected").val(jam);
        $("#jam-selected").html(jam);
        

        $("#kelas-selected").val(kelas);
        $("#kelas-selected").html(kelas);
        

        $("#mapel-selected").val(mapel);
        $("#mapel-selected").html(mapel);
        

        $("#tentor-selected").val(kelas);
        $("#tentor-selected").html(kelas);
        
    });

    $(document).on('click', '.btn-simpan-edit', function()
    {
        var jam_selected = $("#jam-selected").val();
        var kelas_selected = $("#kelas-selected").val();
        var mapel_selected = $("#mapel-selected").val();
        var tentor_selected = $("#tentor-selected").val();
        var id = $("#idJadwal").val();
        
        
    })

    $(document).on('click','.btn-hapus', function(){
        var id = $(this).closest('tr').find('.id').text();
        var tanggal = $(this).closest('tr').find('.tanggal').text();
        var token = $(this).data("token");
        $.ajax({
            url: "/jadwal-hapus/"+id,
            type: 'DELETE',
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": token,
            },
            success: function ()
            {
                $(".baris").remove();
                var elements = ["id", "tanggal", "jam", "mapel", "tentor","kelas",''];
                var elements2 = ["id", "tanggal", "jam", "mapel", "tentor","kelas",''];
                $.ajax({
                    method: 'GET',
                    dataType: 'json',
                    url: '/jadwal-get/'+tanggal,
                    success : function (data) {
                        console.log(data);
                        for (var i = 0; i < data.length; i++) 
                        {
                            var td, tdAksi;
                            var tr=document.createElement('tr');
                            tr.className = "baris";
                            for (var j=0; j < 6; ++j){
                                td = document.createElement('td');
                                td.innerHTML=data[i][elements[j]];
                                td.className = elements2[j];
                                tdAksi = document.createElement('td');
                                tdAksi.innerHTML = '<button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#exampleModal"> Edit </button>'+
                                                    '<button type="button" class="btn btn-danger btn-sm btn-hapus" data-token="{{ csrf_token() }}"> Hapus </button>';
                                tr.appendChild(td);                  
                                console.log(data[i][elements[j]]);
                            }
                            tr.appendChild(tdAksi);
                            $('#jadwal').append(tr);
                        }
                    }
                });
            }
        });

    });
</script>
@endsection