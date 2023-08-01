@extends('admin')

@section('content')

    <h2 class="intro-y text-lg font-medium mx-5 my-10">Новый договор</h2>
    <form class="" action="{{ route('contracts.apartments.store') }}">
        @csrf
        @method('post')
    <div class="grid grid-cols-2">
        <div class="mx-3 grid-cols-1 intro-x">
            <div class="box p-5 rounded-md">
                <!-- BEGIN: Basic Select -->
                <div class="form-inline text-center">
                    <label class="form-label"> Клиент</label>
                    <div class="mt-2">
                        <select name="client_id" id="client_id" data-placeholder="Select your favorite actors" class="form-control tom-select w-full">
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->firstname }} {{ $client->name }} <span class="text-opacity-70">{{ $client->passportId }}</span> </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- END: Basic Select -->
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
                    @include('apartments.apt-details')
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
                <input id="show-example-1" name="schedule" data-target="#input" class="show-code form-check-input mr-0 ml-3"
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
                            <select name="schedule_status" class="tom-select mx-auto form-control">
                                <option value="6">6 месяцев</option>
                                <option value="12">12 месяцев</option>
                                <option value="18">18 месяцев</option>
                                <option value="24">24 месяцев</option>
                                <option value="30" disabled>30 месяцев</option>
                            </select>
                        </div>

                        <div class="mt-3 form-inline">
                            <label for="horizontal-form-1" class="form-label">Дата начала</label>
                            <input name="schedule_start_date" id="date" type="text" class="datepicker form-control w-56 block mx-auto"
                                   data-single-mode="true">
                        </div>

                        <div class="mt-3 form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Ежемесячно</label>
                            <input name="schedule_amount" id="horizontal-form-1" type="text" class="form-control" placeholder="example@gmail.com">
                        </div>
                        <div class="mt-3 form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Последний месяц</label>
                            <input name="schedule_last_month" id="horizontal-form-1" type="text" class="form-control" placeholder="example@gmail.com">
                        </div>

                        <div class="w-full border-t border-slate-200/60 dark:border-darkmode-400 mt-5"></div>

                        <div class="flex items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="credit-card" data-lucide="credit-card"
                                 class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            Итого:
                            <div class="ml-auto pr-10 text-right"></div>
                        </div>
                    </div>


                    <div class="box p-5 border-b border-slate-200/60 dark:border-darkmode-400 mx-3 grid-cols-1">
                        <h2 class="font-medium text-base mr-auto my-auto">Условия</h2>

                        <div class="w-full border-t border-slate-200/60 dark:border-darkmode-400"></div>

                        <div class="flex items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="credit-card" data-lucide="credit-card"
                                 class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            Свободный график:
                            <div class="ml-auto pr-10 text-right">
                                <div class="form-check mt-2"> <input name="schedule_free" id="checkbox-switch-1" class="form-check-input" type="checkbox" value=""></div>
                            </div>
                        </div>

                        <div class="flex items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="credit-card" data-lucide="credit-card"
                                 class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            Без учета просрочки:
                            <div class="ml-auto pr-10 text-right">
                                <div class="form-check mt-2"> <input name="schedule_charges_free" id="checkbox-switch-1" class="form-check-input" type="checkbox" value=""></div>
                            </div>
                        </div>

                        <div class="flex items-center mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="credit-card" data-lucide="credit-card"
                                 class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                            Свободный перв.взнос:
                            <div class="ml-auto pr-10 text-right">
                                <div class="form-check mt-2"> <input name="schedule_fisrttime_free" id="checkbox-switch-1" class="form-check-input" type="checkbox" value=""></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="flex intro-x justify-end flex-col md:flex-row gap-2 mt-5">
            <a type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Cancel</a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Save</button>
        </div>

    </form>
@endsection

@section('script')

    <script>
        $('#aptnum').keyup(function () {
            let id = $(this).val();
            $.ajax({
                url: '{{ route('contracts.apartments.search') }}',
                data: {
                    'data': id
                },
                type: 'GET',
                success: function (data) {
                    document.getElementById('apt-details').innerHTML = data
                }
            })
        })

        function count() {
            let price = $("#aptprice").val();
            let square = $("#square").text();
            $("#apttotal").val(price * square)

        }

       $('#client_id').change(function () {
           let id = $(this).val();
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
               }
           })
       })
    </script>
@endsection
