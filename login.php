<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Pro - Système de Gestion de Stock & Vente (.DZ)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --dark: #0f172a;
            --dark-card: #1e293b;
            --gray-light: #f8fafc;
            --text-main: #334155;
            --text-muted: #64748b;
            --border: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--gray-light);
            color: var(--text-main);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 70px;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 5%;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            cursor: pointer;
        }

        .mini-logo {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 800;
            font-size: 16px;
            letter-spacing: 1px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .logo-text {
            color: white;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #60a5fa;
        }

        .hamburger {
            display: none;
            cursor: pointer;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
        }

        /* Hero Section */
        .hero {
            padding: 140px 5% 80px;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            min-height: 90vh;
        }

        .hero-content {
            flex: 1;
            max-width: 600px;
        }

        .badge {
            display: inline-block;
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 20px;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .hero h1 {
            font-size: clamp(2.2rem, 4vw, 3.5rem);
            line-height: 1.2;
            margin-bottom: 20px;
            font-weight: 800;
        }

        .hero p {
            font-size: clamp(1rem, 1.5vw, 1.15rem);
            color: #94a3b8;
            margin-bottom: 30px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: var(--primary);
            color: white;
            padding: 14px 28px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.4);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            width: 100%;
            max-width: 300px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px -5px rgba(37, 99, 235, 0.6);
        }

        .hero-card {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .pos-preview-box {
            width: 100%;
            max-width: 420px;
            height: 280px;
            background: linear-gradient(145deg, #1e293b, #0f172a);
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .pos-preview-box h2 {
            font-size: 48px;
            color: white;
            letter-spacing: 4px;
        }

        .pos-preview-box span {
            color: #3b82f6;
            font-weight: 600;
            letter-spacing: 6px;
            font-size: 14px;
            margin-top: 5px;
        }

        section {
            padding: 80px 5%;
        }

        .section-title {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 50px;
        }

        .section-title h2 {
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            color: var(--dark);
            font-weight: 800;
            margin-bottom: 15px;
        }

        .section-title p {
            color: var(--text-muted);
            font-size: 1.05rem;
        }

        /* Download Section */
        .download-section {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: white;
            text-align: center;
            padding: 80px 20px;
        }

        .download-box {
            max-width: 700px;
            margin: 0 auto;
        }

        .download-box h2 {
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            margin-bottom: 15px;
            font-weight: 800;
        }

        .download-box p {
            color: #94a3b8;
            margin-bottom: 30px;
            font-size: 1.1rem;
        }

        .version-text {
            display: block;
            margin-top: 15px;
            color: #64748b;
            font-size: 14px;
        }

        /* Features */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-box {
            background: white;
            padding: 35px 25px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            border: 1px solid var(--border);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        .feature-box i {
            font-size: 32px;
            color: var(--primary);
            margin-bottom: 20px;
            background: rgba(37, 99, 235, 0.1);
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        .feature-box h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .feature-box p {
            color: var(--text-muted);
            font-size: 15px;
        }

        /* Contact & Footer */
        .contact {
            text-align: center;
            background: var(--gray-light);
            border-top: 1px solid var(--border);
            padding: 60px 20px;
        }

        .contact h2 {
            font-size: 24px;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .contact p {
            color: var(--text-muted);
            margin-bottom: 25px;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 12px 20px;
            border-radius: 10px;
            border: 1px solid var(--border);
            font-weight: 600;
            color: var(--dark);
        }

        .contact-item i { color: var(--primary); }

        footer {
            background: var(--dark);
            color: #64748b;
            text-align: center;
            padding: 25px;
            font-size: 14px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        @media (max-width: 768px) {
            .navbar { padding: 0 20px; height: 65px; }
            .hamburger { display: block; }
            .nav-links {
                position: fixed;
                top: 65px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 65px);
                background: #0f172a;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 25px;
                transition: left 0.3s ease-in-out;
            }
            .nav-links.active { left: 0; }
            .hero { flex-direction: column; text-align: center; padding: 120px 20px 60px; }
        }

        .forgot-password {
            text-align: right;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        .forgot-password a {
            color: var(--primary);
            font-size: 14px;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="navbar">
        <a href="index.html" class="logo-container">
            <div class="mini-logo">POS</div>
            <span class="logo-text">PRO</span>
        </a>
        <button class="hamburger" id="hamburgerBtn" onclick="toggleMenu()">
            <i class="fa-solid fa-bars"></i>
        </button>
        <nav class="nav-links" id="navLinks">
            <a href="#features" onclick="closeMenu()">Fonctionnalités</a>
            <a href="#download" onclick="closeMenu()">Télécharger</a>
            <a href="#contact" onclick="closeMenu()">Contact</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <span class="badge">Solution Algérienne .DZ</span>
            <h1>La solution ultime pour la gestion de votre stock et ventes</h1>
            <p>Optimisez votre commerce avec POS Pro. Un logiciel rapide, sécurisé et parfaitement adapté aux besoins des professionnels en Algérie.</p>
            <a href="#download" class="btn-primary"><i class="fa-solid fa-download"></i> Télécharger le Logiciel</a>
        </div>
        <div class="hero-card">
            <div class="pos-preview-box">
                <h2>POS PRO</h2>
                <span>GESTION .DZ</span>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="download-section">
        <div class="download-box">
            <h2>Prêt à digitaliser votre commerce ?</h2>
            <p>Téléchargez la dernière version du logiciel dès maintenant.</p>
            <a href="POS.exe" class="btn-primary" style="margin: 0 auto; max-width: 320px;" download="POS.exe"><i class="fa-solid fa-cloud-arrow-down"></i> Télécharger (Setup .exe)</a>
            <span class="version-text">Compatible avec Windows 8.1 / 10 / 11</span>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features">
        <div class="section-title">
            <h2>Pourquoi Choisir POS Pro ?</h2>
            <p>Des outils robustes pour transformer la gestion quotidienne de votre commerce.</p>
        </div>
        <div class="features-grid">
            <div class="feature-box">
                <i class="fa-solid fa-bolt"></i>
                <h3>Rapide & Fluide</h3>
                <p>Interface conçue pour des performances maximales sur Windows sans latence.</p>
            </div>
            <div class="feature-box">
                <i class="fa-solid fa-shield-halved"></i>
                <h3>Sécurité & Rôles</h3>
                <p>Gestion stricte des utilisateurs et des permissions avec journalisation complète.</p>
            </div>
            <div class="feature-box">
                <i class="fa-solid fa-barcode"></i>
                <h3>Gestion de Barcode</h3>
                <p>Génération automatique de codes-barres et suivi précis des articles et des prix.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2>Contactez-nous</h2>
        <p>Pour l'achat de licence ou toute demande d'assistance :</p>
        <div class="contact-info">
            <div class="contact-item"><i class="fa-solid fa-phone"></i> +213 (0) 7 79 62 58 67</div>
            <div class="contact-item"><i class="fa-solid fa-envelope"></i> contact@pospro.lol</div>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 POS Pro System. Tous droits réservés.</p>
    </footer>

    <!-- Appwrite & UI Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/appwrite@14.0.1"></script>
    <script>
        const { Client, Databases, Query } = Appwrite;
        const client = new Client()
            .setEndpoint('https://fra.cloud.appwrite.io/v1')
            .setProject('6abe94b500149981a9c2');

        const databases = new Databases(client);
        const DATABASE_ID = '6abe955d003d5da5415b';
        const COLLECTION_ID = '6abe9d4b0031f85bf410';

        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            navLinks.classList.toggle('active');
            const icon = hamburgerBtn.querySelector('i');
            if (navLinks.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            } else {
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }
        }

        function closeMenu() {
            const navLinks = document.getElementById('navLinks');
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            navLinks.classList.remove('active');
            const icon = hamburgerBtn.querySelector('i');
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars');
        }

        // دالة استرجاع كلمة المرور
        async function forgotPassword() {
            const email = prompt("Veuillez entrer votre adresse e-mail pour retrouver votre mot de passe :");
            if (!email) return;

            try {
                const response = await databases.listDocuments(DATABASE_ID, COLLECTION_ID, [
                    Query.equal('email', email.trim())
                ]);

                if (response.documents.length > 0) {
                    const user = response.documents[0];
                    alert(`Compte trouvé !\nVotre mot de passe actuel est : ${user.password}`);
                } else {
                    alert("Aucun compte trouvé avec cet e-mail.");
                }
            } catch (err) {
                console.error(err);
                alert("Erreur lors de la recherche du compte.");
            }
        }
    </script>
</body>
</html>
