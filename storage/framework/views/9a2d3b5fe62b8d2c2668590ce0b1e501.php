<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">         
    <h4 class="py-3 mb-4">
        Ujian Reading
    </h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="row g-0">
            <div class="col-lg-6 p-4">
                <h5 class="card-header">Data Ujian Reading</h5>
            </div>
            <div class="col-lg-6 p-4" style="display: flex; height: auto; align-items: center; justify-content:end">
                <a href="<?php echo e(route('ujian-reading.create')); ?>" class="">
                    <button type="button" class="btn rounded-pill btn-success waves-effect waves-light">Create</button>
                </a>
            </div>
        </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kode Ujian</th>
              <th>Title</th>
              <th>Kategori</th>
              <th>Deskripsi</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">     
            <?php $__currentLoopData = $ujian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <?php echo e($no++); ?>

              </td>
              <td>
                <?php echo e($item->uuid); ?>

              </td>
              <td>
                <?php echo e($item->title); ?>

              </td>
              <td>
                <span class="badge bg-label-info me-1">
                  <?php echo e($item->category->name); ?>

                </span>
              </td>
              <td>
                <?php echo e($item->description); ?>

              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo e(route('ujian-reading.edit', ['code'=> $item->uuid])); ?>"><i class="ti ti-pencil me-1"></i> Edit</a>
                    <form action="<?php echo e(route('ujian-reading.destroy', ['code'=> $item->uuid])); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <button type="submit" class="dropdown-item"><i class="ti ti-trash me-1"></i> Delete</button>
                    </form>
                    <a class="dropdown-item" href="<?php echo e(route('soal-reading.create', ['ujian'=> $item->id])); ?>"><i class="ti ti-clipboard-text me-1"></i> Create Soal</a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sumenepteam\test-toefl-web\resources\views/reading/index.blade.php ENDPATH**/ ?>