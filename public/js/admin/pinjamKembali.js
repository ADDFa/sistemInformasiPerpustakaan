/*
 * -------------------------------------------------------------------------------------
 * Tabel pinjam kembali
 * -------------------------------------------------------------------------------------
*/
/*
 * -------------------------------------------------------------------------------------
 * Tangkap elements yag dibutuhkan
 * -------------------------------------------------------------------------------------
*/
const pinjam = document.querySelector('.pinjam-kembali a:first-child')
const kembali = document.querySelector('.pinjam-kembali a:last-child')
const daftarBukuDipinjam = document.querySelector('.daftarBukuDipinjam')
const daftarBukuDikembalikan = document.querySelector('.daftarBukuDikembalikan')
const tambah = document.querySelector('.tambah')
const h1Judul = document.querySelector('.buku h1')
const form = document.querySelector('.tambah-pinjam-kembali form')
const tanggal = document.querySelector('.tambah-pinjam-kembali label[for="tanggal"]')
const total = document.querySelector('.total')

/*
 * -------------------------------------------------------------------------------------
 * Saat tombol pinjam di klik
 * -------------------------------------------------------------------------------------
*/

// buat element input dan label total
const eTotal = `
    <label for="total" class="total">Total Dipinjam</label>
    <input type="number" name="total" id="total" autocomplete="off" required class="total">
        `

pinjam.onclick = function () {
    document.querySelector('.total-pinjam-kembali').innerHTML = 'Total Dipinjam'

    tambah.removeAttribute('style')
    h1Judul.innerHTML = 'Daftar Buku Dipinjam'
    daftarBukuDikembalikan.setAttribute('style', 'display: none;')
    daftarBukuDipinjam.removeAttribute('style')
    total.innerHTML = eTotal
    tanggal.innerHTML = 'Tanggal Dipinjam'

    form.setAttribute('action', '/Admin/tambahPinjamKembali/pinjam')

    // pencarian
    document.querySelector('.pencarian form').setAttribute('action', '/Admin/pinjamKembali')
}

/*
 * -------------------------------------------------------------------------------------
 * Saat tombol kembali di klik
 * -------------------------------------------------------------------------------------
*/
function klikKembali() {
    document.querySelector('.total-pinjam-kembali').innerHTML = 'Total Dikembalikan'

    // untuk menghilangkan label dan input
    const input = total.querySelector('label')
    const label = total.querySelector('input')

    tambah.setAttribute('style', 'display: none;')
    h1Judul.innerHTML = 'Daftar Buku Dikembalikan'
    daftarBukuDikembalikan.removeAttribute('style')
    daftarBukuDipinjam.setAttribute('style', 'display: none;')

    input.parentNode.removeChild(input)
    label.parentNode.removeChild(label)

    tanggal.innerHTML = 'Tanggal Dikembalikan'

    form.setAttribute('action', '/Admin/tambahPinjamKembali/kembali')

    // pencarian
    document.querySelector('.pencarian form').setAttribute('action', '/Admin/pinjamKembali#kembali')
}

kembali.addEventListener('click', klikKembali)

const uri = window.location.hash
if (uri == '#kembali') {
    klikKembali()
}


/*
 * -------------------------------------------------------------------------------------
 * Popup halaman tambah peminjaman
 * -------------------------------------------------------------------------------------
*/
const close = document.querySelector('img[alt="close"]')
const tombolTambah = document.querySelector('.tambah')

tambah.onclick = function () {
    document.querySelector('.tambah-pinjam-kembali').removeAttribute('style')
}

close.onclick = function () {
    document.querySelector('.tambah-pinjam-kembali').setAttribute('style', 'display: none;')

    // kembalikan ke alamat pengiriman : /Admin/tambahPinjamKembali/pinjam
    document.querySelector('.tambah-pinjam-kembali form').setAttribute('action', '/Admin/tambahPinjamKembali/pinjam')
}

/*
 * -------------------------------------------------------------------------------------
 * Flash Message
 * -------------------------------------------------------------------------------------
*/
const dataIcon = document.querySelector('.buku').getAttribute('data-icon')
const dataTitle = document.querySelector('.buku').getAttribute('data-title')
const dataInfo = document.querySelector('.buku').getAttribute('data-info')

if (dataInfo && dataTitle) {
    Swal.fire({
        icon: dataIcon,
        title: dataTitle,
        text: dataInfo
    })
}

const hapus = document.querySelectorAll('.hapus')

for (let i = 0; i < hapus.length; i++) {
    hapus[i].addEventListener('click', function () {
        // ambil alamat pengiriman
        const uriHapus = hapus[i].getAttribute('data-uriHapus')

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda tidak bisa mengaksesnya setelah dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Saya yakin'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector('a[href="' + uriHapus + '"]').click()
            }
        })
    })
}