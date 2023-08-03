@extends('admin')

@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            {{ $client->firstname }} {{ $client->name }} {{ $client->fathersname ?? '' }}
        </h2>
    </div>

    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div
                    class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative border-2 rounded-full overflow-hidden">
                    <i class="w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 " data-lucide="user"></i>
                </div>
                <div class="ml-5">
                    <div
                        class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ $client->firstname }} {{ $client->name }} {{ $client->fathersname ?? '' }}</div>
                    <div class="text-slate-500">{{ $client->passportId }}</div>
                </div>
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <i class="p-1" data-lucide="phone"></i>
                        {{ $client->phone }}
                    </div>
                    @if($client->email)
                        <div class="truncate sm:whitespace-normal flex items-center mt-3">
                            <i class="p-1" data-lucide="mail"></i>
                            {{ $client->email }}
                        </div>
                    @endif
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <i class="p-1" data-lucide="hash"></i>
                        {{ $client->pin }}
                    </div>
                </div>
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-5">Sales Growth</div>
                <div class="flex items-center justify-center lg:justify-start mt-2">
                    <div class="mr-2 w-20 flex"> USP: <span class="ml-3 font-medium text-success">+23%</span></div>
                    <div class="w-3/4">
                        <div class="h-[55px]">
                            <canvas class="simple-line-chart-1 -mr-5" width="824" height="82"
                                    style="display: block; box-sizing: border-box; height: 54.6667px; width: 549.333px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center lg:justify-start">
                    <div class="mr-2 w-20 flex"> STP: <span class="ml-3 font-medium text-danger">-2%</span></div>
                    <div class="w-3/4">
                        <div class="h-[55px]">
                            <canvas class="simple-line-chart-2 -mr-5" width="824" height="82"
                                    style="display: block; box-sizing: border-box; height: 54.6667px; width: 549.333px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($client->contracts->count() === 0)

            <div class="grid grid-cols-1 justify-center h-10">
                <span class="text-center font-medium justify-center my-auto text-slate-500">No Contracts yet</span>
            </div>
        @else
            <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center"
                role="tablist">

                @foreach($client->contracts as $key => $contract)
                    <li id="contract-{{$contract->id}}-tab" class="nav-item" role="presentation">
                        <a href="javascript:;"
                           class="nav-link py-4 "
                           data-tw-target="#contract-{{$contract->id}}"
                           aria-controls="contract-{{$contract->id}}"
                           aria-selected="true" role="tab">
                            Договор №{{$contract->id}} </a>
                    </li>
                @endforeach
                    @endif
                {{--
                <li id="dashboard-tab" class="nav-item" role="presentation"><a href="javascript:;"
                                                                               class="nav-link py-4 active"
                                                                               data-tw-target="#dashboard"
                                                                               aria-controls="dashboard"
                                                                               aria-selected="true" role="tab">
                        Dashboard </a></li>
                <li id="account-and-profile-tab" class="nav-item" role="presentation"><a href="javascript:;"
                                                                                         class="nav-link py-4"
                                                                                         data-tw-target="#account-and-profile"
                                                                                         aria-selected="false"
                                                                                         role="tab">
                        Account &amp; Profile </a></li>
                <li id="activities-tab" class="nav-item" role="presentation"><a href="javascript:;"
                                                                                class="nav-link py-4"
                                                                                data-tw-target="#activities"
                                                                                aria-selected="false" role="tab">
                        Activities </a></li>
                <li id="tasks-tab" class="nav-item" role="presentation"><a href="javascript:;" class="nav-link py-4"
                                                                           data-tw-target="#tasks" aria-selected="false"
                                                                           role="tab"> Tasks </a></li>--}}
            </ul>
    </div>
    <div class="intro-y tab-content mt-5">
        @foreach($client->contracts as $key => $contract)
        <div id="contract-{{$contract->id}}" class="tab-pane {{ $key === 0 ? 'active' : '' }}" role="tabpanel" aria-labelledby="contract-{{$contract->id}}-tab">

            <div class="grid grid-cols-2">
                <div class="grid-cols-1 mx-3">
                    <div class="report-box-2 intro-y">
                        <div class="box sm:flex">
                            <div class="px-8 py-12 flex flex-col justify-center flex-1">
                            <IMG src="{{ asset("plan.jpg") }}">
                            </div>
                            <div class="px-8 py-12 flex flex-col justify-center flex-1 border-t sm:border-t-0 sm:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                                <div class="relative text-3xl font-medium mb-3">№{{ $contract->apartment->number }}</div>

                                <div class="text-slate-500 text-xs">ПЛОЩАДЬ</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">{{ $contract->apartment->square }} м²</div>
                                </div>
                                <div class="text-slate-500 text-xs mt-5">ПЛАНИРОВКА КВАРТИРЫ</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">{{ $contract->apartment->rooms }} комнат{{ $contract->apartment->rooms === 1 ? 'а' : '' }}</div>
                                </div>
                                <div class="text-slate-500 text-xs mt-5">ЭТАЖ</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">{{ $contract->apartment->floor }}</div>
                                </div>
                                <div class="text-slate-500 text-xs mt-5">БЛОК</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">{{ $contract->apartment->block ?? '' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid-cols-1 mx-3">
                    <div class="intro-y box col-span-12 lg:col-span-6">
                        <div class="flex items-center px-5 py-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Рассрочка
                            </h2>
                            <div class="dropdown ml-auto sm:hidden">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="more-horizontal" data-lucide="more-horizontal" class="lucide lucide-more-horizontal w-5 h-5 text-slate-500"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg> </a>
                                <div class="nav nav-tabs dropdown-menu w-40" role="tablist">
                                    <ul class="dropdown-content">
                                        <li> <a id="latest-tasks-mobile-new-tab" href="javascript:;" data-tw-toggle="tab" data-tw-target="#latest-tasks-new" class="dropdown-item" role="tab" aria-controls="latest-tasks-new" aria-selected="true">New</a> </li>
                                        <li> <a id="latest-tasks-mobile-last-week-tab" href="javascript:;" data-tw-toggle="tab" data-tw-target="#latest-tasks-last-week" class="dropdown-item" role="tab" aria-selected="false">Last Week</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="nav nav-link-tabs w-auto ml-auto hidden sm:flex" role="tablist">
                                <li id="latest-tasks-new-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-5 active" data-tw-target="#latest-tasks-new" aria-controls="latest-tasks-new" aria-selected="true" role="tab"> New </a> </li>
                                <li id="latest-tasks-last-week-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-5" data-tw-target="#latest-tasks-last-week" aria-selected="false" role="tab"> Last Week </a> </li>
                            </ul>
                        </div>
                        <div class="p-5">
                            <div class="tab-content">
                                <div id="latest-tasks-new" class="tab-pane active" role="tabpanel" aria-labelledby="latest-tasks-new-tab">
                                    <div class="flex items-center">
                                        <div class="border-l-2 border-primary dark:border-primary pl-4">
                                            <a href="" class="font-medium">Create New Campaign</a>
                                            <div class="text-slate-500">10:00 AM</div>
                                        </div>
                                        <div class="form-check form-switch ml-auto">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </div>
                                    <div class="flex items-center mt-5">
                                        <div class="border-l-2 border-primary dark:border-primary pl-4">
                                            <a href="" class="font-medium">Meeting With Client</a>
                                            <div class="text-slate-500">02:00 PM</div>
                                        </div>
                                        <div class="form-check form-switch ml-auto">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </div>
                                    <div class="flex items-center mt-5">
                                        <div class="border-l-2 border-primary dark:border-primary pl-4">
                                            <a href="" class="font-medium">Create New Repository</a>
                                            <div class="text-slate-500">04:00 PM</div>
                                        </div>
                                        <div class="form-check form-switch ml-auto">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            @endforeach
    </div>


@endsection
