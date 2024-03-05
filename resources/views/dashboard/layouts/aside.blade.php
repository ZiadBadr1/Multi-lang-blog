<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashboard')}}"><i
                            class="icon-speedometer"></i> {{ __('dashboard') }}
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                    {{ __('categories') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        @if(auth()->user()->type == "admin")
                            <a class="nav-link" href="{{ route('admin.category.create') }}"><i
                                        class="icon-user-follow"></i>{{ __('create_new_category') }}</a>
                        @endif
                        <a class="nav-link" href="{{ route('admin.category.index') }}"><i
                                    class="icon-people"></i>
                            {{ __('categories') }}</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                    {{ __('blogs') }}</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.blog.create') }}"><i
                                    class="icon-user-follow"></i>{{ __('create_new_blog') }}</a>
                        <a class="nav-link" href="{{ route('admin.blog.index') }}"><i
                                    class="icon-people"></i>
                            {{ __('blogs') }}</a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->type == "admin")

                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>
                        {{ __('users') }}</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.create') }}"><i
                                        class="icon-user-follow"></i>{{ __('create_new_user') }}</a>
                            <a class="nav-link" href="{{ route('admin.users.index') }}"><i
                                        class="icon-people"></i>
                                {{ __('users') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.setting') }}"><i class="icon-people"></i>
                        {{ trans('setting') }}</a>
                </li>
            @endif
        </ul>
    </nav>
</div>