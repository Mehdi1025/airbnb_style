<!DOCTYPE html>
<html lang="fr" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Art du Détail • Casa Del Concierge</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Manrope:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        :root {
            --bg-color: #0a0a0a;
            --text-color: #e0dcd3;
            --accent-color: #c9a573; /* Or vieilli */
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: 'Manrope', sans-serif;
            overflow-x: hidden;
            cursor: none;
        }

        .serif { font-family: 'Cinzel', serif; }

        /* Noise Texture Overlay (inline SVG) */
        .noise {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            pointer-events: none;
            z-index: 9000;
            opacity: 0.05;
            background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        }

        /* Custom Cursor */
        .cursor-dot, .cursor-circle {
            position: fixed;
            top: 0; left: 0;
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
        }
        .cursor-dot { width: 4px; height: 4px; background: white; }
        .cursor-circle { 
            width: 40px; height: 40px; 
            border: 1px solid rgba(255,255,255,0.3); 
            transition: width 0.3s, height 0.3s, background-color 0.3s;
        }
        .cursor-circle.active {
            width: 80px; height: 80px;
            background-color: rgba(255, 255, 255, 0.1);
            border-color: transparent;
            backdrop-filter: blur(2px);
        }

        /* Lenis */
        html.lenis { height: auto; }
        .lenis.lenis-smooth { scroll-behavior: auto; }

        /* Utilities */
        .clip-text-image {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-image: url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }

        /* Horizontal Scroll Section */
        .scroll-container {
            width: 400%; /* 4 sections */
            height: 100%;
            display: flex;
            flex-wrap: nowrap;
        }
        .scroll-section {
            width: 100vw;
            height: 100vh;
            padding: 4rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-sizing: border-box;
        }
    </style>
</head>
<body class="antialiased">

    <div class="noise"></div>

    <div class="cursor-dot"></div>
    <div class="cursor-circle"></div>

    <nav class="fixed top-0 w-full p-8 flex justify-between items-center z-50 mix-blend-exclusion text-white">
        <a href="{{ route('welcome') }}" class="text-xl tracking-widest uppercase font-bold hover-target">CDC / Quality</a>
        <a href="{{ route('welcome') }}" class="text-sm tracking-widest hover-target group">
            <span class="block overflow-hidden h-5">
                <span class="block group-hover:-translate-y-full transition-transform duration-500">Fermer</span>
                <span class="block group-hover:-translate-y-full transition-transform duration-500 italic">Close</span>
            </span>
        </a>
    </nav>

    <header class="relative h-screen flex flex-col items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-black/40 z-10"></div>
            <img src="https://images.unsplash.com/photo-1631679706909-1844bbd07221?q=80&w=1920&auto=format&fit=crop" 
                 class="w-full h-full object-cover scale-110" 
                 id="hero-img" alt="Texture">
        </div>
        
        <div class="relative z-20 text-center mix-blend-overlay opacity-80">
            <h1 class="text-[12vw] leading-none serif tracking-tighter" id="hero-title">
                <div class="overflow-hidden"><span class="block translate-y-full">PREMIUM</span></div>
                <div class="overflow-hidden"><span class="block translate-y-full">STANDARD</span></div>
            </h1>
        </div>

        <div class="absolute bottom-10 left-10 text-xs uppercase tracking-[0.3em] opacity-60 z-20">
            Scrollez pour découvrir
        </div>
    </header>

    <section class="min-h-screen flex items-center justify-center px-6 md:px-32 py-24 bg-[#0a0a0a]">
        <p class="text-3xl md:text-5xl leading-[1.4] font-light text-justify reveal-type opacity-20">
            Le vrai luxe réside dans l'absence de friction. 
            Chez <span class="text-white serif italic">Casa Del Concierge</span>, nous ne croyons pas au "suffisant". 
            Chaque fil de drap, chaque reflet de lumière, chaque poignée de porte a été pensé pour 
            une expérience sensorielle absolue. Nous ne louons pas des murs, nous offrons une 
            <span class="text-white serif italic">perfection invisible</span>.
        </p>
    </section>

    <div class="overflow-hidden" id="horizontal-wrapper">
        <div class="scroll-container">
            
            <div class="scroll-section bg-[#0f0f0f] border-r border-white/5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center w-full max-w-7xl">
                    <div>
                        <span class="text-[#c9a573] text-sm tracking-[0.3em] uppercase mb-4 block">01. La Base</span>
                        <h2 class="text-6xl md:text-8xl serif mb-8">Sélection<br><span class="italic text-gray-500">Draconienne</span></h2>
                        <p class="text-xl font-light text-gray-400 max-w-md">Nous refusons 95% des propriétés. Seules celles qui possèdent une âme, une lumière parfaite et une isolation phonique irréprochable rejoignent la collection.</p>
                    </div>
                    <div class="h-[60vh] overflow-hidden hover-target relative group">
                        <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=2053&auto=format&fit=crop" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 ease-in-out scale-100 group-hover:scale-110">
                    </div>
                </div>
            </div>

            <div class="scroll-section bg-[#0a0a0a] border-r border-white/5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center w-full max-w-7xl">
                    <div class="order-2 md:order-1 h-[60vh] overflow-hidden hover-target relative group">
                        <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&w=2000&auto=format&fit=crop" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 ease-in-out scale-100 group-hover:scale-110">
                    </div>
                    <div class="order-1 md:order-2">
                        <span class="text-[#c9a573] text-sm tracking-[0.3em] uppercase mb-4 block">02. Le Toucher</span>
                        <h2 class="text-6xl md:text-8xl serif mb-8">Matières<br><span class="italic text-gray-500">Nobles</span></h2>
                        <p class="text-xl font-light text-gray-400 max-w-md">Velours, marbre veiné, bois massif. Nos intérieurs sont tactiles. Le confort ne se voit pas seulement, il se ressent au bout des doigts.</p>
                    </div>
                </div>
            </div>

            <div class="scroll-section bg-[#0f0f0f] border-r border-white/5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center w-full max-w-7xl">
                    <div>
                        <span class="text-[#c9a573] text-sm tracking-[0.3em] uppercase mb-4 block">03. La Facilité</span>
                        <h2 class="text-6xl md:text-8xl serif mb-8">Tech<br><span class="italic text-gray-500">Invisible</span></h2>
                        <p class="text-xl font-light text-gray-400 max-w-md">Wifi haut débit, domotique intuitive, son Devialet ou Sonos. La technologie est présente partout, mais ne s'impose jamais.</p>
                    </div>
                    <div class="h-[60vh] overflow-hidden hover-target relative group">
                        <img src="https://images.unsplash.com/photo-1558002038-1091a1661116?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 ease-in-out scale-100 group-hover:scale-110">
                    </div>
                </div>
            </div>

            <div class="scroll-section bg-[#0a0a0a]">
                <div class="flex flex-col items-center text-center max-w-4xl mx-auto">
                    <span class="text-[#c9a573] text-sm tracking-[0.3em] uppercase mb-8 block">04. La Promesse</span>
                    <h2 class="text-6xl md:text-9xl serif mb-12">Immaculé.</h2>
                    <p class="text-2xl font-light text-gray-400 mb-12">Le standard hôtelier 5 étoiles appliqué au résidentiel. Ménage professionnel, linge blanc craquant, inspection en 50 points avant votre arrivée.</p>
                    <div class="flex gap-12 text-[#c9a573]">
                        <div class="text-center">
                            <div class="text-4xl font-bold counter" data-target="100">0</div>
                            <div class="text-xs uppercase tracking-widest mt-2">Points de contrôle</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold counter" data-target="24">0</div>
                            <div class="text-xs uppercase tracking-widest mt-2">Heures de support</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="h-[80vh] flex flex-col items-center justify-center relative bg-[#0a0a0a]">
        <div class="text-center z-10">
            <h2 class="text-4xl md:text-6xl serif mb-8">L'excellence n'attend que vous.</h2>
            <a href="{{ route('houses.index') }}" class="group relative inline-flex items-center justify-center px-12 py-6 overflow-hidden font-medium text-white transition duration-300 ease-out border border-white/20 rounded-full hover-target">
                <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-white group-hover:translate-x-0 ease">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </span>
                <span class="absolute flex items-center justify-center w-full h-full text-white transition-all duration-300 transform group-hover:translate-x-full ease uppercase tracking-widest text-sm">Réserver l'Exception</span>
                <span class="relative invisible">Réserver l'Exception</span>
            </a>
        </div>
        
        <div class="absolute inset-0 overflow-hidden opacity-10 pointer-events-none">
             <div class="absolute top-0 left-1/4 w-[1px] h-full bg-gradient-to-b from-transparent via-white to-transparent animate-pulse"></div>
             <div class="absolute top-0 left-2/4 w-[1px] h-full bg-gradient-to-b from-transparent via-white to-transparent animate-pulse" style="animation-delay: 1s"></div>
             <div class="absolute top-0 left-3/4 w-[1px] h-full bg-gradient-to-b from-transparent via-white to-transparent animate-pulse" style="animation-delay: 2s"></div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>

    <script>
        // 1. Setup
        gsap.registerPlugin(ScrollTrigger);
        
        const lenis = new Lenis({
            lerp: 0.1,
            smooth: true,
        });
        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);

        // 2. Custom Cursor
        const cursorDot = document.querySelector('.cursor-dot');
        const cursorCircle = document.querySelector('.cursor-circle');
        const hoverTargets = document.querySelectorAll('.hover-target');

        document.addEventListener('mousemove', (e) => {
            gsap.to(cursorDot, { x: e.clientX, y: e.clientY, duration: 0.1 });
            gsap.to(cursorCircle, { x: e.clientX, y: e.clientY, duration: 0.3 });
        });

        hoverTargets.forEach(el => {
            el.addEventListener('mouseenter', () => cursorCircle.classList.add('active'));
            el.addEventListener('mouseleave', () => cursorCircle.classList.remove('active'));
        });

        // 3. Hero Animations
        const heroTl = gsap.timeline();
        heroTl.to('#hero-title span', {
            y: 0,
            duration: 1.5,
            stagger: 0.2,
            ease: "power4.out",
            delay: 0.5
        });
        
        gsap.to("#hero-img", {
            scale: 1,
            scrollTrigger: {
                trigger: "header",
                start: "top top",
                end: "bottom top",
                scrub: true
            }
        });

        // 4. Text Reveal (Philosophy)
        gsap.to(".reveal-type", {
            opacity: 1,
            scrollTrigger: {
                trigger: ".reveal-type",
                start: "top 70%",
                end: "top 30%",
                scrub: true
            }
        });

        // 5. Horizontal Scroll Logic
        // On mobile, we might want to disable this and stack, but for Awwwards style, we keep it.
        // Important: check if screen is large enough for effect
        let mm = gsap.matchMedia();

        mm.add("(min-width: 768px)", () => {
            const sections = gsap.utils.toArray(".scroll-section");
            
            gsap.to(sections, {
                xPercent: -100 * (sections.length - 1),
                ease: "none",
                scrollTrigger: {
                    trigger: "#horizontal-wrapper",
                    pin: true,
                    scrub: 1,
                    snap: 1 / (sections.length - 1),
                    end: () => "+=" + document.querySelector("#horizontal-wrapper").offsetWidth
                }
            });
        });

        // 6. Stats Counter
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            let target = +counter.getAttribute('data-target');
            gsap.to(counter, {
                innerText: target,
                duration: 2,
                snap: { innerText: 1 },
                scrollTrigger: {
                    trigger: counter,
                    start: "top 85%",
                }
            });
        });

    </script>
</body>
</html>