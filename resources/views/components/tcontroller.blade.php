<div class="dropdown">
    <div class="dropdown-menu control_menu">
        {{--            Preview Status--}}

        @if($folder === "false")
            <div class="list w-100 px-4 py-2">
                <div class="showPhoto text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-eye item__icon__size"></i>
                    <div>Preview</div>
                </div>
            </div>
        @endif

        <a
            @if($folder === "true")
                href="{{ route('drive.folderForceRestore', $folderId) }}"
            @elseif($folder === "false")
                href="{{ route('drive.fileForceRestore', $fileId) }}"
            @endif
            class="text-decoration-none"
        >
            <div class="list w-100 px-4 py-2">
                <div class="showPhoto text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-recycle item__icon__size"></i>
                    <div>Restore</div>
                </div>
            </div>
        </a>


            <a
                @if($folder === "true")
                    href="{{ route('drive.folderForceDelete', $folderId) }}"
                @elseif($folder === "false")
                    href="{{ route('drive.fileForceDelete', $fileId) }}"
                @endif
                class="text-decoration-none"
                >
                <div class="list w-100 px-4 py-2">
                    <div class="showPhoto text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                        <i class="fa fa-trash-can item__icon__size"></i>
                        <div>Delete</div>
                    </div>
                </div>
            </a>
    </div>
</div>
