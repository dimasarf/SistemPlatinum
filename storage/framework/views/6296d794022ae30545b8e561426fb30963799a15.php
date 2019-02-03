<?php $__env->startSection('konten'); ?>
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
                        <?php echo csrf_field(); ?>
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
    <?php if(!empty($jadwals)): ?>    
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Jadwal </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="serial">ID</th>
                                            <th class="serial">Tanggal</th>
                                            <th class="avatar">Jam</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Tutor</th>
                                            <th>Kelas</th>
                                            <th class="mr-4">Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $jadwals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                            
                                            <tr class="text-center">
                                                <td class="mapel"> <?php echo e($jadwal->id); ?> </td>
                                                <td class="serial tanggal"><?php echo e($jadwal->tanggal); ?></td>
                                                <td class="jam"> <span class="name"><?php echo e($jadwal->jam); ?></span> </td>
                                                <td class="mapel"> <?php echo e($jadwal->mapel); ?> </td>
                                                <td class="tentor">  <span class="name"><?php echo e($jadwal->tentor); ?></span> </td>
                                                <td class="kelas"> <span class="product"><?php echo e($jadwal->kelas); ?></span> </td>
                                                
                                                <td> 
                                                    <button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#exampleModal"> Edit </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-hapus"> Hapus </button>
                                                </td>
                                            </tr>                                         
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                   
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
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                <div class="form-group">
                                    <label class=" form-control-label">Jam</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-clock"></i></div>
                                        <select class="custom-select option-jam" id="option-jam">
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
                                        <select class="custom-select option-kelas" id="option-kelas">
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
                                        <select class="custom-select" id="option-pelajaran">
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
                                        <select class="custom-select" id="option-tentor">
                                            <?php $__currentLoopData = $tentors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tentor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tentor->id); ?>"><?php echo e($tentor->tentor); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col text-center">
                                    <button type="button" class="btn btn-primary btn-simpan" id=""><i class="far fa-save"></i>&nbsp; Simpan</button>
                                </div>
                    </div>                    
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- /.orders -->    
    <!-- Calender Chart Weather  -->
           
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script> 
    $(document).on('click','.btn-edit', function(){
        var jam = $(this).closest('tr').find('.jam').text();
        var tanggal = $(this).closest('tr').find('.tanggal').text();
        var mapel = $(this).closest('tr').find('.mapel').text();
        var tentor = $(this).closest('tr').find('.tentor').text();
        var kelas = $(this).closest('tr').find('.kelas').text();
        $('#option-jam').html(jam);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.DashboardLayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>