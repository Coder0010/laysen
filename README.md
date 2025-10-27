# Laysen - Business and Lead Management System

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Laravel Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
  <a href="https://github.com/features/actions">
    <img src="https://github.com/Coder0010/laysen/actions/workflows/deploy.yml/badge.svg" alt="Build Status">
  </a>
</p>

## About Laysen

Laysen is a comprehensive Business and Lead Management System built with Laravel. It's designed to help businesses manage their leads, track business operations, and maintain customer relationships efficiently.

### Key Features

- **Business Management**: Organize and manage business information in one place
- **Lead Tracking**: Capture, track, and manage potential customer interactions
- **User Authentication**: Secure login and user management system
- **Responsive Design**: Works seamlessly on desktop and mobile devices
- **Admin Dashboard**: Centralized control panel for administrators
- **Settings Management**: Customize system behavior and preferences

## Technology Stack

- **Backend**: Laravel 10.x
- **Frontend**: Blade templates, Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Deployment**: GitHub Actions for CI/CD

## Getting Started

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js & NPM
- MySQL 5.7+ or MariaDB 10.3+

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Coder0010/laysen.git
   cd laysen
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install NPM dependencies:
   ```bash
   npm install
   npm run build
   ```

4. Copy the environment file:
   ```bash
   cp .env.example .env
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Configure your `.env` file with database credentials and other settings.

7. Run database migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

8. Start the development server:
   ```bash
   php artisan serve
   ```

9. Access the application at `http://localhost:8000`
### Default Admin Credentials

- **Email**: admin@example.com
- **Password**: password

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is open-source and available under the [MIT License](LICENSE).

## Security Vulnerabilities

If you discover a security vulnerability, please send an e-mail to the maintainers. All security vulnerabilities will be promptly addressed.

## Project Concept

For support, please open an issue in the GitHub repository.

## Acknowledgements

- [Laravel](https://laravel.com) - The PHP Framework For Web Artisans
- [Tailwind CSS](https://tailwindcss.com) - A utility-first CSS framework
- [GitHub Actions](https://github.com/features/actions) - CI/CD Pipeline
