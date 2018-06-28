@extends('emails.layouts.default')

@section('content')
        <!-- BEGIN: Content -->
<table class="container content" align="center">
    <tr>
        <td>
            <table class="row note">
                <tr>
                    <td class="wrapper last">
                        <h4>Report</h4>
                        <table class="twelve columns">
                            <tr>
                                <th>Event Name</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Reserved Stand Link</th>
                            </tr>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{$row['event']}}</td>
                                    <td>{{$row['user_name']}}</td>
                                    <td>{{$row['user_email']}}</td>
                                    <td>{{$row['reserved_stand']}}</td>
                                </tr>
                                @endforeach

                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@stop
