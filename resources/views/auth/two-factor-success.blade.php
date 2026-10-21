<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Two-Factor Setup Complete</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="refresh" content="4;url={{ $loginRoute }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ url('/') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ url('/') }}/assets/media/logos/favicon.ico" />
</head>
<body class="bg-white">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
            <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
                <div class="login-form w-100" style="max-width: 520px;">
                    <div class="text-center mb-10 mb-lg-20">
                        <h3 class="font-size-h1">Two-Factor Authentication Enabled</h3>
                        <p class="text-muted font-weight-bold">Your account is now protected with 2FA.</p>
                    </div>
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body text-center">
                            <div class="mb-6">
                                <span class="svg-icon svg-icon-6x svg-icon-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M12 22C17.523 22 22 17.523 22 12C22 6.477 17.523 2 12 2C6.477 2 2 6.477 2 12C2 17.523 6.477 22 12 22Z" fill="#50CD89"/>
                                        <path d="M16.4142 9.41421L11 14.8284L8.58579 12.4142L7.17157 13.8284L11 17.6569L17.8284 10.8284L16.4142 9.41421Z" fill="#50CD89"/>
                                    </svg>
                                </span>
                            </div>
                            <p class="font-size-lg text-dark-75 mb-5">Please wait while we redirect you to the login page.</p>
                            <p class="text-muted">Redirecting in {{ $waitSeconds }} seconds...</p>
                            <a href="{{ $loginRoute }}" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Go to Login Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
