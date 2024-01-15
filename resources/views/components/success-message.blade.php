{{-- @props(['message']) --}}

<div class="alert alert-success bg-green-200 text-green-600 border-l-8 border-2 z-50 border-green-400 absolute right-0 max-w-2xl w-full translate-y-20 rounded-md p-5">
    <div class="flex w-full h-full items-center justify-between">
        <div class="flex justify-center items-center gap-4 h-full">
            <div class="bg-green-400 h-full rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="white" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>              
            </div>
            <h1>{{ session('success') }}</h1>
        </div>
        <div>
            <button id="closeSuccess">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
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

</script>