const baseUrl = 'http://localhost:8080/'

// ambil halaman aktif
let alamat = window.location.href
alamat = alamat.split('/')
aktif = parseInt(alamat[4])

/*
 * -------------------------------------------------------------------------------------
 * Algoritma navigasi
 * -------------------------------------------------------------------------------------
*/
const halaman = document.querySelector('.halaman')

// lakukan pengulangan
let data = ""
if (aktif < 4) {
    for (let i = 1; i <= (aktif + (5 - aktif)); i++) {
        data += `<a href="/dataBuku/` + i + `">` + i + `</a>`
    }
} else {
    for (let i = (aktif - 2); i < (aktif + 3); i++) {
        data += `<a href="/dataBuku/` + i + `">` + i + `</a>`
    }
}

halaman.innerHTML = data

/*
 * -------------------------------------------------------------------------------------
 * Ubah tampilan input file
 * -------------------------------------------------------------------------------------
*/
const uploadFile = document.querySelector('.input-file input[type="file"]')
const input = document.querySelector('.input-file .nama-file')
const p = document.querySelector('.input-file p')

p.onclick = function () {
    uploadFile.click()
}

document.oninput = function () {
    if (uploadFile.files[0]) {
        input.value = uploadFile.files[0].name
    }
}

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

    for (let i = 0; i < input.length - 2; i++) {
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

    // hapus atribute style
    document.querySelector('.input-file').removeAttribute('style')
    document.querySelector('.form button').removeAttribute('style')
}

/*
 * -------------------------------------------------------------------------------------
 * Popup detail
 * -------------------------------------------------------------------------------------
*/
const detail = document.querySelectorAll('.detail')


for (let i = 0; i < detail.length; i++) {
    let dataBuku = document.querySelectorAll('.data-buku')[i].getAttribute('data-buku')
    dataBuku = dataBuku.split('--pisah--')

    detail[i].onclick = function () {
        document.querySelector('.form').classList.toggle('formToggle')

        document.querySelector('body').style.position = 'relative'

        // method action
        document.querySelector('.form form').setAttribute('action', '')
        // input
        const input = document.querySelectorAll('.form li input')

        for (let i = 0; i < input.length - 2; i++) {
            input[i].setAttribute('value', dataBuku[i])
        }

        // hapus input dan tombol
        document.querySelector('.input-file').setAttribute('style', 'display: none;')
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
    let dataBuku = document.querySelectorAll('.data-buku')[i].getAttribute('data-buku')
    dataBuku = dataBuku.split('--pisah--')

    ubah[i].onclick = function () {
        const id = ubah[i].getAttribute('data-id')

        document.querySelector('.form').classList.toggle('formToggle')

        document.querySelector('body').style.position = 'relative'

        // method action
        document.querySelector('.form form').setAttribute('action', baseUrl + 'Admin/updateBuku/' + aktif + '/' + id + '/ubah')
        // input
        const input = document.querySelectorAll('.form li input')

        for (let i = 0; i < input.length - 2; i++) {
            input[i].setAttribute('value', dataBuku[i])
        }
    }
}

/*
 * -------------------------------------------------------------------------------------
 * Popup hapus
 * -------------------------------------------------------------------------------------
*/
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