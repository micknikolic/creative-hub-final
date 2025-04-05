<?php
// This variable holds any feedback messages that appear after form submissions
$message = '';

// Here, we decide which language to display based on a "lang" parameter in the URL or default to English
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

// This part checks if any form has been submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // If we receive only an email (and no name), it's a newsletter subscription
    if (isset($_POST['email']) && !isset($_POST['name'])) {
        // Capture the email from the form
        $email = $_POST['email'];
        // Validate that the submitted email is properly formatted
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // If valid, show a subscription success message
            $message = $lang === 'es' ? '¡Suscripción exitosa!' : 'Subscribed successfully!';
        } else {
            // Otherwise, ask for a valid email
            $message = $lang === 'es' ? 'Por favor, ingresa un correo válido.' : 'Please enter a valid email.';
        }
    }
    // If both name and email are present, it's the sign-up form
    elseif (isset($_POST['name']) && isset($_POST['email'])) {
        // Retrieve name and email from the request
        $name = $_POST['name'];
        $email = $_POST['email'];
        // Check that the name is not empty and email is valid
        if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Display a success message if everything is correct
            $message = $lang === 'es' ? "¡Registro exitoso, $name!" : "Signed up successfully, $name!";
        } else {
            // Otherwise, prompt the user to fill all fields correctly
            $message = $lang === 'es' ? 'Por favor, completa todos los campos correctamente.' : 'Please fill in all fields correctly.';
        }
    }
}

// This array stores translations for both English and Spanish content
$translations = [
    'en' => [
        'title' => 'Creative Hub',
        'nav_home' => 'Home',
        'nav_about' => 'About',
        'nav_create' => 'Create',
        'guides_page_title' => 'User Guides',
        'guides_intro_title' => 'Empowering Your Creative Journey',
        'guides_intro_text' => 'Welcome to the Creative Hub User Guides. Here you will find comprehensive instructions, tips, and best practices to help you get the most out of our innovative design tools and collaborative platform. Whether you are just getting started or looking to deepen your expertise, our guides are designed to empower your creative process.',
        'guide_1_title' => 'Getting Started with Creative Hub',
        'guide_1_desc' => 'Learn the basics of setting up your account, navigating our platform, and exploring essential features to kickstart your creative projects.',
        'guide_2_title' => 'Mastering the AI-Powered Design Tools',
        'guide_2_desc' => 'Discover how to utilize our AI-based collaborator and design templates to streamline your design workflow and achieve professional results.',
        'guide_3_title' => 'Effective Project Collaboration',
        'guide_3_desc' => 'Explore strategies for successful teamwork and learn how to use our collaboration tools to communicate, share, and manage projects seamlessly.',
        'guide_4_title' => 'Advanced Tips and Best Practices',
        'guide_4_desc' => 'Deep dive into advanced techniques and expert insights that will help you refine your design skills and boost productivity.',
        'coming_soon' => 'Coming soon',
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
        'footer_copyright' => '© 2025 Creative Hub by Miroslav Nikolic',
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
        'guides_page_title' => 'Guías de Usuario',
        'guides_intro_title' => 'Potenciando Tu Trayectoria Creativa',
        'guides_intro_text' => 'Bienvenido a las Guías de Usuario de Creative Hub. Aquí encontrarás instrucciones completas, consejos y mejores prácticas para aprovechar al máximo nuestras innovadoras herramientas de diseño y plataforma colaborativa. Ya sea que estés comenzando o desees profundizar tus conocimientos, nuestras guías están diseñadas para potenciar tu proceso creativo.',
        'guide_1_title' => 'Comenzando con Creative Hub',
        'guide_1_desc' => 'Aprende lo básico para configurar tu cuenta, navegar por nuestra plataforma y explorar las funciones esenciales para iniciar tus proyectos creativos.',
        'guide_2_title' => 'Dominando las Herramientas de Diseño con IA',
        'guide_2_desc' => 'Descubre cómo utilizar nuestro colaborador basado en IA y las plantillas de diseño para optimizar tu flujo de trabajo y obtener resultados profesionales.',
        'guide_3_title' => 'Colaboración Efectiva en Proyectos',
        'guide_3_desc' => 'Explora estrategias para el trabajo en equipo exitoso y aprende a utilizar nuestras herramientas de colaboración para comunicarte, compartir y gestionar proyectos sin esfuerzo.',
        'guide_4_title' => 'Consejos Avanzados y Mejores Prácticas',
        'guide_4_desc' => 'Profundiza en técnicas avanzadas y conocimientos de expertos que te ayudarán a perfeccionar tus habilidades de diseño y aumentar la productividad.',
        'coming_soon' => 'Próximamente',
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
        'footer_copyright' => '© 2025 Creative Hub por Miroslav Nikolic',
        'modal_title' => 'Regístrate',
        'modal_name' => 'Nombre',
        'modal_email' => 'Correo',
        'modal_button' => 'Regístrate'
    ]
];

// We select the translations based on the current language
$t = $translations[$lang];
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <!-- Meta tags for character encoding and mobile responsiveness -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page title includes the site's main title and the Guides section -->
    <title><?php echo $t['title']; ?> - <?php echo $t['guides_page_title']; ?></title>
    <style>
        /* Reset some default styles and apply a common font */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        /* Basic background color for the entire page */
        body {
            background-color: #f8f9fa;
        }
        /* Navigation area styles for consistency */
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
        /* Intro section for the Guides page with background color and text centering */
        .guides-intro {
            padding: 4rem 5%;
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
            background-color: #fff;
        }
        .guides-intro h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #333;
        }
        .guides-intro p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 3rem;
            line-height: 1.6;
        }
        /* Section displaying the list of guide items in styled cards */
        .guides-list {
            padding: 2rem 5%;
            max-width: 900px;
            margin: 0 auto;
            background-color: #f1f1f1;
        }
        .guide-item {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        /* Title row to show guide title and a 'coming soon' label */
        .guide-title-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .guide-title-row h2 {
            font-size: 1.8rem;
            color: #007bff;
            margin-bottom: 0.8rem;
        }
        .coming-soon-badge {
            background-color: #ffc107;
            color: #333;
            padding: 0.3rem 0.6rem;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: bold;
            margin-left: 1rem;
            white-space: nowrap;
        }
        .guide-item p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
        }
        /* Footer section styling, consistent with other pages */
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
        /* Modal styling used for sign-up and contact forms */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
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
    <!-- ARIA label for main navigation of the Guides page -->
    <nav aria-label="Main Navigation">
        <div class="logo">Creative Hub</div>
        <div class="nav-links">
            <!-- ARIA label to clarify the Home link's purpose -->
            <a href="index.php?lang=<?php echo $lang; ?>" aria-label="Go to Home page"><?php echo $t['nav_home']; ?></a>
            <!-- ARIA label for the About link to let screen readers know this goes to about page -->
            <a href="about.php?lang=<?php echo $lang; ?>" aria-label="Learn about us"><?php echo $t['nav_about']; ?></a>
            <!-- ARIA label for the Create link to provide clarity about its action -->
            <a href="#" class="try-now-button" aria-label="Try creating a design"><?php echo $t['nav_create']; ?></a>
            <!-- ARIA label for language selector to help identify its function -->
            <div class="language-selector" aria-label="Language selection">
                <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <select name="lang" onchange="this.form.submit()" aria-label="Choose language">
                        <option value="en" <?php echo $lang === 'en' ? 'selected' : ''; ?>>EN</option>
                        <option value="es" <?php echo $lang === 'es' ? 'selected' : ''; ?>>ES</option>
                    </select>
                </form>
            </div>
        </div>
    </nav>

    <!-- Intro area describing what the user guides page offers -->
    <section class="guides-intro" aria-label="Guides Intro Section">
        <h1><?php echo $t['guides_page_title']; ?></h1>
        <p><?php echo $t['guides_intro_text']; ?></p>
    </section>

    <!-- Main list of guide items, each marked as "Coming soon" -->
    <section class="guides-list" aria-label="List of User Guides">
        <div class="guide-item" aria-label="Guide 1 Card">
            <div class="guide-title-row">
                <h2><?php echo $t['guide_1_title']; ?></h2>
                <span class="coming-soon-badge"><?php echo $t['coming_soon']; ?></span>
            </div>
            <p><?php echo $t['guide_1_desc']; ?></p>
        </div>
        <div class="guide-item" aria-label="Guide 2 Card">
            <div class="guide-title-row">
                <h2><?php echo $t['guide_2_title']; ?></h2>
                <span class="coming-soon-badge"><?php echo $t['coming_soon']; ?></span>
            </div>
            <p><?php echo $t['guide_2_desc']; ?></p>
        </div>
        <div class="guide-item" aria-label="Guide 3 Card">
            <div class="guide-title-row">
                <h2><?php echo $t['guide_3_title']; ?></h2>
                <span class="coming-soon-badge"><?php echo $t['coming_soon']; ?></span>
            </div>
            <p><?php echo $t['guide_3_desc']; ?></p>
        </div>
        <div class="guide-item" aria-label="Guide 4 Card">
            <div class="guide-title-row">
                <h2><?php echo $t['guide_4_title']; ?></h2>
                <span class="coming-soon-badge"><?php echo $t['coming_soon']; ?></span>
            </div>
            <p><?php echo $t['guide_4_desc']; ?></p>
        </div>
    </section>

    <!-- Standard footer used across the site, including newsletter subscription and links -->
    <footer aria-label="Site Footer">
        <div class="footer-content">
            <div class="newsletter">
                <h4><?php echo $t['footer_subscribe']; ?></h4>
                <!-- Newsletter subscription form posts back to the page with the selected language -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?lang=' . $lang; ?>">
                    <input type="email" name="email" placeholder="<?php echo $t['footer_email_placeholder']; ?>" required aria-label="Your email for newsletter">
                    <button type="submit" aria-label="Subscribe to newsletter"><?php echo $t['footer_subscribe_button']; ?></button>
                </form>
                <!-- If there is a message, we show it in green for success or red for errors -->
                <?php if (!empty($message)): ?>
                    <p style="color: <?php echo (strpos($message, 'Subscribed') !== false || strpos($message, 'Suscripción') !== false || strpos($message, 'Registro') !== false) ? 'green' : 'red'; ?>;">
                        <?php echo $message; ?>
                    </p>
                <?php endif; ?>
            </div>
            <div>
                <h4><?php echo $t['footer_product']; ?></h4>
                <ul>
                    <li><a href="plans.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="Plans and pricing"><?php echo $t['footer_plans']; ?></a></li>
                    <li><a href="features.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="Explore product features"><?php echo $t['footer_features']; ?></a></li>
                </ul>
            </div>
            <div>
                <h4><?php echo $t['footer_resources']; ?></h4>
                <ul>
                    <li><a href="guides.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="User Guides link"><?php echo $t['footer_guides']; ?></a></li>
                    <li><a href="webinars.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="Join webinars"><?php echo $t['footer_webinars']; ?></a></li>
                </ul>
            </div>
            <div>
                <h4><?php echo $t['footer_company']; ?></h4>
                <ul>
                    <li><a href="about.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="Learn about our company"><?php echo $t['footer_about_us']; ?></a></li>
                    <li><a href="#" class="footer-link contact" aria-label="Contact us"><?php echo $t['footer_contact']; ?></a></li>
                    <li><a href="privacy.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="Review privacy policy"><?php echo $t['footer_privacy']; ?></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p><?php echo $t['footer_copyright']; ?></p>
        </div>
    </footer>

    <!-- Sign Up Modal -->
    <div id="signup-modal" class="modal" role="dialog" aria-label="Sign Up Modal">
        <div class="modal-content">
            <span class="close" aria-label="Close sign-up form">&times;</span>
            <h2><?php echo $t['modal_title']; ?></h2>
            <!-- This form handles user sign-up (name and email) -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?lang=' . $lang; ?>">
                <input type="text" name="name" placeholder="<?php echo $t['modal_name']; ?>" required aria-label="Your name">
                <input type="email" name="email" placeholder="<?php echo $t['modal_email']; ?>" required aria-label="Your email address">
                <button type="submit" aria-label="Submit sign-up"><?php echo $t['modal_button']; ?></button>
            </form>
            <!-- If we have a sign-up message, display it in the appropriate color -->
            <?php if (!empty($message)): ?>
                <p style="color: <?php echo (strpos($message, 'Signed up') !== false || strpos($message, 'Registro') !== false) ? 'green' : 'red'; ?>;">
                    <?php echo $message; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Contact Modal for simple contact details -->
    <div id="contact-modal" class="modal" role="dialog" aria-label="General contact modal">
        <div class="modal-content">
            <span class="close" aria-label="Close contact form">&times;</span>
            <!-- Display contact info in the chosen language -->
            <h2><?php echo $lang === 'es' ? 'Contácto' : 'Contact'; ?></h2>
            <p>✉️: <a href="mailto:miroslav.n@students.opit.com" aria-label="Send mail to miroslav.n@students.opit.com">miroslav.n@students.opit.com</a></p>
            <p>📞: +1-555-123-4567</p>
            <p>🏢: STE 210, Palo Alto, CA 94303, USA</p>
        </div>
    </div>

    <!-- Script file linking; handles modal opening/closing and other features -->
    <script src="script.js"></script>
</body>
</html>