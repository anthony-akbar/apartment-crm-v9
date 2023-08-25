@extends('admin')

@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center p-10">
        <h2 class="text-lg font-medium mr-auto">Экспорт</h2>
    </div>

    <div class="grid grid-cols-2 mx-auto">

        <div class="grid-cols-1 mx-3">
            <select id="tables" name="tables" data-placeholder="Select your favorite actors" class="tom-select w-full" multiple>
                <option value="apartments" selected>Квартиры</option>
                <option value="apt_contracts">Договора</option>
                <option value="clients" selected>Клиенты</option>
                <option value="payments">Оплаты</option>
            </select>
        </div>
        <div class="grid-cols-1 mx-3">

            <select id="data" data-placeholder="Select your favorite actors" class="tom-select w-full" multiple>
                @foreach($client as $key => $item)
                    <option value="{{ 'client$' . $key }}">{{ $key }}</option>
                @endforeach
                @foreach($apartment as $key => $item)
                    <option value="{{ 'apartment$' . $key }}">{{ $key }}</option>
                @endforeach
            </select>
        </div>

    </div>

    <div id="table_result">
    </div>

    <button id="export" class="btn btn-primary mt-5">Export</button>
@endsection

@section('script')
    <script>

        function onDataChange() {
            let tables = $('#tables').val()
            let data = $('#data').val()
            console.log(tables)
            console.log(data)

            $.ajax({

                url: '{{ route('export.query') }}',
                data: {
                    'data': {
                        tables,
                        data
                    }
                },
                type: 'GET',
                success: function (data) {
                    $('#table_result').html(data)
                }
            })
        }

        function exsport() {
            let tables = $('#tables').val()
            let data = $('#data').val()

            console.log(JSON.stringify(tables.toString(), data.toString()))
            window.location.replace( '{{ route('export.export') }}' + '?data=' + tables + data);

        }

        $('#export').click(exsport)
        $('#tables').change(onDataChange)
        $('#data').change(onDataChange)

    </script>
@endsection
