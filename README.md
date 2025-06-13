# 📚 Learner and Employee Management System (LEMS)

**LEMS** is a web-based platform developed to modernize and streamline key school administrative tasks. This system enables digital attendance logging, role-based access for different users (Admin, Employee, Learner), OTP-secured registration, and targeted announcement dissemination — all within a clean, responsive Laravel-powered interface.

> "Build systems not just for grades, but for real-world impact."

---

## 🚀 Features

- 📌 QR Code-based learner attendance logging  
- 👤 Role-based access control (Admin, Employee, Learner)  
- 📧 Email-based announcement system (filter by grade level and section)  
- 🔐 Email OTP verification for registration  
- 📊 Dashboard and user management  
- ✅ Responsive and mobile-friendly UI  
- 🗂️ Modular and scalable Laravel 12 codebase  

---

## 🛠️ Tech Stack

- **Laravel 12**  
- **PHP 8+**  
- **MySQL / MariaDB**  
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
git clone https://github.com/leonardtdomingovida/lems.git
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

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
