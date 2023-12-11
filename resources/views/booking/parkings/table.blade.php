<!-- BEGIN: Data List -->
<div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
        <tr>
            <th class="whitespace-nowrap">№</th>
            <th class="whitespace-nowrap">Ф.И.О.</th>
            <th class="text-center whitespace-nowrap">Статус</th>
            <th class="text-center whitespace-nowrap">Дата окончания</th>
            <th class="whitespace-nowrap">Квартира</th>
            <th class="whitespace-nowrap">Аванс</th>
            <th class="text-center whitespace-nowrap">Действия</th>
        </tr>
        </thead>
        <tbody>

        @foreach($bookings as $key => $booking)
            <tr class="intro-x">
                <td class="w-20 !py-4">{{ $key + 1 }}<a class="whitespace-nowrap"></a></td>
                <td class="w-56">
                    <a href="" class="underline decoration-dotted font-medium whitespace-nowrap">{{ $booking->client()->firstname }} {{ $booking->client()->name }}</a>
                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $booking->client()->passportId }}</div>
                </td>
                <td class="text-center">
                    <div class="flex items-center justify-center whitespace-nowrap text-success">
                        <i class="px-1" data-lucide="check-square"></i>
                        {{ $booking->status }}
                    </div>
                </td>
                <td class="w-40 !py-4 whitespace-nowrap">{{ $booking->until !== null ? date("d.m.Y", strtotime($booking->until )) : '' }}</td>
                <td>
                    <div class="whitespace-nowrap">№ {{ $booking->parking()->id }}</div>
                </td>
                <td class="text-center">
                    {{ number_format($booking->paid, 0, '.', ' ') ?? '- - - -' }}
                </td>
                <td class="table-report__action">
                    <div class="flex justify-center items-center">
                        <a class="flex items-center text-primary whitespace-nowrap mr-5" href="">
                            <i class="px-1" data-lucide="arrow-left-right"></i> Детали </a>
                        <a class="flex items-center text-danger whitespace-nowrap" href="javascript:;"
                           data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal-{{$booking->id}}">
                            <i class="px-1" data-lucide="trash"></i>  Удалить </a>
                    </div>
                </td>
            </tr>
            <!-- BEGIN: Delete Confirmation Modal -->
            <div id="delete-confirmation-modal-{{$booking->id}}" class="modal" tabindex="-1" aria-hidden="true" style="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="p-5 text-center">
                                <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Are you sure?</div>
                                <div class="text-slate-500 mt-2">
                                    Do you really want to delete these records?
                                    <br>
                                    This process cannot be undone.
                                </div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                <form method="post" action="{{ route('booking.apartments.delete', $booking->id ) }} ">
                                    @method('post')
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
            {{--{{$aptContracts->links()}}--}}
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
