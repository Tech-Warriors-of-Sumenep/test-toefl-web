<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Contoh Soal</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('contohsoal-listening.update', $contohsoal->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="mb-3">
                                <label class="form-label" for="materi_id">Materi</label>
                                <select id="materi_id" name="materi_id" class="form-select">
                                    <option value="" disabled>Select Materi</option>
                                    <?php $__currentLoopData = $materis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($materi->id); ?>" <?php echo e(($contohsoal->materi_id == $materi->id) ? 'selected' : ''); ?>>
                                            <?php echo e($materi->title); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="soal">Soal</label>
                                <input type="text" name="soal" class="form-control" id="soal" value="<?php echo e($contohsoal->soal); ?>" placeholder="Soal">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="file">File</label>
                                <input type="file" name="file" class="form-control" id="file" placeholder="File">
                                <?php if($contohsoal->file): ?>
                                    <p>Current file: <a href="<?php echo e(Storage::url('file/' . $contohsoal->file)); ?>" target="_blank"><?php echo e($contohsoal->file); ?></a></p>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\file yoga\kuliah\semester 4\workshop aplikasi bergerak\uas\backend-web\test-toefl-web\resources\views/contohsoal/edit.blade.php ENDPATH**/ ?>