function openPopup(pelangaran) {
    document.getElementById("popupContainer").style.display = "flex";
    // Add logic to fetch data based on id and update popupContent
    document.getElementById("popupContent").innerHTML = "Popup content for ID " + pelanggaran;
}

function closePopup() {
    document.getElementById("popupContainer").style.display = "none";
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
