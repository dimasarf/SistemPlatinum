@extends('layouts.DashboardLayout')
@section('konten')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="/form/css/style.css">
<style>
.form-group label
{
    text-align: left;
    float: left;
    margin-bottom: 15px;
}
#msform fieldset
{
    width: 600px;
    margin-left: -100px;
}
#msform{
    
}
</style>
<div class="animated fadeIn">
        <div class="clearfix"></div>
        <div class="row" style="height: 1000px;">
            <div class="col-xs-6 col-sm-6 mx-auto col-lg-6">
                {{-- <div class="card"> --}}
                    {{-- <div class="card-header">
                        <strong>Masked Input</strong> <small> Small Text Mask</small>
                    </div> --}}
                    {{-- <div class="card-body card-block"> --}}
                        <form id="msform" action="/murid-baru" method="POST">
                            <!-- progressbar -->
                            @csrf
                            <ul id="progressbar">
                                <li class="active">Data Diri</li>
                                <li>Data Pribadi</li>
                                <li>Data Orangtua</li>
                                <li>Rencana Siswa</li>
                                <li>Administrasi</li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset >
                                <h2 class="fs-title">Data Diri Siswa</h2>
                                <br>
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Lengkap</label>
                                    <input name="nama_lengkap" placeholder="Nama Lengkap" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Panggilan</label>
                                    <input name="nama_panggilan" placeholder="Nama Panggilan" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Tanggal Lahir</label>
                                    <input type="date" name="tgl" placeholder="TanggalLahir" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" placeholder="TanggalLahir" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Jenis Kelamin</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Agama</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="agama">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Data Pribadi Murid</h2>
                                <br>
                                <div class="form-group">
                                    <label class=" form-control-label">Alamat Rumah</label>
                                    <input name="alamat" placeholder="Alamat Rumah" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Nomor Telepon Siswa</label>
                                    <input type="number" name="telp_siswa" placeholder="Nomor Telepon Siswa" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Id Line</label>
                                    <input name="id_line" placeholder="Id Line" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Email Siswa</label>
                                    <input name="email" placeholder="Email Siswa" class="name" required />
                                </div>
                                  </br>
                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Data Orangtua</h2>
                                <br>
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Ayah</label>
                                    <input name="nama_ayah" placeholder="Nama Ayah" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Nama Ibu</label>
                                    <input name="nama_ibu" placeholder="Nama Ibu" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Pekerjaan Ayah</label>
                                    <input name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Pekerjaan Ibu</label>
                                    <input name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Telepon Rumah</label>
                                    <input name="telepon_rumah" placeholder="Telepon Ayah" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Telepon Orangtua</label>
                                    <input name="telepon_ortu" placeholder="Telepon Orangtua" class="name" required />
                                </div>
                                </br>
                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Rencana Siswa</h2>
                                <h3 class="fs-subtitle"></h3>
                                <div class="form-group">
                                    <label class=" form-control-label">Asal Sekolah</label>
                                    <input name="asal_sekolah" placeholder="Asal Sekolah" class="name" required />
                                </div>
                                <div class="form-group">
                                    @if($jenjang == 'SMK')
                                        <label class=" form-control-label">Jurusan</label>
                                        <input name="jurusan" placeholder="Jurusan" class="name" required />
                                    @elseif($jenjang == 'SMA')
                                        <label class=" form-control-label">Kelas</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="jurusan">
                                            <option value="X IPS">X IPS</option>
                                            <option value="X IPA">X IPA</option>
                                            <option value="XI IPS">XI IPS</option>
                                            <option value="XI IPA"> XI IPA</option>
                                            <option value="XII IPS">XII IPS</option>
                                            <option value="XII IPA">XII IPA</option>
                                        </select>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Hari yang Dipilih</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="hari">
                                        <option value="Senin - Kamis">Senin - Kamis</option>
                                        <option value="Selasa - Jumat">Selasa - Jumat</option>
                                    </select>
                                    {{-- <input name="lainnya" placeholder="lainnya" class="name" required /> --}}
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Jam yang Dipilih</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jam">
                                        <option value="17.00 - 18.30">17.00 - 18.30</option>
                                        <option value="18.30 - 20.00">18.30 - 20.00</option>
                                        <option value="18.30 - 20.00">18.30 - 20.00</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Rencana Setelah Lulus</label>
                                    @if($jenjang == 'SMP')
                                        <select class="form-control" id="exampleFormControlSelect1" name="rencana">
                                            @foreach($rencanas as $rencana)
                                                <option value="{{$rencana}}">{{$rencana}}</option>
                                            @endforeach
                                                <option value="lainnya">lainnya</option>
                                        </select>
                                    @elseif($jenjang == 'SMA')
                                        <select class="form-control" id="exampleFormControlSelect1" name="rencana">
                                            @foreach($rencanas as $rencana)
                                                <option value="{{$rencana}}">{{$rencana}}</option>
                                            @endforeach
                                                <option value="lainnya">lainnya</option>
                                        </select>
                                    @else
                                        <select class="form-control" id="exampleFormControlSelect1" name="rencana">
                                            @foreach($rencanas as $rencana)
                                                <option value="{{$rencana}}">{{$rencana}}</option>
                                            @endforeach
                                                <option value="lainnya">lainnya</option>
                                        </select>
                                    @endif
                                </div>
                                </br>
                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                <input type="button" name="next" class="next action-button" value="Next" />
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Administrasi</h2>
                                <div class="form-group">
                                    <label class=" form-control-label">ID Siswa</label>
                                    <input name="id" placeholder="Nama Lengkap" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">No Kuitansi</label>
                                    <input name="kuitansi" placeholder="Nama Lengkap" class="name" required />
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Bonus yang didapat</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option value="Event">Event</option>
                                        <option value="Alumni">Alumni</option>
                                        <option value="Lunas">Lunas</option>
                                        <option value="Referensi">Referensi</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                @if($jenjang!= 'SMK')
                                    <div class="form-group">
                                        <label class=" form-control-label">Diskon</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="diskon">
                                            <option value="Event">Event</option>
                                            <option value="Alumni">Alumni</option>
                                            <option value="Lunas">Lunas</option>
                                            <option value="Referensi">Referensi</option>
                                            <option value="Budha">Budha</option>
                                        </select>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class=" form-control-label">Metode Pembayaran</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="metode">
                                        <option value="Tunai">Tunai</option>
                                        <option value="Transfer BCA">Transfer BCA</option>
                                        <option value="Transfer BNI">Transfer BNI</option>
                                        <option value="Transfer BRI">Transfer BRI</option>
                                        <option value="Transfer Mandiri">Transfer Mandiri</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Jenis Pembayaran</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jenis">
                                        <option value="Tunai">Tunai</option>
                                        <option value="Cicilan">Cicilan</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                {{-- <input type="submit" name="submit" class="submit action-button" value="Save" /> --}}
                            </fieldset>
                            <input type="hidden" name="jenjang" value="{{$jenjang}}">
                            <button type="submit" class="btn btn-primary" style="position: relative; margin-top: 800px;">Simpan</button>    
                        </form>
                            @if (Session::has('status'))
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-1 sembunyi mt-3">
                                    {{ Session::get('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                    {{-- </div>
                </div> --}}
            </div>
        </div>
        <!-- Kelas -->
       
    </div>
   <!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script  src="/form/js/index.js"></script>

<script>
    
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

</script>
@endsection