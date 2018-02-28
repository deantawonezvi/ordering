<!DOCTYPE html>
<html>
<head>
    <title>@section('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/bs-enhance/bs-enhance.min.css') }}" rel="stylesheet">
</head>
<body>

    <table>

    <tbody>
        <tr>
            <td><p>Hello {{$user->name or ''}}</p> </td>
        </tr>

        <tr>
            <td>@yield('tr1')</td>
        </tr>

        <tr>
            <td>@yield('tr2') </td>
        </tr>

        <tr>
            <td>@yield('tr3') </td>
        </tr>
    <tr>
        <td>
            Regards,
        </td>
    </tr>
    <tr>
        <td>
            <p>{{config('app.name')}}</p><br>
        </td>
    </tr>
    <tr>
        <td>
            <p>
                <small class="blue-grey lighten-3">@yield('small-print')</small>
            </p>

        </td>
        <tr>
            <td>
                <div class="footer" style="background: #efefef; display: block; width: auto; padding: 20px">
                    <center><small>©{{date("Y")}} {{config('app.name')}}</small></center>
                </div>
            </td>
        </tr>
    </tr>
    </tbody>


</table>
</body>
</html>