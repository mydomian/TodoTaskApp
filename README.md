# Todo Task App

A simple task management application where admins can manage employees and their tasks. Employees can view and update their assigned tasks.

## Installation Process

Follow these steps to get your application up and running:

1. Clone the repository:
   ```bash
   git clone https://github.com/mydomain/TodoTaskApp.git
2. Navigate into the project directory:
   ```bash
   cd TodoTaskApp
3. Update composer dependencies:
   ```bash
   composer update
4. Create a .env file from the example:
   ```bash
   cp .env.example .env
5. Generate the application key:
   ```bash
   php artisan key:generate
6. Create a symbolic link for storage:
   ```bash
   php artisan storage:link
7. Create the database.
8. Run migrations and seed the database:
   ```bash
   php artisan migrate:fresh --seed
9. Serve the application:
    ```bash
   php artisan serve
10. Access the application at:
   http://127.0.0.1:8000






   



