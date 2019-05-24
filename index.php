<!DOCTYPE html>
<html>
<head>
	<title>Auto Complete Text</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>
<body>
	<div class="container">
		<br/>
		<br/>
		<h1>Autocomplete TextBox</h1>
		<br/>
		<input type="text" name="country" id="country" class="form-control" autocomplete="off" placeholder="Country Name">
	</div>

	<script>
		$(document).ready(function(){

			$('#country').typeahead({
				source: function(query, result) {
					$.ajax({
						url: 'search.php',
						method: 'POST',
						data: {
							query: query
						},
						dataType: 'json',
						success: function(data) {
							result($.map(data, function(item){
								return item;
							}));
						}
					});
				}
			});

		});
	</script>
</body>
</html>