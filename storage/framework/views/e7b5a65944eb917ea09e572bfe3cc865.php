<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Materi Grammar</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('materiReading.update', ['code'=> $materi->uuid])); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="<?php echo e($materi->title); ?>" placeholder="Title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="deskripsi">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi" rows="3"><?php echo e($materi->description); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="file">File soal</label>
                                <input type="file" name="file" class="form-control" id="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\file yoga\kuliah\semester 4\workshop aplikasi bergerak\uas\backend-web\test-toefl-web\resources\views/materiReading/edit.blade.php ENDPATH**/ ?>