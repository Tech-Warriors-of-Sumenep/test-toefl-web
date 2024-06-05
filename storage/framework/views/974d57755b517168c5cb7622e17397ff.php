<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Ujian</h5>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo e(route('ujian.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                      <div class="mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Ujian Hidup">
                        <?php $__errorArgs = ['title'];
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
                      <div class="mb-3" data-select2-id="45">
                        <label for="select2Basic" class="form-label">Basic</label>
                        <div class="position-relative" data-select2-id="44">
                            <select id="select2Basic" class="select2 form-select form-select select2-hidden-accessible" data-allow-clear="true" name="category" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                                <option value="" selected disabled data-select2-id="2">
                                    Select Category
                                </option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>" data-select2-id="2">
                                    <?php echo e($item->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category'];
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
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                        <?php $__errorArgs = ['deskripsi'];
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
<?php echo $__env->make('layouts.layout-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PENS\semester 4\data_end\test-toefl-web\resources\views/ujian/create.blade.php ENDPATH**/ ?>