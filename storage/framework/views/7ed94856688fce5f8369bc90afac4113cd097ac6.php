<?php $__env->startSection('konten'); ?>
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
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class=" form-control-label">Tanggal</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="far fa-calendar-alt"></i></div>
                                <?php if(!empty($tanggal)): ?>
                                    <input class="form-control" type="date" name="tanggal" id="tanggal" value="<?php echo e($tanggal); ?>">
                                <?php else: ?>
                                    <input class="form-control" type="date" name="tanggal" id="tanggal" >
                                <?php endif; ?>
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
        <?php if(!empty($jumlah)): ?>
            <?php for($i = 0; $i< $jumlah; $i++): ?>                
                <div class="col-xs-6 col-sm-6 col-lg-4 kelas" id="kelas">
                    <div class="card">
                        <div class="card-header">
                            <strong>Masked Input</strong> <small> Small Text Mask</small>
                        </div>
                        <div class="card-body card-block">
                            
                                <div class="form-group">
                                    <label class=" form-control-label">Jam</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-clock"></i></div>
                                        <select class="custom-select option-jam" id="option-jam-<?php echo e($i); ?>">
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
                                        <select class="custom-select option-kelas" id="option-kelas-<?php echo e($i); ?>">
                                            <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($kela->id); ?>"><?php echo e($kela->kelas); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>                                            
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Pelajaran</label>
                                    <div class="input-group">
                                        <div class="input-group-addon option-pelajaran"><i class="fas fa-book"></i></div>
                                        <select class="custom-select" id="option-pelajaran-<?php echo e($i); ?>">
                                            <?php $__currentLoopData = $mapels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mapel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($mapel->id); ?>"><?php echo e($mapel->mapel); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>                                            
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Tentor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon option-tentor"><i class="fas fa-chalkboard-teacher"></i></div>
                                        <select class="custom-select" id="option-tentor-<?php echo e($i); ?>">
                                            <?php $__currentLoopData = $tentors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tentor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tentor->id); ?>"><?php echo e($tentor->tentor); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col text-center">
                                    <button type="button" class="btn btn-primary btn-simpan" id="<?php echo e($i); ?>"><i class="far fa-save"></i>&nbsp; Simpan</button>
                                </div>
                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-1 sembunyi" id="berhasil-<?php echo e($i); ?>">
                                    Jadwal Berhasil Disimpan!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-1 sembunyi" id="gagal-<?php echo e($i); ?>">
                                    Tentor tidak tersedia!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            
                        </div>
                    </div>
                
                </div>
            <?php endfor; ?>
        <?php endif; ?>
        </div>
    <!-- Orders -->    
    
    <!-- /.orders -->    
    <!-- Calender Chart Weather  -->
    
    <!-- /Calender Chart Weather -->
    <!-- Modal - Calendar - Add New Event -->
    
    <!-- /#event-modal -->
    <!-- Modal - Calendar - Add Category -->
    
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.DashboardLayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>