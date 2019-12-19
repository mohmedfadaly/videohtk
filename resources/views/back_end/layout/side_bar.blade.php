<div class="logo">
        <a href="{{ route('frontend.landing') }}" class="simple-text logo-normal">
            videohatk
        </a>
</div>

<div class="sidebar-wrapper">
        <ul class="nav">
        <li class="nav-item {{ is_active('home') }}">
                <a class="nav-link" href="{{ route('home.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{ is_active('users') }}">
                <a  class="nav-link"  href="{{ route('users.index') }}">
                    <i class="material-icons">person</i>
                   <p>Users</p>
                </a>
            </li>

            <li class="nav-item {{ is_active('cats') }}">
                <a  class="nav-link"  href="{{ route('cats.index') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Categories</p>
                </a>
            </li>

            <li class="nav-item {{ is_active('skills') }}">
                <a  class="nav-link"  href="{{ route('skills.index') }}">
                    <i class="material-icons">offline_bolt</i>
                    <p>skills</p>
                </a>
            </li>
            <li class="nav-item {{ is_active('tags') }}">
                <a  class="nav-link"  href="{{ route('tags.index') }}">
                <i class="material-icons">turned_in_not</i>
                    <p>tags</p>
                </a>
            </li>
            <li class="nav-item {{ is_active('pages') }}">
                <a  class="nav-link"  href="{{ route('pages.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Pages</p>
                </a>
            </li>
            <li class="nav-item {{ is_active('videos') }}">
                <a  class="nav-link"  href="{{ route('videos.index') }}">
                    <i class="material-icons">video_call</i>
                    <p>Videos</p>
                </a>
            </li>
            <li class="nav-item {{ is_active('messages') }}">
                <a  class="nav-link"  href="{{ route('messages.index') }}">
                    <i class="material-icons">cloud</i>
                    <p>Messages</p>
                </a>
            </li>
          <!-- your sidebar here -->
        </ul>
</div>