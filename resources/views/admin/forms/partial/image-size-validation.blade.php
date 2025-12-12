<script>
    document.addEventListener('DOMContentLoaded', function () {

        const fileInput = document.querySelector('.file-upload-default');
        const alertSize = document.getElementById('alertFileToLarge');
        const alertFormat = document.getElementById('alertFormatNotSupport');

        fileInput.addEventListener('change', function () {

            alertSize.classList.add('d-none');
            alertFormat.classList.add('d-none');

            if (this.files.length > 0) {
                const file = this.files[0];

                console.log("FILE SELECTED:");
                console.log("NAME:", file.name);
                console.log("TYPE:", file.type);
                console.log("SIZE:", file.size);

                // Validasi ukuran
                const fileSize = file.size / 1024 / 1024;
                if (fileSize > 2) {
                    alertSize.classList.remove('d-none');
                    this.value = ""; // reset input
                    return;
                }

                // Validasi extension
                const allowedExt = [".jpg", ".jpeg", ".png"];
                const name = file.name.toLowerCase();

                if (!allowedExt.some(ext => name.endsWith(ext))) {
                    alertFormat.classList.remove('d-none');
                    this.value = ""; // reset input
                    return;
                }
            }
        });
    });
</script>
