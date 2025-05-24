import './bootstrap';

// Game-specific JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Password strength meter for Password Challenge
    const passwordInput = document.querySelector('input[type="password"]');
    const strengthMeter = document.querySelector('.bg-blue-600');
    
    if (passwordInput && strengthMeter) {
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            // Length check
            if (password.length >= 12) {
                strength += 25;
            } else if (password.length >= 8) {
                strength += 10;
            }
            
            // Uppercase check
            if (/[A-Z]/.test(password)) {
                strength += 15;
            }
            
            // Lowercase check
            if (/[a-z]/.test(password)) {
                strength += 15;
            }
            
            // Number check
            if (/[0-9]/.test(password)) {
                strength += 20;
            }
            
            // Special character check
            if (/[^A-Za-z0-9]/.test(password)) {
                strength += 25;
            }
            
            // Update the strength meter
            strengthMeter.style.width = strength + '%';
            
            // Update color based on strength
            if (strength < 30) {
                strengthMeter.classList.remove('bg-blue-600', 'bg-yellow-500', 'bg-green-500');
                strengthMeter.classList.add('bg-red-500');
            } else if (strength < 60) {
                strengthMeter.classList.remove('bg-blue-600', 'bg-red-500', 'bg-green-500');
                strengthMeter.classList.add('bg-yellow-500');
            } else {
                strengthMeter.classList.remove('bg-blue-600', 'bg-yellow-500', 'bg-red-500');
                strengthMeter.classList.add('bg-green-500');
            }
        });
    }
    
    // Auto-hide flash messages after 5 seconds
    const flashMessages = document.querySelectorAll('.bg-success-600\\/20, .bg-danger-600\\/20');
    if (flashMessages.length > 0) {
        setTimeout(() => {
            flashMessages.forEach(message => {
                message.style.opacity = '0';
                message.style.transition = 'opacity 1s ease-out';
                setTimeout(() => {
                    message.style.display = 'none';
                }, 1000);
            });
        }, 5000);
    }
    
    // Add animation to the Cyber Shield when level increases
    const cyberShield = document.querySelector('.cyber-shield');
    if (cyberShield && sessionStorage.getItem('shield_increased')) {
        cyberShield.classList.add('animate-pulse');
        setTimeout(() => {
            cyberShield.classList.remove('animate-pulse');
            sessionStorage.removeItem('shield_increased');
        }, 3000);
    }
});
