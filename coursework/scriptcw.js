$(document).ready(function() {
    let currentIndex = 0; 
    const images = $('.carousel-images img'); 
    const totalImages = images.length; 

    function showImage(index) {
        const offset = -index * 600; 
        $('.carousel-images').css('transform', 'translateX(' + offset + 'px)'); 
    }

    $('.next').click(function() {
        currentIndex++; // Move to the next image
        if (currentIndex >= totalImages) {
            currentIndex = 0; // Go back to the first image if at the end
        }
        showImage(currentIndex); // Update the carousel
    });

    $('.prev').click(function() {
        currentIndex--; // Move to the previous image
        if (currentIndex < 0) {
            currentIndex = totalImages - 1; // Go to the last image if at the start
        }
        showImage(currentIndex); // Update the carousel
    });

    // Automatic image change every 3 seconds
    setInterval(function() {
        $('.next').click(); // Perform click on the next button
    }, 3000);
});
