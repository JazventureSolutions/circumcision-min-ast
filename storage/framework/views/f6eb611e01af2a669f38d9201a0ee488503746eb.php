<?php $__env->startSection('content'); ?>
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session()->has('slots_error')): ?>
        <div class="alert alert-danger">
            These slots are already Created:
            <ul>
                <?php $__currentLoopData = session()->get('slots_error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slot_error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($slot_error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php
            session()->remove('slots_error');
        ?>
    <?php endif; ?>
    <div class="card card-custom">
        <!--begin::Card body-->
        <div class="card-body">
            <form id="kt_form" class="form" method="POST" enctype="multipart/form-data" action="<?php echo e(route('slots.import')); ?>"
                autoComplete='off'>
                <?php echo csrf_field(); ?>
                <!--begin::Row-->
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="slots">
                    </div>
                    <div class="col-md-6">
                        <a href="https://circumcisionclinic.net/sample/slots.xlsx" class="btn btn-sm btn-info mb-2 mr-2 right" download>Download Sample File For Reference</a>

                    </div>
                </div>

                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-12 text-right">
                    <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                </div>
                <!--end::Row-->
            </form>
        </div>
        <!--begin::Card body-->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/slots/Importslots.blade.php ENDPATH**/ ?>