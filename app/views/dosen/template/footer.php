<script>
    // JavaScript untuk menampilkan/menyembunyikan dropdown
    function toggleDropdown() {
        const dropdown = document.getElementById("myDropdown");
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        } else {
            dropdown.style.display = "block";
        }
    }

    // Menutup dropdown jika pengguna mengklik di luar dropdown
    window.onclick = function(event) {
        if (!event.target.matches('.profile-title')) {
            const dropdowns = document.getElementsByClassName("dropdown-content");
            let i;
            for (i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
    function loadMahasiswa(mahasiswa) {
        // Mendapatkan elemen dropdown kelas
        var kelasDropdown = document.getElementById("id_kelas");

        // Mendapatkan nilai yang dipilih dari dropdown kelas
        var selectedKelas = Number(kelasDropdown.value);

        // Mendapatkan elemen dropdown mahasiswa
        var mahasiswaDropdown = document.getElementById("mahasiswa");

        // Menghapus opsi yang ada pada dropdown mahasiswa
        mahasiswaDropdown.innerHTML = "";

        // Simulasi data mahasiswa berdasarkan kelas (gantilah dengan data dinamis dari server)
        var mahasiswaData = "";
        mahasiswaData = mahasiswa;

        // Menambahkan opsi mahasiswa ke dropdown
        mahasiswaData.forEach(function(mhs) {
            var option = document.createElement("option");
            if (mhs.kelas_id === selectedKelas) {
                option.value = mhs.NIM;
                option.text = mhs.nama;
                mahasiswaDropdown.add(option);
            }
        });
    }

    function loadPelanggaran(jenis, sanksi) {
        // Mendapatkan elemen dropdown pelanggaran
        var tingkatDropdown = document.getElementById("tingkat");

        // Mendapatkan nilai yang dipilih dari dropdown pelanggaran
        var selectedTingkat = tingkatDropdown.value;

        // Mendapatkan elemen dropdown jenis
        var jenisDropdown = document.getElementById("jenis");

        // Menghapus opsi yang ada pada dropdown jenis
        jenisDropdown.innerHTML = "";

        // Simulasi data jenis berdasarkan pelanggaran (gantilah dengan data dinamis dari server)
        var jenisData = "";
        jenisData = jenis;

        // Menambahkan opsi mahasiswa ke dropdown
        jenisData.forEach(function(jenis) {
            var option = document.createElement("option");
            if (jenis.tingkatan === selectedTingkat) {
                option.value = jenis.no_jenis;
                option.text = jenis.jenis;
                jenisDropdown.add(option);
            }
        });

        var sanksiDropdown = document.getElementById("sanksi");

        sanksiDropdown.innerHTML = "";

        var sanksiData = "";
        sanksiData = sanksi;

        sanksiData.forEach(function(sanksi) {
            var option = document.createElement("option");
            if (sanksi.tingkatan === selectedTingkat) {
                option.value = sanksi.no_sanksi;
                option.text = sanksi.sanksi;
                sanksiDropdown.add(option);
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>