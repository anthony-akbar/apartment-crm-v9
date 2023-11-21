@extends('admin')

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center my-5 p-5">
        <h2 class="text-lg font-medium mr-auto pl-5">
            Новая оплата
        </h2>
        <div class="box w-auto ml-auto sm:ml-0">
            <div class="mx-3">
                <div class="py-2">
                    <input id="currency-value" type="text" class="form-control" value="89" placeholder="Курс $">
                </div>
            </div>
        </div>

    </div>


    <form action="{{ route('payments.store') }}" method="POST">
        @csrf
        @method('post')
        <div class="grid grid-cols-2 gap-4">
            <div class="mx-3 grid-cols-1 intro-x">
                <div class="box p-5 rounded-md">
                    <!-- BEGIN: Basic Select -->
                    <div class="form-inline text-center">
                        <label class="form-label"> Клиент</label>
                        <div class="mt-2">
                            <select name="client_id" id="client_id" class="form-control tom-select"
                                    style="width: 100%;">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->firstname }} {{ $client->name }} <span
                                            class="text-opacity-70">{{ $client->passportId }}</span></option>
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
                                <div class="flex-none">
                                    <div class="text-slate-500 truncate">Квартира</div>
                                    <div id="apartment_show" class="text-lg mt-1">- - - - - - - -</div>
                                </div>
                                <div class="flex-none">
                                    <div class="text-slate-500 truncate">Стоимость</div>
                                    <div id="amount_show" class="text-lg mt-1">- - - - - - - -</div>
                                </div>
                                <div class="flex-none">
                                    <div class="text-slate-500 truncate">Оплачено</div>
                                    <div id="paid_show" class="text-lg mt-1">- - - - - - - -</div>
                                </div>
                                <div class="flex-none">
                                    <div class="text-slate-500 truncate">Остаток</div>
                                    <div id="debt_show" class="text-lg mt-1">- - - - - - - -</div>
                                </div>
                            </div>
                            <div class="grid-cols-1">
                                <div class="w-full">
                                    <select name="article_id" id="article_id" class="form-control tom-select">
                                        @foreach($articles as $article)
                                            <option value="{{ $article->id }}">
                                                {{ $article->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-2 flex-none">
                                    <div class="text-slate-500 truncate">Сумма оплаты (сом)</div>
                                    <div class="text-lg mt-1">
                                        <input id="amount_kgs" name="amount_kgs" type="text" class="form-control"
                                               placeholder="сом">
                                    </div>
                                </div>
                                <div class="mt-2 flex-none">
                                    <div class="text-slate-500 truncate">Сумма оплаты (доллар)</div>
                                    <div class="text-lg mt-1">
                                        <input id="amount_usd" name="amount_usd" type="text" class="form-control"
                                               placeholder="$">
                                    </div>
                                </div>
                                <div class="mt-2 flex-none">
                                    <div class="text-slate-500 truncate">Итого</div>
                                    <div id="total_show" class="text-lg mt-1">0</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <input type="hidden" name="currency-value" id="currency-value-hidden">
        <input type="hidden" name="currency" id="currency-hidden">
        <input type="hidden" name="total" id="total-hidden">

        <br>
        <div class="w-full border-t border-slate-200/60 dark:border-darkmode-400 mt-5"></div>
        <br>

        <div class="intro-y">
            <div
                class="box flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Авто
                </h2>
                <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                    <label class="form-check-label ml-0" for="show-example-1"></label>
                    <input id="show-example-1" name="auto" data-target="#input"
                           class="show-code form-check-input mr-0 ml-3"
                           type="checkbox">
                </div>
            </div>
            <div id="input" class="p-5">
                <div class="preview">

                </div>
                <div class="source-code hidden">
                    <div class="intro-x p-5 box">
                        <div class="form-inline">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Марка</label>
                            <input id="auto-make" name="make" type="text" class="form-control"
                                   placeholder="Toyota">
                        </div>
                        <div class="form-inline mt-3">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Модель</label>
                            <input id="auto-model" type="text" name="model" class="form-control"
                                   placeholder="Camry 50">
                        </div>
                        <div class="form-inline mt-3">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Год выпуска</label>
                            <input id="auto-year" type="text" name="year" class="form-control"
                                   placeholder="2018">
                        </div>
                        <div class="form-inline mt-3">
                            <label for="horizontal-form-1" class="form-label sm:w-20">Стоимость</label>
                            <input id="auto-amount" onkeyup="autoChange()" type="text" name="amount" class="form-control"
                                   placeholder="15000">
                        </div>
                        <div class="input-form mt-3">
                            <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row">
                                Примечания
                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 10 characters</span>
                            </label>
                            <textarea id="auto-description" class="form-control" name="description"
                                               placeholder="Type your comments" minlength="10"></textarea>
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
    <script type="text/javascript">

        $('#show-example-1').change(() =>{
            $('#amount_kgs').val('')
            $('#amount_kgs').prop('disabled', (i, v) => !v)

            $('#amount_usd').val('')
            $('#amount_usd').prop('disabled', (i, v) => !v)

            $('#auto-make').val('')
            $('#auto-model').val('')
            $('#auto-year').val('')
            $('#auto-amount').val('')
        })

        function autoChange() {
            $('#amount_usd').val($('#auto-amount').val())
            onAmountChange()
        }

        // Clients logic JS

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
            setTimeout(function () {
                onContractChange()
            }, 1000)

        }

        $('#client_id').change(onClientChange)
        $(document).ready(onClientChange)

        // Contracts logic

        function onContractChange() {
            let contract = $('#contract_id').val()

            $.ajax({
                url: '{{ route('contracts.apartments.search') }}',
                data: {
                    'data': contract
                },
                type: 'GET',
                success: function (data) {
                    console.log(data)
                    $('#apartment_show').text('№' + data['apartment']['number'])
                    $('#amount_show').text(data['contract']['amount'].toLocaleString('fr-FR') + ' ' + data['contract']['currency'])
                    $('#paid_show').text(data['contract']['paid'].toLocaleString('fr-FR') + ' ' + data['contract']['currency'])
                    $('#debt_show').text(data['contract']['debt'].toLocaleString('fr-FR') + ' ' + data['contract']['currency'])
                    $('#currency-hidden').val(data['contract']['currency'])


                    console.log(data)
                }
            })
        }


        // Amount logics

        function onAmountChange() {
            $('#currency-value-hidden').val($('#currency-value').val() === '' ? 0 : parseInt($('#currency-value').val()))

            let currency = $('#currency-hidden').val()

            let currency_value = 0

            if ($('#currency-value').val() !== '') {
                currency_value = $('#currency-value').val()
            } else {
                return;
            }

            let amount_kgs = parseInt($('#amount_kgs').val() === '' ? 0 : $('#amount_kgs').val())
            let amount_usd = parseInt($('#amount_usd').val() === '' ? 0 : $('#amount_usd').val())

            console.log(amount_usd, currency_value, amount_kgs)

            if ($('#currency-hidden').val() === 'KGS') {
                $('#total-hidden').val((amount_usd * currency_value) + amount_kgs)
                $('#total_show').text(((amount_usd * currency_value) + amount_kgs).toLocaleString('fr-FR') + ' ' + $('#currency-hidden').val())
            } else {
                $('#total-hidden').val((amount_kgs / currency_value) + amount_usd)
                $('#total_show').text(((amount_kgs / currency_value) + amount_usd).toLocaleString('fr-FR') + ' ' + $('#currency-hidden').val())
            }

        }

        $()
        $('#contract_id').change(onContractChange)
        $('#currency-value').keyup(onAmountChange)
        $('#amount_kgs').keyup(onAmountChange)
        $('#amount_usd').keyup(onAmountChange)
    </script>
@endsection
