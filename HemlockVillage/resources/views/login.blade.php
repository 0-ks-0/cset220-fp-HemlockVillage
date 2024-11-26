<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<title>Login</title>

		<link rel="stylesheet" href="{{ asset("./css/style.css>") }}">
	</head>

	<body>
		<div>
			@if ($errors->any())
				<div class="error">
					@foreach ($errors->all() as $error)
						<p>{{ $error }}</p>
					@endforeach
				</div>
			@endif

			<form action="/login" method="post">
				@csrf

				<div>
					<label for="email">Email</label>
					<input type="email" name="email" id="email" required maxlength="100">
				</div>

				<div>
					<label for="password">Password</label>
					<input type="password" name="password" id="password" required>
				</div>

				<button type="submit">Login</button>
			</form>
		</div>
	</body>
</html>