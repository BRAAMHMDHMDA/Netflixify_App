<!--begin::Header-->
<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
    <!--begin::Header container-->
    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
        <!--begin::Sidebar mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
        </div>
        <!--end::Sidebar mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ asset('../../demo1/dist/index.html') }}" class="d-lg-none">
                <img alt="Logo" src="{{ asset('assets/media/logos/default-small.svg') }}" class="h-30px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <!--begin::Menu wrapper-->
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <!--begin::Menu-->
                <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                    <!--begin:Menu item-->
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                        <!--begin:Menu link-->

                            <i class="ki-duotone ki-time fs-1 me-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        <div id="clock" class="clock fs-3 fw-semibold" style="color: #131313"></div>

                        <!--end:Menu link-->

                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Menu wrapper-->
            <!--begin::Navbar-->
            <div class="app-navbar flex-shrink-0">
                <!--begin::Search-->
                <div class="app-navbar-item align-items-stretch ms-1 ms-md-4">
                </div>
                <!--end::Search-->
{{--                <!--begin::Activities-->--}}
{{--                <div class="app-navbar-item ms-1 ms-md-4">--}}
{{--                    <!--begin::Drawer toggle-->--}}
{{--                    <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" id="kt_activities_toggle">--}}
{{--                        <i class="ki-duotone ki-messages fs-2">--}}
{{--                            <span class="path1"></span>--}}
{{--                            <span class="path2"></span>--}}
{{--                            <span class="path3"></span>--}}
{{--                            <span class="path4"></span>--}}
{{--                            <span class="path5"></span>--}}
{{--                        </i>--}}
{{--                    </div>--}}
{{--                    <!--end::Drawer toggle-->--}}
{{--                </div>--}}
{{--                <!--end::Activities-->--}}
{{--                <!--begin::Notifications-->--}}
{{--                <div class="app-navbar-item ms-1 ms-md-4">--}}
{{--                    <!--begin::Menu- wrapper-->--}}
{{--                    <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" id="kt_menu_item_wow">--}}
{{--                        <i class="ki-duotone ki-notification-status fs-2">--}}
{{--                            <span class="path1"></span>--}}
{{--                            <span class="path2"></span>--}}
{{--                            <span class="path3"></span>--}}
{{--                            <span class="path4"></span>--}}
{{--                        </i>--}}
{{--                    </div>--}}
{{--                    <!--begin::Menu-->--}}

{{--                    <!--end::Menu-->--}}
{{--                    <!--end::Menu wrapper-->--}}
{{--                </div>--}}
{{--                <!--end::Notifications-->--}}
{{--                <!--begin::Chat-->--}}
{{--                <div class="app-navbar-item ms-1 ms-md-4">--}}
{{--                    <!--begin::Menu wrapper-->--}}
{{--                    <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px position-relative" id="kt_drawer_chat_toggle">--}}
{{--                        <i class="ki-duotone ki-message-text-2 fs-2">--}}
{{--                            <span class="path1"></span>--}}
{{--                            <span class="path2"></span>--}}
{{--                            <span class="path3"></span>--}}
{{--                        </i>--}}
{{--                        <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>--}}
{{--                    </div>--}}
{{--                    <!--end::Menu wrapper-->--}}
{{--                </div>--}}
{{--                <!--end::Chat-->--}}

                <!--begin::User menu-->
                <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-40 px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <img src="{{ Auth::user()->image_url }}" class="rounded-3" alt="user" />
                    </div>
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img  alt="Logo" src="{{ Auth::user()->image_url }}" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">{{Auth::user()->name}}
                                        {{--														<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>--}}
                                    </div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{Auth::user()->email}}</a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="{{ route('dashboard.profile.index') }}" class="menu-link px-5">My Profile</a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="menu-link px-5">
												<span class="menu-title position-relative">Mode
												<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
													<i class="ki-duotone ki-night-day theme-light-show fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
														<span class="path5"></span>
														<span class="path6"></span>
														<span class="path7"></span>
														<span class="path8"></span>
														<span class="path9"></span>
														<span class="path10"></span>
													</i>
													<i class="ki-duotone ki-moon theme-dark-show fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span></span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-duotone ki-night-day fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
																<span class="path4"></span>
																<span class="path5"></span>
																<span class="path6"></span>
																<span class="path7"></span>
																<span class="path8"></span>
																<span class="path9"></span>
																<span class="path10"></span>
															</i>
														</span>
                                        <span class="menu-title">Light</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-duotone ki-moon fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                        <span class="menu-title">Dark</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-duotone ki-screen fs-2">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
																<span class="path4"></span>
															</i>
														</span>
                                        <span class="menu-title">System</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu item-->
{{--                        <!--begin::Menu item-->--}}
{{--                        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">--}}
{{--                            <a href="#" class="menu-link px-5">--}}
{{--												<span class="menu-title position-relative">Language--}}
{{--												<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English--}}
{{--												<img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('assets/media/flags/united-states.svg') }}" alt="" /></span></span>--}}
{{--                            </a>--}}
{{--                            <!--begin::Menu sub-->--}}
{{--                            <div class="menu-sub menu-sub-dropdown w-175px py-4">--}}
{{--                                <!--begin::Menu item-->--}}
{{--                                <div class="menu-item px-3">--}}
{{--                                    <a href="{{ asset('../../demo1/dist/account/settings.html') }}" class="menu-link d-flex px-5 active">--}}
{{--													<span class="symbol symbol-20px me-4">--}}
{{--														<img class="rounded-1" src="{{ asset('assets/media/flags/united-states.svg') }}" alt="" />--}}
{{--													</span>English</a>--}}
{{--                                </div>--}}
{{--                                <!--end::Menu item-->--}}
{{--                                <!--begin::Menu item-->--}}
{{--                                <div class="menu-item px-3">--}}
{{--                                    <a href="{{ asset('../../demo1/dist/account/settings.html') }}" class="menu-link d-flex px-5">--}}
{{--													<span class="symbol symbol-20px me-4">--}}
{{--														<img class="rounded-1" src="{{ asset('assets/media/flags/saudi-arabia.svg') }}" alt="" />--}}
{{--													</span>Arabic</a>--}}
{{--                                </div>--}}
{{--                                <!--end::Menu item-->--}}
{{--                            </div>--}}
{{--                            <!--end::Menu sub-->--}}
{{--                        </div>--}}
{{--                        <!--end::Menu item-->--}}
                        <!--begin::Menu item-->
                        <div class="menu-item px-5 my-1">
                            <a href="{{ route('dashboard.profile.settings') }}" class="menu-link px-5">Account Settings</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            @livewire('dashboard.auth.dashboard-logout-component')
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
                <!--begin::Header menu toggle-->
                <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                    <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
                        <i class="ki-duotone ki-element-4 fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <!--end::Header menu toggle-->
                <!--begin::Aside toggle-->
                <!--end::Header menu toggle-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Header wrapper-->
    </div>
    <!--end::Header container-->
</div>
<!--end::Header-->
@push('scripts')
    <script>
       $(document).ready(function(){
           function updateClock() {
               const clock = $('#clock');
               const now = new Date();
               const hours = now.getHours();
               const minutes = now.getMinutes().toString().padStart(2, '0');
               const seconds = now.getSeconds().toString().padStart(2, '0');
               const amPm = hours >= 12 ? 'PM' : 'AM';

               const formattedHours = (hours % 12 || 12).toString().padStart(2, '0'); // Convert to 12-hour format

               const timeString = `${formattedHours}:${minutes}:${seconds} ${amPm}`;
               clock.text(timeString);
           }

            // Update the clock every second
           setInterval(updateClock, 1000);

            // Initial update
           updateClock();

       })
    </script>
@endpush
