<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('iframe'); ?>
<?php echo $iframe; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('code', $code); ?>
<?php $__env->startSection('message', $message); ?>

<?php echo $__env->make('errors.minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/error.blade.php ENDPATH**/ ?>