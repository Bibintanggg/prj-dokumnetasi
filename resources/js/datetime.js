document.addEventListener('DOMContentLoaded', function() {
    const jam = new Date().getHours();
    let salam = '';

    if(jam >= 4 && jam < 10) {
        salam = 'Selamat Pagi'
    } else if (jam >= 10 && jam < 15 ) {
        salam = 'Selamt Siang'
    } else if ( jam >= 15 && 18 ) {
        salam = 'Selamat Sore' 
    } else if ( jam >= 18 && jam < 4) {
        salam = 'Selamat Malam'
    }

    const elemen = document.getElementById('waktu');
    if(elemen) {
        elemen.textContent = salam
    }
})