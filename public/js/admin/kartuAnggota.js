const dataIcon = document.querySelector('.kartu-anggota').getAttribute('data-icon')
const dataTitle = document.querySelector('.kartu-anggota').getAttribute('data-title')
const dataInfo = document.querySelector('.kartu-anggota').getAttribute('data-info')

if (dataInfo && dataTitle) {
    Swal.fire({
        icon: dataIcon,
        title: dataTitle,
        text: dataInfo
    })
}