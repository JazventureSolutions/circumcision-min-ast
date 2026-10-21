<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Two-Factor Authentication | Circumcision Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="<?php echo e(url('/')); ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(url('/')); ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?php echo e(url('/')); ?>/assets/media/logos/favicon.ico" />
</head>
<body class="bg-white">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
            <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
                <div class="login-form login-signin w-100" style="max-width: 420px;">
                    <div class="text-center mb-10 mb-lg-20">
                        <h3 class="font-size-h1">Two-Factor Authentication</h3>
                        <p class="text-muted font-weight-bold">Enter your authentication code from your authenticator app.</p>
                    </div>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form class="form" method="POST" action="<?php echo e(route('2fa.verify')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-5">
                            <input class="form-control form-control-solid h-auto py-5 px-6" type="text"
                                placeholder="Authentication code" name="code" autocomplete="off" autofocus />
                        </div>
                        <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/auth/two-factor-challenge.blade.php ENDPATH**/ ?>