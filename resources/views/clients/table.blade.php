<!-- BEGIN: Data List -->
<div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
        <tr>
            <th class="whitespace-nowrap">№</th>
            <th class="whitespace-nowrap">Ф.И.О.</th>
            <th class="text-center whitespace-nowrap">Статус</th>
            <th class="whitespace-nowrap">Контакты</th>
            <th class="text-center whitespace-nowrap">Действия</th>
        </tr>
        </thead>
        <tbody>

        @foreach($clients as $key => $client)
            <tr class="intro-x">
                <td class="w-40 !py-4"><a href=""
                                          class="underline decoration-dotted whitespace-nowrap">{{ $client->id }}</a></td>
                <td class="w-40">
                    <a href="" class="font-medium whitespace-nowrap">{{ $client->name }}</a>
                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $client->passportId }}</div>
                </td>
                <td class="text-center">
                    <div class="flex items-center justify-center whitespace-nowrap text-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="check-square" data-lucide="check-square"
                             class="lucide lucide-check-square w-4 h-4 mr-2">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                        </svg>
                        {{ $client->status }}
                    </div>
                </td>
                <td>
                    <div class="whitespace-nowrap">{{ $client->address }}</div>
                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $client->phone }}</div>
                </td>
                <td class="table-report__action">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                 class="lucide lucide-check-square w-4 h-4 mr-1">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg>
                            Детали </a>
                        <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;"
                           data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right"
                                 class="lucide lucide-arrow-left-right w-4 h-4 mr-1">
                                <polyline points="17 11 21 7 17 3"></polyline>
                                <line x1="21" y1="7" x2="9" y2="7"></line>
                                <polyline points="7 21 3 17 7 13"></polyline>
                                <line x1="15" y1="17" x2="3" y2="17"></line>
                            </svg>
                            Удалить </a>
                    </div>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
</div>
<!-- END: Data List -->
<!-- BEGIN: Pagination -->
<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">

    <div class="grid grid-cols-2">
        <div class="mt-10 grid-cols-1 text-center">
            {{$clients->links()}}
        </div>
    </div>

    {{--<nav class="w-full sm:w-auto sm:mr-auto">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="chevrons-left" class="lucide lucide-chevrons-left w-4 h-4"
                         data-lucide="chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="chevron-left" class="lucide lucide-chevron-left w-4 h-4" data-lucide="chevron-left">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item">
                <a class="page-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="chevron-right" class="lucide lucide-chevron-right w-4 h-4"
                         data-lucide="chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="chevrons-right" class="lucide lucide-chevrons-right w-4 h-4"
                         data-lucide="chevrons-right">
                        <polyline points="13 17 18 12 13 7"></polyline>
                        <polyline points="6 17 11 12 6 7"></polyline>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>--}}
    <select class="w-20 form-select box mt-3 sm:mt-0">
        <option>10</option>
        <option>25</option>
        <option>35</option>
        <option>50</option>
    </select>
</div>
<!-- END: Pagination -->
