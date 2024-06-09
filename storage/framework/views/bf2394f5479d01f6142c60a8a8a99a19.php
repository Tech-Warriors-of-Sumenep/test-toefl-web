<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="pt-3 mb-0">
            <span class="text-muted fw-light">contoh Soal /</span> contoh Soal Details
        </h4>

        <div class="card g-3 mt-5 col-lg-11 mx-auto">
            <div class="card-body row g-3">
                <div class="col-lg-12 mx-auto">
                    <div class="card academy-content shadow-none border">
                        <div class="card-body">
                            <h5 class="mb-2">Contoh Soal</h5>
                            <p class="mb-0 pt-1">
                                <?php echo e($soal->soal); ?>

                            </p>
                            <hr class="my-4">
                            <h5>Jawaban</h5>
                            <div class="d-flex flex-wrap">
                                <div class="me-5">
                                    <?php $__currentLoopData = $soal->contohjawaban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-nowrap"><span class="me-2 mt-n2"><?php echo e($option[$no++]); ?>.</span>
                                            <?php echo e($item->name); ?>

                                        </p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\file yoga\kuliah\semester 4\workshop aplikasi bergerak\uas\backend-web\test-toefl-web\resources\views/contohJawabanReading/detail-soal.blade.php ENDPATH**/ ?>