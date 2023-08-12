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

@endsection

@section('script')

    <script type="text/javascript">

        function handle(element) {
            let searchs = $('.searchs')
            let inputs = searchs.find('input')
            let array = []
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i]['value'] !== '') {
                    array.push([inputs[i].getAttribute('name'), inputs[i]['value']])
                }
            }
            if($('#status-select').val() !== 'ВСЕ'){
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
