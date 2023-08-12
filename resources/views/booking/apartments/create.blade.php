@extends('admin')

@section('content')

    <h2 class="intro-y text-lg font-medium mx-5 my-10">Новая бронь</h2>
    <form class="" method="POST" action="{{ route('booking.apartments.store') }}">
        @csrf
        @method('post')
        <div class="grid grid-cols-2">
            <div class="mx-3 grid-cols-1 intro-x">
                <div class="box p-5 rounded-md">
                    <!-- BEGIN: Basic Select -->
                    <div class="form-inline text-center">
                        <label class="form-label"> Клиент</label>
                        <div class="mt-2">
                            <select name="client_id" id="client_id" data-placeholder="Select your favorite actors"
                                    class="form-control tom-select w-full">
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
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base truncate mx-6">Квартира</div>
                        <div class="font-medium text-base truncate ml-auto">
                            <input id="aptnum" name="apt_id" type="number" class="form-control" placeholder="№">
                        </div>
                    </div>
                    <div id="apt-details">
                        <div class="flex items-center">
                            <i class="px-1" data-lucide="maximize-2"></i>Полщадь:
                            <div id="square" class="ml-auto pr-10 text-right"> --</div>
                        </div>
                        <div class="flex items-center mt-3">
                            <i class="px-1" data-lucide="layout"></i>Комнаты:
                            <div id="rooms" class="ml-auto pr-10 text-right"> --</div>
                        </div>
                        <div class="flex items-center mt-3">
                            <i class="px-1" data-lucide="layers"></i>Этаж:
                            <div id="floor" class="ml-auto pr-10 text-right"> --</div>
                        </div>
                        <div class="flex items-center mt-3">
                            <i class="px-1" data-lucide="dollar-sign"></i>Аванс:
                            <div class="my-auto ml-auto pr-10 text-right">
                                <input name="paid" id="aptprice" onkeyup="count()" type="number" class="form-control"
                                       placeholder="Аванс $">
                            </div>
                        </div>
                        <div class="flex items-center mt-3">
                            <i class="px-1" data-lucide="clock"></i>Дата окончания:
                            <div class="my-auto ml-auto pr-10 text-right">
                                <div class="relative w-56 mx-auto">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                        <i data-lucide="calendar" class="w-4 h-4"></i></div>
                                    <input type="text" name="until" class="datepicker form-control pl-12"
                                           data-single-mode="true">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full border-t border-slate-200/60 dark:border-darkmode-400 mt-5"></div>


        <div class="flex intro-x justify-end flex-col md:flex-row gap-2 mt-5">
            <a type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Cancel</a>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Save</button>
        </div>
    </form>
@endsection

@section('script')

    <script>

        function scheduleCount() {
            if ($('#schedule_amount').val() === '') {
                let debt = parseInt($('#total_schedule').text()) - $('#first_payment').val()
                let amount = debt / $('#schedule_status').val()

                $('#schedule_amount').val(amount)
                $('#schedule_last_month').val(amount)
            } else {
                let debt = parseInt($('#total_schedule').text()) - $('#first_payment').val() - (($('#schedule_status').val() - 1) * $('#schedule_amount').val())
                $('#schedule_last_month').val(debt < 0 ? "NaN" : debt)

            }

            let debt = parseInt($('#total_schedule').text()) - $('#schedule_last_month').val() - $('#schedule_amount').val()
        }

        $('#aptnum').on('keyup', function () {
            let id = $(this).val();
            $.ajax({
                url: '{{ route('contracts.apartments.search') }}',
                data: {
                    'data': id
                },
                type: 'GET',
                success: function (data) {
                    console.log(data);
                    $('#square').text(data['square'])
                    $('#rooms').text(data['rooms'])
                    $('#floor').text(data['floor'])
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

        /*function previous(apt_id, client_id) {
            console.log(apt_id, client_id)
            if(apt_id !== null) {
                $.ajax({
                    url: '{{ route('contracts.apartments.search') }}',
                    data: {
                        'data': apt_id
                    },
                    type: 'GET',
                    success: function (data) {
                        console.log(data);
                        $('#square').text(data['square'])
                        $('#rooms').text(data['rooms'])
                        $('#floor').text(data['floor'])
                    }
                })
            }
            if(client_id !== null) {
                $.ajax({
                    url: '{{ route('clients.search') }}',
                    data: {
                        'data': client_id
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
            }
        }*/


    </script>
@endsection
