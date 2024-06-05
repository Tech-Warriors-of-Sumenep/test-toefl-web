<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create Soal</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('soal.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label class="form-label" for="ujian_id">Ujian</label>
                                <select id="ujian_id" name="ujian_id" class="form-select">
                                    <option value="" selected disabled>Select Ujian</option>
                                    <?php $__currentLoopData = $ujians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ujian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ujian->id); ?>"><?php echo e($ujian->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="soal">Soal</label>
                                <input type="text" name="soal" class="form-control" id="soal" placeholder="Soal">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="file">File</label>
                                <input type="file" name="file" class="form-control" id="file" placeholder="File">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PENS\semester 4\data_end\test-toefl-web\resources\views/soal/create.blade.php ENDPATH**/ ?>