<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emplacements Privilégiés • Casa Del Concierge</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=Space+Grotesk:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        :root {
            --color-text: #1a1a1a;
            --color-bg: #f5f2eb; /* Beige luxe */
            --color-accent: #ff385c;
        }

        body {
            background-color: var(--color-bg);
            color: var(--color-text);
            font-family: 'Space Grotesk', sans-serif;
            overflow-x: hidden;
            cursor: none; /* Cache le curseur par défaut */
        }

        h1, h2, h3, .serif {
            font-family: 'Playfair Display', serif;
        }

        /* Lenis Recommended CSS */
        html.lenis { height: auto; }
        .lenis.lenis-smooth { scroll-behavior: auto; }
        .lenis.lenis-smooth [data-lenis-prevent] { overscroll-behavior: contain; }
        .lenis.lenis-stopped { overflow: hidden; }
        
        /* Custom Cursor */
        .cursor {
            width: 20px;
            height: 20px;
            border: 1px solid var(--color-text);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transition: transform 0.1s ease, background-color 0.2s ease;
            mix-blend-mode: difference;
        }
        
        .cursor.active {
            transform: scale(4);
            background-color: white;
            border-color: transparent;
        }

        /* Image Mask Animation */
        .reveal-img {
            clip-path: inset(0 100% 0 0);
            transition: clip-path 1.5s cubic-bezier(0.77, 0, 0.175, 1);
        }
        .reveal-img.visible {
            clip-path: inset(0 0 0 0);
        }

        .line-wrapper { overflow: hidden; }
        .line-text { transform: translateY(100%); }
    </style>
</head>
<body class="antialiased">

    <div class="cursor"></div>

    <div class="fixed inset-0 bg-[#1a1a1a] z-[1001] flex items-center justify-center text-[#f5f2eb] transition-transform duration-1000 ease-[cubic-bezier(0.77,0,0.175,1)]" id="preloader">
        <div class="text-4xl serif italic">Casa Del Concierge</div>
    </div>

    <nav class="fixed top-0 w-full p-8 flex justify-between items-center z-50 mix-blend-difference text-white">
        <a href="#" class="text-2xl font-bold tracking-tighter hover-trigger" data-cursor="link">CDC.</a>
        <div class="hidden md:flex gap-8 text-sm uppercase tracking-widest">
            <a href="#" class="hover-trigger relative group" data-cursor="link">
                Accueil
                <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-white transition-all group-hover:w-full"></span>
            </a>
            <a href="#" class="hover-trigger relative group" data-cursor="link">
                Biens
                <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-white transition-all group-hover:w-full"></span>
            </a>
        </div>
    </nav>

    <header class="relative min-h-screen flex flex-col justify-center px-6 md:px-20 pt-20">
        <div class="relative z-10">
            <div class="line-wrapper">
                <p class="line-text text-sm md:text-base uppercase tracking-[0.2em] mb-4 opacity-70">Collection Exclusive</p>
            </div>
            <div class="line-wrapper">
                <h1 class="line-text text-[15vw] leading-[0.85] font-medium tracking-tighter text-[#1a1a1a]">
                    QUARTIERS
                </h1>
            </div>
            <div class="line-wrapper flex items-center gap-4 md:gap-8">
                <div class="w-16 h-[2px] bg-[#1a1a1a] mt-4 md:mt-8 hidden md:block"></div>
                <h1 class="line-text text-[15vw] leading-[0.85] font-medium tracking-tighter italic text-[#1a1a1a] ml-auto md:ml-0">
                    ICONIQUES
                </h1>
            </div>
        </div>

        <div class="absolute right-0 top-1/2 -translate-y-1/2 w-[90%] md:w-[45%] h-[60vh] md:h-[80vh] z-0 overflow-hidden group hover-trigger" data-cursor="view">
            <img src="https://images.unsplash.com/photo-1514565131-fce0801e5785?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" 
                 class="w-full h-full object-cover reveal-img scale-110 group-hover:scale-100 transition-transform duration-700" 
                 data-speed="0.5" alt="Paris Luxury">
        </div>
    </header>

    <div class="py-12 border-y border-[#1a1a1a]/10 overflow-hidden bg-white">
        <div class="whitespace-nowrap flex gap-8 animate-marquee" id="marquee">
            <span class="text-6xl md:text-8xl serif italic opacity-20">Paris • Alger • Dubai • London • New York •</span>
            <span class="text-6xl md:text-8xl serif italic opacity-20">Paris • Alger • Dubai • London • New York •</span>
        </div>
    </div>

    <section class="py-32 px-6 md:px-20 grid grid-cols-1 md:grid-cols-12 gap-12">
        <div class="md:col-span-4">
            <h2 class="text-3xl md:text-4xl leading-tight">L'emplacement n'est pas un détail. <span class="serif italic text-[#ff385c]">C'est l'essence même du voyage.</span></h2>
        </div>
        <div class="md:col-span-1"></div>
        <div class="md:col-span-6 text-lg text-gray-600 leading-relaxed font-light">
            <p class="reveal-text">Nous ne sélectionnons pas seulement des appartements. Nous sélectionnons des rues, des ambiances, des vues. Chaque propriété est un point d'entrée stratégique vers le cœur battant de la ville, alliant la sécurité la plus stricte à l'effervescence culturelle.</p>
        </div>
    </section>

    <section class="py-20 px-6 md:px-20 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center feature-item py-20 border-b border-gray-100">
            <div class="order-2 md:order-1 relative overflow-hidden h-[400px] md:h-[600px] hover-trigger" data-cursor="explore">
                <img src="https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?q=80&w=2144&auto=format&fit=crop" class="w-full h-full object-cover" data-speed="0.2">
            </div>
            <div class="order-1 md:order-2">
                <span class="text-[#ff385c] text-xs font-bold tracking-widest uppercase mb-4 block">01 — Accessibilité</span>
                <h3 class="text-5xl md:text-6xl mb-6">Tout à Pied</h3>
                <p class="text-gray-500 text-lg max-w-md">Oubliez la voiture. Restaurants étoilés, boutiques de créateurs et monuments historiques sont vos nouveaux voisins.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center feature-item py-20 border-b border-gray-100">
            <div class="md:text-right flex flex-col items-end">
                <span class="text-[#ff385c] text-xs font-bold tracking-widest uppercase mb-4 block">02 — Sérénité</span>
                <h3 class="text-5xl md:text-6xl mb-6">Sécurité Absolue</h3>
                <p class="text-gray-500 text-lg max-w-md ml-auto">Des quartiers surveillés, éclairés et prestigieux. Dormez sur vos deux oreilles, nous veillons sur votre tranquillité.</p>
            </div>
            <div class="relative overflow-hidden h-[400px] md:h-[600px] hover-trigger" data-cursor="secure">
                <img src="https://images.unsplash.com/photo-1444723121867-c61e74e36b1d?q=80&w=2153&auto=format&fit=crop" class="w-full h-full object-cover" data-speed="0.2">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center feature-item py-20">
            <div class="order-2 md:order-1 relative overflow-hidden h-[400px] md:h-[600px] hover-trigger" data-cursor="prestige">
                <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover" data-speed="0.2">
            </div>
            <div class="order-1 md:order-2">
                <span class="text-[#ff385c] text-xs font-bold tracking-widest uppercase mb-4 block">03 — Prestige</span>
                <h3 class="text-5xl md:text-6xl mb-6">Adresses Signatures</h3>
                <p class="text-gray-500 text-lg max-w-md">Vivre ici, c'est faire partie de l'histoire. Des immeubles haussmanniens aux lofts contemporains, l'adresse fait la différence.</p>
            </div>
        </div>
    </section>

    <section class="h-[80vh] bg-[#1a1a1a] text-[#f5f2eb] flex flex-col justify-center items-center text-center px-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="https://images.unsplash.com/photo-1493246507139-91e8fad9978e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" class="w-full h-full object-cover">
        </div>
        
        <div class="relative z-10 max-w-4xl">
            <p class="uppercase tracking-widest text-sm mb-6">Prêt pour l'exceptionnel ?</p>
            <h2 class="text-6xl md:text-9xl mb-12 italic serif">Réservez.</h2>
            
            <a href="#" class="inline-block border border-[#f5f2eb] px-12 py-6 rounded-full text-xl hover:bg-[#f5f2eb] hover:text-[#1a1a1a] transition-colors duration-300 hover-trigger" data-cursor="book">
                Voir les disponibilités
            </a>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>

    <script>
        // 1. Initialisation Smooth Scroll (Lenis)
        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            direction: 'vertical',
            gestureDirection: 'vertical',
            smooth: true,
            mouseMultiplier: 1,
            smoothTouch: false,
            touchMultiplier: 2,
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);

        // 2. Custom Cursor Logic
        const cursor = document.querySelector('.cursor');
        const hoverTriggers = document.querySelectorAll('.hover-trigger');

        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });

        hoverTriggers.forEach(link => {
            link.addEventListener('mouseenter', () => {
                cursor.classList.add('active');
                if(link.getAttribute('data-cursor')) {
                    // Optionnel: ajouter du texte ou changer l'icone du curseur ici
                }
            });
            link.addEventListener('mouseleave', () => {
                cursor.classList.remove('active');
            });
        });

        // 3. GSAP Animations
        gsap.registerPlugin(ScrollTrigger);

        // Preloader Out
        const tl = gsap.timeline();
        
        tl.to("#preloader", {
            y: "-100%",
            duration: 1.5,
            ease: "power4.inOut",
            delay: 0.5
        })
        .to(".reveal-img", {
            clipPath: "inset(0 0 0 0)",
            duration: 1.5,
            ease: "power3.out"
        }, "-=1")
        .to(".line-text", {
            y: 0,
            duration: 1.2,
            stagger: 0.1,
            ease: "power3.out"
        }, "-=1.2");

        // Parallax Effect on Images
        document.querySelectorAll('img[data-speed]').forEach(img => {
            gsap.to(img, {
                y: (i, target) => -100 * target.dataset.speed,
                ease: "none",
                scrollTrigger: {
                    trigger: img,
                    start: "top bottom",
                    end: "bottom top",
                    scrub: true
                }
            });
        });

        // Marquee Animation
        gsap.to("#marquee", {
            x: "-50%",
            duration: 20,
            repeat: -1,
            ease: "linear"
        });

        // Text Reveals on Scroll
        document.querySelectorAll('.feature-item').forEach(item => {
            gsap.from(item.querySelector('h3'), {
                y: 50,
                opacity: 0,
                duration: 1,
                scrollTrigger: {
                    trigger: item,
                    start: "top 80%",
                }
            });
            gsap.from(item.querySelector('img'), {
                scale: 1.2,
                duration: 1.5,
                scrollTrigger: {
                    trigger: item,
                    start: "top 80%",
                }
            });
        });

    </script>
</body>
</html>