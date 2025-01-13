function validateForm() {
    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const dob = new Date(document.getElementById('dob').value);
    const phone = document.getElementById('phone').value.trim();
    const address = document.getElementById('address').value.trim();
    const email = document.getElementById('email').value.trim();
    
    const today = new Date();
    const age = today.getFullYear() - dob.getFullYear();
    const month = today.getMonth() - dob.getMonth();
    const day = today.getDate() - dob.getDate();

  
    if (age < 18 || (age === 18 && (month < 0 || (month === 0 && day < 0)))) {
        document.getElementById('under18-warning').style.display = 'block';
        return false;
    } else {
        document.getElementById('under18-warning').style.display = 'none';
    }


    if (!firstName || !lastName || !dob || !phone || !address || !email) {
        alert("Please fill in all fields.");
        return false;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }


    const phonePattern = /^[0-9]{10,15}$/;
    if (!phonePattern.test(phone)) {
        alert("Please enter a valid phone number (10-15 digits).");
        return false;
    }


    const formData = new FormData();
    formData.append('firstName', firstName);
    formData.append('lastName', lastName);
    formData.append('dob', dob.toISOString().split('T')[0]);
    formData.append('phone', phone);
    formData.append('address', address);
    formData.append('email', email);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "register.php", true);


    xhr.onload = function () {
        if (xhr.status === 200) {
            alert("Registration Successful!");
            document.getElementById('registrationForm').reset();
        } else {
            alert("Error: " + xhr.responseText);
        }
    };

    xhr.send(formData);

    return false;
}
