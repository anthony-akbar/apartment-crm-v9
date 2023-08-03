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
            <div><input onkeyup="handle(this)" id="regular-form-1" name="terace" step="0.01" type="number"
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
            <div><input onkeyup="handle(this)" id="regular-form-1" name="status" type="text" class="form-control"
                        placeholder="Статус"></div>
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
        <th class="text-center whitespace-nowrap  w-32">Комнаты</th>
        <th class="text-center whitespace-nowrap  w-40">Этаж</th>
        <th class="text-center whitespace-nowrap  w-40">Площадь</th>
        <th class="text-center whitespace-nowrap  w-40">Блок</th>
        <th class="text-center whitespace-nowrap  w-40">Цена/M²</th>
        <th class="text-center whitespace-nowrap  w-56">Стоимость</th>
        <th class="text-center whitespace-nowrap  w-20">Статус</th>
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
                if(inputs[i]['value'] !== ''){
                    array.push([inputs[i].getAttribute('name'), inputs[i]['value']])}
            }
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

        function redirect() {
            console.log(123)
            if($('#status-selector').val() === '3') {
                $(location).attr('href',{{ route('contracts.apartments.create') }})
            }
        }

    </script>

@endsection
