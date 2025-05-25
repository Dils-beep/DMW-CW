$(document).ready(function() {
    let currentIndex = 0; //initialize index
    const images = $('.carousel-images img'); //get all images
    const totalImages = images.length; //total number og images

    function showImage(index) {
        const offset = -index * 600; //calculatw the offset
        $('.carousel-images').css('transform', 'translateX(' + offset + 'px)'); //move carousel
    }

    $('.next').click(function() {
        currentIndex++; //next image
        if (currentIndex >= totalImages) {
            currentIndex = 0; //reset to first
        }
        showImage(currentIndex); // Update carousel
    });

    $('.prev').click(function() {
        currentIndex--; //previous image
        if (currentIndex < 0) {
            currentIndex = totalImages - 1; //to last if at begining
        }
        showImage(currentIndex); // Update carousel
    });

    // Auto-change every 3 seconds
    setInterval(function() {
        $('.next').click(); //trigger next button click
    }, 3000);
});
