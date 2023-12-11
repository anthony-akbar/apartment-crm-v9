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
                    <h2 class="font-medium text-base mr-auto">Парковочное место № <span id="show-number"></span></h2>
                </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                    <div class="h-40 col-span-12 sm:col-span-6 px-3">
                        <img style="height: 100%" src="{{ URL::to('/parking.png') }}">
                    </div>
                    <div class="col-span-12 sm:col-span-6 my-auto px-5">

                        <div>
                            <label class="form-label">№</label>
                            <div id="number"> - - </div>
                        </div>

                        <div class="mt-3" style="display: none" id="status-menu">
                            <label id="status" class="form-label"></label>
                            <div id="booked"> - - - -</div>
                        </div>
                    </div>
                </div> <!-- END: Modal Body -->
            </div>
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
                    console.log(data);
                    $('#show-number').text(data['id'])
                    $('#number').text(data['id'])
                    $('#square').text(data['square'])
                    console.log(data)
                    if(data['client'] !== undefined){
                        $('#status-menu').css('display', 'block')
                        $('#booked').text(data['client']['firstname'] + ' ' + data['client']['name'])
                        if(data['status'] === 2){
                            $('#status').text('Забронировано')
                        }else if(data['status'] === 3){
                            $('#status').text('Продано')
                        }
                    }else{
                        $('#status-menu').css('display', 'none')

                    }
                }
            })
        }

    </script>
@endsection
