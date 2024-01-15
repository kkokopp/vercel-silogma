// resources/js/togglePassword.js

document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const toggleButton = document.querySelector('.toggle-password');
    const eyeIcon = toggleButton.querySelector('.eye-icon');
    const eyeSlashIcon = toggleButton.querySelector('.eye-slash-icon');

    if (passwordInput && toggleButton && eyeIcon && eyeSlashIcon) {
        toggleButton.addEventListener('click', function () {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;

            // Toggle visibility icons
            eyeIcon.classList.toggle('hidden', type === 'text');
            eyeSlashIcon.classList.toggle('hidden', type === 'password');
        });
    }
});

