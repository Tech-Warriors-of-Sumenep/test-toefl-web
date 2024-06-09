<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Input Materi Reading</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('materiReading.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="deskripsi">Description</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Description" rows="3"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\file yoga\kuliah\semester 4\workshop aplikasi bergerak\uas\backend-web\test-toefl-web\resources\views/materiReading/create.blade.php ENDPATH**/ ?>