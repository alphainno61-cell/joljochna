// Smooth scrolling
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});

// Navbar background on scroll
window.addEventListener("scroll", () => {
    const nav = document.querySelector(".nav");
    if (window.scrollY > 100) {
        nav.style.background = "rgba(10, 77, 46, 0.98)";
        nav.style.boxShadow = "0 5px 20px rgba(0,0,0,0.1)";
    } else {
        nav.style.background = "rgba(10, 77, 46, 0.95)";
        nav.style.boxShadow = "none";
    }
});

// Form submission
document.querySelector("form").addEventListener("submit", (e) => {
    e.preventDefault();
    // Custom message box for feedback
    showNotification("ধন্যবাদ! আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।");
    e.target.reset(); // Reset form after successful submission
});

function showNotification(message) {
    // Create a simple modal/notification box for feedback
    const notification = document.createElement("div");
    notification.style.position = "fixed";
    notification.style.top = "50%";
    notification.style.left = "50%";
    notification.style.transform = "translate(-50%, -50%)";
    notification.style.padding = "20px 40px";
    notification.style.backgroundColor = "#ffd700";
    notification.style.color = "#0a4d2e";
    notification.style.borderRadius = "10px";
    notification.style.zIndex = "9999";
    notification.style.boxShadow = "0 5px 15px rgba(0,0,0,0.3)";
    notification.style.fontSize = "1.2rem";
    notification.style.opacity = "0";
    notification.style.transition = "opacity 0.5s ease-in-out";
    notification.textContent = message;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.opacity = "1";
    }, 10);

    setTimeout(() => {
        notification.style.opacity = "0";
        notification.addEventListener("transitionend", () => {
            notification.remove();
        });
    }, 3000);
}

// --- CAROUSEL LOGIC ---
// Refactored to handle multiple carousels
function initCarousel(trackId, prevBtnId, nextBtnId) {
    const track = document.getElementById(trackId);
    const prevBtn = document.getElementById(prevBtnId);
    const nextBtn = document.getElementById(nextBtnId);

    if (!track || !prevBtn || !nextBtn) return;

    let currentIndex = 0;
    const cardCount = track.children.length;
    let autoSlideInterval;
    const isTestimonialTrack = trackId === "testimonialTrack"; // Check if it's the testimonial track

    function getMoveUnit() {
        // Get the first child to measure its width plus margin-right
        const card =
            track.querySelector(".project-card") ||
            track.querySelector(".testimonial-card");
        if (!card) return 0;
        const cardStyle = window.getComputedStyle(card);
        const width = card.offsetWidth;
        // Get margin-right value (will be 0 for testimonial card)
        const margin = parseFloat(cardStyle.marginRight);
        return width + margin;
    }

    function updateCarousel() {
        // Determine how many items are visible (3 for project desktop, 1 for all else)
        // Testimonials should ALWAYS have 1 view to show the full comment.
        const cardsPerView = isTestimonialTrack
            ? 1
            : window.innerWidth > 992
            ? 3
            : 1;

        // Max index is the last valid starting position (e.g., if 4 cards and 3 view, max index is 1)
        const maxIndex = Math.max(0, cardCount - cardsPerView);

        // Loop back to start if needed
        if (currentIndex < 0) {
            currentIndex = maxIndex;
        } else if (currentIndex > maxIndex) {
            currentIndex = 0;
        }

        // Calculate the move
        const moveUnit = getMoveUnit();
        track.style.transform = `translateX(-${currentIndex * moveUnit}px)`;

        // Disable/hide buttons if all cards fit on one screen
        if (maxIndex === 0) {
            prevBtn.style.opacity = "0";
            nextBtn.style.opacity = "0";
            prevBtn.style.pointerEvents = "none";
            nextBtn.style.pointerEvents = "none";
        } else {
            prevBtn.style.opacity = "1";
            nextBtn.style.opacity = "1";
            prevBtn.style.pointerEvents = "auto";
            nextBtn.style.pointerEvents = "auto";
        }
    }

    function nextSlide() {
        currentIndex++;
        updateCarousel();
    }

    function prevSlide() {
        currentIndex--;
        updateCarousel();
    }

    function startAutoSlide() {
        stopAutoSlide();
        // Start automatic slide every 4 seconds
        autoSlideInterval = setInterval(nextSlide, 4000);
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    // Initialization tasks

    // Set transition once (already in CSS but good practice)
    track.style.transition =
        "transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)";

    // Set initial position and bounds
    updateCarousel();

    // Event listeners for manual control
    nextBtn.onclick = nextSlide;
    prevBtn.onclick = prevSlide;

    // Pause/Play on hover for the visible area
    const wrapper = track.closest(".carousel-wrapper");
    if (wrapper) {
        wrapper.addEventListener("mouseenter", stopAutoSlide);
        wrapper.addEventListener("mouseleave", startAutoSlide);
    }

    // Start the animation
    startAutoSlide();

    // Return the update function so the global resize handler can call it
    return {
        updateCarousel,
    };
}

let projectCarousel;
let testimonialCarousel;

function globalSetupCarousels() {
    // Initialize Other Projects Carousel
    projectCarousel = initCarousel("projectTrack", "prevBtn", "nextBtn");
    // Initialize Testimonials Carousel
    testimonialCarousel = initCarousel(
        "testimonialTrack",
        "prevTestimonialBtn",
        "nextTestimonialBtn"
    );
}

// Intersection Observer for other animations (kept from previous code)
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -100px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
        }
    });
}, observerOptions);

// Apply observer to all but reset project/testimonial card styles for carousel logic to take over
document
    .querySelectorAll(
        ".feature-card, .pricing-card, .contact-item, .project-card, .testimonial-card"
    )
    .forEach((el) => {
        if (
            !el.classList.contains("project-card") &&
            !el.classList.contains("testimonial-card")
        ) {
            el.style.opacity = "0";
            el.style.transform = "translateY(30px)";
            el.style.transition = "all 0.6s ease";
            observer.observe(el);
        } else {
            // For carousel cards, only handle opacity for initial fade-in
            el.style.opacity = "0";
            el.style.transition = "opacity 0.6s ease"; // Ensure transition is set
            observer.observe(el);
        }
    });

// Setup the carousels after all resources (including styles) have loaded
window.addEventListener("load", globalSetupCarousels);

// Recalculate movement on resize to handle layout changes (e.g., desktop to mobile)
window.addEventListener("resize", () => {
    if (projectCarousel) projectCarousel.updateCarousel();
    if (testimonialCarousel) testimonialCarousel.updateCarousel();
});

// QR Code Scanner Functionality
let html5QrcodeScanner;

function startQRScanner() {
    const scannerContainer = document.getElementById("qr-reader");
    const resultContainer = document.getElementById("qr-reader-results");

    // Clear previous scanner
    if (html5QrcodeScanner) {
        html5QrcodeScanner.clear();
    }

    // Initialize scanner
    html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader",
        {
            fps: 10,
            qrbox: {
                width: 150,
                height: 150,
            },
        },
        false
    );

    html5QrcodeScanner.render(
        (decodedText, decodedResult) => {
            // Handle successful scan
            resultContainer.innerHTML = `
            <div style="background: #4CAF50; color: white; padding: 10px; border-radius: 5px; margin-top: 10px;">
                <strong>স্ক্যান সফল!</strong><br>
                ${decodedText}
            </div>
        `;

            // Stop scanner after successful scan
            html5QrcodeScanner.clear();

            // Optionally redirect or process the scanned data
            if (decodedText.startsWith("http")) {
                setTimeout(() => {
                    window.open(decodedText, "_blank");
                }, 2000);
            }
        },
        (errorMessage) => {
            // Handle scan error (optional)
        }
    );
}

// Event listener for scanner button
document.getElementById("startScanner").addEventListener("click", function () {
    const resultContainer = document.getElementById("qr-reader-results");
    resultContainer.innerHTML = ""; // Clear previous results
    startQRScanner();
});


