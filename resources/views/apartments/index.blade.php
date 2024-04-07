@extends('admin')

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center p-10">
        <h2 class="text-lg font-medium mr-auto">Квартиры</h2>
    </div>


    <table class="table table-report -mt-2">
        <thead>
        <tr class="intro-x searchs">
            <td class="text-center w-20" style="padding: 10px!important">
                <div><input onkeyup="handle(this)" id="regular-form-1" name="number" type="text" class="form-control"
                            placeholder="№"></div>
            </td>
            <td class="text-center" style="padding: 10px!important">
                <div><input onkeyup="handle(this)" id="regular-form-1" name="rooms" type="number" class="form-control"
                            placeholder="Комнаты"></div>
            </td>
            <td class="text-center" style="padding: 10px!important">
                <div><input onkeyup="handle(this)" id="regular-form-1" name="floor" type="number" class="form-control"
                            placeholder="Этаж"></div>
            </td>
            <td class="text-center" style="padding: 10px!important">
                <div><input onkeyup="handle(this)" id="regular-form-1" name="square" step="0.01" type="number"
                            class="form-control" placeholder="Площадь"></div>
            </td>
            <td class="text-center" style="padding: 10px!important">
                <div><input onkeyup="handle(this)" id="regular-form-1" name="block" step="0.01" type="number"
                            class="form-control" placeholder="Блок"></div>
            </td>
            <td class="text-center" style="padding: 10px!important">
                <div><input onkeyup="handle(this)" id="regular-form-1" name="price" step="0.01" type="number"
                            class="form-control" placeholder="Цена/M²"></div>
            </td>
            <td class="text-center" style="padding: 10px!important">
                <div><input onkeyup="handle(this)" id="regular-form-1" name="total" step="0.01" type="number"
                            class="form-control" placeholder="Стоимость"></div>
            </td>
            <td class="text-center" style="padding: 10px!important">
                <div>
                    {{--<input onkeyup="handle(this)" id="regular-form-1" name="status" type="text" class="form-control"
                            placeholder="Статус">--}}

                    <select name="status" id="status-select" onchange="handle(this)" class="form-select">
                        <option>ВСЕ</option>
                        <option value="1">СВОБОДНО</option>
                        <option value="2">БРОНЬ</option>
                        <option value="3">ПРОДАНО</option>
                    </select>

                </div>
            </td>
            <td class="table-report__action text-center">
                <button class="btn btn-primary">Search</button>
            </td>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <table class="table table-report -mt-2">
        <thead>
        <tr>
            <th class="text-center whitespace-nowrap  w-20">№</th>
            <th class="text-center whitespace-nowrap  w-40">Комнаты</th>
            <th class="text-center whitespace-nowrap  w-32">Этаж</th>
            <th class="text-center whitespace-nowrap  w-40">Площадь</th>
            <th class="text-center whitespace-nowrap  w-32">Блок</th>
            <th class="text-center whitespace-nowrap  w-40">Цена/M²</th>
            <th class="text-center whitespace-nowrap  w-40">Стоимость</th>
            <th class="text-center whitespace-nowrap w-56">Статус</th>
        </tr>
        </thead>
    </table>
    <div id="accordtable">
        @include('apartments.table')
    </div>

    <!-- BEGIN: Modal Content -->
    <div id="apartment-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-5 text-center">
                    <div class="intro-y px-3 pt-5 mt-5">
                        <div class="flex flex-col lg:flex-row pb-5 -mx-5">
                            <div
                                class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                                <img id="apartment-image" src="#" data-action="zoom"
                                     data-tw-toggle="modal"
                                     data-tw-target="#apartment-modal">
                            </div>
                            <div
                                class="mt-6 lg:mt-0 flex-1 px-3 border-l border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                                <div
                                    class="font-medium text-3xl text-center lg:text-left lg:mt-3">
                                    Квартира
                                    №<span id="apartment-number"></span></div>
                                <div class="px-5 py-3 flex flex-col justify-center flex-1">
                                    <div class="grid grid-cols-2 pt-3">
                                        <div class="grid-cols-1 px-3">
                                            <div class="text-left text-slate-500 text-xs">
                                                ПЛОЩАДЬ
                                            </div>
                                            <div class="mt-1.5 flex items-center">
                                                <div
                                                    class="text-base"><span id="apartment-square"></span>
                                                    м²
                                                </div>
                                            </div>
                                            <div
                                                class="text-left text-slate-500 text-xs mt-5">
                                                ЭТАЖ
                                            </div>
                                            <div class="mt-1.5 flex items-center">
                                                <div
                                                    class="text-base" id="apartment-floor"></div>
                                            </div>
                                            <div
                                                class="text-left text-slate-500 text-xs mt-5">
                                                ЦЕНА ЗА м²
                                            </div>
                                            <div class="mt-1.5 flex items-center">
                                                <div
                                                    class="text-base" id="apartment-price"></div>
                                            </div>

                                            <div
                                                class="text-left text-slate-500 text-xs mt-5 pr-3">
                                                СТАТУС
                                            </div>
                                            <div class="mt-2">
                                                <select id="status-select"
                                                        onchange="redirect(this, {{ $apartment->id }})"
                                                        class="tom-select w-full">
                                                    <option
                                                        value="1" {{ $apartment->status === 1 ? 'selected="true"' : '' }}>
                                                        СВОБОДНО
                                                    </option>
                                                    <option
                                                        value="2" {{ $apartment->status === 2 ? 'selected="true"' : '' }}>
                                                        БРОНЬ
                                                    </option>
                                                    <option
                                                        value="3" {{ $apartment->status === 3 ? 'selected="true"' : '' }}>
                                                        ПРОДАНО
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="grid-cols-1 px-3">
                                            <div class="text-left text-slate-500 text-xs">
                                                ПЛАНИРОВКА КВАРТИРЫ
                                            </div>
                                            <div class="mt-1.5 flex items-center">
                                                <div
                                                    class="text-base">{{ $apartment->rooms }}
                                                    комнат{{ $apartment->rooms === 1 ? 'а' : '' }}</div>
                                            </div>
                                            <div
                                                class="text-left text-slate-500 text-xs mt-5">
                                                БЛОК
                                            </div>
                                            <div class="mt-1.5 flex items-center">
                                                <div
                                                    class="text-base">{{ $apartment->block ?? '1' }}</div>
                                            </div>
                                            <div
                                                class="text-left text-slate-500 text-xs mt-5">
                                                СТОИМОСТЬ
                                            </div>
                                            <div class="mt-1.5 flex items-center">
                                                <div
                                                    class="text-left text-base">{{ number_format($apartment->total ?? 0, 0, '.', ' ') }} {{ $apartment->currency }}</div>
                                            </div>
                                            @if($apartment->client !== null)
                                                <div
                                                    class="text-left text-slate-500 text-xs mt-5">
                                                    КЛИЕНТ
                                                </div>
                                                <div class="mt-1.5 flex items-center">
                                                    <div
                                                        class="text-left text-base">{{ $apartment->client->firstname . ' ' . $apartment->client->name ?? '- - - -' }}</div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Modal Content -->

@endsection

@section('script')

    <script type="text/javascript">

        function showModal(id) {
            $.ajax({
                type: 'get',
                url: '{{ route('apartments.search.one') }}',
                data: {
                    'data': id
                },
                success: (data) => {


                    console.log(data)
                }
            })
        }

        function handle(element) {
            let searchs = $('.searchs')
            let inputs = searchs.find('input')
            let array = []
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i]['value'] !== '') {
                    array.push([inputs[i].getAttribute('name'), inputs[i]['value']])
                }
            }
            if ($('#status-select').val() !== 'ВСЕ') {
                array.push(['status', $('#status-select').val()])
            }
            console.log(array)
            $.ajax({
                type: 'get',
                url: '{{URL::to('/apartments/search')}}',
                data: {
                    'data': array.length !== 0 ? array : null
                },
                success: (data) => {
                    let table = document.getElementById('accordtable')
                    table.innerHTML = data
                }
            })
        }

        function redirect(element, id) {


            let selectedValue = $(element).val();
            console.log(selectedValue);


            if (selectedValue === '3') {
                window.location.replace("{{ URL::to('contracts/apartment/create') }}");
            } else if (selectedValue === '2') {
                window.location.replace("{{ route('booking.apartments.create') }}");
            }


        }

    </script>

@endsection
