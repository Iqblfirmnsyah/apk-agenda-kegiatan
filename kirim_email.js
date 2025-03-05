document.getElementById("kirimEmail").addEventListener("click", function () {
    if (confirm("Apakah Anda yakin ingin mengirim notifikasi email?")) {
        fetch("kirim_email.php", {
            method: "POST",
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert("Email notifikasi berhasil dikirim!");
            } else {
                alert("Email gagal dikirim, silahkan cek koneksi atau kegiatan anda");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("Terjadi kesalahan saat mengirim email.");
        });
    }
});
