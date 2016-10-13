function validateGreen(input) {
	input.style.border = "thin solid #6DC912";
	input.style.borderRadius = "3px";
	return;
};

function validateRed(input) {
	input.style.border = "thin solid #C91212";
	input.style.borderRadius = "3px";
	return;
};

var regex_email = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$/
var regex_password = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;

function validate(input) {
	console.log(input);
	if (input.id == "email_id") {  //aplica solo a email
		if (regex_email.test(input.value)) {
			validateGreen(input);
		}
		else {
			validateRed(input);
		}
	}

	if (input.id == "pass_1") {
		if (!regex_password.test(input.value)) {
			validateRed(input);
		}
	}

	if (input.id == "pass_2") {
		if (regex_password.test(input.value)) {
			validateGreen(input);
		}
		else {
			validateRed(input);
		}
	}

	if (input.id == "pass_2") {
		if ($("#pass_1").val() === $("#pass_2").val()) {
			validateGreen(input);
		}
		else {
			validateRed(input);
		}
	}
};