@extends('admin')

@section('content')

    <h2 class="intro-y text-lg font-medium mx-5 my-10">Новый договор</h2>

    <div class="grid grid-cols-2">
        <div class="mx-3 grid-cols-1 intro-x">
            <div class="p-3 box">
                <div class="mt-3">
                    <label for="firstname" class="form-label">Фамилия</label>
                    <input id="firstname" type="text" data-tooltip-content="#custom-content-tooltip"
                           data-trigger="keyup" data-theme="light" class="tooltip form-control"
                           placeholder="Фамилия">

                    <!-- BEGIN: Custom Tooltip Toggle -->
                    <div class="text-center">
                        {{--<a href="javascript:;" data-theme="light" data-tooltip-content="#custom-content-tooltip"
                           data-trigger="click" class="tooltip btn btn-primary"
                           title="This is awesome tooltip example!">Show Tooltip</a>--}}</div>
                    <!-- END: Custom Tooltip Toggle -->
                    <!-- BEGIN: Custom Tooltip Content -->
                    <div class="tooltip-content">
                        <div id="custom-content-tooltip" class="relative flex items-center py-1">
                            <table id="tootipcontent">

                            </table>
                        </div>
                    </div> <!-- END: Custom Tooltip Content -->
                </div>
                <div class="mt-3">
                    <label for="name" class="tooltip form-label">Имя</label>
                    <input id="name" type="text" data-tooltip-content="#custom-content-tooltip"
                           data-trigger="keyup" data-theme="light"
                           class="form-control"
                           placeholder="Имя">
                    <!-- BEGIN: Custom Tooltip Content -->
                    <div class="tooltip-content">
                        <div id="custom-content-tooltip" class="relative flex items-center py-1">
                            <div class="w-12 h-12 image-fit"><img alt="Midone - HTML Admin Template"
                                                                  class="rounded-full" src="dist/images/profile-14.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium dark:text-slate-200 leading-relaxed">Kevin Spacey</div>
                                <div class="text-slate-500 dark:text-slate-400">Bootstrap 4 HTML Admin Template</div>
                            </div>
                        </div>
                    </div> <!-- END: Custom Tooltip Content -->
                </div>
                <div class="mt-3">
                    <label for="fathersname" class="form-label">Отчество</label>
                    <input id="fathersname" type="text"
                           class=" tooltip form-control" data-tooltip-content="#custom-content-tooltip"
                           data-trigger="keyup" data-theme="light"
                           placeholder="Отчество">
                    <!-- BEGIN: Custom Tooltip Content -->
                    <div class="tooltip-content">
                        <div id="custom-content-tooltip" class="relative flex items-center py-1">
                            <div class="w-12 h-12 image-fit"><img alt="Midone - HTML Admin Template"
                                                                  class="rounded-full" src="dist/images/profile-14.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium dark:text-slate-200 leading-relaxed">Kevin Spacey</div>
                                <div class="text-slate-500 dark:text-slate-400">Bootstrap 4 HTML Admin Template</div>
                            </div>
                        </div>
                    </div> <!-- END: Custom Tooltip Content -->
                </div>
                <div class="mt-3">
                    <label for="passportId" class="tooltip form-label">Серия Паспорта</label>
                    <input id="passportId" type="text" data-tooltip-content="#custom-content-tooltip"
                           data-trigger="keyup" data-theme="light"
                           class="form-control"
                           placeholder="ID/AN XXXXXX">
                    <!-- BEGIN: Custom Tooltip Content -->
                    <div class="tooltip-content">
                        <div id="custom-content-tooltip" class="relative flex items-center py-1">
                            <div class="w-12 h-12 image-fit"><img alt="Midone - HTML Admin Template"
                                                                  class="rounded-full" src="dist/images/profile-14.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <div class="font-medium dark:text-slate-200 leading-relaxed">Kevin Spacey</div>
                                <div class="text-slate-500 dark:text-slate-400">Bootstrap 4 HTML Admin Template</div>
                            </div>
                        </div>
                    </div> <!-- END: Custom Tooltip Content -->
                </div>
            </div>
        </div>

        <div class="mx-3 grid-cols-1 intro-x">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate mx-6">Квартира</div>
                    <div class="font-medium text-base truncate ml-auto">
                        <input id="aptnum" type="number" class="form-control" placeholder="№">
                    </div>
                </div>
                <div id="apt-details">
                    @include('apartments.apt-details')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $('#aptnum').keyup(function () {
            let id = $(this).val();
            $.ajax({
                url: '{{ route('contracts.apartments.search') }}',
                data: {
                    'data': id
                },
                type: 'GET',
                success: function (data) {
                    $('#apt-details').html(data);
                }
            })
        })

        function count() {
            let price = $("#aptprice").val();
            let square = $("#square").text();
            $("#apttotal").val(price * square)

        }

        $('#firstname').keyup(function () {
            let firstname = $(this).val();
            $.ajax({
                url: '{{ route('clients.search') }}',
                data: {
                    'data': [
                        ['firstname', firstname]
        ]
                },
                type: 'GET',
                success: function (data) {
                    console.log(data)
                    $('#tootipcontent').html(data);
                }
            })
        })
    </script>
@endsection
