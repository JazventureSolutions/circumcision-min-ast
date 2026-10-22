

<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">Search Patients</h3>
    </div>
    <div class="card-body">
        <form method="GET" action="<?php echo e(route('patients.search')); ?>" class="form-inline mb-4">
            <input type="text" name="name" class="form-control mr-2" placeholder="Enter patient name" value="<?php echo e(old('name', $query ?? '')); ?>" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <?php if(isset($patients) && count($patients)): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Parents Name</th>
                        <th>GP Details</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($patient->id); ?></td>
                            <td><?php echo e($patient->name); ?></td>
                            <td><?php echo e($patient->date_of_birth); ?></td>
                            <td>
                            Father: <b><?php echo e($patient->father_name); ?></b><br>
                            Mother: <b><?php echo e($patient->mother_name); ?></b>
                        </td>
                            <td><?php echo e($patient->gp_details); ?></td>
                            <td>
                                <a href=<?php echo e($patient->latest_appointment_route); ?> class="btn btn-block btn-sm btn-info mb-2 mr-2" title="Latest Appointment Reports">Reports</a><br>
                                 <a href=<?php echo e($patient->latest_appointment_edit_route); ?> class="btn btn-block btn-sm btn-primary mb-2 mr-2" title="Edit Appointment">Edit Appointment</a><br>
                                  <a href=<?php echo e($patient->edit_route); ?> class="btn btn-block btn-sm btn-primary mb-2 mr-2" title="Edit Patient">Edit Patient</a>
                                </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php elseif(isset($query)): ?>
            <div class="alert alert-info">No patients found.</div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\circumcision-min-ast\resources\views/patients/search.blade.php ENDPATH**/ ?>