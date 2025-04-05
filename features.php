<?php
// The $message variable is used to display feedback for newsletter subscription or sign-up forms
$message = '';

// This sets the default language to English unless a "lang" parameter is provided in the URL
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

// This section handles form submissions for newsletter sign-up or user registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // If we only get an email and no name, it's a newsletter subscription
    if (isset($_POST['email']) && !isset($_POST['name'])) {
        // We grab the email from the posted data
        $email = $_POST['email'];
        // We check if the email is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // If valid, set a success message
            $message = $lang === 'es' ? '¡Suscripción exitosa!' : 'Subscribed successfully!';
        } else {
            // Otherwise, we inform the user that the email is invalid
            $message = $lang === 'es' ? 'Por favor, ingresa un correo válido.' : 'Please enter a valid email.';
        }
    }
    // If we get both a name and an email, it means the user tried to sign up
    elseif (isset($_POST['name']) && isset($_POST['email'])) {
        // We retrieve name and email from the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        // Checking if the name is filled and email is valid
        if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // We show a success message if everything is correct
            $message = $lang === 'es' ? "¡Registro exitoso, $name!" : "Signed up successfully, $name!";
        } else {
            // Otherwise, prompt the user to fill in required fields properly
            $message = $lang === 'es' ? 'Por favor, completa todos los campos correctamente.' : 'Please fill in all fields correctly.';
        }
    }
}

// These arrays contain the translations for English and Spanish
$translations = [
    'en' => [
        'title' => 'Creative Hub',
        'nav_home' => 'Home',
        'nav_about' => 'About',
        'nav_create' => 'Create',
        'features_page_title' => 'Features',
        'features_page_intro_title' => 'Innovative Features',
        'features_page_intro_text' => 'Discover the cutting-edge tools and collaborative solutions that set Creative Hub apart. Our platform empowers designers to create, collaborate, and innovate using advanced AI-powered design tools and seamless project collaboration features.',
        'project_collaboration_title' => 'Project Collaboration',
        'project_collaboration_description' => 'Seamlessly collaborate with team members in real time, share ideas, and track progress on your design projects. Our platform makes teamwork effortless and efficient.',
        'design_tools_title' => 'Graphic Design Tools',
        'design_tools_description' => 'Access a wide range of design tools and templates that bring your creative ideas to life. Our unique AI-based collaborator provides intelligent suggestions to help you design with ease and precision.',
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
        'features_page_title' => 'Características',
        'features_page_intro_title' => 'Características Innovadoras',
        'features_page_intro_text' => 'Descubra las herramientas de vanguardia y soluciones colaborativas que distinguen a Creative Hub. Nuestra plataforma empodera a los diseñadores para crear, colaborar e innovar con avanzadas herramientas de diseño impulsadas por IA y funciones de colaboración sin esfuerzo.',
        'project_collaboration_title' => 'Colaboración en Proyectos',
        'project_collaboration_description' => 'Colabore sin esfuerzo con los miembros de su equipo en tiempo real, comparta ideas y haga un seguimiento del progreso de sus proyectos de diseño. Nuestra plataforma hace que el trabajo en equipo sea sencillo y eficiente.',
        'design_tools_title' => 'Herramientas de Diseño Gráfico',
        'design_tools_description' => 'Acceda a una amplia gama de herramientas y plantillas que dan vida a sus ideas creativas. Nuestro colaborador basado en IA ofrece sugerencias inteligentes para ayudarle a diseñar con facilidad y precisión.',
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

// Here we pick which translations to use based on the chosen language
$t = $translations[$lang];
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <!-- We define meta tags for character encoding and responsiveness -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- The page title includes both the site name and the 'Features' title -->
    <title><?php echo $t['title']; ?> - <?php echo $t['features_page_title']; ?></title>
    <style>
        /* Basic resets and font settings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f8f9fa;
        }
        /* Navigation styling (same as other pages) */
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
        /* Intro section for the Features page */
        .features-intro {
            padding: 4rem 5%;
            text-align: center;
            background-color: #fff;
        }
        .features-intro h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #333;
        }
        .features-intro p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 3rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        /* Each feature section is displayed as two columns: text and image */
        .feature-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4rem 5%;
            flex-wrap: wrap;
        }
        .feature-section:nth-child(even) {
            flex-direction: row-reverse;
            background-color: #fff;
        }
        .feature-text {
            flex: 1;
            max-width: 600px;
            padding: 2rem;
        }
        .feature-text h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #333;
        }
        .feature-text p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }
        .feature-image {
            flex: 1;
            max-width: 600px;
            padding: 2rem;
            text-align: center;
        }
        .feature-image img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        /* Button styles for the feature sections: blue and orange variants */
        .btn-blue {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s ease;
            margin-right: 1rem;
        }
        .btn-blue:hover {
            background-color: #e67e22;
        }
        .btn-orange {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background-color: #e67e22;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s ease;
        }
        .btn-orange:hover {
            background-color: #007bff;
        }
        /* Footer styling (consistent across pages) */
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
        /* Modal styling (shared with other pages) */
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
    <!-- Top navigation bar with links and language selector -->
    <nav>
        <div class="logo">Creative Hub</div>
        <div class="nav-links">
            <a href="index.php?lang=<?php echo $lang; ?>"><?php echo $t['nav_home']; ?></a>
            <a href="about.php?lang=<?php echo $lang; ?>"><?php echo $t['nav_about']; ?></a>
            <a href="#" class="try-now-button"><?php echo $t['nav_create']; ?></a>
            <div class="language-selector">
                <!-- Submits the form on language change -->
                <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <select name="lang" onchange="this.form.submit()">
                        <option value="en" <?php echo $lang === 'en' ? 'selected' : ''; ?>>EN</option>
                        <option value="es" <?php echo $lang === 'es' ? 'selected' : ''; ?>>ES</option>
                    </select>
                </form>
            </div>
        </div>
    </nav>

    <!-- Intro section describing the overall features of Creative Hub -->
    <section class="features-intro">
        <h1><?php echo $t['features_page_intro_title']; ?></h1>
        <p><?php echo $t['features_page_intro_text']; ?></p>
    </section>

    <!-- First feature: Project Collaboration -->
    <section class="feature-section">
        <div class="feature-text">
            <h2><?php echo $t['project_collaboration_title']; ?></h2>
            <p><?php echo $t['project_collaboration_description']; ?></p>
            <div class="feature-links">
                <!-- Blue button triggers the sign-up modal -->
                <a href="#" class="btn-blue"><?php echo $t['modal_button']; ?></a>
                <!-- Orange button triggers the contact modal -->
                <a href="#" class="btn-orange"><?php echo $t['footer_contact']; ?></a>
            </div>
        </div>
        <div class="feature-image">
            <img src="images/photo_features_2.png" alt="<?php echo $t['project_collaboration_title']; ?>">
        </div>
    </section>

    <!-- Second feature: AI-Powered Graphic Design Tools -->
    <section class="feature-section">
        <div class="feature-image">
            <img src="images/photo_features_1.png" alt="<?php echo $t['design_tools_title']; ?>">
        </div>
        <div class="feature-text">
            <h2><?php echo $t['design_tools_title']; ?></h2>
            <p><?php echo $t['design_tools_description']; ?></p>
            <div class="feature-links">
                <!-- Blue button triggers the sign-up modal -->
                <a href="#" class="btn-blue"><?php echo $t['modal_button']; ?></a>
                <!-- Orange button triggers the contact modal -->
                <a href="#" class="btn-orange"><?php echo $t['footer_contact']; ?></a>
            </div>
        </div>
    </section>

    <!-- Footer with newsletter form and additional site links -->
    <footer>
        <div class="footer-content">
            <div class="newsletter">
                <h4><?php echo $t['footer_subscribe']; ?></h4>
                <!-- Newsletter subscription form posts to the same page with current language -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?lang=' . $lang; ?>">
                    <input type="email" name="email" placeholder="<?php echo $t['footer_email_placeholder']; ?>" required>
                    <button type="submit"><?php echo $t['footer_subscribe_button']; ?></button>
                </form>
                <!-- Display the message in green or red depending on success or error -->
                <?php if (!empty($message)): ?>
                    <p style="color: <?php echo (strpos($message, 'Subscribed') !== false || strpos($message, 'Suscripción') !== false || strpos($message, 'Registro') !== false) ? 'green' : 'red'; ?>;">
                        <?php echo $message; ?>
                    </p>
                <?php endif; ?>
            </div>
            <div>
                <h4><?php echo $t['footer_product']; ?></h4>
                <ul>
                    <li><a href="plans.php?lang=<?php echo $lang; ?>" class="footer-link"><?php echo $t['footer_plans']; ?></a></li>
                    <li><a href="features.php?lang=<?php echo $lang; ?>" class="footer-link"><?php echo $t['footer_features']; ?></a></li>
                </ul>
            </div>
            <div>
                <h4><?php echo $t['footer_resources']; ?></h4>
                <ul>
                    <li><a href="guides.php?lang=<?php echo $lang; ?>" class="footer-link"><?php echo $t['footer_guides']; ?></a></li>
                    <li><a href="webinars.php?lang=<?php echo $lang; ?>" class="footer-link"><?php echo $t['footer_webinars']; ?></a></li>
                </ul>
            </div>
            <div>
                <h4><?php echo $t['footer_company']; ?></h4>
                <ul>
                    <li><a href="about.php?lang=<?php echo $lang; ?>" class="footer-link"><?php echo $t['footer_about_us']; ?></a></li>
                    <li><a href="#" class="footer-link contact"><?php echo $t['footer_contact']; ?></a></li>
                    <li><a href="privacy.php?lang=<?php echo $lang; ?>" class="footer-link"><?php echo $t['footer_privacy']; ?></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p><?php echo $t['footer_copyright']; ?></p>
        </div>
    </footer>

    <!-- Sign Up Modal -->
    <div id="signup-modal" class="modal">
        <div class="modal-content">
            <span class="close">×</span>
            <h2><?php echo $t['modal_title']; ?></h2>
            <!-- Sign-up form (posts to the same page, preserving language) -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?lang=' . $lang; ?>">
                <input type="text" name="name" placeholder="<?php echo $t['modal_name']; ?>" required>
                <input type="email" name="email" placeholder="<?php echo $t['modal_email']; ?>" required>
                <button type="submit"><?php echo $t['modal_button']; ?></button>
            </form>
            <?php if (!empty($message)): ?>
                <!-- If there's a signup message, color depends on success or error -->
                <p style="color: <?php echo (strpos($message, 'Signed up') !== false || strpos($message, 'Registro') !== false) ? 'green' : 'red'; ?>;">
                    <?php echo $message; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Contact Modal -->
    <div id="contact-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <!-- We display the word "Contact" or "Contácto" depending on the language -->
            <h2><?php echo $lang === 'es' ? 'Contácto' : 'Contact'; ?></h2>
            <p>✉️: <a href="mailto:miroslav.n@students.opit.com">miroslav.n@students.opit.com</a></p>
            <p>📞: +1-555-123-4567</p>
            <p>🏢: STE 210, Palo Alto, CA 94303, USA</p>
        </div>
    </div>

    <!-- JavaScript includes the main script plus some inline code to open modals on button clicks -->
    <script src="script.js"></script>
    <script>
        // All elements with class .btn-blue will open the signup modal
        document.querySelectorAll('.btn-blue').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('signup-modal').style.display = 'flex';
            });
        });
        // All elements with class .btn-orange will open the contact modal
        document.querySelectorAll('.btn-orange').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('contact-modal').style.display = 'flex';
            });
        });
    </script>
</body>
</html>