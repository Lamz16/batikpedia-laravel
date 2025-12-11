<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alert = document.getElementById('successAlert');
        if(alert){
            setTimeout(() => {
                // Jika jQuery + Bootstrap 4 ada
                if(typeof $ !== 'undefined' && $('.alert').alert) {
                    $('.alert').alert('close');
                } else {
                    // fallback manual
                    alert.style.transition = "opacity 1s ease-in-out";
                    alert.style.opacity = 0;
                    setTimeout(() => alert.remove(), 1000);
                }
            }, 3000); // 3 detik sebelum hilang
        }
    });
</script>
