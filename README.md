# 200 OK

TwoHundredOK is a modern web application boilerplate built with **Laravel 12** and **Vue 3**, designed to provide a robust foundation for your next project. It features a seamless Single Page Application (SPA) experience powered by **Inertia.js**, styled with **TailwindCSS 4** and **DaisyUI 5**.

## 🚀 Features

-   **Laravel 12**: The latest version of the elegant PHP framework.
-   **Vue 3**: The progressive JavaScript framework for building user interfaces.
-   **Inertia.js**: Build modern single-page apps using classic server-side routing and controllers.
-   **TailwindCSS 4**: A utility-first CSS framework for rapidly building custom designs.
-   **DaisyUI 5**: The most popular component library for Tailwind CSS.
-   **Vite**: Next Generation Frontend Tooling.
-   **Pinia**: The intuitive store for Vue.js.
-   **Authentication**: Secure login and registration pages included.

## 🛠️ Tech Stack

-   **Backend**: PHP 8.2+, Laravel 12
-   **Frontend**: Vue 3, Inertia.js
-   **Styling**: TailwindCSS 4, DaisyUI 5
-   **State Management**: Pinia
-   **Routing**: Ziggy

## 🏁 Getting Started

### Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js & npm

### Installation

1.  **Clone the repository**

    ```bash
    git clone https://github.com/Mohamed-abdelfadel/TwoHundredOK.git
    cd TwoHundredOK
    ```

2.  **Install PHP dependencies**

    ```bash
    composer install
    ```

3.  **Install JavaScript dependencies**

    ```bash
    npm install
    ```

4.  **Environment Setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5.  **Database Setup**
    Configure your database in the `.env` file, then run migrations:

    ```bash
    php artisan migrate
    ```

6.  **Start the Development Server**
    ```bash
    npm run dev
    ```
    In a separate terminal:
    ```bash
    php artisan serve
    ```

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
