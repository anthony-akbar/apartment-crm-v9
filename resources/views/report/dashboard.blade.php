@extends('admin')

@section("content")
    <h2 class="intro-y text-lg font-medium mt-10">Отчёты</h2>

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
        <div class="text-center mr-2"><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-category"
                                         class="btn btn-primary">Новая категория</a></div> <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="add-category" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="modal-content">
                            <!-- BEGIN: Modal Header -->
                            <div class="modal-header">
                                <h2 class="font-medium text-base mr-auto">Добавление Категории</h2>
                            </div> <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <form method="POST" action="{{ route('settings.store') }}">
                                @csrf
                                <input type="hidden" name="type" value="newCategory"/>
                                <div class="modal-body grid grid-cols-12">
                                    <div class="col-span-12 sm:col-span-6">
                                        <label for="modal-form-2" class="form-label">Категория</label>
                                        <input id="modal-form-2" type="text" class="form-control"
                                               placeholder="Строительные расходы" name="categoryTitle">
                                    </div>
                                </div>
                                <!-- END: Modal Body -->
                                <!-- BEGIN: Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" data-tw-dismiss="modal"
                                            class="btn btn-outline-secondary w-20 mr-1">Отмена
                                    </button>
                                    <button type="submit" class="btn btn-primary w-20">Сохранить</button>
                                </div><!-- END: Modal Footer -->
                            </form>
                        </div>
                    </div>
                </div>
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
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="printer" data-lucide="printer" class="lucide lucide-printer w-4 h-4 mr-2">
                                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"></path>
                                <rect x="6" y="14" width="12" height="8"></rect>
                            </svg>
                            Print </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                <button class="dropdown-toggle btn btn-primary" aria-expanded="false" data-tw-toggle="dropdown">Фильтр<i data-lucide="chevron-down" class="w-4 h-4 ml-2"></i></button>
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
                                <input type="text" data-daterange="true" class="datepicker form-control w-56 block mx-auto">
                            </div>

                            <div class="flex items-center mt-3">
                                <button data-dismiss="dropdown" class="btn btn-secondary w-32 ml-auto">Close</button>
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

    <div class="grid grid-cols-12">
        @foreach ($categories as $category)
            <div class="col-span-12 md:col-span-6 lg:col-span-3 mt-6 mx-4">
                <div class="intro-y block sm:flex items-center">
                    <h2 class="text-lg font-medium truncate mr-5">
                        {{ $category->title }}
                    </h2>
                    <div id="category-summ-{{ $category->id }}" class="sm:ml-auto p-3 mt-3 sm:mt-0 box">

                    </div>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div
                        class="flex text-slate-500 border-b border-slate-200 dark:border-darkmode-300 border-dashed pb-3 mb-3">
                        <div>Артикли</div>
                        <div class="ml-auto">Сумма</div>
                    </div>

                    @foreach($category->articles as $article)
                        <div class="flex items-center mb-5">
                            <div class="flex items-center">
                                <div>{{ $article->title }}</div>
                            </div>
                            <div class="article-summ-{{ $category->id }} ml-auto">{{ number_format($article->records->sum('amount'), 0, ',', ' ') }}</div>
                        </div>
                    @endforeach


                    {{--<button
                        class="btn btn-outline-secondary w-full border-slate-300 dark:border-darkmode-300 border-dashed relative mb-0 justify-start mb-2">
                        <span class="truncate mr-5">View Full Report</span>
                        <span
                            class="w-8 h-8 absolute flex justify-center items-center right-0 top-0 bottom-0 my-auto ml-auto mr-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 icon-name="arrow-right" data-lucide="arrow-right"
                                 class="lucide lucide-arrow-right w-4 h-4"><line x1="5" y1="12" x2="19"
                                                                                 y2="12"></line><polyline
                                    points="12 5 19 12 12 19"></polyline></svg>
                        </span>
                    </button>--}}
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('script')
    <script>

        function summCalculate(id) {

            const options1 = { style: 'currency', currency: 'RUB' };
            const numberFormat1 = new Intl.NumberFormat('ru-RU', options1);
            let summ = 0
            let data = document.getElementsByClassName('article-summ-' + id)
            for(let i = 0; i < data.length; i++) {
               console.log(data[i].innerText.replaceAll(" ", ""))
                summ+=parseInt(data[i].innerText.replaceAll(" ", ""))
            }
            $('#category-summ-' + id).html(summ.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " "))

        }
        @foreach($categories as $category)
        summCalculate({{ $category->id }})
        @endforeach
    </script>
@endsection
