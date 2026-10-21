

<?php $__env->startSection('content'); ?>

<div class="card">
    <!--begin::Card body-->
    <div class="card-body">

      <?php if($header_html): ?>
        <div class="card mt-6">
            <div class="card-body">
                <?php echo $header_html; ?>

            </div>
        </div>
        <?php endif; ?>
        <h3 class="text-center mt-4">Patient Registration</h3>
        <div class="card mt-6">
            <div class="card-body PatientTypeText">
                IN CASE OF CHILDREN: Please remember both parents must attend clinic on the day of procedure. We need photo ID documents for both parents and ID for the child such as birth certificate, red book, hospital bands, passport, resident permit. We will not perform any procedure if the above are not provided on the day.
            </div>
        </div>

       

        <form id="kt_form" class="form mt-6" method="POST" action="<?php echo e(url()->current()); ?>">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id" value="<?php echo e($patient->id ?? 0); ?>">
            

            <!--begin::Row-->
            <div class="row">
                
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Patient’s Full name</label>
                        <input
                            class="form-control form-control-lg <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>"
                            type="text" name="name" placeholder="Patient’s Full name"
                            value="<?php echo e(old('name', $patient->name ?? '')); ?>" required />
                        <span class="text-muted">Please enter full name, including first name, middle name and last name</span>

                        <?php if($errors->has('name')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Date Of Birth</label>
                        <input
                            class="form-control form-control-lg <?php echo e($errors->has('date_of_birth') ? 'is-invalid' : ''); ?>"
                            type="date" name="date_of_birth" placeholder="Date Of Birth"
                            value="<?php echo e(old('date_of_birth', $patient->date_of_birth ?? '')); ?>" required />

                        <?php if($errors->has('date_of_birth')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('date_of_birth')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Your Weight</label>
                        <div
                            class="input-group input-group-lg <?php echo e($errors->has('weight_of_child') ? 'is-invalid' : ''); ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-weight-hanging"></i>
                                </span>
                            </div>
                            <input type="number"
                                class="form-control form-control-lg <?php echo e($errors->has('weight_of_child') ? 'is-invalid' : ''); ?>"
                                name="weight_of_child"
                                value="<?php echo e(old('weight_of_child', $patient->weight_of_child ?? '')); ?>"
                                step="any"
                                placeholder="Your Weight" />
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    kg
                                </span>
                            </div>
                        </div>

                        <?php if($errors->has('weight_of_child')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('weight_of_child')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Patient Type</label>

                        

                        <select class="form-control form-control-lg <?php echo e($errors->has('type') ? 'is-invalid' : ''); ?> basic-select2"
                            name="type" placeholder="Patient Type" required>
                            <?php $__currentLoopData = $patient_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeKey => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type['value']); ?>" data-text="<?php echo e($type['text']); ?>"  <?php echo e((old('type', $patient->type) == $type['value']) ? 'selected' : ''); ?>>
                                <?php echo e($type['name']); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('type')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('type')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Mobile</label>
                        <div
                            class="input-group input-group-lg <?php echo e($errors->has('cell_number') ? 'is-invalid' : ''); ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-phone"></i>
                                </span>
                            </div>
                            <input type="tel"
                                class="form-control form-control-lg <?php echo e($errors->has('cell_number') ? 'is-invalid' : ''); ?>"
                                name="cell_number" value="<?php echo e(old('cell_number', $patient->cell_number ?? '')); ?>"
                                placeholder="Mobile" required />
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
                        <label class="form-label">House Telephone</label>
                        <div class="input-group input-group-lg <?php echo e($errors->has('phone') ? 'is-invalid' : ''); ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-phone"></i>
                                </span>
                            </div>
                            <input type="tel"
                                class="form-control form-control-lg <?php echo e($errors->has('phone') ? 'is-invalid' : ''); ?>"
                                name="phone" value="<?php echo e(old('phone', $patient->phone ?? '')); ?>"
                                placeholder="House Telephone" required/>
                        </div>

                        <?php if($errors->has('phone')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('phone')); ?></span>
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
                                name="email" value="<?php echo e(old('email', $patient->email ?? '')); ?>"
                                placeholder="Email Address" required/>
                        </div>

                        <?php if($errors->has('email')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('email')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">House #</label>
                        <div class="input-group input-group-lg <?php echo e($errors->has('house_no') ? 'is-invalid' : ''); ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-home"></i>
                                </span>
                            </div>
                            <input type="text"
                                class="form-control form-control-lg <?php echo e($errors->has('house_no') ? 'is-invalid' : ''); ?>"
                                name="house_no" value="<?php echo e(old('house_no', $patient->house_no ?? '')); ?>"
                                placeholder="House #" required/>
                        </div>

                        <?php if($errors->has('house_no')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('house_no')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Street/Road Name</label>
                        <div class="input-group input-group-lg <?php echo e($errors->has('street') ? 'is-invalid' : ''); ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-home"></i>
                                </span>
                            </div>
                            <input type="text"
                                class="form-control form-control-lg <?php echo e($errors->has('street') ? 'is-invalid' : ''); ?>"
                                name="street" value="<?php echo e(old('street', $patient->street ?? '')); ?>"
                                placeholder="Street/Road Name" required/>
                        </div>

                        <?php if($errors->has('street')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('street')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Town/City</label>
                        <div class="input-group input-group-lg <?php echo e($errors->has('city') ? 'is-invalid' : ''); ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-home"></i>
                                </span>
                            </div>
                            <input type="text"
                                class="form-control form-control-lg <?php echo e($errors->has('city') ? 'is-invalid' : ''); ?>"
                                name="city" value="<?php echo e(old('city', $patient->city ?? '')); ?>"
                                placeholder="Town/City" required/>
                        </div>

                        <?php if($errors->has('city')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('city')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Post Code</label>
                        <div class="input-group input-group-lg <?php echo e($errors->has('post_code') ? 'is-invalid' : ''); ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-home"></i>
                                </span>
                            </div>
                            <input type="text"
                                class="form-control form-control-lg <?php echo e($errors->has('post_code') ? 'is-invalid' : ''); ?>"
                                name="post_code" value="<?php echo e(old('post_code', $patient->post_code ?? '')); ?>"
                                placeholder="Post Code" required/>
                        </div>

                        <?php if($errors->has('post_code')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('post_code')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-6 hide-new_born hide-old_boy">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Next of Kin</label>
                        <input
                            class="form-control form-control-lg <?php echo e($errors->has('next_kin') ? 'is-invalid' : ''); ?>"
                            type="text" name="next_kin" placeholder="Next of Kin"
                            value="<?php echo e(old('next_kin', $patient->next_kin ?? '')); ?>" />

                        <?php if($errors->has('next_kin')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('next_kin')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-6 hide-new_born hide-old_boy">
                <div class="form-group">
                    <label class="form-label">Next of Kin Relationship</label>
                    <input
                        class="form-control form-control-lg <?php echo e($errors->has('next_kin_relationship') ? 'is-invalid' : ''); ?>"
                        type="text" name="next_kin_relationship" placeholder="Next of Kin Relationship "
                        value="<?php echo e(old('next_kin_relationship', $patient->next_kin_relationship ?? '')); ?>" />


                    <?php if($errors->has('next_kin_relationship')): ?>
                    <span class=" invalid-feedback"><?php echo e($errors->first('next_kin_relationship')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 hide-new_born hide-old_boy">
                <div class="form-group">
                    <label class="form-label">Next of Kin Address</label>
                    <input
                        class="form-control form-control-lg <?php echo e($errors->has('next_kin_address') ? 'is-invalid' : ''); ?>"
                        type="text" name="next_kin_address" placeholder="Next of Kin Address "
                        value="<?php echo e(old('next_kin_address', $patient->next_kin_address ?? '')); ?>" />


                    <?php if($errors->has('next_kin_address')): ?>
                    <span class=" invalid-feedback"><?php echo e($errors->first('next_kin_address')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6 hide-new_born hide-old_boy">
                <div class="form-group">
                    <label class="form-label">Next of Kin Mobile</label>
                    <input
                        class="form-control form-control-lg <?php echo e($errors->has('next_kin_phone') ? 'is-invalid' : ''); ?>"
                        type="text" name="next_kin_phone" placeholder="Next of Kin Mobile "
                        value="<?php echo e(old('next_kin_phone', $patient->next_kin_phone ?? '')); ?>" />


                    <?php if($errors->has('next_kin_phone')): ?>
                    <span class=" invalid-feedback"><?php echo e($errors->first('next_kin_phone')); ?></span>
                    <?php endif; ?>
                </div>
                </div>
                <div class="col-md-6 hide-adult">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Father Name</label>
                        <input
                            class="form-control form-control-lg <?php echo e($errors->has('father_name') ? 'is-invalid' : ''); ?>"
                            type="text" name="father_name" placeholder="Father Name"
                            value="<?php echo e(old('father_name', $patient->father_name ?? '')); ?>"/>
                        <span class="text-muted">Please enter full name, including first name, middle name and last name</span>

                        <?php if($errors->has('father_name')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('father_name')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-6 hide-adult">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Mother Name</label>
                        <input
                            class="form-control form-control-lg <?php echo e($errors->has('mother_name') ? 'is-invalid' : ''); ?>"
                            type="text" name="mother_name" placeholder="Mother Name"
                            value="<?php echo e(old('mother_name', $patient->mother_name ?? '')); ?>"/>
                        <span class="text-muted">Please enter full name, including first name, middle name and last name</span>

                        <?php if($errors->has('mother_name')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('mother_name')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-12">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">GP Details</label>
                        <textarea name="gp_details"
                            class="form-control form-control-lg <?php echo e($errors->has('gp_details') ? 'is-invalid' : ''); ?>" required><?php echo e(old('gp_details', $patient->gp_details ?? '')); ?></textarea>

                        <?php if($errors->has('gp_details')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('gp_details')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Appointment Type</label>

                        

                        <select class="form-control form-control-lg <?php echo e($errors->has('appoint_type') ? 'is-invalid' : ''); ?> basic-select2"
                            name="appoint_type" placeholder="Appointment Type" required>
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
                <div class="col-md-6">
                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Appointment Reason</label>
                        <textarea name="Appoint_reason"
                        class="form-control form-control-lg <?php echo e($errors->has('Appoint_reason') ? 'is-invalid' : ''); ?>" required><?php echo e(old('Appoint_reason', $patient->Appoint_reason ?? '')); ?></textarea>

                    <?php if($errors->has('Appoint_reason')): ?>
                    <span class=" invalid-feedback"><?php echo e($errors->first('Appoint_reason')); ?></span>
                    <?php endif; ?>
                    </div>
                    <!--end::Group-->
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group <?php echo e($errors->has('branch_id') ? 'is-invalid' : ''); ?>">
                        <label class="form-label">Appointment City</label>

                        <select class="form-control form-control-lg <?php echo e($errors->has('branch_id') ? 'is-invalid' : ''); ?> basic-select2"
                            name="branch_id" placeholder="Appointment City" required>
                            <option value="">Select</option>
                            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branchKey => $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($branchKey); ?>" <?php echo e((old('branch_id', $patient->branch_id) == $branchKey) ? 'selected' : ''); ?>><?php echo e($branch); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('branch_id')): ?>
                        <span class=" invalid-feedback">The Appointment City is required.</span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>

                
                <div class="col-md-12 my-2">

                    <!--begin::Group-->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
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

<script>
    $(document).ready(function () {
        onUserTypeChange();
    });

    function onUserTypeChange () {
        var selectedOption = $('[name="type"] option:selected');
        var selected_type = $('[name="type"]').val() ?? 'adult';
        var selectedDataText = selectedOption.data('text');
        var pat_type =  selected_type.replace(/_/g, ' ');
        var formatted = pat_type
            .toLowerCase()
            .split(' ')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ');
        $('.PatientType').text(formatted);
        $('.PatientTypeText').text(selectedDataText);
        console.log(selectedDataText);
        switch (selected_type) {
            case 'adult':
                $('.hide-adult').hide();
                $('.hide-old_boy').show();
                $('.hide-new_born').show();
                //
                $('.hide-adult input').removeAttr('required');
                $('.hide-old_boy input').attr('required', true);
                $('.hide-new_born input').attr('required', true);
                break;

            case 'minor_surgery_ms':
                $('.hide-adult').hide();
                $('.hide-old_boy').show();
                $('.hide-new_born').show();
                //
                $('.hide-adult input').removeAttr('required');
                $('.hide-old_boy input').attr('required', true);
                $('.hide-new_born input').attr('required', true);
                break;

            case 'aesthetics_botox':
                $('.hide-adult').hide();
                $('.hide-old_boy').show();
                $('.hide-new_born').show();
                //
                $('.hide-adult input').removeAttr('required');
                $('.hide-old_boy input').attr('required', true);
                $('.hide-new_born input').attr('required', true);
                break;

            case 'aesthetics_filler':
                $('.hide-adult').hide();
                $('.hide-old_boy').show();
                $('.hide-new_born').show();
                //
                $('.hide-adult input').removeAttr('required');
                $('.hide-old_boy input').attr('required', true);
                $('.hide-new_born input').attr('required', true);
                break;

            case 'aesthetics_mesotherapy':
                $('.hide-adult').hide();
                $('.hide-old_boy').show();
                $('.hide-new_born').show();
                //
                $('.hide-adult input').removeAttr('required');
                $('.hide-old_boy input').attr('required', true);
                $('.hide-new_born input').attr('required', true);
                break;

            case 'minor_surgery_vasc':
                $('.hide-adult').hide();
                $('.hide-old_boy').show();
                $('.hide-new_born').show();
                //
                $('.hide-adult input').removeAttr('required');
                $('.hide-old_boy input').attr('required', true);
                $('.hide-new_born input').attr('required', true);
                break;
            
            default:
                $('.hide-adult').show();
                $('.hide-old_boy').hide();
                $('.hide-new_born').hide();
                //
                $('.hide-adult input').attr('required', true);
                 $('.hide-old_boy input').removeAttr('required');
                 $('.hide-new_born input').removeAttr('required');
                break;
        }
    }

    $(document).on('change', '[name="type"]', onUserTypeChange);
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default-simple', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/patient-register/register.blade.php ENDPATH**/ ?>