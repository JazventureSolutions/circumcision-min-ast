@extends('layouts.default')

@section('content')
    <div class="card card-custom">
        <!--begin::Card body-->
        <div class="card-body">

            <!--begin::Patient Selection-->
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Select Patient</label>
                        <select class="form-control form-control-lg patient-select2" name="patient_id" id="patient_id">
                            @if ($patient)
                                <option value="{{ $patient->id }}" selected>{{ $patient->name }}</option>
                            @else
                                <option value="">Select Patient</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-group">
                        <a href="{{ route('patients.add') }}" class="btn btn-light-primary" target="_blank">
                            <i class="fas fa-plus"></i> Add New Patient
                        </a>
                    </div>
                </div>
            </div>
            <!--end::Patient Selection-->

            <!--begin::Face Map-->
            <div class="face-map-container">
                <img src="{{ url('/') }}/assets/media/botox-img.jpeg" alt="Botox Face Map" style="width: 800px; max-width: 100%;" />

                @foreach($pointsConfig as $point)
                    @php
                        $existingData = $existingPoints[$point['code']] ?? null;
                    @endphp
                    <div class="botox-point {{ $point['code'] }}" data-point-no="{{ $point['point_no'] }}" data-code="{{ $point['code'] }}">
                        <a href="javascript:void(0);" class="point-link {{ $point['code'] }}-link" data-placement="auto">
                            <span class="point-number">&nbsp;</span>
                        </a>
                    </div>
                    <div id="popover-{{ $point['code'] }}" style="display:none;">
                        <div class="popover-content-inner">
                            <div class="form-group mb-3">
                                <label class="form-label font-weight-bold">{{ $point['label'] }}</label>
                                <input type="text" class="form-control form-control-sm point-title" 
                                    name="title_{{ $point['code'] }}" 
                                    value="{{ $existingData['title'] ?? '' }}" 
                                    placeholder="Enter title">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control form-control-sm point-description" 
                                    name="description_{{ $point['code'] }}" 
                                    rows="3" 
                                    placeholder="Enter description">{{ $existingData['description'] ?? '' }}</textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-primary save-point-btn" 
                                    data-point-no="{{ $point['point_no'] }}" 
                                    data-code="{{ $point['code'] }}">
                                    <i class="fas fa-save mr-1"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--end::Face Map-->

            <!--begin::Color Legend-->
            <div class="mt-4 mb-4">
                <span class="mr-4">
                    <span style="display: inline-block; width: 16px; height: 16px; background-color: #3699FF; border-radius: 50%; vertical-align: middle;"></span>
                    <span class="ml-1">Not filled</span>
                </span>
                <span>
                    <span style="display: inline-block; width: 16px; height: 16px; background-color: #1BC5BD; border-radius: 50%; vertical-align: middle;"></span>
                    <span class="ml-1">Data saved</span>
                </span>
            </div>
            <!--end::Color Legend-->

            <!--begin::Legend-->
            <div class="mt-5">
                <h5 class="mb-3">Botox Injection Areas:</h5>
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li><strong>1.</strong> Forehead Lines (5-15 Units)</li>
                            <li><strong>2.</strong> Frown Lines (15-30 Units)</li>
                            <li><strong>3.</strong> Crow's Feet Left (9-15 Units)</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li><strong>4.</strong> Crow's Feet Right (9-15 Units)</li>
                            <li><strong>5.</strong> Bunny Lines (5-10 Units)</li>
                            <li><strong>6.</strong> Gummy Smile (1-3 Units/Side)</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li><strong>7.</strong> Masseter Left (15-30 Units)</li>
                            <li><strong>8.</strong> Masseter Right (15-30 Units)</li>
                            <li><strong>9.</strong> Vertical Lip Lines (2-8 Units)</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-unstyled">
                            <li><strong>10.</strong> Smile Lift Left (3-5 Units)</li>
                            <li><strong>11.</strong> Smile Lift Right (3-5 Units)</li>
                            <li><strong>12.</strong> Dimpled Chin (6-10 Units)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end::Legend-->

        </div>
        <!--end::Card body-->
    </div>
@endsection


@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.css">
    <style>
        .face-map-container {
            margin: 0 auto;
            display: block;
            position: relative; 
            display: inline-block;
            padding-top: 45px;
            margin-top: -45px;
            padding-left: 30px;
            margin-left: -30px;
        }

        .botox-point {
            position: absolute;
            width: 15px;
            height: 15px;
            background-color: #3699FF;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
        }

        .botox-point:hover {
            transform: scale(1.3);
            background-color: #187DE4;
        }

        .botox-point.has-data {
            background-color: #1BC5BD !important;
            border-color: #0d9488;
        }

        .botox-point.has-data:hover {
            background-color: #14a89e !important;
            transform: scale(1.3);
        }

        .botox-point .point-link {
            display: flex;
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .botox-point .point-number {
            color: #fff;
            font-size: 9px;
            font-weight: bold;
        }

        /* Forehead Lines Points (fh1-fh7) */
        .botox-point.fh1 { top: 190px; left: 240px; }
        .botox-point.fh2 { top: 138px; left: 258px; }
        .botox-point.fh3 { top: 160px; left: 345px; }
        .botox-point.fh4 { top: 185px; left: 430px; }
        .botox-point.fh5 { top: 160px; left: 502px; }
        .botox-point.fh6 { top: 140px; left: 585px; }
        .botox-point.fh7 { top: 185px; left: 610px; }

        /* Frown Lines Points (fr1-fr5) */
        .botox-point.fr1 { top: 295px; left: 305px; }
        .botox-point.fr2 { top: 330px; left: 360px; }
        .botox-point.fr3 { top: 355px; left: 420px; }
        .botox-point.fr4 { top: 333px; left: 485px; }
        .botox-point.fr5 { top: 290px; left: 535px; }

        /* Crow's Feet Left Points (cl1-cl4) */
        .botox-point.cl1 { top: 380px; left: 140px; }
        .botox-point.cl2 { top: 412px; left: 125px; }
        .botox-point.cl3 { top: 450px; left: 140px; }
        .botox-point.cl4 { top: 482px; left: 175px; }

        /* Crow's Feet Right Points (cr1-cr4) */
        .botox-point.cr1 { top: 375px; left: 700px; }
        .botox-point.cr2 { top: 405px; left: 715px; }
        .botox-point.cr3 { top: 450px; left: 710px; }
        .botox-point.cr4 { top: 480px; left: 682px; }

        /* Bunny Lines Points (b1-b3) */
        .botox-point.b1 { top: 435px; left: 425px; }
        .botox-point.b2 { top: 470px; left: 395px; }
        .botox-point.b3 { top: 472px; left: 452px; }

        /* Gummy Smile Points (g1-g2) */
        .botox-point.g1 { top: 632px; left: 333px; }
        .botox-point.g2 { top: 632px; left: 514px; }

        /* Masseter Reduction Left Points (ml1-ml5) */
        .botox-point.ml1 { top: 715px; left: 149px; }
        .botox-point.ml2 { top: 722px; left: 192px; }
        .botox-point.ml3 { top: 736px; left: 170px; }
        .botox-point.ml4 { top: 754px; left: 155px; }
        .botox-point.ml5 { top: 767px; left: 185px; }

        /* Masseter Reduction Right Points (mr1-mr5) */
        .botox-point.mr1 { top: 680px; left: 710px; }
        .botox-point.mr2 { top: 695px; left: 660px; }
        .botox-point.mr3 { top: 710px; left: 680px; }
        .botox-point.mr4 { top: 715px; left: 705px; }
        .botox-point.mr5 { top: 735px; left: 675px; }

        /* Vertical Lip Lines Points (vl1-vl6) */
        .botox-point.vl1 { top: 730px; left: 325px; }
        .botox-point.vl2 { top: 715px; left: 360px; }
        .botox-point.vl3 { top: 715px; left: 485px; }
        .botox-point.vl4 { top: 730px; left: 520px; }
        .botox-point.vl5 { top: 810px; left: 345px; }
        .botox-point.vl6 { top: 808px; left: 500px; }

        /* Smile Lift Left Point (sl1) */
        .botox-point.sl1 { top: 860px; left: 285px; }

        /* Smile Lift Right Point (sr1) */
        .botox-point.sr1 { top: 858px; left: 562px; }

        /* Dimpled Chin Points (dc1-dc2) */
        .botox-point.dc1 { top: 915px; left: 387px; }
        .botox-point.dc2 { top: 915px; left: 450px; }

        .popover-content-inner {
            padding: 5px;
        }

        .webui-popover {
            max-width: 350px;
        }

        .webui-popover .form-label {
            margin-bottom: 5px;
            display: block;
        }
    </style>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/jquery.webui-popover/1.2.1/jquery.webui-popover.min.js"></script>
    <script>
        $(document).ready(function() {
            var currentPatientId = {{ $patient_id ?? 0 }};
            var existingPoints = @json($existingPoints);

            // Initialize Select2 for patient dropdown
            $('.patient-select2').select2({
                ajax: {
                    url: '{{ route('patients.select2') }}',
                    dataType: 'json'
                }
            });

            // When patient is changed, reload the page with new patient
            $('#patient_id').on('change', function() {
                var patientId = $(this).val();
                if (patientId) {
                    window.location.href = '{{ url("botox-face-map-points") }}/' + patientId + '/edit';
                }
            });

            // Mark points that have data
            $.each(existingPoints, function(code, data) {
                if (data.title || data.description) {
                    $('.botox-point.' + code).addClass('has-data');
                }
            });

            // Initialize popovers for each point
            var popoverSettings = {
                trigger: 'click',
                width: 320,
                closeable: true,
                style: '',
                delay: 100,
                padding: true,
                arrow: true,
                animation: 'fade',
                placement: 'auto'
            };

            @foreach($pointsConfig as $point)
                (function() {
                    var code = '{{ $point['code'] }}';
                    var content = $('#popover-' + code).html();
                    var pointSettings = $.extend({}, popoverSettings, {
                        content: content,
                        onShow: function($element) {
                            // Close all other popovers before showing this one
                            $('.point-link').not($element).webuiPopover('hide');
                        }
                    });
                    $('a.' + code + '-link').webuiPopover('destroy').webuiPopover(pointSettings);
                })();
            @endforeach

            // Prevent clicks on point links from bubbling and interfering with popover
            $(document).on('click', '.point-link', function(e) {
                e.stopPropagation();
            });

            // Prevent popover content from closing when clicking inside it
            $(document).on('click', '.webui-popover-content', function(e) {
                e.stopPropagation();
            });

            // Handle save button click (using event delegation for dynamically created content)
            $(document).on('click', '.save-point-btn', function(e) {
                e.preventDefault();
                
                var btn = $(this);
                var pointNo = btn.data('point-no');
                var code = btn.data('code');
                var popoverContent = btn.closest('.popover-content-inner');
                var title = popoverContent.find('.point-title').val();
                var description = popoverContent.find('.point-description').val();

                if (!currentPatientId || currentPatientId == 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Patient Required',
                        text: 'Please select a patient first before saving points.',
                    });
                    return;
                }

                btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Saving...');

                $.ajax({
                    url: '{{ route('botox-face-map-points.store') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        patient_id: currentPatientId,
                        point_no: pointNo,
                        code: code,
                        title: title,
                        description: description
                    },
                    success: function(response) {
                        btn.prop('disabled', false).html('<i class="fas fa-save mr-1"></i> Save');
                        
                        if (response.success) {
                            // Mark point as having data
                            if (title || description) {
                                $('.botox-point.' + code).addClass('has-data');
                            } else {
                                $('.botox-point.' + code).removeClass('has-data');
                            }

                            // Update the hidden popover content as well
                            $('#popover-' + code + ' .point-title').val(title);
                            $('#popover-' + code + ' .point-description').val(description);

                            // Show success toast
                            Swal.fire({
                                icon: 'success',
                                title: 'Saved!',
                                text: 'Point saved successfully.',
                                timer: 1500,
                                showConfirmButton: false
                            });

                            // Close the popover
                            $('a.' + code + '-link').webuiPopover('hide');
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Failed to save point.',
                            });
                        }
                    },
                    error: function(xhr) {
                        btn.prop('disabled', false).html('<i class="fas fa-save mr-1"></i> Save');
                        
                        var errorMsg = 'Failed to save point.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMsg,
                        });
                    }
                });
            });
        });
    </script>
@endsection
