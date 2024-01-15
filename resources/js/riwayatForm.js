// import Datepicker from 'flowbite-datepicker/Datepicker';



// const Datepicker = require('flowbite-datepicker/Datepicker');
document.addEventListener('DOMContentLoaded', function () {
    const riwayatFormContainer = document.getElementById('riwayatContainer');
    const riwsSection = document.getElementById('riwSec');
    const tambahRiwayatButton = document.getElementById('tambahRiwayat');
    const toggleForm = document.getElementById('toggleForm');
    const riwayatForm = document.getElementById('riwayatForm');

    let formCounter = 1;
    // Counter untuk ID formulir

    toggleForm.addEventListener('click', function () {
        // console.log(riwayatForm);
        const isOpen = riwayatForm.classList.toggle('open');
        const arrowBottom = document.getElementById('arrow-bottom');
        const arrowLeft = document.getElementById('arrow-left');
        arrowBottom.classList.toggle('hidden', !isOpen);
        arrowLeft.classList.toggle('hidden', isOpen);
    });

    tambahRiwayatButton.addEventListener('click', function () {
        const newData = {};
        createNewRiwayatForm(newData);
    });
    
    function updateArrowIcons(isOpen, arrowBottom, arrowLeft) {
        arrowBottom.classList.toggle('hidden', !isOpen);
        arrowLeft.classList.toggle('hidden', isOpen);
    }
    
    function createNewRiwayatForm() {
        const newriwayatCon = document.getElementById('riwayatContainer').cloneNode(true);
        // console.log(newriwayatCon);
        const newJudul = newriwayatCon.querySelector('#judulRiwayat');
        const newRiwayatForm = newriwayatCon.querySelector('#riwayatForm');

        const newCatatan = newRiwayatForm.querySelector('#catatan');
        // console.log(newCatatan);
        const newCatatanId = 'catatan_' + formCounter;
        newCatatan.id = newCatatanId;
        newCatatan.for = newCatatanId;
        newCatatan.name = 'riwayat[' + formCounter + '][catatan]';

    
        const newLokasi = newRiwayatForm.querySelector('#lokasi_operasi');
        const newLokasiId = 'lokasi_operasi_' + formCounter;
        newLokasi.id = newLokasiId;
        newLokasi.name = 'riwayat[' + formCounter + '][lokasi_operasi]';
    
        const newNamaOperasi = newRiwayatForm.querySelector('#nama_operasi');
        const newNamaOperasiId = 'nama_operasi_' + formCounter;
        newNamaOperasi.id = newNamaOperasiId;
        newNamaOperasi.name = 'riwayat[' + formCounter + '][nama_operasi]';

    
        const tglMulai = newRiwayatForm.querySelector('#tanggal_mulai');
        const tglSelesai = newRiwayatForm.querySelector('#tanggal_selesai');
    
        const newtglMulaiId = 'tanggal_mulai_' + formCounter;
        tglMulai.id = newtglMulaiId;
        tglMulai.setAttribute('data-id', newtglMulaiId);
        tglMulai.name = 'riwayat[' + formCounter + '][tanggal_mulai]';

    
        const newtglSelesaiId = 'tanggal_selesai_' + formCounter;
        tglSelesai.id = newtglSelesaiId;
        tglSelesai.setAttribute('data-id', newtglSelesaiId);
        tglSelesai.name = 'riwayat[' + formCounter + '][tanggal_selesai]';

        const kodeRiwayat = newRiwayatForm.querySelector('#kode_riwayat');
        if(kodeRiwayat) {
            const newKodeRiwayatId = 'kode_riwayat_' + formCounter;
            kodeRiwayat.id = newKodeRiwayatId;
            kodeRiwayat.name = 'riwayat[' + formCounter + '][kode_riwayat]';
        }

    
        const newJudulId = 'judul_' + formCounter;
        newJudul.id = newJudulId;
        newJudul.textContent = 'Riwayat ' + formCounter;
    
        const newFormId = 'riwayatForm_' + formCounter;
        newRiwayatForm.id = newFormId;
    
        const toggleFormButton = newriwayatCon.querySelector('#toggleForm');
        toggleFormButton.id = 'toggleForm_' + formCounter;
    
        const arrowBottom = newriwayatCon.querySelector('#arrow-bottom');
        arrowBottom.id = 'arrow-bottom_' + formCounter;
    
        const arrowLeft = newriwayatCon.querySelector('#arrow-left');
        arrowLeft.id = 'arrow-left_' + formCounter;
    
        const inputs = newRiwayatForm.querySelectorAll('input, textarea');
        inputs.forEach(input => input.value = '');

        riwsSection.appendChild(newriwayatCon);

        // if (data.nama) {
        //     newNamaOperasi.value = data.nama;
        // }
        // if (data.lokasi) {
        //     newLokasi.value = data.lokasi;
        // }
        // if (data.catatan) {
        //     newCatatan.value = data.catatan;
        // }
        // if (data.tanggal_mulai) {
        //     const formattedDate = convertDate(data.tanggal_mulai);
        //     tglMulai.value = formattedDate;
        // }
        // if (data.tanggal_selesai) {
        //     const formattedDate = convertDate(data.tanggal_selesai);
        //     tglSelesai.value = formattedDate;
        // }
        // if (data.kode_operasi) {
        //     kodeRiwayat.value = data.kode_operasi;
        // }

        toggleFormButton.addEventListener('click', function () {
            const isOpen = newRiwayatForm.classList.toggle('open');
            updateArrowIcons(isOpen, arrowBottom, arrowLeft);
        });
    
        formCounter++;
    }

    if (typeof riwayatData !== 'undefined') {
        jumlahData = riwayatData.length;
        jumlahData = jumlahData - 2;
        for (let i = 0; i <= jumlahData; i++) {
            createNewRiwayatForm();
        }
        // console.log(riwayatData);
        riwayatData.forEach((data, index) => {
            injectData(data, index);
        });
    }

    function injectData(data, index){
        // const n = 'nama_operasi_' + index;
        // console.log(n);
        if(index === 0) {
            const namaOperasi = document.getElementById('nama_operasi');
            const lokasiOperasi = document.getElementById('lokasi_operasi');
            const catatan = document.getElementById('catatan');
            const tglMulai = document.getElementById('tanggal_mulai');
            const tglSelesai = document.getElementById('tanggal_selesai');
            const kodeRiwayat = document.getElementById('kode_riwayat');
    
            if (data.nama) {
                namaOperasi.value = data.nama;
            }
            if (data.lokasi) {
                lokasiOperasi.value = data.lokasi;
            }
            if (data.catatan) {
                catatan.value = data.catatan;
            }
            if (data.tanggal_mulai) {
                const formattedDate = convertDate(data.tanggal_mulai);
                tglMulai.value = formattedDate;
            }
            if (data.tanggal_selesai) {
                const formattedDate = convertDate(data.tanggal_selesai);
                tglSelesai.value = formattedDate;
            }
            if (data.kode_operasi) {
                kodeRiwayat.value = data.kode_operasi;
            }
        }else{
            const namaOperasi = document.getElementById('nama_operasi_' + index);
            // console.log(namaOperasi);
            const lokasiOperasi = document.getElementById('lokasi_operasi_' + index);
            const catatan = document.getElementById('catatan_' + index);
            const tglMulai = document.getElementById('tanggal_mulai_' + index);
            const tglSelesai = document.getElementById('tanggal_selesai_' + index);
            const kodeRiwayat = document.getElementById('kode_riwayat_' + index);
    
            if (data.nama) {
                namaOperasi.value = data.nama;
            }
            if (data.lokasi) {
                lokasiOperasi.value = data.lokasi;
            }
            if (data.catatan) {
                catatan.value = data.catatan;
            }
            if (data.tanggal_mulai) {
                const formattedDate = convertDate(data.tanggal_mulai);
                tglMulai.value = formattedDate;
            }
            if (data.tanggal_selesai) {
                const formattedDate = convertDate(data.tanggal_selesai);
                tglSelesai.value = formattedDate;
            }
            if (data.kode_operasi) {
                kodeRiwayat.value = data.kode_operasi;
            }

        }
    }

    function convertDate(originalDate) {
        const dateObject = new Date(originalDate);

        const day = dateObject.getDate();
        const month = dateObject.getMonth() + 1; 
        const year = dateObject.getFullYear();

        const formattedDay = day < 10 ? '0' + day : day;
        const formattedMonth = month < 10 ? '0' + month : month;

        const formattedDate = `${formattedMonth}/${formattedDay}/${year}`;

        return formattedDate;
    }

});