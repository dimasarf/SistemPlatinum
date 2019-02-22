@extends('layouts.DashboardLayout')
@section('konten')


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
                            <table class="table" id="tutor">
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
                                        <tr class="baris-tutor">     
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
                                                <form action="/tutor-hapus/{{$tutor->id}}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn btn-danger btn-sm btn-hapus-tutor mt-1" > Hapus </button>
                                                </form>
                                                
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
                                <h4 class="box-title" id="nama">Jadwal Tutor </h4>
                                <div class="form-inline">
                                    <input class="form-control" type="date" id="tanggal">
                                    <button class="btn btn-primary ml-4" id="btnSortir">Sortir</button>
                                    <button type="submit" id="btn-export" class="btn btn-success ml-4">Export to PDF</button>
                                    <input type="hidden" name="" id="idTutor">
                                    <input type="hidden" name="" id="namaTutor">
                                </div>
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
                                    <div class="col text-center">
                                        
                                    </div>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                        
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/jquery.dataTables.css" integrity="sha256-rfdVKxryktsNgqIt1/gXp6UEov0OUXAcZ4hJ9emFy7k=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.js" integrity="sha256-BFIKaFl5uYR8kP6wcRxaAqJpfZfC424TBccBBVjVzuY=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script> --}}
<script src="https://unpkg.com/jspdf"></script>
<script src="https://unpkg.com/jspdf-autotable"></script>
<script>
    $(document).on('click','.btn-jadwal', function(){
        var id = $(this).closest('tr').find('.id').text();
        var tentor = $(this).closest('tr').find('.tentor').text();
        var tglGabung = $(this).closest('tr').find('.tglGabung').text();
        $('#namaTutor').val(tentor);
        $('#idTutor').val(id);
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
                  tdAksi.innerHTML = '<a class="btn btn-warning btn-sm btn-edit-jadwal" data-toggle="modal" data-target="#exampleModal"> Edit </a>' +
                                                    '<button type="button" class="btn btn-danger btn-sm btn-hapus-jadwal mt-1" data-token="{{ csrf_token() }}"> Hapus </button>';
                  tr.appendChild(td);                  
                //   console.log(data[i][elements[j]]);
                }               
                tr.appendChild(tdAksi);
                $('.btn-edit-jadwal').attr("href", "http://www.google.com/")
                $('#jadwalTutor').append(tr);
              }
            
            }
          });
    });

    $(document).on('click', '.btn-edit-jadwal', function()
    {
        var id = $(this).closest('tr').find('.id').text();
        window.location.href = "/jadwal-edit/"+id;
    })

    $('#btn-export').click(function()
    {
        var doc = new jsPDF();
        var nama = $('#namaTutor').val()
        var tanggal = $('#tanggal').val()
        doc.autoTable({html: '#jadwalTutor'});
        doc.save('Jadwal-'+nama+'-'+tanggal+'.pdf');
    });
    $('#btnSortir').click(function()
    {
        var id = $('#idTutor').val();
        var tanggal = $('#tanggal').val()
        console.log(tanggal);
        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: '/jadwal-tutor/' + id +'/minggu/'+tanggal,
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
                                                    '<button type="button" class="btn btn-danger btn-sm btn-hapus-jadwal mt-1" data-token="{{ csrf_token() }}"> Hapus </button>';
                  tr.appendChild(td);                  
                  
                }               
                tr.appendChild(tdAksi);
                $('#jadwalTutor').append(tr);
                
              }
            
            }
          });
         
    });
    $(document).on('click', '.btn-hapus-tutor', function(e) {
        e.preventDefault() 
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });

    $(document).on('click', '.btn-hapus-jadwal', function()
    {
        var id = $(this).closest('tr').find('.id').text();
        // alert(id);
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
                var idTutor = $('#idTutor').val();
                $.ajax({
                    method: 'GET',
                    dataType: 'json',
                    url: '/jadwal-tutor/' + idTutor,
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
                                                                    '<button type="button" class="btn btn-danger btn-sm btn-hapus-jadwal mt-1" data-token="{{ csrf_token() }}"> Hapus </button>';
                                tr.appendChild(td);                  
                                console.log(data[i][elements[j]]);
                            }               
                                tr.appendChild(tdAksi);
                                $('#jadwalTutor').append(tr);
                        }
                    }
                 });
            }
        });
    });
</script>
@endsection