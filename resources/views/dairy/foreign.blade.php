 <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="hidden xl:block mx-auto text-slate-500">

            </div>
            <div id="dairy_dollar_in" class="hidden xl:block mx-auto text-slate-500">
                Приход: {{ $dairy_dollar_in }} $
            </div>
            <div id="dairy_dollar_out" class="hidden xl:block mx-auto text-slate-500">
                Расход {{ $dairy_dollar_out }} $
            </div>
            <div id="dairy_dollar_subtotal" class="hidden xl:block mx-auto text-slate-500">
                Остаток {{ $dairy_dollar_in-$dairy_dollar_out }} $
            </div>
            <div class="hidden xl:block mx-auto text-slate-500">

            </div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <button class="btn btn-primary shadow-md mr-2" control-id="ControlID-4">
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
                    Экспорт в Excel
                </button>
            </div>
        </div>
    </div>
 <div class="intro-y px-5 mt-5 col-span-12 overflow-auto 2xl:overflow-visible">

        <table class="table table-report -mt-2">
            <thead class="box">
            <tr>
                <th class="text-center whitespace-nowrap">Дата</th>
                <th class="text-center whitespace-nowrap">Ответственное лицо</th>
                <th class="text-center whitespace-nowrap">Детали</th>
                <th class="text-center whitespace-nowrap">Сумма</th>
                <th class="text-center whitespace-nowrap">
                    <div class="pr-16">Дополнительная информация</div>
                </th>
                <th class="text-center whitespace-nowrap">Действия</th>
            </tr>
            </thead>
            <tbody>

            @foreach($dairy_dollar as $item)

                <tr class="intro-x">
                    <td class="text-center">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">{{ $item->date }}</a>
                    </td>
                    <td class="text-center">
                        <div class="font-medium whitespace-nowrap">{{ $item->representative }}</div>
                    </td>
                    <td class="text-center">
                        <div class="whitespace-nowrap">{{ $item->details }}</div>
                    </td>
                    <td class="text-center">
                        <div class="whitespace-nowrap">{{$item->payment}} {{ $item->currency == 'c' ? 'Сом' : $item->currency }}</div>
                    </td>
                    <td class="text-center">
                        <div class="pr-16">{{ $item->description }}</div>
                    </td>
                    <td class="text-center table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Изменить
                            </a>
                            <!-- BEGIN: Modal Toggle -->
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-record{{ $item->id }}" class="flex items-center text-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Удалить

                            </a>
                            <!-- END: Modal Toggle -->
                            <!-- BEGIN: Modal Content -->
                            <div id="delete-record{{ $item->id }}" class="modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="p-5 text-center">
                                                <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                <div class="text-3xl mt-5">Вы уверены?</div>
                                                <div class="text-slate-500 mt-2">Вы уверены что хотите удалить запись? <br>Это действие необратимо.</div>
                                            </div>
                                            <div class="px-5 pb-8 text-center">
                                                <form action="{{ route('safe.delete', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Отменить</button>
                                                    <button type="submit" class="btn btn-danger w-24">Удалить</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Modal Content -->
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
