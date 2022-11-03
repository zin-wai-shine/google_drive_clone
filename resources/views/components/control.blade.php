<div class="dropdown">
    <div class="dropdown-menu control_menu">
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
            <div class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                <i class="fa fa-copy item__icon__size"></i>
                <div>Copy</div>
            </div>
        </div>

        <div class="list w-100 px-4 py-2">
            <div class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                <i class="fa fa-trash-can item__icon__size"></i>
                <div>Remove</div>
            </div>
        </div>

        <div class="list w-100 px-4 py-2">
            <div class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                <i class="fa fa-download item__icon__size"></i>
                <div>Download</div>
            </div>
        </div>
    </div>
</div>
