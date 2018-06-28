<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="sv-SE">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>{{ config('app.name', 'Exposition Application') }}</title>
    <meta name="viewport" content="width=device-width"/>

</head>
<body>
<table class="body">
    <tr>
        <td class="center" align="center" valign="top">

            @yield('content')

        </td>
    </tr>
</table>
</body>
</html>