import './bootstrap';
import '../../node_modules/resumable-file-uploads'

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
// UPLOAD FILES
/*let token = document.head.querySelector("[name=csrf-token]").content;
let resumable = new Resumable({
    target:'drive/myDrive',
    uploadMethod:'POST',
    query: { _token:token },
    fileNameParameterName:['file_upload'],
    simultaneousUploads:5,
    fileType : [],
    headers:{
        'Accept' : 'application/json'
    },
    testChunks : false,
    throttleProgressCallPacks:1
});
resumable.assignBrowse(newFile);
resumable.on('fileAdded', () => {
    resumable.upload();
});
resumable.on('fileProgress', (file) => {
    console.log('in progress')
});
resumable.on('fileSuccess',(file, response)=>{
    console.log(file.file.name);
})*/


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

let photoLink = document.getElementsByClassName('.photo_link');
