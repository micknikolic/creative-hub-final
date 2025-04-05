// This variable will track the current slide index for the testimonial carousel
let slideIndex = 0;
// This variable will store the interval used for auto-scrolling between slides
let autoScrollInterval;

// This function displays the appropriate testimonial slide based on 'slideIndex'
function showSlides(n) {
    // We obtain all testimonial slides and dots by their class names
    const slides = document.getElementsByClassName('testimonial-slide');
    const dots = document.getElementsByClassName('dot');

    // If 'slideIndex' exceeds the number of slides, we reset it to the first slide
    if (n >= slides.length) slideIndex = 0;
    // If 'slideIndex' is negative, we go to the last slide in the list
    if (n < 0) slideIndex = slides.length - 1;

    // We remove the 'active' class from all slides to hide them
    Array.from(slides).forEach(slide => slide.classList.remove('active'));
    // We also remove 'active' from all dots
    Array.from(dots).forEach(dot => dot.classList.remove('active'));

    // Then we ensure we have at least one slide and activate the chosen one
    if (slides.length > 0) {
        slides[slideIndex].classList.add('active');
        dots[slideIndex].classList.add('active');
    }
}

// This function moves to the next slide and updates the display
function nextSlide() {
    slideIndex++;
    showSlides(slideIndex);
}

// This function moves to the previous slide and updates the display
function prevSlide() {
    slideIndex--;
    showSlides(slideIndex);
}

// This function sets 'slideIndex' to the desired slide and resets auto-scrolling
function currentSlide(n) {
    slideIndex = n;
    showSlides(slideIndex);
    resetAutoScroll();
}

// This function clears and restarts the auto-scroll interval
function resetAutoScroll() {
    clearInterval(autoScrollInterval);
    autoScrollInterval = setInterval(nextSlide, 5000); // Moves to the next slide every 5 seconds
}

// We check if there are any testimonial slides on the page before initializing the carousel
const slides = document.getElementsByClassName('testimonial-slide');
if (slides.length > 0) {
    // Display the initial slide
    showSlides(slideIndex);
    // Start auto-scrolling
    resetAutoScroll();

    // We attach click events for the 'previous' arrow
    const prev = document.querySelector('.prev');
    if (prev) {
        prev.addEventListener('click', () => {
            prevSlide();
            resetAutoScroll();
        });
    }

    // We attach click events for the 'next' arrow
    const next = document.querySelector('.next');
    if (next) {
        next.addEventListener('click', () => {
            nextSlide();
            resetAutoScroll();
        });
    }

    // We attach click events to all dots for manual slide selection
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => currentSlide(index));
    });
}

// Below is the modal functionality for the sign-up modal
const modal = document.getElementById('signup-modal');
if (modal) {
    // We get the close button from within the modal
    const closeBtn = modal.querySelector('.close');
    // We find the 'Sign Up' button from the header
    const signupButton = document.getElementById('signup-button');

    // If the sign-up button exists, clicking it shows the modal
    if (signupButton) {
        signupButton.addEventListener('click', () => {
            modal.style.display = 'flex';
        });
    }

    // If the close button exists, clicking it hides the modal
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    }

    // Clicking outside the modal content will close the modal as well
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    // We also attach event listeners to any 'Try Now' buttons to open the same sign-up modal
    const tryNowButtons = document.querySelectorAll('.try-now-button');
    tryNowButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            modal.style.display = 'flex';
        });
    });
}

// Below is the functionality for the Project Collaboration Modal
const projectModal = document.getElementById('project-collaboration-modal');
if (projectModal) {
    // We get its close button and the "Learn More" link
    const projectCloseBtn = projectModal.querySelector('.close');
    const projectLearnMore = document.querySelector('.project-collaboration-learn-more');

    // If the learn-more link exists, clicking it shows the modal
    if (projectLearnMore) {
        projectLearnMore.addEventListener('click', (event) => {
            event.preventDefault();
            projectModal.style.display = 'flex';
        });
    }

    // If the close button exists, clicking it hides the modal
    if (projectCloseBtn) {
        projectCloseBtn.addEventListener('click', () => {
            projectModal.style.display = 'none';
        });
    }

    // Clicking outside the modal closes it
    window.addEventListener('click', (event) => {
        if (event.target === projectModal) {
            projectModal.style.display = 'none';
        }
    });
}

// Below is the functionality for the Design Tools Modal
const designToolsModal = document.getElementById('design-tools-modal');
if (designToolsModal) {
    // We get its close button and the "Learn More" link
    const designToolsCloseBtn = designToolsModal.querySelector('.close');
    const designToolsLearnMore = document.querySelector('.design-tools-learn-more');

    // If the learn-more link is found, clicking it opens the modal
    if (designToolsLearnMore) {
        designToolsLearnMore.addEventListener('click', (event) => {
            event.preventDefault();
            designToolsModal.style.display = 'flex';
        });
    }

    // If the close button is found, clicking it closes the modal
    if (designToolsCloseBtn) {
        designToolsCloseBtn.addEventListener('click', () => {
            designToolsModal.style.display = 'none';
        });
    }

    // Clicking outside the modal background closes it as well
    window.addEventListener('click', (event) => {
        if (event.target === designToolsModal) {
            designToolsModal.style.display = 'none';
        }
    });
}

// Below is the Contact Us Modal functionality
const contactModal = document.getElementById('contact-modal');
if (contactModal) {
    // We select all links with the 'contact' class to open the contact modal
    const contactLinks = document.querySelectorAll('.contact');
    const contactCloseBtn = contactModal.querySelector('.close');

    // If any contact links exist, we attach a click event to open the modal
    if (contactLinks.length > 0) {
        contactLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                contactModal.style.display = 'flex';
            });
        });
    }

    // If the modal's close button exists, clicking it hides the modal
    if (contactCloseBtn) {
        contactCloseBtn.addEventListener('click', () => {
            contactModal.style.display = 'none';
        });
    }

    // Clicking anywhere outside the modal content closes the modal
    window.addEventListener('click', (event) => {
        if (event.target === contactModal) {
            contactModal.style.display = 'none';
        }
    });
}