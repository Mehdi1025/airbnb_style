<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Art de la Pureté • Nettoyage Premium | Casa Del Concierge</title>
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/jpeg">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpeg') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ============================================
           DESIGN TOKENS - Adaptés de ta Homepage
           ============================================ */
        :root {
            --primary: #FF385C;
            --primary-glow: rgba(255, 56, 92, 0.2);
            --neutral-950: #0A0A0B; --neutral-900: #141416;
            --neutral-600: #52525B; --neutral-500: #71717A;
            --neutral-100: #F4F4F5; --neutral-50: #FAFAFA;
            --white: #FFFFFF;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--neutral-900);
            background-color: var(--neutral-50);
            overflow-x: hidden;
            cursor: none;
            -webkit-font-smoothing: antialiased;
            margin: 0;
            padding: 0;
        }

        /* Lenis Smooth Scroll */
        html.lenis { height: auto; }
        .lenis.lenis-smooth { scroll-behavior: auto; }

        .container {
            width: 100%;
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 clamp(1.5rem, 5vw, 3rem);
        }

        /* ============================================
           ULTRA-FAST & BEAUTIFUL PRELOADER
           ============================================ */
        .loader-bg {
            position: fixed;
            inset: 0;
            background-color: var(--white);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transform-origin: top;
        }
        
        .loader-content {
            overflow: hidden;
            margin-bottom: 20px;
        }

        .loader-text {
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.4em;
            color: var(--neutral-900);
            text-transform: uppercase;
            transform: translateY(100%); /* Initial state for GSAP */
        }

        .loader-progress-container {
            width: 200px;
            height: 1px;
            background: var(--neutral-200);
            overflow: hidden;
        }

        .loader-progress-bar {
            width: 100%;
            height: 100%;
            background: var(--primary);
            transform: scaleX(0);
            transform-origin: left;
        }

        /* ============================================
           CUSTOM CURSOR
           ============================================ */
        .cursor-dot {
            position: fixed; top: 0; left: 0; width: 6px; height: 6px;
            background: var(--primary); border-radius: 50%; pointer-events: none;
            z-index: 10000; transform: translate(-50%, -50%);
        }
        .cursor-ring {
            position: fixed; top: 0; left: 0; width: 40px; height: 40px;
            border: 1px solid rgba(255, 56, 92, 0.4); border-radius: 50%; pointer-events: none;
            z-index: 9999; transform: translate(-50%, -50%);
            transition: width 0.2s, height 0.2s, background 0.2s, border-color 0.2s;
        }
        .cursor-ring.active {
            width: 70px; height: 70px; background: rgba(255, 56, 92, 0.1);
            border-color: transparent; backdrop-filter: blur(4px);
        }

        /* ============================================
           HERO SECTION - SNAPPY & CLEAN
           ============================================ */
        .hero {
            height: 100vh; position: relative; overflow: hidden;
            display: flex; align-items: center;
        }
        .hero-bg {
            position: absolute; inset: 0; z-index: 0;
            background-color: var(--white);
        }
        .hero-img-wrapper {
            position: absolute; top: 5%; right: 5%; width: 55%; height: 90%;
            border-radius: 30px; overflow: hidden;
            box-shadow: 0 40px 80px rgba(0,0,0,0.1);
            /* Hidden initially for loader */
            opacity: 0; 
            transform: scale(1.1) rotateY(10deg);
        }
        .hero-img-wrapper img {
            width: 100%; height: 100%; object-fit: cover;
            filter: brightness(1.05) contrast(1.02);
        }
        .hero-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(90deg, var(--white) 40%, transparent 100%);
            z-index: 1;
        }
        
        .hero-content {
            position: relative; z-index: 2; width: 50%;
            padding-left: clamp(1.5rem, 5vw, 3rem);
        }

        .badge-clean {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 8px 16px; background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2); border-radius: 999px;
            color: #059669; font-weight: 700; font-size: 0.75rem;
            letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.5rem;
            opacity: 0; /* GSAP */
        }

        .title-huge {
            font-size: clamp(3rem, 6vw, 5.5rem); font-weight: 900; line-height: 0.95;
            letter-spacing: -0.04em; color: var(--neutral-950);
            margin-bottom: 1.5rem;
        }

        .line-wrapper { overflow: hidden; padding-bottom: 10px; }
        .line-inner { transform: translateY(110%); } /* GSAP */

        .hero-desc {
            font-size: 1.125rem; color: var(--neutral-500); max-width: 480px; 
            line-height: 1.6; margin-bottom: 2rem;
            opacity: 0; /* GSAP */
        }

        /* Buttons */
        .btn-discover {
            background: var(--neutral-950); color: var(--white);
            padding: 16px 32px; border-radius: 999px;
            text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 12px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            opacity: 0; /* GSAP */
        }
        .btn-discover:hover {
            transform: translateY(-4px); box-shadow: 0 16px 32px rgba(0,0,0,0.2); background: var(--primary);
        }

        /* ============================================
           PROCESS SECTION & CARDS
           ============================================ */
        .process-section { padding: 6rem 0; position: relative; }
        
        .section-header { text-align: center; margin-bottom: 4rem; }
        .sub-title {
            color: var(--primary); font-size: 11px; font-weight: 800;
            letter-spacing: 0.2em; text-transform: uppercase;
            padding: 8px 20px; background: rgba(255, 56, 92, 0.06);
            border-radius: 999px; display: inline-block; margin-bottom: 1rem;
        }
        .section-title { font-size: 2.5rem; font-weight: 800; letter-spacing: -0.03em; }

        .why-cards {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px;
        }

        .why-card {
            background: var(--white); border-radius: 28px;
            border: 1px solid rgba(0,0,0,0.04); padding: 40px 32px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.04); transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative; overflow: hidden;
            opacity: 0; transform: translateY(40px); /* GSAP */
        }
        .why-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 32px 64px -16px rgba(0,0,0,0.08), 0 0 0 1px rgba(16, 185, 129, 0.2);
        }
        .why-card-icon {
            width: 64px; height: 64px; background: var(--neutral-50);
            border-radius: 20px; display: flex; align-items: center; justify-content: center;
            font-size: 24px; color: var(--primary); margin-bottom: 24px;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .why-card:hover .why-card-icon {
            background: var(--primary); color: white; transform: scale(1.1) rotate(-5deg);
        }
        .step-number-bg {
            position: absolute; top: -10px; right: -10px; font-size: 120px; font-weight: 900;
            color: var(--neutral-100); opacity: 0.5; z-index: 0; transition: all 0.4s ease;
        }
        .why-card:hover .step-number-bg { color: rgba(16, 185, 129, 0.05); transform: scale(1.1); }
        
        .why-card-title { font-size: 1.25rem; font-weight: 700; margin-bottom: 12px; position: relative; z-index: 1; }
        .why-card-desc { color: var(--neutral-500); line-height: 1.6; font-size: 0.875rem; position: relative; z-index: 1; }

        @media (max-width: 1024px) {
            .hero-content { width: 100%; text-align: center; padding: 0; display: flex; flex-direction: column; align-items: center; }
            .hero-img-wrapper { display: none; }
            .hero-overlay { background: rgba(255,255,255,0.9); }
        }
    </style>
</head>
<body>

    <div class="loader-bg">
        <div class="loader-content">
            <div class="loader-text">Pureté.</div>
        </div>
        <div class="loader-progress-container">
            <div class="loader-progress-bar"></div>
        </div>
    </div>

    <div class="cursor-dot"></div>
    <div class="cursor-ring"></div>

    <nav style="position: fixed; top: 0; width: 100%; padding: 30px 50px; display: flex; justify-content: space-between; align-items: center; z-index: 50; mix-blend-mode: difference; color: white;">
        <a href="{{ route('welcome') }}" style="text-decoration: none; color: inherit; line-height: 0; display: inline-block;" class="hover-trigger" title="Casa Del Concierge — Accueil">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Casa Del Concierge" style="height:2.5rem;max-height:40px;width:auto;object-fit:contain;">
        </a>
        <a href="{{ route('welcome') }}" style="font-weight: 600; text-decoration: none; color: inherit; font-size: 14px;" class="hover-trigger">FERMER</a>
    </nav>

    <main>
        <section class="hero">
            <div class="hero-bg">
                <div class="hero-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=2000&auto=format&fit=crop" alt="Salle de bain immaculée">
                </div>
                <div class="hero-overlay"></div>
            </div>

            <div class="hero-content">
                <div class="badge-clean">
                    <i class="fas fa-shield-virus"></i> Standard 5 Étoiles
                </div>
                <h1 class="title-huge">
                    <div class="line-wrapper"><div class="line-inner">L'Art</div></div>
                    <div class="line-wrapper"><div class="line-inner">Invisible</div></div>
                    <div class="line-wrapper"><div class="line-inner">De La <span style="color: var(--primary)">Pureté.</span></div></div>
                </h1>
                <p class="hero-desc">
                    Un environnement sain n'est pas une option. Nos équipes appliquent des protocoles de nettoyage cliniques pour votre absolue tranquillité d'esprit.
                </p>
                <a href="{{ route('houses.index') }}" class="btn-discover hover-trigger">
                    Réserver en confiance <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>

        <section class="process-section">
            <div class="container">
                <div class="section-header">
                    <span class="sub-title">MÉTHODOLOGIE</span>
                    <h2 class="section-title">Un Processus Implacable</h2>
                </div>

                <div class="why-cards">
                    <div class="why-card stagger-card hover-trigger">
                        <div class="step-number-bg">1</div>
                        <div class="why-card-icon"><i class="fas fa-search"></i></div>
                        <h3 class="why-card-title">Audit Initial</h3>
                        <p class="why-card-desc">Chaque recoin est inspecté avant intervention pour cibler les zones nécessitant un traitement approfondi spécifique.</p>
                    </div>
                    <div class="why-card stagger-card hover-trigger">
                        <div class="step-number-bg">2</div>
                        <div class="why-card-icon"><i class="fas fa-soap"></i></div>
                        <h3 class="why-card-title">Nettoyage Actif</h3>
                        <p class="why-card-desc">Aspiration, dépoussiérage et lavage en profondeur avec des agents nettoyants écologiques de grade professionnel.</p>
                    </div>
                    <div class="why-card stagger-card hover-trigger">
                        <div class="step-number-bg">3</div>
                        <div class="why-card-icon"><i class="fas fa-virus-slash"></i></div>
                        <h3 class="why-card-title">Désinfection</h3>
                        <p class="why-card-desc">Traitement virucide et bactéricide de tous les points de contact (poignées, télécommandes, interrupteurs).</p>
                    </div>
                    <div class="why-card stagger-card hover-trigger">
                        <div class="step-number-bg">4</div>
                        <div class="why-card-icon"><i class="fas fa-clipboard-check"></i></div>
                        <h3 class="why-card-title">Validation</h3>
                        <p class="why-card-desc">Un superviseur effectue un contrôle en 50 points et scelle le logement jusqu'à votre arrivée.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section style="padding: 100px 0; text-align: center; background: var(--neutral-950); color: white;">
            <div class="container">
                <h2 style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; margin-bottom: 32px; letter-spacing: -0.02em;">Respirez.<br>Vous êtes chez vous.</h2>
                <a href="{{ route('welcome') }}" class="btn-discover hover-trigger" style="background: white; color: black;">
                    Retour à l'accueil <i class="fas fa-home"></i>
                </a>
            </div>
        </section>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>
    
    <script>
        gsap.registerPlugin(ScrollTrigger);

        // 1. Lenis Smooth Scroll
        const lenis = new Lenis({ lerp: 0.1, smoothWheel: true });
        function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
        requestAnimationFrame(raf);

        // 2. Custom Cursor (Optimized)
        const cursorDot = document.querySelector('.cursor-dot');
        const cursorRing = document.querySelector('.cursor-ring');
        
        let mouseX = window.innerWidth / 2, mouseY = window.innerHeight / 2;
        let ringX = mouseX, ringY = mouseY;

        window.addEventListener('mousemove', (e) => {
            mouseX = e.clientX; mouseY = e.clientY;
            gsap.set(cursorDot, { x: mouseX, y: mouseY });
        });

        gsap.ticker.add(() => {
            ringX += (mouseX - ringX) * 0.2; // Faster follow
            ringY += (mouseY - ringY) * 0.2;
            gsap.set(cursorRing, { x: ringX, y: ringY });
        });

        document.querySelectorAll('a, button, .hover-trigger').forEach(el => {
            el.addEventListener('mouseenter', () => cursorRing.classList.add('active'));
            el.addEventListener('mouseleave', () => cursorRing.classList.remove('active'));
        });

        // 3. Fast & Beautiful Loader Sequence
        const tlLoader = gsap.timeline();
        
        // Sequence: Text up -> Bar fills -> Screen wipes up -> Hero animates
        tlLoader
            .to(".loader-text", { y: "0%", duration: 0.5, ease: "expo.out" })
            .to(".loader-progress-bar", { scaleX: 1, duration: 0.6, ease: "power3.inOut" }, "-=0.2")
            .to(".loader-text", { y: "-100%", opacity: 0, duration: 0.3, ease: "power2.in" })
            .to(".loader-bg", { height: 0, duration: 0.8, ease: "expo.inOut" })
            
            // Hero Animations chained immediately
            .to(".hero-img-wrapper", { opacity: 1, scale: 1, rotateY: 0, duration: 1.2, ease: "expo.out" }, "-=0.4")
            .to(".badge-clean", { opacity: 1, y: 0, duration: 0.6, ease: "power3.out" }, "-=1")
            .to(".line-inner", { y: "0%", stagger: 0.1, duration: 0.8, ease: "expo.out" }, "-=0.8")
            .to([".hero-desc", ".btn-discover"], { opacity: 1, y: 0, stagger: 0.1, duration: 0.8, ease: "power3.out" }, "-=0.6");

        // 4. Scroll Reveal for Cards
        gsap.utils.toArray('.stagger-card').forEach((card, i) => {
            gsap.to(card, {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: "expo.out",
                scrollTrigger: {
                    trigger: card,
                    start: "top 85%",
                    toggleActions: "play none none none"
                }
            });
        });
    </script>
</body>
</html>