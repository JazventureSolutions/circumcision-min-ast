<?php $__env->startSection('content'); ?>

<?php ($dashboardRole = Auth::user()->currentRole()); ?>
<section class="role-workspace-banner" role="status" aria-label="Active workspace">
    <span class="role-workspace-banner__eyebrow">Active workspace</span>
    <h1 class="role-workspace-banner__name">
        <?php echo e(\Illuminate\Support\Str::of($dashboardRole->name ?? 'Default role')->replace(['_', '-'], ' ')->title()); ?>

    </h1>
</section>

<div class="row">
    
    
</div>

<div class="card card-custom gutter-b">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            
            
            
        </div>
        <div class="card-toolbar">

            <div class="form-group mb-0">
                <select class="form-control form-control-lg <?php echo e($errors->has('type') ? 'is-invalid' : ''); ?> basic-select2" name="branch_id" placeholder="Select Branch">
                    <option value="">Select Branch</option>
                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branchKey => $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($branchKey); ?>" <?php echo e((old('branch_id', Auth::user()->branch_id) == $branchKey) ? 'selected' : ''); ?>><?php echo e($branch); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

        </div>
    </div>
    <div class="card-body">

        <div id="kt_calendar"></div>

    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(url('/')); ?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
    type="text/css" />

<style>
    .fc-list-item-options {
        float: right !important;
    }
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(url('/')); ?>/assets/js/pages/widgets.js"></script>
<script>
    var APPOINTMENTS_AJAX_URL = '<?php echo e(route("patients.appointments")); ?>';
</script>
<script src="<?php echo e(url('/')); ?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/pages/appointments.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\circumcision-min-ast\resources\views/dashboard.blade.php ENDPATH**/ ?>