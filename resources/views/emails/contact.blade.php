<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Signup</title>
</head>
<body>

	<h1>Contact Form</h1>

	{{ $request->name }}<br>
	{{ $request->email }}<br>
	{{ $request->subject }}<br>
	{{ $request->message }}<br>
	
</body>
</html>