function checkIdInput(event)
{
	event.preventDefault()

	if (patientIdInput.value.length < 16) return // Don't do anything until the fixed length of patient id is reached

	setTop(`/payment/${patientIdInput.value}`) // Change the url
}


window.onload = () =>
{
	patientIdInput = document.querySelector("#patient-id")
	if (!patientIdInput) console.error("none")

	patientIdInput.oninput = () => checkIdInput(event)
}
