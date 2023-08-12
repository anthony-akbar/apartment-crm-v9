@extends('admin')

@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center p-10">
        <h2 class="text-lg font-medium mr-auto">Сейф</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="form-inline">
                <input id="search-input" type="text" class="form-control w-2/4"
                       placeholder="Поиск...">
                <button id="search" class="btn mx-3 btn-primary">Найти</button>
            </div>
            <input id="datetimeinput" type="text"
                   data-daterange="true"
                   class="datepicker form-control w-52 block mr-5">
            <div class="px-2">
                @include('safe::get')
            </div>
            <div class="px-2">
                @include('safe::put')
            </div>
        </div>
    </div>

    <div
        class="col-span-3 lg:col-span-8 lg:px-6 border-t lg:border-t-0 lg:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
        <ul class=" nav nav-pills mx-5 border border-slate-300 dark:border-darkmode-300 border-dashed rounded-md mx-auto p-1 mb-8"
            role="tablist">
            <li id="first-tab" class="nav-item flex-1" role="presentation">
                <button class="nav-link w-full py-1.5 px-2 active" data-tw-toggle="pill" data-tw-target="#national"
                        type="button" role="tab" aria-controls="floor" aria-selected="true"> Национальная валюта
                </button>
            </li>
            <li id="second-tab" class="nav-item flex-1" role="presentation">
                <button class="nav-link w-full py-1.5 px-2" data-tw-toggle="pill" data-tw-target="#foreign"
                        type="button" role="tab" aria-selected="false">Иностранная валюта
                </button>
            </li>
        </ul>
        <div class="tab-content px-5 pb-5">
            <div class="tab-pane active" id="national" role="tabpanel" aria-labelledby="first-tab">
                @include('safe::national')
            </div>
            <div class="tab-pane" id="foreign" role="tabpanel" aria-labelledby="first-tab">
                @include('safe::foreign')
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script>
        function htmlTableToExcel() {
            let type = 'xlsx'
            var data = document.getElementById('tblToExcl');
            var excelFile = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
            XLSX.write(excelFile, {bookType: type, bookSST: true, type: type});
            XLSX.writeFile(excelFile, 'ExportedFile:HTMLTableToExcel' + 'base64');
        }
    </script>
    <script>

        $('#search').click(() => {
            let target = $('.tab-content').children('.active').attr('id')

            $.ajax({
                type: 'get',
                url: '{{ route('safe.search') }}',
                data: {
                    'search': $('#search-input').val(),
                    'range': $('#datetimeinput').val(),
                    'currency': target === 'foreign' ? '$' : 'C'
                },
                success: function (data) {
                    $('#' + target).html(data)
                }
            })
        })

        $(document).on('click', '.button-apply', function () {
            let target = $('.tab-content').children('.active').attr('id')

            $.ajax({
                type: 'get',
                url: '{{ route('safe.search') }}',
                data: {
                    'search': $('#search-input').val(),
                    'range': $('#datetimeinput').val(),
                    'currency': target === 'foreign' ? '$' : 'C'
                },
                success: function (data) {
                    $('#' + target).html(data)
                }
            })
        })

    </script>
@endsection
