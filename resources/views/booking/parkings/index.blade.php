@extends('admin')

@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center p-10">
        <h2 class="text-lg font-medium mr-auto">Брони парковочного места</h2>
    </div>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

        <!-- BEGIN: Modal Toggle -->
        <div class="text-center"><a href="javascript:;" data-tw-toggle="modal"
                                    data-tw-target="#header-footer-modal-preview" class="btn btn-primary">Новая
                бронь</a>
        </div> <!-- END: Modal Toggle --> <!-- BEGIN: Modal Content -->
        <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content"> <!-- BEGIN: Modal Header -->
                    <form action="{{ route('booking.parking.store') }}" method="post">
                        @method('post')
                        @csrf
                    <div class="modal-header"><h2 class="font-medium text-base mr-auto">Бронь парковочного места</h2>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body grid grid-cols-2 gap-4 gap-y-3">

                        <div class="grid-cols-1">
                            <div class="form-label text-center">
                                <label class="form-label"> Клиент</label>
                                <div class="mt-2">
                                    <select name="client_id" id="client_id"
                                            data-placeholder="Select your favorite actors"
                                            class="form-control tom-select w-full">
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">
                                                {{ $client->firstname }} {{ $client->name }}
                                                <span class="text-opacity-70">{{ $client->passportId }}</span>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="flex-none">
                                <div class="text-slate-500 truncate">Серия паспорта</div>
                                <div id="passportId_show" class="text-lg mt-1">- - - - - - - -</div>
                            </div>
                            <div class="flex-none">
                                <div class="text-slate-500 truncate">ИНН</div>
                                <div id="pin_show" class="text-lg mt-1">- - - - - - - -</div>
                            </div>
                            <div class="flex-none">
                                <div class="text-slate-500 truncate">Электронная почта</div>
                                <div id="email_show" class="text-lg mt-1">- - - - - - - -</div>
                            </div>

                            <div class="flex-none">
                                <div class="text-slate-500 truncate">Адрес</div>
                                <div id="address_show" class="text-lg mt-1">- - - - - - - -</div>
                            </div>
                            <div class="flex-none">
                                <div class="text-slate-500 truncate">Номер телефона</div>
                                <div id="phone_show" class="text-lg mt-1">- - - - - - - -</div>
                            </div>
                        </div>
                        <div class="grid-cols-1">
                            <img class="mx-auto" style="height: 100px" src="{{ URL::to('/parking.png') }}">
                            <div>
                                <label class="form-label">№</label>
                                <input name="number" type="number" class="form-control" placeholder="№">
                            </div>
                            <div class="items-center mt-3">
                                <label class="form-label flex"><i class="flex px-1" data-lucide="dollar-sign"></i>Аванс:</label>
                                    <input name="paid" id="aptprice" onkeyup="count()" type="number" class="form-control" placeholder="Аванс $">
                            </div>
                            <div class="items-center mt-3">
                                <label class="form-label flex"><i class="px-1" data-lucide="clock"></i>Дата окончания:</label>
                                    <div class="relative mx-auto">
                                        <div
                                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                            <i data-lucide="calendar" class="w-4 h-4"></i></div>
                                        <input type="text" name="until" class="datepicker form-control pl-12"
                                               data-single-mode="true">
                                    </div>
                            </div>
                        </div>
                    </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                            Отмена
                        </button>
                        <button type="submit" class="btn btn-primary w-20">Схоранить</button>
                    </div>
                    </form>
                    <!-- END: Modal Footer --> </div>
            </div>
        </div> <!-- END: Modal Content -->

        <div class="dropdown mx-3">
            <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24" height="24" viewBox="0 0 24 24"
                                                                             fill="none" stroke="currentColor"
                                                                             stroke-width="2" stroke-linecap="round"
                                                                             stroke-linejoin="round" icon-name="plus"
                                                                             class="lucide lucide-plus w-4 h-4"
                                                                             data-lucide="plus"><line x1="12" y1="5"
                                                                                                      x2="12"
                                                                                                      y2="19"></line><line
                            x1="5" y1="12" x2="19" y2="12"></line></svg> </span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="printer" data-lucide="printer"
                                 class="lucide lucide-printer w-4 h-4 mr-2">
                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"></path>
                                <rect x="6" y="14" width="12" height="8"></rect>
                            </svg>
                            Print </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="file-text" data-lucide="file-text"
                                 class="lucide lucide-file-text w-4 h-4 mr-2">
                                <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <line x1="10" y1="9" x2="8" y2="9"></line>
                            </svg>
                            Export to Excel </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="file-text" data-lucide="file-text"
                                 class="lucide lucide-file-text w-4 h-4 mr-2">
                                <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <line x1="10" y1="9" x2="8" y2="9"></line>
                            </svg>
                            Export to PDF </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
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
    <div class="grid grid-cols-12 gap-6 mt-5">
        @include('booking.parkings.table')
    </div>

@endsection

@section('script')
    <script>

        function onClientChange() {
            let id = $('#client_id').val();
            console.log(id);
            $.ajax({
                url: '{{ route('clients.search') }}',
                data: {
                    'data': id
                },
                type: 'GET',
                success: function (data) {
                    console.log(data);
                    $('#passportId_show').text(data['passportId'])
                    $('#pin_show').text(data['pin'])
                    $('#address_show').text(data['address'])
                    $('#email_show').text(data['email'] !== null ? data['email'] : '- - - - - - - -')
                    $('#phone_show').text(data['phone'])
                }
            })
        }

        onClientChange()
        $('#client_id').change(onClientChange())


    </script>
@endsection
