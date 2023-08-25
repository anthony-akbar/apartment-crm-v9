@extends('admin')

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center my-5 p-5">
        <h2 class="text-lg font-medium mr-auto pl-5">
            Новая оплата
        </h2>
        <div class="box w-auto ml-auto sm:ml-0">
            <div class="mx-3">
                <div class="py-2">
                    <input id="currency-value" type="text" class="form-control" placeholder="Курс $">
                </div>
            </div>
        </div>

    </div>


<form action="{{ route('payments.store') }}" method="POST">
    @csrf
    @method('post')
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
                                    <input id="amount_kgs" name="amount_kgs" type="text" class="form-control" placeholder="сом">
                                </div>
                            </div>
                            <div class="mt-2 flex-none">
                                <div class="text-slate-500 truncate">Сумма оплаты (доллар)</div>
                                <div class="text-lg mt-1">
                                    <input id="amount_usd" name="amount_usd" type="text" class="form-control" placeholder="$">
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


    <div class="flex intro-x justify-end flex-col md:flex-row gap-2 mt-5">
        <a type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Cancel</a>
        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Save</button>
    </div>
</form>

@endsection

@section('script')
    <script type="text/javascript">

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
            onContractChange()
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

            if($('#currency-value').val() !== ''){
                currency_value = $('#currency-value').val()
            }else {
                return;
            }

            let amount_kgs = parseInt($('#amount_kgs').val() === '' ? 0 : $('#amount_kgs').val())
            let amount_usd = parseInt($('#amount_usd').val() === '' ? 0 : $('#amount_usd').val())

            console.log(amount_usd, currency_value, amount_kgs)

            if($('#currency-hidden').val() === 'KGS'){
                $('#total-hidden').val((amount_usd * currency_value) + amount_kgs)
                $('#total_show').text(((amount_usd * currency_value) + amount_kgs).toLocaleString('fr-FR') + ' ' + $('#currency-hidden').val())
            }else {
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
