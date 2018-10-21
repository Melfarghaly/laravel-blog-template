<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $request->subject }}</title>
</head>
<body>

	<h1>Contact Form</h1>

	<p> Email From {{ $request->name }} ({{ $request->email }})</p>

	<p><strong>Subject:</strong> {{ $request->subject }}</p>

	<p>Message:</p>

	<p>{{ $request->message }}</p>
	
</body>
</html>