// SchoolNotice Modern Interactive Engine
document.addEventListener('DOMContentLoaded', () => {
    // 1. Reveal on Scroll using Intersection Observer
    const revealElements = document.querySelectorAll('.reveal-init');
    if ('IntersectionObserver' in window && revealElements.length > 0) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -40px 0px'
        });

        revealElements.forEach(el => revealObserver.observe(el));
    } else {
        revealElements.forEach(el => el.classList.add('revealed'));
    }

    // 2. Animated Counter for Statistics
    const counterElements = document.querySelectorAll('[data-counter-target]');
    if (counterElements.length > 0) {
        const startCounter = (el) => {
            const target = parseInt(el.getAttribute('data-counter-target'), 10) || 0;
            const duration = 1200; // ms
            const stepTime = 20;
            const steps = duration / stepTime;
            const increment = target / steps;
            let current = 0;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    el.textContent = target.toLocaleString('id-ID');
                    clearInterval(timer);
                } else {
                    el.textContent = Math.floor(current).toLocaleString('id-ID');
                }
            }, stepTime);
        };

        if ('IntersectionObserver' in window) {
            const counterObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        startCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.2 });

            counterElements.forEach(el => counterObserver.observe(el));
        } else {
            counterElements.forEach(el => startCounter(el));
        }
    }

    // 3. Real-time Event Countdown Timer
    const countdownElements = document.querySelectorAll('[data-countdown-date]');
    countdownElements.forEach(el => {
        const targetDateStr = el.getAttribute('data-countdown-date');
        const targetTime = new Date(targetDateStr).getTime();

        const updateCountdown = () => {
            const now = new Date().getTime();
            const diff = targetTime - now;

            const daysEl = el.querySelector('.cd-days');
            const hoursEl = el.querySelector('.cd-hours');
            const minutesEl = el.querySelector('.cd-minutes');
            const secondsEl = el.querySelector('.cd-seconds');

            if (diff <= 0) {
                if (daysEl) daysEl.textContent = '00';
                if (hoursEl) hoursEl.textContent = '00';
                if (minutesEl) minutesEl.textContent = '00';
                if (secondsEl) secondsEl.textContent = '00';
                const statusLabel = el.querySelector('.cd-status');
                if (statusLabel) statusLabel.textContent = 'Event Telah Berlangsung/Selesai';
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            if (daysEl) daysEl.textContent = String(days).padStart(2, '0');
            if (hoursEl) hoursEl.textContent = String(hours).padStart(2, '0');
            if (minutesEl) minutesEl.textContent = String(minutes).padStart(2, '0');
            if (secondsEl) secondsEl.textContent = String(seconds).padStart(2, '0');
        };

        updateCountdown();
        setInterval(updateCountdown, 1000);
    });

    // 4. Mobile Menu Navigation Drawer
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenuDrawer = document.getElementById('mobile-menu');
    const mobileMenuClose = document.getElementById('mobile-menu-close');

    if (mobileMenuBtn && mobileMenuDrawer) {
        const toggleMobileMenu = () => {
            mobileMenuDrawer.classList.toggle('hidden');
        };
        mobileMenuBtn.addEventListener('click', toggleMobileMenu);
        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', toggleMobileMenu);
        }
    }

    // 5. Admin Sidebar Toggle for Mobile
    const sidebarToggleBtn = document.getElementById('sidebar-toggle-btn');
    const adminSidebar = document.getElementById('admin-sidebar');
    const sidebarBackdrop = document.getElementById('sidebar-backdrop');

    if (sidebarToggleBtn && adminSidebar) {
        sidebarToggleBtn.addEventListener('click', () => {
            adminSidebar.classList.toggle('-translate-x-full');
            if (sidebarBackdrop) {
                sidebarBackdrop.classList.toggle('hidden');
            }
        });

        if (sidebarBackdrop) {
            sidebarBackdrop.addEventListener('click', () => {
                adminSidebar.classList.add('-translate-x-full');
                sidebarBackdrop.classList.add('hidden');
            });
        }
    }

    // 6. Delete Confirmation Modal
    const deleteModal = document.getElementById('delete-modal');
    const deleteForm = document.getElementById('delete-modal-form');
    const deleteItemName = document.getElementById('delete-modal-item-name');
    const deleteModalClose = document.querySelectorAll('.delete-modal-close');

    document.querySelectorAll('.btn-trigger-delete').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const actionUrl = btn.getAttribute('data-action');
            const itemName = btn.getAttribute('data-name') || 'data ini';

            if (deleteForm && deleteModal) {
                deleteForm.setAttribute('action', actionUrl);
                if (deleteItemName) {
                    deleteItemName.textContent = `"${itemName}"`;
                }
                deleteModal.classList.remove('hidden');
                deleteModal.classList.add('flex');
            }
        });
    });

    deleteModalClose.forEach(btn => {
        btn.addEventListener('click', () => {
            if (deleteModal) {
                deleteModal.classList.add('hidden');
                deleteModal.classList.remove('flex');
            }
        });
    });

    // 7. Live Image Upload Preview
    const imageInputs = document.querySelectorAll('input[type="file"][data-preview-target]');
    imageInputs.forEach(input => {
        input.addEventListener('change', (e) => {
            const targetId = input.getAttribute('data-preview-target');
            const previewContainer = document.getElementById(targetId);
            const previewImg = previewContainer ? previewContainer.querySelector('img') : null;

            if (input.files && input.files[0] && previewContainer && previewImg) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    previewImg.src = event.target.result;
                    previewContainer.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    });

    // 8. Navbar Scroll State Enhancement
    const mainNav = document.getElementById('main-navbar');
    if (mainNav) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                mainNav.classList.add('shadow-sm', 'bg-white/95');
                mainNav.classList.remove('bg-white/80');
            } else {
                mainNav.classList.remove('shadow-sm', 'bg-white/95');
                mainNav.classList.add('bg-white/80');
            }
        });
    }

    // 9. Toast Dismiss Handler
    const toastElements = document.querySelectorAll('.toast-alert');
    toastElements.forEach(toast => {
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(-10px)';
            setTimeout(() => toast.remove(), 400);
        }, 5000);

        const closeBtn = toast.querySelector('.toast-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(-10px)';
                setTimeout(() => toast.remove(), 300);
            });
        }
    });
});
