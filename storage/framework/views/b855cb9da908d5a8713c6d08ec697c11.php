<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create jawaban contoh soal</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('contohjawaban.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="contoh_soal_id" value="<?php echo e($contohsoal); ?>">
                            <div class="mb-3">
                                <label class="form-label" for="jawabancontohsoal">jawaban contoh soal 1</label>
                                <input type="jawabancontohsoal" name="jawabancontohsoal[]" class="form-control" id="jawabancontohsoal">
                                <?php $__errorArgs = ['jawabancontohsoal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="form-text text-danger">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jawabancontohsoal">jawaban contoh soal 2</label>
                                <input type="jawabancontohsoal" name="jawabancontohsoal[]" class="form-control" id="jawabancontohsoal">
                                <?php $__errorArgs = ['jawabancontohsoal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="form-text text-danger">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jawabancontohsoal">jawaban contoh soal 3</label>
                                <input type="jawabancontohsoal" name="jawabancontohsoal[]" class="form-control" id="jawabancontohsoal">
                                <?php $__errorArgs = ['jawabancontohsoal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="form-text text-danger">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jawabancontohsoal">jawaban contoh soal 4</label>
                                <input type="jawabancontohsoal" name="jawabancontohsoal[]" class="form-control" id="jawabancontohsoal">
                                <?php $__errorArgs = ['jawabancontohsoal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="form-text text-danger">
                                        <?php echo e($message); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PENS\semester 4\data_end\test-toefl-web\resources\views/contohjawaban/create.blade.php ENDPATH**/ ?>