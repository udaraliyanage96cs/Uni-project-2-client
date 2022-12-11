<div >

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @if(Auth::User()->desig_id == 0)
        <!-- For Super Admin -->
            <li class="nav-item">
                <a href="/subdashboard" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/allusers" class="nav-link">
                    <i class="fas fa-user-friends"></i>
                    <p>
                        Group
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/createusers" class="nav-link">
                    <i class="fas fa-user-plus"></i>
                    <p>
                        Create Users
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/activitylog" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <p>
                        Activity Logs
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/webapprovel" class="nav-link">
                    <i class="fas fa-thumbs-up"></i>
                    <p>
                        Web Team Approvel
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/userpprovel" class="nav-link">
                    <i class="fas fa-key"></i>
                    <p>
                        User Group Approvel
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/articlesettings" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <p>
                        Article Settings
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/usersettings" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <p>
                        Admin Settings
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
        
        @elseif(Auth::User()->desig_id == 1 || Auth::User()->desig_id == 6)
        <!-- For Students -->
            <li class="nav-item">
                <a href="/userhome" class="nav-link">
                    <i class="fas fa-home"></i>
                    <p>
                        Home
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/articles" class="nav-link">
                    <i class="far fa-newspaper"></i>
                    <p>
                        Articles
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/newarticles" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>
                        New Article
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/activitylog" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <p>
                        Activity Logs
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/usersettings" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <p>
                        User Settings
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>

        @elseif(Auth::User()->desig_id == 2 || Auth::User()->desig_id == 4)
        <!-- For Department Head -->
            <li class="nav-item">
                <a href="/subdashboard" class="nav-link">
                    <i class="fas fa-home"></i>
                    <p>
                        Home
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/articles" class="nav-link">
                    <i class="far fa-newspaper"></i>
                    <p>
                        My Articles
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/otherarticles" class="nav-link">
                    <i class="fas fa-key"></i>
                    <p>
                        Permissions
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/meeting" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <p>
                        Meetings
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/newarticles" class="nav-link">
                    <i class="fas fa-folder-plus"></i>
                    <p>
                        New Article
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/allusers" class="nav-link">
                    <i class="fas fa-user-friends"></i>
                    <p>
                        Group
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/activitylog" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <p>
                        Activity Logs
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/usersettings" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <p>
                        Settings
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
        

        @elseif(Auth::User()->desig_id == 5)
        <!-- For Web Team Users -->
        <li class="nav-item">
            <a href="/webarticles" class="nav-link">
                <i class="fas fa-tachometer-alt"></i>
                <p>
                    Articles
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
                <a href="/usersettings" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <p>
                        Settings
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
        @endif

    </ul>
</div>
<style>
    .nav-link i{
        margin-right:15px;
    }
</style>