// Get the form and input elements
const form = document.getElementById('form');
const ID = document.getElementById('ID');
const Email = document.getElementById('Email');
const password = document.getElementById('password');
const ConfirmPassword = document.getElementById('ConfirmPassword');

// Add an event listener to the form on submit
form.addEventListener('submit', e => {
    e.preventDefault(); // Prevent the form from submitting
    validateInputs(); // Call the function to validate inputs
});

// Function to set error message and styling
const setError = (element, message) => {
    const inputControl = element.parentElement; // Get the parent element of the input
    const errorDisplay = inputControl.querySelector('.error'); // Find the error display element
    errorDisplay.innerText = message; // Set the error message
    inputControl.classList.add('error'); // Add error class for styling
    inputControl.classList.remove('success'); // Remove success class
};

// Function to set success styling
const setSuccess = element => {
    const inputControl = element.parentElement; // Get the parent element of the input
    const errorDisplay = inputControl.querySelector('.error'); // Find the error display element
    errorDisplay.innerText = ''; // Clear any error message
    inputControl.classList.add('success'); // Add success class for styling
    inputControl.classList.remove('error'); // Remove error class
};

// Function to validate email format
const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase()); // Test the email format
};

// Function to validate input fields
const validateInputs = () => {
    const IDValue = ID.value.trim();
    const EmailValue = Email.value.trim();
    const passwordValue = password.value.trim();
    const ConfirmPasswordValue = ConfirmPassword.value.trim();

    // Validate ID
    if (IDValue === '') {
        setError(ID, 'ID is required');
    } else {
        setSuccess(ID);
    }

    // Validate Email
    if (EmailValue === '') {
        setError(Email, 'Email is required');
    } else if (!isValidEmail(EmailValue)) {
        setError(Email, 'Provide a valid email address');
    } else {
        setSuccess(Email);
    }

    // Validate Password
    if (passwordValue === '') {
        setError(password, 'Password is required');
    } else if (passwordValue.length < 8) {
        setError(password, 'Password must be at least 8 characters.');
    } else {
        setSuccess(password);
    }

    // Validate Confirm Password
    if (ConfirmPasswordValue === '') {
        setError(ConfirmPassword, 'Please confirm your password');
    } else if (ConfirmPasswordValue !== passwordValue) {
        setError(ConfirmPassword, "Passwords don't match");
    } else {
        setSuccess(ConfirmPassword);
    }
};
