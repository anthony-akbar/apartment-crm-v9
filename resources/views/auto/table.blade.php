<!-- BEGIN: Data List -->
<div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
        <tr>
            <th class="whitespace-nowrap">№</th>
            <th class="text-center whitespace-nowrap">Марка</th>
            <th class="text-center whitespace-nowrap">Модель</th>
            <th class="text-center whitespace-nowrap">Год Выпуска</th>
            <th class="text-center whitespace-nowrap">Стоимость</th>
            <th class="text-center whitespace-nowrap">Примечания</th>
            <th class="text-center whitespace-nowrap">Действия</th>
        </tr>
        </thead>
        <tbody>

        @foreach($autos as $key => $auto)
            <tr class="intro-x">
                <td class="w-40 !py-4"><a class="whitespace-nowrap">{{ $auto->id }}</a></td>
                <td class="text-center">
                    <a href="{{ route('clients.show', $auto->id) }}" class="underline decoration-dotted font-medium whitespace-nowrap">{{ $auto->make }}</a>
                </td>
                <td class="text-center">
                    <a class="underline decoration-dotted font-medium whitespace-nowrap">{{ $auto->model }}</a>
                </td>
                <td>
                    <div class="text-center whitespace-nowrap">{{ $auto->year }}</div>
                </td>
                <td>
                    <div class="text-center whitespace-nowrap">{{ $auto->amount }}</div>
                </td>
                <td>
                    <div class="text-center whitespace-nowrap">{{ $auto->description }}</div>
                </td>
                <td>

                </td>
            </tr>
            <!-- BEGIN: Delete Confirmation Modal -->
            <div id="delete-confirmation-modal-{{ $auto->id }}" class="modal" tabindex="-1" aria-hidden="true" style="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="p-5 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x-circle" data-lucide="x-circle" class="lucide lucide-x-circle w-16 h-16 text-danger mx-auto mt-3"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                <div class="text-3xl mt-5">Are you sure?</div>
                                <div class="text-slate-500 mt-2">
                                    Do you really want to delete these records?
                                    <br>
                                    This process cannot be undone.
                                </div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                <form method="post" action="{{ route('clients.delete', $auto->id) }}">
                                    @method('delete')
                                    @csrf
                                    <a type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                                    <button type="submit" class="btn btn-danger w-24">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Delete Confirmation Modal -->
        @endforeach

        </tbody>
    </table>
</div>
<!-- END: Data List -->
<!-- BEGIN: Pagination -->
<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">

    <div class="grid grid-cols-2">
        <div class="mt-10 grid-cols-1 text-center">
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
