<!DOCTYPE html>
<html>

<head>
    <title>Noncompliant participants</title>
</head>

<body>
    <h1>{{ $details['date'] }}</h1>
    <p>User ID</p>
    @foreach ($details['data'] as $user)
    <p>{{ $user->account }}</p>
    @endforeach

    <p>Thank you</p>
</body>

</html>