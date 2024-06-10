<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            Soal
        </h4>
        <!-- Hoverable Table rows -->
        <div class="card">
            <div class="row g-0">
                <div class="col-lg-6 p-4">
                    <h5 class="card-header">Data contoh Soal</h5>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Ujian</th>
                            <th>Soal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $__currentLoopData = $contohsoals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($loop->iteration); ?>

                                </td>
                                <td>
                                    <?php echo e($item->materi->title); ?>

                                </td>
                                <td>
                                    <?php echo e($item->soal); ?>

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('contohsoal-reading.edit', $item->id)); ?>"><i
                                                    class="ti ti-pencil me-1"></i> Edit</a>
                                            <form action="<?php echo e(route('contohsoal-reading.destroy', $item->id)); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="dropdown-item"><i
                                                        class="ti ti-trash me-1"></i> Delete</button>
                                            </form>
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('contohsoal-reading.show', $item->id)); ?>"><i
                                                    class="ti ti-details me-1"></i> Details</a>
                                            <a class="dropdown-item"
                                                href="<?php echo e(route('contohjawaban.create', $item->id)); ?>"><i
                                                    class="ti ti-abc me-1"></i> Create Jawaban</a>
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

<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\AFIF\OneDrive\Dokumen\Dart\TOEFLApp\test-toefl-web\resources\views/contohSoalReading/detail-soal.blade.php ENDPATH**/ ?>