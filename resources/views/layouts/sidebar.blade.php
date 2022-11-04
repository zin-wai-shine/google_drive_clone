<div class="sidebar__container">
    <div class="mtStatus">
        <div class=" px-3 py-1">
            <button class=" create__btn bg-white fw-bold text-opacity-50 text-dark px-3 d-flex align-items-center gap-2" data-bs-toggle="dropdown" aria-expanded="false">
                <svg width="36" height="36" viewBox="0 0 36 36"><path fill="#34A853" d="M16 16v14h4V20z"></path><path fill="#4285F4" d="M30 16H20l-4 4h14z"></path><path fill="#FBBC05" d="M6 16v4h10l4-4z"></path><path fill="#EA4335" d="M20 16V6h-4v14z"></path><path fill="none" d="M0 0h36v36H0z"></path></svg>
                <h5 class="mb-0">New</h5>
            </button>
            <x-dropdown />
        </div>

        <div class=" mt-2 w-100">
            <div class="item w-100 px-4 py-2" style="background-color: #E8F0FE">
                <a href="{{ route('myDrive.index') }}" class="text-decoration-none fw-bold d-flex align-items-center">
                    <i class="fa fa-book item__icon__size"></i>
                    <div>My Drive</div>
                </a>
            </div>

            <div class="item w-100 px-4 py-2 mt-2">
                <a href="" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-computer item__icon__size"></i>
                    <div>Computers</div>
                </a>
            </div>

            <div class="item w-100 px-4 py-2">
                <a href="" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-users item__icon__size"></i>
                    <div>Share with me</div>
                </a>
            </div>

            <div class="item w-100 px-4 py-2">
                <a href="" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-clock item__icon__size"></i>
                    <div>Recent</div>
                </a>
            </div>

            <div class="item w-100 px-4 py-2">
                <a href="" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-star item__icon__size"></i>
                    <div>Starred</div>
                </a>
            </div>

            <div class="item w-100 px-4 py-2">
                <a href="" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-trash-can item__icon__size"></i>
                    <div>Trash</div>
                </a>
            </div>
        </div>
        <hr>
        <div class="item__container mt-2 w-100">
            <div class="item w-100 px-4 py-2 mt-2">
                <a href="" class="text-decoration-none text-black-50 fw-bold d-flex align-items-center">
                    <i class="fa fa-cloud item__icon__size"></i>
                    <div class="text-nowrap">Storage (88% full)</div>
                </a>
            </div>

        </div>
    </div>
</div>
