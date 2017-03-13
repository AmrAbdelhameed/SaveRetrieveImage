<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Show All</title>
</head>
<body>

@foreach($user as $users)

    <img src="{{$users->name}}" alt="" width="150" height="150">
    {{--<br/>--}}

@endforeach

</body>
</html>