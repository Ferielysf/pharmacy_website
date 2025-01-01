function validateForm() {
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const dob = new Date(document.getElementById('dob').value);
    const city = document.getElementById('city').value;
    const wilaya = document.getElementById('wilaya').value;
    const address = document.getElementById('address').value;
    const today = new Date();
    const age = today.getFullYear() - dob.getFullYear();
    const month = today.getMonth() - dob.getMonth();
    const day = today.getDate() - dob.getDate();
    const email=document.getElementById('email').value;

    
    if (age < 18 || (age === 18 && (month < 0 || (month === 0 && day < 0)))) {
    document.getElementById('under18-warning').style.display = 'block';
    } else {
    document.getElementById('under18-warning').style.display = 'none';
    }

    if (!firstName || !lastName || !dob || !city || !wilaya || !address) {
    alert("Please fill in all fields.");
    return false;
    }

    alert('Registration Successful!');
    return true;
}
