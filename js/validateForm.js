function validateGreen(input) {
	input.style.border = "thin solid #6DC912";
	input.style.borderRadius = "3px";
};

function validateRed(input) {
	input.style.border = "thin solid #C91212";
	input.style.borderRadius = "3px";
};

var regex_email = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$/
var regex_password = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/
// var regex_telefono = ^((\(?\d{3}\)? \d{4})|(\(?\d{4}\)? \d{3})|(\(?\d{5}\)? \d{2}))-\d{4}$    no funciona. Conseguir mejor regex para arg.


function validate(input) {
	console.log(input.value);
	if (input.id == "email_id") {  //aplica solo a email
		if (regex_email.test(input.value)) {
			validateGreen(input);
		}
		else {
			validateRed(input);
		}
	}

	else if (input.id == "password_id") {  //aplica solo a password
		if (regex_password.test(input.value)) {
			validateGreen(input);
		}
		else {
			validateRed(input);
		}
	}
	
	else if (input.id == "username_id") {
		// check SQL y return FALSE si ya existe el username;
	}

	else {
		if (input.value != "") {
			validateGreen(input);
		}
		else {
			validateRed(input);
		}
	}
};