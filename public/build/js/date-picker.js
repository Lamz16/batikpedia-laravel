document.addEventListener("DOMContentLoaded", function () {

    const inputPicker = document.getElementById("inputTanggalBerita");
    const inputHidden = document.getElementById("tglBeritaHidden");

    if (!inputPicker || !inputHidden) return;

    const months = ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"];

    inputPicker.addEventListener("change", function () {

        if (!this.value) {
            inputHidden.value = "";
            return;
        }

        const date = new Date(this.value);

        const formatted =
            date.getDate() + " " +
            months[date.getMonth()] + " " +
            date.getFullYear() + " " +
            date.getHours().toString().padStart(2, "0") + "." +
            date.getMinutes().toString().padStart(2, "0");

        // input hidden untuk dikirim ke backend
        inputHidden.value = formatted;

        console.log("Tanggal terformat:", formatted);
    });
});
