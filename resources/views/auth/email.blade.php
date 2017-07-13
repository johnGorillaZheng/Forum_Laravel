<!DOCTYPE html>
<html>
<head>
	<title>Confirmation Email</title>
</head>
<body>
	<h1>Hi, {{$name}}</h1>
	<h2>请验证您的邮箱</h2>
	<p>
		<a href="{{route('confirmation',$confirmation_token)}}">点击这里，激活你的账号</a>
	</p>
</body>
</html>