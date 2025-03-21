<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            REApp<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Role</li>
            <li class="nav-item" @if (Request::segment(2) == 'users') active @endif>
                <a href="{{ url('admin/users') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Users</span>
                </a>
            </li>

            <li class="nav-item nav-category">User Week</li>
            <li class="nav-item" @if (Request::segment(2) == 'week') active @endif>
                <a href="{{ url('admin/week') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Week</span>
                </a>
            </li>

            <li class="nav-item" @if (Request::segment(2) == 'week_time') active @endif>
                <a href="{{ url('admin/week_time') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Week Time</span>
                </a>
            </li>


            <li class="nav-item" @if (Request::segment(2) == 'schedule') active @endif>
                <a href="{{ url('admin/schedule') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Schedule</span>
                </a>
            </li>

            <li class="nav-item nav-category">Notification</li>

            <li class="nav-item @if (Request::segment(2) == 'notification') active @endif ">
                <a href="{{ url('admin/notification') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title"> Push Notification</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('admin/qrcode') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">QR Code</span>
                </a>
            </li>


            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Email</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/email/compose') }}" class="nav-link">Compose</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('admin/email/send') }}" class="nav-link">Send Email</a>
                        </li>


                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="pages/apps/calendar.html" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Calendar</span>
                </a>
            </li>
            <li class="nav-item nav-category">Components</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false"
                    aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">UI Kit</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false"
                    aria-controls="advancedUI">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Advanced UI</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
