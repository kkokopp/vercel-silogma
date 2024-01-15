document.addEventListener('DOMContentLoaded', function () {
    // Temukan tombol tutup
    var closeBtn = document.getElementById('closeSuccess');

    // Periksa apakah tombol tutup ditemukan
    if (closeBtn) {
        // Tambahkan event listener untuk menutup pesan flash saat tombol ditutup
        closeBtn.addEventListener('click', function () {
            var flashMessage = document.querySelector('.bg-green-200');
            
            // Animasi atau aturan penutupan lainnya di sini jika diperlukan
            if (flashMessage) {
                flashMessage.style.display = 'none';
            }
        });
    }
});
