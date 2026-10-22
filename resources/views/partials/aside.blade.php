<!--begin::Aside-->
<div class="aside aside-left d-flex aside-fixed" id="kt_aside">
    <!--begin::Primary-->
    <div class="aside-primary d-flex flex-column align-items-center flex-row-auto">
        <!--begin::Brand-->
        <div class="py-5 aside-brand d-flex flex-column align-items-center flex-column-auto py-lg-12">
            <!--begin::Logo-->
            @php
                $sidebarRole = auth()->user()->currentRole();
                $sidebarLogo = $sidebarRole->header_logo ?: ($sidebarRole->logo ?? null);

                if ($sidebarLogo && ! \Illuminate\Support\Str::startsWith($sidebarLogo, ['http://', 'https://', 'data:image/'])) {
                    $sidebarLogo = asset(ltrim($sidebarLogo, '/'));
                }
            @endphp
            <a href="{{ url('/') }}">
                <img alt="{{ $sidebarRole->name ?? 'Clinic' }} logo"
                    src="{{ $sidebarLogo ?: url('/logo.jpg') }}" class="max-h-30px" />
            </a>
            <span class="active-role-rail-label">
                {{ \Illuminate\Support\Str::of($sidebarRole->name ?? 'Default role')->replace(['_', '-'], ' ')->title() }}
            </span>
            <!--end::Logo-->
        </div>
        <!--end::Brand-->

        <!--begin::Nav Wrapper-->
        <div class="py-5 aside-nav d-flex flex-column align-items-center flex-column-fluid scroll scroll-pull">
            <!--begin::Nav-->
            <ul class="nav flex-column" role="tablist">

                <!--begin::Item-->
                <li class="mb-3 nav-item" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="Main">
                    <a href="#"
                        class="nav-link btn btn-icon btn-clean btn-lg {{ Route::is('dashboard') || Route::is('patients') || Route::is('patients.*') ? 'active' : '' }}"
                        data-toggle="tab" data-target="#kt_aside_tab_1" role="tab">
                        <span class="svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </a>
                </li>
                <!--end::Item-->

                <!--begin::Item-->
                <li class="mb-3 nav-item" data-toggle="tooltip" data-placement="right" data-container="body"
                    data-boundary="window" title="Settings">
                    <a href="#"
                        class="nav-link btn btn-icon btn-clean btn-lg {{ Route::is('settings.*') ? 'active' : '' }}"
                        data-toggle="tab" data-target="#kt_aside_settings" role="tab">
                        <span class="svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                        fill="#000000" />
                                    <path
                                        d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </a>
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Nav-->
        </div>
        <!--end::Nav Wrapper-->

        <!--begin::Footer-->
        <div class="py-4 aside-footer d-flex flex-column align-items-center flex-column-auto py-lg-10">
            <!--begin::Aside Toggle-->
            <span class="shadow-sm aside-toggle btn btn-icon btn-primary btn-hover-primary" id="kt_aside_toggle"
                data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window"
                title="Toggle Aside">
                <i class="ki ki-bold-arrow-back icon-sm"></i>
            </span>
            <!--end::Aside Toggle-->
            <!--begin::Quick Actions-->
            <a href="#" class="mb-1 btn btn-icon btn-clean btn-lg" id="kt_quick_actions_toggle"
                data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window"
                title="Quick Actions">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16"
                                rx="1.5" />
                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </a>
            <!--end::Quick Actions-->
            <!--begin::Quick Panel-->
            <a href="#" class="mb-1 btn btn-icon btn-clean btn-lg position-relative" id="kt_quick_panel_toggle"
                data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window"
                title="Quick Panel">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                            <path
                                d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
                <span
                    class="top-0 right-0 mt-1 mr-1 label label-sm label-light-danger label-rounded font-weight-bolder position-absolute">3</span>
            </a>
            <!--end::Quick Panel-->
            <!--begin::User-->
            <a href="#" class="btn btn-icon btn-clean btn-lg w-40px h-40px" id="kt_quick_user_toggle"
                data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window"
                title="User Profile">
                <span class="symbol symbol-30 symbol-lg-40">
                    <span class="svg-icon svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path
                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <!--<span class="symbol-label font-size-h5 font-weight-bold">S</span>-->
                </span>
            </a>
            <!--end::User-->
        </div>
        <!--end::Footer-->

    </div>
    <!--end::Primary-->
    <!--begin::Secondary-->
    <div class="aside-secondary d-flex flex-row-fluid">
        <!--begin::Workspace-->
        <div class="my-2 aside-workspace scroll scroll-push">
            <!--begin::Tab Content-->
            <div class="tab-content">

                <!--begin::Tab Pane-->
                <div class="tab-pane p-3 px-lg-7 py-lg-5 fade {{ Route::is('dashboard') || Route::is('patients') || Route::is('patients.*') || Route::is('unapproved-patients') || Route::is('unappointed-patients') || Route::is('followup-patients') || Route::is('patient-register') || Route::is('patients.appointments.feedback.*') || Route::is('patient-register.*') || Route::is('slots.*') || Route::is('remote-parent-signature.*') || Route::is('face-map-points.*') || Route::is('botox-face-map-points.*') || Route::is('cosmetic-medical.*') || Route::is('unapproved-aesthetic') || Route::is('unapproved-aesthetic.*') ? 'show active' : '' }}"
                    id="kt_aside_tab_1">
                    {{-- <!--begin::Form-->
                    <form class="p-2 p-lg-3">
                        <div class="d-flex">
                            <div class="input-icon h-40px">
                                <input type="text" class="form-control form-control-lg form-control-solid h-40px"
                                    placeholder="Search..." id="generalSearch" />
                                <span>
                                    <span class="svg-icon svg-icon-lg">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                            </div>
                            <div class="dropdown" data-toggle="tooltip" title="Quick actions" data-placement="left">
                                <a href="#"
                                    class="flex-shrink-0 ml-2 btn btn-icon btn-default btn-hover-primary h-40px w-40px"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-icon svg-icon-lg">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="py-5 navi navi-hover">
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-drop"></i>
                                                </span>
                                                <span class="navi-text">New Group</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-list-3"></i>
                                                </span>
                                                <span class="navi-text">Contacts</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-rocket-1"></i>
                                                </span>
                                                <span class="navi-text">Groups</span>
                                                <span class="navi-link-badge">
                                                    <span
                                                        class="label label-light-primary label-inline font-weight-bold">new</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-bell-2"></i>
                                                </span>
                                                <span class="navi-text">Calls</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-gear"></i>
                                                </span>
                                                <span class="navi-text">Settings</span>
                                            </a>
                                        </li>
                                        <li class="my-3 navi-separator"></li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-magnifier-tool"></i>
                                                </span>
                                                <span class="navi-text">Help</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-bell-2"></i>
                                                </span>
                                                <span class="navi-text">Privacy</span>
                                                <span class="navi-link-badge">
                                                    <span
                                                        class="label label-light-danger label-rounded font-weight-bold">5</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form--> --}}
                    <h3 class="p-2 my-1 p-lg-3 my-lg-3">Welcome</h3>
                    <!--begin::List-->
                    <div class="list list-hover">

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('dashboard') || Route::is('dashboard.*') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                                    fill="#000000"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Dashboard</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->
                    <!--begin::List-->
                    <div class="list list-hover">

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('patients') || Route::is('patients.*') ? 'active' : '' }}">
                            <a href="{{ route('patients') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Patients</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->
                    <div class="list list-hover">
                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('patients.search') || Route::is('patients.search.*') ? 'active' : '' }}">
                            <a href="{{ route('patients.search') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Patients Search</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--begin::List-->
                    <div class="list list-hover">

                        <!--begin::Item-->
                        <div class="p-2 mb-2 list-item hoverable p-lg-3">
                            <a href="{{ route('patients', ['appointment_type' => 'pre_assessment_appointment']) }}"
                                class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Pre assessment Patients</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->
                    <!--begin::List-->
                    <div class="list list-hover">

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('unapproved-patients') || Route::is('unapproved-patients.*') ? 'active' : '' }}">
                            <a href="{{ route('unapproved-patients') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Unapproved Patients</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->
                    <!--begin::List-->
                    <div class="list list-hover">

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('unappointed-patients') || Route::is('unappointed-patients.*') ? 'active' : '' }}">
                            <a href="{{ route('unappointed-patients') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Unappointed Patients</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->
                    <!--begin::List-->
                    <div class="list list-hover">

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('followup-patients') || Route::is('followup-patients.*') ? 'active' : '' }}">
                            <a href="{{ route('followup-patients') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Followup Patients</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->
                    <!--begin::List-->
                    <div class="list list-hover">

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('patient-register') || Route::is('patient-register.*') ? 'active' : '' }}">
                            <a href="{{ route('patient-register') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Patient Inquiries</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->
                     @if(auth()->user()->currentRoleId() === 1)
                    <!--begin::List-->
                    <div class="list list-hover">

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('patients.reports.history') || Route::is('patients.reports.history.*') ? 'active' : '' }}">
                            <a href="{{ route('patients.reports.history') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M12,3 C7.02943725,3 3,7.02943725 3,12 C3,16.9705627 7.02943725,21 12,21 C16.9705627,21 21,16.9705627 21,12 C21,7.02943725 16.9705627,3 12,3 Z M12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M11,6 C11,5.44771525 11.4477153,5 12,5 C12.5522847,5 13,5.44771525 13,6 L13,11.5857864 L15.7071068,14.2928932 C16.0976311,14.6834175 16.0976311,15.3165825 15.7071068,15.7071068 C15.3165825,16.0976311 14.6834175,16.0976311 14.2928932,15.7071068 L11.2928932,12.7071068 C11.1053568,12.5195704 11,12.2652165 11,12 L11,6 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Patient History</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->
                    @endif
                    <!--begin::List-->
                    <div class="list list-hover">
                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('patients.appointments.feedback.list') || Route::is('patients.appointments.feedback.list.*') ? 'active' : '' }}">
                            <a href="{{ route('patients.appointments.feedback.list') }}"
                                class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Patient Feedback</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::List-->
                    <!--begin::List-->
                    <div class="list list-hover has-submenu">
                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('slots') || Route::is('slots.*') ? 'active' : '' }}">
                            <a href="javascript:void(0);" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Slots</span>
                                </div>
                                <!--begin::End-->
                            </a>
                            <div class="submenu-list">
                                <div class="list list-hover">
                                    <!--begin::Item-->
                                    <div
                                        class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('slots') || Route::is('slots.*') ? 'active' : '' }}">
                                        <a href="{{ route('slots.all-slot-lists') }}"
                                            class="d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="mr-4 symbol symbol-40 symbol-light">
                                                <span class="symbol-label bg-hover-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                fill="#000000" />
                                                            <path
                                                                d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="mr-2 d-flex flex-column flex-grow-1">
                                                <span class="mb-0 text-dark-75 font-size-h6">All Slots</span>
                                            </div>
                                            <!--begin::End-->
                                        </a>
                                        <div class="submenu-list">

                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div
                                        class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('slots') || Route::is('slots.*') ? 'active' : '' }}">
                                        <a href="{{ route('slots.add') }}" class="d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="mr-4 symbol symbol-40 symbol-light">
                                                <span class="symbol-label bg-hover-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                fill="#000000" />
                                                            <path
                                                                d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="mr-2 d-flex flex-column flex-grow-1">
                                                <span class="mb-0 text-dark-75 font-size-h6">Create Slots</span>
                                            </div>
                                            <!--begin::End-->
                                        </a>
                                        <div class="submenu-list">

                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div
                                        class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('slots') || Route::is('slots.*') ? 'active' : '' }}">
                                        <a href="{{ route('slots.available-slot-lists') }}"
                                            class="d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="mr-4 symbol symbol-40 symbol-light">
                                                <span class="symbol-label bg-hover-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                fill="#000000" />
                                                            <path
                                                                d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="mr-2 d-flex flex-column flex-grow-1">
                                                <span class="mb-0 text-dark-75 font-size-h6">Find Available
                                                    Slots</span>
                                            </div>
                                            <!--begin::End-->
                                        </a>

                                        <div class="submenu-list">

                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div
                                        class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('slots') || Route::is('slots.*') ? 'active' : '' }}">
                                        <a href="{{ route('slots.import') }}" class="d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="mr-4 symbol symbol-40 symbol-light">
                                                <span class="symbol-label bg-hover-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                fill="#000000" />
                                                            <path
                                                                d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="mr-2 d-flex flex-column flex-grow-1">
                                                <span class="mb-0 text-dark-75 font-size-h6">Bulk Slots</span>
                                            </div>
                                            <!--begin::End-->
                                        </a>
                                        <div class="submenu-list">

                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::List-->
                    <!--begin::List-->
                    <div class="list list-hover">
                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('remote-parent-signature') || Route::is('remote-parent-signature.*') ? 'active' : '' }}">
                            <a href="{{ route('remote-parent-signature.index') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Remote Parent Signature</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->
                    <!--begin::List-->
                    
                    <!--end::List-->
                    @if(in_array(auth()->user()->currentRole()->name ?? '', ['aesthetics_botox', 'aesthetics_filler', 'aesthetics_mesotherapy'], true))
                    <!--begin::List-->
                    <div class="list list-hover">
                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('face-map-points') || Route::is('face-map-points.*') ? 'active' : '' }}">
                            <a href="{{ route('face-map-points.index') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 Z M12,4 C7.581722,4 4,7.581722 4,12 C4,16.418278 7.581722,20 12,20 C16.418278,20 20,16.418278 20,12 C20,7.581722 16.418278,4 12,4 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <circle fill="#000000" cx="9" cy="10" r="1.5" />
                                                <circle fill="#000000" cx="15" cy="10" r="1.5" />
                                                <path
                                                    d="M12,16 C13.6568542,16 15,14.8807119 15,14 L9,14 C9,14.8807119 10.3431458,16 12,16 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Face Map Points</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->
                    <!--begin::List-->
                    <div class="list list-hover">
                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('botox-face-map-points') || Route::is('botox-face-map-points.*') ? 'active' : '' }}">
                            <a href="{{ route('botox-face-map-points.index') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M12,4 L15,8 L13,8 L13,14 L11,14 L11,8 L9,8 L12,4 Z" fill="#000000" />
                                                <path d="M17,19 L7,19 C6.44771525,19 6,18.5522847 6,18 L6,15 L18,15 L18,18 C18,18.5522847 17.5522847,19 17,19 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Botox Face Map Points</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <div class="list list-hover">
                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('cosmetic-medical') || Route::is('cosmetic-medical.*') ? 'active' : '' }}">
                            <a href="{{ route('cosmetic-medical.index') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Cosmetic Medical</span>
                                </div>
                                <!--begin::End-->

                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->
                    
                    <!-- <div class="list list-hover">
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('unapproved-aesthetic') || Route::is('unapproved-aesthetic.*') ? 'active' : '' }}">
                            <a href="{{ route('unapproved-aesthetic') }}" class="d-flex align-items-center">
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>

                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Unapproved Aesthetic</span>
                                </div>

                            </a>
                        </div>
                    </div> -->
                    @endif
                </div>
                <!--end::Tab Pane-->

                <!--begin::Tab Pane-->
                <div class="tab-pane p-3 px-lg-7 py-lg-5 fade {{ Route::is('settings.*') ? 'show active' : '' }}"
                    id="kt_aside_settings">
                    <h3 class="p-2 my-1 p-lg-3 my-lg-3">Settings</h3>
                    <!--begin::List-->
                    <div class="list list-hover">

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('settings.general') || Route::is('settings.general.*') ? 'active' : '' }}">
                            <a href="{{ route('settings.general') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">General</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('settings.doctors') || Route::is('settings.doctors.*') ? 'active' : '' }}">
                            <a href="{{ route('settings.doctors') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Doctors</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('settings.medicines') || Route::is('settings.medicines.*') ? 'active' : '' }}">
                            <a href="{{ route('settings.medicines') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Medicines</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('settings.team') || Route::is('settings.team.*') ? 'active' : '' }}">
                            <a href="{{ route('settings.team') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Team</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('settings.templates') || Route::is('settings.templates.*') ? 'active' : '' }}">
                            <a href="{{ route('settings.templates') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Templates</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::List-->

                    <h3 class="p-2 my-1 p-lg-3 my-lg-3">Setups</h3>
                    <!--begin::List-->
                    <div class="list list-hover">

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('settings.setups.states') || Route::is('settings.setups.states.*') ? 'active' : '' }}">
                            <a href="{{ route('settings.setups.states') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">States</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div
                            class="list-item hoverable p-2 p-lg-3 mb-2 {{ Route::is('settings.setups.cities') || Route::is('settings.setups.cities.*') ? 'active' : '' }}">
                            <a href="{{ route('settings.setups.cities') }}" class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="mr-4 symbol symbol-40 symbol-light">
                                    <span class="symbol-label bg-hover-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000" />
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Text-->
                                <div class="mr-2 d-flex flex-column flex-grow-1">
                                    <span class="mb-0 text-dark-75 font-size-h6">Cities</span>
                                </div>
                                <!--begin::End-->
                            </a>
                        </div>
                        <!--end::Item-->

                    </div>

                </div>
                <!--end::Tab Pane-->

            </div>
            <!--end::Tab Content-->
        </div>
        <!--end::Workspace-->
    </div>
    <!--end::Secondary-->
</div>
<!--end::Aside-->

<style>
    .list-hover.has-submenu .list-item>a {
        position: relative;
    }

    .list-hover.has-submenu .list-item>a.submenu-active:after {
        transform: rotate(180deg)
    }

    .list-hover.has-submenu>.list-item>a:after {
        font-family: Ki;
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        line-height: 1;
        text-decoration: inherit;
        text-rendering: optimizeLegibility;
        text-transform: none;
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        font-smoothing: antialiased;
        content: "";
    }

    .list-hover.has-submenu .submenu-list {
        display: none;
    }

    .list-hover.has-submenu .submenu-list.active {
        display: block;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.list-hover.has-submenu .list-item > a').on('click', function() {
            $(this).toggleClass('submenu-active')
            $(this).parents('.list-item').find('.submenu-list').toggleClass('active')
        })
    })
</script>
