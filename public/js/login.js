/*
 * -------------------------------------------------------------------------------------
 * Ambil element yang dibutuhkan
 * -------------------------------------------------------------------------------------
*/
// const formUl = document.querySelector('.formLogin ul')
// const span = document.querySelectorAll('.formLogin div span')

// span[1].onclick = function () {
//     if ((span[1].innerText.split(' ')[0]) == 'Register') {
//         document.querySelector('.formLogin h1').innerHTML = 'Register Perpus<br>FT UNIB'

//         document.querySelector('.formLogin form').setAttribute('action', '/Login/register')

//         formUl.innerHTML =
//             `<li>
//                 <label for="username">Username</label>
//                 <input type="text" name="username" id="username" autocomplete="off" required placeholder="NPM Mahasiswa">
//             </li>

//             <li>
//                 <label for="nama">Nama</label>
//                 <input type="text" name="nama" id="nama" autocomplete="off" required placeholder="Nama Mahasiswa">
//             </li>

//             <li>
//                 <label for="programStudi">Program Studi</label>
//                 <input type="text" name="programStudi" id="programStudi" autocomplete="off" required placeholder="S1 - Informatika">
//             </li>

//             <li>
//                 <label for="password">Password</label>
//                 <input type="password" name="password" id="password" autocomplete="off" required>
//             </li>

//             <li>
//                 <label for="password">Konfirmasi password</label>
//                 <input type="password" name="konfirmasiPassword" id="password" autocomplete="off" required>
//             </li>

//             <li>
//                 <button type="submit" name="register">Register</button>
//             </li>`

//         span[0].innerText = 'Memiliki akun?'
//         span[1].innerText = 'Login disini'
//     } else {
//         document.querySelector('.formLogin h1').innerHTML = 'Sign In to Perpus<br>FT UNIB'

//         document.querySelector('.formLogin form').setAttribute('action', '/Login/cekLogin')

//         formUl.innerHTML =
//             `<li>
//                 <label for="username">Username</label>
//                 <input type="text" name="username" id="username" autocomplete="off">
//             </li>

//             <li>
//                 <label for="password">Password</label>
//                 <input type="password" name="password" id="password" autocomplete="off">
//             </li>

//             <li>
//                 <button type="submit" name="login">Sign In</button>
//             </li>`

//         span[0].innerText = 'Belum punya akun?'
//         span[1].innerText = 'Register disini'
//     }
// }

/*
 * -------------------------------------------------------------------------------------
 * Session / feedback login dan register
 * -------------------------------------------------------------------------------------
*/
const dataInfo = document.querySelector('.formLogin form h1').getAttribute('data-info')
const dataTitle = document.querySelector('.formLogin form h1').getAttribute('data-title')

if (dataInfo && dataTitle) {
    Swal.fire({
        icon: 'error',
        title: dataTitle,
        text: dataInfo
    })
}