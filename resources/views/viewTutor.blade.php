@extends('layouts.DashboardLayout')
@section('konten')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<div class="animated fadeIn">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar tutor </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="avatar">Avatar</th>
                                        <th>Nama</th>
                                        <th>Tanggal Bergabung</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tentors as $tutor)
                                        <tr>     
                                            <td class="id">{{$tutor->id}}</td>                                  
                                            <td class="avatar">
                                                <div class="round-img">
                                                    <a href="#"><img class="rounded-circle" src="/images/teacher.png" alt=""></a>
                                                </div>
                                            </td>
                                            <td class="tentor"> {{$tutor->tentor}} </td>
                                            <td class="tglGabung">  {{$tutor->tglGabung}} </td>                                        
                                            <td class="mr-4">
                                                <button type="button" class="btn btn-warning btn-sm btn-jadwal" data-toggle="modal" data-target="#exampleModal"> Lihat jadwal </button>
                                                <button type="button" class="btn btn-danger btn-sm btn-hapus mt-1"> Hapus </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>

                            <div class="col-lg-4">
                                <div class="col text-center">
                                    {{ $tentors->links() }}
                                </div>
                            </div>
                            
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>
            <div class="col-lg-6">
                    <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Jadwal Tutor </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table " id="jadwalTutor">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Tanggal</th>
                                                <th class="avatar">Jam</th>
                                                <th>Mapel</th>
                                                <th>Kelas</th>
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
        var tentor = $(this).closest('tr').find('.tentor').text();
        var tglGabung = $(this).closest('tr').find('.tglGabung').text();
        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: '/jadwal-tutor/' + id,
            success : function (data) {
              $(".baris").remove();
              var elements = ["id", "tanggal", "jam", "mapel", "kelas",''];
              var elements2 = ["id", "tanggal", "jam", "mapel", "kelas",''];
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
                                                    '<button type="button" class="btn btn-danger btn-sm btn-hapus mt-1"> Hapus </button>';
                  tr.appendChild(td);                  
                  console.log(data[i][elements[j]]);
                }               
                tr.appendChild(tdAksi);
                $('#jadwalTutor').append(tr);
              }
            
            }
          });
    });
</script>
@endsection