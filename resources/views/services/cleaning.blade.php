<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nettoyage Premium • Casa Del Concierge</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ============================================
           DESIGN TOKENS (Cohérents avec ta Homepage)
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
            background-color: var(--white);
            overflow-x: hidden;
            cursor: none; /* Curseur personnalisé */
            -webkit-font-smoothing: antialiased;
            margin: 0;
            padding: 0;
        }

        /* Lenis Smooth Scroll */
        html.lenis { height: auto; }
        .lenis.lenis-smooth { scroll-behavior: auto; }
        .lenis.lenis-smooth [data-lenis-prevent] { overscroll-behavior: contain; }
        .lenis.lenis-stopped { overflow: hidden; }

        .container {
            width: 100%; max-width: 1440px; margin: 0 auto;
            padding: 0 clamp(1.5rem, 5vw, 4rem);
        }

        /* Grain Texture Overlay */
        .noise-bg {
            position: fixed; inset: 0; z-index: 50; pointer-events: none;
            background-image: url('https://grainy-gradients.vercel.app/noise.svg');
            opacity: 0.04;
        }

        /* ============================================
           PRELOADER "GOUTTE DE PURETÉ"
           ============================================ */
        .loader-wrap {
            position: fixed; inset: 0; background: var(--neutral-950);
            z-index: 9999; display: flex; justify-content: center; align-items: center;
        }
        .loader-mask {
            position: absolute; inset: 0; background: var(--white);
            clip-path: circle(0% at 50% 50%);
            z-index: 10000;
        }
        .loader-text {
            color: var(--white); font-size: 14px; font-weight: 600;
            letter-spacing: 0.3em; text-transform: uppercase;
            overflow: hidden; position: relative; z-index: 9999;
        }
        .loader-text span {
            display: inline-block; transform: translateY(100%);
        }

        /* ============================================
           CUSTOM CURSOR
           ============================================ */
        .cursor-dot {
            position: fixed; top: 0; left: 0; width: 6px; height: 6px;
            background: var(--neutral-950); border-radius: 50%; pointer-events: none;
            z-index: 10001; transform: translate(-50%, -50%);
        }
        .cursor-follower {
            position: fixed; top: 0; left: 0; width: 40px; height: 40px;
            border: 1px solid rgba(0,0,0,0.2); border-radius: 50%; pointer-events: none;
            z-index: 10000; transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s, background 0.3s, border-color 0.3s;
        }
        .cursor-follower.active {
            width: 80px; height: 80px; background: rgba(255, 56, 92, 0.1);
            border-color: transparent; backdrop-filter: blur(4px);
        }

        /* ============================================
           HERO SECTION - ARCHITECTURAL
           ============================================ */
        .hero {
            position: relative; min-height: 100vh; display: flex; align-items: center;
            padding-top: 80px; overflow: hidden;
        }
        
        .hero-title-container {
            position: relative; z-index: 10; width: 100%;
            mix-blend-mode: difference; color: white; pointer-events: none;
        }
        
        .hero-title {
            font-size: clamp(4rem, 9vw, 10rem); font-weight: 900; line-height: 0.9;
            letter-spacing: -0.05em; text-transform: uppercase; margin: 0;
            display: flex; flex-direction: column;
        }

        .line-wrap { overflow: hidden; padding-bottom: 20px; margin-bottom: -20px; }
        .line { transform: translateY(120%); will-change: transform; }
        
        .hero-title-accent {
            font-family: serif; font-style: italic; font-weight: 400; color: #ffb3c1;
        }

        /* Parallax Image Box */
        .hero-img-wrapper {
            position: absolute; right: 10%; top: 20%; width: 40vw; height: 70vh;
            border-radius: 20px; overflow: hidden; z-index: 1;
            clip-path: inset(100% 0 0 0); 
        }
        .hero-img-wrapper img {
            width: 100%; height: 100%; object-fit: cover;
            transform: scale(1.3);
            filter: brightness(0.95);
        }

        .hero-sub {
            position: absolute; bottom: 10%; left: clamp(1.5rem, 5vw, 4rem);
            max-width: 400px; z-index: 10;
        }
        .hero-sub p {
            font-size: 1.125rem; line-height: 1.6; color: var(--neutral-600);
            margin-bottom: 2rem; opacity: 0;
        }

        /* ============================================
           STICKY SCROLL SECTION (PROCESS)
           ============================================ */
        .sticky-section {
            background: var(--neutral-50); position: relative; padding: 150px 0;
        }
        .sticky-grid {
            display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: start;
        }
        
        .sticky-left {
            position: sticky; top: 150px; padding-bottom: 50px;
        }
        .sticky-title {
            font-size: clamp(3rem, 5vw, 5rem); font-weight: 800; letter-spacing: -0.04em;
            line-height: 1; color: var(--neutral-900); margin-bottom: 2rem;
        }
        .sticky-desc {
            font-size: 1.25rem; color: var(--neutral-500); max-width: 400px;
        }

        .sticky-right {
            display: flex; flex-direction: column; gap: 40px; margin-top: 100px;
        }

        /* Custom Bento Cards */
        .step-card {
            background: var(--white); border-radius: 32px; padding: 50px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.03);
            border: 1px solid rgba(0,0,0,0.04);
            transition: all 0.5s var(--ease-out-expo);
            position: relative; overflow: hidden;
        }
        .step-card::after {
            content: ''; position: absolute; inset: 0;
            background: radial-gradient(circle at top right, var(--primary-glow), transparent 70%);
            opacity: 0; transition: opacity 0.5s ease; pointer-events: none;
        }
        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 40px 80px -20px rgba(255, 56, 92, 0.15);
            border-color: rgba(255, 56, 92, 0.1);
        }
        .step-card:hover::after { opacity: 1; }
        
        .step-num {
            font-size: 1rem; font-weight: 700; color: var(--primary);
            margin-bottom: 20px; display: block; letter-spacing: 0.1em;
        }
        .step-card h3 {
            font-size: 2rem; font-weight: 800; letter-spacing: -0.03em;
            margin-bottom: 15px; color: var(--neutral-900);
        }
        .step-card p {
            color: var(--neutral-600); line-height: 1.7; font-size: 1.125rem;
        }

        /* ============================================
           STANDARDS (LARGE IMAGES)
           ============================================ */
        .standards-section {
            padding: 150px 0; background: var(--white);
        }
        .standard-row {
            display: grid; grid-template-columns: 1fr 1fr; gap: 60px;
            align-items: center; margin-bottom: 120px;
        }
        .standard-row:nth-child(even) { direction: rtl; }
        .standard-row:nth-child(even) > * { direction: ltr; }

        .standard-img-wrap {
            border-radius: 30px; overflow: hidden; position: relative; height: 600px;
        }
        .standard-img-wrap img {
            width: 100%; height: 100%; object-fit: cover;
            transform: scale(1.2); 
        }

        .standard-info h3 {
            font-size: clamp(2.5rem, 4vw, 4rem); font-weight: 800; letter-spacing: -0.04em;
            margin-bottom: 30px; line-height: 1.1;
        }
        .standard-info p {
            font-size: 1.25rem; color: var(--neutral-500); line-height: 1.7; max-width: 450px;
        }

        /* ============================================
           MAGNETIC CTA SECTION
           ============================================ */
        .cta-section {
            height: 80vh; display: flex; flex-direction: column;
            justify-content: center; align-items: center;
            background: var(--neutral-950); color: var(--white);
            position: relative; overflow: hidden;
        }
        .cta-title {
            font-size: clamp(3rem, 6vw, 6rem); font-weight: 900; letter-spacing: -0.04em;
            text-align: center; margin-bottom: 60px; z-index: 2;
        }

        /* Magnetic Button Container */
        .magnetic-wrap {
            position: relative; width: 250px; height: 250px;
            display: flex; justify-content: center; align-items: center; z-index: 10;
        }
        .magnetic-btn {
            width: 160px; height: 160px; background: var(--primary); border-radius: 50%;
            display: flex; justify-content: center; align-items: center;
            color: white; font-weight: 700; font-size: 1.125rem; letter-spacing: 0.05em;
            text-decoration: none; box-shadow: 0 20px 40px rgba(255, 56, 92, 0.4);
            will-change: transform; transition: background 0.3s;
        }
        .magnetic-btn:hover { background: var(--primary-dark); }
        
        .magnetic-text { pointer-events: none; transition: transform 0.2s ease-out; }

        @media (max-width: 1024px) {
            .hero-img-wrapper { position: relative; width: 100%; height: 50vh; right: auto; top: auto; margin-top: 40px; }
            .hero-title-container { mix-blend-mode: normal; color: var(--neutral-900); }
            .hero-title-accent { color: var(--primary); }
            .sticky-grid { grid-template-columns: 1fr; gap: 40px; }
            .sticky-left { position: relative; top: auto; padding-bottom: 0; }
            .sticky-right { margin-top: 0; }
            .standard-row { grid-template-columns: 1fr; gap: 40px; margin-bottom: 80px; }
            .standard-row:nth-child(even) { direction: ltr; }
            .standard-img-wrap { height: 400px; }
        }
    </style>
</head>
<body>

    <div class="noise-bg"></div>

    <div class="loader-wrap">
        <div class="loader-text"><span>Initialisation</span></div>
    </div>
    <div class="loader-mask"></div> 

    <div class="cursor-dot"></div>
    <div class="cursor-follower"></div>

    <nav style="position: fixed; top: 0; width: 100%; padding: 30px 50px; display: flex; justify-content: space-between; z-index: 50; mix-blend-mode: difference; color: white;">
        <a href="{{ route('welcome') }}" style="font-weight: 800; font-size: 20px; text-decoration: none; color: inherit;" class="hover-trigger">CDC.</a>
        <a href="{{ route('welcome') }}" style="font-weight: 600; text-decoration: none; color: inherit; font-size: 14px;" class="hover-trigger">FERMER</a>
    </nav>

    <main>
        <section class="hero container">
            <div class="hero-title-container">
                <h1 class="hero-title">
                    <div class="line-wrap"><div class="line">Le Luxe</div></div>
                    <div class="line-wrap"><div class="line">Par la</div></div>
                    <div class="line-wrap"><div class="line hero-title-accent">Pureté.</div></div>
                </h1>
            </div>

            <div class="hero-img-wrapper" id="parallaxBox">
                <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=90&w=2000&auto=format&fit=crop" alt="Intérieur luxueux" id="parallaxImg">
            </div>

            <div class="hero-sub">
                <p class="hero-desc-text">Un protocole clinique appliqué à l'hôtellerie de luxe. Respirez, vous êtes dans un espace totalement assaini.</p>
                <a href="#methode" class="hover-trigger" style="background: var(--neutral-900); color: white; padding: 16px 32px; border-radius: 999px; text-decoration: none; font-weight: 600; display: inline-block;">
                    Découvrir le protocole
                </a>
            </div>
        </section>

        <section class="sticky-section" id="methode">
            <div class="container sticky-grid">
                
                <div class="sticky-left">
                    <h2 class="sticky-title">L'art de ne rien laisser au hasard.</h2>
                    <p class="sticky-desc">Quatre étapes implacables avant la remise des clés. Notre méthodologie ne tolère aucune exception.</p>
                </div>

                <div class="sticky-right">
                    <div class="step-card hover-trigger">
                        <span class="step-num">01 — AUDIT</span>
                        <h3>Analyse de l'espace</h3>
                        <p>Avant d'agir, nous observons. Identification des zones critiques, choix des agents nettoyants spécifiques selon les matériaux (marbre, bois massif, velours).</p>
                    </div>
                    
                    <div class="step-card hover-trigger">
                        <span class="step-num">02 — ACTION</span>
                        <h3>Nettoyage Profond</h3>
                        <p>Traitement de chaque surface avec des solutions certifiées Écolabel. Aspiration HEPA pour éliminer les micro-particules invisibles à l'œil nu.</p>
                    </div>

                    <div class="step-card hover-trigger">
                        <span class="step-num">03 — SÉCURITÉ</span>
                        <h3>Désinfection Clinique</h3>
                        <p>Application de virucides et bactéricides sur les 40 points de contact les plus fréquents (poignées, interrupteurs, robinetterie, télécommandes).</p>
                    </div>

                    <div class="step-card hover-trigger">
                        <span class="step-num">04 — GARANTIE</span>
                        <h3>Le Sceau de Validation</h3>
                        <p>Contrôle qualité final par un superviseur indépendant. Le logement est ensuite aéré, parfumé délicatement et "scellé" jusqu'à votre entrée.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="standards-section container">
            
            <div class="standard-row">
                <div class="standard-img-wrap img-parallax">
                    <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457?q=90&w=2000&auto=format&fit=crop" alt="Linge">
                </div>
                <div class="standard-info">
                    <h3 class="reveal-up">Blanchisserie<br>Hôtelière.</h3>
                    <p class="reveal-up">Draps en percale de coton, peignoirs épais et serviettes moelleuses. Tout notre linge est traité à plus de 60°C dans des installations professionnelles pour une destruction totale des allergènes.</p>
                </div>
            </div>

            <div class="standard-row">
                <div class="standard-img-wrap img-parallax">
                    <img src="https://images.unsplash.com/photo-1499933374294-4584851497cc?q=90&w=2000&auto=format&fit=crop" alt="Aération et air pur">
                </div>
                <div class="standard-info">
                    <h3 class="reveal-up">Une Qualité<br>d'Air Inédite.</h3>
                    <p class="reveal-up">La propreté se respire. Nous appliquons des protocoles stricts d'aération croisée et de vérification des VMC pour vous assurer un environnement sain dès la première seconde.</p>
                </div>
            </div>

        </section>

        <section class="cta-section">
            <h2 class="cta-title">L'esprit tranquille.<br>Le séjour parfait.</h2>
            
            <div class="magnetic-wrap">
                <a href="{{ route('houses.index') }}" class="magnetic-btn hover-trigger">
                    <span class="magnetic-text">RÉSERVER</span>
                </a>
            </div>
        </section>

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
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

        // 3. ULTRA-PREMIUM LOADER ("The Wipe")
        const tlLoader = gsap.timeline();
        
        tlLoader
            .to('.loader-text span', {y: '0%', duration: 0.5, ease: 'expo.out'})
            .to('.loader-text span', {y: '-100%', duration: 0.4, ease: 'expo.in', delay: 0.4})
            .to('.loader-mask', {
                clipPath: 'circle(150% at 50% 50%)', 
                duration: 1.2, 
                ease: 'expo.inOut'
            }, "-=0.2")
            .set('.loader-wrap', {display: 'none'})
            .set('.loader-mask', {display: 'none'})
            .to('.hero-img-wrapper', {
                clipPath: 'inset(0% 0 0 0)', 
                duration: 1.5, 
                ease: 'expo.out'
            }, "-=0.8")
            .to('.hero-img-wrapper img', {
                scale: 1, 
                duration: 2, 
                ease: 'power3.out'
            }, "-=1.5")
            .to('.line', {
                y: '0%', 
                stagger: 0.1, 
                duration: 1.2, 
                ease: 'expo.out'
            }, "-=1.4")
            .to('.hero-desc-text, .btn-discover', {
                opacity: 1, 
                y: 0, 
                stagger: 0.1, 
                duration: 1, 
                ease: 'power3.out'
            }, "-=1");

        // 4. Parallax effect on Hero Image
        const parallaxBox = document.getElementById('parallaxBox');
        const parallaxImg = document.getElementById('parallaxImg');
        
        window.addEventListener('mousemove', (e) => {
            if(window.scrollY < window.innerHeight) {
                const x = (e.clientX / window.innerWidth - 0.5) * 20;
                const y = (e.clientY / window.innerHeight - 0.5) * 20;
                gsap.to(parallaxImg, {
                    x: x,
                    y: y,
                    duration: 1,
                    ease: "power2.out"
                });
            }
        });

        // 5. Scroll Animations
        gsap.utils.toArray('.img-parallax img').forEach(img => {
            gsap.to(img, {
                yPercent: 20,
                ease: "none",
                scrollTrigger: {
                    trigger: img.parentElement,
                    start: "top bottom",
                    end: "bottom top",
                    scrub: true
                }
            });
        });

        gsap.utils.toArray('.reveal-up').forEach(elem => {
            gsap.from(elem, {
                y: 50, opacity: 0, duration: 1, ease: "expo.out",
                scrollTrigger: {
                    trigger: elem,
                    start: "top 85%",
                }
            });
        });

        // 6. MAGNETIC BUTTON LOGIC
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

                gsap.to(magnetBtn, {
                    x: hDist * 0.3,
                    y: vDist * 0.3,
                    duration: 0.4,
                    ease: "power2.out"
                });
                
                gsap.to(magnetText, {
                    x: hDist * 0.1,
                    y: vDist * 0.1,
                    duration: 0.4,
                    ease: "power2.out"
                });
            });

            magnetWrap.addEventListener('mouseleave', () => {
                gsap.to([magnetBtn, magnetText], {
                    x: 0, y: 0, duration: 0.8, ease: "elastic.out(1, 0.3)"
                });
            });
        }
    </script>
</body>
</html>