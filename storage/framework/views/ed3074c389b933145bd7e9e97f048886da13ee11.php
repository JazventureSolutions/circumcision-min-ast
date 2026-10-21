<?php if($appointment->status): ?>

<div class="fc-list-item-options">
    <form action="<?php echo e($appointment->delete_route); ?>" method="POST" onclick="return confirm('Are you sure?')" style="float: right;">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <input type="hidden" name="appointment_id" value="<?php echo e($appointment->id); ?>">
        <button type="submit" class="btn btn-danger btn-icon btn-sm appointment-delete" title="Delete">
            <i class="far fa-trash-alt icon-md"></i>
        </button>
    </form>
    <a href="<?php echo e($appointment->edit_route); ?>" class="btn btn-success btn-icon btn-sm mr-2" style="float: right;" title="Edit">
        <i class="far fa-edit icon-md"></i>
    </a>
    <a href="<?php echo e($appointment->reports_route); ?>" class="btn btn-success btn-icon btn-sm mr-2" style="float: right;" title="Reports">
        <i class="far fa-file-pdf icon-md"></i>
    </a>
</div>

<?php else: ?>

<div class="fc-list-item-options">
    <?php if($appointment->available): ?>
    <a href="<?php echo e($appointment->add_route); ?>" class="btn btn-success btn-sm">
        <i class="fas fa-plus icon-md"></i>Add Appointment
    </a>
    <?php endif; ?>
</div>

<?php endif; ?>
<?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/patients/appointments/options.blade.php ENDPATH**/ ?>