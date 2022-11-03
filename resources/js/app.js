import './bootstrap';
let newFile = document.querySelectorAll('#newFile');
let uploadForm = document.getElementById('uploadForm');
let getFile = document.getElementById('uploadFile');

newFile.forEach(e => {
    e.addEventListener('click', () => {
        getFile.click();
    });
})
getFile.addEventListener('change', () => {
    uploadForm.submit();
})
