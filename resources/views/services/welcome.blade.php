<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Art de Recevoir • Accueil Personnalisé | Casa Del Concierge</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ============================================
           DESIGN TOKENS (Système de la Homepage)
           ============================================ */
        :root {
            --primary: #FF385C;
            --primary-dark: #E31C5F;
            --primary-glow: rgba(255, 56, 92, 0.2);
            
            --neutral-950: #0A0A0B; --neutral-900: #141416; --neutral-800: #1F1F23;
            --neutral-600: #52525B; --neutral-500: #71717A; --neutral-400: #A1A1AA;
            --neutral-200: #E4E4E7; --neutral-100: #F4F4F5; --neutral-50: #FAFAFA;
            --white: #FFFFFF;
            
            --ease-out-expo: cubic-bezier(0.16, 1, 0.3, 1);
            --ease-in-out-expo: cubic-bezier(0.87, 0, 0.13, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--neutral-900);
            background-color: var(--neutral-50);
            overflow-x: hidden;
            cursor: none;
            -webkit-font-smoothing: antialiased;
            margin: 0; padding: 0;
        }

        .font-serif { font-family: 'Playfair Display', serif; }

        /* Lenis Smooth Scroll */
        html.lenis { height: auto; }
        .lenis.lenis-smooth { scroll-behavior: auto; }
        .lenis.lenis-stopped { overflow: hidden; }

        .container {
            width: 100%; max-width: 1320px; margin: 0 auto;
            padding: 0 clamp(1.5rem, 5vw, 4rem);
        }

        /* Grain Texture */
        .noise-bg {
            position: fixed; inset: 0; z-index: 50; pointer-events: none;
            background-image: url('https://grainy-gradients.vercel.app/noise.svg');
            opacity: 0.05; mix-blend-mode: multiply;
        }

        /* ============================================
           PRELOADER "L'OUVERTURE DES PORTES"
           ============================================ */
        .loader-wrap {
            position: fixed; inset: 0; z-index: 9999; display: flex;
            pointer-events: none;
        }
        .door {
            width: 50vw; height: 100vh; background: var(--neutral-950);
            position: relative; display: flex; align-items: center;
        }
        .door-left { justify-content: flex-end; padding-right: 10px; }
        .door-right { justify-content: flex-start; padding-left: 10px; }
        
        .loader-word {
            color: var(--white); font-size: 1.5rem; font-weight: 500;
            letter-spacing: 0.2em; text-transform: uppercase;
            overflow: hidden;
        }
        .loader-word span {
            display: inline-block; transform: translateY(100%);
        }

        /* ============================================
           CUSTOM CURSOR
           ============================================ */
        .cursor-dot {
            position: fixed; top: 0; left: 0; width: 6px; height: 6px;
            background: var(--primary); border-radius: 50%; pointer-events: none;
            z-index: 10001; transform: translate(-50%, -50%);
        }
        .cursor-ring {
            position: fixed; top: 0; left: 0; width: 40px; height: 40px;
            border: 1px solid rgba(255, 56, 92, 0.4); border-radius: 50%; pointer-events: none;
            z-index: 10000; transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s, background 0.3s, border-color 0.3s;
        }
        .cursor-ring.active {
            width: 70px; height: 70px; background: rgba(255, 56, 92, 0.1);
            border-color: transparent; backdrop-filter: blur(4px);
        }

        /* ============================================
           HERO SECTION
           ============================================ */
        .hero {
            position: relative; min-height: 100vh; display: flex; align-items: center;
            padding-top: 80px; overflow: hidden;
        }
        
        .hero-bg {
            position: absolute; inset: 0; z-index: 0;
        }
        .hero-bg img {
            width: 100%; height: 100%; object-fit: cover;
            transform: scale(1.1); /* Pour le dézoom initial */
            filter: brightness(0.85);
        }
        .hero-overlay {
            position: absolute; inset: 0; z-index: 1;
            background: linear-gradient(135deg, rgba(10,10,11,0.9) 0%, rgba(10,10,11,0.4) 100%);
        }

        .hero-content {
            position: relative; z-index: 2; width: 100%; color: var(--white);
        }

        .badge-welcome {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 8px 20px; background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 999px;
            backdrop-filter: blur(10px); color: var(--white); font-weight: 600; font-size: 0.75rem;
            letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 2rem;
            opacity: 0; transform: translateY(20px);
        }

        .hero-title {
            font-size: clamp(3rem, 7vw, 6.5rem); font-weight: 800; line-height: 1;
            letter-spacing: -0.03em; margin-bottom: 1.5rem;
        }
        
        .line-wrap { overflow: hidden; padding-bottom: 10px; }
        .line-inner { transform: translateY(110%); will-change: transform; }

        .hero-desc {
            font-size: clamp(1rem, 1.5vw, 1.25rem); color: rgba(255,255,255,0.8);
            max-width: 500px; line-height: 1.6; margin-bottom: 2.5rem;
            opacity: 0; transform: translateY(20px);
        }

        /* Bouton Primary */
        .btn-primary {
            background: var(--white); color: var(--neutral-950);
            padding: 18px 36px; border-radius: 999px;
            text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 12px;
            transition: all 0.4s var(--ease-out-expo);
            opacity: 0; transform: translateY(20px);
        }
        .btn-primary:hover {
            transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            background: var(--primary); color: var(--white);
        }

        /* ============================================
           PHILOSOPHY SECTION
           ============================================ */
        .philosophy-section {
            padding: 150px 0; background: var(--white); text-align: center;
        }
        .phil-text {
            font-size: clamp(2rem, 4vw, 3.5rem); font-weight: 500; line-height: 1.3;
            color: var(--neutral-900); max-width: 1000px; margin: 0 auto;
            letter-spacing: -0.02em;
        }
        /* Pour l'effet GSAP d'opacité au scroll */
        .char { opacity: 0.2; transition: opacity 0.1s; } 

        /* ============================================
           BENTO GRID (FEATURES)
           ============================================ */
        .bento-section {
            padding: 100px 0 150px; background: var(--neutral-50);
        }
        
        .section-header { text-align: center; margin-bottom: 4rem; }
        .sub-title {
            color: var(--primary); font-size: 11px; font-weight: 800;
            letter-spacing: 0.2em; text-transform: uppercase;
            padding: 8px 20px; background: rgba(255, 56, 92, 0.06);
            border-radius: 999px; display: inline-block; margin-bottom: 1rem;
        }
        .section-title { font-size: clamp(2.5rem, 4vw, 3.5rem); font-weight: 800; letter-spacing: -0.03em; color: var(--neutral-900); }

        .bento-grid {
            display: grid; grid-template-columns: repeat(3, 1fr);
            grid-template-rows: auto auto; gap: 24px;
        }
        
        .bento-card {
            background: var(--white); border-radius: 32px; padding: 40px;
            border: 1px solid rgba(0,0,0,0.04); box-shadow: 0 10px 30px rgba(0,0,0,0.02);
            transition: all 0.5s var(--ease-out-expo); position: relative; overflow: hidden;
            display: flex; flex-direction: column; justify-content: space-between;
        }
        .bento-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.06), 0 0 0 1px rgba(255, 56, 92, 0.1);
        }

        /* Tailles spécifiques pour la grille asymétrique */
        .card-large { grid-column: span 2; display: flex; flex-direction: row; align-items: center; gap: 40px; padding: 0; }
        .card-large .content { padding: 40px; flex: 1; }
        .card-large .img-wrap { width: 45%; height: 100%; }
        .card-large .img-wrap img { width: 100%; height: 100%; object-fit: cover; }

        .bento-icon {
            width: 60px; height: 60px; background: var(--neutral-50);
            border-radius: 20px; display: flex; align-items: center; justify-content: center;
            font-size: 24px; color: var(--primary); margin-bottom: 24px;
            transition: all 0.4s ease;
        }
        .bento-card:hover .bento-icon {
            background: var(--primary); color: white; transform: scale(1.1) rotate(-5deg);
        }
        
        .bento-title { font-size: 1.5rem; font-weight: 700; margin-bottom: 12px; color: var(--neutral-900); letter-spacing: -0.02em; }
        .bento-desc { color: var(--neutral-500); line-height: 1.6; font-size: 1rem; }

        /* ============================================
           TESTIMONIAL IMMERSIF
           ============================================ */
        .testimonial-parallax {
            height: 90vh; position: relative; display: flex; align-items: center; justify-content: center;
            overflow: hidden; background: var(--neutral-950); color: var(--white);
        }
        .testi-bg {
            position: absolute; inset: -20%; width: 140%; height: 140%;
            object-fit: cover; opacity: 0.3; filter: blur(4px);
        }
        .testi-content {
            position: relative; z-index: 10; text-align: center; max-width: 900px; padding: 0 2rem;
        }
        .quote-icon { font-size: 4rem; color: var(--primary); margin-bottom: 2rem; opacity: 0.5; }
        .testi-quote {
            font-size: clamp(2rem, 3.5vw, 3rem); font-weight: 400; line-height: 1.4;
            margin-bottom: 3rem;
        }
        .testi-author { font-size: 1.125rem; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: var(--neutral-300); }

        /* ============================================
           MAGNETIC CTA
           ============================================ */
        .cta-section {
            padding: 150px 0; display: flex; flex-direction: column;
            justify-content: center; align-items: center; background: var(--white);
        }
        .cta-title {
            font-size: clamp(2.5rem, 5vw, 4.5rem); font-weight: 900; letter-spacing: -0.04em;
            text-align: center; margin-bottom: 60px; color: var(--neutral-900);
        }
        .magnetic-wrap {
            position: relative; width: 200px; height: 200px;
            display: flex; justify-content: center; align-items: center;
        }
        .magnetic-btn {
            width: 140px; height: 140px; background: var(--primary); border-radius: 50%;
            display: flex; justify-content: center; align-items: center;
            color: white; font-weight: 700; font-size: 1rem; letter-spacing: 0.05em; text-transform: uppercase;
            text-decoration: none; box-shadow: 0 20px 40px rgba(255, 56, 92, 0.3);
            will-change: transform; transition: background 0.3s;
        }
        .magnetic-btn:hover { background: var(--primary-dark); }
        .magnetic-text { pointer-events: none; transition: transform 0.2s ease-out; }

        @media (max-width: 1024px) {
            .bento-grid { grid-template-columns: 1fr; }
            .card-large { grid-column: span 1; flex-direction: column; }
            .card-large .img-wrap { width: 100%; height: 250px; }
            .hero-title { font-size: 4rem; }
        }
    </style>
</head>
<body>

    <div class="noise-bg"></div>

    <div class="loader-wrap">
        <div class="door door-left">
            <div class="loader-word word-l"><span>L'Art de</span></div>
        </div>
        <div class="door door-right">
            <div class="loader-word word-r"><span>Recevoir</span></div>
        </div>
    </div>

    <div class="cursor-dot"></div>
    <div class="cursor-ring"></div>

    <nav style="position: fixed; top: 0; width: 100%; padding: 30px clamp(1.5rem, 5vw, 4rem); display: flex; justify-content: space-between; z-index: 50; mix-blend-mode: difference; color: white;">
        <a href="{{ route('welcome') }}" style="font-weight: 800; font-size: 20px; text-decoration: none; color: inherit;" class="hover-trigger">CDC.</a>
        <a href="{{ route('welcome') }}" style="font-weight: 600; text-decoration: none; color: inherit; font-size: 14px; letter-spacing: 0.1em;" class="hover-trigger">FERMER</a>
    </nav>

    <main>
        <section class="hero">
            <div class="hero-bg">
                <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=2000&auto=format&fit=crop" alt="Accueil chaleureux" class="hero-img-zoom">
                <div class="hero-overlay"></div>
            </div>

            <div class="container">
                <div class="hero-content">
                    <div class="badge-welcome">
                        <i class="fas fa-key"></i> Service Signature
                    </div>
                    <h1 class="hero-title">
                        <div class="line-wrap"><div class="line-inner">Le Premier Sourire.</div></div>
                        <div class="line-wrap"><div class="line-inner"><span class="font-serif italic" style="color: #ffb3c1;">Le Séjour Parfait.</span></div></div>
                    </h1>
                    <p class="hero-desc">
                        Oubliez les boîtes à clés anonymes. Chez Casa Del Concierge, un membre de notre équipe vous attend personnellement pour ouvrir les portes de votre nouvelle maison.
                    </p>
                    <a href="#services" class="btn-primary hover-trigger">
                        Découvrir l'expérience <i class="fas fa-arrow-down"></i>
                    </a>
                </div>
            </div>
        </section>

        <section class="philosophy-section">
            <div class="container">
                <p class="phil-text" id="split-text">
                    L'hospitalité ne s'improvise pas. C'est une chorégraphie subtile entre anticipation, chaleur humaine et discrétion absolue. Nous créons le sentiment d'être attendu.
                </p>
            </div>
        </section>

        <section class="bento-section" id="services">
            <div class="container">
                <div class="section-header stagger-up">
                    <span class="sub-title">LE CÉRÉMONIAL</span>
                    <h2 class="section-title">Les Détails qui font l'Exception</h2>
                </div>

                <div class="bento-grid">
                    <div class="bento-card card-large stagger-up hover-trigger">
                        <div class="content">
                            <div class="bento-icon"><i class="fas fa-door-open"></i></div>
                            <h3 class="bento-title">Accueil Physique Systématique</h3>
                            <p class="bento-desc">Nous vous attendons sur place à l'heure de votre choix. Présentation des équipements, visite des espaces et remise des clés en main propre. Une transition douce et rassurante vers vos vacances.</p>
                        </div>
                        <div class="img-wrap">
                            <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?q=80&w=1000&auto=format&fit=crop" alt="Visite de l'appartement">
                        </div>
                    </div>

                    <div class="bento-card stagger-up hover-trigger">
                        <div class="bento-icon"><i class="fas fa-gift"></i></div>
                        <h3 class="bento-title">Le Panier Signature</h3>
                        <p class="bento-desc">À votre arrivée, découvrez une sélection de produits locaux, vins fins ou attentions personnalisées selon le motif de votre voyage.</p>
                    </div>

                    <div class="bento-card stagger-up hover-trigger">
                        <div class="bento-icon"><i class="fas fa-map-marked-alt"></i></div>
                        <h3 class="bento-title">Curateur Local</h3>
                        <p class="bento-desc">Votre concierge vous confie ses adresses secrètes : le meilleur boulanger du quartier, la crique cachée, ou la table étoilée à ne pas manquer.</p>
                    </div>

                    <div class="bento-card stagger-up hover-trigger">
                        <div class="bento-icon"><i class="fas fa-mobile-alt"></i></div>
                        <h3 class="bento-title">Ligne Directe 24/7</h3>
                        <p class="bento-desc">Dès la remise des clés, vous recevez un numéro WhatsApp dédié. Une question à 2h du matin ? Nous répondons instantanément.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonial-parallax">
            <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?q=80&w=2000&auto=format&fit=crop" alt="Luxe" class="testi-bg">
            <div class="testi-content">
                <i class="fas fa-quote-left quote-icon"></i>
                <h2 class="testi-quote font-serif italic reveal-quote">
                    "Après 12 heures de vol, être accueilli avec un tel niveau de soin et une maison parfaitement préparée a instantanément effacé toute fatigue. Un service d'une rare élégance."
                </h2>
                <div class="testi-author reveal-quote">— Famille Laurent, Séjour Côte d'Azur</div>
            </div>
        </section>

        <section class="cta-section">
            <h2 class="cta-title">Entrez.<br>Vous êtes chez vous.</h2>
            
            <div class="magnetic-wrap">
                <a href="{{ route('houses.index') }}" class="magnetic-btn hover-trigger">
                    <span class="magnetic-text">RÉSERVER</span>
                </a>
            </div>
        </section>

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>
    
    <script>
        gsap.registerPlugin(ScrollTrigger);

        // 1. Smooth Scroll
        const lenis = new Lenis({ lerp: 0.08, smoothWheel: true });
        function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
        requestAnimationFrame(raf);

        // 2. Custom Cursor
        const dot = document.querySelector('.cursor-dot');
        const follower = document.querySelector('.cursor-follower');
        let mouseX = window.innerWidth / 2, mouseY = window.innerHeight / 2;
        let ringX = mouseX, ringY = mouseY;

        window.addEventListener('mousemove', e => {
            mouseX = e.clientX; mouseY = e.clientY;
            gsap.set(dot, { x: mouseX, y: mouseY });
        });

        gsap.ticker.add(() => {
            ringX += (mouseX - ringX) * 0.15;
            ringY += (mouseY - ringY) * 0.15;
            gsap.set(follower, { x: ringX, y: ringY });
        });

        document.querySelectorAll('a, .hover-trigger').forEach(el => {
            el.addEventListener('mouseenter', () => follower.classList.add('active'));
            el.addEventListener('mouseleave', () => follower.classList.remove('active'));
        });

        // 3. PRELOADER "Les Portes s'ouvrent"
        const tlLoader = gsap.timeline();
        
        tlLoader
            // Mots montent
            .to('.loader-word span', {y: '0%', duration: 0.6, ease: 'expo.out', stagger: 0.1})
            // Mots descendent (court delay)
            .to('.loader-word span', {y: '100%', duration: 0.4, ease: 'expo.in', delay: 0.3})
            // Les portes s'écartent
            .to('.door-left', {xPercent: -100, duration: 1, ease: 'expo.inOut'}, "open")
            .to('.door-right', {xPercent: 100, duration: 1, ease: 'expo.inOut'}, "open")
            // Cacher le wrapper
            .set('.loader-wrap', {display: 'none'})
            
            // HERO ANIMATIONS
            .to('.hero-img-zoom', {scale: 1, duration: 2, ease: 'power3.out'}, "open-=0.2")
            .to('.line-inner', {y: '0%', duration: 1, stagger: 0.1, ease: 'expo.out'}, "open+=0.2")
            .to(['.badge-welcome', '.hero-desc', '.btn-primary'], {
                y: 0, opacity: 1, duration: 0.8, stagger: 0.1, ease: 'power3.out'
            }, "open+=0.4");

        // 4. PHILOSOPHY KINETIC TEXT (SplitType)
        const philText = new SplitType('#split-text', { types: 'chars' });
        
        gsap.to(philText.chars, {
            opacity: 1,
            stagger: 0.02,
            scrollTrigger: {
                trigger: '.philosophy-section',
                start: 'top 70%',
                end: 'center center',
                scrub: true
            }
        });

        // 5. STAGGER REVEAL (Bento Grid)
        gsap.utils.toArray('.stagger-up').forEach((elem) => {
            gsap.from(elem, {
                y: 60, opacity: 0, duration: 1, ease: "expo.out",
                scrollTrigger: {
                    trigger: elem,
                    start: "top 85%",
                    toggleActions: "play none none none"
                }
            });
        });

        // 6. TESTIMONIAL PARALLAX & REVEAL
        gsap.to('.testi-bg', {
            yPercent: 30, ease: "none",
            scrollTrigger: {
                trigger: '.testimonial-parallax',
                start: "top bottom", end: "bottom top", scrub: true
            }
        });

        gsap.from('.reveal-quote', {
            y: 30, opacity: 0, duration: 1, stagger: 0.2, ease: "power3.out",
            scrollTrigger: {
                trigger: '.testimonial-parallax',
                start: "center 80%"
            }
        });

        // 7. MAGNETIC BUTTON LOGIC
        const magnetWrap = document.querySelector('.magnetic-wrap');
        const magnetBtn = document.querySelector('.magnetic-btn');
        const magnetText = document.querySelector('.magnetic-text');

        if(magnetWrap && window.innerWidth > 1024) {
            magnetWrap.addEventListener('mousemove', (e) => {
                const rect = magnetWrap.getBoundingClientRect();
                const hOrigin = rect.left + rect.width / 2;
                const vOrigin = rect.top + rect.height / 2;
                
                const hDist = e.clientX - hOrigin;
                const vDist = e.clientY - vOrigin;

                gsap.to(magnetBtn, { x: hDist * 0.3, y: vDist * 0.3, duration: 0.4, ease: "power2.out" });
                gsap.to(magnetText, { x: hDist * 0.1, y: vDist * 0.1, duration: 0.4, ease: "power2.out" });
            });

            magnetWrap.addEventListener('mouseleave', () => {
                gsap.to([magnetBtn, magnetText], { x: 0, y: 0, duration: 0.8, ease: "elastic.out(1, 0.3)" });
            });
        }
    </script>
</body>
</html>