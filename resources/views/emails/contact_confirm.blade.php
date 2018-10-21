<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $request->subject }}</title>
</head>
<body>

	<h1>Message Recieved</h1>

	<p>Your message has been recieved. We will get back to you shortly</p>

	<div class="panel" style="border: 1px solid gray;">
		<p> Email From {{ $request->name }} ({{ $request->email }})</p>
		<p><strong>Subject:</strong> {{ $request->subject }}</p>
		<p>Message:</p>
		<p>{{ $request->message }}</p>
	</div>
	
</body>
</html>