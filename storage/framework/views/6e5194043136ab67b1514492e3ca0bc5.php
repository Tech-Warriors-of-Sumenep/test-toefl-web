<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Soal Listening
        </h4>
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="row g-0">
                <div class="col-lg-6 p-4">
                    <h5 class="card-header">Data Ujian</h5>
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
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('soal-listening.detail-soal', ['ujian' => $item->id])); ?>"><i
                                                    class="ti ti-clipboard-text me-1"></i> Detail Soal</a>
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

<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\file yoga\kuliah\semester 4\workshop aplikasi bergerak\uas\backend-web\test-toefl-web\resources\views/soal-listening/index.blade.php ENDPATH**/ ?>