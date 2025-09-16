<div class="page-sidebar pb-5">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{{route('dashboard')}}">School</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{{asset('backend/assets/images/users/avatar.jpg')}}" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{{asset('backend/assets/images/users/avatar.jpg')}}" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{Auth::user()->name}} ({{Auth::user()->roles->pluck('name')->implode(', ')}})</div>
                    <div class="profile-data-title">Web Developer/Designer</div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        <li class="xn-title">Navigation</li>
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{route('dashboard')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        @can('view permission')
            <li class="xn-openable {{ request()->is('permission*') ? 'active' : '' }}">
                <a href="#"><span class="fa fa-lock"></span> <span class="xn-text">Permission</span></a>
                <ul>
                    <li class="{{ request()->routeIs('permission.index') ? 'active' : '' }}"><a href="{{route('permission.index')}}"><span class="fa fa-image"></span> Permission List</a></li>
                    <li class="{{ request()->routeIs('permission.create') ? 'active' : '' }}"><a href="{{route('permission.create')}}"><span class="fa fa-user"></span> Permission Create</a></li>
                </ul>
            </li>
        @endcan
        @can('view role')
            <li class="xn-openable {{ request()->is('role*') ? 'active' : '' }}">
                <a href="#"><span class="fa fa-key"></span> <span class="xn-text">Role</span></a>
                <ul>
                    <li class="{{ request()->routeIs('role.index') ? 'active' : '' }}"><a href="{{route('role.index')}}"><span class="fa fa-image"></span> Role List</a></li>
                    <li class="{{ request()->routeIs('role.create') ? 'active' : '' }}"><a href="{{route('role.create')}}"><span class="fa fa-user"></span> Role Create</a></li>
                </ul>
            </li>
        @endcan
        @can('view user')
            <li class="xn-openable {{ request()->is('user*') ? 'active' : '' }}">
                <a href="#"><span class="fa fa-user"></span> <span class="xn-text">User</span></a>
                <ul>
                    <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}"><a href="{{route('user.index')}}"><span class="fa fa-image"></span> User List</a></li>
                    <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}"><a href="{{route('user.create')}}"><span class="fa fa-user"></span> User Create</a></li>
                </ul>
            </li>
        @endcan
        @can('view school')
            <li class="xn-openable {{ request()->is('schools*') ? 'active' : '' }}">
                <a href="#">
                    <span class="fa fa-graduation-cap"></span> <span class="xn-text">School</span>
                </a>
                <ul>
                    <li class="{{ request()->routeIs('schools.index') ? 'active' : '' }}"><a href="{{route('schools.index')}}"><span class="fa fa-image"></span> School List</a></li>
                    <li class="{{ request()->routeIs('schools.create') ? 'active' : '' }}"><a href="{{route('schools.create')}}"><span class="fa fa-user"></span> School Create</a></li>
                </ul>
            </li>
        @endcan

        @can('view teacher')
            <li class="xn-openable {{ request()->is('teachers*') ? 'active' : '' }}">
                <a href="#">
                    <span class="fa fa-user"></span> <span class="xn-text">Teacher</span>
                </a>
                <ul>
                    <li class="{{ request()->routeIs('teachers.index') ? 'active' : '' }}"><a href="{{route('teachers.index')}}"><span class="fa fa-image"></span> Teacher List</a></li>
                    <li class="{{ request()->routeIs('teachers.create') ? 'active' : '' }}"><a href="{{route('teachers.create')}}"><span class="fa fa-user"></span> Teacher Create</a></li>
                </ul>
            </li>
        @endcan

        @can('view class')
            <li class="xn-openable {{ request()->is('classes*') ? 'active' : '' }}">
                <a href="#">
                    <span class="fa fa-graduation-cap"></span> <span class="xn-text">Class</span>
                </a>
                <ul>
                    <li class="{{ request()->routeIs('classes.index') ? 'active' : '' }}"><a href="{{route('classes.index')}}"><span class="fa fa-image"></span> Class List</a></li>
                    <li class="{{ request()->routeIs('classes.create') ? 'active' : '' }}"><a href="{{route('classes.create')}}"><span class="fa fa-user"></span> Class Create</a></li>
                </ul>
            </li>
        @endcan

        @can('view subject')
            <li class="xn-openable {{ request()->is('subjects*') ? 'active' : '' }}">
                <a href="#">
                    <span class="fa fa-book"></span> <span class="xn-text">Subject</span>
                </a>
                <ul>
                    <li class="{{ request()->routeIs('subjects.index') ? 'active' : '' }}"><a href="{{route('subjects.index')}}"><span class="fa fa-image"></span> Subject List</a></li>
                    <li class="{{ request()->routeIs('subjects.create') ? 'active' : '' }}"><a href="{{route('subjects.create')}}"><span class="fa fa-user"></span> Subject Create</a></li>
                </ul>
            </li>
        @endcan

        @can('view class-subject')
            <li class="xn-openable {{ request()->is('class-subjects*') ? 'active' : '' }}">
                <a href="#">
                    <span class="fa fa-book"></span> <span class="xn-text">Class Subject</span>
                </a>
                <ul>
                    <li class="{{ request()->routeIs('class-subjects.index') ? 'active' : '' }}"><a href="{{route('class-subjects.index')}}"><span class="fa fa-image"></span> Class Subject List</a></li>
                    <li class="{{ request()->routeIs('class-subjects.create') ? 'active' : '' }}"><a href="{{route('class-subjects.create')}}"><span class="fa fa-user"></span> Class Subject Create</a></li>
                </ul>
            </li>
        @endcan

        @can('view class-teacher')
            <li class="xn-openable {{ request()->is('class-teachers*') ? 'active' : '' }}">
                <a href="#">
                    <span class="fa fa-book"></span> <span class="xn-text">Assign Class Teacher</span>
                </a>
                <ul>
                    <li class="{{ request()->routeIs('class-teachers.index') ? 'active' : '' }}"><a href="{{route('class-teachers.index')}}"><span class="fa fa-image"></span>Assign Class  List</a></li>
                    <li class="{{ request()->routeIs('class-teachers.create') ? 'active' : '' }}"><a href="{{route('class-teachers.create')}}"><span class="fa fa-user"></span>Assign Class  Create</a></li>
                </ul>
            </li>
        @endcan

        @can('view myClassAndSubject')
            <li class="xn-openable {{ request()->is('my-classes*') ? 'active' : '' }}">
                <a href="#">
                    <span class="fa fa-book"></span> <span class="xn-text">My Class & Subject</span>
                </a>
                <ul>
                    <li class="{{ request()->routeIs('my-classes.index') ? 'active' : '' }}"><a href="{{route('my-classes.index')}}"><span class="fa fa-image"></span> My Class & Subject List</a></li>
                    {{-- <li class="{{ request()->routeIs('my-classes.create') ? 'active' : '' }}"><a href="{{route('my-classes.create')}}"><span class="fa fa-user"></span> My Class Create</a></li> --}}
                </ul>
            </li>
        @endcan

        @can('view student')
            <li class="xn-openable {{ request()->is('students*') ? 'active' : '' }}">
                <a href="#">
                    <span class="fa fa-users"></span> <span class="xn-text">Student</span>
                </a>
                <ul>
                    <li class="{{ request()->routeIs('students.index') ? 'active' : '' }}"><a href="{{route('students.index')}}"><span class="fa fa-image"></span> Student List</a></li>
                    <li class="{{ request()->routeIs('students.create') ? 'active' : '' }}"><a href="{{route('students.create')}}"><span class="fa fa-user"></span> Student Create</a></li>
                </ul>
            </li>
        @endcan

        @can('view parent')
            <li class="xn-openable {{ request()->is('parents*') ? 'active' : '' }}">
                <a href="#">
                    <span class="fa fa-users"></span> <span class="xn-text">Parent</span>
                </a>
                <ul>
                    <li class="{{ request()->routeIs('parents.index') ? 'active' : '' }}"><a href="{{route('parents.index')}}"><span class="fa fa-image"></span> Parent List</a></li>
                    <li class="{{ request()->routeIs('parents.create') ? 'active' : '' }}"><a href="{{route('parents.create')}}"><span class="fa fa-user"></span> Parent Create</a></li>
                </ul>
            </li>
        @endcan
    </ul>
    <!-- END X-NAVIGATION -->
    <div class="sidebar-logo text-center py-3">
        <img src="{{ asset('backend/img/school-logo.png') }}"
             alt="School Logo"
             style="max-width: 50px; height:50; margin-top:10px">
    </div>
</div>


