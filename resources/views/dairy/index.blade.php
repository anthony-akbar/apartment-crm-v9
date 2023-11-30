@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">Отчёты</h2>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

        <!-- ПРИХОД -->

        <!-- BEGIN: Modal Toggle -->
        <div class="text-center mr-2"><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#income"
                                         class="btn btn-primary">Приход</a></div> <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="income" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Приход</h2>
                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <form method="POST" action="{{ route('settings.store') }}">
                        @csrf
                        <input type="hidden" name="type" value="newArticle"/>
                        <div class="modal-body gap-y-4 gap-x-4">
                            <label for="modal-form-1" class="form-label">Сумма</label>
                            <div class="">
                                <input type="number" class="w-100 form-control" name="income-amount">
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label for="modal-form-2" class="form-label">Описание</label>
                                <textarea class="form-control" name="income-description"></textarea>
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

        <!-- END: ПРИХОД -->

        <!-- Расход -->

        <!-- BEGIN: Modal Toggle -->
        <div class="text-center mr-2"><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#out"
                                         class="btn btn-primary">Расход</a></div> <!-- END: Modal Toggle -->
        <!-- BEGIN: Modal Content -->
        <div id="out" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-body text-center">
                    <div class="modal-content">
                        <!-- BEGIN: Modal Header -->
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Расход</h2>
                        </div> <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <form method="POST" action="{{ route('settings.store') }}">
                            <div class="modal-body gap-4 gap-y-3">
                                @csrf
                                <div class="form-inline">
                                    <label for="horizontal-form-1" class="form-label">Статья</label>
                                    <select class="tom-select w-full mt-2 sm:mr-2" aria-label=".form-select-lg example">
                                        <option>Chris Evans</option>
                                        <option>Liam Neeson</option>
                                        <option>Daniel Craig</option>
                                    </select>
                                </div>
                                <div class="form-inline mt-3">
                                    <label for="horizontal-form-1" class="form-label">Сумма</label>
                                    <input id="horizontal-form-1" type="text" class="form-control" placeholder="example@gmail.com">
                                </div>
                                <div class="mt-3">
                                    <label for="update-profile-form-5" class="form-label">Описание</label>
                                    <textarea id="update-profile-form-5" class="form-control" placeholder="" style="height: 220px;"></textarea>
                                </div>
                                <!-- END: Modal Body -->
                            </div>
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
        </div> <!-- END: Modal Content -->

        <!-- END: Расход -->

        <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>

        <div class="text-center mx-3">
            <div class="dropdown inline-block" data-tw-placement="bottom-start">
                <button class="dropdown-toggle btn btn-primary" aria-expanded="false" data-tw-toggle="dropdown">Фильтр<i
                        data-lucide="chevron-down" class="w-4 h-4 ml-2"></i></button>
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

@endsection

@section('script')
    <script>
        $('#search').click(() => {
            let target = $('.tab-content').children('.active').attr('id')

            $.ajax({
                type: 'get',
                url: '{{ route('dairy.search') }}',
                data: {
                    'search': $('#search-input').val(),
                    'range': $('#datetimeinput').val(),
                    'currency': target === 'foreign' ? '$' : 'C'
                },
                success: function (data) {
                    $('#' + target).html(data)
                }
            })
        })

        $(document).on('click', '.button-apply', function () {
            let target = $('.tab-content').children('.active').attr('id')

            $.ajax({
                type: 'get',
                url: '{{ route('dairy.search') }}',
                data: {
                    'search': $('#search-input').val(),
                    'range': $('#datetimeinput').val(),
                    'currency': target === 'foreign' ? '$' : 'C'
                },
                success: function (data) {
                    $('#' + target).html(data)
                }
            })
        })
    </script>
@endsection
