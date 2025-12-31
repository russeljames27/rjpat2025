<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Cosmic Memories - Photo Gallery</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background: #0a0e27;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated Galaxy Background */
        .galaxy-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at bottom, #1b2735 0%, #090a0f 100%);
            overflow: hidden;
        }

        .galaxy-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(120, 81, 169, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(194, 97, 254, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(88, 166, 255, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 90% 30%, rgba(255, 107, 237, 0.2) 0%, transparent 50%);
            animation: galaxyShift 20s ease-in-out infinite;
        }

        @keyframes galaxyShift {
            0%, 100% { opacity: 1; transform: scale(1) rotate(0deg); }
            50% { opacity: 0.8; transform: scale(1.1) rotate(5deg); }
        }

        /* Stars */
        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        /* Back Button */
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: rgba(138, 116, 249, 0.2);
            backdrop-filter: blur(10px);
            padding: 12px 24px;
            border-radius: 15px;
            border: 1px solid rgba(138, 116, 249, 0.3);
            color: #a8b2d1;
            text-decoration: none;
            font-size: 1em;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-button:hover {
            background: rgba(138, 116, 249, 0.3);
            box-shadow: 0 0 20px rgba(138, 116, 249, 0.5);
            transform: translateX(-5px);
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 1400px;
            margin: 0 auto;
            padding: 100px 20px 60px;
        }

        .page-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .page-title h1 {
            background: linear-gradient(135deg, #fff, #c261fe, #58a6ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 3em;
            margin-bottom: 15px;
            filter: drop-shadow(0 0 20px rgba(194, 97, 254, 0.5));
        }

        .page-title p {
            color: #a8b2d1;
            font-size: 1.2em;
            font-style: italic;
        }

        /* Carousel Container */
        .carousel-container {
            position: relative;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .carousel-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 25px;
            background: rgba(15, 20, 45, 0.9);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(138, 116, 249, 0.3);
            box-shadow: 0 20px 60px rgba(138, 116, 249, 0.4);
        }

        .carousel-slides {
            position: relative;
            height: 680px;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            opacity: 0;
            transition: opacity 2s ease-in-out;
        }

        .carousel-slide.active {
            opacity: 1;
            z-index: 1;
        }

        .carousel-slide img {
            max-width: 100%;
            max-height: 600px;
            width: auto;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            animation: imageGlow 5s ease-in-out infinite;
        }

        @keyframes imageGlow {
            0%, 100% {
                box-shadow: 0 10px 40px rgba(138, 116, 249, 0.3),
                            0 0 60px rgba(194, 97, 254, 0.2);
            }
            50% {
                box-shadow: 0 10px 50px rgba(138, 116, 249, 0.5),
                            0 0 80px rgba(194, 97, 254, 0.4);
            }
        }

        /* Navigation Buttons */
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(138, 116, 249, 0.3);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(138, 116, 249, 0.5);
            color: white;
            font-size: 2em;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .carousel-btn:hover {
            background: rgba(138, 116, 249, 0.5);
            box-shadow: 0 0 30px rgba(138, 116, 249, 0.8);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-btn.prev {
            left: 20px;
        }

        .carousel-btn.next {
            right: 20px;
        }

        /* Image Counter */
        .image-counter {
            text-align: center;
            margin-top: 30px;
            color: #a8b2d1;
            font-size: 1.2em;
        }

        .image-counter .current {
            background: linear-gradient(135deg, #c261fe, #58a6ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: bold;
            font-size: 1.3em;
        }

        /* Dot Navigation */
        .thumbnail-container {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 30px;
            flex-wrap: wrap;
            padding: 0 20px;
        }

        .thumbnail {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s;
            background: rgba(138, 116, 249, 0.3);
            border: 2px solid rgba(138, 116, 249, 0.5);
            position: relative;
        }

        .thumbnail:hover {
            background: rgba(138, 116, 249, 0.6);
            transform: scale(1.3);
            box-shadow: 0 0 15px rgba(138, 116, 249, 0.6);
        }

        .thumbnail.active {
            background: linear-gradient(135deg, #c261fe, #58a6ff);
            border-color: rgba(138, 116, 249, 0.8);
            box-shadow: 0 0 20px rgba(138, 116, 249, 0.8);
            transform: scale(1.4);
        }

        .thumbnail.active::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: transparent;
            border: 2px solid rgba(194, 97, 254, 0.4);
            animation: dotPulse 1.5s ease-in-out infinite;
        }

        @keyframes dotPulse {
            0% {
                width: 20px;
                height: 20px;
                opacity: 1;
            }
            100% {
                width: 30px;
                height: 30px;
                opacity: 0;
            }
        }

        /* Autoplay Controls */
        .autoplay-controls {
            text-align: center;
            margin-top: 30px;
        }

        .autoplay-btn {
            background: linear-gradient(135deg, #8a74f9, #c261fe);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 15px;
            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(138, 116, 249, 0.4);
            font-family: 'Georgia', serif;
        }

        .autoplay-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(138, 116, 249, 0.6);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2em;
            }

            .page-title p {
                font-size: 1em;
            }

            .carousel-slides {
                height: 480px;
            }

            .carousel-slide {
                padding: 20px;
            }

            .carousel-slide img {
                max-height: 400px;
            }

            .carousel-btn {
                width: 50px;
                height: 50px;
                font-size: 1.5em;
            }

            .carousel-btn.prev {
                left: 10px;
            }

            .carousel-btn.next {
                right: 10px;
            }

            .thumbnail {
                width: 10px;
                height: 10px;
                gap: 10px;
            }

            .back-button {
                padding: 10px 18px;
                font-size: 0.9em;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 80px 10px 40px;
            }

            .page-title h1 {
                font-size: 1.8em;
            }

            .carousel-slides {
                height: 360px;
            }

            .carousel-slide img {
                max-height: 300px;
            }

            .thumbnail {
                width: 8px;
                height: 8px;
            }

            .thumbnail-container {
                gap: 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Galaxy Background -->
    <div class="galaxy-bg"></div>
    <div class="stars" id="stars"></div>

    <!-- Back Button -->
    <a href="#" class="back-button" onclick="history.back(); return false;">👈🏻</a>

    <div class="container">
        <div class="page-title">
            <h1>✨ Our Cosmic Memories ✨</h1>
            <p>Captured moments across our celestial journey</p>
        </div>

        <div class="carousel-container">
            <div class="carousel-wrapper">
                <div class="carousel-slides" id="carouselSlides">
                    <div class="carousel-slide active"><img src="image1.jpg" alt="Memory 1"></div>
                    <div class="carousel-slide"><img src="image2.jpg" alt="Memory 2"></div>
                    <div class="carousel-slide"><img src="image3.jpg" alt="Memory 3"></div>
                    <div class="carousel-slide"><img src="image4.jpg" alt="Memory 4"></div>
                    <div class="carousel-slide"><img src="image5.jpg" alt="Memory 5"></div>
                    <div class="carousel-slide"><img src="image6.jpg" alt="Memory 6"></div>
                    <div class="carousel-slide"><img src="image7.jpg" alt="Memory 7"></div>
                    <div class="carousel-slide"><img src="image8.jpg" alt="Memory 8"></div>
                    <div class="carousel-slide"><img src="image9.jpg" alt="Memory 9"></div>
                    <div class="carousel-slide"><img src="image10.jpg" alt="Memory 10"></div>
                    <div class="carousel-slide"><img src="image11.jpg" alt="Memory 11"></div>
                    <div class="carousel-slide"><img src="image12.jpg" alt="Memory 12"></div>
                    <div class="carousel-slide"><img src="image13.jpg" alt="Memory 13"></div>
                    <div class="carousel-slide"><img src="image14.jpg" alt="Memory 14"></div>
                    <div class="carousel-slide"><img src="image15.jpg" alt="Memory 15"></div>
                </div>

                <button class="carousel-btn prev" onclick="changeSlide(-1)">❮</button>
                <button class="carousel-btn next" onclick="changeSlide(1)">❯</button>
            </div>

            <!-- Hidden audio element -->
            <audio id="bgMusic" loop>
                <source src="tahanan.mp3" type="audio/mpeg">
            </audio>

            <div class="image-counter">
                <span class="current" id="currentSlide">1</span> / <span id="totalSlides">15</span>
            </div>

            <div class="thumbnail-container" id="thumbnailContainer">
                <!-- Thumbnails will be generated by JavaScript -->
            </div>

            <div class="autoplay-controls">
                <button class="autoplay-btn" id="autoplayBtn" onclick="toggleAutoplay()">▶️ Start Slideshow</button>
            </div>
        </div>
    </div>

    <script>
        let currentSlide = 0;
        const totalSlides = 15;
        let autoplayInterval = null;
        let isAutoplay = false;
        const bgMusic = document.getElementById('bgMusic');

        // Create stars
        function createStars() {
            const starsContainer = document.getElementById('stars');
            for (let i = 0; i < 150; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                const size = Math.random() * 3 + 1;
                star.style.width = size + 'px';
                star.style.height = size + 'px';
                star.style.left = Math.random() * 100 + '%';
                star.style.top = Math.random() * 100 + '%';
                star.style.animationDelay = Math.random() * 3 + 's';
                star.style.animationDuration = (2 + Math.random() * 2) + 's';
                starsContainer.appendChild(star);
            }
        }

        // Generate dot indicators
        function generateThumbnails() {
            const thumbnailContainer = document.getElementById('thumbnailContainer');
            for (let i = 1; i <= totalSlides; i++) {
                const dot = document.createElement('div');
                dot.className = 'thumbnail';
                if (i === 1) dot.classList.add('active');
                
                dot.onclick = () => goToSlide(i - 1);
                thumbnailContainer.appendChild(dot);
            }
        }

        // Change slide
        function changeSlide(direction) {
            currentSlide += direction;
            
            if (currentSlide < 0) {
                currentSlide = totalSlides - 1;
            } else if (currentSlide >= totalSlides) {
                currentSlide = 0;
            }
            
            updateCarousel();
        }

        // Go to specific slide
        function goToSlide(index) {
            currentSlide = index;
            updateCarousel();
        }

        // Update carousel position and UI
        function updateCarousel() {
            const slides = document.querySelectorAll('.carousel-slide');
            
            // Remove active class from all slides
            slides.forEach(slide => slide.classList.remove('active'));
            
            // Add active class to current slide
            slides[currentSlide].classList.add('active');
            
            document.getElementById('currentSlide').textContent = currentSlide + 1;
            
            // Update active thumbnail
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach((thumb, index) => {
                thumb.classList.toggle('active', index === currentSlide);
            });
        }

        // Toggle autoplay
        function toggleAutoplay() {
            const btn = document.getElementById('autoplayBtn');
            
            if (isAutoplay) {
                clearInterval(autoplayInterval);
                bgMusic.pause();
                btn.textContent = '▶️ Start Slideshow';
                btn.style.background = 'linear-gradient(135deg, #8a74f9, #c261fe)';
                isAutoplay = false;
            } else {
                // Start music
                bgMusic.play().catch(e => console.log('Audio play failed:', e));
                
                autoplayInterval = setInterval(() => {
                    changeSlide(1);
                }, 3000);
                btn.textContent = '⏸️ Pause Slideshow';
                btn.style.background = 'linear-gradient(135deg, #ff6beb, #c261fe)';
                isAutoplay = true;
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                changeSlide(-1);
            } else if (e.key === 'ArrowRight') {
                changeSlide(1);
            } else if (e.key === ' ') {
                e.preventDefault();
                toggleAutoplay();
            }
        });

        // Touch/Swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        const carouselWrapper = document.querySelector('.carousel-wrapper');

        carouselWrapper.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        carouselWrapper.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                changeSlide(1); // Swipe left
            }
            if (touchEndX > touchStartX + 50) {
                changeSlide(-1); // Swipe right
            }
        }

        // Initialize
        createStars();
        generateThumbnails();
        document.getElementById('totalSlides').textContent = totalSlides;

        // Add parallax effect on scroll
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const stars = document.getElementById('stars');
            stars.style.transform = `translateY(${scrolled * 0.5}px)`;
        });
    </script>
</body>
</html>