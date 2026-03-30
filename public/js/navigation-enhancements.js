/**
 * Navigation Enhancements - Amélioration de l'UX et de la navigation
 */

// Configuration
const NAV_CONFIG = {
    preloadDelay: 200,
    transitionDuration: 300,
    loadingTimeout: 5000
};

// État global
let isNavigating = false;
let preloadCache = new Map();

/**
 * Créer l'indicateur de chargement
 */
function createLoadingIndicator() {
    if (document.getElementById('page-loader')) return;
    
    const loader = document.createElement('div');
    loader.id = 'page-loader';
    loader.innerHTML = `
        <div class="loader-content">
            <div class="loader-spinner"></div>
            <div class="loader-text">Chargement...</div>
        </div>
    `;
    document.body.appendChild(loader);
}

/**
 * Afficher l'indicateur de chargement
 */
function showLoader() {
    const loader = document.getElementById('page-loader');
    if (loader) {
        loader.classList.add('active');
    }
}

/**
 * Masquer l'indicateur de chargement
 */
function hideLoader() {
    const loader = document.getElementById('page-loader');
    if (loader) {
        loader.classList.remove('active');
    }
}

/**
 * Précharger une page
 */
async function preloadPage(url) {
    if (preloadCache.has(url)) return;
    
    try {
        const response = await fetch(url, {
            method: 'HEAD',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        if (response.ok) {
            preloadCache.set(url, true);
        }
    } catch (e) {
        // Ignorer les erreurs de préchargement
    }
}

/**
 * Navigation améliorée avec transition
 */
function enhancedNavigate(url, options = {}) {
    if (isNavigating) return;
    
    isNavigating = true;
    const { showLoading = true, preload = false } = options;
    
    if (showLoading) {
        showLoader();
    }
    
    // Fade out
    document.body.style.opacity = '0';
    document.body.style.transition = `opacity ${NAV_CONFIG.transitionDuration}ms ease`;
    
    setTimeout(() => {
        if (preload && !preloadCache.has(url)) {
            preloadPage(url).then(() => {
                window.location.href = url;
            });
        } else {
            window.location.href = url;
        }
    }, NAV_CONFIG.transitionDuration);
}

/**
 * Améliorer tous les liens internes
 */
function enhanceInternalLinks() {
    const links = document.querySelectorAll('a[href]');
    
    links.forEach(link => {
        const href = link.getAttribute('href');
        
        // Ignorer les liens spéciaux
        if (link.hasAttribute('data-no-enhance') || 
            link.getAttribute('target') === '_blank' ||
            href.startsWith('#') ||
            href.startsWith('mailto:') ||
            href.startsWith('tel:') ||
            href.startsWith('javascript:') ||
            link.closest('form')) {
            return;
        }
        
        // Vérifier si c'est un lien interne
        let isInternal = false;
        try {
            if (href.startsWith('/')) {
                isInternal = true;
            } else if (href.startsWith('http')) {
                const url = new URL(href);
                isInternal = url.origin === window.location.origin;
            }
        } catch (e) {
            // URL invalide, ignorer
            return;
        }
        
        if (!isInternal) return;
        
        // Préchargement au survol
        link.addEventListener('mouseenter', function() {
            if (!preloadCache.has(href)) {
                setTimeout(() => preloadPage(href), NAV_CONFIG.preloadDelay);
            }
        }, { once: true });
        
        // Navigation améliorée au clic (seulement pour les liens internes)
        link.addEventListener('click', function(e) {
            // Ne pas intercepter si c'est un lien avec des attributs spéciaux
            if (link.hasAttribute('download') || 
                link.getAttribute('target') === '_blank') {
                return;
            }
            
            // Pour les liens internes, ajouter une transition douce
            if (href.startsWith('/') || (href.startsWith('http') && isInternal)) {
                // Ne pas intercepter les formulaires ou les actions spéciales
                if (!link.closest('form') && !link.hasAttribute('data-no-transition')) {
                    showLoader();
                    // Laisser le navigateur gérer la navigation normalement
                    // Le loader sera masqué au chargement de la nouvelle page
                }
            }
        });
    });
}

/**
 * Bouton retour en haut amélioré
 */
function createScrollToTop() {
    if (document.getElementById('scroll-to-top')) return;
    
    const button = document.createElement('button');
    button.id = 'scroll-to-top';
    button.innerHTML = '<i class="fas fa-arrow-up"></i>';
    button.setAttribute('aria-label', 'Retour en haut');
    button.style.cssText = `
        position: fixed;
        bottom: 100px;
        right: 24px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FF385C 0%, #e61e4d 100%);
        color: white;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(255, 56, 92, 0.3);
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 998;
        font-size: 18px;
    `;
    
    button.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px) scale(1.1)';
        this.style.boxShadow = '0 6px 20px rgba(255, 56, 92, 0.4)';
    });
    
    button.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
        this.style.boxShadow = '0 4px 12px rgba(255, 56, 92, 0.3)';
    });
    
    document.body.appendChild(button);
    
    // Afficher/masquer selon le scroll
    let ticking = false;
    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                const scrollY = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollY > 300) {
                    button.style.opacity = '1';
                    button.style.visibility = 'visible';
                    button.style.transform = 'translateY(0)';
                } else {
                    button.style.opacity = '0';
                    button.style.visibility = 'hidden';
                    button.style.transform = 'translateY(20px)';
                }
                
                ticking = false;
            });
            ticking = true;
        }
    });
}

/**
 * Améliorer la navigation mobile
 */
function enhanceMobileNavigation() {
    // Créer un menu hamburger si nécessaire
    const header = document.querySelector('header');
    if (!header || window.innerWidth > 768) return;
    
    // Ajouter un bouton menu mobile si nécessaire
    if (!document.getElementById('mobile-menu-btn')) {
        const menuBtn = document.createElement('button');
        menuBtn.id = 'mobile-menu-btn';
        menuBtn.innerHTML = '<i class="fas fa-bars"></i>';
        menuBtn.style.cssText = `
            display: none;
            background: transparent;
            border: none;
            font-size: 24px;
            color: var(--airbnb-black);
            cursor: pointer;
            padding: 8px;
        `;
        
        if (window.innerWidth <= 768) {
            menuBtn.style.display = 'block';
        }
        
        header.appendChild(menuBtn);
    }
}

/**
 * Améliorer les formulaires
 */
function enhanceForms() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
            
            if (submitBtn && !form.hasAttribute('data-no-loading')) {
                submitBtn.disabled = true;
                const originalText = submitBtn.textContent || submitBtn.value;
                submitBtn.textContent = submitBtn.textContent ? 'Envoi...' : '';
                submitBtn.value = submitBtn.value ? 'Envoi...' : '';
                
                // Réactiver après un délai (sécurité)
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.textContent = originalText;
                    submitBtn.value = originalText;
                }, 10000);
            }
        });
    });
}

/**
 * Améliorer les images avec lazy loading
 */
function enhanceImages() {
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
}

/**
 * Animation d'entrée de page
 */
function animatePageEntry() {
    document.body.style.opacity = '0';
    document.body.style.transition = `opacity ${NAV_CONFIG.transitionDuration}ms ease`;
    
    requestAnimationFrame(() => {
        document.body.style.opacity = '1';
    });
}

/**
 * Initialisation
 */
document.addEventListener('DOMContentLoaded', function() {
    // Créer les éléments d'amélioration
    createLoadingIndicator();
    createScrollToTop();
    
    // Améliorer la navigation
    enhanceInternalLinks();
    enhanceMobileNavigation();
    enhanceForms();
    enhanceImages();
    
    // Animation d'entrée
    animatePageEntry();
    
    // Masquer le loader après chargement
    window.addEventListener('load', () => {
        hideLoader();
        isNavigating = false;
        document.body.style.opacity = '1';
    });
    
    // Gérer les erreurs de navigation
    window.addEventListener('error', () => {
        hideLoader();
        isNavigating = false;
        document.body.style.opacity = '1';
    });
    
    // Masquer le loader si la page est déjà chargée
    if (document.readyState === 'complete') {
        hideLoader();
        document.body.style.opacity = '1';
    }
});

// Réinitialiser l'état lors du retour en arrière
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        hideLoader();
        isNavigating = false;
        document.body.style.opacity = '1';
    }
});
