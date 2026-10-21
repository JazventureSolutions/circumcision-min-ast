<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('message'); ?>
<p>Circumcision <?php echo e($is_pre_assessment ? "Pre assessment " : ""); ?>appointment: <?php echo e($datetime_formatted); ?> at <?php echo e($branch_address_line); ?>. <?php echo e($parents_confirm); ?> . <?php echo e($parents_away); ?> Please check your email for further details. <?php echo e($medicine ? ("Please bring " . $medicine . " with you.") : ""); ?></p>

<p>Thanks.<br>
Dr Khan</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/messages/appointment_arranged.blade.php ENDPATH**/ ?>