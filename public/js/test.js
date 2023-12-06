function openPopup(id) {
    document.getElementById("popupContainer").style.display = "flex";
    // Tambahkan logika atau ambil data sesuai dengan id
    // Contoh: let data = getDataById(id);
    // document.getElementById("popupContent").innerHTML = data;
}

// test.js

function openPopup(pelanggaran) {
    var popupContainer = document.getElementById("popupContainer");
    var popupContent = document.getElementById("popupContent");

    // Sesuaikan konten pop-up berdasarkan pelanggaran
    switch (pelanggaran) {
        case 1:
            popupContent.innerHTML = "<p>Pelanggaran Tingkat 1: Bermain kartu atau game online.</p><p>Ini adalah informasi tambahan untuk pelanggaran tingkat 1.</p>";
            break;
        case 2:
            popupContent.innerHTML = "<p>Pelanggaran Tingkat 2: Bermain kartu atau game online.</p><p>Ini adalah informasi tambahan untuk pelanggaran tingkat 2.</p>";
            break;
        case 3:
            popupContent.innerHTML = "<p>Pelanggaran Tingkat 3: Bermain kartu atau game online.</p><p>Ini adalah informasi tambahan untuk pelanggaran tingkat 3.</p>";
            break;
        case 4:
            popupContent.innerHTML = "<p>Pelanggaran Tingkat 4: Bermain kartu atau game online.</p><p>Ini adalah informasi tambahan untuk pelanggaran tingkat 4.</p>";
            break;
        case 5:
            popupContent.innerHTML = "<p>Pelanggaran Tingkat 5: Bermain kartu atau game online.</p><p>Ini adalah informasi tambahan untuk pelanggaran tingkat 5.</p>";
            break;
        default:
            popupContent.textContent = "Konten pop-up default.";
    }

    popupContainer.style.display = "flex";
}
