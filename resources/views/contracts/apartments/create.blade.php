@extends('admin')

@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center my-5 p-5">
        <h2 class="text-lg font-medium mr-auto pl-5">
            Новый договор
        </h2>

        <div class="box w-auto ml-auto sm:ml-0">
            <div class="mx-3">
                <div class="py-2">
                    <div class="form-check form-switch mb-3">

                        <div class="grid grid-cols-2">
                            <div class="grid-cols-1 pt-1 px-2">
                                <label data-tw-merge for="created_at" class="inline-block mb-2">
                                    Дата заключения
                                </label>
                                <input data-tw-merge id="created_at"
                                       type="text" data-single-mode="true" class="h-10 pt-1 disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent
                                    [&amp;amp;[readonly]]:bg-slate-100 [&amp;amp;[readonly]]:cursor-not-allowed [&amp;amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;amp;[readonly]]:dark:border-transparent
                                    transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20
                                    focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80
                                    datepicker mx-auto block w-56 mx-auto block w-56 datepicker mx-auto block w-56 mx-auto block w-56"
                                />
                            </div>
                            <div class="grid-cols-1 px-2">
                                <input id="checkbox-switch-7" class="form-check-input h-10" type="checkbox">
                                <label class="form-check-label" for="checkbox-switch-7">Сомовый</label>
                                <div class="pt-2">
                                    <input id="currency-value" type="number" step="0.1" value="88"
                                           class="h-10 form-control" placeholder="Курс $">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <form action="{{ route('contracts.apartments.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2">
            <div class="mx-3 grid-cols-1 intro-x">
                <div class="box p-5 rounded-md">
                    <div class="form-inline">
                        <label for="client-id-show" class="form-label sm:w-20">Клиент</label>
                        <!-- BEGIN: Search -->
                        <div id="clients-search" class="intro-x relative mr-3 sm:mr-6">
                            <div class="search hidden sm:block">
                                <input id="client-search" type="text" class="search__input form-control" placeholder="Поиск...">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="search" data-lucide="search"
                                     class="lucide lucide-search search__icon dark:text-slate-500">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </div>
                            <a class="notification notification--light sm:hidden" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="search" data-lucide="search"
                                     class="lucide lucide-search notification__icon dark:text-slate-500">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </a>
                            <div class="search-result" style="max-height: 30vh">
                                <div id="client-search-result__content">
                                    <div class="search-result__content hidden"></div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Search -->
                        <input id="client-id-show" type="text" disabled class="form-control" placeholder="Иванов Иван">
                        <input id="client-id-hidden" name="client_id" type="number" class="hidden form-control" placeholder="">
                    </div>
                    <div class="w-full border-t border-slate-200/60 dark:border-darkmode-400 mt-3"></div>

                    <div class="client-details">
                        <div class="grid grid-cols-2 mt-3">
                            <div class="grid-cols-1">
                                <div class="w-2/4 flex-none">
                                    <div class="text-slate-500 truncate">Серия паспорта</div>
                                    <div id="passportId_show" class="text-lg mt-1">- - - - - - - -</div>
                                </div>
                                <div class="w-2/4 flex-none">
                                    <div class="text-slate-500 truncate">ИНН</div>
                                    <div id="pin_show" class="text-lg mt-1">- - - - - - - -</div>
                                </div>
                                <div class="w-2/4 flex-none">
                                    <div class="text-slate-500 truncate">Электронная почта</div>
                                    <div id="email_show" class="text-lg mt-1">- - - - - - - -</div>
                                </div>
                            </div>
                            <div class="grid-cols-1">
                                <div class="w-2/4 flex-none">
                                    <div class="text-slate-500 truncate">Адрес</div>
                                    <div id="address_show" class="text-lg mt-1">- - - - - - - -</div>
                                </div>
                                <div class="w-2/4 flex-none">
                                    <div class="text-slate-500 truncate">Номер телефона</div>
                                    <div id="phone_show" class="text-lg mt-1">- - - - - - - -</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mx-3 grid-cols-1 intro-x">
                <div class="box p-5 rounded-md">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base truncate mx-6">Квартира</div>
                        <div class="font-medium text-base truncate ml-auto">
                            <input id="aptnum" name="apt_id" type="number" class="form-control" placeholder="№">
                        </div>
                    </div>
                    <div id="apt-details">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="clipboard" data-lucide="clipboard"
                                 class="lucide lucide-clipboard w-4 h-4 text-slate-500 mr-2">
                                <path d="M16 4h2a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h2"></path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                            Полщадь:
                            <div id="square" class="ml-auto pr-10 text-right">
                                --
                            </div>
                        </div>
                        <div class="flex items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="credit-card" data-lucide="credit-card"
                                 class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            Комнаты:
                            <div id="rooms" class="ml-auto pr-10 text-right">
                                --
                            </div>
                        </div>
                        <div class="flex items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="credit-card" data-lucide="credit-card"
                                 class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            Этаж:
                            <div id="floor" class="ml-auto pr-10 text-right">
                                --
                            </div>
                        </div>
                        <div class="flex items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="credit-card" data-lucide="credit-card"
                                 class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            Цена:
                            <div class="my-auto ml-auto pr-10 text-right">
                                <input name="price" id="aptprice" onkeyup="count()" type="number" class="form-control"
                                       placeholder="Цена">
                            </div>
                        </div>
                        <div class="flex items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="credit-card" data-lucide="credit-card"
                                 class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            Стоимость:
                            <div class="my-auto ml-auto pr-10 text-right">
                                <input name="amount" id="apttotal" onkeyup="count()" type="number" class="form-control"
                                       placeholder="Стоимость">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full border-t border-slate-200/60 dark:border-darkmode-400 mt-5"></div>

        <div class="intro-y">
            <div
                class="box flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Рассрочка
                </h2>
                <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                    <label class="form-check-label ml-0" for="show-example-1"></label>
                    <input id="show-example-1" name="schedule" data-target="#input"
                           class="show-code form-check-input mr-0 ml-3"
                           type="checkbox">
                </div>
            </div>
            <div id="input" class="p-5">
                <div class="preview">

                </div>
                <div class="source-code hidden">
                    <div class="grid grid-cols-2">
                        <div class="box mx-3 p-5 grid-cols-1">
                            <div class="form-inline">
                                <label for="horizontal-form-1" class="form-label">Период</label>
                                <select id="schedule_status" onchange="scheduleCount()" name="schedule_status"
                                        class="tom-select mx-auto form-control">
                                    <option value="6">6 месяцев</option>
                                    <option value="12">12 месяцев</option>
                                    <option value="18">18 месяцев</option>
                                    <option value="20">20 месяцев</option>
                                    <option value="24">24 месяцев</option>
                                    <option value="30">30 месяцев</option>
                                    <option value="36">36 месяцев</option>
                                </select>
                            </div>

                            <div class="mt-3 form-inline">
                                <label for="horizontal-form-1" class="form-label">Дата начала</label>
                                <input name="schedule_start_date" onchange="scheduleCount()" id="date" type="text"
                                       class="datepicker form-control w-56 block mx-auto"
                                       data-single-mode="true">
                            </div>

                            <div class="mt-3 form-inline">
                                <label for="first_payment" class="form-label sm:w-20">Первоначальный взнос</label>
                                <input name="first_payment" onchange="scheduleCount()" id="first_payment" type="text"
                                       class="form-control">
                            </div>
                            <div class="mt-3 form-inline">
                                <label for="schedule_amount" class="form-label sm:w-20">Ежемесячно</label>
                                <input name="schedule_amount" onchange="scheduleCount()" id="schedule_amount"
                                       type="text" class="form-control">
                            </div>
                            <div class="mt-3 form-inline">
                                <label for="schedule_last_month" class="form-label sm:w-20">Последний месяц</label>
                                <input name="schedule_last_month" onchange="scheduleCount()" id="schedule_last_month"
                                       type="text" class="form-control">
                            </div>

                            <div class="w-full border-t border-slate-200/60 dark:border-darkmode-400 mt-5"></div>

                            <div class="flex items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     icon-name="credit-card" data-lucide="credit-card"
                                     class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                                Итого:
                                <input id="total_schedule_hidden" class="hidden">
                                <div id="total_schedule" class="ml-auto pr-10 text-right"></div>
                            </div>
                        </div>


                        <div class="box p-5 border-b border-slate-200/60 dark:border-darkmode-400 mx-3 grid-cols-1">
                            <h2 class="font-medium text-base mr-auto my-auto">Условия</h2>

                            <div class="w-full border-t border-slate-200/60 dark:border-darkmode-400"></div>

                            <div class="flex items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     icon-name="credit-card" data-lucide="credit-card"
                                     class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                                Свободный график:
                                <div class="ml-auto pr-10 text-right">
                                    <div class="form-check mt-2"><input name="schedule_free" id="checkbox-switch-1"
                                                                        class="form-check-input" type="checkbox"
                                                                        value=""></div>
                                </div>
                            </div>

                            <div class="flex items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     icon-name="credit-card" data-lucide="credit-card"
                                     class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                                Без учета просрочки:
                                <div class="ml-auto pr-10 text-right">
                                    <div class="form-check mt-2"><input name="schedule_charges_free"
                                                                        id="checkbox-switch-1" class="form-check-input"
                                                                        type="checkbox" value=""></div>
                                </div>
                            </div>

                            <div class="flex items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     icon-name="credit-card" data-lucide="credit-card"
                                     class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                                Свободный перв.взнос:
                                <div class="ml-auto pr-10 text-right">
                                    <div class="form-check mt-2"><input name="schedule_fisrttime_free"
                                                                        id="checkbox-switch-1" class="form-check-input"
                                                                        type="checkbox" value=""></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="currency" id="currency-hidden">
        <input type="hidden" name="currency-value" id="currency-value-hidden" value="88">
        <input type="hidden" name="created_at" id="created_at-hidden">

        <div class="flex intro-x justify-end flex-col md:flex-row gap-2 mt-5">
            <a type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Cancel</a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Save</button>
        </div>

    </form>

@endsection

@section('script')

    <script>
        $('#client-search').focus(function () {
            $('#clients-search .search').removeClass('hidden')
            $('#clients-search .search-result').addClass('show')
        })
        $('#client-search').blur(function () {
            $('#clients-search .search').addClass('hidden')
            $('#clients-search .search-result').removeClass('show')
        })
        $('#client-search').on('keyup', function () {
            let pattern = $('#client-search').val()

            $.ajax({
                url: '{{ route('clients.searchOne') }}',
                data: {
                    'data': pattern
                },
                type: 'GET',
                success: function (data) {
                    console.log(data)
                    let table = document.getElementById('client-search-result__content')
                    table.innerHTML = data
                }
            })

        })

        $('#created_at').change(() => {
            $('#created_at-hidden').val($('#created_at').val())
            console.log($('#created_at-hidden').val())
        })

        // Clients logics JS
        function onClientChange(id) {
            $.ajax({
                url: '{{ route('clients.search') }}',
                data: {
                    'data': id
                },
                type: 'GET',
                success: function (data) {
                    $('#passportId_show').text(data['passportId'])
                    $('#pin_show').text(data['pin'])
                    $('#address_show').text(data['address'])
                    $('#email_show').text(data['email'] !== null ? data['email'] : '- - - - - - - -')
                    $('#phone_show').text(data['phone'])
                    $('#client-id-hidden').val(data['id'])
                    $('#client-id-show').val(data['firstname'] + ' ' + data['name'] + ' ' + data['fathersname'])
                }
            })
        }

        $('#client_id').change(onClientChange)
        $(document).ready(onClientChange)

        // Apartments logics
        function onApartmentChange() {
            let id = $('#aptnum').val();
            $.ajax({
                url: '{{ route('apartments.search.one') }}',
                data: {
                    'data': id
                },
                type: 'GET',
                success: function (data) {
                    $('#square').text(data['square'])
                    $('#rooms').text(data['rooms'])
                    $('#aptprice').val(data['price'])
                    $('#apttotal').val(data['total'])
                    $('#floor').text(data['floor'])
                    onPriceChange()
                }
            })
        }

        $('#aptnum').keyup(onApartmentChange)

        // Price logics

        function onPriceChange() {
            console.log($('#apttotal').val())
            let price = $("#aptprice").val();
            let square = $("#square").text();
            if ($("#apttotal").val() === '') {
                $("#apttotal").val(price * square)
            }
            scheduleCount()
        }

        // Schedule logics

        function scheduleCount() {
            if ($('#schedule_amount').val() === '') {
                let debt = $('#total_schedule_hidden').val() - $('#first_payment').val()
                let amount = debt / $('#schedule_status').val()
                $('#schedule_amount').val(amount)
                $('#schedule_last_month').val(amount)
            } else {
                let debt = $('#total_schedule_hidden').val() - $('#first_payment').val() - (($('#schedule_status').val() - 1) * $('#schedule_amount').val())
                $('#schedule_last_month').val(debt < 0 ? "NaN" : debt)
            }
            if ($('#checkbox-switch-7').is(":checked")) {
                $('#currency-hidden').val("KGS")
                $('#total_schedule').text(($('#apttotal').val() * $('#currency-value').val()).toLocaleString('fr-FR') + ' сом');
                $('#total_schedule_hidden').val(($('#apttotal').val() * $('#currency-value').val()));
                $('#currency-value-hidden').val($('#currency-value').val())
            } else {
                $('#currency-hidden').val("USD")
                $('#total_schedule').text($('#apttotal').val().toLocaleString() + ' $')
                $('#total_schedule_hidden').val($('#apttotal').val())
            }
        }


        $('#apttotal').keyup(onPriceChange)
        $('#currency').keyup(onPriceChange)
        $('#aptprice').keyup(onPriceChange)
        $('#currency-value').keyup(onPriceChange)
        $('#checkbox-switch-7').change(onPriceChange)

        $(document).ready(function () {
            let id = $(this).val();
            console.log(id);
            $.ajax({
                url: '{{ route('clients.searchOne') }}',
                data: {
                    'data': id
                },
                type: 'GET',
                success: function (data) {
                    $('#client_id-ts-dropdown').html(data)
                }
            })
            console.log($('#client_id-ts-dropdown').val())
        })

    </script>
@endsection
