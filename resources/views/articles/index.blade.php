@extends('admin')

@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center p-10">
        <h2 class="text-lg font-medium mr-auto">Статьи</h2>
    </div>

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
            <tr>
                <th class="w-20 whitespace-nowrap">№</th>
                <th class="w-72 whitespace-nowrap">Название</th>
                <th class="w-32 text-center whitespace-nowrap">Таблица</th>
                <th class="w-24 text-center whitespace-nowrap">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $key => $article)
                <tr class="intro-x">
                    <td class="w-20 !py-4">{{ $key + 1 }}<a class="whitespace-nowrap"></a></td>
                    <td class="w-72">
                        <a href="" class="underline decoration-dotted font-medium whitespace-nowrap">{{ $article->title }}</a>
                    </td>
                    <td class="w-32">
                        {{ $article->table }}
                    </td>
                    <td class="w-24 table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="">
                                <i class="px-1" data-lucide="arrow-left-right"></i> Детали </a>
                            <a class="flex items-center text-danger whitespace-nowrap" href="javascript:;"
                               data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal-{{--{{$booking->id}}--}}">
                                <i class="px-1" data-lucide="trash"></i>  Удалить </a>
                        </div>
                    </td>
                </tr>
                <!-- BEGIN: Delete Confirmation Modal -->
                <div id="delete-confirmation-modal-{{--{{$booking->id}}--}}" class="modal" tabindex="-1" aria-hidden="true" style="">
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

@endsection
