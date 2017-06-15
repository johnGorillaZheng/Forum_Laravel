<!DOCTYPE html>
<html>
<head>
	<title>Confirmation Email</title>
</head>
<body>
	<h1>Hi, {{$name}}</h1>
	<h2>You need to sign up</h2>
	<p>
		You need to confirm your email address.
		<a href="{{route('confirmation',$confirmation_token)}}">click me to verify your email</a>
	</p>
</body>
</html>