const berhasil = document.querySelector(".hubungi-kami button").getAttribute('data-berhasil');

if (berhasil) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: berhasil
    })
}