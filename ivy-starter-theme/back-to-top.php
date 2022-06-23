<?php 
/* BACK TO TOP BUTTON
-----------------------------------------------------------------------*/
$backToTop = get_field('enable_back_to_top', 'option');

if ($backToTop) : ?>

    <a href="#top" id="back-to-top">Back to Top</a>';

    <script>
        /* The link that triggers the back to top behaviour.
        ----------------------------------------------------------------- */
        const backToTopButton = document.querySelector('#back-to-top');
        backToTopButton.style.display = "none";
            
        function displayBackToTop() {
            if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
                backToTopButton.style.display = "block";
            }
            else {
                backToTopButton.style.display = "none";
            }
        }
        window.addEventListener('scroll', debounce(displayBackToTop));

        // A list of all focusable elements on the page.
        const focusableElements = document.querySelectorAll('button, a, input, select, textarea, [tabindex]:not([tabindex="-1"])');

        // The options used in the native scrollTo method.
        const scrollOptions = {
            top: 0,
            left: 0,
            behavior: 'smooth'
        };

        // Whether the device supports smooth scroll, or not.
        const supportsNativeSmoothScroll = 'scrollBehavior' in document.documentElement.style;

        // Handles moving the user back to the top of the document.
        function moveToTop(event) {
            event.preventDefault();

            // Scroll to top.
            supportsNativeSmoothScroll ? window.scrollTo(scrollOptions) : window.scrollTo(scrollOptions.left, scrollOptions.top);

            // Focus the first focusable element.
            // bodyEl.focus({
            //     preventScroll: true,
            // })
            document.activeElement.blur();
        }

        // Listen for click, then move to top
        backToTopButton.addEventListener('click', moveToTop);

    </script>

<?php endif; 
// END Back to Top button 
?>