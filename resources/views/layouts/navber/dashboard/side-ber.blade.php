<ul class="side-nav">
    <li class="side-nav-title side-nav-item">Navigation</li>
    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span class="badge bg-success float-end">4</span>
            <span> Home </span>
        </a>
        <div class="collapse" id="sidebarDashboards">
            <ul class="side-nav-second-level">
                <li>
                    <a href="dashboard-analytics.html">Analytics</a>
                </li>
                <li>
                    <a href="dashboard-crm.html">CRM</a>
                </li>
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
                    <a href="{{route('users.index')}}">All User</a>
                </li>
                <li>
                    <a href="apps-email-read.html">Read Email</a>
                </li>
            </ul>
        </div>
    </li>
</ul>