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
                <img src="{{ url('/') }}/assets/media/filler-img.jpeg" alt="Face Map" style="width: 620px; max-width: 100%;" />

                @foreach($pointsConfig as $point)
                    @php
                        $existingData = $existingPoints[$point['code']] ?? null;
                    @endphp
                    <div class="filler-point {{ $point['code'] }}" data-point-no="{{ $point['point_no'] }}" data-code="{{ $point['code'] }}">
                        <a href="javascript:void(0);" class="point-link {{ $point['code'] }}-link" data-placement="auto">
                            <span class="point-number">{{ $point['area'] }}</span>
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
                <h5 class="mb-3">Dermal Filler Injection Areas:</h5>
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <li><strong>1.</strong> Temples</li>
                            <li><strong>2.</strong> Nose Job</li>
                            <li><strong>3.</strong> Tear Trough</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <li><strong>4.</strong> Cheek Augmentation</li>
                            <li><strong>5.</strong> Nasolabial Fold</li>
                            <li><strong>6.</strong> Lip Augmentation</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <li><strong>7.</strong> Marionettes Lines</li>
                            <li><strong>8.</strong> Jawline Chiseling</li>
                            <li><strong>9.</strong> Hand Rejuvenation</li>
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

        .filler-point {
            position: absolute;
            width: 24px;
            height: 24px;
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

        .filler-point:hover {
            transform: scale(1.2);
            background-color: #187DE4;
        }

        .filler-point.has-data {
            background-color: #1BC5BD !important;
            border-color: #0d9488;
        }

        .filler-point.has-data:hover {
            background-color: #14a89e !important;
            transform: scale(1.2);
        }

        .filler-point .point-link {
            display: flex;
            width: 100%;
            height: 100%;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .filler-point .point-number {
            color: #fff;
            font-size: 11px;
            font-weight: bold;
        }

        /* Point positions - Left & Right as per image (620px width) */
        /* 1. Temples */
        .filler-point.temples_left { top: 93px; left: 101px; }
        .filler-point.temples_right { top: 93px; left: 372px; }
        /* 2. Nose Job */
        .filler-point.nose_job { top: 174px; left: 236px; }
        /* 3. Tear Trough */
        .filler-point.tear_trough_left { top: 198px; left: 174px; }
        .filler-point.tear_trough_right { top: 202px; left: 302px; }
        /* 4. Cheek Augmentation */
        .filler-point.cheek_left { top: 217px; left: 120px; }
        .filler-point.cheek_right { top: 225px; left: 349px; }
        /* 5. Nasolabial Fold */
        .filler-point.nasolabial_left { top: 267px; left: 171px; }
        .filler-point.nasolabial_right { top: 267px; left: 295px; }
        /* 6. Lip Augmentation */
        .filler-point.lip_augmentation { top: 318px; left: 233px; }
        /* 7. Marionettes Lines */
        .filler-point.marionettes_left { top: 314px; left: 159px; }
        .filler-point.marionettes_right { top: 318px; left: 302px; }
        /* 8. Jawline Chiseling */
        .filler-point.jawline_left { top: 349px; left: 155px; }
        .filler-point.jawline_right { top: 357px; left: 302px; }
        /* 9. Hand Rejuvenation */
        .filler-point.hand_rejuvenation { top: 543px; left: 318px; }

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
                    window.location.href = '{{ url("face-map-points") }}/' + patientId + '/edit';
                }
            });

            // Mark points that have data
            $.each(existingPoints, function(code, data) {
                if (data.title || data.description) {
                    $('.filler-point.' + code).addClass('has-data');
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
                    url: '{{ route('face-map-points.store') }}',
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
                                $('.filler-point.' + code).addClass('has-data');
                            } else {
                                $('.filler-point.' + code).removeClass('has-data');
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
