<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bulma.min.css">
    <title>All payments</title>
    <style>
        span {
            vertical-align: top;
        }
    </style>
</head>
<body>
<div>
    <table class="table is-fullwidth">
        <thead>
        <tr>
            <th>ID</th>
            <th>WebApp</th>
            <th>User</th>
            <th>Amount</th>
            <th>Title</th>
            <th>Description</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody>

        @foreach($records as $record)
            <tr>
                <td>{{$record->id}}</td>
                <td>{{$record->webapp->name}} ({{$record->webapp_id}})</td>
                <td>
                    <span title="{{$record->user_public_key}}"
                          style="max-width: 100px;text-overflow: ellipsis;overflow: hidden;display: inline-block">{{$record->user_public_key}}</span>
                    <span>({{$record->user_id}})</span>
                </td>
                <td>
                    {{number_format($record->amount_paid/100, 2, '.', '')}}
                </td>
                <td>
                    {{$record->order_title}}
                </td>
                <td>
                    <span title="{{$record->order_description}}"
                          style="text-overflow: ellipsis;overflow: hidden;display: block">{{$record->order_description}}</span>
                </td>
                <td>
                    {{$record->created_at}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>