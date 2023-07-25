@extends('admin')

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center p-10">
        <h2 class="text-lg font-medium mr-auto">Квартиры</h2>
    </div>


    <table class="table table-report -mt-2">
    <thead>
    <tr class="intro-x searchs">
        <td class="text-center">
            <div><input onchange="handle(this)" id="regular-form-1" name="number" type="text" class="form-control"
                        placeholder="№"></div>
        </td>
        <td class="text-center">
            <div><input onchange="handle(this)" id="regular-form-1" name="rooms" type="number" class="form-control"
                        placeholder="Rooms"></div>
        </td>
        <td class="text-center">
            <div><input onchange="handle(this)" id="regular-form-1" name="floor" type="number" class="form-control"
                        placeholder="Floor"></div>
        </td>
        <td class="text-center">
            <div><input onchange="handle(this)" id="regular-form-1" name="square" step="0.01" type="number"
                        class="form-control" placeholder="SQ"></div>
        </td>
        <td class="text-center">
            <div><input onchange="handle(this)" id="regular-form-1" name="terace" step="0.01" type="number"
                        class="form-control" placeholder="Terace"></div>
        </td>
        <td class="text-center">
            <div><input onchange="handle(this)" id="regular-form-1" name="price" step="0.01" type="number"
                        class="form-control" placeholder="Price/M²"></div>
        </td>
        <td class="text-center">
            <div><input onchange="handle(this)" id="regular-form-1" name="total" step="0.01" type="number"
                        class="form-control" placeholder="Total"></div>
        </td>
        <td class="text-center">
            <div><input onchange="handle(this)" id="regular-form-1" name="status" type="number" class="form-control"
                        placeholder="Status"></div>
        </td>
        <td class="table-report__action text-center w-56">

            <button class="btn btn-primary">Search</button>
        </td>
    </tr>
    <tr>
            <th class="text-center whitespace-nowrap  w-20">№</th>
            <th class="text-center whitespace-nowrap  w-32">Rooms</th>
            <th class="text-center whitespace-nowrap  w-40">Floor</th>
            <th class="text-center whitespace-nowrap  w-40">SQ</th>
            <th class="text-center whitespace-nowrap  w-40">Terace</th>
            <th class="text-center whitespace-nowrap  w-40">Price/M²</th>
            <th class="text-center whitespace-nowrap  w-56">Total</th>
            <th class="text-center whitespace-nowrap  w-20">Status</th>
            <th class="text-center whitespace-nowrap  w-56">ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
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

    </script>

@endsection
