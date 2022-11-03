<div class="dropdown">
    <!-- Modal -->
    <form action="{{ route('folder.store') }}" id="createFolderForm" method="post">
        @csrf

        <div class="modal fade" id="newFolderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Folder</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control" placeholder="text folder name . . . ">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

{{--End Modal--}}


    <div class="dropdown-menu upload__menu">
        <div class="list w-100 px-4 py-2">
            <div class="text-decoration-none text-black-50 fw-bold d-flex align-items-center"
                 data-bs-toggle="modal" data-bs-target="#newFolderModal">
                <i class="fa fa-folder-plus item__icon__size"></i>
                <div>New Folder</div>
            </div>
        </div>

        <hr>
        <form action="{{ route('myDrive.store') }}" enctype="multipart/form-data" method="post" id="uploadForm" >
            @csrf
            <input type="file" id="uploadFile" name="upload_file[]" multiple  hidden >
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

