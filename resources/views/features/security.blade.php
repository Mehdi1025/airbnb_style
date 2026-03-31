<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expériences Inoubliables • Casa Del Concierge</title>
    <link rel="icon" href="{{ asset('images/logo.jpeg') }}" type="image/jpeg">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpeg') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        :root {
            --bg-color: #0e0e0e; /* Noir profond luxe */
            --text-color: #eaeaea;
            --accent: #d4af37;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: 'Mulish', sans-serif;
            overflow-x: hidden;
            cursor: none;
        }

        .font-display { font-family: 'Cinzel Decorative', serif; }

        /* Loader */
        .loader-overlay {
            position: fixed;
            inset: 0;
            background: #000;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
            transition: clip-path 1s ease-in-out;
        }

        /* Lenis Smooth Scroll */
        html.lenis { height: auto; }
        .lenis.lenis-smooth { scroll-behavior: auto; }

        /* Custom Cursor */
        .cursor-ball {
            position: fixed;
            top: 0; left: 0;
            mix-blend-mode: difference;
            z-index: 10000;
            pointer-events: none;
        }
        .cursor-ball svg {
            width: 30px; height: 30px;
            fill: white;
            transition: transform 0.3s;
        }
        .cursor-ball.active svg { transform: scale(3); }

        /* Noise Texture (inline SVG fallback) */
        .noise {
            position: fixed;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
            opacity: 0.05;
            pointer-events: none;
            z-index: 50;
        }

        /* Hover Reveal Image */
        .hover-reveal {
            position: fixed;
            width: 300px;
            height: 400px;
            top: 0; left: 0;
            pointer-events: none;
            opacity: 0;
            z-index: 10;
            transform: translate(-50%, -50%) scale(0.8);
            transition: opacity 0.3s, transform 0.3s;
            overflow: hidden;
            border-radius: 4px;
        }
        .hover-reveal-inner {
            width: 100%; height: 100%;
            position: relative;
        }
        .hover-reveal-img {
            width: 100%; height: 100%;
            object-fit: cover;
            transform: scale(1.2);
            transition: transform 0.3s;
        }

        /* Menu Item Styling */
        .menu-item {
            border-bottom: 1px solid rgba(255,255,255,0.1);
            transition: padding-left 0.5s cubic-bezier(0.165, 0.84, 0.44, 1), opacity 0.3s;
        }
        .menu-item:hover {
            padding-left: 30px;
            border-bottom: 1px solid rgba(255,255,255,0.5);
        }
        .menu-item:hover .menu-item-text { opacity: 1; }
        .menu-item:not(:hover) .menu-item-text { opacity: 0.5; }

    </style>
</head>
<body class="antialiased">

    <div class="noise"></div>

    <div class="loader-overlay">
        <div class="text-center">
            <div class="font-display text-4xl md:text-6xl tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-500 animate-pulse">
                SOUVENIRS
            </div>
        </div>
    </div>

    <div class="cursor-ball">
        <svg viewBox="0 0 30 30">
            <circle cx="15" cy="15" r="15"></circle>
        </svg>
    </div>

    <div class="hover-reveal">
        <div class="hover-reveal-inner">
            <img class="hover-reveal-img" src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?q=80&w=1920&auto=format&fit=crop" alt="Experience">
        </div>
    </div>

    <nav class="fixed top-0 w-full p-8 flex justify-between items-center z-40 mix-blend-difference">
        <a href="{{ route('welcome') }}" class="hover-trigger inline-block leading-none" title="Casa Del Concierge — Accueil">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Casa Del Concierge" class="h-10 w-auto max-h-[40px] object-contain">
        </a>
        <a href="{{ route('welcome') }}" class="text-xs uppercase tracking-[0.2em] border border-white/20 px-6 py-2 rounded-full hover:bg-white hover:text-black transition-all hover-trigger">Fermer</a>
    </nav>

    <main>
        
        <section class="min-h-screen flex flex-col justify-center px-6 md:px-32 pt-20">
            <div class="max-w-5xl">
                <h1 class="font-display text-[12vw] leading-[0.85] uppercase mb-12">
                    <span class="block reveal-text overflow-hidden"><span class="block translate-y-full">Curating</span></span>
                    <span class="block reveal-text overflow-hidden pl-12 md:pl-32"><span class="block translate-y-full italic text-gray-500">The</span></span>
                    <span class="block reveal-text overflow-hidden"><span class="block translate-y-full">Unforgettable</span></span>
                </h1>
                
                <div class="flex flex-col md:flex-row justify-between items-end gap-12 mt-12 opacity-0 fade-in">
                    <p class="max-w-md text-lg font-light leading-relaxed text-gray-400">
                        Nous ne vendons pas des séjours, nous fabriquons des mémoires. 
                        Chaque expérience est une pièce unique, taillée sur mesure pour vos désirs.
                    </p>
                    <div class="animate-bounce">
                        <i class="fas fa-arrow-down text-2xl"></i>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-32 px-6 md:px-32 relative z-20">
            <div class="text-xs uppercase tracking-[0.3em] text-gray-500 mb-12">La Collection</div>
            
            <ul class="flex flex-col">
                <li class="menu-item py-12 flex justify-between items-center cursor-none hover-trigger" 
                    data-img="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?q=80&w=1920&auto=format&fit=crop">
                    <span class="menu-item-text font-display text-5xl md:text-8xl transition-opacity duration-300">Gastronomie</span>
                    <span class="text-sm uppercase tracking-widest opacity-0 md:opacity-100 transition-opacity">Chefs Privés</span>
                </li>

                <li class="menu-item py-12 flex justify-between items-center cursor-none hover-trigger" 
                    data-img="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1920&auto=format&fit=crop">
                    <span class="menu-item-text font-display text-5xl md:text-8xl transition-opacity duration-300">Évasion</span>
                    <span class="text-sm uppercase tracking-widest opacity-0 md:opacity-100 transition-opacity">Yacht & Jets</span>
                </li>

                <li class="menu-item py-12 flex justify-between items-center cursor-none hover-trigger" 
                    data-img="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?q=80&w=1920&auto=format&fit=crop">
                    <span class="menu-item-text font-display text-5xl md:text-8xl transition-opacity duration-300">Bien-Être</span>
                    <span class="text-sm uppercase tracking-widest opacity-0 md:opacity-100 transition-opacity">Spa & Retreats</span>
                </li>

                <li class="menu-item py-12 flex justify-between items-center cursor-none hover-trigger" 
                    data-img="https://images.unsplash.com/photo-1551632811-561732d1e306?q=80&w=1920&auto=format&fit=crop">
                    <span class="menu-item-text font-display text-5xl md:text-8xl transition-opacity duration-300">Culture</span>
                    <span class="text-sm uppercase tracking-widest opacity-0 md:opacity-100 transition-opacity">Accès Privé</span>
                </li>
                 <li class="menu-item py-12 flex justify-between items-center cursor-none hover-trigger" 
                    data-img="https://images.unsplash.com/photo-1519092439779-1e375421800f?q=80&w=1920&auto=format&fit=crop">
                    <span class="menu-item-text font-display text-5xl md:text-8xl transition-opacity duration-300">Nocturne</span>
                    <span class="text-sm uppercase tracking-widest opacity-0 md:opacity-100 transition-opacity">VIP Access</span>
                </li>
            </ul>
        </section>

        <section class="min-h-screen flex items-center relative overflow-hidden my-20">
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?q=80&w=2070&auto=format&fit=crop" 
                     class="w-full h-full object-cover opacity-30 parallax-img" alt="Background">
            </div>
            
            <div class="relative z-10 px-6 md:px-32 grid grid-cols-1 md:grid-cols-2 gap-12 w-full">
                <div class="font-display text-4xl md:text-6xl leading-tight">
                    "La véritable élégance n'est pas de se faire remarquer, mais de se faire souvenir."
                </div>
                <div class="flex flex-col justify-end">
                    <p class="text-xl text-gray-400 font-light text-justify">
                        Nos concierges sont des artisans de l'instant. Que vous souhaitiez un dîner aux chandelles sur une plage privatisée, 
                        une visite du Louvre après la fermeture, ou un cours de cuisine avec un chef étoilé, 
                        nous transformons le rêve en logistique.
                    </p>
                </div>
            </div>
        </section>

        <section class="h-[80vh] bg-white text-black flex flex-col justify-center items-center text-center relative px-6 rounded-t-[50px] -mt-20 z-30">
            <div class="max-w-3xl">
                <p class="text-sm uppercase tracking-[0.3em] mb-8">Votre prochain chapitre</p>
                <h2 class="font-display text-6xl md:text-9xl mb-12 hover-scale transition-transform duration-700">
                    Commencer<br>L'histoire
                </h2>
                <a href="{{ route('houses.index') }}" class="inline-block px-12 py-5 border border-black rounded-full text-lg uppercase tracking-widest hover:bg-black hover:text-white transition-all duration-300 hover-trigger">
                    Explorer les Villas
                </a>
            </div>
        </section>

    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // 1. Loader Animation
        const tl = gsap.timeline();
        tl.to(".loader-overlay", {
            clipPath: "polygon(0 0, 100% 0, 100% 0, 0 0)",
            duration: 1.2,
            ease: "power4.inOut",
            delay: 1
        })
        .to(".reveal-text span", {
            y: 0,
            duration: 1.5,
            stagger: 0.1,
            ease: "power4.out"
        }, "-=0.5")
        .to(".fade-in", {
            opacity: 1,
            duration: 1
        }, "-=1");

        // 2. Smooth Scroll
        const lenis = new Lenis({ lerp: 0.08 });
        function raf(time) { lenis.raf(time); requestAnimationFrame(raf); }
        requestAnimationFrame(raf);

        // 3. Hover Reveal Logic (The Key Feature)
        const menuItems = document.querySelectorAll('.menu-item');
        const revealContainer = document.querySelector('.hover-reveal');
        const revealImg = document.querySelector('.hover-reveal-img');
        
        // Move reveal container with mouse
        window.addEventListener('mousemove', (e) => {
            gsap.to(revealContainer, {
                x: e.clientX,
                y: e.clientY,
                duration: 0.5,
                ease: "power3.out"
            });
        });

        menuItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                const imgUrl = item.getAttribute('data-img');
                revealImg.src = imgUrl;
                
                gsap.to(revealContainer, {
                    opacity: 1,
                    scale: 1,
                    duration: 0.3
                });
                gsap.to(revealImg, {
                    scale: 1,
                    duration: 0.3
                });
                // Cursor visual feedback
                document.querySelector('.cursor-ball').classList.add('active');
            });

            item.addEventListener('mouseleave', () => {
                gsap.to(revealContainer, {
                    opacity: 0,
                    scale: 0.8,
                    duration: 0.3
                });
                gsap.to(revealImg, {
                    scale: 1.2,
                    duration: 0.3
                });
                 document.querySelector('.cursor-ball').classList.remove('active');
            });
        });

        // 4. Parallax Image
        gsap.to(".parallax-img", {
            yPercent: 30,
            ease: "none",
            scrollTrigger: {
                trigger: ".parallax-img",
                start: "top bottom",
                end: "bottom top",
                scrub: true
            }
        });

        // 5. General Hover Cursor
        document.querySelectorAll('.hover-trigger').forEach(el => {
            el.addEventListener('mouseenter', () => document.querySelector('.cursor-ball').classList.add('active'));
            el.addEventListener('mouseleave', () => document.querySelector('.cursor-ball').classList.remove('active'));
        });

    </script>
</body>
</html>