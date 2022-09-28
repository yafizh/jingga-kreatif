const input_nik = document.getElementById("nik");
const input_name = document.getElementById("name");
const input_birthplace = document.getElementById("birthplace");
const input_birthdate = document.getElementById("birthdate");
const input_father_name = document.getElementById("father_name");
const input_mother_name = document.getElementById("mother_name");
const input_photo = document.getElementById("photo");

const btn_upload_photo = document.getElementById("btn-upload-photo");

btn_upload_photo.addEventListener("click", function () {
    input_photo.click();
});

input_photo.addEventListener("change", function () {
    const [file] = this.files;
    document.getElementById(
        "preview-upload-photo"
    ).innerHTML = `<a href='${URL.createObjectURL(
        file
    )}' target='_blank'>Lihat Gambar</a>`;

});

document.querySelector('form').addEventListener('submit', function(e){
    if(!input_photo.files.length) {

    } else return;
    e.preventDefault();
    console.log('prevent')
});


