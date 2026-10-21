

<?php $__env->startSection('content'); ?>
<div class="card card-custom">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
        <div class="card-title mb-4 mb-md-0">
            <h3 class="card-label">Patient Report History</h3>
        </div>
        <form action="<?php echo e(route('patients.reports.history')); ?>" method="GET" class="form-inline">
            <div class="form-group mr-2 mb-2">
                <label class="mr-2">From</label>
                <input type="date" name="from_date" class="form-control form-control-sm" value="<?php echo e(request('from_date')); ?>">
            </div>
            <div class="form-group mr-2 mb-2">
                <label class="mr-2">To</label>
                <input type="date" name="to_date" class="form-control form-control-sm" value="<?php echo e(request('to_date')); ?>">
            </div>
            <div class="form-group mr-2 mb-2">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search patient name, phone, email or ID" value="<?php echo e(request('search')); ?>">
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration + (($appointments->currentPage() - 1) * $appointments->perPage())); ?></td>
                        <td><?php echo e($appointment->patient_id); ?></td>
                        <td><?php echo e(optional($appointment->patient)->name ?: 'Unknown'); ?></td>
                        <td><?php echo e($appointment->date_formatted); ?></td>
                        <td><?php echo e($appointment->start_time_formatted); ?></td>
                        <td>
                            <a href="<?php echo e(route('patients.reports.history.patient', ['patient_id' => $appointment->patient_id])); ?>" class="btn btn-sm btn-primary">
                                View Reports
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center">No patient appointments found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
            <div class="text-muted small mb-2 mb-md-0">
                Showing <?php echo e($appointments->firstItem() ?? 0); ?> to <?php echo e($appointments->lastItem() ?? 0); ?> of <?php echo e($appointments->total()); ?> entries
            </div>
            <div>
                <?php echo e($appointments->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/patients/reports/index.blade.php ENDPATH**/ ?>