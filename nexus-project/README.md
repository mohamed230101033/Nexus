# MYC: Mind Your Click

An interactive educational cybersecurity game for children aged 7-13.

<p align="center">
  <img src="public/images/shield-logo.svg" alt="MYC Logo" width="200">
</p>

## About

**MYC: Mind Your Click** is a web-based educational game designed to teach children about cybersecurity, phishing awareness, and safe online practices. The game combines storytelling, interactive challenges, and personalized feedback to create an engaging learning experience.

### Key Features

- **Story Mode**: Episodic challenges featuring different cybersecurity concepts and villain characters
- **AI Guide**: A friendly assistant named Circuit that provides personalized guidance and tips
- **Interactive Cyber Village**: Various virtual locations with different learning scenarios
- **Fake vs Real Challenge**: Side-by-side comparisons to help identify suspicious content
- **Cyber Shield & Badges**: Visual reward system to track progress and motivate learning

## Technologies Used

- **Backend**: Laravel (PHP)
- **Frontend**: Tailwind CSS, JavaScript
- **Database**: SQLite (development), MySQL (production)

## Getting Started

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js and NPM
- SQLite or MySQL

### Installation

1. Clone the repository:
   ```
   git clone https://github.com/your-username/myc-mind-your-click.git
   cd myc-mind-your-click
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Install JavaScript dependencies:
   ```
   npm install
   ```

4. Copy the environment file and generate an application key:
   ```
   cp .env.example .env
   php artisan key:generate
   ```

5. Configure your database in the `.env` file

6. Run migrations:
   ```
   php artisan migrate
   ```

7. Build assets:
   ```
   npm run dev
   ```

8. Start the development server:
   ```
   php artisan serve
   ```

9. Visit `http://localhost:8000` in your browser

## Project Structure

- `app/Http/Controllers/GameController.php` - Main game logic controller
- `resources/views/` - Blade templates for the game interface
- `resources/css/app.css` - Tailwind CSS styles
- `resources/js/app.js` - JavaScript for interactive elements
- `public/images/` - Game assets and images

## Educational Goals

- Teach children to identify phishing attempts and social engineering tactics
- Promote critical thinking when evaluating online content
- Build awareness of common cybersecurity threats
- Develop safe online habits from an early age
- Make cybersecurity education fun and engaging

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgments

- Developed for educational purposes
- Inspired by the need to protect children in the digital world
- Special thanks to cybersecurity professionals who provided guidance on content
