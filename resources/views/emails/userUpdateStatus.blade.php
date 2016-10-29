<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User status change...!!! </title>
</head>
<body>
	<h1>{{($user->status == 0) ? 'YOU ARE SUSPENDED...!!!' : 'YOU ARE ACTIVE...!!!'}}</h1>
	<br>
	<h2>Your User: {{$user->name}} {{($user->status == 0) ? 'Was suspended.' : 'Was reactivated... Yeahhh!!!'}}</h2>
	@if($user->status == 0)
		<p>All your topics and answers remain active for 15 days while your situation is solved.</p>
	@else
		<p>All your topics and answers will be active in the next 24 hours.</p>
	@endif
</body>
</html>