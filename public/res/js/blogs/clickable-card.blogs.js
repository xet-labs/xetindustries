document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.post').forEach(function(post) {
        post.addEventListener('click', function(e) {
            if (e.target.closest('a, button')) {
                return;
            }
            window.location.href = this.dataset.href;
        });
  
        post.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                window.location.href = this.dataset.href;
            }
        });
    });
});