<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Ombre Bienveillante • Casa Del Concierge</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&family=Manrope:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        :root {
            --bg-color: #f3f3f3; /* Blanc cassé luxe */
            --text-color: #111111;
            --line-color: #d1d1d1;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: 'Manrope', sans-serif;
            overflow-x: hidden;
            cursor: none;
        }

        .font-serif { font-family: 'Italiana', serif; }

        /* Loader */
        .loader {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: #111;
            color: #fff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .loader-line {
            width: 0%; height: 1px; background: #fff;
            margin-top: 20px;
        }

        /* Smooth Scroll (Lenis) */
        html.lenis { height: auto; }
        .lenis.lenis-smooth { scroll-behavior: auto; }

        /* Custom Cursor */
        .cursor {
            position: fixed;
            width: 12px; height: 12px;
            background: #111;
            border-radius: 50%;
            pointer-events: none;
            z-index: 10000;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s, background 0.3s;
        }
        .cursor.hovered {
            width: 60px; height: 60px;
            background: transparent;
            border: 1px solid #111;
            backdrop-filter: invert(1);
        }

        /* Image Reveal Mask */
        .reveal-container {
            position: relative;
            overflow: hidden;
        }
        .reveal-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: var(--bg-color);
            z-index: 2;
        }
        .reveal-img {
            transform: scale(1.3);
            transition: transform 1.5s ease-out;
        }

        /* Typography */
        .char { display: inline-block; } /* For text animation */

        /* Time Grid */
        .time-grid {
            background-image: linear-gradient(to right, #d1d1d1 1px, transparent 1px);
            background-size: 20% 100%;
        }

        /* Rotating Badge */
        .badge-rotate {
            animation: rotate 10s linear infinite;
        }
        @keyframes rotate { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

    </style>
</head>
<body class="antialiased">

    <div class="loader">
        <div class="font-serif text-2xl tracking-widest">CASA DEL CONCIERGE</div>
        <div class="loader-line"></div>
    </div>

    <div class="cursor"></div>

    <header class="fixed top-0 w-full p-8 flex justify-between items-end z-50 mix-blend-difference text-white pointer-events-none">
        <div>
            <div class="text-xs uppercase tracking-[0.2em] mb-1">Status</div>
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                <span class="font-mono text-sm">ACTIVE</span>
            </div>
        </div>
        <a href="{{ route('welcome') }}" class="pointer-events-auto hover-trigger font-serif text-xl border-b border-transparent hover:border-white transition-all">
            Fermer
        </a>
    </header>

    <section class="min-h-screen flex flex-col justify-center px-6 md:px-20 pt-20 relative border-b border-[#d1d1d1]">
        
        <div class="absolute right-0 top-1/2 -translate-y-1/2 font-serif text-[30vw] opacity-5 leading-none select-none pointer-events-none">
            24
        </div>

        <div class="max-w-4xl relative z-10">
            <h1 class="font-serif text-6xl md:text-9xl leading-[0.9] mb-12 overflow-hidden">
                <div class="line-reveal">L'INVISIBLE</div>
                <div class="line-reveal pl-12 md:pl-32 italic">EST NOTRE</div>
                <div class="line-reveal">SIGNATURE</div>
            </h1>
            
            <div class="flex flex-col md:flex-row gap-12 items-start opacity-0 fade-in">
                <div class="w-full md:w-64 h-[1px] bg-black mt-4"></div>
                <p class="text-lg md:text-xl max-w-lg font-light leading-relaxed">
                    Le temps est la seule ressource que l'on ne peut pas acheter. 
                    Nous le créons pour vous. Notre service de support n'est pas une assistance, 
                    c'est une orchestration silencieuse de votre séjour, jour et nuit.
                </p>
            </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden py-4 border-t border-[#d1d1d1]">
            <div class="marquee flex whitespace-nowrap gap-12 font-mono text-xs uppercase tracking-widest">
                <span>London 09:41</span><span>Paris 10:41</span><span>Dubai 13:41</span><span>Tokyo 18:41</span><span>New York 04:41</span>
                <span>London 09:41</span><span>Paris 10:41</span><span>Dubai 13:41</span><span>Tokyo 18:41</span><span>New York 04:41</span>
            </div>
        </div>
    </section>

    <div id="pin-container" class="relative bg-[#111] text-[#f3f3f3] overflow-hidden">
        <div class="pin-wrap flex h-screen items-center">
            
            <div class="panel w-screen h-full flex items-center justify-center relative flex-shrink-0 px-6 md:px-20 border-r border-white/10">
                <div class="grid grid-cols-1 md:grid-cols-2 w-full gap-12 items-center">
                    <div class="order-2 md:order-1">
                        <div class="reveal-container w-full h-[60vh] hover-trigger">
                            <div class="reveal-overlay"></div>
                            <img src="https://images.unsplash.com/photo-1549488497-65809ff93e38?q=80&w=2070&auto=format&fit=crop" class="reveal-img w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                        </div>
                    </div>
                    <div class="order-1 md:order-2">
                        <div class="font-mono text-xs text-white/50 mb-4">08:00 AM — LE RÉVEIL</div>
                        <h2 class="font-serif text-5xl md:text-7xl mb-6">Anticipation</h2>
                        <p class="text-white/70 text-lg max-w-sm">
                            Avant même que vous n'ouvriez les yeux, votre journée est balisée. 
                            Petit-déjeuner servi, chauffeur briefé, réservations confirmées.
                        </p>
                    </div>
                </div>
            </div>

            <div class="panel w-screen h-full flex items-center justify-center relative flex-shrink-0 px-6 md:px-20 border-r border-white/10">
                <div class="grid grid-cols-1 md:grid-cols-2 w-full gap-12 items-center">
                    <div>
                        <div class="font-mono text-xs text-white/50 mb-4">14:00 PM — L'IMPRÉVU</div>
                        <h2 class="font-serif text-5xl md:text-7xl mb-6">Réactivité</h2>
                        <p class="text-white/70 text-lg max-w-sm">
                            Un changement de plan ? Une envie soudaine ? 
                            Notre équipe reconfigure votre agenda en temps réel. 
                            L'impossible prend juste un peu plus de temps.
                        </p>
                    </div>
                    <div>
                        <div class="reveal-container w-full h-[60vh] hover-trigger">
                            <div class="reveal-overlay"></div>
                            <img src="https://images.unsplash.com/photo-1551632436-cbf8dd354ca8?q=80&w=2069&auto=format&fit=crop" class="reveal-img w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel w-screen h-full flex items-center justify-center relative flex-shrink-0 px-6 md:px-20">
                <div class="grid grid-cols-1 md:grid-cols-2 w-full gap-12 items-center">
                    <div class="order-2 md:order-1">
                        <div class="reveal-container w-full h-[60vh] hover-trigger">
                            <div class="reveal-overlay"></div>
                            <img src="https://images.unsplash.com/photo-1565516757628-096d194b150c?q=80&w=2070&auto=format&fit=crop" class="reveal-img w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                        </div>
                    </div>
                    <div class="order-1 md:order-2">
                        <div class="font-mono text-xs text-white/50 mb-4">03:00 AM — LA VEILLE</div>
                        <h2 class="font-serif text-5xl md:text-7xl mb-6">Sécurité</h2>
                        <p class="text-white/70 text-lg max-w-sm">
                            Quand la ville dort, nous veillons. Problème technique, urgence médicale ou simple perte de clé. 
                            Une voix humaine vous répond en moins de 30 secondes.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="py-32 px-6 md:px-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-px bg-[#d1d1d1] border border-[#d1d1d1]">
            <div class="bg-[#f3f3f3] p-12 hover-trigger group">
                <div class="w-12 h-12 border border-black rounded-full flex items-center justify-center mb-8 group-hover:bg-black group-hover:text-white transition-colors duration-300">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="font-serif text-2xl mb-4">Polyglotte</h3>
                <p class="text-sm opacity-60">Français, Anglais, Arabe, Espagnol. Nous parlons la langue de votre confort.</p>
            </div>
            
            <div class="bg-[#f3f3f3] p-12 hover-trigger group">
                <div class="w-12 h-12 border border-black rounded-full flex items-center justify-center mb-8 group-hover:bg-black group-hover:text-white transition-colors duration-300">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="font-serif text-2xl mb-4">Instantané</h3>
                <p class="text-sm opacity-60">Pas de ticket d'attente. Canal direct via WhatsApp ou Ligne Privée.</p>
            </div>
            
            <div class="bg-[#f3f3f3] p-12 hover-trigger group">
                <div class="w-12 h-12 border border-black rounded-full flex items-center justify-center mb-8 group-hover:bg-black group-hover:text-white transition-colors duration-300">
                    <i class="fas fa-user-secret"></i>
                </div>
                <h3 class="font-serif text-2xl mb-4">Discret</h3>
                <p class="text-sm opacity-60">Nous savons tout, nous ne disons rien. Votre vie privée est absolue.</p>
            </div>
        </div>
    </section>

    <section class="h-[80vh] flex flex-col justify-center items-center text-center relative overflow-hidden">
        <div class="absolute top-10 badge-rotate opacity-20 pointer-events-none">
            <svg width="200" height="200" viewBox="0 0 200 200">
                <defs>
                    <path id="circlePath" d="M 100, 100 m -75, 0 a 75,75 0 1,1 150,0 a 75,75 0 1,1 -150,0" />
                </defs>
                <text font-family="Manrope" font-size="12" letter-spacing="4px" fill="#000">
                    <textPath xlink:href="#circlePath">
                        CASA DEL CONCIERGE • SUPPORT 24/7 •
                    </textPath>
                </text>
            </svg>
        </div>

        <h2 class="font-serif text-6xl md:text-8xl mb-12">
            Nous sommes prêts.
        </h2>
        
        <a href="{{ route('houses.index') }}" class="hover-trigger relative inline-block px-12 py-6 border border-black overflow-hidden group">
            <span class="relative z-10 text-sm uppercase tracking-widest group-hover:text-white transition-colors duration-300">Initialiser la demande</span>
            <div class="absolute inset-0 bg-black transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-in-out"></div>
        </a>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>
    <script src="https://unpkg.com/split-type"></script>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // 1. Initial Loader Animation
        const tl = gsap.timeline();
        tl.to(".loader-line", { width: "100%", duration: 1.5, ease: "power2.inOut" })
          .to(".loader", { y: "-100%", duration: 1, ease: "power4.inOut", delay: 0.2 })
          .from(".line-reveal", { y: "100%", opacity: 0, stagger: 0.1, duration: 1, ease: "power3.out" }, "-=0.5")
          .to(".fade-in", { opacity: 1, duration: 1 }, "-=0.5");

        // 2. Smooth Scroll
        const lenis = new Lenis();
        function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
        requestAnimationFrame(raf);

        // 3. Custom Cursor Logic
        const cursor = document.querySelector('.cursor');
        document.addEventListener('mousemove', (e) => {
            gsap.to(cursor, { x: e.clientX, y: e.clientY, duration: 0.1 });
        });
        document.querySelectorAll('.hover-trigger').forEach(el => {
            el.addEventListener('mouseenter', () => cursor.classList.add('hovered'));
            el.addEventListener('mouseleave', () => cursor.classList.remove('hovered'));
        });

        // 4. Horizontal Scroll (The "Timeline" Concept)
        // Only on Desktop
        if (window.innerWidth > 768) {
            const container = document.querySelector("#pin-container");
            const wrap = document.querySelector(".pin-wrap");
            
            let scrollTween = gsap.to(wrap, {
                x: () => -(wrap.scrollWidth - window.innerWidth),
                ease: "none",
                scrollTrigger: {
                    trigger: container,
                    pin: true,
                    scrub: 1,
                    end: () => "+=" + wrap.scrollWidth
                }
            });

            // Reveal animations inside horizontal scroll
            document.querySelectorAll(".panel").forEach(panel => {
                gsap.to(panel.querySelector(".reveal-overlay"), {
                    scaleY: 0,
                    transformOrigin: "bottom",
                    duration: 1,
                    scrollTrigger: {
                        trigger: panel,
                        containerAnimation: scrollTween,
                        start: "left 60%",
                    }
                });
                gsap.to(panel.querySelector(".reveal-img"), {
                    scale: 1,
                    duration: 1.5,
                    scrollTrigger: {
                        trigger: panel,
                        containerAnimation: scrollTween,
                        start: "left 60%",
                    }
                });
            });
        }

        // 5. Marquee
        gsap.to(".marquee", { xPercent: -50, repeat: -1, duration: 20, ease: "linear" });

    </script>
</body>
</html>