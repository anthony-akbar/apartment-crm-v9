@extends('admin')

@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center p-10">
        <h2 class="text-lg font-medium mr-auto">Статьи</h2>
    </div>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">


        <!-- BEGIN: Modal Toggle -->
        <div class="text-center mr-2"><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-article"
                                         class="btn btn-primary">Новая запись</a></div> <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="add-article" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Добавление Статьи</h2>
                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <form method="POST" action="{{ route('settings.store') }}">
                        @csrf
                        <input type="hidden" name="type" value="newArticle"/>
                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-12 sm:col-span-6">
                                <label for="modal-form-1" class="form-label">Категория</label>
                                <div class="">
                                    <select data-placeholder="Выберите категорию" name="paymentCategory"
                                            class="tom-select w-full">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select></div>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="modal-form-2" class="form-label">Статья</label>
                                <input id="modal-form-2" type="text" class="form-control"
                                       placeholder="Доставка" name="article">
                            </div>
                        </div>
                        <!-- END: Modal Body -->
                        <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                                Отмена
                            </button>
                            <button type="submit" class="btn btn-primary w-20">Сохранить</button>
                        </div><!-- END: Modal Footer -->
                    </form>
                </div>
            </div>
        </div> <!-- END: Modal Content -->

        <!-- BEGIN: Modal Toggle -->
        <div class="text-center mr-2">
            <a href="javascript:;" data-tw-toggle="modal"
               data-tw-target="#add-category" class="btn btn-primary">Добавление категории</a>
        </div> <!-- END: Modal Toggle --> <!-- BEGIN: Modal Content -->
        <div id="add-category" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form class="form-control" method="POST" action="{{ route('settings.store') }}">
                    @csrf
                <div class="modal-content"> <!-- BEGIN: Modal Header -->
                    <div class="modal-header"><h2 class="font-medium text-base mr-auto">Добавление категории</h2>
                    </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                    <div class="modal-bodygap-4 gap-y-3">
                        <div class="p-5">
                                <label for="horizontal-form-1" class="form-label">Название</label>
                            <input id="horizontal-form-1" name="categoryTitle" type="text" class="w-full form-control"
                                    placeholder="Строительные расходы">
                        </div>
                    </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                            Отмена
                        </button>
                        <button type="button" class="btn btn-primary w-20">Сохранить</button>
                    </div> <!-- END: Modal Footer --> </div>
                </form>
            </div>
        </div> <!-- END: Modal Content -->

        <div class="dropdown">
            <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
            <span class="w-5 h-5 flex items-center justify-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                         height="24" viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor" stroke-width="2"
                                                                         stroke-linecap="round" stroke-linejoin="round"
                                                                         icon-name="plus"
                                                                         class="lucide lucide-plus w-4 h-4"
                                                                         data-lucide="plus"><line x1="12" y1="5" x2="12"
                                                                                                  y2="19"></line><line
                        x1="5" y1="12" x2="19" y2="12"></line></svg> </span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 icon-name="printer" data-lucide="printer"
                                 class="lucide lucide-printer w-4 h-4 mr-2">
                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                <path
                                    d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"></path>
                                <rect x="6" y="14" width="12" height="8"></rect>
                            </svg>
                            Print </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 icon-name="file-text" data-lucide="file-text"
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
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 icon-name="file-text" data-lucide="file-text"
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

        <div class="text-center mx-3">
            <div class="dropdown inline-block" data-tw-placement="bottom-start">
                <button class="dropdown-toggle btn btn-primary" aria-expanded="false" data-tw-toggle="dropdown">
                    Фильтр<i data-lucide="chevron-down" class="w-4 h-4 ml-2"></i></button>
                <div class="dropdown-menu">
                    <div class="dropdown-content">
                        <div class="p-2">
                            <div class="form-inline">
                                <label for="horizontal-form-1" class="form-label">Категории</label>
                                <select data-placeholder="Select your favorite actors" class="tom-select w-full">
                                    <option value="all">Все</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-inline mt-3">
                                <label for="horizontal-form-1" class="form-label">Валюта</label>
                                <select data-placeholder="Select your favorite actors" class="tom-select w-full">
                                    <option value="С">Сом</option>
                                    <option value="$">$</option>
                                </select>
                            </div>

                            <div class="form-inline mt-3">
                                <label for="horizontal-form-1" class="form-label">Период</label>
                                <input type="text" data-daterange="true"
                                       class="datepicker form-control w-56 block mx-auto">
                            </div>

                            <div class="flex items-center mt-3">
                                <button data-dismiss="dropdown" class="btn btn-secondary w-32 ml-auto">Close
                                </button>
                                <button class="btn btn-primary w-32 ml-2">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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


    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
            <tr>
                <th class="w-20 whitespace-nowrap">№</th>
                <th class="w-72 whitespace-nowrap">Название</th>
                <th class="w-24 text-center whitespace-nowrap">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $key => $article)
                <tr class="intro-x">
                    <td class="w-20 !py-4">{{ $key + 1 }}<a class="whitespace-nowrap"></a></td>
                    <td class="w-72">
                        <a href=""
                           class="underline decoration-dotted font-medium whitespace-nowrap">{{ $article->title }} </a>
                    </td>
                    <td class="w-24 table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="">
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
