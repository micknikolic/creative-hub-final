<?php
// This variable will hold any messages that need to be displayed based on form submissions
$message = '';

// Here we decide which language to show based on a GET parameter or default to English
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

// This block handles different POST submissions for newsletter subscription or sign-up
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // If an email is provided without a name, we assume it's the newsletter form
    if (isset($_POST['email']) && !isset($_POST['name'])) {
        // We capture the email from the POST data
        $email = $_POST['email'];
        // Validate the email address
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // If valid, display success message in the chosen language
            $message = $lang === 'es' ? '¡Suscripción exitosa!' : 'Subscribed successfully!';
        } else {
            // Otherwise, ask for a valid email
            $message = $lang === 'es' ? 'Por favor, ingresa un correo válido.' : 'Please enter a valid email.';
        }
    }
    // If both name and email are set, we consider it the sign-up form from the modal
    elseif (isset($_POST['name']) && isset($_POST['email'])) {
        // Extract name and email
        $name = $_POST['name'];
        $email = $_POST['email'];
        // Check if name is not empty and the email is valid
        if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Display a success message
            $message = $lang === 'es' ? "¡Registro exitoso, $name!" : "Signed up successfully, $name!";
        } else {
            // Otherwise, prompt the user to fill all fields correctly
            $message = $lang === 'es' ? 'Por favor, completa todos los campos correctamente.' : 'Please fill in all fields correctly.';
        }
    }
}

// This array stores both English and Spanish translations for this page
$translations = [
    'en' => [
        'title' => 'About - Creative Hub',
        'nav_home' => 'Home',
        'nav_about' => 'About',
        'nav_create' => 'Create',
        'about_title' => 'Welcome 👋',
        'p1' => 'At Creative Hub, we are more than just a company; we are a collective of passionate innovators dedicated to revolutionizing the graphic design industry. Founded in 2020 by a group of visionary machine learning researchers and seasoned graphic designers, our mission is to bridge the gap between cutting-edge technology and creative artistry. What began as a small team with a bold idea has grown into a global platform that empowers designers and redefines how creativity and technology intersect.',
        'p2' => 'Our team comprises industry veterans with decades of combined experience in both machine learning and graphic design. Our machine learning experts have worked on groundbreaking projects at leading tech companies, developing algorithms that push the boundaries of artificial intelligence. Meanwhile, our designers have crafted award-winning visuals for global brands, bringing a wealth of creative expertise to the table. This unique blend of skills allows us to create tools and platforms that not only enhance design practices but also foster a thriving community of like-minded professionals who inspire and learn from one another.',
        'p3' => 'We leverage advanced machine learning algorithms to analyze design trends, predict user preferences, and automate repetitive tasks, freeing designers to focus on what they do best: creating. Our proprietary technology, CreativeAI, is at the heart of our platform. It offers intelligent design suggestions, real-time collaboration features, and seamless integration with popular design tools, streamlining the creative process from concept to completion. Whether you’re a solo freelancer or part of a large design team, CreativeAI adapts to your workflow, making design faster, smarter, and more enjoyable.',
        'p4' => 'Since our inception, we’ve made significant strides in the graphic design industry. Our platform has been adopted by over 10,000 designers worldwide, resulting in a 30% increase in productivity and a 25% reduction in project turnaround times, according to user feedback. We’ve also facilitated countless collaborations, connecting designers with complementary skills and fostering a vibrant community of creative professionals. From independent artists to enterprise teams, our users have shared stories of how Creative Hub has transformed their work, enabling them to take on bigger projects and deliver exceptional results.',
        'p5' => 'But our journey doesn’t stop here. We are constantly pushing the boundaries of what’s possible, with ongoing research into new AI models and design methodologies. Our vision for the future includes expanding our platform to support additional creative disciplines—such as illustration, animation, and UI/UX design—while continuing to build a global network of designers who can learn, grow, and innovate together. We’re also exploring partnerships with educational institutions to provide resources for the next generation of creatives, ensuring that the skills and tools we develop remain accessible to all.',
        'p6' => 'Join us at Creative Hub, where technology meets creativity. Whether you’re a designer looking to enhance your craft, a researcher interested in the intersection of AI and art, or a professional seeking a community to share ideas, we’re here to support you. Together, we can shape the future of design—one project, one collaboration, one innovation at a time.',
        'img_alt' => 'Creative Hub Team',
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
        'title' => 'Acerca de - Creative Hub',
        'nav_home' => 'Inicio',
        'nav_about' => 'Acerca de',
        'nav_create' => 'Crear',
        'about_title' => 'Bienvenido 👋',
        'p1' => 'En Creative Hub, somos más que una empresa; somos un colectivo de innovadores apasionados dedicados a revolucionar la industria del diseño gráfico. Fundada en 2020 por un grupo de investigadores visionarios en aprendizaje automático y diseñadores gráficos experimentados, nuestra misión es cerrar la brecha entre la tecnología de vanguardia y el arte creativo. Lo que comenzó como un pequeño equipo con una idea audaz ha crecido hasta convertirse en una plataforma global que empodera a los diseñadores y redefine cómo la creatividad y la tecnología se intersectan.',
        'p2' => 'Nuestro equipo está compuesto por veteranos de la industria con décadas de experiencia combinada tanto en aprendizaje automático como en diseño gráfico. Nuestros expertos en aprendizaje automático han trabajado en proyectos innovadores en empresas tecnológicas líderes, desarrollando algoritmos que amplían los límites de la inteligencia artificial. Mientras tanto, nuestros diseñadores han creado visuales galardonados para marcas globales, aportando una gran cantidad de experiencia creativa. Esta combinación única de habilidades nos permite crear herramientas y plataformas que no solo mejoran las prácticas de diseño, sino que también fomentan una comunidad próspera de profesionales con ideas afines que se inspiran y aprenden unos de otros.',
        'p3' => 'Aprovechamos algoritmos avanzados de aprendizaje automático para analizar tendencias de diseño, predecir preferencias de usuarios y automatizar tareas repetitivas, liberando a los diseñadores para que se concentren en lo que mejor saben hacer: crear. Nuestra tecnología propietaria, CreativeAI, es el corazón de nuestra plataforma. Ofrece sugerencias de diseño inteligentes, funciones de colaboración en tiempo real e integración perfecta con herramientas de diseño populares, optimizando el proceso creativo desde el concepto hasta la finalización. Ya sea que seas un freelancer independiente o parte de un gran equipo de diseño, CreativeAI se adapta a tu flujo de trabajo, haciendo que el diseño sea más rápido, inteligente y agradable.',
        'p4' => 'Desde nuestro inicio, hemos logrado avances significativos en la industria del diseño gráfico. Nuestra plataforma ha sido adoptada por más de 10,000 diseñadores en todo el mundo, lo que ha resultado en un aumento del 30% en la productividad y una reducción del 25% en los tiempos de entrega de proyectos, según los comentarios de los usuarios. También hemos facilitado innumerables colaboraciones, conectando a diseñadores con habilidades complementarias y fomentando una comunidad vibrante de profesionales creativos. Desde artistas independientes hasta equipos empresariales, nuestros usuarios han compartido historias de cómo Creative Hub ha transformado su trabajo, permitiéndoles asumir proyectos más grandes y entregar resultados excepcionales.',
        'p5' => 'Pero nuestro viaje no termina aquí. Estamos constantemente superando los límites de lo posible, con investigaciones en curso sobre nuevos modelos de IA y metodologías de diseño. Nuestra visión para el futuro incluye expandir nuestra plataforma para apoyar disciplinas creativas adicionales—como ilustración, animación y diseño UI/UX—mientras continuamos construyendo una red global de diseñadores que pueden aprender, crecer e innovar juntos. También estamos explorando asociaciones con instituciones educativas para proporcionar recursos a la próxima generación de creativos, asegurando que las habilidades y herramientas que desarrollamos sigan siendo accesibles para todos.',
        'p6' => 'Únete a nosotros en Creative Hub, donde la tecnología se encuentra con la creatividad. Ya seas un diseñador que busca mejorar tu oficio, un investigador interesado en la intersección de la IA y el arte, o un profesional que busca una comunidad para compartir ideas, estamos aquí para apoyarte. Juntos, podemos dar forma al futuro del diseño: un proyecto, una colaboración, una innovación a la vez.',
        'img_alt' => 'Equipo de Creative Hub',
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

// We pick which set of translations to use based on the 'lang' value
$t = $translations[$lang];
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <!-- Defining the character encoding and ensuring mobile responsiveness -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Setting the page title from the translations -->
    <title><?php echo $t['title']; ?></title>
    <!-- Applying basic styling that aligns with the Index page -->
    <style>
        /* Reset and font setup */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        /* Body background and text color */
        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        /* Navigation style similar to the Index page */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        .nav-links a {
            text-decoration: none;
            color: #333;
            font-size: 1.1rem;
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
        /* Main content area styling */
        main {
            padding: 4rem 5%;
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }
        main h1 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: #333;
        }
        main p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }
        main img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-top: 2rem;
        }
        /* Footer styling consistent with the Index page */
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
            font-size: 1.2rem;
        }
        footer ul {
            list-style: none;
        }
        footer ul li {
            margin-bottom: 0.8rem;
        }
        .footer-link {
            color: white;
            text-decoration: none;
            font-family: Arial, Helvetica, sans-serif;
        }
        .footer-bottom {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-top: 3rem;
            font-size: 0.9rem;
        }
        /* Newsletter subscription form in the footer */
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
            transition: background 0.3s ease;
        }
        .newsletter button:hover {
            background-color: #0056b3;
        }
        /* Modal general styling */
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
        .modal-content input {
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .modal-content button {
            padding: 0.8rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .modal-content .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- The header contains navigation and language selection -->
    <nav>
        <div class="logo">Creative Hub</div>
        <div class="nav-links">
            <a href="index.php?lang=<?php echo $lang; ?>"><?php echo $t['nav_home']; ?></a>
            <a href="about.php?lang=<?php echo $lang; ?>"><?php echo $t['nav_about']; ?></a>
            <a href="#" class="try-now-button"><?php echo $t['nav_create']; ?></a>
            <div class="language-selector">
                <!-- Language selector uses a simple GET parameter to switch languages -->
                <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <select name="lang" onchange="this.form.submit()">
                        <option value="en" <?php echo $lang === 'en' ? 'selected' : ''; ?>>EN</option>
                        <option value="es" <?php echo $lang === 'es' ? 'selected' : ''; ?>>ES</option>
                    </select>
                </form>
            </div>
        </div>
    </nav>

    <!-- Main section for the "About" content -->
    <main>
        <h1><?php echo $t['about_title']; ?></h1>
        <!-- We display multiple paragraphs based on the translations to present the company's story -->
        <p><?php echo $t['p1']; ?></p>
        <p><?php echo $t['p2']; ?></p>
        <p><?php echo $t['p3']; ?></p>
        <p><?php echo $t['p4']; ?></p>
        <p><?php echo $t['p5']; ?></p>
        <p><?php echo $t['p6']; ?></p>
        <!-- This image helps illustrate the team or concept -->
        <img src="images/about_photo.jpg" alt="<?php echo $t['img_alt']; ?>">
    </main>

    <!-- Footer section containing links and newsletter form -->
    <footer>
        <div class="footer-content">
            <div class="newsletter">
                <h4><?php echo $t['footer_subscribe']; ?></h4>
                <!-- Newsletter subscription form -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?lang=' . $lang; ?>">
                    <input type="email" name="email" placeholder="<?php echo $t['footer_email_placeholder']; ?>" required>
                    <button type="submit"><?php echo $t['footer_subscribe_button']; ?></button>
                </form>
                <!-- If we have a message to show, we do so in color depending on success or error -->
                <?php if (!empty($message)): ?>
                    <p style="color: <?php echo strpos($message, 'Subscribed') !== false || strpos($message, 'Suscripción') !== false ? 'green' : 'red'; ?>;">
                        <?php echo $message; ?>
                    </p>
                <?php endif; ?>
            </div>
            <!-- Different sections of footer content including product, resources, and company info -->
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
            <!-- Copyright text -->
            <p><?php echo $t['footer_copyright']; ?></p>
        </div>
    </footer>

    <!-- Modal for user sign-up (like from the index page) -->
    <div id="signup-modal" class="modal">
        <div class="modal-content">
            <span class="close">×</span>
            <h2><?php echo $t['modal_title']; ?></h2>
            <!-- Sign-up form that includes name and email -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?lang=' . $lang; ?>">
                <input type="text" name="name" placeholder="<?php echo $t['modal_name']; ?>" required>
                <input type="email" name="email" placeholder="<?php echo $t['modal_email']; ?>" required>
                <button type="submit"><?php echo $t['modal_button']; ?></button>
            </form>
            <!-- Display any sign-up message if available -->
            <?php if (!empty($message)): ?>
                <p style="color: <?php echo strpos($message, 'Signed up') !== false || strpos($message, 'Registro') !== false ? 'green' : 'red'; ?>;">
                    <?php echo $message; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Contact modal for showing contact details -->
    <div id="contact-modal" class="modal">
        <div class="modal-content">
            <span class="close">×</span>
            <h2><?php echo $lang === 'es' ? 'Contácto' : 'Contact'; ?></h2>
            <p>✉️: <a href="mailto:miroslav.n@students.opit.com">miroslav.n@students.opit.com</a></p>
            <p>📞: +1-555-123-4567</p>
            <p>🏢: STE 210, Palo Alto, CA 94303, USA</p>
        </div>
    </div>

    <!-- This script is used for toggling modals and any other interactions -->
    <script src="script.js"></script>
</body>
</html>