<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex flex-wrap justify-content-between align-items-center">
            <a target="_blank" class="mx-auto mt-2 flex-fill" href="{{ route('home') }}">
                <img src="{{ asset(Setting::getValue('logo')) }}" alt="logo" class="brand-sm ">
            </a>
            <div class="d-flex justify-content-between flex-wrap py-3" style="width:5rem">
                @can('setting_manage')
                    <a href="{{ route('admin.settings.index') }}"
                        class="mr-2 text-center text-dark text-decoration-none @active('admin.settings.index')
active
@endactive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="bi bi-gear" viewBox="0 0 16 16">
                            <path
                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                            <path
                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                        </svg>
                    </a>
                @endcan
                @can('manage_files')
                    <a href="{{ route('fm.tinymce5') }}" target="_blank" class="mr-2 text-dark text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="bi bi-folder2-open" viewBox="0 0 16 16">
                            <path
                                d="M1 3.5A1.5 1.5 0 0 1 2.5 2h2.764c.958 0 1.76.56 2.311 1.184C7.985 3.648 8.48 4 9 4h4.5A1.5 1.5 0 0 1 15 5.5v.64c.57.265.94.876.856 1.546l-.64 5.124A2.5 2.5 0 0 1 12.733 15H3.266a2.5 2.5 0 0 1-2.481-2.19l-.64-5.124A1.5 1.5 0 0 1 1 6.14V3.5zM2 6h12v-.5a.5.5 0 0 0-.5-.5H9c-.964 0-1.71-.629-2.174-1.154C6.374 3.334 5.82 3 5.264 3H2.5a.5.5 0 0 0-.5.5V6zm-.367 1a.5.5 0 0 0-.496.562l.64 5.124A1.5 1.5 0 0 0 3.266 14h9.468a1.5 1.5 0 0 0 1.489-1.314l.64-5.124A.5.5 0 0 0 14.367 7H1.633z" />
                        </svg>
                    </a>
                @endcan
                @can('log')
                    <a href="{{ route('admin.logs') }}"
                        class="text-dark text-decoration-none @active('admin.logs')
active
@endactive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                            <path
                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
                        </svg>
                    </a>
                @endcan
            </div>

        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item ">
                <a href="{{ route('admin.index') }}" aria-expanded="false"
                    class="nav-link @active('admin.index')
active
@endactive">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">داشبورد</span><span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        @canany(['manage_news', 'manage_fire_news', 'manage_places', 'manage_public_cell', 'manage_menus',
            'manage_sliders', 'manage_pages', 'manage_communication'])
            <p class="text-muted nav-heading mt-2 mb-1">
                <small>بخش محتوا</small>
            </p>
        @endcanany
        <ul class="navbar-nav flex-fill w-100 mb-2">
            @canany(['manage_news', 'manage_fire_news'])
                <li class="nav-item dropdown @active('admin.content.news')
active
@endactive">
                    <a href="#news" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-newspaper" viewBox="0 0 16 16">
                            <path
                                d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z" />
                            <path
                                d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z" />
                        </svg>
                        <span class="ml-3 item-text">اخبار</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="news">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.news.index') }}"><span
                                    class="ml-1 item-text">همه اخبار </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.news.create') }}"><span
                                    class="ml-1 item-text">اخبار جدید</span></a>
                        </li>
                    </ul>
                </li>
            @endcanany
            @can('manage_places')
                <li class="nav-item dropdown @active('admin.content.places')
active
@endactive">
                    <a href="#places" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pin-map" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                            <path fill-rule="evenodd"
                                d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                        </svg>
                        <span class="ml-3 item-text">مکان های گردشگری</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="places">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.places.index') }}"><span
                                    class="ml-1 item-text">همه مکان ها</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.places.create') }}"><span
                                    class="ml-1 item-text">مکان گردشگری جدید</span></a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('manage_public_cell')
                <li class="nav-item dropdown @active('admin.content.public-calls')
active
@endactive">
                    <a href="#public-call" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-send-check" viewBox="0 0 16 16">
                            <path
                                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372l2.8-7Zm-2.54 1.183L5.93 9.363 1.591 6.602l11.833-4.733Z" />
                            <path
                                d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z" />
                        </svg>
                        <span class="ml-3 item-text">فراخوان های عمومی</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="public-call">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.public-calls.index') }}"><span
                                    class="ml-1 item-text">همه فراخوان ها </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.public-calls.create') }}"><span
                                    class="ml-1 item-text">فراخوان جدید</span></a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('manage_menus')
                <li class="nav-item dropdown @active('admin.content.menus')
active
@endactive">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-menu-up" viewBox="0 0 16 16">
                            <path
                                d="M7.646 15.854a.5.5 0 0 0 .708 0L10.207 14H14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3.793l1.853 1.854zM1 9V6h14v3H1zm14 1v2a1 1 0 0 1-1 1h-3.793a1 1 0 0 0-.707.293l-1.5 1.5-1.5-1.5A1 1 0 0 0 5.793 13H2a1 1 0 0 1-1-1v-2h14zm0-5H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v2zM2 11.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 0-1h-8a.5.5 0 0 0-.5.5zm0-4a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11a.5.5 0 0 0-.5.5zm0-4a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 0-1h-6a.5.5 0 0 0-.5.5z" />
                        </svg>
                        <span class="ml-3 item-text">منو ها</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="menu">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.menus.index') }}"><span
                                    class="ml-1 item-text">همه منو ها </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.menus.create') }}"><span
                                    class="ml-1 item-text">منوی جدید</span></a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('manage_sliders')

                <li class="nav-item dropdown @active('admin.content.sliders')
active
@endactive">
                    <a href="#slider" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-layers fe-16"></i>
                        <span class="ml-3 item-text">اسلایدر</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="slider">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.sliders.index') }}"><span
                                    class="ml-1 item-text">همه اسلایدر شهرداری</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.sliders.create') }}"><span
                                    class="ml-1 item-text">اسلایدر جدید شهرداری</span></a>
                        </li>
                        @can('manage_fire_sliders')
                            <li class="nav-item">
                                <a class="nav-link pl-3" href="{{ route('admin.content.fire-sliders.index') }}"><span
                                        class="ml-1 item-text">اسلایدر آتش نشانی</span></a>
                            </li>
                        @endcan
                    </ul>
                @endcan

            </li>

            @can('manage_theater')
                <li class="nav-item dropdown @active('admin.content.theater')
active
@endactive">
                    <a href="#Theater" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        </svg>
                        <span class="ml-3 item-text">تئاتر خیابانی</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="Theater">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.theater.index') }}"><span
                                    class="ml-1 item-text">همه تئاتر </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.theater.create') }}"><span
                                    class="ml-1 item-text">تئاتر جدید</span></a>
                        </li>
                    </ul>
                </li>
            @endcan


            @can('manage_pages')
                <li class="nav-item dropdown @active('admin.content.pages')
active
@endactive">
                    <a href="#page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-file-earmark-medical" viewBox="0 0 16 16">
                            <path
                                d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                            <path
                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                        </svg>
                        <span class="ml-3 item-text">صفحه ها</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="page">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.pages.index') }}"><span
                                    class="ml-1 item-text">همه صفحات </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.pages.create') }}"><span
                                    class="ml-1 item-text">صفحه جدید</span></a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('manage_council')
                <li class="nav-item dropdown @active('admin.content.council-members')
active
@endactive">
                    <a href="#council" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-hammer" viewBox="0 0 16 16">
                            <path
                                d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z" />
                        </svg>
                        <span class="ml-3 item-text">اعضا شورا شهر</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="council">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.council-members.index') }}"><span
                                    class="ml-1 item-text">همه اعضا شورا شهر </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.council-members.create') }}"><span
                                    class="ml-1 item-text">عضو جدید</span></a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('manage_mayor')
                <li class="nav-item dropdown @active('admin.content.mayors')
active
@endactive">
                    <a href="#mayor" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-building" viewBox="0 0 16 16">
                            <path
                                d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                            <path
                                d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z" />
                        </svg>
                        <span class="ml-3 item-text">شهرداران پیشن</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="mayor">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.mayors.index') }}"><span
                                    class="ml-1 item-text">همه شهرداران </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.content.mayors.create') }}"><span
                                    class="ml-1 item-text">شهردار جدید</span></a>
                        </li>
                    </ul>
                </li>
            @endcan



            @can('manage_mayor_speech')
                <li class="nav-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.content.mayor-speech.index') }}" aria-expanded="false"
                        class="nav-link w-100 @active('admin.content.mayor-speech.index')
active
@endactive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-mic" viewBox="0 0 16 16">
                            <path
                                d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z" />
                            <path
                                d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0v5zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3z" />
                        </svg>
                        <span class="ml-3 item-text">سخن شهردار</span><span class="sr-only">(current)</span>
                    </a>
                </li>
            @endcan

            @can('manage_communication')
                <li class="nav-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.communications.index') }}" aria-expanded="false"
                        class="nav-link w-100 @active('admin.communications')
active
@endactive">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 9v.906a2.25 2.25 0 01-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 001.183 1.981l6.478 3.488m8.839 2.51l-4.66-2.51m0 0l-1.023-.55a2.25 2.25 0 00-2.134 0l-1.022.55m0 0l-4.661 2.51m16.5 1.615a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V8.844a2.25 2.25 0 011.183-1.98l7.5-4.04a2.25 2.25 0 012.134 0l7.5 4.04a2.25 2.25 0 011.183 1.98V19.5z" />
                        </svg>
                        <span class="ml-3 item-text">امور شهروندان</span><span class="sr-only">(current)</span>
                    </a>
                    <a href="#"
                        class="badge badge-pill font-sans badge-primary mr-2">{{ $communications->count() }}</a>
                </li>
            @endcan




            @can('manage_clarification')
                <p class="text-muted text-sm nav-heading mt-2 mb-1">
                    <small>سامانه شفاف سازی</small>
                </p>
                <li class="nav-item dropdown @active('admin.clarification.perssonels')
active
@endactive">
                    <a href="#shafaf" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-wallet2" viewBox="0 0 16 16">
                            <path
                                d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                        </svg>
                        <span class="ml-3 item-text">حقوق و دستمزد</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="shafaf">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.clarification.perssonels.index') }}"><span
                                    class="ml-1 item-text">ثبت اطلاعات کارکنان</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.clarification.salaries.index') }}"><span
                                    class="ml-1 item-text">ثبت حقوق و دستمزد</span></a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item dropdown @active('admin.clarification.contracts')
active
@endactive @active('admin.clarification.salaries')
active
@endactive">
                    <a href="#contracts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-journal-text" viewBox="0 0 16 16">
                            <path
                                d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                            <path
                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                            <path
                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                        </svg>
                        <span class="ml-3 item-text">قرارداد ها</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="contracts">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.clarification.contracts.index') }}"><span
                                    class="ml-1 item-text">همه قرارداد ها</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.clarification.contracts.create') }}"><span
                                    class="ml-1 item-text">قرارداد جدید</span></a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item dropdown @active('admin.clarification.investments')
active
@endactive @active('admin.clarification.categories')
active
@endactive">
                    <a href="#investment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg>
                        <span class="ml-3 item-text">پروژه های سرمایه گذاری</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="investment">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.clarification.investments.index') }}"><span
                                    class="ml-1 item-text">همه پروژه ها</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.clarification.categories.index') }}"><span
                                    class="ml-1 item-text">دسته بندی پروژه ها</span></a>
                        </li>
                    </ul>
                </li>
            @endcan

            @canany(['manage_complaint', 'complaint_handler'])
                <p class="text-muted text-sm nav-heading mt-2 mb-1">
                    <small>سامانه شکایت</small>
                </p>
                @can('complaint_handler')
                    <li class="nav-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.my-complaints.index') }}" aria-expanded="false"
                            class="nav-link w-100 @active('admin.my-complaints')
active
@endactive">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                            </svg>

                            <span class="ml-3 item-text">ارجاع شده به من</span><span class="sr-only">(current)</span>
                            <span class="badge badge-danger py-1 px-2">{{ $myComplaintsCount }}</span>
                        </a>
                    </li>
                @endcan
            @endcanany
            @can('manage_complaint')
                <li class="nav-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.complaints.index') }}" aria-expanded="false"
                        class="nav-link w-100 @active('admin.complaints.index')
active
@endactive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-journal-text" viewBox="0 0 16 16">
                            <path
                                d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                            <path
                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                            <path
                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                        </svg>
                        <span class="ml-3 item-text">شکایات</span><span class="sr-only">(current)</span>
                    </a>
                </li>

                <li
                    class="nav-item dropdown @active('admin.department')
active
@endactive @active('admin.departement')
active
@endactive">
                    <a href="#department" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg>
                        <span class="ml-3 item-text">دپارتمان ها</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="department">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.departements.index') }}"><span
                                    class="ml-1 item-text">همه دپارتمان ها</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.departements.create') }}"><span
                                    class="ml-1 item-text">دپارتمان جدید</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.complaints.settings.index') }}" aria-expanded="false"
                        class="nav-link w-100 @active('admin.complaints.settings.index')
active
@endactive">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="16" height="16"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                        </svg>

                        <span class="ml-3 item-text">تنظیمات</span><span class="sr-only">(current)</span>
                    </a>
                </li>
            @endcan


            @can('manage_users')
                <p class="text-muted text-sm nav-heading mt-2 mb-1">
                    <small>بخش کاربران و دسترسی ها </small>
                </p>
                <li class="nav-item dropdown @active('admin.user.users')
active
@endactive">
                    <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-people" viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                        </svg>
                        <span class="ml-3 item-text">کاربران</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="users">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.user.users.index') }}"><span
                                    class="ml-1 item-text">همه کاربران </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.user.users.create') }}"><span
                                    class="ml-1 item-text">کاربر جدید</span></a>
                        </li>
                    </ul>
                </li>
            @endcan

            @can('manage_roles')
                <li class="nav-item dropdown @active('admin.user.roles')
active
@endactive">
                    <a href="#roles" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-shield-exclamation" viewBox="0 0 16 16">
                            <path
                                d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                            <path
                                d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                        <span class="ml-3 item-text">سطوح دسترسی</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="roles">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.user.roles.index') }}"><span
                                    class="ml-1 item-text">همه نقش ها </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.user.roles.create') }}"><span
                                    class="ml-1 item-text">نقش جدید</span></a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>

    </nav>
</aside>
