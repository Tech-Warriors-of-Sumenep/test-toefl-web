<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit Flip Materi</h1>
        <form action="<?php echo e(route('flipMateri.update', $flipMateri->uuid)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="materi_id">Materi</label>
                <select name="materi_id" id="materi_id" class="form-control">
                    <?php $__currentLoopData = $materis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($materi->id); ?>" <?php echo e($flipMateri->materi_id == $materi->id ? 'selected' : ''); ?>><?php echo e($materi->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control"><?php echo e($flipMateri->description); ?></textarea>
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" name="file" id="file" class="form-control">
                <?php if($flipMateri->file): ?>
                    <p><a href="<?php echo e($flipMateri->file); ?>" target="_blank">Lihat File</a></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\sumenepteam\test-toefl-web\resources\views/materiGrammar/editflip.blade.php ENDPATH**/ ?>