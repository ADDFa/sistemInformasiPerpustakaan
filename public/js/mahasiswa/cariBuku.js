/*
 * -------------------------------------------------------------------------------------
 * Ambil element yang dibutuhkan
 * -------------------------------------------------------------------------------------
 */
const dataInfo = document.querySelector("input[name='searchBook']").getAttribute('data-info')

/*
 * -------------------------------------------------------------------------------------
 * Jika element dataInfo tidak ada
 * Buat feedback dengan sweet allert
 * -------------------------------------------------------------------------------------
 */
if (dataInfo) {
    Swal.fire({
        icon: 'error',
        title: 'Maaf',
        text: dataInfo,
        footer: '<a href="">Lihat daftar buku?</a>'
    })

    /*
     * -------------------------------------------------------------------------------------
     * Sweet allert style
     * -------------------------------------------------------------------------------------
     */
    const aFooter = document.querySelector('.swal2-footer a')

    aFooter.href = '/daftarBuku'
    aFooter.style.fontFamily = 'sansreguler'
    aFooter.style.textDecoration = 'none'
    aFooter.style.color = '#333'
    aFooter.onmouseenter = function () {
        aFooter.style.color = '#0000B6'
    }
    aFooter.onmouseleave = function () {
        aFooter.style.color = '#333'
    }
}