@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">Оплаты</h2>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{ route('payments.create') }}" class="btn btn-primary shadow-md mr-2">Новая оплата</a>
        <div class="dropdown">
            <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                <span class="w-5 h-5 flex items-center justify-center">
                <i data-lucide="plus"></i>
                </span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="" class="dropdown-item">
                            <i class="px-1" data-lucide="printer"></i> Print </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <i class="px-1" data-lucide="file-text"></i>
                            Export to Excel </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <i class="px-1" data-lucide="file-text"></i>
                            Export to PDF </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="hidden md:block mx-auto text-slate-500"></div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Поиск...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
            </div>
        </div>
    </div>

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
            <tr>
                <th class="w-20 whitespace-nowrap">№</th>
                <th class="w-32 whitespace-nowrap">Ф.И.О. клиента</th>
                <th class="w-64 text-center whitespace-nowrap">Основание</th>
                <th class="w-40 text-center whitespace-nowrap">Сумма</th>
                <th class="w-44 text-center whitespace-nowrap">Дата оплаты</th>
                <th class="w-24 text-center whitespace-nowrap">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($payments as $key => $payment)
                <tr class="intro-x">
                    <td class="w-20 !py-4">{{ $key + 1 }}<a class="whitespace-nowrap"></a></td>
                    <td class="w-32">
                        <a href=""
                           class="underline decoration-dotted font-medium whitespace-nowrap">{{ $payment->client->firstname }} {{ $payment->client->name }} {{ $payment->client->fathersname ?? '' }}</a>
                        <div
                            class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $payment->client->passportId }}</div>
                    </td>
                    <td class="w-64 text-center">
                        {{ $payment->article->title }}
                    </td>
                    <td class="w-40 text-center">
                        {{ $payment->amount }}
                        <i class="inline-block tooltip bg-black" style="height: 20px" title="{{ number_format($payment->amount_kgs, 0, '.', ' ') }} KGS,
                        {{ number_format($payment->amount_usd, 0, '.', ' ')  }} USD"
                           data-lucide="alert-circle"></i>
                    </td>
                    <td class="w-44 text-center">
                        {{ date("d.m.Y", strtotime($payment->created_at)) }}
                    </td>
                    <td class="w-24 table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="{{ route('payments.download', $payment->id) }}">
                                <i class="px-1" data-lucide="arrow-left-right"></i> Детали </a>
                            <a class="flex items-center text-danger whitespace-nowrap" href="javascript:;"
                               data-tw-toggle="modal"
                               data-tw-target="#delete-confirmation-modal-{{--{{$booking->id}}--}}">
                                <i class="px-1" data-lucide="trash"></i> Удалить </a>
                        </div>
                    </td>
                </tr>
                <!-- BEGIN: Delete Confirmation Modal -->
                <div id="delete-confirmation-modal-{{--{{$booking->id}}--}}" class="modal" tabindex="-1"
                     aria-hidden="true" style="">
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
                                    <form method="post" action="">
                                        @method('delete')
                                        @csrf
                                        <a type="button" data-tw-dismiss="modal"
                                           class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
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
@endsection
