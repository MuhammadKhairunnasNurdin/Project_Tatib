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
</script>