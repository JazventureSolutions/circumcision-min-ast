

<?php $__env->startSection('content'); ?>

<!--begin::Card-->
<div class="card card-custom">
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
            style="margin-top: 13px !important">
            <thead>
                <tr>
                    
                    <th>Name</th>
                    <th>Report Name</th>
                    <th>Batch</th>
                    <th>Expiry</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>

<link href="<?php echo e(url('/')); ?>/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
    var DATATABLE_URL = '<?php echo e(url()->current()); ?>';
</script>

<script src="<?php echo e(url('/')); ?>/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="<?php echo e(url('/')); ?>/assets/js/pages/widgets.js"></script>

<script>
    var table = $('#kt_datatable');

    // begin first table
    table.DataTable({
        responsive: true,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        order: [[ 1, "asc" ]],
        ajax: {
            url: DATATABLE_URL,
            type: 'GET',
            data: {
                // parameters for custom backend script demo
                columnsDef: [
                    // 'id',
                    'name',
                    'report_name',
                    'batch',
                    'expiry',
                    'actions'
                ],
            },
        },
        columns: [
            // { data: 'id' },
            { data: 'name' },
            { data: 'report_name' },
            { data: 'batch' },
            { data: 'expiry' },
            { data: 'actions', responsivePriority: -1 },
        ],
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\circumcision-min-ast\resources\views/medicines/list.blade.php ENDPATH**/ ?>