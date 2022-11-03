<div class="dropdown">
    <div class="dropdown-menu upload__menu">
        <div class="list w-100 px-4 py-2">
            <div class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                <i class="fa fa-folder-plus item__icon__size"></i>
                <div>New Folder</div>
            </div>
        </div>

        <hr>
        <form action="{{ route('myDrive.store') }}" enctype="multipart/form-data" method="post" id="uploadForm" >
            @csrf
            <input type="file" id="uploadFile" name="uploadFile[]" multiple  hidden >
        </form>

        <div class="list w-100 px-4 py-2">
            <div id="newFile" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                <i class="fa fa-file-upload item__icon__size"></i>
                <div>File Upload</div>
            </div>
        </div>
        <div class="list w-100 px-4 py-2">
            <div id="newFolder" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                <i class="fa fa-folder-plus item__icon__size"></i>
                <div>Folder Upload</div>
            </div>
        </div>

    </div>
</div>

