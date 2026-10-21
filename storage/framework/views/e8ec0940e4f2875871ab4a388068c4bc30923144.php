

<?php $__env->startSection('content'); ?>
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-title">
            <h3 class="card-label"><?php echo e($patient->name); ?> - Report History</h3>
            <div class="text-muted">Patient ID: <?php echo e($patient->id); ?></div>
        </div>
        <div>
            <a href="<?php echo e(route('patients.reports.history')); ?>" class="btn btn-secondary">Back to Patients</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Report Name</th>
                        <th>Filename</th>
                        <th>Local URL</th>
                        <th>SharePoint URL</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e(optional($report->template)->name ?? 'Report #' . $report->id); ?></td>
                        <td><?php echo e($report->filename ?: '-'); ?></td>
                        <td>
                            <?php if(!empty($report->file_url)): ?>
                                <a href="<?php echo e($report->file_url); ?>" target="_blank" class="btn btn-sm btn-success">Open Local</a>
                            <?php else: ?>
                                <span class="text-muted">No local URL</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(!empty($report->sharepoint_url)): ?>
                                <a href="<?php echo e($report->sharepoint_url); ?>" target="_blank" class="btn btn-sm btn-info">Open SharePoint</a>
                            <?php else: ?>
                                <span class="text-muted">Not uploaded</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($report->updated_at ? $report->updated_at->format('Y-m-d H:i') : '-'); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">No reports found for this patient.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/patients/reports/patient-history.blade.php ENDPATH**/ ?>