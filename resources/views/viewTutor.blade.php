@extends('layouts.DashboardLayout')
@section('konten')

<style>
.modal-body-save .baris
{
    background-color: #ffc43a;
}
</style>
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
                                                <button type="button" class="btn btn-warning btn-sm btn-jadwal" > Lihat jadwal </button>
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
                            <div class="card-body" id="#jadwal-tutor">
                                <h4 class="box-title" id="nama">Jadwal Tutor </h4>
                                <div class="form-inline">
                                    <input class="form-control" type="date" id="tanggal">
                                    <button class="btn btn-primary ml-4" id="btnSortir">Sortir</button>
                                    <button type="submit" id="btn-export" class="btn btn-success ml-4" data-toggle="modal" data-target="#exampleModal">Export to PDF</button>
                                    <input type="hidden" name="" id="idTutor">
                                    <input type="hidden" name="" id="namaTutor">
                                </div>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h" id="print">
                                    <table class="table " id="jadwalTutor">
                                        <thead>
                                            <tr class="header-jadwal">
                                                <th class="id">id</th>
                                                <th>Tanggal</th>
                                                <th class="avatar">Jam</th>
                                                <th>Mapel</th>
                                                <th>Kelas</th>
                                                <th class="thaksi">Aksi</th>                                                
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" id="print-final">
              <div class="modal-content " id="TES">
                <div class="modal-header">
                  <h5 class="modal-title" id="label-tutor">Jadwal </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body-save" id="body-tutor">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary btn-save">Save</button>
                </div>
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
<script type="text/javascript" src="/js/printThis.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
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
                  tdAksi.className = 'aksi';
                  tdAksi.innerHTML = '<a class="btn btn-warning btn-sm btn-edit-jadwal" data-toggle="modal" > Edit </a>' +
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
    var doc = new jsPDF();
   

    $('#btn-export').click(function()
    {
        // doc.fromHTML($('#print').html(), 20, 20, {
        //     'width': 170,
        //     'elementHandlers': specialElementHandlers
        // });
        // doc.autoTable({html: '#jadwalTutor'});
        // var nama = $('#namaTutor').val()
        // var tanggal = $('#tanggal').val()        
        // doc.save('Jadwal-'+nama+'-'+tanggal+'.pdf');
        // $("#print").printThis();
        
        $( "#body-tutor" ).empty();
        $('#print').clone().appendTo('#body-tutor');
        $('.modal-body-save .thaksi').remove();
        $('.modal-body-save .id').remove();
        $('.modal-body-save .aksi').remove();
        // $('.modal-body-save .baris').css({'background-color':'#ffc43a', 'color': '#ffffff'});
        $('#label-tutor').text('Jadwal '+$('#namaTutor').val());
    });

    $('.btn-save').click(function () {
        // divToPrint=document.getElementById("jadwalTutor");
        // newWin= window.open("");
        // newWin.document.write(divToPrint.outerHTML);
        // newWin.print();
        // newWin.close();
        // doc.autoTable({html: '.modal-body-save #jadwalTutor'});
        var nama = $('#namaTutor').val()
        var tanggal = $('#tanggal').val()        
        // doc.save('Jadwal-'+nama+'-'+tanggal+'.pdf');
        // $(".modal-content").printThis();
        // var pdf = new jsPDF("p", "mm", "a4");
        // margins = {
        //             top: 10,
        //             bottom: 10,
        //             left: 10,
        //             width: 60000
        //           };
        // pdf.addHTML($('#TES'),function() {
        //     pdf.save('web.pdf');
        // }, margins);
        
        html2canvas($('#TES'),{
            onrendered:function(canvas){
                var position = 0;
                var img=canvas.toDataURL("image/jpg");
                var doc = jsPDF('l', 'in', 'a4');
                doc.internal.scaleFactor = 30;
                var width = doc.internal.pageSize.getWidth();
                var height = doc.internal.pageSize.getHeight();
                var margins = {
                  top: 40, bottom: 60, left: 40, right: 200
                };
                console.log(height);
                doc.addImage(img,'JPEG',0,0, width, height) ;
                doc.save('jadwal'+nama+'-'+tanggal+'.pdf');
            }
        });
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
                  tdAksi.className = 'aksi';
                  tdAksi.innerHTML = '<button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal"> Edit </button>' +
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
                                tdAksi.innerHTML = '<button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" > Edit </button>' +
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