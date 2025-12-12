document.addEventListener("DOMContentLoaded", function () {

    const inputDate = document.getElementById("tgl_berita");
    const hiddenDate = document.getElementById("tglBeritaHidden");

    if (!inputDate || !hiddenDate) return;

    inputDate.addEventListener("change", function () {
        const value = this.value; // contoh: 2024-04-19T10:00

        if (!value) {
            hiddenDate.value = "";
            return;
        }

        const date = new Date(value);

        const day = date.getDate();
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
        const month = monthNames[date.getMonth()];
        const year = date.getFullYear();

        // Format jam & menit
        let hours = date.getHours();
        let minutes = date.getMinutes();

        if (hours < 10) hours = "0" + hours;
        if (minutes < 10) minutes = "0" + minutes;

        // Format final → 19 Apr 2024 10.00
        const formatted = `${day} ${month} ${year} ${hours}.${minutes}`;

        hiddenDate.value = formatted;
        console.log("Formatted Date:", formatted);
    });

});
