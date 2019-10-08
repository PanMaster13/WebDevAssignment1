// Global variable
var errorMsg = "";

// Sets error message in footer if any
function init()
{
	var errorBox = document.getElementById("error_msg");
	errorBox.innerHTML = sessionStorage.getItem("errorMsg");
}

// Validate Registration & Payment
function validate_regPay()
{
	var regPay_valid = false;
	var regPay_array = document.getElementsByName("regPay");
	
	for (i = 0; i < regPay_array.length; i++)
	{
		if (regPay_array[i].checked == true)
		{
			regPay_valid = true;
		}
	}
	if (regPay_valid == false)
	{
		errorMsg = errorMsg + "Please select a rating for Registration & Payment section.<br/>";
	}
	
	return regPay_valid;
}

// Validate Event Timing
function validate_eventTime()
{
	var eventTime_valid = false;
	var eventTime_array = document.getElementsByName("eventTime");
	
	for (i = 0; i < eventTime_array.length; i++)
	{
		if (eventTime_array[i].checked == true)
		{
			eventTime_valid = true;
		}
	}
	if (eventTime_valid == false)
	{
		errorMsg = errorMsg + "Please select a rating for Event Timing section.<br/>";
	}
	
	return eventTime_valid;
}

// Validate Race Route Selection
function validate_route()
{
	var route_valid = false;
	var route_array = document.getElementsByName("route");
	
	for (i = 0; i < route_array.length; i++)
	{
		if (route_array[i].checked == true)
		{
			route_valid = true;
		}
	}
	if (route_valid == false)
	{
		errorMsg = errorMsg + "Please select a rating for Race Route Selection section.<br/>";
	}
	
	return route_valid;
}

// Validate Logistic
function validate_logic()
{
	var logic_valid = false;
	var logic_array = document.getElementsByName("logic");
	
	for (i = 0; i < logic_array.length; i++)
	{
		if (logic_array[i].checked == true)
		{
			logic_valid = true;
		}
	}
	if (logic_valid == false)
	{
		errorMsg = errorMsg + "Please select a rating for Logistic section.<br/>";
	}
	
	return logic_valid;
}

// Validate Security
function validate_security()
{
	var security_valid = false;
	var security_array = document.getElementsByName("security");
	
	for (i = 0; i < security_array.length; i++)
	{
		if (security_array[i].checked == true)
		{
			security_valid = true;
		}
	}
	if (security_valid == false)
	{
		errorMsg = errorMsg + "Please select a rating for Security section.<br/>";
	}
	
	return security_valid;
}

// Validate the form
function validateForm()
{
	var regPay_valid = validate_regPay();
	var eventTime_valid = validate_eventTime();
	var route_valid = validate_route();
	var logic_valid = validate_logic();
	var security_valid = validate_security();
	
	var theForm = document.getElementById("Form");
	
	// Session storage for error message
	sessionStorage.setItem("errorMsg", errorMsg);
	
	if ((regPay_valid && eventTime_valid && route_valid && logic_valid && security_valid) == true)
	{
		theForm.action = "rating_summary.php";
	}
	else
	{
		theForm.action = "rating_input.php";
	}
}

// Calls init() function when browser loads
window.onload=init();