<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<title>payment testing</title>

		<script src="{{ asset("./js/navigator.js") }}"></script>
	</head>
	<body>
		<form>
			<input type="text" name="patient_id" placeholder="patient id" id="input_patient_id"
				@isset($patientId) value="{{ $patientId }}" @endisset
			>
		</form>

		@isset($bill) <p>{{ $bill }}</p> @endisset

		@isset($patientId) <input type="number" placeholder="{{ $bill }}" min="0" max="{{ $bill }}" step="1"> @endisset

		<script>
			window.onload = () =>
			{
				patientIdInput = document.querySelector("#input_patient_id")
				if (!patientIdInput) return

				patientIdInput.oninput = (event) =>
				{
					event.preventDefault()

					if (patientIdInput.value.length < 16) return // Don't do anything until the fixed length of patient id is reached

					setTop(`/test/payment/${patientIdInput.value}`) // Change the url
				}
			}
		</script>
	</body>
</html>
