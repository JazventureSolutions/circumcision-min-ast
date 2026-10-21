@extends('layouts.default')

@section('content')

    <div class="card card-custom">
        <!--begin::Card header-->
        <div class="card-header card-header-tabs-line nav-tabs-line-3x">
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                    <!--begin::Item-->
                    <li class="nav-item mr-3">
                        <a class="nav-link {{ old('mode', $mode ?? 'patient') == 'patient' ? 'active' : '' }}"
                            data-toggle="tab" href="#tab_patient">
                            <span class="nav-icon">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path
                                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path
                                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="nav-text font-size-lg">Patient</span>
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item">
                        <a class="nav-link {{ old('mode', $mode ?? 'patient') == 'appointments' ? 'active' : '' }}"
                            data-toggle="tab" href="#tab_appointments">
                            <span class="nav-icon">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"
                                                fill="#000000" opacity="0.3" />
                                            <path
                                                d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"
                                                fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="nav-text font-size-lg">Appointments</span>
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item">
                        <a class="nav-link {{ old('mode', $mode ?? 'patient') == 'similar' ? 'active' : '' }}"
                            data-toggle="tab" href="#tab_similar">
                            <span class="nav-icon">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path
                                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path
                                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="nav-text font-size-lg">Similar Patients</span>
                        </a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="nav-item">
                        <a class="nav-link {{ old('mode', $mode ?? 'patient') == 'cosmetic' ? 'active' : '' }}"
                            data-toggle="tab" href="#tab_cosmetic">
                            <span class="nav-icon">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Heart.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path
                                                d="M16.5,4.5 C14.8431458,4.5 13.4077334,5.33878906 12.7856156,6.61718750 L12,8.33593750 L11.2143844,6.61718750 C10.5922666,5.33878906 9.15685416,4.5 7.5,4.5 C5.01472168,4.5 3,6.51472168 3,9 C3,10.5 3.90234375,12.3046875 6.07421875,14.9765625 L12,21 L17.9257812,14.9765625 C20.0976562,12.3046875 21,10.5 21,9 C21,6.51472168 18.9852783,4.5 16.5,4.5 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <span class="nav-text font-size-lg">Cosmetic Patient</span>
                        </a>
                    </li>
                    <!--end::Item-->
                </ul>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <div class="tab-content">
                <!--begin::Tab-->
                <div class="tab-pane {{ old('mode', $mode ?? 'patient') == 'patient' ? 'show active' : '' }}"
                    id="tab_patient" role="tabpanel">

                    <form id="patient_form" class="form" method="POST" action="{{ route('patients.store') }}">
                        @csrf

                        <input type="hidden" name="id" value="{{ $patient->id ?? 0 }}">
                        {{-- <input type="hidden" name="mode" value="patient"> --}}

                        <!--begin::Row-->
                        <div class="row">
                            {{-- <div class="col-xl-3"></div> --}}
                            <div class="col-md-6">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Patient’s Full name</label>
                                    <input
                                        class="form-control form-control-lg {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        type="text" name="name" placeholder="Patient’s Full name"
                                        value="{{ old('name', $patient->name ?? '') }}" required />

                                    @if ($errors->has('name'))
                                        <span class=" invalid-feedback">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->

                            </div>
                            <div class="col-md-6">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Date Of Birth</label>
                                    <input
                                        class="form-control form-control-lg {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}"
                                        type="date" name="date_of_birth" placeholder="Date Of Birth"
                                        value="{{ old('date_of_birth', $patient->date_of_birth ?? '') }}" />

                                    @if ($errors->has('date_of_birth'))
                                        <span class=" invalid-feedback">{{ $errors->first('date_of_birth') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->

                            </div>
                            <div class="col-md-6">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Your Weight</label>
                                    <div
                                        class="input-group input-group-lg {{ $errors->has('weight_of_child') ? 'is-invalid' : '' }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-weight-hanging"></i>
                                            </span>
                                        </div>
                                        <input type="number"
                                            class="form-control form-control-lg {{ $errors->has('weight_of_child') ? 'is-invalid' : '' }}"
                                            name="weight_of_child"
                                            value="{{ old('weight_of_child', $patient->weight_of_child ?? '') }}"
                                            step="any" placeholder="Your Weight" />
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                kg
                                            </span>
                                        </div>
                                    </div>

                                    @if ($errors->has('weight_of_child'))
                                        <span class=" invalid-feedback">{{ $errors->first('weight_of_child') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->

                            </div>
                            <div class="col-md-6">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Patient Type</label>

                                    {{-- <input type="hidden" name="type" value="{{ old('type', $patient->type) }}"> --}}

                                    <select
                                        class="form-control form-control-lg {{ $errors->has('type') ? 'is-invalid' : '' }} basic-select2"
                                        name="type" placeholder="Patient Type">
                                        @foreach ($patient_types as $typeKey => $type)
                                            <option value="{{ $typeKey }}"
                                                {{ old('type', $patient->type) == $typeKey ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class=" invalid-feedback">{{ $errors->first('type') }}</span>
                                    @endif
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
                                        class="input-group input-group-lg {{ $errors->has('cell_number') ? 'is-invalid' : '' }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div>
                                        <input type="tel"
                                            class="form-control form-control-lg {{ $errors->has('cell_number') ? 'is-invalid' : '' }}"
                                            name="cell_number"
                                            value="{{ old('cell_number', $patient->cell_number ?? '') }}"
                                            placeholder="Mobile" />
                                    </div>

                                    @if ($errors->has('cell_number'))
                                        <span class=" invalid-feedback">{{ $errors->first('cell_number') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->

                            </div>
                            <div class="col-md-6">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">House Telephone</label>
                                    <div
                                        class="input-group input-group-lg {{ $errors->has('phone') ? 'is-invalid' : '' }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div>
                                        <input type="tel"
                                            class="form-control form-control-lg {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                            name="phone" value="{{ old('phone', $patient->phone ?? '') }}"
                                            placeholder="House Telephone" />
                                    </div>

                                    @if ($errors->has('phone'))
                                        <span class=" invalid-feedback">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->

                            </div>
                            <div class="col-md-6">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <div
                                        class="input-group input-group-lg {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-at"></i>
                                            </span>
                                        </div>
                                        <input type="email"
                                            class="form-control form-control-lg {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            name="email" value="{{ old('email', $patient->email ?? '') }}"
                                            placeholder="Email Address" />
                                    </div>

                                    @if ($errors->has('email'))
                                        <span class=" invalid-feedback">{{ $errors->first('email') }}</span>
                                    @endif
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
                                    <div
                                        class="input-group input-group-lg {{ $errors->has('house_no') ? 'is-invalid' : '' }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-home"></i>
                                            </span>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-lg {{ $errors->has('house_no') ? 'is-invalid' : '' }}"
                                            name="house_no" value="{{ old('house_no', $patient->house_no ?? '') }}"
                                            placeholder="House #" />
                                    </div>

                                    @if ($errors->has('house_no'))
                                        <span class=" invalid-feedback">{{ $errors->first('house_no') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->

                            </div>
                            <div class="col-md-6">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Street/Road Name</label>
                                    <div
                                        class="input-group input-group-lg {{ $errors->has('street') ? 'is-invalid' : '' }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-home"></i>
                                            </span>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-lg {{ $errors->has('street') ? 'is-invalid' : '' }}"
                                            name="street" value="{{ old('street', $patient->street ?? '') }}"
                                            placeholder="Street/Road Name" />
                                    </div>

                                    @if ($errors->has('street'))
                                        <span class=" invalid-feedback">{{ $errors->first('street') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->

                            </div>
                            <div class="col-md-6">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Town/City</label>
                                    <div
                                        class="input-group input-group-lg {{ $errors->has('city') ? 'is-invalid' : '' }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-home"></i>
                                            </span>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-lg {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                            name="city" value="{{ old('city', $patient->city ?? '') }}"
                                            placeholder="Town/City" />
                                    </div>

                                    @if ($errors->has('city'))
                                        <span class=" invalid-feedback">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->

                            </div>
                            <div class="col-md-6">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Post Code</label>
                                    <div
                                        class="input-group input-group-lg {{ $errors->has('post_code') ? 'is-invalid' : '' }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-home"></i>
                                            </span>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-lg {{ $errors->has('post_code') ? 'is-invalid' : '' }}"
                                            name="post_code" value="{{ old('post_code', $patient->post_code ?? '') }}"
                                            placeholder="Post Code" />
                                    </div>

                                    @if ($errors->has('post_code'))
                                        <span class=" invalid-feedback">{{ $errors->first('post_code') }}</span>
                                    @endif
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
                                            class="form-control form-control-lg {{ $errors->has('next_kin') ? 'is-invalid' : '' }}"
                                            type="text" name="next_kin" placeholder="Next of Kin"
                                            value="{{ old('next_kin', $patient->next_kin ?? '') }}" />

                                        @if ($errors->has('next_kin'))
                                            <span class=" invalid-feedback">{{ $errors->first('next_kin') }}</span>
                                        @endif
                                    </div>
                                    <!--end::Group-->

                                </div>

                                <div class="col-md-6 hide-new_born hide-old_boy">
                                    <div class="form-group">
                                        <label class="form-label">Next of Kin Relationship</label>
                                        <input
                                            class="form-control form-control-lg {{ $errors->has('next_kin_relationship') ? 'is-invalid' : '' }}"
                                            type="text" name="next_kin_relationship"
                                            placeholder="Next of Kin Relationship "
                                            value="{{ old('next_kin_relationship', $patient->next_kin_relationship ?? '') }}" />


                                        @if ($errors->has('next_kin_relationship'))
                                            <span
                                                class=" invalid-feedback">{{ $errors->first('next_kin_relationship') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 hide-new_born hide-old_boy">
                                    <div class="form-group">
                                        <label class="form-label">Next of Kin Address</label>
                                        <input
                                            class="form-control form-control-lg {{ $errors->has('next_kin_address') ? 'is-invalid' : '' }}"
                                            type="text" name="next_kin_address" placeholder="Next of Kin Address "
                                            value="{{ old('next_kin_address', $patient->next_kin_address ?? '') }}" />


                                        @if ($errors->has('next_kin_address'))
                                            <span
                                                class=" invalid-feedback">{{ $errors->first('next_kin_address') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 hide-new_born hide-old_boy">
                                    <div class="form-group">
                                        <label class="form-label">Next of Kin Mobile</label>
                                        <input
                                            class="form-control form-control-lg {{ $errors->has('next_kin_phone') ? 'is-invalid' : '' }}"
                                            type="text" name="next_kin_phone" placeholder="Next of Kin Mobile "
                                            value="{{ old('next_kin_phone', $patient->next_kin_phone ?? '') }}" />


                                        @if ($errors->has('next_kin_phone'))
                                            <span class=" invalid-feedback">{{ $errors->first('next_kin_phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                           
                            <div class="col-md-6 hide-adult">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Father Name</label>
                                    <input
                                        class="form-control form-control-lg {{ $errors->has('father_name') ? 'is-invalid' : '' }}"
                                        type="text" name="father_name" placeholder="Father Name"
                                        value="{{ old('father_name', $patient->father_name ?? '') }}" />

                                    @if ($errors->has('father_name'))
                                        <span class=" invalid-feedback">{{ $errors->first('father_name') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->

                            </div>
                            <div class="col-md-6 hide-adult">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Mother Name</label>
                                    <input
                                        class="form-control form-control-lg {{ $errors->has('mother_name') ? 'is-invalid' : '' }}"
                                        type="text" name="mother_name" placeholder="Mother Name"
                                        value="{{ old('mother_name', $patient->mother_name ?? '') }}" />

                                    @if ($errors->has('mother_name'))
                                        <span class=" invalid-feedback">{{ $errors->first('mother_name') }}</span>
                                    @endif
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
                                        class="form-control form-control-lg {{ $errors->has('gp_details') ? 'is-invalid' : '' }}">{{ old('gp_details', $patient->gp_details ?? '') }}</textarea>

                                    @if ($errors->has('gp_details'))
                                        <span class=" invalid-feedback">{{ $errors->first('gp_details') }}</span>
                                    @endif
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

                                    {{-- <input type="hidden" name="type" value="{{ old('type', $patient->type) }}"> --}}

                                    <select
                                        class="form-control form-control-lg {{ $errors->has('appoint_type') ? 'is-invalid' : '' }} basic-select2"
                                        name="appoint_type" placeholder="Appointment Type" required>
                                        <option value="">Select</option>
                                        @foreach ($AppointmentTypes as $appointtypeKey => $appoint_type)
                                            <option value="{{ $appointtypeKey }}"
                                                {{ old('appoint_type', $patient->appoint_type) == $appointtypeKey ? 'selected' : '' }}>
                                                {{ $appoint_type }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('appoint_type'))
                                        <span class=" invalid-feedback">{{ $errors->first('appoint_type') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Appointment Reason</label>
                                    <textarea name="Appoint_reason"
                                        class="form-control form-control-lg {{ $errors->has('Appoint_reason') ? 'is-invalid' : '' }}" required>{{ old('Appoint_reason', $patient->Appoint_reason ?? '') }}</textarea>

                                    @if ($errors->has('Appoint_reason'))
                                        <span class=" invalid-feedback">{{ $errors->first('Appoint_reason') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Appointment City</label>

                                    <select
                                        class="form-control form-control-lg {{ $errors->has('type') ? 'is-invalid' : '' }} basic-select2"
                                        name="branch_id" placeholder="Appointment City">
                                        <option value="">Select</option>
                                        @foreach ($branches as $branchKey => $branch)
                                            <option value="{{ $branchKey }}"
                                                {{ (old('branch_id', $patient->branch_id) ?? Auth::user()->branch_id) == $branchKey ? 'selected' : '' }}>
                                                {{ $branch }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('branch_id'))
                                        <span class=" invalid-feedback">{{ $errors->first('branch_id') }}</span>
                                    @endif
                                </div>
                                <!--end::Group-->

                            </div>

                            {{-- @if ($patient->approved == '1') --}}
                            <div class="col-md-12 my-2">

                                <!--begin::Group-->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>

                            </div>
                            {{-- @endif --}}
                        </div>

                        <!--end::Row-->

                    </form>

                </div>
                <!--end::Tab-->

                <!--begin::Tab-->
                <div class="tab-pane {{ old('mode', $mode ?? 'patient') == 'appointments' ? 'show active' : '' }}"
                    id="tab_appointments" role="tabpanel" data-patient_id="{{ $patient->id ?? 0 }}">
                    {{-- AJAX LOAD APPOINTMENTS --}}
                </div>

                <!--begin::Tab-->
                <div class="tab-pane {{ old('mode', $mode ?? 'patient') == 'similar' ? 'show active' : '' }}"
                    id="tab_similar" role="tabpanel">
                    {{-- AJAX LOAD SIMILAR --}}
                </div>

                <!--begin::Tab-->
                <div class="tab-pane {{ old('mode', $mode ?? 'patient') == 'cosmetic' ? 'show active' : '' }}"
                    id="tab_cosmetic" role="tabpanel">

                    <form id="kt_form" class="form" method="POST" action="{{ route('patients.store-cosmetic') }}">
                        @csrf

                        <input type="hidden" name="patient_id" value="{{ $cosmetic_patient_form->patient_id ?? 0 }}">
                        <input type="hidden" name="cosmetic_patient_form_id"
                            value="{{ $cosmetic_patient_form->id ?? 0 }}">

                        <!--begin::Row-->
                        <h3
                            style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                            Personal Details</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control form-control-lg " name="title"
                                        value="{{ old('title', $cosmetic_patient_form->title ?? '') }}"
                                        placeholder="Title">
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-4">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">First name</label>
                                    <input type="text" class="form-control form-control-lg " name="first_name"
                                        value="{{ old('first_name', $cosmetic_patient_form->first_name ?? '') }}"
                                        placeholder="First name">
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-4">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Surname</label>
                                    <input type="text" class="form-control form-control-lg " name="sur_name"
                                        value="{{ old('sur_name', $cosmetic_patient_form->sur_name ?? '') }}"
                                        placeholder="Surname">
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Date of birth</label>
                                    <input class="form-control form-control-lg " type="date" name="date_of_birth"
                                        value="{{ old('date_of_birth', $cosmetic_patient_form->date_of_birth ?? '') }}"
                                        placeholder="Date of birth">
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Telephone number(s)</label>
                                    <div class="input-group input-group-lg ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                        </div>
                                        <input type="tel" class="form-control form-control-lg " name="cell_number"
                                            value="{{ old('cell_number', $cosmetic_patient_form->cell_number ?? '') }}"
                                            placeholder="Telephone number(s)">
                                    </div>
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-12">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control form-control-lg " name="address"
                                        value="{{ old('address', $cosmetic_patient_form->address ?? '') }}"
                                        placeholder="Address">
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Postcode</label>
                                    <input type="text" class="form-control form-control-lg " name="postcode"
                                        value="{{ old('postcode', $cosmetic_patient_form->postcode ?? '') }}"
                                        placeholder="Postcode">
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-lg " name="email"
                                        value="{{ old('email', $cosmetic_patient_form->email ?? '') }}"
                                        placeholder="Email">
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-12">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">GP Name and address</label>
                                    <input type="text" class="form-control form-control-lg "
                                        name="gp_name_and_address"
                                        value="{{ old('gp_name_and_address', $cosmetic_patient_form->gp_name_and_address ?? '') }}"
                                        placeholder="GP Name and address">
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-12">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Describe your occupation</label>
                                    <input type="text" class="form-control form-control-lg " name="occupation_details"
                                        value="{{ old('occupation_details', $cosmetic_patient_form->occupation_details ?? '') }}"
                                        placeholder="Describe your occupation">
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-12">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">How did you hear about us</label>
                                    <input type="text" class="form-control form-control-lg " name="hear_about_us"
                                        value="{{ old('hear_about_us', $cosmetic_patient_form->hear_about_us ?? '') }}"
                                        placeholder="How did you hear about us">
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-12">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">Describe your beauty concern and expectations from the
                                        treatment</label>
                                    <textarea type="text" class="form-control form-control-lg " name="beauty_concern_details" rows="2">{{ old('beauty_concern_details', $cosmetic_patient_form->beauty_concern_details ?? '') }}</textarea>
                                </div>
                                <!--end::Group-->
                            </div>


                            <h3
                                style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                                Medical History</h3>
                            <div class="col-md-12">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Are you currently receiving treatment from a doctor or specialist?</p>
                                    <fieldset id="receiving_treatment" style="min-width: 102px;">
                                        <input type="radio" id="receiving_treatment_Yes" value="Yes"
                                            name="receiving_treatment"
                                            {{ old('receiving_treatment', $cosmetic_patient_form->receiving_treatment ?? 0) == 1 || old('receiving_treatment', $cosmetic_patient_form->receiving_treatment ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="receiving_treatment_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="receiving_treatment_No" value="No"
                                            name="receiving_treatment"
                                            {{ old('receiving_treatment', $cosmetic_patient_form->receiving_treatment ?? 0) == 0 || old('receiving_treatment', $cosmetic_patient_form->receiving_treatment ?? 0) == 'No' ? 'checked' : '' }}><label
                                            for="receiving_treatment_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">If YES, please give details:</label>
                                    <input type="text" class="form-control form-control-lg "
                                        name="receiving_treatment_detail"
                                        value="{{ old('receiving_treatment_detail', $cosmetic_patient_form->receiving_treatment_detail ?? '') }}"
                                        placeholder="Please give details">
                                </div>
                                <!--end::Group-->

                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Are you taking any medicines? (Fish Oil, Ginko, ginseng, Vitamin E, St John Wart,
                                        Roacutane,
                                        Steroids, Aspirin, Ibuprofen, , Steroids, Anticoagulants, , Antibiotics,
                                        Contraceptive Pill,
                                        HRT, Thiazides, Phenothiazines, Tetracyclines, Ciprofloxacin, Diuretics)</p>
                                    <fieldset id="taking_medicines" style="min-width: 102px;">
                                        <input type="radio" id="taking_medicines_Yes" value="Yes"
                                            name="taking_medicines"
                                            {{ old('taking_medicines', $cosmetic_patient_form->taking_medicines ?? 0) == 1 || old('taking_medicines', $cosmetic_patient_form->taking_medicines ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="taking_medicines_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="taking_medicines_No" value="No"
                                            name="taking_medicines"
                                            {{ old('taking_medicines', $cosmetic_patient_form->taking_medicines ?? 0) == 0 || old('taking_medicines', $cosmetic_patient_form->taking_medicines ?? 0) == 'No' ? 'checked' : '' }}><label
                                            for="taking_medicines_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">If YES, please give details:</label>
                                    <input type="text" class="form-control form-control-lg "
                                        name="taking_medicines_detail"
                                        value="{{ old('taking_medicines_detail', $cosmetic_patient_form->taking_medicines_detail ?? '') }}"
                                        placeholder="Please give details">
                                </div>
                                <!--end::Group-->

                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Are you allergic to any medicines, foods or other substances? (e.g. Egg whites,
                                        fillers,
                                        chemical peels, cosmetics)</p>
                                    <fieldset id="allergic_to_medicines" style="min-width: 102px;">
                                        <input type="radio" id="allergic_to_medicines_Yes" value="Yes"
                                            name="allergic_to_medicines"
                                            {{ old('allergic_to_medicines', $cosmetic_patient_form->allergic_to_medicines ?? 0) == 1 || old('allergic_to_medicines', $cosmetic_patient_form->allergic_to_medicines ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="allergic_to_medicines_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="allergic_to_medicines_No" value="No"
                                            name="allergic_to_medicines"
                                            {{ old('allergic_to_medicines', $cosmetic_patient_form->allergic_to_medicines ?? 0) == 0 || old('allergic_to_medicines', $cosmetic_patient_form->allergic_to_medicines ?? 0) == 'No' ? 'checked' : '' }}><label
                                            for="allergic_to_medicines_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">If YES, please give details:</label>
                                    <input type="text" class="form-control form-control-lg "
                                        name="allergic_to_medicines_detail" value="{{ old('allergic_to_medicines_detail', $cosmetic_patient_form->allergic_to_medicines_detail ?? '') }}"
                                        placeholder="Please give details">
                                </div>
                                <!--end::Group-->

                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Have you ever had an anaphylactic reaction?</p>
                                    <fieldset id="anaphylactic_reaction" style="min-width: 102px;">
                                        <input type="radio" id="anaphylactic_reaction_Yes" value="Yes"
                                            name="anaphylactic_reaction"
                                            {{ old('anaphylactic_reaction', $cosmetic_patient_form->anaphylactic_reaction ?? 0) == 1 || old('anaphylactic_reaction', $cosmetic_patient_form->anaphylactic_reaction ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="anaphylactic_reaction_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="anaphylactic_reaction_No" value="No"
                                            name="anaphylactic_reaction"
                                            {{ old('anaphylactic_reaction', $cosmetic_patient_form->anaphylactic_reaction ?? 0) == 0 || old('anaphylactic_reaction', $cosmetic_patient_form->anaphylactic_reaction ?? 0) == 'No' ? 'checked' : '' }}><label
                                            for="anaphylactic_reaction_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">If YES, please give details:</label>
                                    <input type="text" class="form-control form-control-lg "
                                        name="anaphylactic_reaction_detail"
                                        value="{{ old('anaphylactic_reaction_detail', $cosmetic_patient_form->anaphylactic_reaction_detail ?? '') }}"
                                        placeholder="Please give details">
                                </div>
                                <!--end::Group-->

                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Are you currently pregnant or contemplating pregnancy / Breastfeeding ?</p>
                                    <fieldset id="pregnant" style="min-width: 102px;">
                                        <input type="radio" id="pregnant_Yes" value="Yes" name="pregnant"
                                            {{ old('pregnant', $cosmetic_patient_form->pregnant ?? 0) == 1 || old('pregnant', $cosmetic_patient_form->pregnant ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="pregnant_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="pregnant_No" value="No" name="pregnant"
                                            {{ old('pregnant', $cosmetic_patient_form->pregnant ?? 0) == 0 || old('pregnant', $cosmetic_patient_form->pregnant ?? 0) == 'No' ? 'checked' : '' }}><label
                                            for="pregnant_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>


                            <h3 class="col-md-12"
                                style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                                Medical History (Contd)</h3>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Depression/stress/Body Dysmorphia/ Psychiatric problems</p>
                                    <fieldset id="Depression" style="min-width: 102px;">
                                        <input type="radio" id="depression_Yes" value="Yes" name="Depression"
                                            {{ old('Depression', $cosmetic_patient_form->Depression ?? 0) == 1 || old('Depression', $cosmetic_patient_form->Depression ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="depression_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="depression_No" value="No" name="Depression"
                                            {{ old('Depression', $cosmetic_patient_form->Depression ?? 0) == 0 || old('Depression', $cosmetic_patient_form->Depression ?? 0) == 'No' ? 'checked' : '' }}><label
                                            for="depression_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Heart/Respiratory problems</p>
                                    <fieldset id="heart_problems" style="min-width: 102px;">
                                        <input type="radio" id="heart_problems_Yes" value="Yes"
                                            name="heart_problems"
                                            {{ old('heart_problems', $cosmetic_patient_form->heart_problems ?? 0) == 1 || old('heart_problems', $cosmetic_patient_form->heart_problems ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="heart_problems_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="heart_problems_No" value="No"
                                            name="heart_problems"
                                            {{ old('heart_problems', $cosmetic_patient_form->heart_problems ?? 0) == 0 || old('heart_problems', $cosmetic_patient_form->heart_problems ?? 0) == 'No' ? 'checked' : '' }}><label
                                            for="heart_problems_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Fainting/Epilepsy/Stroke</p>
                                    <fieldset id="epilepsy" style="min-width: 102px;">
                                        <input type="radio" id="epilepsy_Yes" value="Yes" name="epilepsy" {{ old('epilepsy', $cosmetic_patient_form->epilepsy ?? 0) == 1 || old('epilepsy', $cosmetic_patient_form->epilepsy ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="epilepsy_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="epilepsy_No" value="No" name="epilepsy" {{ old('epilepsy', $cosmetic_patient_form->epilepsy ?? 0) == 0 || old('epilepsy', $cosmetic_patient_form->epilepsy ?? 0) == 'No' ? 'checked' : '' }}><label for="epilepsy_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>High Blood Pressure</p>
                                    <fieldset id="blood_pressure" style="min-width: 102px;">
                                        <input type="radio" id="blood_pressure_Yes" value="Yes"
                                            name="blood_pressure" {{ old('blood_pressure', $cosmetic_patient_form->blood_pressure ?? 0) == 1 || old('blood_pressure', $cosmetic_patient_form->blood_pressure ?? 0) == 'Yes' ? 'checked' : '' }}><label for="blood_pressure_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="blood_pressure_No" value="No"
                                            name="blood_pressure" {{ old('blood_pressure', $cosmetic_patient_form->blood_pressure ?? 0) == 0 || old('blood_pressure', $cosmetic_patient_form->blood_pressure ?? 0) == 'No' ? 'checked' : '' }}><label for="blood_pressure_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Diabetes</p>
                                    <fieldset id="diabetes" style="min-width: 102px;">
                                        <input type="radio" id="diabetes_Yes" value="Yes" name="diabetes" {{ old('diabetes', $cosmetic_patient_form->diabetes ?? 0) == 1 || old('diabetes', $cosmetic_patient_form->diabetes ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="diabetes_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="diabetes_No" value="No" name="diabetes" {{ old('diabetes', $cosmetic_patient_form->diabetes ?? 0) == 0 || old('diabetes', $cosmetic_patient_form->diabetes ?? 0) == 'No' ? 'checked' : '' }}><label for="diabetes_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Thyroid/Liver/Kidney problems</p>
                                    <fieldset id="kidney_problems" style="min-width: 102px;">
                                        <input type="radio" id="kidney_problems_Yes" value="Yes"
                                            name="kidney_problems" {{ old('kidney_problems', $cosmetic_patient_form->kidney_problems ?? 0) == 1 || old('kidney_problems', $cosmetic_patient_form->kidney_problems ?? 0) == 'Yes' ? 'checked' : '' }}><label for="kidney_problems_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="kidney_problems_No" value="No"
                                            name="kidney_problems" {{ old('kidney_problems', $cosmetic_patient_form->kidney_problems ?? 0) == 0 || old('kidney_problems', $cosmetic_patient_form->kidney_problems ?? 0) == 'No' ? 'checked' : '' }}><label for="kidney_problems_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Cancer/Skin Cancer</p>
                                    <fieldset id="Skin_Cancer" style="min-width: 102px;">
                                        <input type="radio" id="Skin_Cancer_Yes" value="Yes"
                                            name="Skin_Cancer" {{ old('Skin_Cancer', $cosmetic_patient_form->Skin_Cancer ?? 0) == 1 || old('Skin_Cancer', $cosmetic_patient_form->Skin_Cancer ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Skin_Cancer_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Skin_Cancer_No" value="No" name="Skin_Cancer" {{ old('Skin_Cancer', $cosmetic_patient_form->Skin_Cancer ?? 0) == 0 || old('Skin_Cancer', $cosmetic_patient_form->Skin_Cancer ?? 0) == 'No' ? 'checked' : '' }}><label for="Skin_Cancern_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Blood disorders/Easy bruising</p>
                                    <fieldset id="Blood_Disorders" style="min-width: 102px;">
                                        <input type="radio" id="Blood_Disorders_Yes" value="Yes"
                                            name="Blood_Disorders" {{ old('Blood_Disorders', $cosmetic_patient_form->Blood_Disorders ?? 0) == 1 || old('Blood_Disorders', $cosmetic_patient_form->Blood_Disorders ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Blood_Disorders_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Blood_Disorders_No" value="No"
                                            name="Blood_Disorders" {{ old('Blood_Disorders', $cosmetic_patient_form->Blood_Disorders ?? 0) == 0 || old('Blood_Disorders', $cosmetic_patient_form->Blood_Disorders ?? 0) == 'No' ? 'checked' : '' }}><label for="Blood_Disorders_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Keloids/bad scarring</p>
                                    <fieldset id="Keloids" style="min-width: 102px;">
                                        <input type="radio" id="Keloids_Yes" value="Yes" name="Keloids" {{ old('Keloids', $cosmetic_patient_form->Keloids ?? 0) == 1 || old('Keloids', $cosmetic_patient_form->Keloids ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="Keloids_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Keloids_No" value="No" name="Keloids" {{ old('Keloids', $cosmetic_patient_form->Keloids ?? 0) == 0 || old('Keloids', $cosmetic_patient_form->Keloids ?? 0) == 'No' ? 'checked' : '' }}><label for="Keloids_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Arthritis/Autoimmune disease</p>
                                    <fieldset id="Arthritis" style="min-width: 102px;">
                                        <input type="radio" id="Arthritis_Yes" value="Yes" name="Arthritis" {{ old('Arthritis', $cosmetic_patient_form->Arthritis ?? 0) == 1 || old('Arthritis', $cosmetic_patient_form->Arthritis ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="Arthritis_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Arthritis_No" value="No" name="Arthritis" {{ old('Arthritis', $cosmetic_patient_form->Arthritis ?? 0) == 0 || old('Arthritis', $cosmetic_patient_form->Arthritis ?? 0) == 'No' ? 'checked' : '' }}><label for="Arthritis_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Cold Sores</p>
                                    <fieldset id="Cold_Sores" style="min-width: 102px;">
                                        <input type="radio" id="Cold_Sores_Yes" value="Yes" name="Cold_Sores" {{ old('Cold_Sores', $cosmetic_patient_form->Cold_Sores ?? 0) == 1 || old('Cold_Sores', $cosmetic_patient_form->Cold_Sores ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Cold_Sores_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Cold_Sores_No" value="No" name="Cold_Sores" {{ old('Cold_Sores', $cosmetic_patient_form->Cold_Sores ?? 0) == 0 || old('Cold_Sores', $cosmetic_patient_form->Cold_Sores ?? 0) == 'No' ? 'checked' : '' }}><label for="Cold_Sores_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>HIV / Hepatitis</p>
                                    <fieldset id="Hepatitis" style="min-width: 102px;">
                                        <input type="radio" id="Hepatitis_Yes" value="Yes" name="Hepatitis" {{ old('Hepatitis', $cosmetic_patient_form->Hepatitis ?? 0) == 1 || old('Hepatitis', $cosmetic_patient_form->Hepatitis ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="Hepatitis_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Hepatitis_No" value="No" name="Hepatitis" {{ old('Hepatitis', $cosmetic_patient_form->Hepatitis ?? 0) == 0 || old('Hepatitis', $cosmetic_patient_form->Hepatitis ?? 0) == 'No' ? 'checked' : '' }}><label for="Hepatitis_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Dermatitis/Eczema/Psoriasis</p>
                                    <fieldset id="Psoriasis" style="min-width: 102px;">
                                        <input type="radio" id="Psoriasis_Yes" value="Yes" name="Psoriasis" {{ old('Psoriasis', $cosmetic_patient_form->Psoriasis ?? 0) == 1 || old('Psoriasis', $cosmetic_patient_form->Psoriasis ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="Psoriasis_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Psoriasis_No" value="No" name="Psoriasis" {{ old('Psoriasis', $cosmetic_patient_form->Psoriasis ?? 0) == 0 || old('Psoriasis', $cosmetic_patient_form->Psoriasis ?? 0) == 'No' ? 'checked' : '' }}><label for="Psoriasis_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Skin infection/Acne</p>
                                    <fieldset id="Skin_Infection" style="min-width: 102px;">
                                        <input type="radio" id="Skin_Infection_Yes" value="Yes" name="Skin_Infection" {{ old('Skin_Infection', $cosmetic_patient_form->Skin_Infection ?? 0) == 1 || old('Skin_Infection', $cosmetic_patient_form->Skin_Infection ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Skin_Infection_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Skin_Infection_No" value="No" name="Skin_Infection" {{ old('Skin_Infection', $cosmetic_patient_form->Skin_Infection ?? 0) == 0 || old('Skin_Infection', $cosmetic_patient_form->Skin_Infection ?? 0) == 'No' ? 'checked' : '' }}><label for="Skin_Infection_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>


                            <h3 class="col-md-12"
                                style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                                Leg Thread Veins</h3>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Ankle swelling</p>
                                    <fieldset id="Ankle_Swelling" style="min-width: 102px;">
                                        <input type="radio" id="Ankle_Swelling_Yes" value="Yes" name="Ankle_Swelling" {{ old('Ankle_Swelling', $cosmetic_patient_form->Ankle_Swelling ?? 0) == 1 || old('Ankle_Swelling', $cosmetic_patient_form->Ankle_Swelling ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Ankle_Swelling_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Ankle_Swelling_No" value="No" name="Ankle_Swelling" {{ old('Ankle_Swelling', $cosmetic_patient_form->Ankle_Swelling ?? 0) == 0 || old('Ankle_Swelling', $cosmetic_patient_form->Ankle_Swelling ?? 0) == 'No' ? 'checked' : '' }}><label for="Ankle_Swelling_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Cellulitis</p>
                                    <fieldset id="Cellulitis" style="min-width: 102px;">
                                        <input type="radio" id="Cellulitis_Yes" value="Yes" name="Cellulitis" {{ old('Cellulitis', $cosmetic_patient_form->Cellulitis ?? 0) == 1 || old('Cellulitis', $cosmetic_patient_form->Cellulitis ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Cellulitis_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Cellulitis_No" value="No" name="Cellulitis" {{ old('Cellulitis', $cosmetic_patient_form->Cellulitis ?? 0) == 0 || old('Cellulitis', $cosmetic_patient_form->Cellulitis ?? 0) == 'No' ? 'checked' : '' }}><label for="Cellulitis_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Phlebitis</p>
                                    <fieldset id="Phlebitis" style="min-width: 102px;">
                                        <input type="radio" id="Phlebitis_Yes" value="Yes" name="Phlebitis" {{ old('Phlebitis', $cosmetic_patient_form->Phlebitis ?? 0) == 1 || old('Phlebitis', $cosmetic_patient_form->Phlebitis ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="Phlebitis_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Phlebitis_No" value="No" name="Phlebitis" {{ old('Phlebitis', $cosmetic_patient_form->Phlebitis ?? 0) == 0 || old('Phlebitis', $cosmetic_patient_form->Phlebitis ?? 0) == 'No' ? 'checked' : '' }}><label for="Phlebitis_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Varicose Veins</p>
                                    <fieldset id="Varicose_Veins" style="min-width: 102px;">
                                        <input type="radio" id="Varicose_Veins_Yes" value="Yes" name="Varicose_Veins" {{ old('Varicose_Veins', $cosmetic_patient_form->Varicose_Veins ?? 0) == 1 || old('Varicose_Veins', $cosmetic_patient_form->Varicose_Veins ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Varicose_Veins_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Varicose_Veins_No" value="No" name="Varicose_Veins" {{ old('Varicose_Veins', $cosmetic_patient_form->Varicose_Veins ?? 0) == 0 || old('Varicose_Veins', $cosmetic_patient_form->Varicose_Veins ?? 0) == 'No' ? 'checked' : '' }}><label for="Varicose_Veins_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Deep vein thrombosis</p>
                                    <fieldset id="Deep_Vein" style="min-width: 102px;">
                                        <input type="radio" id="Deep_Vein_Yes" value="Yes" name="Deep_Vein" {{ old('Deep_Vein', $cosmetic_patient_form->Deep_Vein ?? 0) == 1 || old('Deep_Vein', $cosmetic_patient_form->Deep_Vein ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="Deep_Vein_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Deep_Vein_No" value="No" name="Deep_Vein" {{ old('Deep_Vein', $cosmetic_patient_form->Deep_Vein ?? 0) == 0 || old('Deep_Vein', $cosmetic_patient_form->Deep_Vein ?? 0) == 'No' ? 'checked' : '' }}><label for="Deep_Vein_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Pulmonary embolus</p>
                                    <fieldset id="Pulmonary_Embolus" style="min-width: 102px;">
                                        <input type="radio" id="Pulmonary_Embolus_Yes" value="Yes" name="Pulmonary_Embolus" {{ old('Pulmonary_Embolus', $cosmetic_patient_form->Pulmonary_Embolus ?? 0) == 1 || old('Pulmonary_Embolus', $cosmetic_patient_form->Pulmonary_Embolus ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Pulmonary_Embolus_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Pulmonary_Embolus_No" value="No" name="Pulmonary_Embolus" {{ old('Pulmonary_Embolus', $cosmetic_patient_form->Pulmonary_Embolus ?? 0) == 0 || old('Pulmonary_Embolus', $cosmetic_patient_form->Pulmonary_Embolus ?? 0) == 'No' ? 'checked' : '' }}><label for="Pulmonary_Embolus_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Leg ulceration</p>
                                    <fieldset id="Leg_Ulceration" style="min-width: 102px;">
                                        <input type="radio" id="Leg_Ulceration_Yes" value="Yes" name="Leg_Ulceration" {{ old('Leg_Ulceration', $cosmetic_patient_form->Leg_Ulceration ?? 0) == 1 || old('Leg_Ulceration', $cosmetic_patient_form->Leg_Ulceration ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Leg_Ulceration_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Leg_Ulceration_No" value="No" name="Leg_Ulceration" {{ old('Leg_Ulceration', $cosmetic_patient_form->Leg_Ulceration ?? 0) == 0 || old('Leg_Ulceration', $cosmetic_patient_form->Leg_Ulceration ?? 0) == 'No' ? 'checked' : '' }}><label for="Leg_Ulceration_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-6">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Spider Veins/Visible leg veins</p>
                                    <fieldset id="Spider_Veins" style="min-width: 102px;">
                                        <input type="radio" id="Spider_Veins_Yes" value="Yes" name="Spider_Veins" {{ old('Spider_Veins', $cosmetic_patient_form->Spider_Veins ?? 0) == 1 || old('Spider_Veins', $cosmetic_patient_form->Spider_Veins ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Spider_Veins_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Spider_Veins_No" value="No" name="Spider_Veins" {{ old('Spider_Veins', $cosmetic_patient_form->Spider_Veins ?? 0) == 0 || old('Spider_Veins', $cosmetic_patient_form->Spider_Veins ?? 0) == 'No' ? 'checked' : '' }}><label for="Spider_Veins_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>

                            <h3 class="col-md-12"
                                style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                                Other Information</h3>
                            <div class="col-md-12">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Any surgical procedures in the past?</p>
                                    <fieldset id="past_surgery" style="min-width: 102px;">
                                        <input type="radio" id="past_surgery_Yes" value="Yes" name="past_surgery" {{ old('past_surgery', $cosmetic_patient_form->past_surgery ?? 0) == 1 || old('past_surgery', $cosmetic_patient_form->past_surgery ?? 0) == 'Yes' ? 'checked' : '' }}><label for="past_surgery_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="past_surgery_No" value="No" name="past_surgery" {{ old('past_surgery', $cosmetic_patient_form->past_surgery ?? 0) == 0 || old('past_surgery', $cosmetic_patient_form->past_surgery ?? 0) == 'No' ? 'checked' : '' }}><label for="past_surgery_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">If YES, please give details:</label>
                                    <input type="text" class="form-control form-control-lg "
                                        name="past_surgery_detail" value="{{ old('past_surgery_detail', $cosmetic_patient_form->past_surgery_detail ?? '') }}" placeholder="Please give details">
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Do you have any Dental or other Implants? (plates/screws/rods/pacemaker/inner ear
                                        implant)
                                    </p>
                                    <fieldset id="dental_implants" style="min-width: 102px;">
                                        <input type="radio" id="dental_implants_Yes" value="Yes" name="dental_implants" {{ old('dental_implants', $cosmetic_patient_form->dental_implants ?? 0) == 1 || old('dental_implants', $cosmetic_patient_form->dental_implants ?? 0) == 'Yes' ? 'checked' : '' }}><label for="dental_implants_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="dental_implants_No" value="No" name="dental_implants" {{ old('dental_implants', $cosmetic_patient_form->dental_implants ?? 0) == 0 || old('dental_implants', $cosmetic_patient_form->dental_implants ?? 0) == 'No' ? 'checked' : '' }}><label for="dental_implants_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">If YES, please give details:</label>
                                    <input type="text" class="form-control form-control-lg "
                                        name="dental_implants_detail" value="{{ old('dental_implants_detail', $cosmetic_patient_form->dental_implants_detail ?? '') }}" placeholder="Please give details">
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Can your GP be informed about your treatment?</p>
                                    <fieldset id="gb_informed" style="min-width: 102px;">
                                        <input type="radio" id="gb_informed_Yes" value="Yes" name="gb_informed" {{ old('gb_informed', $cosmetic_patient_form->gb_informed ?? 0) == 1 || old('gb_informed', $cosmetic_patient_form->gb_informed ?? 0) == 'Yes' ? 'checked' : '' }}><label for="gb_informed_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="gb_informed_No" value="No" name="gb_informed" {{ old('gb_informed', $cosmetic_patient_form->gb_informed ?? 0) == 0 || old('gb_informed', $cosmetic_patient_form->gb_informed ?? 0) == 'No' ? 'checked' : '' }}><label for="gb_informed_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Do you smoke?</p>
                                    <fieldset id="smoke" style="min-width: 102px;">
                                        <input type="radio" id="smoke_Yes" value="Yes" name="smoke" {{ old('smoke', $cosmetic_patient_form->smoke ?? 0) == 1 || old('smoke', $cosmetic_patient_form->smoke ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="smoke_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="smoke_No" value="No" name="smoke" {{ old('smoke', $cosmetic_patient_form->smoke ?? 0) == 0 || old('smoke', $cosmetic_patient_form->smoke ?? 0) == 'No' ? 'checked' : '' }}><label for="smoke_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->

                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Do you take alcohol?</p>
                                    <fieldset id="alcohol" style="min-width: 102px;">
                                        <input type="radio" id="alcohol_Yes" value="Yes" name="alcohol" {{ old('alcohol', $cosmetic_patient_form->alcohol ?? 0) == 1 || old('alcohol', $cosmetic_patient_form->alcohol ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="alcohol_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="alcohol_No" value="No" name="alcohol" {{ old('alcohol', $cosmetic_patient_form->alcohol ?? 0) == 0 || old('alcohol', $cosmetic_patient_form->alcohol ?? 0) == 'No' ? 'checked' : '' }}><label for="alcohol_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="form-group">
                                    <label class="form-label">If yes, how many units per week?:</label>
                                    <input type="text" class="form-control form-control-lg " name="alcohol_detail"
                                        value="{{ old('alcohol_detail', $cosmetic_patient_form->alcohol_detail ?? '') }}" placeholder="Please give details">
                                </div>
                                <!--end::Group-->

                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>In the last 6 months: any sunbathing/sun bed use/chemical peels?</p>
                                    <fieldset id="sunbathing" style="min-width: 102px;">
                                        <input type="radio" id="sunbathing_Yes" value="Yes" name="sunbathing" {{ old('sunbathing', $cosmetic_patient_form->sunbathing ?? 0) == 1 || old('sunbathing', $cosmetic_patient_form->sunbathing ?? 0) == 'Yes' ? 'checked' : '' }}><label for="sunbathing_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="sunbathing_No" value="No" name="sunbathing" {{ old('sunbathing', $cosmetic_patient_form->sunbathing ?? 0) == 0 || old('sunbathing', $cosmetic_patient_form->sunbathing ?? 0) == 'No' ? 'checked' : '' }}><label for="sunbathing_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>

                            <div class="col-md-12">
                                <h3
                                    style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                                    History of cosmetic treatments</h3>
                                <p>Have you previously had any of the following treatments?</p><br>
                            </div>
                            <div class="col-md-4">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Fillers</p>
                                    <fieldset id="Fillers" style="min-width: 102px;">
                                        <input type="radio" id="Fillers_Yes" value="Yes" name="Fillers" {{ old('Fillers', $cosmetic_patient_form->Fillers ?? 0) == 1 || old('Fillers', $cosmetic_patient_form->Fillers ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="Fillers_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Fillers_No" value="No" name="Fillers" {{ old('Fillers', $cosmetic_patient_form->Fillers ?? 0) == 0 || old('Fillers', $cosmetic_patient_form->Fillers ?? 0) == 'No' ? 'checked' : '' }}><label for="Fillers_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-8">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Laser Hair Removal/Skin Rejuvenation/Vein Removal</p>
                                    <fieldset id="Laser_Hair_Removal" style="min-width: 102px;">
                                        <input type="radio" id="Laser_Hair_Removal_Yes" value="Yes" name="Laser_Hair_Removal" {{ old('Laser_Hair_Removal', $cosmetic_patient_form->Laser_Hair_Removal ?? 0) == 1 || old('Laser_Hair_Removal', $cosmetic_patient_form->Laser_Hair_Removal ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="Laser_Hair_Removal_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Laser_Hair_Removal_No" value="No" name="Laser_Hair_Removal" {{ old('Laser_Hair_Removal', $cosmetic_patient_form->Laser_Hair_Removal ?? 0) == 0 || old('Laser_Hair_Removal', $cosmetic_patient_form->Laser_Hair_Removal ?? 0) == 'No' ? 'checked' : '' }}><label
                                            for="Laser_Hair_Removal_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-4">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Botox</p>
                                    <fieldset id="Fillers" style="min-width: 102px;">
                                        <input type="radio" id="Botox_Yes" value="Yes" name="Botox" {{ old('Botox', $cosmetic_patient_form->Botox ?? 0) == 1 || old('Botox', $cosmetic_patient_form->Botox ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="Botox_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Botox_No" value="No" name="Botox" {{ old('Botox', $cosmetic_patient_form->Botox ?? 0) == 0 || old('Botox', $cosmetic_patient_form->Botox ?? 0) == 'No' ? 'checked' : '' }}><label for="Botox_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-8">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Chemical Peel</p>
                                    <fieldset id="Chemical_Peel" style="min-width: 102px;">
                                        <input type="radio" id="Chemical_Peel_Yes" value="Yes" name="Chemical_Peel" {{ old('Chemical_Peel', $cosmetic_patient_form->Chemical_Peel ?? 0) == 1 || old('Chemical_Peel', $cosmetic_patient_form->Chemical_Peel ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Chemical_Peel_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Chemical_Peel_No" value="No" name="Chemical_Peel" {{ old('Chemical_Peel', $cosmetic_patient_form->Chemical_Peel ?? 0) == 0 || old('Chemical_Peel', $cosmetic_patient_form->Chemical_Peel ?? 0) == 'No' ? 'checked' : '' }}><label for="Chemical_Peel_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-4">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between"
                                    style="padding-right: 20px; border-right: 1px solid gray;">
                                    <p>Radiofrequency</p>
                                    <fieldset id="Fillers" style="min-width: 102px;">
                                        <input type="radio" id="Radiofrequency_Yes" value="Yes" name="Radiofrequency" {{ old('Radiofrequency', $cosmetic_patient_form->Radiofrequency ?? 0) == 1 || old('Radiofrequency', $cosmetic_patient_form->Radiofrequency ?? 0) == 'Yes' ? 'checked' : '' }}><label for="Radiofrequency_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Radiofrequency_No" value="No" name="Radiofrequency" {{ old('Radiofrequency', $cosmetic_patient_form->Radiofrequency ?? 0) == 0 || old('Radiofrequency', $cosmetic_patient_form->Radiofrequency ?? 0) == 'No' ? 'checked' : '' }}><label for="Radiofrequency_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>
                            <div class="col-md-8">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Microdermabrasion</p>
                                    <fieldset id="Microdermabrasion" style="min-width: 102px;">
                                        <input type="radio" id="Microdermabrasion_Yes" value="Yes" name="Microdermabrasion" {{ old('Microdermabrasion', $cosmetic_patient_form->Microdermabrasion ?? 0) == 1 || old('Microdermabrasion', $cosmetic_patient_form->Microdermabrasion ?? 0) == 'Yes' ? 'checked' : '' }}><label
                                            for="Microdermabrasion_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="Microdermabrasion_No" value="No" name="Microdermabrasion" {{ old('Microdermabrasion', $cosmetic_patient_form->Microdermabrasion ?? 0) == 0 || old('Microdermabrasion', $cosmetic_patient_form->Microdermabrasion ?? 0) == 'No' ? 'checked' : '' }}><label
                                            for="Microdermabrasion_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                            </div>


                            <h3 class="col-md-12"
                                style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                                Chaperone / Follow up</h3>
                            <div class="col-md-12">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Do you require a chaperone?</p>
                                    <fieldset id="chaperone" style="min-width: 102px;">
                                        <input type="radio" id="chaperone_Yes" value="Yes" name="chaperone" {{ old('chaperone', $cosmetic_patient_form->chaperone ?? 0) == 1 || old('chaperone', $cosmetic_patient_form->chaperone ?? 0) == 'Yes' ? 'checked' : '' }}><label for="chaperone_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="chaperone_No" value="No" name="chaperone" {{ old('chaperone', $cosmetic_patient_form->chaperone ?? 0) == 0 || old('chaperone', $cosmetic_patient_form->chaperone ?? 0) == 'No' ? 'checked' : '' }}><label for="chaperone_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Are you happy to be contacted by us for follow up?</p>
                                    <fieldset id="follow_up" style="min-width: 102px;">
                                        <input type="radio" id="follow_up_Yes" value="Yes" name="follow_up" {{ old('follow_up', $cosmetic_patient_form->follow_up ?? 0) == 1 || old('follow_up', $cosmetic_patient_form->follow_up ?? 0) == 'Yes' ? 'checked' : '' }}><label for="follow_up_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="follow_up_No" value="No" name="follow_up" {{ old('follow_up', $cosmetic_patient_form->follow_up ?? 0) == 0 || old('follow_up', $cosmetic_patient_form->follow_up ?? 0) == 'No' ? 'checked' : '' }}><label for="follow_up_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Are you happy for us to take before and after pictures to use on our social media
                                        pages?</p>
                                    <fieldset id="social_media" style="min-width: 102px;">
                                        <input type="radio" id="social_media_Yes" value="Yes" name="social_media" {{ old('social_media', $cosmetic_patient_form->social_media ?? 0) == 1 || old('social_media', $cosmetic_patient_form->social_media ?? 0) == 'Yes' ? 'checked' : '' }}><label for="social_media_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="social_media_No" value="No" name="social_media" {{ old('social_media', $cosmetic_patient_form->social_media ?? 0) == 0 || old('social_media', $cosmetic_patient_form->social_media ?? 0) == 'No' ? 'checked' : '' }}><label for="social_media_No">No</label>
                                    </fieldset>
                                </div>
                                <!--end::Group-->
                                <table style="width: 100%; margin-top: 40px;">
                                    <tr>
                                        <td style="padding-bottom: 0px; {{ Route::currentRouteName() == 'patients.edit-cosmetic' ? 'vertical-align: top;' : '' }}">
                                            Signed:
                                            @if(Route::currentRouteName() == 'patients.edit-cosmetic')
                                            <input type="hidden" name="signature" id="signature" value="{{ old('signature', $cosmetic_patient_form->signature ?? '') }}">
                                            <div class="mt-2 html-content">
                                                <img data-sign-type="parent" class="sign-class" src="{{ old('signature', $cosmetic_patient_form->signature ?? '') }}" alt="" />
                                            </div>
                                            @endif
                                        </td>
                                        <td style="text-align: right; padding-bottom: 0px; width: 350px;">
                                            <!--begin::Group-->
                                            <div class="form-group d-flex align-items-center justify-content-end"
                                                style="gap: 10px;">
                                                <label class="form-label">Date:</label>
                                                <input class="form-control form-control-lg " type="date"
                                                    name="sign_date"
                                                    value="{{ old('sign_date', $cosmetic_patient_form->sign_date ?? '') }}"
                                                    placeholder="Date of birth" style="max-width: 250px;">
                                            </div>
                                            <!--end::Group-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <h3 class="col-md-12"
                                style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                                Your daily skin care regime</h3>
                            <div class="col-md-12">
                                <!--begin::Group-->
                                <div class="d-flex justify-content-between">
                                    <p>Do you use cleansers/toners/exfoliation/sun block</p>
                                    <fieldset id="cleansers" style="min-width: 102px;">
                                        <input type="radio" id="cleansers_Yes" value="Yes" name="cleansers" {{ old('cleansers', $cosmetic_patient_form->cleansers ?? 0) == 1 || old('cleansers', $cosmetic_patient_form->cleansers ?? 0) == 'Yes' ? 'checked' : '' }}><label for="cleansers_Yes">Yes</label>&nbsp;
                                        <input type="radio" id="cleansers_No" value="No" name="cleansers" {{ old('cleansers', $cosmetic_patient_form->cleansers ?? 0) == 0 || old('cleansers', $cosmetic_patient_form->cleansers ?? 0) == 'No' ? 'checked' : '' }}><label for="cleansers_No">No</label>
                                    </fieldset>
                                </div>
                            </div>
                            <h3 class="col-md-12"
                                style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                                Your skin</h3>
                            <p class="col-md-12">How would your skin react to sun exposure without the use of sun block?
                                Tick the
                                box that applies</p>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="never_tans"
                                        id="never_tans" value="never_tans" {{ old('never_tans', $cosmetic_patient_form->never_tans ?? 0) == 1 ? 'checked' : '' }}><label class="form-check-label"
                                        for="never_tans">
                                        Always burns, never tans
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="tans_minimally"
                                        id="tans_minimally" value="tans_minimally"
                                        {{ old('tans_minimally', $cosmetic_patient_form->tans_minimally ?? 0) == 1 ? 'checked' : '' }}><label
                                        class="form-check-label" for="tans_minimally">
                                        Always burns easily, tans minimally
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="tans_uniformly"
                                        id="tans_uniformly" value="tans_uniformly"
                                        {{ old('tans_uniformly', $cosmetic_patient_form->tans_uniformly ?? 0) == 1 ? 'checked' : '' }}><label
                                        class="form-check-label" for="tans_uniformly">
                                        Burns moderately, tans uniformly
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="tans_well" id="tans_well"
                                        value="tans_well"
                                        {{ old('tans_well', $cosmetic_patient_form->tans_well ?? 0) == 1 ? 'checked' : '' }}><label
                                        class="form-check-label" for="tans_well">
                                        Burns minimally, always tans well
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="tans_profusely"
                                        id="tans_profusely" value="tans_profusely"
                                        {{ old('tans_profusely', $cosmetic_patient_form->tans_profusely ?? 0) == 1 ? 'checked' : '' }}><label
                                        class="form-check-label" for="tans_profusely">
                                        Rarely burns, tans profusely
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="Never_burns"
                                        id="Never_burns" value="Never_burns" {{ old('Never_burns', $cosmetic_patient_form->Never_burns ?? 0) == 1 ? 'checked' : '' }}><label class="form-check-label"
                                        for="Never_burns">
                                        Never burns, deeply pigmented dark brown to black skin
                                    </label>
                                </div>
                            </div>
                            <p class="col-md-12">How would you describe your skin? Tick the box that applies</p>
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="Normal" id="Normal"
                                        value="Normal" {{ old('Normal', $cosmetic_patient_form->Normal ?? 0) == 1 ? 'checked' : '' }}><label class="form-check-label" for="Normal">
                                        Normal
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="Dry" id="Dry"
                                        value="Dry" {{ old('Dry', $cosmetic_patient_form->Dry ?? 0) == 1 ? 'checked' : '' }}><label class="form-check-label" for="Dry">
                                        Dry
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="Oily" id="Oily"
                                        value="Oily" {{ old('Oily', $cosmetic_patient_form->Oily ?? 0) == 1 ? 'checked' : '' }}><label class="form-check-label" for="Oily">
                                        Oily
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="Sensitive" id="Sensitive"
                                        value="Sensitive" {{ old('Sensitive', $cosmetic_patient_form->Sensitive ?? 0) == 1 ? 'checked' : '' }}><label class="form-check-label" for="Sensitive">
                                        Sensitive
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="Combination"
                                        id="Combination" value="Combination" {{ old('Combination', $cosmetic_patient_form->Combination ?? 0) == 1 ? 'checked' : '' }}><label class="form-check-label"
                                        for="Combination">
                                        Combination
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="Acne_prone"
                                        id="Acne prone" value="Acne prone" {{ old('Acne_prone', $cosmetic_patient_form->Acne_prone ?? 0) == 1 ? 'checked' : '' }}><label class="form-check-label"
                                        for="Acne prone">
                                        Acne prone
                                    </label>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12 my-2">
                                <!--begin::Group-->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </div>
                            </div>

                        </div>
                        <!--end::Row-->
                    </form>

                    @if(Route::currentRouteName() == 'patients.edit-cosmetic')
                    <div class="modal fade" id="signModal" tabindex="-1" aria-labelledby="signModalLabel" aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content" style="margin: 0 auto; max-width: 550px;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="signModalLabel">Sign</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="float: right">
                                        <button type="button" class="btn btn-danger" id="sig-clearBtn">Clear</button>
                                        <button type="button" class="btn btn-success" id="sig-submitBtn">Save</button>
                                    </div>
                                    <canvas id="canvas-main" class="canvas-main"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
                <!--end::Tab-->
            </div>
        </div>
        <!--begin::Card body-->
    </div>

@endsection


@section('styles')
@if(Route::currentRouteName() == 'patients.edit-cosmetic')
<style>
    .html-content img.sign-class {
        height: 60px;
        min-width: 100px;
        max-width: 100px;
        border: 1px dotted #888;
        cursor: pointer;
    }
    .html-content > img {
        max-width: 200px;
        height: auto;
    }
    .canvas-main {
        width: 300px;
        height: 150px;
        border: 1px solid #ccc;
        display: block;
        margin-top: 8px;
    }
</style>
@endif
@endsection


@section('scripts')
    <script>
        var APPOINTMENTS_AJAX_URL = '{{ route('patients.appointments') }}';
        var SIMILAR_PATIENTS_AJAX_URL = '{{ route('patients.similar') }}';
        var APPOINTMENTS_PAGE = 1;

        $(document).ready(function() {
            var patient_id = $('#tab_appointments').data('patient_id');
            fetchAppointments(patient_id, APPOINTMENTS_PAGE);
setTimeout(onUserTypeChange, 100);
});

        function onUserTypeChange() {
            var selected_type = $('[name="type"]').val() || 'adult';
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
                    break;
            }
        }

        $(document).on('change', '[name="type"]', onUserTypeChange);
                $(document).on('select2:select', '[name="type"]', onUserTypeChange);


        function fetchAppointments(patient_id, page_no) {
            blockPage();

            $.ajax({
                type: 'GET',
                url: APPOINTMENTS_AJAX_URL + '/?patient_id=' + patient_id + '&page=' + page_no,
                success: function(data) {
                    unblockPage();

                    // console.log(data.html);

                    // append data
                    $('#tab_appointments').html(data.html);
                },
                error: function(error) {
                    unblockPage()

                    showErrorAlert(error.responseJSON.message, () => {
                        KTUtil.scrollTop();
                    });
                }
            });
        }

        // $(document).on('click', '.pagination a', function (event) {
        //     event.preventDefault();

        //     $('li').removeClass('active');
        //     $(this).parent('li').addClass('active');

        //     var myurl = $(this).attr('href');
        //     _page = $(this).attr('href').split('page=')[1];

        //     var patient_id = $('#tab_appointments').data('patient_id');
        //     fetchAppointments(patient_id, _page);
        // });

        function findSimilarPatients() {
            var patient_id = $('#patient_form [name="id"]').val();
            var patient_name = $('#patient_form [name="name"]').val();
            var patient_cell_number = $('#patient_form [name="cell_number"]').val();
            var patient_phone = $('#patient_form [name="phone"]').val();
            var patient_email = $('#patient_form [name="email"]').val();

            blockPage();

            $.ajax({
                type: 'GET',
                url: SIMILAR_PATIENTS_AJAX_URL + '/?id=' + patient_id + '&name=' + patient_name + '&cell_number=' +
                    patient_cell_number + '&phone=' + patient_phone + '&email=' + patient_email,
                success: function(data) {
                    unblockPage();

                    // console.log(data);

                    // append data
                    $('#tab_similar').html(data.html);
                    $('[href="#tab_similar"] span.nav-text')
                        .html('Similar Patients (' + data.count + ')');
                },
                error: function(error) {
                    unblockPage()

                    showErrorAlert(error.responseJSON.message, () => {
                        KTUtil.scrollTop();
                    });
                }
            });
        }

        $(document).on('click', '[href="#tab_similar"]', findSimilarPatients);

        @if(Route::currentRouteName() == 'patients.edit-cosmetic')
        // Signature modal (only on patients.edit-cosmetic when $mode = 'cosmetic')
        $('#signModal').on('shown.bs.modal', function () {
            $('html').css('overflow', 'hidden');
        });
        $('#signModal').on('hidden.bs.modal', function () {
            $('html').css('overflow', 'unset');
            if (window.signCanvasCleanup) window.signCanvasCleanup();
        });
        $(document).on('click', '.sign-class', function () {
            $('#signModal').modal('show');
            var SIGN_TYPE = $(this).data('sign-type');
            handleSign(SIGN_TYPE);
        });
        function handleSign(_TYPE) {
            if (window.signCanvasCleanup) {
                window.signCanvasCleanup();
                window.signCanvasCleanup = null;
            }
            var canvas = document.getElementById('canvas-main');
            if (!canvas) return;
            window.requestAnimFrame = (function () {
                return window.requestAnimationFrame || window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame || window.oRequestAnimationFrame ||
                    window.msRequestAnimationFrame || function (c) { window.setTimeout(c, 1000 / 60); };
            })();
            var canvasHeight = 150, canvasWidth = 300;
            canvas.height = canvasHeight;
            canvas.width = canvasWidth;
            var ctx = canvas.getContext('2d');
            ctx.strokeStyle = '#000';
            ctx.lineWidth = 1;
            var drawing = false;
            var mousePos = { x: 0, y: 0 };
            var lastPos = mousePos;
            function getMousePos(canvasDom, e) {
                var rect = canvasDom.getBoundingClientRect();
                return { x: e.clientX - rect.left, y: e.clientY - rect.top };
            }
            function getTouchPos(canvasDom, e) {
                var rect = canvasDom.getBoundingClientRect();
                return { x: e.touches[0].clientX - rect.left, y: e.touches[0].clientY - rect.top };
            }
            function canvasmousedown(e) {
                drawing = true;
                lastPos = getMousePos(canvas, e);
            }
            function canvasmouseup(e) { drawing = false; }
            function canvasmousemove(e) { mousePos = getMousePos(canvas, e); }
            canvas.addEventListener('mousedown', canvasmousedown, false);
            canvas.addEventListener('mouseup', canvasmouseup, false);
            canvas.addEventListener('mousemove', canvasmousemove, false);
            function canvastouchmove(e) {
                var touch = e.touches[0];
                canvas.dispatchEvent(new MouseEvent('mousemove', { clientX: touch.clientX, clientY: touch.clientY }));
            }
            function canvastouchstart(e) {
                mousePos = getTouchPos(canvas, e);
                var touch = e.touches[0];
                canvas.dispatchEvent(new MouseEvent('mousedown', { clientX: touch.clientX, clientY: touch.clientY }));
            }
            function canvastouchend(e) {
                canvas.dispatchEvent(new MouseEvent('mouseup', {}));
            }
            canvas.addEventListener('touchmove', canvastouchmove, false);
            canvas.addEventListener('touchstart', canvastouchstart, false);
            canvas.addEventListener('touchend', canvastouchend, false);
            function renderCanvas() {
                if (drawing) {
                    ctx.moveTo(lastPos.x, lastPos.y);
                    ctx.lineTo(mousePos.x, mousePos.y);
                    ctx.stroke();
                    lastPos = mousePos;
                }
            }
            (function drawLoop() {
                requestAnimFrame(drawLoop);
                renderCanvas();
            })();
            function clearCanvas() { canvas.width = canvas.width; }
            var sigImage = $('[data-sign-type="' + _TYPE + '"]');
            var clearBtn = document.getElementById('sig-clearBtn');
            var submitBtn = document.getElementById('sig-submitBtn');
            clearBtn.addEventListener('click', clearCanvas, false);
            function submitCanvas(e) {
                var dataUrl = canvas.toDataURL();
                $('#signature').val(dataUrl);
                sigImage.attr('src', dataUrl);
                canvas.removeEventListener('mousedown', canvasmousedown);
                canvas.removeEventListener('mouseup', canvasmouseup);
                canvas.removeEventListener('mousemove', canvasmousemove);
                canvas.removeEventListener('touchmove', canvastouchmove);
                canvas.removeEventListener('touchstart', canvastouchstart);
                canvas.removeEventListener('touchend', canvastouchend);
                clearBtn.removeEventListener('click', clearCanvas);
                submitBtn.removeEventListener('click', submitCanvas);
                $('#signModal').modal('hide');
            }
            submitBtn.addEventListener('click', submitCanvas, false);
            window.signCanvasCleanup = function () {
                canvas.removeEventListener('mousedown', canvasmousedown);
                canvas.removeEventListener('mouseup', canvasmouseup);
                canvas.removeEventListener('mousemove', canvasmousemove);
                canvas.removeEventListener('touchmove', canvastouchmove);
                canvas.removeEventListener('touchstart', canvastouchstart);
                canvas.removeEventListener('touchend', canvastouchend);
                clearBtn.removeEventListener('click', clearCanvas);
                submitBtn.removeEventListener('click', submitCanvas);
            };
        }
        @endif
    </script>
@endsection
