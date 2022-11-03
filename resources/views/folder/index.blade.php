@extends('layouts.app')
@section('content')

    <div class="mtStatus px-2">
        <div class="py-1 d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #F0F0F0">
           <div class="d-flex align-items-center">
               <a href="{{ route('myDrive.index') }}" class="mb-0 d-flex align-items-center gap-3 py-2  px-3 rounded text-decoration-none"
                  style="cursor:pointer;">
                   <h5 class="mb-0 text-dark">
                       My Drive
                       <i class="fa fa-angle-right"></i>
                   </h5>
               </a>
               <h5 class="mb-0 d-flex align-items-center gap-3 py-2  px-3 rounded"
                   style="background-color: #E8F0FE; cursor:pointer;"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">
                   {{ $getFolder->name }}
                   <i class="fa fa-caret-down"></i>
               </h5>

               <x-control folder="true"/>
           </div>

        </div>


        <div class="myDrive__container py-3 d-flex align-items-center gap-3 flex-wrap">
            @forelse($getFolder->files as $drive)
                <div
                    class="myDrive__item__container border-2 border border-opacity-25 border-secondary"
                >
                    <div style="height: 80%; border-bottom: 1px solid #F0F0F0">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <i class="fa
                                @if($drive->extension === "csv")
                                    fa-file-alt text-secondary
                                @elseif($drive->extension === "txt")
                                    fa-file-word text-primary
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
                                fa-file-alt text-secondary
                                @elseif($drive->extension === "txt")
                                fa-file-word text-primary
                                @elseif($drive->extension === "pdf")
                                fa-file-pdf text-danger
                                @endif
                                h4 mb-0">
                            </i>
                            <div>{{ $drive->original_name }}</div>
                        </div>
                    </div>
                    <x-control folder="false"/>
                </div>
            @empty
                <div class="d-flex justify-content-center align-items-center empty__container">
                    <h4 class="mb-0 fw-bold text-black-50">Empty File . . . . .</h4>
                </div>
            @endforelse
        </div>

    </div>

@endsection

@push('script')

@endpush
