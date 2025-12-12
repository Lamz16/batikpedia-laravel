<script>
    const displayInput = document.getElementById('harga_kursus_display');
    const realInput = document.getElementById('harga_kursus');

    displayInput.addEventListener('input', function () {
        // Ambil hanya angka
        const rawNumber = this.value.replace(/\D/g, '');

        // Simpan ke hidden input (kirim ke server)
        realInput.value = rawNumber;

        // Format tampilan ke ribuan
        this.value = new Intl.NumberFormat('id-ID').format(rawNumber);
    });
</script>
