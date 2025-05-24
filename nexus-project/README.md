# NEXUS - Cybersecurity Research & Education Platform

<div align="center">
  
![NEXUS × MYC Logo](public/images/shield-logo.svg)

**An Interactive Cybersecurity Education Platform**

*Empowering the next generation through collaborative learning experiences*

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)

</div>

---

## 🛡️ About NEXUS

**NEXUS** is a comprehensive cybersecurity research and education platform that includes the innovative **MYC (Mind Your Click)** educational game as one of its key components. This platform combines academic research excellence with engaging educational tools to create a comprehensive cybersecurity learning ecosystem.

### Mission Statement
To democratize cybersecurity education through interactive, gamified learning experiences that make complex security concepts accessible to learners of all ages, with a special focus on children aged 7-13.

## 🎮 Platform Features

### 🌟 Core Gaming Experience
- **📚 Story Mode**: Multi-episode campaigns featuring cybersecurity scenarios with engaging villain characters and progressive difficulty
- **🤖 AI Guide (Circuit)**: Intelligent companion providing personalized guidance, hints, and educational feedback
- **🏘️ Interactive Cyber Village**: Immersive virtual environment with various learning locations and scenarios
- **⚖️ Fake vs Real Challenge**: Advanced comparison system teaching users to identify suspicious content and phishing attempts
- **🛡️ Cyber Shield & Badge System**: Comprehensive achievement and progress tracking with visual rewards

### 🎯 Educational Modules

#### **Phishing Awareness Training**
- **Email Security**: Outlook and Gmail phishing simulation with realistic interfaces
- **SMS Scam Detection**: Mobile-first approach to identifying text message threats
- **Multi-Platform Analysis**: Cross-platform security assessment challenges
- **Real-World Application**: Hands-on experience with actual phishing techniques

#### **Digital Citizenship**
- Safe browsing practices
- Social media security awareness
- Password management and authentication
- Privacy protection strategies

#### **Interactive Scenarios**
- Role-playing cybersecurity incidents
- Decision-making challenges with consequences
- Collaborative problem-solving exercises
- Real-time threat simulation

## 🚀 Technical Architecture

### **Backend Infrastructure**
- **Framework**: Laravel 11.x (PHP 8.1+)
- **Database**: SQLite (development) / MySQL (production)
- **Authentication**: Laravel Sanctum
- **API**: RESTful architecture with JSON responses

### **Frontend Technology Stack**
- **CSS Framework**: Tailwind CSS 4.x with custom component library
- **JavaScript**: Vanilla ES6+ with modular architecture
- **Build System**: Vite for asset compilation and hot module replacement
- **Responsive Design**: Mobile-first approach with cross-device compatibility

### **Performance & Scalability**
- Optimized database queries with lazy loading
- Asset optimization and compression
- CDN integration ready
- Horizontal scaling support

## 🏗️ Project Structure

```
nexus-project/
├── app/
│   ├── Http/Controllers/
│   │   ├── GameController.php          # Core game logic and mission handling
│   │   ├── AuthController.php          # User authentication and session management
│   │   └── ProgressController.php      # Learning progress and achievement tracking
│   ├── Models/
│   │   ├── User.php                    # User account and profile management
│   │   ├── Mission.php                 # Mission structure and content
│   │   └── Progress.php                # User progress and completion tracking
│   └── Services/
│       ├── GameLogicService.php        # Business logic for game mechanics
│       └── EducationService.php        # Educational content management
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php           # Main application layout
│   │   │   └── nexus.blade.php         # NEXUS-specific layout components
│   │   ├── game/
│   │   │   ├── mission.blade.php       # Interactive mission interface
│   │   │   ├── village.blade.php       # Cyber village environment
│   │   │   └── progress.blade.php      # Progress tracking dashboard
│   │   └── auth/                       # Authentication interfaces
│   ├── css/
│   │   └── app.css                     # Tailwind CSS configuration and custom styles
│   └── js/
│       ├── app.js                      # Main application JavaScript
│       ├── game-logic.js               # Game mechanics and interactions
│       └── mission-handlers.js         # Mission-specific event handling
├── public/
│   ├── images/                         # Game assets, logos, and educational graphics
│   ├── sounds/                         # Audio feedback and ambient sounds
│   └── videos/                         # Educational video content
├── database/
│   ├── migrations/                     # Database schema definitions
│   └── seeders/                        # Sample data and content population
└── tests/
    ├── Feature/                        # Integration tests for game features
    └── Unit/                          # Unit tests for individual components
```

## 🛠️ Installation & Setup

### **Prerequisites**
- **PHP**: 8.1 or higher with extensions: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON
- **Composer**: Latest version for dependency management
- **Node.js**: 18.x or higher with NPM
- **Database**: SQLite (development) or MySQL/PostgreSQL (production)

### **Quick Start Guide**

1. **Clone the Repository**
   ```bash
   git clone https://github.com/nexus-project/nexus-myc-collaboration.git
   cd nexus-myc-collaboration
   ```

2. **Install Dependencies**
   ```bash
   # Install PHP dependencies
   composer install --optimize-autoloader

   # Install JavaScript dependencies
   npm install
   ```

3. **Environment Configuration**
   ```bash
   # Copy environment file
   cp .env.example .env

   # Generate application key
   php artisan key:generate

   # Configure your database settings in .env file
   ```

4. **Database Setup**
   ```bash
   # Run migrations
   php artisan migrate

   # Seed with sample data (optional)
   php artisan db:seed
   ```

5. **Asset Compilation**
   ```bash
   # Development build with hot reload
   npm run dev

   # Production build (optimized)
   npm run build
   ```

6. **Launch Application**
   ```bash
   # Start development server
   php artisan serve

   # Access at http://localhost:8000
   ```

### **Production Deployment**
```bash
# Optimize for production
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

## 🎯 Educational Objectives

### **Primary Learning Outcomes**
- **Critical Analysis Skills**: Develop ability to evaluate digital content for authenticity and safety
- **Threat Recognition**: Identify common cybersecurity threats including phishing, social engineering, and malware
- **Safe Digital Practices**: Establish secure habits for online communication, browsing, and data sharing
- **Incident Response**: Learn appropriate actions when encountering potential security threats

### **Age-Appropriate Curriculum**
- **Ages 7-9**: Basic digital safety, password concepts, and stranger danger online
- **Ages 10-12**: Email security, social media awareness, and privacy protection
- **Ages 13+**: Advanced threat analysis, encryption basics, and digital forensics introduction

### **Assessment Methods**
- Real-time performance analytics
- Progressive skill validation
- Peer collaboration challenges
- Portfolio-based learning evidence

## 🤝 Contributing

We welcome contributions from educators, developers, cybersecurity professionals, and anyone passionate about digital literacy education.

### **How to Contribute**
1. **Fork the Repository**
2. **Create Feature Branch** (`git checkout -b feature/amazing-feature`)
3. **Commit Changes** (`git commit -m 'Add amazing feature'`)
4. **Push to Branch** (`git push origin feature/amazing-feature`)
5. **Open Pull Request**

### **Contribution Guidelines**
- Follow PSR-12 coding standards for PHP
- Use semantic commit messages
- Include tests for new features
- Update documentation for API changes
- Ensure accessibility compliance (WCAG 2.1 AA)

## 📈 Performance Metrics

- **Load Time**: < 2 seconds for initial page load
- **Interactive Response**: < 100ms for user interactions
- **Mobile Optimization**: 95+ Lighthouse score
- **Accessibility**: WCAG 2.1 AA compliant
- **Security**: OWASP Top 10 protection implemented

## 🔐 Security & Privacy

- **Data Protection**: COPPA and GDPR compliant data handling
- **Secure Authentication**: Multi-factor authentication support
- **Privacy by Design**: Minimal data collection with explicit consent
- **Regular Security Audits**: Quarterly penetration testing and vulnerability assessments

## 📞 Support & Community

- **Documentation**: [Project Wiki](https://github.com/nexus-project/nexus-myc/wiki)
- **Issues**: [GitHub Issues](https://github.com/nexus-project/nexus-myc/issues)
- **Discussions**: [Community Forum](https://github.com/nexus-project/nexus-myc/discussions)
- **Email**: support@nexus-myc.org

## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

## 🏆 Acknowledgments

### **NEXUS Partnership**
Special recognition to the NEXUS Project for their innovative approach to educational technology and commitment to collaborative learning experiences.

### **Educational Advisory Board**
- Dr. Sarah Mitchell - Cybersecurity Education Specialist
- Prof. James Chen - Digital Literacy Research
- Maria Rodriguez - Child Development Psychology
- Tech Security Professionals Consortium

### **Open Source Community**
Built with gratitude for the open source ecosystem, including Laravel, Tailwind CSS, and countless community contributors who make educational technology accessible to all.

---

<div align="center">

**NEXUS × MYC: Building a Safer Digital Future Through Education**

*Developed with ❤️ for the next generation of digital citizens*

</div>
