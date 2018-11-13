<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Testing Ajax Request</title>
</head>
<body>

	<h1>Testing Ajax Request</h1>

	<button onclick="changeMsg()" type="button">Click here</button>
	<p id="message">Change this</p>


	<script type="text/javascript" src="{{ asset("") }}js/vendor/jquery-2.2.4.min.js"></script>
	<script type="text/javascript">
	     function changeMsg(){
	     	let formData = new FormData();
	     	formData.append("_token", "{{ csrf_token() }}");

	     	fetch('/ajax', {
	     		method: 'POST',
	     		body: formData
	     	}).then(function(response){
				if (response.ok) { 
					return response.text() 
				}
				throw new new Error("Network reponse is not okay")
			}).then(function (data) {
	     		// console.log(data)
				$("#message").html(data.msg);
	     	}).catch(error => console.log("Fetch didn't work"))
	     }
	</script>
	
</body>
</html>