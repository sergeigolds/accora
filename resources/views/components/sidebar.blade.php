<div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
    <aside>
        <div class="sidebar-box">
            <div class="user">
                <figure>
                    <a href="#"><img src="assets/img/author/img1.jpg" alt=""/></a>
                </figure>
                <div class="usercontent">
                    <h3>Hello</h3>
                    <h3>{{ auth()->user()->name }}</h3>
                </div>
            </div>
            <nav class="navdashboard">
                <ul>
                    <li>
                        <a class="{{ (request()->is('account')) ? 'active' : '' }}" href="{{ route('account') }}">
                            <i class="lni-layers"></i>
                            <span>My Ads</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ (request()->is('account/post-ad')) ? 'active' : '' }}" href="{{ route('post-ad') }}">
                            <i class="lni-pencil-alt"></i>
                            <span>Post an Ad</span>
                        </a>
                    </li>
                    <li>

                        <a class="{{ (request()->is('account/profile-settings')) ? 'active' : '' }}" href="{{ route('profile-settings') }}">
                            <i class="lni-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <form action="{{ route('logout') }}" method="post" id="logout">
                        @csrf
                        <li>
                            <a onclick="$('#logout').submit()" style="cursor:pointer;">
                                <i class="lni-enter"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </form>
                </ul>
            </nav>
        </div>
    </aside>
</div>
