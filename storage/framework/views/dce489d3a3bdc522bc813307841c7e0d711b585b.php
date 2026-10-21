<?php $__env->startSection('content'); ?>
<?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session()->get('success')); ?>

    </div>
<?php endif; ?>
<div class="card card-custom">
    <!--begin::Card body-->
    <div class="card-body">

        <form id="kt_form" class="form" method="POST" action="<?php echo e(route('patients.appointments.feedback.store', ['appointment_id' => $appointment->id ?? 0])); ?>">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id" value="<?php echo e($appointment->id ?? 0); ?>">
            <input type="hidden" name="appointment_id" value="<?php echo e($appointment->id ?? 0); ?>">
            <input type="hidden" name="patient_id" value="<?php echo e($patient->id ?? 0); ?>">

            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">

                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                        style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>How much satisfied were you with the following:</th>
                                <th>Very Satisfied</th>
                                <th>Satisfied</th>
                                <th>Dissatisfied</th>
                                <th>Very Dissatisfied</th>
                            </tr>
                            <tr>
                                <td>Environment / Hygiene of the clinic</td>
                                <td><input type="radio" name="feedback[environment_hygiene_clinic]" id="feedback[environment_hygiene_clinic]" value="Very Satisfied" <?php echo e(old('feedback.environment_hygiene_clinic', $feedback->environment_hygiene_clinic) == "Very Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[environment_hygiene_clinic]" id="feedback[environment_hygiene_clinic]" value="Satisfied" <?php echo e(old('feedback.environment_hygiene_clinic', $feedback->environment_hygiene_clinic) == "Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[environment_hygiene_clinic]" id="feedback[environment_hygiene_clinic]" value="Dissatisfied" <?php echo e(old('feedback.environment_hygiene_clinic', $feedback->environment_hygiene_clinic) == "Dissatisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[environment_hygiene_clinic]" id="feedback[environment_hygiene_clinic]" value="Very Dissatisfied" <?php echo e(old('feedback.environment_hygiene_clinic', $feedback->environment_hygiene_clinic) == "Very Dissatisfied" ? "checked" : ""); ?>></td>
                            </tr>
                            <tr>
                                <td>Attitude of the staff</td>
                                <td><input type="radio" name="feedback[attitude_staff]" id="feedback[attitude_staff]" value="Very Satisfied" <?php echo e(old('feedback.attitude_staff', $feedback->attitude_staff) == "Very Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[attitude_staff]" id="feedback[attitude_staff]" value="Satisfied" <?php echo e(old('feedback.attitude_staff', $feedback->attitude_staff) == "Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[attitude_staff]" id="feedback[attitude_staff]" value="Dissatisfied" <?php echo e(old('feedback.attitude_staff', $feedback->attitude_staff) == "Dissatisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[attitude_staff]" id="feedback[attitude_staff]" value="Very Dissatisfied" <?php echo e(old('feedback.attitude_staff', $feedback->attitude_staff) == "Very Dissatisfied" ? "checked" : ""); ?>></td>
                            </tr>
                            <tr>
                                <td>Pre-op Counselling and consultation</td>
                                <td><input type="radio" name="feedback[pre_op_counselling_consultation]" id="feedback[pre_op_counselling_consultation]" value="Very Satisfied" <?php echo e(old('feedback.pre_op_counselling_consultation', $feedback->pre_op_counselling_consultation) == "Very Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[pre_op_counselling_consultation]" id="feedback[pre_op_counselling_consultation]" value="Satisfied" <?php echo e(old('feedback.pre_op_counselling_consultation', $feedback->pre_op_counselling_consultation) == "Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[pre_op_counselling_consultation]" id="feedback[pre_op_counselling_consultation]" value="Dissatisfied" <?php echo e(old('feedback.pre_op_counselling_consultation', $feedback->pre_op_counselling_consultation) == "Dissatisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[pre_op_counselling_consultation]" id="feedback[pre_op_counselling_consultation]" value="Very Dissatisfied" <?php echo e(old('feedback.pre_op_counselling_consultation', $feedback->pre_op_counselling_consultation) == "Very Dissatisfied" ? "checked" : ""); ?>></td>
                            </tr>
                            <tr>
                                <td>Doctor’s conduct and expertise</td>
                                <td><input type="radio" name="feedback[doctors_conduct_expertise]" id="feedback[doctors_conduct_expertise]" value="Very Satisfied" <?php echo e(old('feedback.doctors_conduct_expertise', $feedback->doctors_conduct_expertise) == "Very Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[doctors_conduct_expertise]" id="feedback[doctors_conduct_expertise]" value="Satisfied" <?php echo e(old('feedback.doctors_conduct_expertise', $feedback->doctors_conduct_expertise) == "Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[doctors_conduct_expertise]" id="feedback[doctors_conduct_expertise]" value="Dissatisfied" <?php echo e(old('feedback.doctors_conduct_expertise', $feedback->doctors_conduct_expertise) == "Dissatisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[doctors_conduct_expertise]" id="feedback[doctors_conduct_expertise]" value="Very Dissatisfied" <?php echo e(old('feedback.doctors_conduct_expertise', $feedback->doctors_conduct_expertise) == "Very Dissatisfied" ? "checked" : ""); ?>></td>
                            </tr>
                            <tr>
                                <td>Post-operative after care advice</td>
                                <td><input type="radio" name="feedback[post_operative_care_advice]" id="feedback[post_operative_care_advice]" value="Very Satisfied" <?php echo e(old('feedback.post_operative_care_advice', $feedback->post_operative_care_advice) == "Very Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[post_operative_care_advice]" id="feedback[post_operative_care_advice]" value="Satisfied" <?php echo e(old('feedback.post_operative_care_advice', $feedback->post_operative_care_advice) == "Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[post_operative_care_advice]" id="feedback[post_operative_care_advice]" value="Dissatisfied" <?php echo e(old('feedback.post_operative_care_advice', $feedback->post_operative_care_advice) == "Dissatisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[post_operative_care_advice]" id="feedback[post_operative_care_advice]" value="Very Dissatisfied" <?php echo e(old('feedback.post_operative_care_advice', $feedback->post_operative_care_advice) == "Very Dissatisfied" ? "checked" : ""); ?>></td>
                            </tr>
                            <tr>
                                <td>Outcome / result of the procedure</td>
                                <td><input type="radio" name="feedback[outcome_result_procedure]" id="feedback[outcome_result_procedure]" value="Very Satisfied" <?php echo e(old('feedback.outcome_result_procedure', $feedback->outcome_result_procedure) == "Very Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[outcome_result_procedure]" id="feedback[outcome_result_procedure]" value="Satisfied" <?php echo e(old('feedback.outcome_result_procedure', $feedback->outcome_result_procedure) == "Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[outcome_result_procedure]" id="feedback[outcome_result_procedure]" value="Dissatisfied" <?php echo e(old('feedback.outcome_result_procedure', $feedback->outcome_result_procedure) == "Dissatisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[outcome_result_procedure]" id="feedback[outcome_result_procedure]" value="Very Dissatisfied" <?php echo e(old('feedback.outcome_result_procedure', $feedback->outcome_result_procedure) == "Very Dissatisfied" ? "checked" : ""); ?>></td>
                            </tr>
                            <tr>
                                <td>Efficacy of the post-operative follow up</td>
                                <td><input type="radio" name="feedback[efficacy_post_operative_follow]" id="feedback[efficacy_post_operative_follow]" value="Very Satisfied" <?php echo e(old('feedback.efficacy_post_operative_follow', $feedback->efficacy_post_operative_follow) == "Very Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[efficacy_post_operative_follow]" id="feedback[efficacy_post_operative_follow]" value="Satisfied" <?php echo e(old('feedback.efficacy_post_operative_follow', $feedback->efficacy_post_operative_follow) == "Satisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[efficacy_post_operative_follow]" id="feedback[efficacy_post_operative_follow]" value="Dissatisfied" <?php echo e(old('feedback.efficacy_post_operative_follow', $feedback->efficacy_post_operative_follow) == "Dissatisfied" ? "checked" : ""); ?>></td>
                                <td><input type="radio" name="feedback[efficacy_post_operative_follow]" id="feedback[efficacy_post_operative_follow]" value="Very Dissatisfied" <?php echo e(old('feedback.efficacy_post_operative_follow', $feedback->efficacy_post_operative_follow) == "Very Dissatisfied" ? "checked" : ""); ?>></td>
                            </tr>

                            <tr>
                                <td>Would you recommend this service to your family and friends?</td>
                                <td><input type="radio" name="feedback[recommend]" id="feedback[recommend]" value="Yes" <?php echo e(old('feedback.recommend', $feedback->recommend) == "Yes" ? "checked" : ""); ?>> Yes</td>
                                <td><input type="radio" name="feedback[recommend]" id="feedback[recommend]" value="No" <?php echo e(old('feedback.recommend', $feedback->recommend) == "No" ? "checked" : ""); ?>> No</td>
                            </tr>

                            <tr>
                                <td>Any remarks!</td>
                                <td colspan="4" rowspan="2">
                                    <textarea name="remarks"
                                        class="form-control form-control-lg <?php echo e($errors->has('remarks') ? 'is-invalid' : ''); ?>"><?php echo e(old('remarks', $feedback->remarks ?? "")); ?></textarea>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <!--end: Datatable-->

                </div>
                <div class="col-md-12 my-2">

                    <!--begin::Group-->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>

                </div>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/patients/appointments/feedback/edit.blade.php ENDPATH**/ ?>