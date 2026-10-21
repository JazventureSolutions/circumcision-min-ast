<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo e(($manage ?? false) ? 'Two-Factor Settings' : 'Two-Factor Setup'); ?> | Circumcision Clinic</title>
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
                <div class="login-form w-100" style="max-width: 520px;">
                    <div class="text-center mb-10 mb-lg-20">
                        <h3 class="font-size-h1"><?php echo e(($manage ?? false) ? 'Two-Factor Authentication Settings' : 'Two-Factor Authentication Setup'); ?></h3>
                        <p class="text-muted font-weight-bold">
                            <?php echo e(($manage ?? false) ? 'Manage your two-factor authentication settings.' : 'Scan the QR code or enter the secret into your authenticator app.'); ?>

                        </p>
                    </div>

                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert"><?php echo e(session('status')); ?></div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if(! $enabled): ?>
                        <div class="alert alert-info" role="alert">
                            Scan the QR code with your authenticator app, or enter the secret key manually if needed.
                        </div>
                    <?php endif; ?>

                    <?php if($enabled): ?>
                        <div class="alert alert-success">Two-factor authentication is enabled for your account.</div>
                        <form method="POST" action="<?php echo e(route('2fa.disable')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-danger font-weight-bold px-9 py-4 my-3">Disable Two-Factor Authentication</button>
                        </form>
                    <?php else: ?>
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-body">
                                <div class="text-center mb-8">
                                    <div class="d-inline-flex align-items-center justify-content-center"
                                         style="width:220px; height:220px; background:#ffffff; border-radius:16px; box-shadow:0 0 0 1px rgba(0,0,0,.05);">
                                        <img src="<?php echo e($qrCodeUrl); ?>" alt="TOTP QR Code"
                                             style="width:200px; height:200px; display:block;" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Secret Key</label>
                                    <input type="text" readonly class="form-control form-control-solid" value="<?php echo e($secret); ?>" />
                                </div>
                                <div class="mt-5">
                                    <p class="text-muted">Enter the 6-digit code from your authenticator app to enable two-factor authentication.</p>
                                </div>
                                <form method="POST" action="<?php echo e(route('2fa.setup')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group mb-5">
                                        <input class="form-control form-control-solid h-auto py-5 px-6" type="text"
                                            placeholder="Authentication code" name="code" autocomplete="off" autofocus />
                                    </div>
                                    <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Enable Two-Factor Authentication</button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/auth/two-factor-setup.blade.php ENDPATH**/ ?>