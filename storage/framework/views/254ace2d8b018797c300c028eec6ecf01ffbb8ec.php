<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('message'); ?>
<p>Good Morning,</p>
<p>Please confirm your<?php echo e($parents_confirm == "" ? "" : " son's"); ?> <?php echo e($is_pre_assessment ? "pre assessment" : "circumcision"); ?> appointment  by sending a text message. <?php echo e($datetime_formatted); ?> at <?php echo e($branch_address_line); ?>.<?php echo e($parents_confirm); ?>. <?php echo e($parents_away); ?><br>
No response will result in a cancellation.</p>

<p>Thanks.<br>
Dr Khan</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/messages/appointment_reminder.blade.php ENDPATH**/ ?>