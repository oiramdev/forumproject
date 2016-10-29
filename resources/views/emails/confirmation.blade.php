<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirmation Email</title>
</head>
<body>
	<h1>Thank for Sign Up!</h1>
	<p>
		You need to <a href="{{ url('register/confirm/'.$user->token) }}"> confirm your email address</a>
	</p>
</body>
</html>