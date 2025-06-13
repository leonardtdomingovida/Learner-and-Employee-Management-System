# 📚 Learner and Employee Management System (LEMS)

LEMS is a Laravel-based web platform that simplifies school administrative tasks through QR code attendance, role-based access, OTP-secured email registration, and targeted email announcements — all in a responsive user interface.

> "Build systems not just for grades, but for real-world impact."

---

## 🚀 Features

- 📌 QR Code-based learner attendance logging  
- 👤 Role-based access control (Admin, Employee, Learner)  
- 📧 Email-based announcement system (filter by users or grade level and section)  
- 🔐 Email OTP verification for registration  
- 📊 Dashboard and user management  
- ✅ Responsive and mobile-friendly UI  
- 🗂️ Modular and scalable Laravel 12 codebase  

---

## 🛠️ Tech Stack

- **Laravel 12**  
- **PHP 8+**  
- **MySQL**  
- **Bootstrap 5**  
- **Spatie Laravel Permission** – for role and permission management  
- **Laravel Breeze** – for authentication scaffolding  
- **SweetAlert2** – for alert feedback  
- **QR Code Scanner** – for real-time attendance capture  

---

## ⚙️ Installation Instructions

> These steps assume you have Composer, PHP, Node.js, and a local server (e.g., XAMPP) installed.

### 🔧 Steps 1–8: Set up the Project Locally

```bash
# 1. Clone the repository
git clone https://github.com/leonardtdomingovida/Learner-and-Employee-Management-System.git
cd lems

# 2. Install PHP dependencies
composer install

# 3. Install frontend assets
npm install && npm run dev

# 4. Copy the example environment file and configure it
cp .env.example .env
# Open .env in a text editor and set your database and mail configuration

# 5. Generate the application key
php artisan key:generate

# 6. Run database migrations
php artisan migrate

# 7. (Optional) Create a symbolic link to the storage folder
php artisan storage:link

# 8. Start the Laravel development server
php artisan serve


👨‍💻 Developer:
Leonard Domingo

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

The Laravel framework used in this project is also licensed under the MIT license.

