if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/service-worker.js?v=1.8').then(reg => {
            console.log('Service worker registered.', reg);
        }).catch(err => {
            console.log('Service worker registration failed:', err);
        });
    });
}

let deferredPrompt;
const installButton = document.getElementById('install-btn');

window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;

    console.log('PWA can be installed automatically');

    if (installButton) {
        installButton.style.display = 'block';

        // Show for 30 seconds then auto-hide if not clicked
        setTimeout(() => {
            if (installButton.style.display !== 'none') {
                installButton.style.display = 'none';
            }
        }, 30000);
    }
});

// Also show install button on page load if PWA isn't installed
if (installButton && !window.matchMedia('(display-mode: standalone)').matches) {
    // Show button even without beforeinstallprompt for mobile
    installButton.style.display = 'block';

    installButton.addEventListener('click', async () => {
        if (deferredPrompt) {
            // Use the deferred prompt if available
            deferredPrompt.prompt();
            const { outcome } = await deferredPrompt.userChoice;
            console.log(`User ${outcome}ed the install`);
            deferredPrompt = null;
        } else {
            // Fallback: guide user to manual installation
            alert('To install this app, use the "Add to Home Screen" option in your browser menu (⋮)');
        }
        installButton.style.display = 'none';
    });
}