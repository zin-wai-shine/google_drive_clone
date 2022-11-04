@extends('layouts.app')
@section('content')

    <div class="mtStatus px-2">
        <div class="py-1 d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #F0F0F0">
            <h5 class="mb-0 d-flex align-items-center gap-3 py-2  px-3 rounded"
                style="background-color: #E8F0FE; cursor:pointer;"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                My Drive
                <i class="fa fa-caret-down"></i>
            </h5>
            <x-dropdown />

            <div class="d-flex align-items-center ">
                <a href="" class="text-decoration-none icon__hover">
                    <i class="fa fa-info-circle icon__size"></i>
                </a>
            </div>
        </div>

{{--Show Folder Start--}}
        @if($folders)
            <div class="py-3">
                <h6 class="mb-0">Folders</h6>
            </div>

            <div class="myDrive__container d-flex align-items-center gap-3 flex-wrap">

                @forelse($folders as $folder)
                    <a href="{{ route('folder.show', $folder->id) }}" class="folder__container text-decoration-none d-flex align-items-center gap-5 px-3 rounded-2">
                        <i class="fa fa-folder h3 mb-0 text-black-50"></i>
                        <h6 class="mb-0 fw-bold text-black">{{ $folder->name }}</h6>
                    </a>
                @empty

                    <div class="d-flex justify-content-center align-items-center empty__container">
                        <h4 class="mb-0 fw-bold text-black-50">Empty Folder . . . . .</h4>
                    </div>

                @endforelse

            </div>
        @endif
{{--Show Folder End--}}

{{--Show Files Start--}}
        <div class="py-3">
            <h6 class="mb-0">Files</h6>
        </div>
        <div class="myDrive__container d-flex align-items-center gap-3 flex-wrap">
            @forelse($drives as $drive)
                    <div
                        class="myDrive__item__container border-2 border border-opacity-25 border-secondary"
                    >
                        <div style="height: 80%; border-bottom: 1px solid #F0F0F0">
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                <i class="fa
                                     @if($drive->extension === "csv")
                                        fa-file-csv text-success
                                        @elseif($drive->extension === "txt")
                                            fa-file-alt text-primary
                                            @elseif($drive->extension === "pdf")
                                                fa-file-pdf text-danger
                                            @endif
                                     item__extension__icon mb-0 ">

                                </i>
                            </div>
                        </div>
                    <div
                        class="bg-white px-3 py-2 item__container"
                        style="height: 20%"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <div class="d-flex gap-2  align-items-center h6 mb-0">
                            <i class="fa
                             @if($drive->extension === "csv")
                                fa-file-excel text-success
                                @elseif($drive->extension === "txt")
                                    fa-file-alt text-primary
                                    @elseif($drive->extension === "pdf")
                                        fa-file-pdf text-danger
                                     @endif
                              h4 mb-0">
                            </i>
                            <div>{{ $drive->original_name }}</div>
                        </div>
                    </div>
                    <x-control folder="false" folderId="null" :fileId="$drive->id"/>
                </div>
            @empty
                    <div class="d-flex justify-content-center align-items-center empty__container">
                        <h4 class="mb-0 fw-bold text-black-50">Empty File . . . . .</h4>
                    </div>
                @endforelse

        </div>
{{--Show Files End--}}
    </div>

@endsection

@push('script')
    <script>

    </script>
@endpush
