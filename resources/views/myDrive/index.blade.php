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

        <div class="py-3">
            <h6 class="mb-0">Suggested</h6>
        </div>

        <div class="myDrive__container d-flex align-items-center gap-3 flex-wrap">
            @forelse($drives as $drive)
                <div class="myDrive__item__container border-2 border border-opacity-25 border-secondary overflow-hidden">
                    <div class="overflow-hidden" style="height: 65%; border-bottom: 1px solid #F0F0F0">
{{--
                        <img class="w-100" src="data:image/jpeg;base64,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" alt="">
--}}
                        <div>

                        </div>
                    </div>
                    <div class="bg-white px-3 py-2 item__container" style="height: 35%">
                        <div class="d-flex gap-2  align-items-center h6 mb-0">
                            <i class="fa
                             @if($drive->extension === "csv")
                                fa-file-alt
                                @endif
                             text-danger h4 mb-0"></i>
                            <div>{{ $drive->original_name }}</div>
                        </div>
                        <div>
                            You uploaded {{ $drive->created_at->format('h:i:s A') }}
                        </div>
                    </div>

                </div>
            @empty
                <div class="d-flex justify-content-center align-items-center">
                    <h4 class="mb-0 fw-bold">File Empty</h4>
                </div>
                @endforelse
        </div>
    </div>

@endsection

@push('script')

@endpush
