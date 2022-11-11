import './bootstrap';
import '../../node_modules/resumable-file-uploads'
// Storage Status
let storageText = document.getElementById('storageText');
let storageProgress = document.getElementById('storageProgress');
let normalTotalFileSize = document.getElementById('normalTotalFileSize');

// Calculate With MB
function filePercentage(){
    let currentPercentage = 0;
    let fileSizeValue = normalTotalFileSize.value;
    let currentMb = fileSizeValue/1024;
    let currentGb = currentMb/1024;
    let limitSize = 200 // 1MB * 15GB = 15360MB = 15,728,640KB
    currentPercentage = ((currentGb/limitSize)*100).toFixed(1);

    if(currentPercentage > 100){
        storageText.innerText = `Storage (100% full)`;
    }else{
        storageText.innerText = `Storage (${currentPercentage}% full)`;
    }

    if(currentPercentage >= 90){
        storageProgress.style.backgroundColor = 'red';
    }else if(currentPercentage >= 70){
        storageProgress.style.backgroundColor = '#ffd615';
    }else if(currentPercentage >= 0){
        storageProgress.style.backgroundColor = 'green';
    }
    storageProgress.style.width = `${currentPercentage}%`
}
filePercentage();

// Build File & Folder
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

// Folder Copy Status
let folderCopyBtn = document.getElementById('folderCopyBtn');
let folderCopy = document.getElementById('folderCopy');
folderCopyBtn.addEventListener('click', () => {
   folderCopy.click();
});

