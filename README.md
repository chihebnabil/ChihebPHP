# Simplex Framework

A modern PHP 8.1+ MVC framework featuring elegant database ORM, middleware support, and robust routing system.

## Requirements

- PHP 8.1 or higher
- Composer

## Installation

```bash
composer create-project chiheb/simplex-framework your-project-name
```

## Key Features

- Modern PHP 8.1+ Framework
- CakePHP ORM Integration
- Environment Configuration with Symfony Dotenv
- Logging with Monolog
- PSR-4 Autoloading
- Development Tools:
  - PHPUnit for testing
  - PHPStan for static analysis
  - PHP_CodeSniffer for coding standards
  - PHP-CS-Fixer for code formatting

## Quick Start

1. Configure your environment:
```bash
cp .env.example .env
```

2. Install dependencies:
```bash
composer install
```

3. Run development tools:
```bash
composer check    # Runs all code quality tools
composer format  # Fix code style
composer lint    # Check coding standards
composer analyze # Static analysis
```

## Documentation

For detailed documentation, please refer to the [documentation.md](documentation.md) file in this repository.

## License

This project is licensed under the MIT License. See the LICENSE file for details.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Author

- Chiheb Nabil
- Email: chiheb.design@gmail.com
- Website: https://mydevmentor.com
