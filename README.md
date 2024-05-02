# Task Management Web Application

This is a simple web application built using Laravel for task management. Users can create tasks, edit tasks, delete tasks, and reorder tasks using drag and drop functionality in the browser. Tasks are saved to a MySQL database, and priorities are automatically updated based on their order.

## Features

- Create task: Users can create a new task by providing a task name, priority, and project.
- Edit task: Users can edit existing tasks, including changing the task name, priority, and project.
- Delete task: Users can delete tasks from the task list.
- Reorder tasks: Users can reorder tasks using drag and drop functionality. Task priorities are automatically updated based on their order.
- Project functionality: Users can associate tasks with projects and filter tasks by project.

## Setup and Deployment

1. Clone the repository:
``` git@github.com:emeka-osuagwu/task-application.git ```

2. Install dependencies:
``` compoer install ```

3. Configure the database connection in the `.env` file.
```
DB_CONNECTION=sqlite
```

4. Run migrations to create the necessary tables:

```
php artisan migrate:refresh
```

5. Required, seed the database with sample data:

```
php artisan db:seed --class=TaskSeeder
php artisan db:seed --class=ProjectSeeder
```

7. Serve the application:
```
php artisan serve
```

8. Access the application in your web browser at `http://localhost:8000`.

## Usage

- Navigate to the homepage to view the list of tasks.
- Use the "Create Task" button to add a new task.
- Click on the "Edit" button next to a task to edit it.
- Use drag and drop functionality to reorder tasks.
- Delete a task by clicking on the "Delete" button next to it.

## Technologies Used

- Laravel
- Sqlite
- Bootstrap (for styling)
- Sortable.js (for drag and drop functionality)
