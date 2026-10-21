<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <!--begin::Card body-->
    <div class="card-body">

        <form id="kt_form" class="form" method="POST" action="<?php echo e(route('patients.appointments.store')); ?>" autoComplete='off'>
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id" value="<?php echo e($appointment->id ?? 0); ?>">
            <input type="hidden" name="appointment_id" value="<?php echo e($appointment->id ?? 0); ?>">
            <input type="hidden" name="patient_id" value="<?php echo e($patient->id ?? 0); ?>">

            <!--begin::Row-->
            <div class="row">
                <div class="col-md-4">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Patient</label>
                        <a href="<?php echo e(route('patients.add')); ?>" class="btn btn-link p-0" target="_blank" style="float: right">Add Patient</a>

                        <select class="form-control form-control-lg <?php echo e($errors->has('patient') ? 'is-invalid' : ''); ?> patient-select2" name="patient" placeholder="Patient">
                            <?php if($patient): ?>
                            <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->name); ?> (<?php echo e($patient->id); ?>)</option>
                            <?php else: ?>
                            <option value="">Select</option>
                            <?php endif; ?>
                        </select>

                        <?php if($errors->has('patient')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('patient')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-4">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Doctor</label>

                        <select class="form-control form-control-lg <?php echo e($errors->has('doctor') ? 'is-invalid' : ''); ?> doctor-select2" name="doctor" placeholder="Doctor">
                            <?php if($doctor): ?>
                            <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->name); ?></option>
                            <?php else: ?>
                            <option value="">Select</option>
                            <?php endif; ?>
                        </select>

                        <?php if($errors->has('doctor')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('doctor')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <?php if(Route::currentRouteName() == 'patients.appointments.edit'): ?>
                <div class="col-md-4">
                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Branch</label>
                        <select readOnly class="form-control form-control-lg <?php echo e($errors->has('branch') ? 'is-invalid' : ''); ?> branch-select2" name="branch_id" placeholder="Branch" required>
                       <?php if($branches): ?>
                        <option value="<?php echo e($branches->id); ?>"><?php echo e($branches->name); ?></option>
                       <?php else: ?>
                        <option value="">Select</option>
                        <?php endif; ?>
                        </select>
                        <?php if($errors->has('branches')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('branches')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->
                </div>
                <?php else: ?>
                    <div class="col-md-4">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">Branch</label>
                            <select class="form-control form-control-lg <?php echo e($errors->has('branch') ? 'is-invalid' : ''); ?> branch-select2" name="branch_id" placeholder="Branch" required>
                        <?php if($branches): ?>
                            <option value="<?php echo e($branches->id); ?>"><?php echo e($branches->name); ?></option>
                        <?php else: ?>
                            <option value="">Select</option>
                            <?php endif; ?>
                            </select>
                            <?php if($errors->has('branches')): ?>
                            <span class=" invalid-feedback"><?php echo e($errors->first('branches')); ?></span>
                            <?php endif; ?>
                        </div>
                        <!--end::Group-->
                    </div>
                <?php endif; ?>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Pre Assessment Date</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('pre_assessment_date') ? 'is-invalid' : ''); ?>"
                            type="text" name="pre_assessment_date" placeholder="Pre Assessment Date"
                            value="<?php echo e(old('pre_assessment_date', $appointment->pre_assessment_date ? \Carbon\Carbon::parse($appointment->pre_assessment_date)->format('d.m.Y') : '')); ?>" autocomplete="off" role="presentation" />

                        <?php if($errors->has('pre_assessment_date')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('pre_assessment_date')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <?php if(Route::currentRouteName() == 'patients.appointments.edit'): ?>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Appointment Date</label>
                        <input readonly class="form-control form-control-lg <?php echo e($errors->has('date') ? 'is-invalid' : ''); ?>"
                            type="text" name="date" placeholder="Appointment Date"
                            value="<?php echo e(old('date', \Carbon\Carbon::parse($appointment->date ?? '')->format('d.m.Y'))); ?>" autocomplete="off" role="presentation" />

                        <?php if($errors->has('date')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('date')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <?php else: ?>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Appointment Date</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('date') ? 'is-invalid' : ''); ?>"
                            type="text" name="date" placeholder="Appointment Date"
                            value="<?php echo e(old('date', \Carbon\Carbon::parse($appointment->date ?? '')->format('d.m.Y'))); ?>" autocomplete="off" role="presentation" />

                        <?php if($errors->has('date')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('date')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <?php endif; ?>

                <?php if(Route::currentRouteName() == 'patients.appointments.edit'): ?>
                <div class="col-md-3">
                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Start Time
                            
                        </label>
                        <select value="<?php echo e($appointment->slot_id); ?>" name="slot_id" placeholder="Start Time"
                            class="form-control form-control-lg startTime-select2 <?php echo e($errors->has('start_time') ? 'is-invalid' : ''); ?>">
                        </select>

                        <?php if($errors->has('start_time')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('start_time')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->
                    <input type="hidden" id="start_time" name="start_time">
                    <input type="hidden" id="end_time" name="end_time">

                </div>
                <?php else: ?>
                <div class="col-md-3">
                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Start Time</label>
                        <select name="slot_id" placeholder="Start Time"
                            class="form-control form-control-lg startTime-select2 <?php echo e($errors->has('start_time') ? 'is-invalid' : ''); ?>">
                        </select>

                        <?php if($errors->has('start_time')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('start_time')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->
                    <input type="hidden" id="start_time" name="start_time">
                    <input type="hidden" id="end_time" name="end_time">

                </div>
                <?php endif; ?>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Follow Up Date</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('followup_date') ? 'is-invalid' : ''); ?>"
                            type="text" name="followup_date" placeholder="Follow Up Date"
                            value="<?php echo e(old('followup_date', $appointment->followup_date ? \Carbon\Carbon::parse($appointment->followup_date)->format('d.m.Y') : '')); ?>" autocomplete="off" role="presentation" />

                        <?php if($errors->has('followup_date')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('followup_date')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-4">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Status</label>

                        <select class="form-control form-control-lg <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?> basic-select2"
                            name="status" placeholder="Status">
                            <?php $__currentLoopData = $appointment_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKey => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($statusKey); ?>" <?php echo e((old('status', $appointment->status) == $statusKey) ? 'selected' : ''); ?>>
                                <?php echo e($status); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('status')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('status')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-4">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Followup Status</label>

                        <select class="form-control form-control-lg <?php echo e($errors->has('followup_status') ? 'is-invalid' : ''); ?> basic-select2"
                            name="followup_status" placeholder="Followup Status">
                            <?php $__currentLoopData = $appointment_followup_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKey => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($statusKey); ?>" <?php echo e((old('followup_status', $appointment->followup_status) == $statusKey) ? 'selected' : ''); ?>>
                                <?php echo e($status); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('status')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('status')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-4">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Appointment Type</label>

                        <select class="form-control form-control-lg <?php echo e($errors->has('appointment_type') ? 'is-invalid' : ''); ?> basic-select2"
                            name="appointment_type" placeholder="Appointment Type">
                            <?php $__currentLoopData = $appointment_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeKey => $appointment_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($typeKey); ?>" <?php echo e((old('appointment_type', $appointment->appointment_type) == $typeKey) ? 'selected' : ''); ?>>
                                <?php echo e($appointment_type); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('appointment_type')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('appointment_type')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-4">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Total Amount</label>
                        <input type="text" min="0.0" name="fees"
                            class="form-control form-control-lg <?php echo e($errors->has('fees') ? 'is-invalid' : ''); ?>"
                            placeholder="Fees"
                            value="<?php echo e(old('fees', $appointment->fees ?? '')); ?>" />

                        <?php if($errors->has('fees')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('fees')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-4">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Amount Paid</label>
                        <input type="text" min="0.0" name="fees_paid"
                            class="form-control form-control-lg <?php echo e($errors->has('fees_paid') ? 'is-invalid' : ''); ?>"
                            placeholder="Amount Paid"
                            value="<?php echo e(old('fees_paid', $appointment->fees_paid ?? '')); ?>" />

                        <?php if($errors->has('fees_paid')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('fees_paid')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-4">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Remaining Amount</label>
                        <input type="text" min="0.0" name="fees_remaining"
                            class="form-control form-control-lg <?php echo e($errors->has('fees_remaining') ? 'is-invalid' : ''); ?>"
                            placeholder="Remaining Amount" disabled
                            value="<?php echo e(old('fees_remaining', $appointment->fees_remaining ?? '')); ?>" />

                        <?php if($errors->has('fees_remaining')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('fees_remaining')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>

                <div class="col-md-4">
                     <!--begin::Group-->
                     <div class="form-group">
                         <input type="checkbox" name="remote_patent_status" value="1"  <?php if(optional($patient)->remote_patent_status == 1): ?> checked <?php endif; ?>>
                        <label class="form-label">Remote Patient Status</label>
                    </div>
                    <!--end::Group-->
                </div>
                <div class="col-md-4">
                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Appointment Type</label>

                        

                        <select class="form-control form-control-lg <?php echo e($errors->has('appoint_type') ? 'is-invalid' : ''); ?> basic-select2"
                            name="appoint_type" placeholder="Appointment Type">
                            <option value="">Select</option>
                            <?php $__currentLoopData = $AppointmentTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointtypeKey => $appoint_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($appointtypeKey); ?>" <?php echo e((old('appoint_type', $patient->appoint_type) == $appointtypeKey) ? 'selected' : ''); ?>>
                                <?php echo e($appoint_type); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('appoint_type')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('appoint_type')); ?></span>
                        <?php endif; ?>
                    </div>
                   <!--end::Group-->
               </div>
               <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Appointment Reason</label>
                    <textarea name="Appoint_reason"
                    class="form-control form-control-lg <?php echo e($errors->has('Appoint_reason') ? 'is-invalid' : ''); ?>" ><?php echo e(old('Appoint_reason', $patient->Appoint_reason ?? '')); ?></textarea>

                <?php if($errors->has('Appoint_reason')): ?>
                <span class=" invalid-feedback"><?php echo e($errors->first('Appoint_reason')); ?></span>
                <?php endif; ?>
                </div>
               </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-12">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Notes</label>
                        <textarea name="notes"
                            class="form-control form-control-lg <?php echo e($errors->has('notes') ? 'is-invalid' : ''); ?>"><?php echo e(old('notes', $appointment->notes ?? '')); ?></textarea>

                        <?php if($errors->has('notes')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('notes')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                
                
                
                
                
                
                <?php if($appointment->sms_sent_at): ?>
                <div class="col-md-12 my-2">
                    SMS sent at <?php echo e(\Carbon\Carbon::parse($appointment->sms_sent_at)->toFormattedDateString() . ' ' . \Carbon\Carbon::parse($appointment->sms_sent_at)->toTimeString()); ?>

                </div>
                <?php endif; ?>
                <?php if($appointment->email_sent_at): ?>
                <div class="col-md-12 my-2">
                    Email sent at <?php echo e(\Carbon\Carbon::parse($appointment->email_sent_at)->toFormattedDateString() . ' ' . \Carbon\Carbon::parse($appointment->email_sent_at)->toTimeString()); ?>

                </div>
                <?php endif; ?>
                <div class="col-md-12 my-2">

                    <!--begin::Group-->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <?php if(($appointment->id ?? 0) > 0): ?>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#emailModal">Send SMS & Email</button>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <!--end::Row-->

        </form>

    </div>
    <!--begin::Card body-->
</div>



<?php if(($appointment->id ?? 0) > 0): ?>
<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="kt_form" class="form" method="POST" action="<?php echo e(route('patients.appointments.send-email-reports')); ?>">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="id" value="<?php echo e($appointment->id ?? 0); ?>">

                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-md-12">

                            <!--begin::Group-->
                            <div class="form-group">
                                <label class="form-label">Email Body</label>
                                <textarea id="email_body" name="email_body"
                                    class="form-control form-control-lg <?php echo e($errors->has('email_body') ? 'is-invalid' : ''); ?>"></textarea>
                            </div>
                            <!--end::Group-->

                        </div>
                        <div class="col-md-12 my-2">

                            <!--begin::Group-->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2">Send</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

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
    // var AVAILABLE_TIMES_AJAX_URL = '<?php echo e(route("patients.appointments.available-times")); ?>';
        <?php  if( $appointment->id > 0) { ?>
            var AVAILABLE_TIMES_AJAX_URL = '<?php echo e(route("slots.all-available-slots", $appointment->slot_id )); ?>';
        <?php } else { ?>
            var AVAILABLE_TIMES_AJAX_URL = '<?php echo e(route("slots.available-slots")); ?>';
        <?php } ?>
    var SELECTED_START_TIME = '<?php echo e(old("start_time", $appointment->start_time ?? NULL)); ?>';
</script>
<script src="https://cdn.tiny.cloud/1/d22ohh12oouv8nn048jz8emx3wjq1uefeqmifh2e1zb7ujck/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?php echo e(url('/')); ?>/assets/plugins/custom/datetimepicker/jquery.datetimepicker.full.min.js"></script>
<script>
    $(document).ready(function () {
        $('.branch-select2').select2({
            ajax: {
                url: '<?php echo e(route("branches.select2")); ?>',
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });
        $('.branch-select2').on('select2:select', function (e) {
            fetchTimes();
        });
        $('.doctor-select2').select2({
            ajax: {
                url: '<?php echo e(route("doctors.select2")); ?>',
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        $('.patient-select2').select2({
            ajax: {
                url: '<?php echo e(route("patients.select2")); ?>',
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        $('.patient-select2').on('select2:select', function (e) {
            var data = e.params.data;
            switch (data.type) {
                case 'adult':
                    $('.hide-adult').hide();
                    $('.hide-old_boy').show();
                    $('.hide-new_born').show();
                    break;

                default:
                    $('.hide-adult').show();
                    $('.hide-old_boy').hide();
                    $('.hide-new_born').hide();
                    break;
            }

            $('[name="patient_id"]').val(data.id);
        });

        $('.patient-select2').trigger('select.select2');

        $('[name="date"]').datetimepicker({
            format: 'd.m.Y',
            timepicker: false,
            mask: true
        });

        $('[name="followup_date"]').datetimepicker({
            format: 'd.m.Y',
            timepicker: false,
            mask: true
        });

        $('[name="pre_assessment_date"]').datetimepicker({
            format: 'd.m.Y',
            timepicker: false,
            mask: true
        });

        function calculateRemainingAmount() {
            var FEES = $('[name="fees"]').val();
            var FEES_PAID = $('[name="fees_paid"]').val();
            $('[name="fees_remaining"]').val(FEES - FEES_PAID);
        }

        $(document).on('change', '[name="fees"]', calculateRemainingAmount);
        $(document).on('change', '[name="fees_paid"]', calculateRemainingAmount);

        var slotTiming = null

        $('[name="slot_id"]').on('select2:selecting', function(e) {
            slotTiming.map((val) => {
                if(val.id == e.params.args.data.id) {
                    $('#start_time').val(val.start_time)
                    $('#end_time').val(val.end_time)
                }
            })
        });

        function fetchTimes() {
            blockPage();

            var APPOINTMENT_ID = $('[name="appointment_id"]').val();
            var PATIENT_ID = $('[name="patient_id"]').val();
            var APPOINTMENT_DATE = $('[name="date"]').val();
            var BRANCH_ID = $('.branch-select2').val();
            var SELECTED_SLOT_ID = '<?php echo e($appointment->slot_id ?? ""); ?>';
            var App_date = '<?php echo e($appointment->date ?? ""); ?>';

            $.ajax({
                type: 'GET',
                url: AVAILABLE_TIMES_AJAX_URL + '?date='+ APPOINTMENT_DATE+'&branch_id='+BRANCH_ID,
                success: function (data) {
                    unblockPage();
                    $('.startTime-select2').select2()
                    $('.startTime-select2').empty();

                    slotTiming = data;
                    data.map((val) => {
                        $('[name="slot_id"]').append(
                            '<option value="' + val.id + '" ' + (val.id == SELECTED_SLOT_ID ? 'selected' : '') + '>' + val.start_time + ' - ' + val.end_time + (val.id == SELECTED_SLOT_ID ? ' (Booked) (P_id ' + PATIENT_ID +') - (S_ID_'+ SELECTED_SLOT_ID +'_'+ App_date +' )'  : '')+ '</option>'
                        );
                    });
                    $('#start_time').val(data[0].start_time)
                    $('#end_time').val(data[0].end_time)

                    // if (data.status == 'success') {
                    //     // $('[name="slot_id"]').empty();
                    //     $('.startTime-select2').select2()
                    //     data.times.forEach(timeObject => {
                    //         $('[name="slot_id"]').append(
                    //             '<option value="' + timeObject.time + '" ' +
                    //             ((timeObject.available) ? '' : 'disabled') +
                    //             ((timeObject.time == SELECTED_START_TIME) ? 'selected' : '') +
                    //             '>' + timeObject.time_formatted + '</option>'
                    //         );
                    //     });
                    // }
                },
                error: function (error) {
                    unblockPage();

                    showErrorAlert(error.responseJSON.message, () => {
                        KTUtil.scrollTop();
                    });
                }
            });
        }
        <?php
            if(Route::currentRouteName() == 'patients.appointments.edit') { ?>
                fetchTimes();
           <?php  }  ?>


        $(document).on('change', '[name="date"]', fetchTimes);

        $('#emailModal').on('shown.bs.modal', function (e) {
            tinymce.init({
                selector: '#email_body',
                menubar: 'file edit view insert format tools table help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | template link anchor codesample | ltr rtl',
                toolbar_sticky: false,
                browser_spellcheck: true,
                resize: false,
                object_resizing: false,
                contextmenu: 'link table',
            });
        });

        $('#emailModal').on('hidden.bs.modal', function (e) {
            tinymce.get("email_body").remove();
        });

        // $('#signModal').on('shown.bs.modal', function (e) {
        //     $('html').css('overflow', 'hidden');
        // });

        // $('#signModal').on('hidden.bs.modal', function (e) {
        //     $('html').css('overflow', 'unset');
        // });

        // $(document).on('click', '.btn-sign', function () {
        //     $('#signModal').modal('show');

        //     var SIGN_TYPE = $(this).data('sign-type');

        //     handleSign(SIGN_TYPE);
        // });

        // function handleSign(_TYPE) {
        //     window.requestAnimFrame = (function(callback) {
        //         return window.requestAnimationFrame ||
        //         window.webkitRequestAnimationFrame ||
        //         window.mozRequestAnimationFrame ||
        //         window.oRequestAnimationFrame ||
        //         window.msRequestAnimaitonFrame ||
        //         function(callback) {
        //             window.setTimeout(callback, 1000 / 60);
        //         };
        //     })();

        //     canvasHeight = 150; //document.getElementById("html-content-" + _TYPE).querySelector('section').offsetHeight;
        //     canvasWidth = 300; //document.getElementById("html-content-" + _TYPE).querySelector('section').offsetWidth;

        //     canvas = document.getElementById("canvas-main");
        //     canvas.height = canvasHeight;
        //     canvas.width = canvasWidth;

        //     var ctx = canvas.getContext("2d");
        //     ctx.strokeStyle = "#000";
        //     ctx.lineWidth = 1;

        //     var drawing = false;
        //     var mousePos = {
        //         x: 0,
        //         y: 0
        //     };
        //     var lastPos = mousePos;

        //     function canvasmousedown(e) {
        //         drawing = true;
        //         lastPos = getMousePos(canvas, e);
        //     }

        //     canvas.addEventListener("mousedown", canvasmousedown, false);

        //     function canvasmouseup(e) {
        //         drawing = false;
        //     }

        //     canvas.addEventListener("mouseup", canvasmouseup, false);

        //     function canvasmousemove(e) {
        //         mousePos = getMousePos(canvas, e);
        //     }

        //     canvas.addEventListener("mousemove", canvasmousemove, false);

        //     function canvastouchmove(e) {
        //         var touch = e.touches[0];
        //         var me = new MouseEvent("mousemove", {
        //             clientX: touch.clientX,
        //             clientY: touch.clientY
        //         });
        //         canvas.dispatchEvent(me);
        //     }

        //     canvas.addEventListener("touchmove", canvastouchmove, false);

        //     function canvastouchstart(e) {
        //         mousePos = getTouchPos(canvas, e);
        //         var touch = e.touches[0];
        //         var me = new MouseEvent("mousedown", {
        //             clientX: touch.clientX,
        //             clientY: touch.clientY
        //         });
        //         canvas.dispatchEvent(me);
        //     }

        //     canvas.addEventListener("touchstart", canvastouchstart, false);

        //     function canvastouchend(e) {
        //         var me = new MouseEvent("mouseup", {});
        //         canvas.dispatchEvent(me);
        //     }

        //     canvas.addEventListener("touchend", canvastouchend, false);

        //     function getMousePos(canvasDom, mouseEvent) {
        //         var rect = canvasDom.getBoundingClientRect();
        //         return {
        //             x: mouseEvent.clientX - rect.left,
        //             y: mouseEvent.clientY - rect.top
        //         }
        //     }

        //     function getTouchPos(canvasDom, touchEvent) {
        //         var rect = canvasDom.getBoundingClientRect();
        //         return {
        //             x: touchEvent.touches[0].clientX - rect.left,
        //             y: touchEvent.touches[0].clientY - rect.top
        //         }
        //     }

        //     function renderCanvas() {
        //         if (drawing) {
        //             ctx.moveTo(lastPos.x, lastPos.y);
        //             ctx.lineTo(mousePos.x, mousePos.y);
        //             ctx.stroke();
        //             lastPos = mousePos;
        //         }
        //     }

        //     // Prevent scrolling when touching the canvas
        //     function documenttouchstart(e) {
        //         if (e.target == canvas) {
        //             e.preventDefault();
        //         }
        //     }
        //     document.body.addEventListener("touchstart", documenttouchstart, false);
        //     function documenttouchend(e) {
        //         if (e.target == canvas) {
        //             e.preventDefault();
        //         }
        //     }
        //     document.body.addEventListener("touchend", documenttouchend, false);
        //     function documenttouchmove(e) {
        //         if (e.target == canvas) {
        //             e.preventDefault();
        //         }
        //     }
        //     document.body.addEventListener("touchmove", documenttouchmove, false);

        //     (function drawLoop() {
        //         requestAnimFrame(drawLoop);
        //         renderCanvas();
        //     })();

        //     function clearCanvas() {
        //         canvas.width = canvas.width;
        //     }

        //     // Set up the UI
        //     var sigImage = document.getElementById("canvas-" + _TYPE + "-sign");
        //     var clearBtn = document.getElementById("sig-clearBtn");
        //     var submitBtn = document.getElementById("sig-submitBtn");

        //     clearBtn.addEventListener("click", clearCanvas, false);

        //     function submitCanvas(e) {

        //         var dataUrl = canvas.toDataURL();
        //         sigImage.setAttribute("src", dataUrl);

        //         $('[name="' + _TYPE + '_sign"]').val(dataUrl);

        //         canvas.removeEventListener("mousedown", canvasmousedown);
        //         canvas.removeEventListener("mouseup", canvasmouseup);
        //         canvas.removeEventListener("mousemove", canvasmousemove);
        //         canvas.removeEventListener("touchmove", canvastouchmove);
        //         canvas.removeEventListener("touchstart", canvastouchstart);
        //         canvas.removeEventListener("touchend", canvastouchend);
        //         canvas.removeEventListener("touchstart", canvastouchstart);

        //         document.body.removeEventListener("touchstart", documenttouchstart);
        //         document.body.removeEventListener("touchend", documenttouchend);
        //         document.body.removeEventListener("touchmove", documenttouchmove);

        //         clearBtn.removeEventListener("click", clearCanvas);
        //         submitBtn.removeEventListener("click", submitCanvas);

        //         $('#signModal').modal('hide');
        //     }

        //     submitBtn.addEventListener("click", submitCanvas, false);
        // }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/patients/appointments/edit.blade.php ENDPATH**/ ?>