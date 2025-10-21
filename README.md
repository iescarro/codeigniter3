<p align="center">
    <img alt="Logo CodeIgniter3" src="/art/logo.png">
</p>

<p align="center">
    <a href="https://packagist.org/packages/iescarro/codeigniter3"><img src="https://img.shields.io/packagist/dt/iescarro/codeigniter3" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/iescarro/codeigniter3"><img src="https://img.shields.io/packagist/v/iescarro/codeigniter3" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/iescarro/codeigniter3"><img src="https://img.shields.io/packagist/l/iescarro/codeigniter3" alt="License"></a>
</p>

# CodeIgniter 3

This is a modernized structure for **CodeIgniter 3**, where the framework is installed as a **Composer package**, keeping your application code separate from the core framework files. This makes it easier to manage, maintain, and upgrade CodeIgniter without affecting your app.

## 🚀 Quick Start

```
composer create-project iescarro/codeigniter3 blog
cd blog
chmod -R 775 application/storage/database
chown -R www-data:www-data application/storage/database  # adjust user if needed
php ignite generate:scaffold Post title:varchar content:text
cp .env.example .env
cp public/.htaccess.example public/.htaccess
php public/index.php migrate
php ignite serve
```

- ✨ ignite generate:scaffold – Generate a model, controller, view, and migration
- 🗃 .env – Customize your environment variables
- 🌐 php ignite serve – Launch the local development server

## 📁 Directory Structure

```bash
blog/
├── application/    # Your application code
├── public/         # Web root
├── vendor/         # Composer-managed packages (includes CodeIgniter core)
├── .env            # Environment configuration
└── ...
```

Your app is fully decoupled from the framework core, which is installed via Composer. You can safely update CodeIgniter without overwriting your custom app logic.

## 🖼️ Frontend with Vue.js (optional)

If you’re integrating Vue.js:

```bash
npm install
npm run serve
```

- Vue project should be inside /resources/js or similar (customize as needed).
- You can build the frontend assets and serve them from the public folder.

## 🧰 Tools & Features

- ✅ CLI with ignite for scaffolding and utilities
- ✅ Environment-based config via .env
- ✅ Frontend-ready with Vue.js support
- ✅ Composer-managed dependencies

## 📄 License

MIT © CodeIgniter3 Team

Originally based on CodeIgniter 3
