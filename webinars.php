<?php
// This variable is used to store any messages that result from form submissions (newsletter, sign-up, or webinar registration)
$message = '';

// Here we check if a language parameter is passed in the URL, defaulting to English otherwise
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

// We handle all POST submissions on this page, including webinar registration, newsletter subscription, or modal sign-ups
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // If there's a "form_type" field indicating a webinar registration, we process it here
    if (isset($_POST['form_type']) && $_POST['form_type'] === 'webinar_registration') {
        // We retrieve the name, company, and email from the posted form
        $reg_name    = trim($_POST['reg_name']);
        $reg_company = trim($_POST['reg_company']);
        $reg_email   = trim($_POST['reg_email']);
        // We verify that all required fields are filled and the email is valid
        if (empty($reg_name) || empty($reg_company) || empty($reg_email)) {
            // If anything is empty, we show an error message in the correct language
            $message = $lang === 'es' ? 'Por favor, complete todos los campos.' : 'Please fill in all fields.';
        } elseif (!filter_var($reg_email, FILTER_VALIDATE_EMAIL)) {
            // If the email format is invalid, we also display an error message
            $message = $lang === 'es' ? 'Por favor, ingrese un correo válido.' : 'Please enter a valid email.';
        } else {
            // If everything is good, we display a success message (pretending we saved the data or sent an email)
            $message = $lang === 'es' ? 'Su registro se ha completado con éxito.' : 'Your registration has been completed successfully.';
        }
    }
    // Otherwise, if we have an email without a name, it's likely a newsletter subscription
    elseif (isset($_POST['email']) && !isset($_POST['name'])) {
        // We take the email from the newsletter form
        $email = $_POST['email'];
        // We check if it is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = $lang === 'es' ? '¡Suscripción exitosa!' : 'Subscribed successfully!';
        } else {
            $message = $lang === 'es' ? 'Por favor, ingresa un correo válido.' : 'Please enter a valid email.';
        }
    }
    // If the form includes both name and email, it is probably the sign-up modal
    elseif (isset($_POST['name']) && isset($_POST['email'])) {
        // We capture the name and email
        $name = $_POST['name'];
        $email = $_POST['email'];
        // Validate the fields and email format
        if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = $lang === 'es' ? "¡Registro exitoso, $name!" : "Signed up successfully, $name!";
        } else {
            $message = $lang === 'es' ? 'Por favor, completa todos los campos correctamente.' : 'Please fill in all fields correctly.';
        }
    }
}

// Below we define an array that holds translations for English and Spanish text used across this page
$translations = [
    'en' => [
        'title' => 'Creative Hub',
        'nav_home' => 'Home',
        'nav_about' => 'About',
        'nav_create' => 'Create',
        'webinars_page_title' => 'Webinars',
        'webinars_intro_title' => 'Upcoming Webinars',
        'webinars_intro_text' => 'Join our live webinars to learn more about the latest trends in design, innovative technologies, and collaborative workflows. Our upcoming sessions are designed to provide valuable insights and practical tips to help you elevate your creative projects.',
        'webinar_date' => 'Date',
        'webinar_topic' => 'Topic',
        'webinar_location' => 'Location',
        'webinar_action' => 'Action',
        'webinar_1_date' => 'June 15, 2025',
        'webinar_1_topic' => 'The Future of AI in Design',
        'webinar_1_location' => 'On-site at Creative Hub HQ',
        'webinar_2_date' => 'July 20, 2025',
        'webinar_2_topic' => 'Collaborative Design: Best Practices',
        'webinar_2_location' => 'Online Webinar',
        'webinar_3_date' => 'August 10, 2025',
        'webinar_3_topic' => 'Streamlining Your Workflow with Creative Hub',
        'webinar_3_location' => 'On-site & Online',
        'webinar_reg_title' => 'Webinar Registration',
        'webinar_reg_name' => 'Name',
        'webinar_reg_company' => 'Company',
        'webinar_reg_email' => 'Email',
        'webinar_reg_placeholder_name' => 'Enter your name',
        'webinar_reg_placeholder_company' => 'Enter your company',
        'webinar_reg_placeholder_email' => 'Enter your email',
        'webinar_reg_submit' => 'Register',
        'footer_subscribe' => 'Subscribe to our newsletter',
        'footer_email_placeholder' => 'Enter your email',
        'footer_subscribe_button' => 'Subscribe',
        'footer_product' => 'Product',
        'footer_plans' => 'Plans & Pricing',
        'footer_features' => 'Features',
        'footer_photos' => 'Photos',
        'footer_resources' => 'Resources',
        'footer_blog' => 'Blog',
        'footer_guides' => 'User guides',
        'footer_webinars' => 'Webinars',
        'footer_company' => 'Company',
        'footer_about_us' => 'About',
        'footer_contact' => 'Contact',
        'footer_privacy' => 'Privacy',
        'footer_terms' => 'Terms',
        'modal_title' => 'Sign Up',
        'modal_name' => 'Name',
        'modal_email' => 'Email',
        'modal_button' => 'Sign Up'
    ],
    'es' => [
        'title' => 'Creative Hub - Español',
        'nav_home' => 'Inicio',
        'nav_about' => 'Acerca de',
        'nav_create' => 'Crear',
        'webinars_page_title' => 'Webinars',
        'webinars_intro_title' => 'Próximos Webinars',
        'webinars_intro_text' => 'Únase a nuestros webinars en vivo para conocer las últimas tendencias en diseño, tecnologías innovadoras y flujos de trabajo colaborativos. Nuestras sesiones están diseñadas para ofrecerle valiosos conocimientos y consejos prácticos que le ayudarán a elevar sus proyectos creativos.',
        'webinar_date' => 'Fecha',
        'webinar_topic' => 'Tema',
        'webinar_location' => 'Ubicación',
        'webinar_action' => 'Acción',
        'webinar_1_date' => '15 de Junio, 2025',
        'webinar_1_topic' => 'El Futuro de la IA en el Diseño',
        'webinar_1_location' => 'Presencial en la Sede de Creative Hub',
        'webinar_2_date' => '20 de Julio, 2025',
        'webinar_2_topic' => 'Diseño Colaborativo: Mejores Prácticas',
        'webinar_2_location' => 'Online',
        'webinar_3_date' => '10 de Agosto, 2025',
        'webinar_3_topic' => 'Optimiza tu Flujo de Trabajo con Creative Hub',
        'webinar_3_location' => 'Presencial y Online',
        'webinar_reg_title' => 'Registro al Webinar',
        'webinar_reg_name' => 'Nombre',
        'webinar_reg_company' => 'Compañía',
        'webinar_reg_email' => 'Correo Electrónico',
        'webinar_reg_placeholder_name' => 'Ingrese su nombre',
        'webinar_reg_placeholder_company' => 'Ingrese su compañía',
        'webinar_reg_placeholder_email' => 'Ingrese su correo',
        'webinar_reg_submit' => 'Registrar',
        'footer_subscribe' => 'Suscríbete a nuestro boletín',
        'footer_email_placeholder' => 'Ingresa tu correo',
        'footer_subscribe_button' => 'Suscribirse',
        'footer_product' => 'Producto',
        'footer_plans' => 'Planes y Precios',
        'footer_features' => 'Características',
        'footer_photos' => 'Fotos',
        'footer_resources' => 'Recursos',
        'footer_blog' => 'Blog',
        'footer_guides' => 'Guías de usuario',
        'footer_webinars' => 'Webinars',
        'footer_company' => 'Compañía',
        'footer_about_us' => 'Sobre nosotros',
        'footer_contact' => 'Contácto',
        'footer_privacy' => 'Privacidad',
        'footer_terms' => 'Términos',
        'modal_title' => 'Regístrate',
        'modal_name' => 'Nombre',
        'modal_email' => 'Correo',
        'modal_button' => 'Regístrate'
    ]
];

// We assign the selected translation array to $t based on $lang
$t = $translations[$lang];

// Here we define a list of upcoming webinars, using the translations for date, topic, and location
$webinars = [
    [
        'date' => $t['webinar_1_date'],
        'topic' => $t['webinar_1_topic'],
        'location' => $t['webinar_1_location']
    ],
    [
        'date' => $t['webinar_2_date'],
        'topic' => $t['webinar_2_topic'],
        'location' => $t['webinar_2_location']
    ],
    [
        'date' => $t['webinar_3_date'],
        'topic' => $t['webinar_3_topic'],
        'location' => $t['webinar_3_location']
    ]
];
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <!-- Setting up charset and viewport for responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- The page title combines the site title with the Webinars section -->
    <title><?php echo $t['title']; ?> - <?php echo $t['webinars_page_title']; ?></title>
    <style>
        /* Resetting margins and paddings, and using a common font */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        /* Overall background color for the site */
        body {
            background-color: #f8f9fa;
        }
        /* Navigation bar style: logo on the left and links on the right */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
            background-color: white;
        }
        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        .nav-links a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s ease;
        }
        .nav-links a:hover {
            color: #007bff;
        }
        .language-selector {
            margin-left: 1rem;
            padding-left: 1.5rem;
            border-left: 1px solid #ddd;
        }
        .language-selector select {
            padding: 0.3rem 0.8rem;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: transparent;
            color: #666;
            font-size: 0.95rem;
            cursor: pointer;
        }
        /* Intro section for the Webinars page */
        .webinars-intro {
            padding: 4rem 5%;
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
            background-color: #fff;
        }
        .webinars-intro h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #333;
        }
        .webinars-intro p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 3rem;
            line-height: 1.6;
        }
        /* A table layout for displaying webinar details with an action button */
        .webinars-list {
            padding: 2rem 5%;
            max-width: 900px;
            margin: 0 auto;
            background-color: #f1f1f1;
            border-radius: 8px;
            overflow-x: auto; /* This allows horizontal scrolling if the table is too wide */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 1rem;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #fff;
        }
        /* The "Register" button in the Action column */
        .register-btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #e67e22;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s ease;
        }
        .register-btn:hover {
            background-color: #007bff;
        }
        /* Styling for the page footer */
        footer {
            background-color: #333;
            color: white;
            padding: 4rem 5%;
        }
        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-bottom: 2rem;
        }
        footer h4 {
            margin-bottom: 1.5rem;
        }
        footer ul {
            list-style: none;
            padding: 0;
        }
        footer ul li {
            margin-bottom: 0.8rem;
        }
        .footer-link {
            color: white;
            text-decoration: none;
        }
        .footer-link:hover {
            text-decoration: none;
        }
        .footer-bottom {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 3rem;
        }
        .footer-bottom p {
            margin: 0;
        }
        .newsletter input[type="email"] {
            padding: 0.8rem;
            width: 70%;
            margin-bottom: 1rem;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .newsletter button {
            padding: 0.8rem 1.5rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        /* Modal style (shared with other pages) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            width: 400px;
            position: relative;
        }
        .modal-content h2 {
            margin-bottom: 1.5rem;
        }
        .modal-content form {
            display: flex;
            flex-direction: column;
        }
        .modal-content input,
        .modal-content textarea {
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .modal-content textarea {
            resize: vertical;
            min-height: 80px;
        }
        .modal-content button {
            padding: 0.8rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .modal-content button:hover {
            background-color: #e67e22;
        }
        .modal-content .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
        }
        .highlight {
            font-weight: bold;
            color: purple;
        }
    </style>
</head>
<body>
    <!-- Navigation area: includes site logo, main links, and a language selector -->
    <nav aria-label="Main Navigation">
        <div class="logo">Creative Hub</div>
        <div class="nav-links">
            <a href="index.php?lang=<?php echo $lang; ?>" aria-label="Go to Home page"><?php echo $t['nav_home']; ?></a>
            <a href="about.php?lang=<?php echo $lang; ?>" aria-label="Learn about us"><?php echo $t['nav_about']; ?></a>
            <a href="#" class="try-now-button" aria-label="Begin creating a design"><?php echo $t['nav_create']; ?></a>
            <div class="language-selector" aria-label="Language selector">
                <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <select name="lang" onchange="this.form.submit()" aria-label="Choose language">
                        <option value="en" <?php echo $lang === 'en' ? 'selected' : ''; ?>>EN</option>
                        <option value="es" <?php echo $lang === 'es' ? 'selected' : ''; ?>>ES</option>
                    </select>
                </form>
            </div>
        </div>
    </nav>

    <!-- Intro section describing the upcoming webinars -->
    <section class="webinars-intro" aria-label="Webinars Intro Section">
        <h1><?php echo $t['webinars_page_title']; ?></h1>
        <p><?php echo $t['webinars_intro_text']; ?></p>
    </section>

    <!-- Main section showing a table of webinars with a "Register" action if it's online -->
    <section class="webinars-list" aria-label="Upcoming Webinars List">
        <table>
            <thead>
                <tr>
                    <th><?php echo $t['webinar_date']; ?></th>
                    <th><?php echo $t['webinar_topic']; ?></th>
                    <th><?php echo $t['webinar_location']; ?></th>
                    <th><?php echo $t['webinar_action']; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($webinars as $webinar): ?>
                <tr>
                    <td><?php echo htmlspecialchars($webinar['date']); ?></td>
                    <td><?php echo htmlspecialchars($webinar['topic']); ?></td>
                    <td><?php echo htmlspecialchars($webinar['location']); ?></td>
                    <td>
                        <?php
                        // Check if "Online" is found in the location (ignoring case)
                        if (stripos($webinar['location'], 'Online') !== false) {
                            // Show a register button which opens the webinar registration modal
                            echo '<a href="#" class="register-btn" data-topic="'.htmlspecialchars($webinar['topic']).'" aria-label="Register for the webinar">'.'Register</a>';
                        } else {
                            // Otherwise, we show a dash if it is not an online event
                            echo '-';
                        }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Footer with newsletter subscription and various site links -->
    <footer aria-label="Site Footer">
        <div class="footer-content">
            <div class="newsletter">
                <h4><?php echo $t['footer_subscribe']; ?></h4>
                <!-- The form for subscribing to the newsletter, staying on the same page with the correct language -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?lang='.$lang; ?>">
                    <input type="email" name="email" placeholder="<?php echo $t['footer_email_placeholder']; ?>" required aria-label="Email for newsletter subscription">
                    <button type="submit" aria-label="Subscribe to newsletter"><?php echo $t['footer_subscribe_button']; ?></button>
                </form>
                <?php 
                // If there's a $message and it's not coming from the webinar registration form, we show it here
                if (!empty($message) && (!isset($_POST['form_type']) || $_POST['form_type'] !== 'webinar_registration')): ?>
                    <p style="color: <?php echo (strpos($message, 'Subscribed') !== false || strpos($message, 'Suscripción') !== false || strpos($message, 'Registro') !== false) ? 'green' : 'red'; ?>;">
                        <?php echo $message; ?>
                    </p>
                <?php endif; ?>
            </div>
            <div>
                <h4><?php echo $t['footer_product']; ?></h4>
                <ul>
                    <li><a href="plans.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="Go to plans and pricing"><?php echo $t['footer_plans']; ?></a></li>
                    <li><a href="features.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="Learn about features"><?php echo $t['footer_features']; ?></a></li>
                </ul>
            </div>
            <div>
                <h4><?php echo $t['footer_resources']; ?></h4>
                <ul>
                    <li><a href="guides.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="View user guides"><?php echo $t['footer_guides']; ?></a></li>
                    <li><a href="webinars.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="View webinars"><?php echo $t['footer_webinars']; ?></a></li>
                </ul>
            </div>
            <div>
                <h4><?php echo $t['footer_company']; ?></h4>
                <ul>
                    <li><a href="about.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="About our company"><?php echo $t['footer_about_us']; ?></a></li>
                    <li><a href="#" class="footer-link contact" aria-label="Contact us"><?php echo $t['footer_contact']; ?></a></li>
                    <li><a href="privacy.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="Privacy policy"><?php echo $t['footer_privacy']; ?></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <!-- Display copyright information -->
            <p><?php echo $t['footer_copyright']; ?></p>
        </div>
    </footer>

    <!-- Sign Up Modal (used for user sign-ups across pages) -->
    <div id="signup-modal" class="modal" role="dialog" aria-label="Sign Up Modal">
        <div class="modal-content">
            <span class="close" aria-label="Close sign up modal">×</span>
            <h2><?php echo $t['modal_title']; ?></h2>
            <!-- We post to this same page, including the "lang" parameter to preserve language selection -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?lang='.$lang; ?>">
                <input type="text" name="name" placeholder="<?php echo $t['modal_name']; ?>" required aria-label="Your name">
                <input type="email" name="email" placeholder="<?php echo $t['modal_email']; ?>" required aria-label="Your email">
                <button type="submit" aria-label="Submit sign up"><?php echo $t['modal_button']; ?></button>
            </form>
            <?php if (!empty($message) && (!isset($_POST['form_type']) || $_POST['form_type'] !== 'webinar_registration')): ?>
                <!-- We only show sign-up or newsletter messages here if it's not from the webinar form -->
                <p style="color: <?php echo (strpos($message, 'Signed up') !== false || strpos($message, 'Registro') !== false) ? 'green' : 'red'; ?>;">
                    <?php echo $message; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Contact Modal is a simpler form with no data submission, just contact info -->
    <div id="contact-modal" class="modal" role="dialog" aria-label="Contact Modal">
        <div class="modal-content">
            <span class="close" aria-label="Close contact modal">&times;</span>
            <h2><?php echo $lang === 'es' ? 'Contácto' : 'Contact'; ?></h2>
            <p>✉️: <a href="mailto:miroslav.n@students.opit.com" aria-label="Email miroslav.n@students.opit.com">miroslav.n@students.opit.com</a></p>
            <p>📞: +1-555-123-4567</p>
        </div>
    </div>

    <!-- The Webinar Registration Modal, which remains open on submission to display success/error messages -->
    <div id="webinar-reg-modal" class="modal" role="dialog" aria-label="Webinar Registration Modal" <?php if(isset($_POST['form_type']) && $_POST['form_type'] === 'webinar_registration') echo 'style="display: flex;"'; ?>>
        <div class="modal-content">
            <span class="close" aria-label="Close webinar registration">&times;</span>
            <h2><?php echo $lang === 'es' ? 'Registro al Webinar' : 'Webinar Registration'; ?></h2>
            <!-- This form is posted with a hidden form_type to identify webinar submissions -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?lang='.$lang; ?>">
                <input type="hidden" name="form_type" value="webinar_registration" aria-label="Hidden field specifying webinar registration">
                <input type="text" name="reg_name" placeholder="<?php echo $lang === 'es' ? 'Ingrese su nombre' : 'Enter your name'; ?>" required aria-label="Your name">
                <input type="text" name="reg_company" placeholder="<?php echo $lang === 'es' ? 'Ingrese su compañía' : 'Enter your company'; ?>" required aria-label="Your company">
                <input type="email" name="reg_email" placeholder="<?php echo $lang === 'es' ? 'Ingrese su correo' : 'Enter your email'; ?>" required aria-label="Your email">
                <button type="submit" aria-label="Register for webinar"><?php echo $lang === 'es' ? 'Registrar' : 'Register'; ?></button>
            </form>
            <?php if (!empty($message) && isset($_POST['form_type']) && $_POST['form_type'] === 'webinar_registration'): ?>
                <!-- Display the webinar registration message in green if success, otherwise red -->
                <p style="color: <?php echo (strpos($message, 'successfully') !== false || strpos($message, 'éxito') !== false) ? 'green' : 'red'; ?>; margin-top: 1rem;">
                    <?php echo $message; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Our main script file handles general modal logic. We add inline code to connect the 'Register' buttons with the modal. -->
    <script src="script.js"></script>
    <script>
        // Select all elements with class 'register-btn' and attach a click handler to open the webinar registration modal
        document.querySelectorAll('.register-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                // Show the modal
                document.getElementById('webinar-reg-modal').style.display = 'flex';
            });
        });

        // The close button on the webinar modal hides it when clicked
        document.querySelectorAll('#webinar-reg-modal .close').forEach(function(closeBtn) {
            closeBtn.addEventListener('click', function() {
                document.getElementById('webinar-reg-modal').style.display = 'none';
            });
        });
    </script>
</body>
</html>