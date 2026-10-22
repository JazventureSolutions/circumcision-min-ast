<?php $__env->startSection('content'); ?>

<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            
            
            
        </div>
        <div class="card-toolbar">

            <div class="form-group mb-0 mr-2">
                <select class="form-control form-control-lg <?php echo e($errors->has('type') ? 'is-invalid' : ''); ?> basic-select2" name="branch_id" placeholder="Select Branch">
                    <option value="">Select Branch</option>
                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branchKey => $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($branchKey); ?>" <?php echo e((old('branch_id', Auth::user()->branch_id) == $branchKey) ? 'selected' : ''); ?>><?php echo e($branch); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!--begin::Button-->
            <a href="<?php echo e(route('patient-register.add')); ?>" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>New Record</a>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
            style="margin-top: 13px !important">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cell Number</th>
                    <th>Email</th>
                    <th>Registered</th>
                    <th>Remote Patent Status</th>
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
    $(document).ready(function () {
        var table = $('#kt_datatable');

        // begin first table
        table = table.DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[ 0, "desc" ]],
            ajax: {
                url: DATATABLE_URL,
                type: 'GET',
                data: {
                    // parameters for custom backend script demo
                    columnsDef: [
                        'id',
                        'cell_number',
                        'email',
                        'registered',
                        'remote_patent_status',
                        'actions'
                    ],
                },
            },
            columns: [
                { data: 'id' },
                { data: 'cell_number' },
                { data: 'email' },
                { data: 'registered' },
                { data: 'remote_patent_status', searchable: false,orderable: false },
                { data: 'actions', responsivePriority: -1 },
            ],
        });

        $(document).on('change', '[name="branch_id"]', function () {
            var branch_id = $(this).val();

            table.ajax.url(
                DATATABLE_URL +
                '?branch_id=' + branch_id
            ).load();
        });

        $('[name="branch_id"]').trigger('change');
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\circumcision-min-ast\resources\views/patient-register/list.blade.php ENDPATH**/ ?>