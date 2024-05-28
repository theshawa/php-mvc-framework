# Running the Sample Application at `/src`

1. **Clone or Download the Repository:**
    - If you haven't already, clone or download the repository containing the MVC framework and sample application to
      your local machine.

2. **Navigate to the `src` Directory:**
    - Open your command line interface (CLI) or terminal.
    - Use the `cd` command to navigate to the `src` directory of the cloned repository.

3. **Set Up the Database:**
    - Ensure that you have a compatible database server (e.g., MySQL, SQLite) installed and running on your local
      machine.
    - Update the database configuration settings in the `/config/database.php` file if necessary, including the DSN,
      username, and password.

4. **Run Migrations:**
    - Execute the migration files to set up the database schema for the sample application.
    - Run the migrations using the following command:
      ```bash
      php migration.php migrate
      ```

5. **Start the PHP Development Server:**
    - Start the PHP development server to run the sample application.
    - Use the following command to start the server:
      ```bash
      php -S localhost:8000
      ```

6. **Access the Sample Application:**
    - Open your web browser and navigate to `http://localhost:8000` to access the sample application.
    - You should see the homepage or landing page of the sample application, depending on its configuration.

7. **Explore the Application:**
    - Explore the different routes and functionalities provided by the sample application.
    - Test various features, such as user registration, login, profile management, etc.

8. **Modify and Customize:**
    - Feel free to modify and customize the sample application to fit your requirements.
    - Update the controllers, models, views, and routes as needed to build your own web application using the MVC
      framework.
