# MVC Framework

## Overview

A Model-View-Controller (MVC) framework developed using PHP.

## Documentation

[Here](./docs/index.md).

## Key Features

### 1. Routing System

- Define routes easily with the `core\Router` class.
- Supports HTTP methods like GET, POST, etc.

### 2. Middleware Support

- Apply middleware to routes for executing code before/after route handlers.

### 3. Database Interaction

- Interact with the database using the `core\Database` class.
- Execute SQL queries and use PDO for database operations.

### 4. Session Management

- Manage session data and flash messages with the `core\Session` class.

### 5. Model-View-Controller (MVC) Architecture

- Follows the MVC pattern for structured development.
- Base classes for controllers (`core\Controller`) and models (`core\model\Model`).

### 6. Model Validation

- Define validation rules for model attributes using the `core\model\rule\Rule` class.

### 7. Migration System

- Manage database schema changes efficiently with the migration system.
- Define migrations as classes implementing the `core\migration\Migration` interface.

### 8. Error Handling

- Handles exceptions and renders HTTP error responses for robustness.

### 9. Session Flash Messages

- Set and retrieve flash messages using the `core\Session` class.

### 10. Configuration Management

- Manage configuration settings in the `/config` directory.
- Define database credentials, environment variables, and global configurations.

### 11. Environment Configuration

- Supports environment-specific configurations via the `.env` file.

### 12. Global Configuration

- Add global configurations by creating new files in the `/config` directory.

### 13. Template Rendering

- Render views using templates with the `core\Response` class.
- Set the layout and error views for consistent rendering.

### 14. Custom Data Injection

- Inject custom data into views for dynamic content rendering.
- Pass data to views when rendering using the `Response->render()` method.

## Sample Application at `/src`

- A sample application is already implemented using this framework.
- Check the guide [here](./sample-application.md).

## Bug Report

- To report a bug or issue, please create a new issue on the project's GitHub repository.
- Include detailed steps to reproduce the issue and any relevant information about your environment.
- Your contributions to improving the framework are highly appreciated!

## Developed by [Theshawa Dasun](https://theshawa-dev.web.app).