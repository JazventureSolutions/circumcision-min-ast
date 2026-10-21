

<?php $__env->startSection('content'); ?>

<div class="card card-custom">
    <!--begin::Card body-->
    <div class="card-body">

        <form id="kt_form" class="form" method="POST" action="<?php echo e(route('settings.templates.store')); ?>">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id" value="<?php echo e($template->id ?? 0); ?>">

            <!--begin::Row-->
            <div class="row">
                <div class="col-md-6">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Template Name</label>
                        <input class="form-control form-control-lg <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text"
                            name="name" placeholder="Template Name" value="<?php echo e(old('name', $template->name ?? '')); ?>" disabled />

                        <?php if($errors->has('name')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-12">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Template Variables</label>
                        <textarea name="variables" class="form-control form-control-lg <?php echo e($errors->has('variables') ? 'is-invalid' : ''); ?>" disabled><?php echo e(old('variables', $template->variables ?? '')); ?></textarea>
                    </div>
                    <!--end::Group-->

                </div>
                <div class="col-md-12">

                    <!--begin::Group-->
                    <div class="form-group">
                        <label class="form-label">Template HTML</label>

                        <textarea id="htmlEditor" name="html"><?php echo old('html', $template->html ?? ''); ?></textarea>

                        <?php if($errors->has('html')): ?>
                        <span class=" invalid-feedback"><?php echo e($errors->first('html')); ?></span>
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

<script src="https://cdn.tiny.cloud/1/2me38emy24f0gwihie60kmho6as74v8zdoq7vkabuw1egag1/tinymce/8/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(document).ready(function () {
        // var editor = ClassicEditor
		// 	.create(document.querySelector('#htmlEditor'))
		// 	.then(editor => {
		// 		console.log(editor);
        //         $(document).on('submit', '#kt_form', function (e) {
        //             $('[name="html"]').val(editor.getData());
        //         });
		// 	})
		// 	.catch(error => {
		// 		console.error(error);
		// 	});

        tinymce.init({
            selector: '#htmlEditor',
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_mode: 'wrap',
            toolbar_sticky: false,
            browser_spellcheck: true,
            resize: false,
            object_resizing: false,
            contextmenu: 'link image imagetools table',
        });

        // $(document).on('click', 'input[type="checkbox"]', function () {
        //     alert('df');
        //     $(this).attr('checked', true);
        // });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/settings/templates/edit.blade.php ENDPATH**/ ?>