/*const initSlider = () => {
    const sliderScrollbar= document.querySelector(".best_selling_container .slider-scrollbar");
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");


    // HANDLES SCROLLBAR THUMB DRAG
    scrollbarThumb.addEventListener("mousedown", (e) ={
        const startX = e.clientX;
        const thumbPosition= scrollbarThumb.offsetLeft;

        //UPDATES THUMB POSITION WHEN TH EMOUSE MOVES 

        const handleMouseMove = (e) => {
            const deltaX= e.clientX - startX;
            const newThumbPosition= thumbPosition + deltaX;
            scrollbarThumb.style.left = '${newThumbPosition}px';

        }

        //ADDS EVENT ISTENERS FOR DRAG INTERACTION

        document.addEventListener("mousemove", handleMouseMove)

}
    });
*/
const initSlider = () => {
    const sliderScrollbar = document.querySelector(".best_selling_container .slider-scrollbar");
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
    const sliderWrapper = document.querySelector(".slider-wrapper .items_images");

    // HANDLES SCROLLBAR THUMB DRAG
    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX; // Initial mouse position
        const thumbPosition = scrollbarThumb.offsetLeft; // Initial thumb position
        const maxThumbPosition = sliderScrollbar.offsetWidth - scrollbarThumb.offsetWidth; // Maximum thumb movement
        const maxScroll = sliderWrapper.scrollWidth - sliderWrapper.clientWidth; // Maximum scroll for slider content

        // Function to update thumb position and slider content scroll
        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX; // Change in mouse position
            let newThumbPosition = thumbPosition + deltaX; // Calculate new thumb position

            // Constrain thumb position within bounds
            newThumbPosition = Math.max(0, Math.min(newThumbPosition, maxThumbPosition));

            // Move the thumb
            scrollbarThumb.style.left = `${newThumbPosition}px`;

            // Calculate and apply scroll to the slider
            const scrollPercentage = newThumbPosition / maxThumbPosition;
            sliderWrapper.scrollLeft = scrollPercentage * maxScroll;
        };

        // Stop dragging when the mouse is released
        const handleMouseUp = () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        };

        // Add event listeners for dragging and stopping
        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);

        e.preventDefault(); // Prevent text selection while dragging
    });
};

// Initialize the slider functionality
initSlider();





