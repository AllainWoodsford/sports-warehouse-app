<script crossorigin="anonymous">
/*By Paul Conroy
From: https://www.conroyp.com/articles/improve-load-time-performance-lazily-loading-background-images
*/
// Check for IntersectionObserver support
if ('IntersectionObserver' in window) {
document.addEventListener("DOMContentLoaded", function() {

    function handleIntersection(entries) {
    entries.map((entry) => {
        if (entry.isIntersecting) {
        // Item has crossed our observation
        // threshold - load src from data-src
        entry.target.style.backgroundImage = "url('"+entry.target.dataset.bgimage+"')";
        // Job done for this item - no need to watch it!
        observer.unobserve(entry.target);
        }
    });
    }

    const headers = document.querySelectorAll('.site-main__banner');
    const observer = new IntersectionObserver(
    handleIntersection,
    { rootMargin: "100px" }
    );
    headers.forEach(header => observer.observe(header));
});
} else {
// No interaction support? Load all background images automatically
const headers = document.querySelectorAll('.site-main__banner');
headers.forEach(header => {
    header.style.backgroundImage = "url('"+header.dataset.bgimage+"')";
});
}    
</script>
