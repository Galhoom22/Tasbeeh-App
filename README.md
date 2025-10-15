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

## 🏗️ Architecture | الهيكلة

This project follows Clean Architecture principles:

`Browser → Controller → Service → Repository → Model → Database`

**Patterns Used:**

-   ✅ MVC (Model-View-Controller)
-   ✅ Repository Pattern (Data Access Layer)
-   ✅ Service Pattern (Business Logic Layer)
-   ✅ Dependency Injection (IoC Container)

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
---
## 📸 Screenshots | لقطات الشاشة
<img alt="light-english" src="https://github.com/user-attachments/assets/5fe3fc44-790c-43f8-9192-50f6d3cf05f6" />
<img alt="light-arabic" src="https://github.com/user-attachments/assets/a2c57d98-e99e-4806-9a87-a03911bd7e1e" />
<img alt="dark-english" src="https://github.com/user-attachments/assets/6e0f2ad1-d85b-4a9c-8062-f4fa5c457aab" />
<img alt="dark-arabic" src="https://github.com/user-attachments/assets/2e8299b9-5609-4010-84ca-f3d8eeb5e443" />
---
