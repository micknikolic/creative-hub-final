<?php
// This variable holds any messages that need to be displayed, such as feedback for forms
$message = '';
// This flag tracks whether the sales contact form was submitted
$salesSubmitted = false;

// Read the 'lang' parameter from the URL or default to English
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

// Here we handle all POST submissions from this page, including contact sales, newsletter subscription, and sign-up
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // If the form_type is 'sales_contact', it means the "Contact Sales" form was submitted
    if (isset($_POST['form_type']) && $_POST['form_type'] == 'sales_contact') {
        $salesSubmitted = true;
        // Trim all inputs to remove extra whitespace
        $sales_name    = trim($_POST['sales_name']);
        $sales_email   = trim($_POST['sales_email']);
        $sales_company = trim($_POST['sales_company']);
        $sales_phone   = trim($_POST['sales_phone']); // This field is optional
        $sales_message = trim($_POST['sales_message']);

        // Validate that required fields are not empty and email is in a valid format
        if (empty($sales_name) || empty($sales_email) || empty($sales_company) || empty($sales_message)) {
            $message = $lang === 'es' ? 'Por favor, complete todos los campos obligatorios.' : 'Please fill in all required fields.';
        } elseif (!filter_var($sales_email, FILTER_VALIDATE_EMAIL)) {
            $message = $lang === 'es' ? 'Por favor, ingrese un correo válido.' : 'Please enter a valid email.';
        } else {
            // If everything is valid, we simulate a successful submission (like sending an email)
            $message = $lang === 'es' ? 'Su solicitud ha sido enviada con éxito.' : 'Your request has been sent successfully.';
        }
    } else {
        // If the form submitted is not "sales_contact", we check other forms (newsletter or sign-up)
        if (isset($_POST['email']) && !isset($_POST['name'])) {
            // Newsletter form
            $email = $_POST['email'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = $lang === 'es' ? '¡Suscripción exitosa!' : 'Subscribed successfully!';
            } else {
                $message = $lang === 'es' ? 'Por favor, ingresa un correo válido.' : 'Please enter a valid email.';
            }
        } elseif (isset($_POST['name']) && isset($_POST['email'])) {
            // Sign-up form from the modal
            $name = $_POST['name'];
            $email = $_POST['email'];
            if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = $lang === 'es' ? "¡Registro exitoso, $name!" : "Signed up successfully, $name!";
            } else {
                $message = $lang === 'es' ? 'Por favor, completa todos los campos correctamente.' : 'Please fill in all fields correctly.';
            }
        }
    }
}

// This section defines the translations for both English and Spanish
$translations = [
    'en' => [
        'title' => 'Creative Hub',
        'nav_home' => 'Home',
        'nav_about' => 'About',
        'nav_create' => 'Create',
        'pricing_title' => 'Plans & Pricing',
        'pricing_intro' => 'Select a plan that fits your creative journey. Whether you are starting out or looking for advanced solutions, we have a plan for you.',
        'pricing_basic_title' => 'Basic',
        'pricing_basic_price' => '$9/month',
        'pricing_basic_desc' => 'Ideal for individual creatives and startups.',
        'pricing_basic_features' => 'Essential design tools, Basic collaboration, Email support',
        'pricing_pro_title' => 'Pro',
        'pricing_pro_price' => '$29/month',
        'pricing_pro_desc' => 'Recommended for creative professionals seeking enhanced features.',
        'pricing_pro_features' => 'Advanced design tools, Priority support, Team collaboration, Exclusive content access',
        'pricing_enterprise_title' => 'Enterprise',
        'pricing_enterprise_price' => '$59/month',
        'pricing_enterprise_desc' => 'Perfect for large organizations with custom needs.',
        'pricing_enterprise_features' => 'All Pro features, Dedicated account manager, Custom integrations, Advanced analytics, 24/7 support',
        'pricing_button_signup' => 'Get Started',
        'pricing_button_contact' => 'Contact Sales',
        'contact_sales_title' => 'Contact Sales',
        'contact_sales_name_placeholder' => 'Name',
        'contact_sales_email_placeholder' => 'Email',
        'contact_sales_company_placeholder' => 'Company',
        'contact_sales_phone_placeholder' => 'Phone (Optional)',
        'contact_sales_message_placeholder' => 'Message',
        'contact_sales_submit' => 'Submit Request',
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
        'pricing_title' => 'Planes y Precios',
        'pricing_intro' => 'Elige un plan que se adapte a tu viaje creativo. Ya sea que estés comenzando o busques soluciones avanzadas, tenemos un plan para ti.',
        'pricing_basic_title' => 'Básico',
        'pricing_basic_price' => '$9/mes',
        'pricing_basic_desc' => 'Ideal para creativos individuales y startups.',
        'pricing_basic_features' => 'Herramientas de diseño esenciales, Colaboración básica, Soporte por correo',
        'pricing_pro_title' => 'Pro',
        'pricing_pro_price' => '$29/mes',
        'pricing_pro_desc' => 'Recomendado para profesionales creativos que buscan funciones avanzadas.',
        'pricing_pro_features' => 'Herramientas de diseño avanzadas, Soporte prioritario, Colaboración en equipo, Acceso a contenido exclusivo',
        'pricing_enterprise_title' => 'Empresarial',
        'pricing_enterprise_price' => '$59/mes',
        'pricing_enterprise_desc' => 'Perfecto para organizaciones grandes con necesidades personalizadas.',
        'pricing_enterprise_features' => 'Todas las funciones de Pro, Gerente de cuenta dedicado, Integraciones personalizadas, Análisis avanzados, Soporte 24/7',
        'pricing_button_signup' => 'Comenzar',
        'pricing_button_contact' => 'Contactar Ventas',
        'contact_sales_title' => 'Contactar Ventas',
        'contact_sales_name_placeholder' => 'Nombre',
        'contact_sales_email_placeholder' => 'Correo Electrónico',
        'contact_sales_company_placeholder' => 'Compañía',
        'contact_sales_phone_placeholder' => 'Teléfono (Opcional)',
        'contact_sales_message_placeholder' => 'Mensaje',
        'contact_sales_submit' => 'Enviar Solicitud',
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

// We decide which language array to use based on the current $lang value
$t = $translations[$lang];
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <!-- Setting character encoding and viewport for responsiveness -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Combining the site title with the "Plans & Pricing" title -->
    <title><?php echo $t['title']; ?> - <?php echo $t['pricing_title']; ?></title>
    <style>
        /* Basic resets and styling defaults */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f8f9fa;
        }
        /* Navigation bar styling */
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
        /* Pricing section container styling */
        .pricing-section {
            padding: 4rem 5%;
            background-color: #f1f1f1;
            text-align: center;
        }
        .pricing-section h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #333;
        }
        .pricing-section p {
            font-size: 1.1rem;
            margin-bottom: 3rem;
            color: #666;
        }
        /* Each pricing card in the pricing-cards area */
        .pricing-cards {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }
        .pricing-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 2rem;
            flex: 1;
            min-width: 280px;
            max-width: 320px;
            position: relative;
        }
        /* A special class to highlight the "best value" plan */
        .pricing-card.featured {
            border: 2px solid #007bff;
        }
        .pricing-card .badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #007bff;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-size: 0.9rem;
        }
        .pricing-card h2 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #333;
        }
        .pricing-card .price {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #007bff;
        }
        .pricing-card p.desc {
            margin-bottom: 1rem;
            color: #666;
        }
        .pricing-card ul {
            list-style: none;
            margin-bottom: 1.5rem;
            padding: 0;
        }
        .pricing-card ul li {
            margin-bottom: 0.5rem;
            color: #666;
        }
        /* Button styling for "Get Started" and "Contact Sales" */
        .pricing-card .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s ease;
            cursor: pointer;
        }
        .pricing-card .btn:hover {
            background-color: #e67e22;
        }
        /* Footer area styling */
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
        /* Modal styling shared across sign-up and contact forms */
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
    <!-- We add an ARIA label to clarify this is the primary navigation area -->
    <nav aria-label="Main Navigation">
        <div class="logo">Creative Hub</div>
        <div class="nav-links">
            <!-- ARIA label to provide context on what 'Home' link does -->
            <a href="index.php?lang=<?php echo $lang; ?>" aria-label="Go to Home"><?php echo $t['nav_home']; ?></a>
            <!-- ARIA label for About link for clarity -->
            <a href="about.php?lang=<?php echo $lang; ?>" aria-label="Learn about our company"><?php echo $t['nav_about']; ?></a>
            <!-- ARIA label for the Create link to convey its purpose to assistive tech -->
            <a href="#" class="try-now-button" aria-label="Begin creating or designing"><?php echo $t['nav_create']; ?></a>
            <div class="language-selector" aria-label="Language selector">
                <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <select name="lang" onchange="this.form.submit()" aria-label="Choose a language">
                        <option value="en" <?php echo $lang === 'en' ? 'selected' : ''; ?>>EN</option>
                        <option value="es" <?php echo $lang === 'es' ? 'selected' : ''; ?>>ES</option>
                    </select>
                </form>
            </div>
        </div>
    </nav>

    <!-- Pricing section, which is now labeled for assistive technologies -->
    <section class="pricing-section" aria-label="Plans and Pricing Details">
        <h1><?php echo $t['pricing_title']; ?></h1>
        <p><?php echo $t['pricing_intro']; ?></p>
        <div class="pricing-cards">
            <!-- Basic plan card, with ARIA label to clarify it's a 'Basic Plan' -->
            <div class="pricing-card" aria-label="Basic Plan Card">
                <h2><?php echo $t['pricing_basic_title']; ?></h2>
                <p class="price"><?php echo $t['pricing_basic_price']; ?></p>
                <p class="desc"><?php echo $t['pricing_basic_desc']; ?></p>
                <ul>
                    <?php
                    // Turn the comma-separated feature string into a list
                    $basic_features = explode(',', $t['pricing_basic_features']);
                    foreach ($basic_features as $feature) {
                        echo '<li>' . trim($feature) . '</li>';
                    }
                    ?>
                </ul>
                <a href="#" class="btn try-now-button" aria-label="Get started with Basic"><?php echo $t['pricing_button_signup']; ?></a>
            </div>
            <!-- Pro plan card, designated with ARIA label to highlight its 'Best Value' status -->
            <div class="pricing-card featured" aria-label="Pro Plan Card, highlighted as best value">
                <div class="badge"><?php echo $lang === 'es' ? 'Mejor Opción' : 'Best Value'; ?></div>
                <h2><?php echo $t['pricing_pro_title']; ?></h2>
                <p class="price"><?php echo $t['pricing_pro_price']; ?></p>
                <p class="desc"><?php echo $t['pricing_pro_desc']; ?></p>
                <ul>
                    <?php
                    $pro_features = explode(',', $t['pricing_pro_features']);
                    foreach ($pro_features as $feature) {
                        echo '<li>' . trim($feature) . '</li>';
                    }
                    ?>
                </ul>
                <a href="#" class="btn try-now-button" aria-label="Get started with Pro"><?php echo $t['pricing_button_signup']; ?></a>
            </div>
            <!-- Enterprise plan card, labeled for clarity as well -->
            <div class="pricing-card" aria-label="Enterprise Plan Card">
                <h2><?php echo $t['pricing_enterprise_title']; ?></h2>
                <p class="price"><?php echo $t['pricing_enterprise_price']; ?></p>
                <p class="desc"><?php echo $t['pricing_enterprise_desc']; ?></p>
                <ul>
                    <?php
                    $enterprise_features = explode(',', $t['pricing_enterprise_features']);
                    foreach ($enterprise_features as $feature) {
                        echo '<li>' . trim($feature) . '</li>';
                    }
                    ?>
                </ul>
                <a href="#" class="btn contact-sales-button" aria-label="Contact sales about Enterprise Plan"><?php echo $t['pricing_button_contact']; ?></a>
            </div>
        </div>
    </section>

    <!-- Footer with newsletter subscription and site links -->
    <footer aria-label="Site Footer">
        <div class="footer-content">
            <div class="newsletter">
                <h4><?php echo $t['footer_subscribe']; ?></h4>
                <!-- Newsletter subscription form; prevents confusion with sales contact by not setting form_type -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?lang=' . $lang; ?>">
                    <input type="email" name="email" placeholder="<?php echo $t['footer_email_placeholder']; ?>" required aria-label="Enter your email for subscription">
                    <button type="submit" aria-label="Subscribe to our newsletter"><?php echo $t['footer_subscribe_button']; ?></button>
                </form>
                <?php if (!empty($message) && !$salesSubmitted): ?>
                    <p style="color: <?php echo (strpos($message, 'Subscribed') !== false || strpos($message, 'Suscripción') !== false || strpos($message, 'Registro') !== false) ? 'green' : 'red'; ?>;">
                        <?php echo $message; ?>
                    </p>
                <?php endif; ?>
            </div>
            <div>
                <h4><?php echo $t['footer_product']; ?></h4>
                <ul>
                    <li><a href="plans.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="View plans and pricing"><?php echo $t['footer_plans']; ?></a></li>
                    <li><a href="features.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="Discover product features"><?php echo $t['footer_features']; ?></a></li>
                </ul>
            </div>
            <div>
                <h4><?php echo $t['footer_resources']; ?></h4>
                <ul>
                    <li><a href="guides.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="User guides"><?php echo $t['footer_guides']; ?></a></li>
                    <li><a href="webinars.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="Upcoming webinars"><?php echo $t['footer_webinars']; ?></a></li>
                </ul>
            </div>
            <div>
                <h4><?php echo $t['footer_company']; ?></h4>
                <ul>
                    <li><a href="about.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="About the company"><?php echo $t['footer_about_us']; ?></a></li>
                    <li><a href="#" class="footer-link contact" aria-label="Contact us"><?php echo $t['footer_contact']; ?></a></li>
                    <li><a href="privacy.php?lang=<?php echo $lang; ?>" class="footer-link" aria-label="Privacy policy"><?php echo $t['footer_privacy']; ?></a></li>
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
            <span class="close" aria-label="Close sign up modal">×</span>
            <h2><?php echo $t['modal_title']; ?></h2>
            <!-- Simple sign-up form for new users -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?lang=' . $lang; ?>">
                <input type="text" name="name" placeholder="<?php echo $t['modal_name']; ?>" required aria-label="Your Name">
                <input type="email" name="email" placeholder="<?php echo $t['modal_email']; ?>" required aria-label="Your Email">
                <button type="submit" aria-label="Submit sign up form"><?php echo $t['modal_button']; ?></button>
            </form>
            <!-- Display messages if not triggered by the sales form -->
            <?php if (!empty($message) && !$salesSubmitted): ?>
                <p style="color: <?php echo (strpos($message, 'Signed up') !== false || strpos($message, 'Registro') !== false) ? 'green' : 'red'; ?>;">
                    <?php echo $message; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Contact Sales Modal (collects more detailed info) -->
    <div id="contact-sales-modal" class="modal" role="dialog" aria-label="Sales Contact Modal">
        <div class="modal-content">
            <span class="close" aria-label="Close sales contact modal">×</span>
            <h2><?php echo $t['contact_sales_title']; ?></h2>
            <!-- If the sales form was submitted successfully, we show a success message -->
            <?php if ($salesSubmitted && !empty($message) && (strpos($message, 'successfully') !== false || strpos($message, 'éxito') !== false)): ?>
                <p style="color: green; margin-top: 1rem;"><?php echo $message; ?></p>
            <?php else: ?>
                <!-- Otherwise, show the sales contact form -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?lang=' . $lang; ?>">
                    <!-- Hidden field to identify this as the sales contact form -->
                    <input type="hidden" name="form_type" value="sales_contact" aria-label="Sales contact form identifier">
                    <input type="text" name="sales_name" placeholder="<?php echo $t['contact_sales_name_placeholder']; ?>" required aria-label="Your Name">
                    <input type="email" name="sales_email" placeholder="<?php echo $t['contact_sales_email_placeholder']; ?>" required aria-label="Your Email">
                    <input type="text" name="sales_company" placeholder="<?php echo $t['contact_sales_company_placeholder']; ?>" required aria-label="Your Company">
                    <input type="text" name="sales_phone" placeholder="<?php echo $t['contact_sales_phone_placeholder']; ?>" aria-label="Your Phone Number">
                    <textarea name="sales_message" placeholder="<?php echo $t['contact_sales_message_placeholder']; ?>" required aria-label="Your Message"></textarea>
                    <button type="submit" aria-label="Submit sales contact request"><?php echo $t['contact_sales_submit']; ?></button>
                </form>
                <?php if (!empty($message)): ?>
                    <p style="color: red; margin-top: 1rem;"><?php echo $message; ?></p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Existing simple contact modal (not specifically for sales) -->
    <div id="contact-modal" class="modal" role="dialog" aria-label="General Contact Modal">
        <div class="modal-content">
            <span class="close" aria-label="Close contact modal">&times;</span>
            <h2><?php echo $lang === 'es' ? 'Contácto' : 'Contact'; ?></h2>
            <p>✉️: <a href="mailto:miroslav.n@students.opit.com" aria-label="Send email to miroslav.n@students.opit.com">miroslav.n@students.opit.com</a></p>
            <p>📞: +1-555-123-4567</p>
            <p>🏢: STE 210, Palo Alto, CA 94303, USA</p>
        </div>
    </div>

    <!-- Linking to an external script file and adding inline code for the sales modal -->
    <script src="script.js"></script>
    <script>
        // Grabbing the sales modal and button
        const contactSalesModal = document.getElementById('contact-sales-modal');
        const contactSalesBtn = document.querySelector('.contact-sales-button');

        // If the button and modal exist, show the modal on button click
        if (contactSalesModal && contactSalesBtn) {
            contactSalesBtn.addEventListener('click', (event) => {
                event.preventDefault();
                contactSalesModal.style.display = 'flex';
            });
        }

        // Allow closing the modal using the '×' icon
        const closeSalesBtn = contactSalesModal ? contactSalesModal.querySelector('.close') : null;
        if (closeSalesBtn) {
            closeSalesBtn.addEventListener('click', () => {
                contactSalesModal.style.display = 'none';
            });
        }

        // Close the modal if the user clicks outside of the modal content
        window.addEventListener('click', (event) => {
            if (event.target === contactSalesModal) {
                contactSalesModal.style.display = 'none';
            }
        });

        // If a sales form was submitted successfully, automatically open the modal to show the message
        <?php if ($salesSubmitted && !empty($message) && (strpos($message, 'successfully') !== false || strpos($message, 'éxito') !== false)): ?>
            window.onload = function() {
                document.getElementById('contact-sales-modal').style.display = 'flex';
            };
        <?php endif; ?>
    </script>
</body>
</html>