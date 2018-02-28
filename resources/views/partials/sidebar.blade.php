@if(Auth::check())
    <ul class="nav navbar-left">
        <li>
            <a href="{{url('/send')}}">
                Send SMS
            </a>
        </li>
        <li>
            <a href="{{url('/account')}}" class="@if(Request::is('account')) cyan @endif">
                Account
            </a>
        </li>
        <li>
            <a href="{{asset('/profile')}}" class="@if(Request::is('profile')) cyan @endif">
                Edit profile
            </a>
        </li>
        <li>
            <a href="{{url('/billing')}}" class="@if(Request::is('billing')) cyan @endif">
                Billing & payments
            </a>
        </li>
        <li>
            <a href="{{url('/pricing')}}" class="@if(Request::is('pricing')) cyan @endif">
                Pricing
            </a>
        </li>
        <li>
            <a href="{{url('/settings')}}" class="@if(Request::is('settings')) cyan @endif">
                Settings
            </a>
        </li>
    </ul>
@endif