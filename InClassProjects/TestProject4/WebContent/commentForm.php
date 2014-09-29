<!DOCTYPE html>
<html>
<head>
<title>URL NOSH Comment Form</title>
<meta name="keywords" content="URL NOSH, Members, URL evaluation">
<meta name="description" content="Evaluation form for URLs">
</head>
<body>
	<h1>NOSH URL Survey</h1>
	<p>Give us your candidate comments about a URL worth consideration.</p>

	<section>
		<form action="postComment.php" method="Post">
			<fieldset>
				<legend>Evaluator information</legend>
				Nosh name: <input name="firstName" placeholder="Your nickname"
					autofocus required><br> Nosh member type:<br> <input type="radio"
					name="memberClass" value="reader" required>Reader<br> <input
					type="radio" name="memberClass" value="nosher">Nosher<br> <input
					type="radio" name="memberClass" value="moderator">Moderator<br>

			</fieldset>

			URL for Evaluation:<input type="url" name="evaluationUrl">

			<p>
				Give us your critique:<br>
				<textarea name="comment" placeholder="Your comments go here"
					rows="20" cols="60">
</textarea>
			</p>

			<input type="submit" name="submit" value="Submit">
		</form>
	</section>
</body>
</html>