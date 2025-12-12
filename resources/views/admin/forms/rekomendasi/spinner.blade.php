<script>
    const form = document.querySelector('.forms-sample');

    form.addEventListener('submit', function () {
        const btn = document.getElementById('submitBtn');
        const spinner = document.getElementById('submitSpinner');
        const text = document.getElementById('submitText');

        // tampilkan spinner
        spinner.classList.remove('d-none');
        text.textContent = "Processing...";

        // disable setelah submit berjalan
        btn.disabled = true;
    });
</script>
