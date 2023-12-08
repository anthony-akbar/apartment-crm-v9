@extends('admin')

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center p-5">
        <h2 class="text-lg font-medium mr-auto">Парковка</h2>
    </div>

    <div class="grid grid-cols-12 gap-5 mt-5 pt-5">

        @foreach($parkings as $parking)

            <a href="javascript:;" onclick="getInfo({{ $parking->id }})" data-tw-toggle="modal"
               data-tw-target="#parking-view" class="intro-y block">
                <div
                    style="{{ $parking->status === 3 ? 'background-color: red; ' : ''}} {{ $parking->status === 2 ? 'background-color: yellow; ' : '' }} {{ $parking->status === 1 ? 'background-color: green; ' : '' }} {{ $parking->status === 3 ? "background-image: url('car.png'); " : ""}} width: 75px; height: 150px; background-size: cover"
                    class="rounded-md relative zoom-in">
                <span class="text-white font-medium"
                      style="position: absolute; top: 79px; font-size: 24px; left: 35px; transform: translate(-50%, -50%)">
                    {{$parking->id}}
                </span>
                </div>
            </a>

        @endforeach

    </div>


    <!-- BEGIN: Modal Content -->
    <div id="parking-view" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"> <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Broadcast Message</h2>
                    <button class="btn btn-outline-secondary hidden sm:flex">
                        <i data-lucide="file" class="w-4 h-4 mr-2"></i> Download Docs
                    </button>
                    <div class="dropdown sm:hidden"><a class="dropdown-toggle w-5 h-5 block" href="javascript:;"
                                                       aria-expanded="false" data-tw-toggle="dropdown"> <i
                                data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li><a href="javascript:;" class="dropdown-item"> <i data-lucide="file"
                                                                                     class="w-4 h-4 mr-2"></i> Download
                                        Docs </a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">


                    <div class="col-span-12 sm:col-span-6 px-3">
                        <img src="{{ URL::to('/parking.png') }}">
                    </div>
                    <div class="col-span-12 sm:col-span-6 px-5">
                        <label for="modal-form-2" class="form-label">To</label>
                        <input id="modal-form-2" type="text" class="form-control" placeholder="example@gmail.com">

                        <label for="modal-form-3" class="form-label">Subject</label>
                        <input id="modal-form-3" type="text" class="form-control" placeholder="Important Meeting">

                        <label for="modal-form-4" class="form-label">Has the Words</label>
                        <input id="modal-form-4" type="text" class="form-control" placeholder="Job, Work, Documentation">

                        <label for="modal-form-5" class="form-label">Doesn't Have</label>
                        <input id="modal-form-5" type="text" class="form-control" placeholder="Job, Work, Documentation">

                        <label for="modal-form-6" class="form-label">Size</label>
                        <select id="modal-form-6" class="form-select">
                            <option>10</option>
                            <option>25</option>
                            <option>35</option>
                            <option>50</option>
                        </select>

                    </div>
                </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel
                    </button>
                    <button type="button" class="btn btn-primary w-20">Send</button>
                </div> <!-- END: Modal Footer --> </div>
        </div>
    </div> <!-- END: Modal Content -->

@endsection

@section('script')
    <script>

        function getInfo(id) {
            $.ajax({
                type: 'get',
                url: '{{ route('parkings.search') }}',
                data: {
                    'data': id
                },
                success: (data) => {
                    $('#modal-form-2').val(data['id'])
                    console.log(data)
                }
            })
        }

    </script>
@endsection
