@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">Отчёты</h2>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

        <!-- ПРИХОД -->

        <!-- BEGIN: Modal Toggle -->
        <div class="text-center mr-2"><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#income"
                                         class="btn btn-primary">Приход</a></div> <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="income" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Приход</h2>
                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <form method="POST" action="{{ route('dairy.store') }}">
                        @csrf
                        <input type="hidden" name="type" value="newIncome"/>
                        <div class="modal-body gap-y-4 gap-x-4">
                            <div class="form-inline mt-3">
                                <label for="horizontal-form-1" class="form-label">Сумма</label>
                                <div class="grid grid-cols-2">
                                    <input id="horizontal-form-1" type="number" class="form-control"
                                           name="incomeAmount">
                                    <select class="tom-select px-3"
                                            name="incomeCurrency" aria-label="form-select">
                                        <option value="USD">$</option>
                                        <option value="KGS">C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="modal-form-2" class="form-label">Описание</label>
                                <textarea class="form-control" name="incomeDescription"></textarea>
                            </div>
                        </div>

                        <!-- END: Modal Body -->
                        <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                                Отмена
                            </button>
                            <button type="submit" class="btn btn-primary w-20">Сохранить</button>
                        </div><!-- END: Modal Footer -->
                    </form>
                </div>
            </div>
        </div> <!-- END: Modal Content -->

        <!-- END: ПРИХОД -->

        <!-- Расход -->

        <!-- BEGIN: Modal Toggle -->
        <div class="text-center mr-2"><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#out"
                                         class="btn btn-primary">Расход</a></div> <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="out" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-body text-center">
                    <div class="modal-content">
                        <!-- BEGIN: Modal Header -->
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Расход</h2>
                        </div> <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <form method="POST" action="{{ route('dairy.store') }}">
                            <div class="modal-body gap-4 gap-y-3">
                                @csrf
                                <input type="hidden" name="type" value="newOut"/>
                                <div class="form-inline">
                                    <label for="horizontal-form-1" class="form-label">Статья</label>
                                    <select class="tom-select w-full mt-2 sm:mr-2"
                                            name="outArticle" aria-label=".form-select-lg example">
                                        @foreach($articles as $article)
                                            <option value="{{ $article->id }}">{{ $article->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inline mt-3">
                                    <label for="horizontal-form-1" class="form-label">Сумма</label>
                                    <div class="grid grid-cols-2">
                                        <input id="horizontal-form-1" type="number" class="form-control"
                                               name="outAmount">
                                        <select class="tom-select px-3"
                                                name="outCurrency" aria-label="form-select">
                                            <option value="USD">$</option>
                                            <option value="KGS">C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-5" class="form-label">Описание</label>
                                    <textarea id="update-profile-form-5" class="form-control"
                                              name="outDescription"></textarea>
                                </div>
                                <!-- END: Modal Body -->
                            </div>
                            <!-- BEGIN: Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-20 mr-1">Отмена
                                </button>
                                <button type="submit" class="btn btn-primary w-20">Сохранить</button>
                            </div><!-- END: Modal Footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- END: Modal Content -->

        <!-- END: Расход -->

        <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>

        <div class="text-center mx-3">
            <div class="dropdown inline-block" data-tw-placement="bottom-start">
                <button class="dropdown-toggle btn btn-primary" aria-expanded="false" data-tw-toggle="dropdown">Фильтр<i
                        data-lucide="chevron-down" class="w-4 h-4 ml-2"></i></button>
                <div class="dropdown-menu">
                    <div class="dropdown-content">
                        <div class="p-2">
                            <div class="form-inline">
                                <label for="filter_category" class="form-label">Категории</label>
                                <select id="filter_category" class="tom-select w-full">
                                    <option value="all">Все</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-inline mt-3">
                                <label for="filter_currency" class="form-label">Валюта</label>
                                <select id="filter_currency" class="tom-select w-full">
                                    <option value="С">Сом</option>
                                    <option value="$">$</option>
                                </select>
                            </div>

                            <div class="form-inline mt-3">
                                <label for="filter_date_range" class="form-label">Период</label>
                                <input type="text" id="filter_date_range" data-daterange="true"
                                       class="datepicker form-control w-56 block mx-auto">
                            </div>

                            <div class="flex items-center mt-3">
                                <button data-dismiss="dropdown" class="btn btn-secondary w-32 ml-auto">Close</button>
                                <button id="filter_submit" class="btn btn-primary w-32 ml-2">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input onkeyup="myFunction()" id="search_input" type="text" class="form-control w-56 box pr-10"
                       placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     icon-name="search" class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                     data-lucide="search">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
        </div>
    </div>


    <div>
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table id="data_table" class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">Дата</th>
                    <th class="whitespace-nowrap">Основание</th>
                    <th class="text-center whitespace-nowrap">Сумма</th>
                    <th class="text-center whitespace-nowrap">Описание</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dairies as $dairy)
                    <tr class="intro-x">
                        <td class="w-40">
                            {{ date('d.m.Y', strtotime($dairy->date)) }}
                        </td>
                        <td>
                            {{ $dairy->article()->title ?? '' }}
                        </td>
                        <td class="text-right">{{ number_format($dairy->amount, 2, ',', ' ') }} {{ $dairy->currency }}</td>
                        <td class="text-center">{{ $dairy->description }}</td>
                        <td class="w-40">
                            <div
                                class="flex items-center justify-center {{ $dairy->status === 1 ? "text-success" : "text-danger" }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                     class="lucide lucide-check-square w-4 h-4 mr-2">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg>
                                {{ $dairy->status === 1 ? "Приход" : "Расход" }}
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                         class="lucide lucide-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                    </svg>
                                    Edit </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                   data-tw-target="#delete-confirmation-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2"
                                         class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                    Delete </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('script')
    <script>

        /*$('#filter_category').change(filter())
        $('#filter_currency').change(filter())
        $('#filter_date_range').change(filter())*/

        function filter() {
            let category = $('#filter_category').val()
            let currency = $('#filter_currency').val()
            let date_range = $('#filter_date_range').val()

            $.ajax({
                type: 'get',
                url: '{{ route('dairy.search') }}',
                data: {
                    'category': category,
                    'date_range': date_range,
                    'currency': currency
                },
                success: function (data) {
                    console.log(data)
                    $('#' + target).html(data)
                }
            })
        }


        $('#search').click(() => {
            let target = $('.tab-content').children('.active').attr('id')

            $.ajax({
                type: 'get',
                url: '{{ route('dairy.search') }}',
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
            filter()
        })
        $(document).on('click', '#filter_submit', function () {
            filter()
        })

        function myFunction() {
            let input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search_input");
            filter = input.value.toUpperCase();
            table = document.getElementById("data_table");
            tr = table.getElementsByTagName("tr");
            console.log(tr)
            for (i = 0; i < tr.length; i++) {
                console.log(tr[i].getElementsByTagName("td"))
                let tds = tr[i].getElementsByTagName("td")
                for (let i = 0; i < tds.length - 2; i++) {
                    td = tds[i];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        console.log(txtValue)
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }

        $(document).on('keyup', '#search_input', function () {
            myFunction()
        })
    </script>
@endsection
