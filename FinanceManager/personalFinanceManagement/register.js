// register.js
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registrationForm');
    const errorMessage = document.getElementById('errorMessage');

    form.addEventListener('submit', (e) => {
        errorMessage.textContent = '';

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();

        if (!name || !email || !password) {
            e.preventDefault();
            errorMessage.textContent = 'All fields are required.';
            return;
        }

        if (!validateEmail(email)) {
            e.preventDefault();
            errorMessage.textContent = 'Please enter a valid email address.';
            return;
        }

        if (password.length < 6) {
            e.preventDefault();
            errorMessage.textContent = 'Password must be at least 6 characters long.';
            return;
        }
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }
});
