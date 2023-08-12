@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mx-5 my-10">Новая оплата</h2>

    <div class="grid grid-cols-2">
        <div class="mx-3 grid-cols-1 intro-x">
            <div class="box p-5 rounded-md">
                <!-- BEGIN: Basic Select -->
                <div class="form-inline text-center">
                    <label class="form-label"> Клиент</label>
                    <div class="mt-2">
                        <select name="client_id" id="client_id" class="form-control tom-select w-full">
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
                <!-- BEGIN: Basic Select -->
                <div id="contract-selector" class="form-inline text-center">
                    @include('payments.contract-selector')
                </div>
                <!-- END: Basic Select -->
                <div class="w-full border-t border-slate-200/60 dark:border-darkmode-400 mt-3"></div>

                <div class="client-details">

                    <div class="grid grid-cols-2 mt-3">
                        <div class="grid-cols-1">
                            <div class="w-2/4 flex-none">
                                <div class="text-slate-500 truncate">Квартира</div>
                                <div id="passportId_show" class="text-lg mt-1">- - - - - - - -</div>
                            </div>
                            <div class="w-2/4 flex-none">
                                <div class="text-slate-500 truncate">Стоимость</div>
                                <div id="pin_show" class="text-lg mt-1">- - - - - - - -</div>
                            </div>
                            <div class="w-2/4 flex-none">
                                <div class="text-slate-500 truncate">Оплачено</div>
                                <div id="email_show" class="text-lg mt-1">- - - - - - - -</div>
                            </div>
                            <div class="w-2/4 flex-none">
                                <div class="text-slate-500 truncate">Остаток</div>
                                <div id="email_show" class="text-lg mt-1">- - - - - - - -</div>
                            </div>
                        </div>
                        <div class="grid-cols-1">
                            <div class="w-full">
                                <select name="client_id" id="client_id" class="form-control tom-select">
                                    @foreach($articles as $article)
                                        <option value="{{ $article->id }}">
                                            {{ $article->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2 flex-none">
                                <div class="text-slate-500 truncate">Сумма оплаты (сом)</div>
                                <div id="phone_show" class="text-lg mt-1"><input id="regular-form-3" type="text" class="form-control" placeholder="With help"></div>
                            </div>
                            <div class="mt-2 flex-none">
                                <div class="text-slate-500 truncate">Сумма оплаты (доллар)</div>
                                <div id="phone_show" class="text-lg mt-1"><input id="regular-form-3" type="text" class="form-control" placeholder="With help"></div>
                            </div>
                            <div class="mt-2 flex-none">
                                <div class="text-slate-500 truncate">Итого</div>
                                <div id="phone_show" class="text-lg mt-1">0</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript">

        function onClientChange() {
            let id = $('#client_id').val();
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

            $.ajax({
                url: '{{ route('payments.search.contracts') }}',
                data: {
                    'data': id
                },
                type: 'GET',
                success: function (data) {
                    $('#contract-selector').html(data)
                }
            })
        }


        $('#client_id').change(onClientChange)
        $(document).ready(onClientChange)

    </script>
@endsection
