// Nexus Project - Main JavaScript File

// DOM Elements
const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
const mobileMenu = document.querySelector('.mobile-menu');
const navLinks = document.querySelectorAll('.nav-link');

// Mobile Menu Toggle
if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('open');
        
        const icon = mobileMenuBtn.querySelector('i');
        if (icon) {
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        }
    });
}

// Smooth Scrolling for Navigation Links
navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const targetId = link.getAttribute('href');
        const targetSection = document.querySelector(targetId);
        
        if (targetSection) {
            const offsetTop = targetSection.offsetTop - 80; // Account for fixed nav
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
            
            // Close mobile menu if open
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('open');
                const icon = mobileMenuBtn.querySelector('i');
                if (icon) {
                    icon.classList.add('fa-bars');
                    icon.classList.remove('fa-times');
                }
            }
        }
    });
});

// Active Navigation Link
function updateActiveNavLink() {
    const sections = document.querySelectorAll('section[id]');
    const scrollPosition = window.scrollY + 100;
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        const sectionId = section.getAttribute('id');
        
        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${sectionId}`) {
                    link.classList.add('active');
                }
            });
        }
    });
}

// Scroll Event Listener
window.addEventListener('scroll', () => {
    updateActiveNavLink();
    revealOnScroll();
    updateScrollProgress();
});

// Reveal elements on scroll
function revealOnScroll() {
    const reveals = document.querySelectorAll('.section-fade-in');
    
    reveals.forEach(element => {
        const windowHeight = window.innerHeight;
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < windowHeight - elementVisible) {
            element.classList.add('visible');
        }
    });
}

// Scroll Progress Indicator
function updateScrollProgress() {
    const scrollTop = window.pageYOffset;
    const docHeight = document.body.offsetHeight - window.innerHeight;
    const scrollPercent = (scrollTop / docHeight) * 100;
    
    // Update progress bar if it exists
    const progressBar = document.querySelector('.scroll-progress');
    if (progressBar) {
        progressBar.style.width = scrollPercent + '%';
    }
}

// GSAP Animations (if GSAP is loaded)
function initGSAPAnimations() {
    if (typeof gsap !== 'undefined') {
        // Hero section animation
        gsap.from('.hero-content', {
            duration: 1,
            y: 50,
            opacity: 0,
            ease: 'power2.out'
        });
        
        // Card animations
        gsap.from('.card-hover', {
            duration: 0.8,
            y: 30,
            opacity: 0,
            stagger: 0.2,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: '.card-hover',
                start: 'top 80%'
            }
        });
        
        // Section titles animation
        gsap.from('h2', {
            duration: 1,
            y: 30,
            opacity: 0,
            stagger: 0.3,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: 'h2',
                start: 'top 80%'
            }
        });
    }
}

// Typing Animation
function typeWriter(element, text, speed = 50) {
    let i = 0;
    element.innerHTML = '';
    
    function type() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    type();
}

// Terminal Animation
function animateTerminal() {
    const terminal = document.querySelector('.terminal');
    if (terminal) {
        const commands = [
            '$ initializing cybersecurity training...',
            '$ loading educational modules...',
            '$ game ready! Mind your click!',
            '$ press ENTER to start ▊'
        ];
        
        let commandIndex = 0;
        const terminalOutput = terminal.querySelector('.terminal-output');
        
        function typeCommand() {
            if (commandIndex < commands.length) {
                const p = document.createElement('p');
                if (commandIndex === commands.length - 1) {
                    p.className = 'text-purple-400';
                }
                terminalOutput.appendChild(p);
                
                typeWriter(p, commands[commandIndex], 30);
                commandIndex++;
                setTimeout(typeCommand, 1000);
            }
        }
        
        setTimeout(typeCommand, 500);
    }
}

// Particle System
function createParticles() {
    const hero = document.querySelector('#home');
    if (!hero) return;
    
    const particleCount = 50;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'absolute w-1 h-1 bg-blue-400 rounded-full opacity-30';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 3 + 's';
        particle.style.animation = 'float 6s ease-in-out infinite alternate';
        
        hero.appendChild(particle);
    }
}

// Theme Toggle (if needed)
function toggleTheme() {
    const body = document.body;
    const isDark = body.classList.contains('dark');
    
    if (isDark) {
        body.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    } else {
        body.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    }
}

// Load saved theme
function loadTheme() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        document.body.classList.toggle('dark', savedTheme === 'dark');
    }
}

// Intersection Observer for animations
function initIntersectionObserver() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);
    
    // Observe all sections
    document.querySelectorAll('section').forEach(section => {
        observer.observe(section);
    });
}

// Form Validation (if forms exist)
function validateForm(form) {
    const inputs = form.querySelectorAll('input[required], textarea[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.classList.add('border-red-500');
            isValid = false;
        } else {
            input.classList.remove('border-red-500');
        }
    });
    
    return isValid;
}

// Copy to Clipboard
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        showNotification('Copied to clipboard!', 'success');
    }).catch(() => {
        showNotification('Failed to copy', 'error');
    });
}

// Notification System
function showNotification(message, type = 'success', duration = 3000) {
    // Remove any existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notif => notif.remove());
    
    const notification = document.createElement('div');
    notification.className = `notification fixed top-20 right-4 z-50 px-6 py-4 rounded-lg shadow-lg max-w-sm transform translate-x-full transition-transform duration-300`;
    
    // Set notification style based on type
    switch(type) {
        case 'success':
            notification.classList.add('bg-green-600', 'text-white');
            notification.innerHTML = `<i class="fas fa-check-circle mr-2"></i>${message}`;
            break;
        case 'error':
            notification.classList.add('bg-red-600', 'text-white');
            notification.innerHTML = `<i class="fas fa-exclamation-circle mr-2"></i>${message}`;
            break;
        case 'warning':
            notification.classList.add('bg-yellow-600', 'text-white');
            notification.innerHTML = `<i class="fas fa-exclamation-triangle mr-2"></i>${message}`;
            break;
        case 'info':
            notification.classList.add('bg-blue-600', 'text-white');
            notification.innerHTML = `<i class="fas fa-info-circle mr-2"></i>${message}`;
            break;
    }
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Auto remove
    setTimeout(() => {
        notification.style.transform = 'translateX(full)';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, duration);
}

// Enhanced confirmDownload function with notifications
function confirmDownload(fileName, fileType) {
    showNotification(`Starting download of ${fileName}`, 'info');
    showDownloadProgress(fileName, fileType);
    closeModal();
}

// Enhanced export functions with notifications
function exportMetricData(metricName) {
    showNotification(`Exporting ${metricName} data...`, 'info');
    const exportModal = `
        <div class="bg-gray-900 rounded-lg max-w-md w-full">
            <div class="p-6 text-center">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-file-excel text-white text-2xl"></i>
                </div>
                <h2 class="text-xl font-bold text-white mb-4">Exporting ${metricName} Data</h2>
                <div class="w-full bg-gray-700 rounded-full h-2 mb-4">
                    <div class="bg-green-600 h-2 rounded-full export-progress" style="width: 0%"></div>
                </div>
                <p class="text-gray-300 text-sm">Preparing CSV export...</p>
            </div>
        </div>
    `;
    
    showModal(exportModal);
    
    // Animate export progress
    const progressBar = document.querySelector('.export-progress');
    let progress = 0;
    const interval = setInterval(() => {
        progress += Math.random() * 25;
        if (progress >= 100) {
            progress = 100;
            clearInterval(interval);
            setTimeout(() => {
                closeModal();
                showNotification(`${metricName} data exported successfully!`, 'success');
            }, 500);
        }
        progressBar.style.width = progress + '%';
    }, 150);
}

// Page load performance monitoring
function initializePerformanceMonitoring() {
    window.addEventListener('load', function() {
        const loadTime = performance.now();
        if (loadTime > 3000) {
            showNotification('Page loaded successfully, but loading time was slower than expected', 'warning', 5000);
        } else {
            showNotification('Phase 2 loaded successfully!', 'success');
        }
        
        // Log performance metrics
        console.log(`Phase 2 Page Load Time: ${loadTime.toFixed(2)}ms`);
    });
}

// Initialize all Phase 2 features on DOM content loaded
document.addEventListener('DOMContentLoaded', function() {
    initializePhase2Features();
    initializePerformanceMonitoring();
    
    // Add welcome message after short delay
    setTimeout(() => {
        if (document.querySelector('.malware-card')) {
            showNotification('Welcome to Phase 2! Click on any card to explore.', 'info', 4000);
        }
    }, 1000);
});

// Error handling for Phase 2 functionality
window.addEventListener('error', function(e) {
    console.error('Phase 2 Error:', e.error);
    showNotification('An unexpected error occurred. Please refresh the page.', 'error', 5000);
});

// Add smooth scroll behavior for navigation
function smoothScrollToSection(sectionId) {
    const section = document.querySelector(sectionId);
    if (section) {
        const offsetTop = section.offsetTop - 80; // Account for fixed nav
        window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
        });
    }
}

// Enhanced modal system with backdrop click protection
function showModal(content) {
    const modalContainer = document.getElementById('modal-container');
    modalContainer.innerHTML = `
        <div class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4 animate-fadeIn modal-backdrop">
            <div class="modal-content" style="animation: modalSlideIn 0.3s ease-out;">
                ${content}
            </div>
        </div>
    `;
    modalContainer.classList.remove('hidden');
    
    // Prevent body scrolling
    document.body.style.overflow = 'hidden';
    
    // Add click outside to close with proper targeting
    const backdrop = modalContainer.querySelector('.modal-backdrop');
    backdrop.addEventListener('click', function(e) {
        if (e.target === backdrop) {
            closeModal();
        }
    });
}

// Add modal animation styles
const modalStyles = document.createElement('style');
modalStyles.textContent += `
    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-20px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
    .modal-content {
        max-height: 90vh;
        overflow-y: auto;
    }
    
    /* Custom scrollbar for modal content */
    .modal-content::-webkit-scrollbar {
        width: 8px;
    }
    
    .modal-content::-webkit-scrollbar-track {
        background: #374151;
        border-radius: 4px;
    }
    
    .modal-content::-webkit-scrollbar-thumb {
        background: #6B7280;
        border-radius: 4px;
    }
    
    .modal-content::-webkit-scrollbar-thumb:hover {
        background: #9CA3AF;
    }
`;
document.head.appendChild(modalStyles);

// Add comprehensive testing function for development
function testPhase2Functionality() {
    console.log('Testing Phase 2 Functionality...');
    
    // Test card interactions
    const malwareCards = document.querySelectorAll('.malware-card');
    console.log(`Found ${malwareCards.length} malware cards`);
    
    // Test file download buttons
    const downloadButtons = document.querySelectorAll('button:has(i.fa-download)');
    console.log(`Found ${downloadButtons.length} download buttons`);
    
    // Test metric cards
    const metricCards = document.querySelectorAll('.metric-card');
    console.log(`Found ${metricCards.length} metric cards`);
    
    // Test defense tools
    const defenseTools = document.querySelectorAll('.defense-tool');
    console.log(`Found ${defenseTools.length} defense tools`);
    
    // Test progress bars
    const progressBars = document.querySelectorAll('.progress-bar');
    console.log(`Found ${progressBars.length} progress bars`);
    
    // Test counters
    const counters = document.querySelectorAll('.counter');
    console.log(`Found ${counters.length} counters`);
    
    console.log('Phase 2 Functionality Test Complete!');
    showNotification('Phase 2 functionality test completed successfully!', 'success');
}

// Expose test function to global scope for development
window.testPhase2 = testPhase2Functionality;

// Initialize Everything
document.addEventListener('DOMContentLoaded', () => {
    console.log('🚀 Nexus Project Initialized');
    
    loadTheme();
    initGSAPAnimations();
    initIntersectionObserver();
    initLazyLoading();
    createParticles();
    animateTerminal();
    
    // Add custom CSS for float animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            100% { transform: translateY(-20px) rotate(360deg); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
});

// Window Load Event
window.addEventListener('load', () => {
    // Hide loading spinner if it exists
    const loader = document.querySelector('.loader');
    if (loader) {
        loader.style.opacity = '0';
        setTimeout(() => loader.remove(), 300);
    }
    
    // Initial calls
    updateActiveNavLink();
    revealOnScroll();
});

// Export functions for use in other files
window.NexusProject = {
    toggleTheme,
    copyToClipboard,
    showNotification,
    typeWriter,
    validateForm
};

// Phase 2 Specific JavaScript Functionality
document.addEventListener('DOMContentLoaded', function() {
    initializePhase2Features();
});

function initializePhase2Features() {
    // Check if we're on the Phase 2 page
    if (!document.querySelector('.malware-card')) return;
    
    initializeMalwareCards();
    initializeAPKAnalysis();
    initializeDefenseTools();
    initializeStatistics();
    initializeFileDownloads();
    initializeModalSystem();
}

// Malware Cards Interactive Functionality
function initializeMalwareCards() {
    const malwareCards = document.querySelectorAll('.malware-card');
    
    malwareCards.forEach(card => {
        // Add click event for exploration
        const exploreBtn = card.querySelector('button');
        if (exploreBtn) {
            exploreBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const cardTitle = card.querySelector('h4').textContent;
                openMalwareModal(cardTitle, card);
            });
        }
        
        // Add hover effects with 3D transformation
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) rotateX(2deg)';
            this.style.transition = 'all 0.3s ease-out';
            
            // Animate icon
            const icon = this.querySelector('.fas');
            if (icon) {
                icon.style.transform = 'scale(1.1) rotate(5deg)';
                icon.style.transition = 'transform 0.3s ease-out';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) rotateX(0)';
            
            // Reset icon
            const icon = this.querySelector('.fas');
            if (icon) {
                icon.style.transform = 'scale(1) rotate(0deg)';
            }
        });
        
        // Add subtle pulse animation for cards
        card.style.animation = `cardPulse ${2 + Math.random() * 3}s ease-in-out infinite`;
    });
}

// Defense Tools Interactive Features
function initializeDefenseTools() {
    const defenseTools = document.querySelectorAll('.defense-tool');
    
    defenseTools.forEach(tool => {
        tool.addEventListener('click', function() {
            const toolName = this.querySelector('h5').textContent;
            showDefenseToolDetails(toolName, this);
        });
        
        // Add ripple effect on click
        tool.addEventListener('click', function(e) {
            createRippleEffect(e, this);
        });
        
        // Add glow effect on hover
        tool.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 0 20px rgba(34, 197, 94, 0.3)';
            this.style.transition = 'all 0.3s ease-out';
        });
        
        tool.addEventListener('mouseleave', function() {
            this.style.boxShadow = 'none';
        });
    });
    
    // Initialize workflow connections
    initializeWorkflowConnections();
}

function initializeWorkflowConnections() {
    // Add animated connections between defense tools
    const toolsContainer = document.querySelector('.grid.md\\:grid-cols-3');
    if (toolsContainer) {
        toolsContainer.style.position = 'relative';
        
        // Create animated connection lines (SVG)
        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.style.position = 'absolute';
        svg.style.top = '0';
        svg.style.left = '0';
        svg.style.width = '100%';
        svg.style.height = '100%';
        svg.style.pointerEvents = 'none';
        svg.style.zIndex = '1';
        
        // Add animated gradient definition
        const defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');
        const gradient = document.createElementNS('http://www.w3.org/2000/svg', 'linearGradient');
        gradient.id = 'connectionGradient';
        gradient.innerHTML = `
            <stop offset="0%" style="stop-color:#34D399;stop-opacity:0.8" />
            <stop offset="100%" style="stop-color:#3B82F6;stop-opacity:0.8" />
        `;
        defs.appendChild(gradient);
        svg.appendChild(defs);
        
        toolsContainer.appendChild(svg);
    }
}

// APK Analysis Interactive Features
function initializeAPKAnalysis() {
    const riskCategories = document.querySelectorAll('.risk-category');
    
    riskCategories.forEach(category => {
        // Add expand/collapse functionality
        const header = category.querySelector('.flex.items-center');
        if (header) {
            header.style.cursor = 'pointer';
            header.addEventListener('click', function() {
                toggleRiskCategory(category);
            });
        }
        
        // Initialize file items
        const fileItems = category.querySelectorAll('.file-item');
        fileItems.forEach(item => {
            initializeFileItem(item);
        });
    });
}

// Statistics Interactive Features
function initializeStatistics() {
    const progressBars = document.querySelectorAll('.progress-bar');
    const metricCards = document.querySelectorAll('.metric-card');
    const counters = document.querySelectorAll('.counter');
    
    // Animate progress bars and counters when visible
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains('progress-bar')) {
                    animateProgressBar(entry.target);
                }
                if (entry.target.classList.contains('counter')) {
                    animateCounter(entry.target);
                }
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    progressBars.forEach(bar => observer.observe(bar));
    counters.forEach(counter => observer.observe(counter));
    
    // Add hover effects and click handlers to metric cards
    metricCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05) translateY(-2px)';
            this.style.transition = 'transform 0.3s ease-out';
            this.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.3)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) translateY(0)';
            this.style.boxShadow = 'none';
        });
        
        card.addEventListener('click', function() {
            const title = this.querySelector('.text-gray-400').textContent;
            const value = this.querySelector('.counter').textContent;
            showMetricDetails(title, value, this);
        });
    });
}

// Counter Animation Function
function animateCounter(counter) {
    const target = parseFloat(counter.dataset.target);
    const suffix = counter.dataset.suffix || '%';
    const duration = 2000; // 2 seconds
    const startTime = Date.now();
    const startValue = 0;
    
    function updateCounter() {
        const elapsed = Date.now() - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function for smooth animation
        const easeOut = 1 - Math.pow(1 - progress, 3);
        const currentValue = startValue + (target - startValue) * easeOut;
        
        // Format the display value
        let displayValue;
        if (suffix === '%') {
            displayValue = currentValue.toFixed(1) + '%';
        } else if (suffix === ' min') {
            displayValue = currentValue.toFixed(1) + ' min';
        } else if (suffix === 'h') {
            displayValue = Math.round(currentValue) + 'h';
        } else {
            displayValue = Math.round(currentValue).toLocaleString();
        }
        
        counter.textContent = displayValue;
        
        if (progress < 1) {
            requestAnimationFrame(updateCounter);
        }
    }
    
    updateCounter();
}

// Show detailed metric information
function showMetricDetails(title, value, cardElement) {
    const icon = cardElement.querySelector('.fas').className;
    
    const modalContent = `
        <div class="bg-gray-900 rounded-lg max-w-2xl w-full">
            <div class="p-6 border-b border-gray-700 flex justify-between items-center">
                <div class="flex items-center">
                    <i class="${icon} text-2xl mr-3"></i>
                    <h2 class="text-xl font-bold text-white">${title} Details</h2>
                </div>
                <button onclick="closeModal()" class="text-gray-400 hover:text-white text-xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6">
                <div class="text-center mb-6">
                    <div class="text-4xl font-bold mb-2" style="color: ${getMetricColor(title)}">${value}</div>
                    <p class="text-gray-400">${title}</p>
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-gray-800 rounded-lg p-4">
                        <h3 class="text-lg font-bold text-white mb-3">Trend Analysis</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Last Week</span>
                                <span class="text-green-400">+12.5%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Last Month</span>
                                <span class="text-green-400">+24.8%</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Last Quarter</span>
                                <span class="text-blue-400">+45.2%</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800 rounded-lg p-4">
                        <h3 class="text-lg font-bold text-white mb-3">Performance Insights</h3>
                        <ul class="space-y-2 text-gray-300 text-sm">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Above industry average
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-trending-up text-blue-500 mr-2"></i>
                                Consistent improvement
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-shield-alt text-purple-500 mr-2"></i>
                                High reliability score
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <button onclick="exportMetricData('${title}')" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded mr-3 transition-colors">
                        <i class="fas fa-download mr-2"></i>Export Data
                    </button>
                    <button onclick="closeModal()" class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-2 rounded transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    `;
    
    showModal(modalContent);
}

// Get color for metric based on title
function getMetricColor(title) {
    switch(title.toLowerCase()) {
        case 'apks analyzed': return '#60A5FA'; // blue
        case 'threats detected': return '#F87171'; // red  
        case 'accuracy rate': return '#34D399'; // green
        case 'avg analysis time': return '#A78BFA'; // purple
        default: return '#60A5FA';
    }
}

// Export metric data simulation
function exportMetricData(metricName) {
    const exportModal = `
        <div class="bg-gray-900 rounded-lg max-w-md w-full">
            <div class="p-6 text-center">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-file-excel text-white text-2xl"></i>
                </div>
                <h2 class="text-xl font-bold text-white mb-4">Exporting ${metricName} Data</h2>
                <div class="w-full bg-gray-700 rounded-full h-2 mb-4">
                    <div class="bg-green-600 h-2 rounded-full export-progress" style="width: 0%"></div>
                </div>
                <p class="text-gray-300 text-sm">Preparing CSV export...</p>
            </div>
        </div>
    `;
    
    showModal(exportModal);
    
    // Animate export progress
    const progressBar = document.querySelector('.export-progress');
    let progress = 0;
    const interval = setInterval(() => {
        progress += Math.random() * 25;
        if (progress >= 100) {
            progress = 100;
            clearInterval(interval);
            setTimeout(() => {
                closeModal();
                showNotification(`${metricName} data exported successfully!`, 'success');
            }, 500);
        }
        progressBar.style.width = progress + '%';
    }, 150);
}

function showDownloadProgress(fileName, fileType) {
    const progressModal = `
        <div class="bg-gray-900 rounded-lg max-w-md w-full">
            <div class="p-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-cloud-download-alt text-white text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-4">Downloading ${fileName}</h2>
                    <div class="w-full bg-gray-700 rounded-full h-2 mb-4">
                        <div class="bg-green-600 h-2 rounded-full download-progress" style="width: 0%"></div>
                    </div>
                    <p class="text-gray-300 text-sm">Preparing secure download...</p>
                </div>
            </div>
        </div>
    `;
    
    showModal(progressModal);
    
    // Animate progress bar
    const progressBar = document.querySelector('.download-progress');
    let progress = 0;
    const interval = setInterval(() => {
        progress += Math.random() * 20;
        if (progress >= 100) {
            progress = 100;
            clearInterval(interval);
            setTimeout(() => {
                closeModal();
                showDownloadComplete(fileName);
            }, 500);
        }
        progressBar.style.width = progress + '%';
    }, 200);
}

function showDownloadComplete(fileName) {
    const completeModal = `
        <div class="bg-gray-900 rounded-lg max-w-md w-full">
            <div class="p-6 text-center">
                <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check text-white text-2xl"></i>
                </div>
                <h2 class="text-xl font-bold text-white mb-2">Download Complete</h2>
                <p class="text-gray-300 mb-6">${fileName} has been downloaded successfully.</p>
                <button onclick="closeModal()" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded transition-colors">
                    Close
                </button>
            </div>
        </div>
    `;
    
    showModal(completeModal);
    
    setTimeout(() => {
        closeModal();
    }, 3000);
}

// File Download Functionality
function initializeFileDownloads() {
    const downloadButtons = document.querySelectorAll('button:has(i.fa-download)');
    const reportButtons = document.querySelectorAll('button:has(i.fa-file-pdf)');
    const analysisButtons = document.querySelectorAll('button:has(i.fa-file-word)');
    
    downloadButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const fileName = this.closest('.file-item').querySelector('span').textContent;
            handleFileDownload(fileName, 'apk');
        });
    });
    
    reportButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const fileName = this.closest('.file-item').querySelector('span').textContent;
            handleDocumentView(fileName, 'pdf');
        });
    });
    
    analysisButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const fileName = this.closest('.file-item').querySelector('span').textContent;
            handleDocumentView(fileName, 'docx');
        });
    });
}

// Modal System
function initializeModalSystem() {
    // Create modal container if it doesn't exist
    if (!document.querySelector('#modal-container')) {
        const modalContainer = document.createElement('div');
        modalContainer.id = 'modal-container';
        modalContainer.className = 'fixed inset-0 z-50 hidden';
        document.body.appendChild(modalContainer);
    }
    
    // Close modal on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
}

// Helper Functions

function openMalwareModal(title, cardElement) {
    const modalContent = generateMalwareModalContent(title, cardElement);
    showModal(modalContent);
}

function generateMalwareModalContent(title, cardElement) {
    const description = cardElement.querySelector('p').textContent;
    const techStack = cardElement.querySelector('.flex.items-center.justify-center span').textContent;
    
    return `
        <div class="bg-gray-900 rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-gray-900 border-b border-gray-700 p-6 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-white">${title} - Educational Implementation</h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-white text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-bold text-white mb-4">Overview</h3>
                        <p class="text-gray-300 mb-4">${description}</p>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-code text-blue-400 mr-3"></i>
                                <span class="text-white">Technology: ${techStack}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-shield-alt text-green-400 mr-3"></i>
                                <span class="text-white">Purpose: Educational Only</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-graduation-cap text-purple-400 mr-3"></i>
                                <span class="text-white">Learning Objective: Cybersecurity Defense</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white mb-4">Key Features</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Controlled environment testing
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Educational code documentation
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Defense mechanism analysis
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Ethical guidelines compliance
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-yellow-900/20 border border-yellow-500/50 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle text-yellow-400 mr-2"></i>
                        <h4 class="text-yellow-400 font-bold">Educational Disclaimer</h4>
                    </div>
                    <p class="text-gray-300 text-sm">
                        This implementation is designed purely for educational purposes in a controlled academic environment. 
                        All code and techniques are documented to help understand cybersecurity threats and develop appropriate defenses.
                    </p>
                </div>
            </div>
        </div>
    `;
}

function showDefenseToolDetails(toolName, toolElement) {
    const features = Array.from(toolElement.querySelectorAll('li')).map(li => li.textContent.trim());
    
    const modalContent = `
        <div class="bg-gray-900 rounded-lg max-w-3xl w-full">
            <div class="p-6 border-b border-gray-700 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-white">${toolName} Details</h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-white text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6">
                <h3 class="text-lg font-bold text-white mb-4">Capabilities</h3>
                <div class="space-y-3">
                    ${features.map(feature => `
                        <div class="flex items-center p-3 bg-gray-800 rounded-lg">
                            <i class="fas fa-shield-alt text-green-400 mr-3"></i>
                            <span class="text-gray-300">${feature}</span>
                        </div>
                    `).join('')}
                </div>
                <div class="mt-6 flex space-x-3">
                    <button class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded transition-colors">
                        <i class="fas fa-play mr-2"></i>Launch Demo
                    </button>
                    <button class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded transition-colors">
                        <i class="fas fa-book mr-2"></i>Documentation
                    </button>
                </div>
            </div>
        </div>
    `;
    
    showModal(modalContent);
}

function handleFileDownload(fileName, fileType) {
    // Show download confirmation
    const modalContent = `
        <div class="bg-gray-900 rounded-lg max-w-md w-full">
            <div class="p-6">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-download text-white text-2xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-white mb-2">Download ${fileType.toUpperCase()} File</h2>
                    <p class="text-gray-300">${fileName}</p>
                </div>
                <div class="bg-yellow-900/20 border border-yellow-500/50 rounded-lg p-4 mb-6">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-triangle text-yellow-400 mr-2"></i>
                        <span class="text-yellow-400 font-bold">Security Notice</span>
                    </div>
                    <p class="text-gray-300 text-sm">
                        This file is for educational purposes only. Ensure you have proper authorization and are using a secure, isolated environment.
                    </p>
                </div>
                <div class="flex space-x-3">
                    <button onclick="confirmDownload('${fileName}', '${fileType}')" class="flex-1 bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded transition-colors">
                        <i class="fas fa-download mr-2"></i>Confirm Download
                    </button>
                    <button onclick="closeModal()" class="flex-1 bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded transition-colors">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    `;
    
    showModal(modalContent);
}

function handleDocumentView(fileName, docType) {
    const modalContent = `
        <div class="bg-gray-900 rounded-lg max-w-4xl w-full max-h-[90vh]">
            <div class="p-4 border-b border-gray-700 flex justify-between items-center">
                <h2 class="text-xl font-bold text-white">${fileName.replace(/\.[^/.]+$/, '')}.${docType}</h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-white text-xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6 overflow-y-auto" style="max-height: calc(90vh - 80px)">
                <div class="text-center py-12">
                    <div class="w-24 h-24 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-file-${docType === 'pdf' ? 'pdf' : 'word'} text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Document Preview</h3>
                    <p class="text-gray-300 mb-6">
                        ${docType === 'pdf' ? 'PDF Analysis Report' : 'Word Document Analysis'}
                    </p>
                    <div class="bg-gray-800 rounded-lg p-6 text-left max-w-2xl mx-auto">
                        <h4 class="text-lg font-bold text-white mb-4">Document Contents Preview</h4>
                        <div class="space-y-3 text-gray-300">
                            <p>• Executive Summary of Analysis</p>
                            <p>• Technical Details and Findings</p>
                            <p>• Risk Assessment and Recommendations</p>
                            <p>• Appendices with Additional Data</p>
                        </div>
                    </div>
                    <div class="mt-6 space-x-3">
                        <button onclick="downloadDocument('${fileName}', '${docType}')" class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded transition-colors">
                            <i class="fas fa-download mr-2"></i>Download Full Document
                        </button>
                        <button onclick="closeModal()" class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-2 rounded transition-colors">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    showModal(modalContent);
}

function showModal(content) {
    const modalContainer = document.getElementById('modal-container');
    modalContainer.innerHTML = `
        <div class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center p-4 animate-fadeIn">
            ${content}
        </div>
    `;
    modalContainer.classList.remove('hidden');
    
    // Prevent body scrolling
    document.body.style.overflow = 'hidden';
    
    // Add click outside to close
    modalContainer.addEventListener('click', function(e) {
        if (e.target === this.firstElementChild) {
            closeModal();
        }
    });
}

function closeModal() {
    const modalContainer = document.getElementById('modal-container');
    modalContainer.classList.add('hidden');
    modalContainer.innerHTML = '';
    document.body.style.overflow = 'auto';
}

function confirmDownload(fileName, fileType) {
    // Simulate file download
    showDownloadProgress(fileName, fileType);
    closeModal();
}

function downloadDocument(fileName, docType) {
    showDownloadProgress(fileName, docType);
    closeModal();
}

function toggleRiskCategory(category) {
    const content = category.querySelector('.space-y-3');
    const header = category.querySelector('.flex.items-center');
    
    if (content.style.display === 'none') {
        content.style.display = 'block';
        content.style.animation = 'slideDown 0.3s ease-out';
        header.querySelector('.fas').style.transform = 'rotate(0deg)';
    } else {
        content.style.animation = 'slideUp 0.3s ease-out';
        setTimeout(() => {
            content.style.display = 'none';
        }, 300);
        header.querySelector('.fas').style.transform = 'rotate(180deg)';
    }
}

function initializeFileItem(item) {
    item.addEventListener('mouseenter', function() {
        this.style.transform = 'translateX(8px)';
        this.style.transition = 'transform 0.3s ease-out';
        this.style.backgroundColor = 'rgba(75, 85, 99, 0.3)';
        
        // Add subtle glow based on risk level
        const riskLevel = this.closest('.risk-category');
        if (riskLevel.classList.contains('bg-red-900/20')) {
            this.style.boxShadow = '0 4px 12px rgba(239, 68, 68, 0.2)';
        } else if (riskLevel.classList.contains('bg-orange-900/20')) {
            this.style.boxShadow = '0 4px 12px rgba(249, 115, 22, 0.2)';
        } else {
            this.style.boxShadow = '0 4px 12px rgba(34, 197, 94, 0.2)';
        }
    });
    
    item.addEventListener('mouseleave', function() {
        this.style.transform = 'translateX(0)';
        this.style.backgroundColor = 'rgba(17, 24, 39, 0.5)';
        this.style.boxShadow = 'none';
    });
    
    // Add double-click for quick action
    item.addEventListener('dblclick', function() {
        const fileName = this.querySelector('span').textContent;
        handleFileDownload(fileName, 'apk');
    });
}

// Add keyboard navigation support
document.addEventListener('keydown', function(e) {
    // Handle arrow keys for card navigation
    if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
        const cards = document.querySelectorAll('.malware-card, .defense-tool, .metric-card');
        const focusedCard = document.activeElement;
        const cardIndex = Array.from(cards).indexOf(focusedCard);
        
        if (cardIndex !== -1) {
            e.preventDefault();
            let nextIndex;
            if (e.key === 'ArrowRight') {
                nextIndex = (cardIndex + 1) % cards.length;
            } else {
                nextIndex = (cardIndex - 1 + cards.length) % cards.length;
            }
            cards[nextIndex].focus();
        }
    }
    
    // Handle Enter key for activation
    if (e.key === 'Enter') {
        const focusedElement = document.activeElement;
        if (focusedElement.classList.contains('malware-card') || 
            focusedElement.classList.contains('defense-tool') || 
            focusedElement.classList.contains('metric-card')) {
            focusedElement.click();
        }
    }
});

// Make cards focusable
document.addEventListener('DOMContentLoaded', function() {
    const interactiveElements = document.querySelectorAll('.malware-card, .defense-tool, .metric-card');
    interactiveElements.forEach(element => {
        element.setAttribute('tabindex', '0');
        element.style.outline = 'none';
        
        element.addEventListener('focus', function() {
            this.style.outline = '2px solid #3B82F6';
            this.style.outlineOffset = '2px';
        });
        
        element.addEventListener('blur', function() {
            this.style.outline = 'none';
        });
    });
});

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes cardPulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
        50% { box-shadow: 0 0 0 8px rgba(59, 130, 246, 0); }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideUp {
        from { opacity: 1; transform: translateY(0); }
        to { opacity: 0; transform: translateY(-10px); }
    }
    
    .animate-fadeIn {
        animation: fadeIn 0.3s ease-out;
    }
    
    .ripple {
        position: absolute;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.3);
        transform: scale(0);
        animation: ripple 0.6s linear;
    }
    
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
