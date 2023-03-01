<ul class="side-nav">
    <li class="side-nav-title side-nav-item">Navigation</li>
    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
            <i class="uil-home-alt"></i>
            {{-- <span class="badge bg-success float-end">4</span> --}}
            <span>Front Page </span>
            {{-- <a href="/"><span> Home </span></a> --}}
        </a>
        <div class="collapse" id="sidebarDashboards">
            <ul class="side-nav-second-level">
                <li>
                    <a href="/">Home Page</a>
                </li>
                <li>
                    <a href="{{route('department.index')}}"><strong>+</strong> Add Department</a>
                </li>
                <li>
                    <a href="{{route('subject.index')}}"><strong>+</strong> Add Subject</a>
                </li>
                <li>
                    <a href="{{route('admin.add-teacher')}}"><strong>+</strong> Add Teachers</a>
                </li>
                @if (Auth::guard('teacher')->check())    
                    <li>
                        <a href="{{route('admin.add-student')}}"><strong>+</strong> Add Srudent</a>
                    </li>
                @endif
            </ul>
        </div>
    </li>
    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
            <i class="mdi mdi-account-circle"></i>
            <span> Users </span>
        </a>
        <div class="collapse" id="sidebarEmail">
            <ul class="side-nav-second-level">
                <li>
                    <a href="">All User</a>
                </li>
                <li>
                    <a href="apps-email-read.html">Read Email</a>
                </li>
            </ul>
        </div>
    </li>
</ul>