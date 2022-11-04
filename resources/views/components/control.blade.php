<div class="dropdown">
    <div class="dropdown-menu control_menu">

        @if($folderId)
            <form action="{{ route('myDrive.store') }}" enctype="multipart/form-data" method="post" id="uploadFormFolder" >
                @csrf
                <input type="file" id="uploadFileFolder" name="upload_file[]" multiple  hidden >
                <input type="number" name="folderId" value="{{$folderId}}" hidden>
            </form>
        @endif
        @if($folder === "true")
            <div class="list w-100 px-4 py-2">
                <div id="newFileFolder" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-file-upload item__icon__size"></i>
                    <div>File Upload</div>
                </div>
            </div>
        @endif
        @if($folder === "false")
            <div class="list w-100 px-4 py-2">
                <div class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-eye item__icon__size"></i>
                    <div>Preview</div>
                </div>
            </div>
        @endif
        <div class="list w-100 px-4 py-2">
            <div class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                <i class="fa fa-paper-plane item__icon__size"></i>
                <div>Share</div>
            </div>
        </div>

        <div class="list w-100 px-4 py-2">
            <a href="" class="text-decoration-none w-100 text-black-50 fw-bold d-flex align-items-center text-decoration-none">
                <i class="fa fa-copy item__icon__size"></i>
                <div>Copy</div>
            </a>
        </div>
       @if($folder === "true")
                <form action="{{ route('folder.destroy',$folderId) }}"  method="post">
                    @csrf
                    @method('delete')

                    <div class="list w-100py-2">
                        <button class="border-0 py-0 px-4 btn w-100 text-decoration-none text-black-50 fw-bold d-flex align-items-center justify-content-start">
                            <i class="text-start fa fa-trash-can item__icon__size"></i>
                            <div>Remove</div>
                        </button>
                    </div>
                </form>
           @endif

            @if($folder === "false")
                <form action="{{ route('myDrive.destroy',$fileId) }}"  method="post">
                    @csrf
                    @method('delete')

                    <div class="list w-100 py-2 ">
                        <button class="border-0 py-0 px-4 btn w-100 text-decoration-none text-black-50 fw-bold d-flex align-items-center justify-content-start">
                            <i class="text-start fa fa-trash-can item__icon__size"></i>
                            <div>Remove</div>
                        </button>
                    </div>
                </form>
                @endif
        <div class="list w-100 px-4 py-2">
            <div class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                <i class="fa fa-download item__icon__size"></i>
                <div>Download</div>
            </div>
        </div>
    </div>
</div>
