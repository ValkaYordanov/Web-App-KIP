<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Hello {{ $user->name }}, </h1>
<p>Please click on the button if you forgot your password to change your password!</p>
<br>
<a href="{{ route('change', $user) }}"><button><strong>Change password</strong><button></a>



</body>

</html>
