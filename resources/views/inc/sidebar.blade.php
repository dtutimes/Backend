<div class="nav-container nav-container--sidebar">
    <div class="nav-sidebar-column bg--dark">
        <div class="text-center text-block">
            <a href="{{ route('login') }}">
                <img alt="avatar" src="{{ asset('logo-light.png') }}" class="image--md" />
            </a>
            <div class="text-center space--xs mt-1">
                <div>
                    <span class="type--fine-print type--fade">
                        DTU Times
                        <span class="update-year"></span>
                    </span>
                </div>
                <ul class="social-list list-inline list--hover ml-auto mt-3 mb-1 mr-auto">
                    <li>
                        <a class="text-white" href="mailto:dtutimes@dtu.ac.in">
                            <i class="socicon socicon-mail icon icon--xs"></i>
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="https://twitter.com/dtutimes">
                            <i class="socicon socicon-twitter icon icon--xs"></i>
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="https://www.facebook.com/dtutimes/">
                            <i class="socicon socicon-facebook icon icon--xs"></i>
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="https://www.instagram.com/dtu_times/?hl=en">
                            <i class="socicon socicon-instagram icon icon--xs"></i>
                        </a>
                    </li>
                </ul>
                <div class="text-center">
                    <span class="type--fade">
                        <small>
                            Got any issues? Contact the
                            <a href="{{ route('dev.index') }}" style="color: #F6F7F8;"> Developers.</a>
                        </small>
                    </span>
                </div>
            </div>
        </div>

        <div class="text-block">
            <h4 class="mb-0">
                <!-- <a href="{{ route('me.show') }}">{{ auth()->user()->name }}</a> -->
                <span data-tooltip="View or Edit your details."><a class="text-white" href="{{ route('me.show') }}">{{ auth()->user()->name }}</a></span>
            </h4>
            <small>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="color: #F6F7F8;">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </small>
        </div>
        <div class="text-block">
            <ul class="menu-vertical">
                <li>
                    <a class="text-white" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>


                <!--
                |
                |
                | Society Head Section
                |
                |
                 -->
                @if (auth()->user()->hasRole('society_head'))
                    @if(auth()->user()->society()->get()->count() != 0)
                        @php
                            $society = auth()->user()->society()->first();
                        @endphp
                        <li>
                            <a href="{{ route('society.head.show', $society->slug) }}">
                                About {{ str_limit($society->name, $limit = 17, $end = '...') }}
                            </a>
                        </li>

                        <li class="dropdown">
                            <span class="dropdown__trigger">
                                    Image
                                </span>
                            <div class="dropdown__container">
                                <div class="dropdown__content">
                                    <ul class="menu-vertical">
                                        <li>
                                            <a href="{{ route('society.head.image.index', $society->slug) }}">
                                                All Images
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('society.head.image.create', $society->slug) }}">
                                                Upload New
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li class="dropdown">
                            <span class="dropdown__trigger">
                                    News
                                </span>
                            <div class="dropdown__container">
                                <div class="dropdown__content">
                                    <ul class="menu-vertical">
                                        <li>
                                            <a href="{{ route('society.head.news.index', $society->slug) }}">
                                                All News
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('society.head.news.create', $society->slug) }}">
                                                Create New
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('society.head.create')}}">
                                Create Your Society
                            </a>
                        </li>
                    @endif
                @endif

                <!--
                |
                |
                | Columnist Section
                |
                |
                 -->
                {{-- Stories option --}}
                @if (!auth()->user()->hasRole('photographer') && !auth()->user()->hasRole('society_head'))
                <li class="dropdown">
                    <span class="dropdown__trigger">
                            Story
                        </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('stories.create') }}" class="text-white">
                                            New Story
                                        </a>
                                </li>
                                <li>
                                    <a href="{{ route('stories.index')}}" class="text-white">
                                            Your Stories
                                        </a>
                                </li>

                                {{-- Publish Story --}} @if (auth()->user()->can('publish-story'))
                                <li>
                                    <a href="{{ route('council.stories.index')}}" class="text-white">
                                            Pending Stories
                                        </a>
                                </li>
                                <li>
                                    <a href="{{ route('council.stories.published')}}" class="text-white">
                                            Published Stories
                                        </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <span class="dropdown__trigger">
                            Category
                        </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('categories.index') }}" class="text-white">
                                            All Categories
                                        </a>
                                </li>
                                @if (auth()->user()->can('create-category'))
                                <li>
                                    <a href="{{ route('categories.create') }}" class="text-white">
                                            New Category
                                        </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <span class="dropdown__trigger">
                            Leaderboard
                        </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('stories.leaderboard') }}" class="text-white">
                                        Columnists
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>



                <!--
                |
                |
                | Photographers Section
                |
                |
                 -->
                @endif @if (!auth()->user()->hasRole('columnist') && !auth()->user()->hasRole('society_head'))
                <li class="dropdown">
                    <span class="dropdown__trigger">
                            Album
                        </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('albums.index')}}" class="text-white">
                                            All Albums
                                        </a>
                                </li>

                                @if (auth()->user()->can('create-album'))
                                <li>
                                    <a href="{{ route('albums.create') }}" class="text-white">
                                            New Album
                                        </a>
                                </li>
                                @endif

                                <li>
                                    <a href="{{ route('images.me')}}" class="text-white">
                                        All Images
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <!--
                |
                |
                | Superuser Section
                |
                |
                 -->
                @endif @if (auth()->user()->hasRole('superuser'))
                <li class="dropdown">
                    <span class="dropdown__trigger">
                        Member
                    </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('users.index') }}" class="text-white">
                                        All Members
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('users.create') }}" class="text-white">
                                        New Member
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('users.import-multipleUsers') }}" class="text-white">
                                        Create New Multiple Members
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('users.blocked') }}" class="text-white">
                                        Blocked Members
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('users.unactive') }}" class="text-white">
                                        INactive Members
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <span class="dropdown__trigger">
                        Edition
                    </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('edition.index') }}" class="text-white">
                                        All Edition
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('edition.create') }}" class="text-white">
                                        Create New Edition
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <span class="dropdown__trigger">
                        Facebook Post 
                    </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('facebook.index') }}" class="text-white">
                                        All Post
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('facebook.info') }}" class="text-white">
                                        Info
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <span class="dropdown__trigger">
                        Instagram Post 
                    </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('instagram.index') }}" class="text-white">
                                        All Post
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('instagram.info') }}" class="text-white">
                                        Info
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <span class="dropdown__trigger">
                        Role
                    </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('roles.index') }}" class="text-white">
                                        All Roles
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('roles.create') }}" class="text-white">
                                        New Role
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>


                <li class="dropdown">
                    <span class="dropdown__trigger">
                        Permission
                    </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('permissions.index') }}" class="text-white">
                                        All Permissions
                                    </a>
                                <!-- </li>
                                <li>
                                    <a href="{{ route('roles.create') }}">
                                        New Role
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </li>



                <!--
                |
                |
                | Council Section
                |
                |
                 -->
                @endif @if (auth()->user()->hasRole(['council', 'superuser']))
                <li class="dropdown">
                    <span>
                        Society
                    </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('council.societies.index')}}" class="text-white">
                                        All Societies
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('council.societies.pending') }}" class="text-white">
                                        Pending
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <span>
                        News
                    </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('council.societies.news.index')}}" class="text-white">
                                        All News
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('council.societies.news.pending')}}" class="text-white">
                                        Pending News
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('council.societies.news.published')}}" class="text-white">
                                        Published News
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <span>
                        Analytics
                    </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('ga.index') }}" class="text-white">
                                        Dashboard
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="dropdown">
                    <span>
                        Insights
                    </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('superuser.dashboard') }}" class="text-white">
                                        Stats
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('stats.stories')}}" class="text-white">
                                        Story
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('stats.albums') }}" class="text-white">
                                        Album
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <span>
                            Campaigns
                        </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('campaigns.index')}}" class="text-white">
                                            All Campaign
                                        </a>
                                </li>
                                <li>
                                    <a href="{{ route('campaigns.create') }}" class="text-white">
                                            New Campaign
                                        </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <span>
                        Notifications
                    </span>
                    <div class="dropdown__container">
                        <div class="dropdown__content">
                            <ul class="menu-vertical">
                                <li>
                                    <a href="{{ route('notifications.index')}}">All Notifications</a>
                                </li>
                                <li>
                                    <a href="{{ route('notifications.create') }}">
                                        New Notification
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a class="text-white" href="{{ route('subscribers.index')}}">Subscribers</a>
                </li>
                @endif

            </ul>
        </div>
    </div>
    <div class="nav-sidebar-column-toggle visible-xs visible-sm" data-toggle-class=".nav-sidebar-column;active">
        <i class="stack-menu"></i>
    </div>
</div>
