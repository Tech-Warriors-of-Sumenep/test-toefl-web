<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">         
    <h4 class="py-3 mb-4">
        Materi
    </h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="row g-0">
            <div class="col-lg-6 p-4">
                <h5 class="card-header">Data Materi</h5>
            </div>
            <div class="col-lg-6 p-4" style="display: flex; height: auto; align-items: center; justify-content:end">
                <a href="<?php echo e(route('materiGrammar.create')); ?>" class="">
                    <button type="button" class="btn rounded-pill btn-success waves-effect waves-light">Create</button>
                </a>
            </div>
        </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Title</th>
              <th>Description</th>
              <th>File</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">     
            <?php $__currentLoopData = $materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materi1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <?php echo e($loop->iteration); ?>

              </td>
              <td>
                <?php echo e($materi1->title); ?>

              </td>
              <td>
                <?php echo e($materi1->description); ?>

              </td>
              <td>
                <?php echo e($materi1->file); ?>

              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo e(route('materiGrammar.edit', $materi1->uuid)); ?>"><i class="ti ti-pencil me-1"></i> Edit</a>
                    <form action="<?php echo e(route('materiGrammar.destroy', $materi1->uuid)); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <button type="submit" class="dropdown-item"><i class="ti ti-trash me-1"></i> Delete</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Hoverable Table rows -->
</div>
<div class="container">
        <h1>Daftar Flip Materi</h1>
        <a href="<?php echo e(route('flipMateri.create')); ?>" class="btn btn-primary">Tambah Flip Materi</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Materi</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $flipMateris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flipMateri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($flipMateri->materi->title); ?></td>
                        <td><?php echo e($flipMateri->description); ?></td>
                        <td><a href="/storage/files/flipMateri/<?php echo e($flipMateri->file); ?>" target="_blank">Lihat File</a></td>
                        <td>
                            <a href="<?php echo e(route('flipMateri.edit', $flipMateri->uuid)); ?>" class="btn btn-warning">Edit</a>
                            <form action="<?php echo e(route('flipMateri.destroy', $flipMateri->uuid)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\file yoga\kuliah\semester 4\workshop aplikasi bergerak\uas\backend-web\test-toefl-web\resources\views/materiGrammar/index.blade.php ENDPATH**/ ?>