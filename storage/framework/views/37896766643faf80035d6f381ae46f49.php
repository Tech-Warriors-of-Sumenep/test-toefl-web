<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Card Border Shadow -->
  <div class="row">
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card card-border-shadow-primary">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-package ti-md"></i></span>
            </div>
            <h4 class="ms-1 mb-0">
              <?php echo e($categories); ?>

            </h4>
          </div>
          <p class="mb-1">
            Kategori
          </p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card card-border-shadow-warning">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-user ti-md"></i></span>
            </div>
            <h4 class="ms-1 mb-0">
              <?php echo e($users); ?>

            </h4>
          </div>
          <p class="mb-1">
            User
          </p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card card-border-shadow-danger">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-notes ti-md"></i></span>
            </div>
            <h4 class="ms-1 mb-0">
              <?php echo e($ujian); ?>

            </h4>
          </div>
          <p class="mb-1">Ujian</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card card-border-shadow-info">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-info"><i class="ti ti-chalkboard ti-md"></i></span>
            </div>
            <h4 class="ms-1 mb-0">
              <?php echo e($materi); ?>

            </h4>
          </div>
          <p class="mb-1">
            Materi
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\AFIF\OneDrive\Dokumen\Dart\TOEFLApp\test-toefl-web\resources\views/dashboard.blade.php ENDPATH**/ ?>