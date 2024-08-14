// Tooltips
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


// Preview Image
function previewImage() {
    const inputFileSampul = document.querySelector('#sampul');
    const inputFileUserImg = document.querySelector('#user_img');
    const label = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    const inputFile = inputFileSampul || inputFileUserImg;

    if (inputFile) {
        label.textContent = inputFile.files[0].name;

        const fileReader = new FileReader();
        fileReader.readAsDataURL(inputFile.files[0]);

        fileReader.onload = function (e) {
            imgPreview.src = e.target.result;
        }
    } else {
        alert('ID Not Found');
    }
}

