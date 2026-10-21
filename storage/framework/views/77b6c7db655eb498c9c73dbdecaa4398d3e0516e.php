
<?php $__env->startSection('content'); ?>
<?php if(session()->has('success') || session()->has('error')): ?>
    <div class="alert <?php if(session()->has('error')): ?> alert-danger <?php else: ?> alert-success <?php endif; ?>">
        <?php if(session()->has('success')): ?>
            <?php echo e(session()->get('success')); ?>

        <?php else: ?>
            <?php echo e(session()->get('error')); ?>

        <?php endif; ?>
    </div>
<?php endif; ?>
<div class="card card-custom">
  <!--begin::Card body-->
  <div class="card-body">
    <form id="kt_form" class="form" method="POST" action="<?php echo e(route('slots.store')); ?>" autoComplete='off'>
      <?php echo csrf_field(); ?>
      <!--begin::Row-->
      <div class="row">
        <div class="col-md-4">
          <!--begin::Group-->
          <div class="form-group">
            <label class="form-label">Branch</label>
            <select class="form-control form-control-lg <?php echo e($errors->has('branch') ? 'is-invalid' : ''); ?> patient-select2" name="branch_id" placeholder="Branch" required>
              <?php if(count($branches)): ?>
              <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
              <option value="">Select</option>
              <?php endif; ?>
            </select>
            <?php if($errors->has('branch')): ?>
            <span class=" invalid-feedback"><?php echo e($errors->first('branch')); ?></span>
            <?php endif; ?>
          </div>
          <!--end::Group-->
        </div>
        <div class="col-md-4">
          <!--begin::Group-->
          <div class="form-group">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control" placeholder="Input Name">
          </div>
          <!--end::Group-->
        </div>
        <div class="col-md-4">
          <!--begin::Group-->
          <div class="form-group">
            <label class="form-label">Appointment Date</label>
            <input class="form-control form-control-lg <?php echo e($errors->has('date') ? 'is-invalid' : ''); ?>"
              type="text" name="date" placeholder="Appointment Date"
              value="<?php echo e(old('date', \Carbon\Carbon::parse($appointment->date ?? '')->format('d.m.Y'))); ?>" required/>
            <?php if($errors->has('date')): ?>
            <span class=" invalid-feedback"><?php echo e($errors->first('date')); ?></span>
            <?php endif; ?>
          </div>
          <!--end::Group-->
        </div>

        <div class="col-md-4">
          <!--begin::Group-->
          <div class="form-group">
            <label class="form-label">Slot Start Time</label>
            <input name="start_time" type='time' class="form-control" required />
          </div>
          <!--end::Group-->
        </div>

        <div class="col-md-4">
          <!--begin::Group-->
          <div class="form-group">
            <label class="form-label">Slot End Time</label>
            <input name="end_time" type='time' class="form-control" required />
          </div>
          <!--end::Group-->
        </div>
        <div class="col-md-12">
          <!--begin::Group-->
          <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="desc" cols="30" rows="5" class="form-control"></textarea>
          </div>
          <!--end::Group-->
        </div>

        <div class="col-md-12">
          <hr>
        </div>
        <div class="col-12 text-right">
          <button class="btn btn-primary btn-lg" type="submit">Submit</button>
        </div>
      </div>
      <!--end::Row-->
    </form>
  </div>
  <!--begin::Card body-->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/assets/plugins/custom/datetimepicker/jquery.datetimepicker.min.css">
<style>
  .canvas-main {
    width: 300px;
    height: 150px;
    border: 1px solid;
  }
  .canvas-sign {
    width: 100%;
    min-width: 150px;
    min-height: 150px;
    border: 1px solid;
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  var AVAILABLE_TIMES_AJAX_URL = '<?php echo e(route("patients.appointments.available-times")); ?>';
  var SELECTED_START_TIME = '<?php echo e(old("start_time", $appointment->start_time ?? NULL)); ?>';
</script>
<script src="https://cdn.tiny.cloud/1/2me38emy24f0gwihie60kmho6as74v8zdoq7vkabuw1egag1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?php echo e(url('/')); ?>/assets/plugins/custom/datetimepicker/jquery.datetimepicker.full.min.js"></script>
<script>
  $(document).ready(function () {
    $('.patient-select2').select2();

    $('[name="date"]').datetimepicker({
        format: 'd.m.Y',
        timepicker: false,
        mask: true
    });



  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/slots/edit.blade.php ENDPATH**/ ?>