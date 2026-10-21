<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Two-Factor Authentication Settings | Circumcision Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
                        <h3 class="font-size-h1">Two-Factor Authentication Settings</h3>
                        <p class="text-muted font-weight-bold">Manage your authenticated access and disable MFA if you no longer want to use it.</p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (! $enabled)
                        <div class="alert alert-info" role="alert">
                            MFA is not enabled for your account yet. Scan the QR code below to set it up.
                        </div>
                    @else
                        <div class="alert alert-success" role="alert">
                            MFA is enabled on your account. Use the button below to disable it.
                        </div>
                    @endif

                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body">
                            <div class="text-center mb-8">
                                <div class="d-inline-flex align-items-center justify-content-center"
                                     style="width:220px; height:220px; background:#ffffff; border-radius:16px; box-shadow:0 0 0 1px rgba(0,0,0,.05);">
                                    <img src="{{ $qrCodeUrl }}" alt="TOTP QR Code"
                                         style="width:200px; height:200px; display:block;" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Secret Key</label>
                                <input type="text" readonly class="form-control form-control-solid" value="{{ $secret }}" />
                            </div>

                            @if ($enabled)
                                <form method="POST" action="{{ route('2fa.disable') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger font-weight-bold px-9 py-4 my-3">Disable Two-Factor Authentication</button>
                                </form>
                            @else
                                <div class="mt-5">
                                    <p class="text-muted">Enter the 6-digit code from your authenticator app to enable two-factor authentication.</p>
                                </div>
                                <form method="POST" action="{{ route('2fa.setup') }}">
                                    @csrf
                                    <div class="form-group mb-5">
                                        <input class="form-control form-control-solid h-auto py-5 px-6" type="text"
                                            placeholder="Authentication code" name="code" autocomplete="off" autofocus />
                                    </div>
                                    <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Enable Two-Factor Authentication</button>
                                </form>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
