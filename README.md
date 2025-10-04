# 📿 Tasbeeh App | تطبيق التسبيح

A modern, scalable digital Dhikr counter application built with Laravel.  
تطبيق عداد ذكر رقمي حديث وقابل للتوسع مبني بـلارافيل

---

## 🎯 About | عن المشروع

**English:**  
A production-ready application to perform and track Islamic Dhikr (remembrance of Allah). Features clean architecture using Repository and Service patterns.

**العربية:**  
تطبيق احترافي لأداء وتتبع الأذكار الإسلامية. يطبق معايير البرمجة النظيفة باستخدام Repository و Service Patterns.

---

## 🛠️ Tech Stack

-   **Backend:** Laravel 12
-   **Frontend:** Blade Templates + Tailwind CSS
-   **Database:** MySQL
-   **Authentication:** Laravel Breeze

---

## 📦 Installation | التثبيت

```bash
# Clone the repository
git clone https://github.com/Galhoom22/Tasbeeh-App.git
cd Tasbeeh-App

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations and seed
php artisan migrate --seed

# Start development server
php artisan serve
```
