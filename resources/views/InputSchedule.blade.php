@extends('layouts.DashboardLayout')
@section('konten')
<style>
    .tampil
    {
        display: block;
    }
    .sembunyi
    {
        display: none;
    }
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<div class="animated fadeIn">      
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 mx-auto col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>Masked Input</strong> <small> Small Text Mask</small>
                </div>
                <div class="card-body card-block">
                    <form action="/displayForm" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class=" form-control-label">Tanggal</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="far fa-calendar-alt"></i></div>
                                @if(!empty($tanggal))
                                    <input class="form-control" type="date" name="tanggal" id="tanggal" value="{{$tanggal}}">
                                @else
                                    <input class="form-control" type="date" name="tanggal" id="tanggal" >
                                @endif
                            </div>                                            
                        </div>
                        <div class="form-group">
                                <label class=" form-control-label">Jumlah Kelas</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fas fa-graduation-cap"></i></div>
                                    <input class="form-control" type="text" name="jmlKelas">
                                </div>                                            
                            </div>
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary btnTambah"><i class="fas fa-plus" ></i>&nbsp; Tambah</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Kelas -->
    <div class="row" id="rowKelas">
        @if(!empty($jumlah))
            @for($i = 0; $i< $jumlah; $i++)                
                <div class="col-xs-6 col-sm-6 col-lg-4 kelas" id="kelas">
                    <div class="card">
                        <div class="card-header">
                            <strong>Masked Input</strong> <small> Small Text Mask</small>
                        </div>
                        <div class="card-body card-block">
                            {{-- <form action="/save-jadwal" method="POST">
                                @csrf --}}
                                <div class="form-group">
                                    <label class=" form-control-label">Jam</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-clock"></i></div>
                                        <select class="custom-select option-jam" id="option-jam-{{$i}}">
                                            <option value="17.00 - 18.30">17.00 - 18.30</option>
                                            <option value="18.30 - 20.00">18.30 - 20.00</option>
                                            <option value="20.30 - 22.00">20.30 - 22.00</option>
                                        </select>
                                    </div>                                            
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Kelas</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-users"></i></div>
                                        <select class="custom-select option-kelas" id="option-kelas-{{$i}}">
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
                                        <select class="custom-select" id="option-pelajaran-{{$i}}">
                                            @foreach($mapels as $mapel)
                                                <option value="{{$mapel->id}}">{{$mapel->mapel}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                            
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Tentor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon option-tentor"><i class="fas fa-chalkboard-teacher"></i></div>
                                        <select class="custom-select" id="option-tentor-{{$i}}">
                                            @foreach($tentors as $tentor)
                                                <option value="{{$tentor->id}}">{{$tentor->tentor}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col text-center">
                                    <button type="button" class="btn btn-primary btn-simpan" id="{{$i}}"><i class="far fa-save"></i>&nbsp; Simpan</button>
                                </div>
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-1 sembunyi" id="berhasil-{{$i}}">
                                    Jadwal Berhasil Disimpan!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-1 sembunyi" id="gagal-{{$i}}">
                                    Tentor tidak tersedia!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                
                </div>
            @endfor
        @endif
        </div>
    <!-- Orders -->    
    {{-- <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Orders </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th class="avatar">Avatar</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="serial">1.</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td> #5469 </td>
                                        <td>  <span class="name">Louis Stanley</span> </td>
                                        <td> <span class="product">iMax</span> </td>
                                        <td><span class="count">231</span></td>
                                        <td>
                                            <span class="badge badge-complete">Complete</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="serial">2.</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="images/avatar/2.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td> #5468 </td>
                                        <td>  <span class="name">Gregory Dixon</span> </td>
                                        <td> <span class="product">iPad</span> </td>
                                        <td><span class="count">250</span></td>
                                        <td>
                                            <span class="badge badge-complete">Complete</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="serial">3.</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="images/avatar/3.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td> #5467 </td>
                                        <td>  <span class="name">Catherine Dixon</span> </td>
                                        <td> <span class="product">SSD</span> </td>
                                        <td><span class="count">250</span></td>
                                        <td>
                                            <span class="badge badge-complete">Complete</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="serial">4.</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="images/avatar/4.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td> #5466 </td>
                                        <td>  <span class="name">Mary Silva</span> </td>
                                        <td> <span class="product">Magic Mouse</span> </td>
                                        <td><span class="count">250</span></td>
                                        <td>
                                            <span class="badge badge-pending">Pending</span>
                                        </td>
                                    </tr>
                                    <tr class=" pb-0">
                                        <td class="serial">5.</td>
                                        <td class="avatar pb-0">
                                            <div class="round-img">
                                                <a href="#"><img class="rounded-circle" src="images/avatar/6.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td> #5465 </td>
                                        <td>  <span class="name">Johnny Stephens</span> </td>
                                        <td> <span class="product">Monitor</span> </td>
                                        <td><span class="count">250</span></td>
                                        <td>
                                            <span class="badge badge-complete">Complete</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->

            
        </div>
    </div> --}}
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
    <!-- /Calender Chart Weather -->
    <!-- Modal - Calendar - Add New Event -->
    {{-- <div class="modal fade none-border" id="event-modal">
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
    <!-- /#event-modal -->
    <!-- Modal - Calendar - Add Category -->
    {{-- <div class="modal fade none-border" id="add-category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><strong>Add a category </strong></h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label">Category Name</label>
                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Choose Category Color</label>
                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                    <option value="success">Success</option>
                                    <option value="danger">Danger</option>
                                    <option value="info">Info</option>
                                    <option value="pink">Pink</option>
                                    <option value="primary">Primary</option>
                                    <option value="warning">Warning</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div> --}}
<!-- /#add-category -->
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".btnTambah").click(function(){
            // var form = document.getElementsByClassName('kelas');
            // alert("tes");
        });
        $(".btn-simpan").on('click',function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('konten')
                }
            });
            var id = this.id;
            var jam = $('#option-jam-'+id).find(":selected").text();
            var kelas = $('#option-kelas-'+id).val();
            var mapel = $('#option-pelajaran-'+id).val();
            var tentor = $('#option-tentor-'+id).val();
            var tanggal = $('#tanggal').val();
            $.ajax({
                    /* the route pointing to the post function */
                    url: '/save-jadwal',
                    type: 'GET',
                    /* send the csrf-token and the input to the controller */
                    data: {tentor : tentor, jam : jam, kelas : kelas, mapel : mapel, tanggal : tanggal},                    
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        $('#berhasil-'+id).removeClass('sembunyi');
                        $('#berhasil-'+id).addClass('tampil');
                        $('#'+id).removeClass('btn-primary');
                    },
                    error: function (data) {
                        $('#gagal-'+id).removeClass('sembunyi');
                        $('#gagal-'+id).addClass('tampil');
                        console.log(data);
                    }
            });
        });
    });
    
</script>
@endsection