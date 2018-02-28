@if(Auth::check())
    <li class="green lighten-2">
        <a href="{{url('/billing')}}" class="white-text">
            Balance:  {{Account::balance()}} Messages
        </a>
    </li>
    <li>
        <a href="{{url('/account')}}" class="@if(Request::is('account')) active @endif">
            Account
        </a>
    </li>
    <li>
        <a href="{{asset('/profile')}}" class="@if(Request::is('profile')) active @endif">
            Edit profile
        </a>
    </li>
    <li>
        <a href="{{url('/billing')}}" class="@if(Request::is('billing')) active @endif">
            Billing & Payments
        </a>
    </li>
    {{--<li>
        <a href="{{url('/pricing')}}" class="@if(Request::is('pricing')) active @endif">
            Pricing
        </a>
    </li>--}}
    <li>
        <a href="{{url('/settings')}}" class="@if(Request::is('settings')) active @endif">
            Settings
        </a>
    </li>

@endif