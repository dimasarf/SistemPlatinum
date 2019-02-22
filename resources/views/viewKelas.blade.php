@extends('layouts.DashboardLayout')
@section('konten')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<div class="animated fadeIn">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar tutor </h4>
                        <input type="hidden" name="" id="idKelas">
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="avatar">Mapel</th>
                                        <th class="avatar">Jumlah Murid</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kelas as $kela)
                                        <tr>     
                                            <td class="id">{{$kela->id}}</td>
                                            <td class="mapel"> {{$kela->kelas}} </td>
                                            <td class="mapel"> {{$kela->jumlahMurid}} </td>
                                            <td class="mr-4">
                                                <button type="button" class="btn btn-warning btn-sm btn-jadwal" data-toggle="modal" data-target="#exampleModal"> Lihat jadwal </button>
                                                <form action="/kelas-hapus/{{$kela->id}}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn btn-danger btn-sm btn-hapus-kelas mt-1"> Hapus </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>

                            <div class="col-lg-4">
                                <div class="col text-center">
                                    {{ $kelas->links() }}
                                </div>
                            </div>
                            
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>
            <div class="col-lg-7">
                    <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Jadwal</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table " id="jadwalKelas">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Tanggal</th>
                                                <th class="avatar">Jam</th>
                                                <th>Tutor</th>
                                                <th>mapel</th>
                                                <th>Aksi</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>                                       
                                                <td></td>
                                                <td></td>
                                                <td> #5469 </td>
                                                <td>  <span class="name">Louis Stanley</span> </td>
                                                <td> <span class="product">iMax</span> </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#exampleModal"> Edit </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-hapus mt-1"> Hapus </button>
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    $(document).on('click','.btn-jadwal', function(){
        var id = $(this).closest('tr').find('.id').text();
        var tentor = $(this).closest('tr').find('.mapel').text();
        $('#idKelas').val(id);
        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: '/jadwal-kelas/' + id,
            success : function (data) {
                
              $(".baris").remove();
              var elements = ["id", "tanggal", "jam", "tentor", "mapel",''];
              var elements2 = ["id", "tanggal", "jam", "tentor", "mapel",''];
              for (var i = 0; i < data.length; i++) 
              {
                var td, tdAksi;
                var tr=document.createElement('tr');
                tr.className = "baris";
                for (var j=0; j < 5; ++j){
                  td = document.createElement('td');
                  td.innerHTML=data[i][elements[j]];
                  td.className = elements2[j];
                  tdAksi = document.createElement('td');
                  tdAksi.innerHTML = '<a class="btn btn-warning btn-sm btn-edit-jadwal" data-toggle="modal" data-target="#exampleModal"> Edit </a>' +
                                                    '<button type="button" class="btn btn-danger btn-sm btn-hapus-jadwal mt-1" data-token="{{ csrf_token() }}"> Hapus </button>';
                  tr.appendChild(td);                  
                  console.log(data[i][elements[j]]);
                }               
                tr.appendChild(tdAksi);
                $('#jadwalKelas').append(tr);
              }
            
            }
          });
    });

    $(document).on('click', '.btn-edit-jadwal', function()
    {
        var id = $(this).closest('tr').find('.id').text();
        window.location.href = "/jadwal-edit/"+id;
    })

    $(document).on('click', '.btn-hapus-kelas', function(e) {
        e.preventDefault() 
        if (confirm('Are you sure?')) {
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });

    $(document).on('click', '.btn-hapus-jadwal', function()
    {
        var id = $(this).closest('tr').find('.id').text();
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
                var idKelas = $('#idKelas').val();
                $.ajax({
                    method: 'GET',
                    dataType: 'json',
                    url: '/jadwal-kelas/' + idKelas,
                    success : function (data) {
                        // console.log(data)
                        $(".baris").remove();
                        var elements = ["id", "tanggal", "jam", "tentor", "mapel",''];
                        var elements2 = ["id", "tanggal", "jam", "tentor", "mapel",''];
                        for (var i = 0; i < data.length; i++) 
                        {
                            var td, tdAksi;
                            var tr=document.createElement('tr');
                            tr.className = "baris";
                            for (var j=0; j < 5; ++j){
                                td = document.createElement('td');
                                td.innerHTML=data[i][elements[j]];
                                td.className = elements2[j];
                                tdAksi = document.createElement('td');
                                tdAksi.innerHTML = '<button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#exampleModal"> Edit </button>' +
                                                                    '<button type="button" class="btn btn-danger btn-sm btn-hapus-jadwal mt-1" data-token="{{ csrf_token() }}"> Hapus </button>';
                                tr.appendChild(td);                  
                                console.log(data[i][elements[j]]);
                            }               
                                tr.appendChild(tdAksi);
                                $('#jadwalKelas').append(tr);
                        }
                    }
                 });
            }
        });
    });
</script>
@endsection