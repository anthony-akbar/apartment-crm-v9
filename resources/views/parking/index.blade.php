@extends('admin')

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center p-5">
        <h2 class="text-lg font-medium mr-auto">Парковка</h2>
    </div>

    <div class="grid grid-cols-12 gap-5 mt-5 pt-5">

        @for($i=1; $i <= 95; $i++)

        <a href="javascript:;" class="intro-y block">
            <div style="{{ $i % 3 === 0 ? 'background-color: red; ' : ''}} {{ $i % 5 === 0 ? 'background-color: yellow; ' : '' }} {{ $i % 3 !== 0 && $i % 5 !== 0 ? 'background-color: green;' : '' }} {{ $i % 3 !== 0 && $i % 5 !== 0 ? "" : "background-image: url('car.png'); "}} width: 75px; height: 150px; background-size: cover" class="rounded-md relative zoom-in">
                <span class="text-white font-medium" style="position: absolute; top: 79px; font-size: 24px; left: 35px; transform: translate(-50%, -50%)">
                    {{$i}}
                </span>
            </div>
        </a>

            @endfor
    </div>
@endsection
