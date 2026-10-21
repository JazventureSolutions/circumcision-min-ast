<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <!--begin::Card body-->
    <div class="card-body">

        <?php
            // dump($audit);
        ?>

        <form id="kt_form" class="form" method="POST" action="<?php echo e(route('patients.appointments.audit.save', ['appointment_id' => $appointment->id ?? 0])); ?>">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id" value="<?php echo e($appointment->id ?? 0); ?>">
            <input type="hidden" name="appointment_id" value="<?php echo e($appointment->id ?? 0); ?>">
            <input type="hidden" name="patient_id" value="<?php echo e($patient->id ?? 0); ?>">

            <!--begin::Row-->
            <div class="row">
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Patient</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('patient') ? 'is-invalid' : ''); ?>"
                            type="text" name="patient" placeholder="Patient"
                            value="<?php echo e($patient->name); ?>" readonly/>

                        <?php if($errors->has('patient')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('patient')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-2">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Appointment Date</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('date') ? 'is-invalid' : ''); ?>"
                            type="text" name="date" placeholder="Appointment Date"
                            value="<?php echo e(old('date', \Carbon\Carbon::parse($appointment->date ?? '')->format('d.m.Y'))); ?>" readonly/>

                        <?php if($errors->has('date')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('date')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-2">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Appointment Time</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('start_time') ? 'is-invalid' : ''); ?>"
                            type="text" name="start_time" placeholder="Appointment Time"
                            value="<?php echo e(old('start_time', $appointment->start_time ?? '')); ?>" readonly/>

                        <?php if($errors->has('start_time')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('start_time')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-2">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Follow Up Date</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('followup_date') ? 'is-invalid' : ''); ?>"
                            type="text" name="followup_date" placeholder="Follow Up Date"
                            value="<?php echo e(old('followup_date', $appointment->followup_date ? \Carbon\Carbon::parse($appointment->followup_date)->format('d.m.Y') : '')); ?>" readonly/>

                        <?php if($errors->has('followup_date')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('followup_date')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Any Other</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('any_other') ? 'is-invalid' : ''); ?>"
                            type="text" name="any_other" placeholder="Any Other"
                            value="<?php echo e(old('any_other', $audit->any_other ?? '')); ?>" />

                        <?php if($errors->has('any_other')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('any_other')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Adhesion</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('adhesion') ? 'is-invalid' : ''); ?>"
                            type="text" name="adhesion" placeholder="Adhesion"
                            value="<?php echo e(old('adhesion', $audit->adhesion ?? '')); ?>" />

                        <?php if($errors->has('adhesion')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('adhesion')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Bleeding</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('bleeding') ? 'is-invalid' : ''); ?>"
                            type="text" name="bleeding" placeholder="Bleeding"
                            value="<?php echo e(old('bleeding', $audit->bleeding ?? '')); ?>" />

                        <?php if($errors->has('bleeding')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('bleeding')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Circumplast</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('circumplast') ? 'is-invalid' : ''); ?>"
                            type="text" name="circumplast" placeholder="Circumplast"
                            value="<?php echo e(old('circumplast', $audit->circumplast ?? '')); ?>" />

                        <?php if($errors->has('circumplast')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('circumplast')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Consultation Only</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('consultation_only') ? 'is-invalid' : ''); ?>"
                            type="text" name="consultation_only" placeholder="Not Done"
                            value="<?php echo e(old('consultation_only', $audit->consultation_only ?? '')); ?>" />

                        <?php if($errors->has('consultation_only')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('consultation_only')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Curve</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('curve') ? 'is-invalid' : ''); ?>"
                            type="text" name="curve" placeholder="curve"
                            value="<?php echo e(old('curve', $audit->curve ?? '')); ?>" />

                        <?php if($errors->has('curve')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('curve')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Chordee</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('chordee') ? 'is-invalid' : ''); ?>"
                            type="text" name="chordee" placeholder="chordee"
                            value="<?php echo e(old('chordee', $audit->chordee ?? '')); ?>" />

                        <?php if($errors->has('chordee')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('chordee')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Comments</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('comments') ? 'is-invalid' : ''); ?>"
                            type="text" name="comments" placeholder="Comments"
                            value="<?php echo e(old('comments', $audit->comments ?? '')); ?>" />

                        <?php if($errors->has('comments')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('comments')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">DNA</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('dna') ? 'is-invalid' : ''); ?>"
                            type="text" name="dna" placeholder="DNA"
                            value="<?php echo e(old('dna', $audit->dna ?? '')); ?>" />

                        <?php if($errors->has('dna')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('dna')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Division of Adhesion</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('division_of_adhesion') ? 'is-invalid' : ''); ?>"
                            type="text" name="division_of_adhesion" placeholder="Division of Adhesion"
                            value="<?php echo e(old('division_of_adhesion', $audit->division_of_adhesion ?? '')); ?>" />

                        <?php if($errors->has('division_of_adhesion')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('division_of_adhesion')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">FU</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('followup') ? 'is-invalid' : ''); ?>"
                            type="text" name="followup" placeholder="FU"
                            value="<?php echo e(old('followup', $audit->followup ?? '')); ?>" />

                        <?php if($errors->has('followup')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('followup')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Fat</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('fat') ? 'is-invalid' : ''); ?>"
                            type="text" name="fat" placeholder="Fat"
                            value="<?php echo e(old('fat', $audit->fat ?? '')); ?>" />

                        <?php if($errors->has('fat')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('fat')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Frenuloplasty</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('frenuloplasty') ? 'is-invalid' : ''); ?>"
                            type="text" name="frenuloplasty" placeholder="frenuloplasty"
                            value="<?php echo e(old('frenuloplasty', $audit->frenuloplasty ?? '')); ?>" />

                        <?php if($errors->has('frenuloplasty')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('frenuloplasty')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->
                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Hypospediasis</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('hypospediasis') ? 'is-invalid' : ''); ?>"
                            type="text" name="hypospediasis" placeholder="Hypospediasis"
                            value="<?php echo e(old('hypospediasis', $audit->hypospediasis ?? '')); ?>" />

                        <?php if($errors->has('hypospediasis')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('hypospediasis')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Hypopaedias</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('hypopaedias') ? 'is-invalid' : ''); ?>"
                            type="text" name="hypopaedias" placeholder="Hypopaedias"
                            value="<?php echo e(old('hypopaedias', $audit->hypopaedias ?? '')); ?>" />

                        <?php if($errors->has('hypopaedias')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('hypopaedias')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Hydrocoele</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('hydrocoele') ? 'is-invalid' : ''); ?>"
                            type="text" name="hydrocoele" placeholder="Hydrocoele"
                            value="<?php echo e(old('hydrocoele', $audit->hydrocoele ?? '')); ?>" />

                        <?php if($errors->has('hydrocoele')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('hydrocoele')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Infection</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('infection') ? 'is-invalid' : ''); ?>"
                            type="text" name="infection" placeholder="Infection"
                            value="<?php echo e(old('infection', $audit->infection ?? '')); ?>" />

                        <?php if($errors->has('infection')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('infection')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Not Done</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('not_done') ? 'is-invalid' : ''); ?>"
                            type="text" name="not_done" placeholder="Not Done"
                            value="<?php echo e(old('not_done', $audit->not_done ?? '')); ?>" />

                        <?php if($errors->has('not_done')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('not_done')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>

                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Not Required</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('not_required') ? 'is-invalid' : ''); ?>"
                            type="text" name="not_required" placeholder="Not Done"
                            value="<?php echo e(old('not_required', $audit->not_required ?? '')); ?>" />

                        <?php if($errors->has('not_required')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('not_required')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Oral</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('oral') ? 'is-invalid' : ''); ?>"
                            type="text" name="oral" placeholder="Oral"
                            value="<?php echo e(old('oral', $audit->oral ?? '')); ?>" />

                        <?php if($errors->has('oral')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('oral')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Peripubic fat</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('peripubic_fat') ? 'is-invalid' : ''); ?>"
                            type="text" name="peripubic_fat" placeholder="Peripubic fat"
                            value="<?php echo e(old('peripubic_fat', $audit->peripubic_fat ?? '')); ?>" />

                        <?php if($errors->has('peripubic_fat')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('peripubic_fat')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>

                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Plastibell</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('plastibell') ? 'is-invalid' : ''); ?>"
                            type="text" name="plastibell" placeholder="Plastibell"
                            value="<?php echo e(old('plastibell', $audit->plastibell ?? '')); ?>" />

                        <?php if($errors->has('plastibell')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('plastibell')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Resection</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('resection') ? 'is-invalid' : ''); ?>"
                            type="text" name="resection" placeholder="Resection"
                            value="<?php echo e(old('resection', $audit->resection ?? '')); ?>" />

                        <?php if($errors->has('resection')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('resection')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>

                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Retained Plastibell</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('retained_plastibell') ? 'is-invalid' : ''); ?>"
                            type="text" name="retained_plastibell" placeholder="Retained Plastibell"
                            value="<?php echo e(old('retained_plastibell', $audit->retained_plastibell ?? '')); ?>" />

                        <?php if($errors->has('retained_plastibell')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('retained_plastibell')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>


                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Residual Skin</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('residual_skin') ? 'is-invalid' : ''); ?>"
                            type="text" name="residual_skin" placeholder="Residual Skin"
                            value="<?php echo e(old('residual_skin', $audit->residual_skin ?? '')); ?>" />

                        <?php if($errors->has('residual_skin')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('residual_skin')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Revisions Follow Ups</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('revisions_follow_ups') ? 'is-invalid' : ''); ?>"
                            type="text" name="revisions_follow_ups" placeholder="Revisions Follow Ups"
                            value="<?php echo e(old('revisions_follow_ups', $audit->revisions_follow_ups ?? '')); ?>" />

                        <?php if($errors->has('revisions_follow_ups')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('revisions_follow_ups')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Redundant Inner Skin</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('redundant_inner_skin') ? 'is-invalid' : ''); ?>"
                            type="text" name="redundant_inner_skin" placeholder="Redundant Inner Skin"
                            value="<?php echo e(old('redundant_inner_skin', $audit->redundant_inner_skin ?? '')); ?>" />

                        <?php if($errors->has('redundant_inner_skin')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('redundant_inner_skin')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Secondary Phimosis</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('secondary_phimosis') ? 'is-invalid' : ''); ?>"
                            type="text" name="secondary_phimosis" placeholder="Secondary Phimosis"
                            value="<?php echo e(old('secondary_phimosis', $audit->secondary_phimosis ?? '')); ?>" />

                        <?php if($errors->has('secondary_phimosis')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('secondary_phimosis')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Soft adhesion</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('soft_adhesion') ? 'is-invalid' : ''); ?>"
                            type="text" name="soft_adhesion" placeholder="Soft adhesion"
                            value="<?php echo e(old('soft_adhesion', $audit->soft_adhesion ?? '')); ?>" />

                        <?php if($errors->has('soft_adhesion')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('soft_adhesion')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>


                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Torsion</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('torsion') ? 'is-invalid' : ''); ?>"
                            type="text" name="torsion" placeholder="Torsion"
                            value="<?php echo e(old('torsion', $audit->torsion ?? '')); ?>" />

                        <?php if($errors->has('torsion')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('torsion')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>




                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Topical</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('topical') ? 'is-invalid' : ''); ?>"
                            type="text" name="topical" placeholder="Topical"
                            value="<?php echo e(old('topical', $audit->topical ?? '')); ?>" />

                        <?php if($errors->has('topical')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('topical')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>




                <div class="col-md-3">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Without father</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('without_father') ? 'is-invalid' : ''); ?>"
                            type="text" name="without_father" placeholder="Without father"
                            value="<?php echo e(old('without_father', $audit->without_father ?? '')); ?>" />

                        <?php if($errors->has('without_father')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('without_father')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>

                <div class="col-md-3">
                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Webbed Penis</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('webbed_penis') ? 'is-invalid' : ''); ?>"
                            type="text" name="webbed_penis" placeholder="Webbed Penis"
                            value="<?php echo e(old('webbed_penis', $audit->webbed_penis ?? '')); ?>" />

                        <?php if($errors->has('webbed_penis')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('webbed_penis')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

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

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/patients/appointments/audit/edit.blade.php ENDPATH**/ ?>