<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <!--begin::Card body-->
    <div class="card-body">

        <form id="kt_form" class="form" method="POST" action="<?php echo e(route('patient-register.store')); ?>">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id" value="<?php echo e($patient_inq->id ?? 0); ?>">
            <input type="hidden" name="form_type" value="submit">
            

            <!--begin::Row-->
            <div class="row">
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Cell Number</label>
                        <div
                            class="input-group input-group-lg <?php echo e($errors->has('cell_number') ? 'is-invalid' : ''); ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-phone"></i> +44
                                </span>
                            </div>
                            <input type="tel"
                                class="form-control form-control-lg <?php echo e($errors->has('cell_number') ? 'is-invalid' : ''); ?>"
                                name="cell_number" value="<?php echo e(old('cell_number', $patient_inq->cell_number ?? '')); ?>"
                                placeholder="Cell Number" />
                        </div>

                        <?php if($errors->has('cell_number')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('cell_number')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <div class="input-group input-group-lg <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-at"></i>
                                </span>
                            </div>
                            <input type="email"
                                class="form-control form-control-lg <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
                                name="email" value="<?php echo e(old('email', $patient_inq->email ?? '')); ?>"
                                placeholder="Email Address" />
                        </div>

                        <?php if($errors->has('email')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-4">
                     <!--begin::Group-->
                     <div class="form-group">
                         <input type="checkbox" name="remote_patent_status" value="1"  <?php if($patient_inq->remote_patent_status == 1): ?> checked <?php endif; ?>>
                        <label class="form-label">Remote Patent Status</label>
                    </div>
                    <!--end::Group-->
                </div>
                <div class="col-md-12">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Register Link</label>
                        <input disabled
                            class="form-control form-control-lg <?php echo e($errors->has('link') ? 'is-invalid' : ''); ?>"
                            type="text" name="link" placeholder="Register Link"
                            value="<?php echo e(old('link', $patient_inq->link ?? '')); ?>" required />

                        <?php if($errors->has('link')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('link')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-12">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Register Link</label>
                        <div class="form-control form-control-lg" style="height: auto; background-color: rgb(243, 246, 249)">
                            <p>
                                Circumcision Clinic. The following details are needed to book an appointment, Kindly submit your details through this link: <br>
                                <?php echo e(old('link', $patient_inq->link ?? '')); ?> <br>
                                
                                
                                <br>
                                Thanks. <br>
                                Dr Anwar Khan
                            </p>
                        </div>

                        <?php if($errors->has('link')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('link')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                
                <div class="col-md-12 my-2">

                    <!--begin::Group-->
                    <div class="form-group">
                        <?php if($patient_inq->patient_id == null): ?>
                        <button type="submit" class="btn btn-primary mr-2"><?php echo e($patient_inq->id == 0 ? 'Generate' : 'Regenerate'); ?> Link</button>
                        <?php endif; ?>
                        <?php if($patient_inq->id > 0): ?>
                        <button type="submit" class="btn btn-secondary mr-2 btn-send-sms">Send SMS</button>
                        <button type="submit" class="btn btn-secondary mr-2 btn-send-email">Send Email</button>
                        <button type="submit" class="btn btn-secondary mr-2 btn-send-sms_email">Send SMS & Email</button>
                        <?php endif; ?>
                    </div>

                </div>
                
                <?php if($patient_inq->sms_sent_at): ?>
                <div class="col-md-12 my-2">
                    Last SMS Sent on <b><?php echo e(\Carbon\Carbon::parse($patient_inq->sms_sent_at)->toFormattedDateString() . ' ' . \Carbon\Carbon::parse($patient_inq->sms_sent_at)->toTimeString()); ?></b>
                </div>
                <?php endif; ?>
                <?php if($patient_inq->email_sent_at): ?>
                <div class="col-md-12 my-2">
                    Last SMS Sent on <b><?php echo e(\Carbon\Carbon::parse($patient_inq->sms_sent_at)->toFormattedDateString() . ' ' . \Carbon\Carbon::parse($patient_inq->sms_sent_at)->toTimeString()); ?></b>
                </div>
                <?php endif; ?>
            </div>
            <!--end::Row-->

        </form>

    </div>
    <!--begin::Card body-->
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('styles'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script>
    $(document).ready(function () {
        $('.patient-select2').select2({
            ajax: {
                url: '<?php echo e(route("patients.select2")); ?>',
                dataType: 'json'
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        $(document).on('click', 'form [type=submit]', function (e) {
            e.preventDefault();

            if ($(this).hasClass('btn-send-sms')) {
                $('[name="form_type"]').val('sms');
            } else if ($(this).hasClass('btn-send-email')) {
                $('[name="form_type"]').val('email');
            } else if ($(this).hasClass('btn-send-sms_email')) {
                $('[name="form_type"]').val('sms_email');
            } else {
                $('[name="form_type"]').val('submit');
            }

            $(this).closest('form').submit();
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/patient-register/edit.blade.php ENDPATH**/ ?>