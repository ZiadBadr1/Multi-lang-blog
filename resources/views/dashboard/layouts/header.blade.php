<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        <a class="navbar-brand=" href="#">
            <img src="{{asset('storage/'.$setting->logo)}}" style="width: 50px;margin-right: 20px">
        </a>

        <ul class="nav navbar-nav pull-left hidden-md-down">
            <li class="nav-item dropdown" style="margin-left: 10px  !important">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="hidden-md-down">{{ __('setting') }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-xs-center">
                        <strong>{{ __('setting') }}</strong>
                    </div>
                    <a class="dropdown-item" href="{{route('admin.setting')}}"><i
                                class="fa fa-user"></i> {{ __('setting') }}</a>
                    <div class="divider"></div>




                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <span class="dropdown-icon oi oi-account-logout"></span> {{__('logout')}}
                        </button>
                    </form>
                </div>

            </li>
            <li class="nav-item dropdown" style="margin-left: 10px  !important">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="hidden-md-down">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item dropdown" style="margin-left: 10px  !important">
               <strong> {{ auth()->user()->name }}</strong>
            </li>

        </ul>
    </div>
</header>
