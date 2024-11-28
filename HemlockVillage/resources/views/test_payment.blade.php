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
		@if(session("success"))
			<p>{{ session("success") }}</p>
		@endif

		<form>
			<input type="text" name="patient_id" placeholder="patient id" id="input_patient_id"
				@isset($patientId) value="{{ $patientId }}" @endisset
			>
		</form>

		@isset($bill) <p>Bill: ${{ $bill }}</p> @endisset

		@isset($patientId)
			<form action="/test/payment/{{ $patientId }}" method="post">
				@method("patch")
				@csrf

				<input type="number" name="amount" placeholder="{{ $bill }}" min="0" max="{{ $bill }}" step="1">

				<button type="submit">Pay</button>
			</form>
		@endisset


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
