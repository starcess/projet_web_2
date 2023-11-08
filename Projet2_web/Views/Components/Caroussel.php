<?php
    $carousel_automatic_move = <<<BANANA
        <script>
        const radioButtons = document.querySelectorAll('input[type="radio"]');
        let currentIndex = 0; // Initial index

        function rotateCarousel() {
            // Uncheck the current radio button
            radioButtons[currentIndex].checked = false;

            // Increment the index or reset to 0 when reaching the end
            currentIndex = (currentIndex + 1) % radioButtons.length;

            // Check the next radio button to move the carousel
            radioButtons[currentIndex].checked = true;
        }

        // Rotate the carousel automatically every 3 seconds (adjust as needed)
        setInterval(rotateCarousel, 3000); // 3000 milliseconds (3 seconds)
        </script>
    BANANA;
    echo $carousel_automatic_move;
?>