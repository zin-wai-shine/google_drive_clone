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

// Delete Items
let deleteItem = document.querySelectorAll('#deleteItem');
let deleteForm = document.querySelector('#deleteForm');

deleteItem.forEach(e => {
    e.addEventListener('click', () => {
        deleteForm.submit();
    })
})

// Folder Upload
let uploadFolderForm = document.getElementById('uploadFolderForm');
let uploadFolderInput = document.getElementById('uploadFolderInput');
let uploadFolderBtn = document.querySelectorAll('#uploadFolderBtn');
let uploadFolderName = document.getElementById('uploadFolderName')

uploadFolderBtn.forEach(e => {
    e.addEventListener('click' , () => {
        uploadFolderInput.click();
    });
});

uploadFolderInput.addEventListener('change', (e)=>{
    let name = e.target.files[0].webkitRelativePath.substring(0,e.target.files[0].webkitRelativePath.indexOf('/'));
    uploadFolderName.value = name;
    uploadFolderForm.submit();
})


