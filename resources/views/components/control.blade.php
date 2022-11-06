<div class="dropdown">
    <div class="dropdown-menu control_menu">

        @if($folderId)
            <form action="{{ route('myDrive.store') }}" enctype="multipart/form-data" method="post" id="uploadFormFolder" >
                @csrf
                <input type="file" id="uploadFileFolder" name="upload_file[]" multiple  hidden >
                <input type="number" name="folderId" value="{{$folderId}}" hidden>
            </form>
        @endif

{{--        File Upload Status--}}

        @if($folder === "true")
            <div class="list w-100 px-4 py-2">
                <div id="newFileFolder" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-file-upload item__icon__size"></i>
                    <div>File Upload</div>
                </div>
            </div>
        @endif

{{--            Preview Status--}}

        @if($folder === "false")
            <div class="list w-100 px-4 py-2">
                <div class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-eye item__icon__size"></i>
                    <div>Preview</div>
                </div>
            </div>
        @endif

{{--            Share Status--}}

        <div class="list w-100 px-4 py-2">
            <div class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                <i class="fa fa-paper-plane item__icon__size"></i>
                <div>Share</div>
            </div>
        </div>

{{--            Copy Status--}}

        @if($folder === "false")
                <div class="list w-100 px-4 py-2">
                    <a
                        @if($folder === "true")
                        href="{{ route('myDrive.folderCopy', $folderId) }}"
                        @elseif($folder === "false")
                        href="{{ route('myDrive.fileCopy', $fileId) }}"
                        @endif
                        class="text-decoration-none w-100 text-black-50 fw-bold d-flex align-items-center text-decoration-none">
                        <i class="fa fa-copy item__icon__size"></i>
                        <div>Copy</div>
                    </a>
                </div>
            @endif
{{--            Delete Status--}}


                <form
                        @if($folder === "true")
                            action="{{ route('folder.destroy',$folderId) }}"
                        @elseif($folder === "false")
                            action="{{ route('myDrive.destroy',$fileId) }}"
                        @endif
                    method="post">
                    @csrf
                    @method('delete')

                    <div class="list w-100py-2">
                        <button class="border-0 py-0 px-4 btn w-100 text-decoration-none text-black-50 fw-bold d-flex align-items-center justify-content-start">
                            <i class="text-start fa fa-trash-can item__icon__size"></i>
                            <div>Remove</div>
                        </button>
                    </div>
                </form>


{{--            Download Status--}}

            @if($folder === "true")
                <div class="list w-100 px-4 py-2">
                    <a href="" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                        <i class="fa fa-download item__icon__size"></i>
                        <div>Download</div>
                    </a>
                </div>
            @elseif($folder === "false")
                <div class="list w-100 px-4 py-2">
                    <a href="{{ route('myDrive.fileDownload', $fileId) }}" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                        <i class="fa fa-download item__icon__size"></i>
                        <div>Download</div>
                    </a>
                </div>
        @endif
    </div>
</div>
