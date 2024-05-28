<h2>A Model-View-Controller (MVC) framework<br/> developed using PHP.</h2>
<a class="btn btn-primary mt-3" href="https://github.com/theshawa/php-mvc-framework.git" target="_blank">View Project on
    Github</a>

<h3 class="mt-5">Features</h3>

<div class="accordion mt-4" id="accordionFeatures">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                1. Routing System
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Define routes easily with the <code>core\Router</code> class.</p>
                <p>Supports HTTP methods like GET, POST, etc.</p>
            </div>
        </div>
    </div>

    <!-- 2. Middleware Support -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                2. Middleware Support
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Apply middleware to routes for executing code before route handlers.</p>
            </div>
        </div>
    </div>

    <!-- 3. Database Interaction -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                3. Database Interaction
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Interact with the database using the <code>core\Database</code> class.</p>
                <p>Execute SQL queries and use PDO for database operations.</p>
            </div>
        </div>
    </div>
    <!-- 4. Session Management -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                4. Session Management
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Manage session data and flash messages with the <code>core\Session</code> class.</p>
            </div>
        </div>
    </div>

    <!-- 5. Model-View-Controller (MVC) Architecture -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                5. Model-View-Controller (MVC) Architecture
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Follows the MVC pattern for structured development.</p>
                <p>Base classes for controllers (<code>core\Controller</code>) and models (<code>core\model\Model</code>).
                </p>
            </div>
        </div>
    </div>

    <!-- 6. Model Validation -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                6. Model Validation
            </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Define validation rules for model attributes using the <code>core\model\rule\Rule</code> class.</p>
            </div>
        </div>
    </div>

    <!-- 7. Migration System -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingSeven">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                7. Migration System
            </button>
        </h2>
        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Manage database schema changes efficiently with the migration system.</p>
                <p>Define migrations as classes implementing the <code>core\migration\Migration</code> interface.</p>
            </div>
        </div>
    </div>

    <!-- 8. Error Handling -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingEight">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                8. Error Handling
            </button>
        </h2>
        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Handles exceptions and renders HTTP error responses for robustness.</p>
            </div>
        </div>
    </div>

    <!-- 9. Session Flash Messages -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingNine">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                9. Session Flash Messages
            </button>
        </h2>
        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Set and retrieve flash messages using the <code>core\Session</code> class.</p>
            </div>
        </div>
    </div>

    <!-- 10. Configuration Management -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTen">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                10. Configuration Management
            </button>
        </h2>
        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Manage configuration settings in the <code>/config</code> directory.</p>
                <p>Define database credentials, environment variables, and global configurations.</p>
            </div>
        </div>
    </div>

    <!-- 11. Environment Configuration -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingEleven">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                11. Environment Configuration
            </button>
        </h2>
        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Supports environment-specific configurations via the <code>.env</code> file.</p>
            </div>
        </div>
    </div>

    <!-- 12. Global Configuration -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwelve">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                12. Global Configuration
            </button>
        </h2>
        <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Add global configurations by creating new files in the <code>/config</code> directory.</p>
            </div>
        </div>
    </div>

    <!-- 13. Template Rendering -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThirteen">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                13. Template Rendering
            </button>
        </h2>
        <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Render views using templates with the <code>core\Response</code> class.</p>
                <p>Set the layout and error views for consistent rendering.</p>
            </div>
        </div>
    </div>


    <!-- 14. Custom Data Injection -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFourteen">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                14. Custom Data Injection
            </button>
        </h2>
        <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen"
             data-bs-parent="#accordionFeatures">
            <div class="accordion-body">
                <p>Inject custom data into views for dynamic content rendering.</p>
                <p>Pass data to views when rendering using the <code>Response->render()</code> method.</p>
            </div>
        </div>
    </div>
</div>


<h3 class="mt-5">Bug Report</h3>
<ul>
    <li>To report a bug or issue, please create a new issue on the project's GitHub repository.
    </li>
    <li>Include detailed steps to reproduce the issue and any relevant information about your environment.
    </li>
    <li>Your contributions to improving the framework are highly appreciated!</li>
</ul>


