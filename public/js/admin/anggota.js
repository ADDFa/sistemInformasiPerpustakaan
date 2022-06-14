const baseUrl = 'http://localhost:8080/'

/*
 * -------------------------------------------------------------------------------------
 * Tangkap elements yang dibutuhkan
 * Menampilkan halaman tambah
 * -------------------------------------------------------------------------------------
*/
const form = document.querySelector('.form')
const tombolTambah = document.querySelector('.tambah')
const close = document.querySelector('img[alt="close"]')

tombolTambah.onclick = function () {
    form.classList.toggle('formToggle')

    // nonaktifkan scroll
    document.querySelector('body').style.overflowY = 'hidden'

    // method action
    form.querySelector('form').setAttribute('action', baseUrl + '/inputBuku/' + aktif)

    const input = document.querySelectorAll('form li input')

    for (let i = 0; i < input.length; i++) {
        input[i].removeAttribute('value')
    }

    // hapus atribut style untuk display none
    document.querySelector('.input-file').removeAttribute('style')
    document.querySelector('.form button').removeAttribute('style')
}

close.onclick = function () {
    document.querySelector('.form').classList.toggle('formToggle')

    // aktifkan scroll
    document.querySelector('body').style.overflowY = 'scroll'

    // hapus atribut style
    document.querySelector('.form li button').removeAttribute('style')
}

/*
 * -------------------------------------------------------------------------------------
 * Halaman detail
 * -------------------------------------------------------------------------------------
*/
const detail = document.querySelectorAll('.detail')


for (let i = 0; i < detail.length; i++) {
    let dataAnggota = document.querySelectorAll('.data-anggota')[i].getAttribute('data-anggota')
    dataAnggota = dataAnggota.split('--pisah--')

    detail[i].onclick = function () {
        document.querySelector('.form').classList.toggle('formToggle')

        document.querySelector('body').style.position = 'relative'

        // method action
        document.querySelector('.form form').setAttribute('action', '')
        // input
        const input = document.querySelectorAll('.form li input')

        for (let i = 0; i < input.length; i++) {
            input[i].setAttribute('value', dataAnggota[i])
        }

        // hapus tombol dan bersihkan margin bottom di <li> terakhir
        document.querySelector('.form button').setAttribute('style', 'display: none;')
    }
}

/*
 * -------------------------------------------------------------------------------------
 * Popup ubah
 * -------------------------------------------------------------------------------------
*/
const ubah = document.querySelectorAll('.ubah')

for (let i = 0; i < ubah.length; i++) {
    let dataAnggota = document.querySelectorAll('.data-anggota')[i].getAttribute('data-anggota')
    dataAnggota = dataAnggota.split('--pisah--')

    ubah[i].onclick = function () {
        const id = ubah[i].getAttribute('data-id')

        document.querySelector('.form').classList.toggle('formToggle')

        document.querySelector('body').style.position = 'relative'

        // method action
        document.querySelector('.form form').setAttribute('action', baseUrl + 'Admin/ubahAnggotaSave/' + id)
        // input
        const input = document.querySelectorAll('.form li input')

        for (let i = 0; i < input.length; i++) {
            input[i].setAttribute('value', dataAnggota[i])
        }
    }
}

/*
 * -------------------------------------------------------------------------------------
 * Hapus
 * -------------------------------------------------------------------------------------
*/
const hapus = document.querySelectorAll('.hapus')

for (let i = 0; i < hapus.length; i++) {
    hapus[i].addEventListener('click', function () {
        // ambil alamat url
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

/*
 * -------------------------------------------------------------------------------------
 * Flash Message
 * -------------------------------------------------------------------------------------
*/
const dataIcon = document.querySelector('.anggota').getAttribute('data-icon')
const dataTitle = document.querySelector('.anggota').getAttribute('data-title')
const dataInfo = document.querySelector('.anggota').getAttribute('data-info')

if (dataInfo && dataTitle) {
    Swal.fire({
        icon: dataIcon,
        title: dataTitle,
        text: dataInfo
    })
}