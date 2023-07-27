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
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative border-2 rounded-full overflow-hidden">
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
        <div class="grid grid-cols-1 justify-center h-10">
            <span class="text-center font-medium justify-center my-auto text-slate-500">No Contracts yet</span>
        </div>
        {{--<ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist">
            <li id="dashboard-tab" class="nav-item" role="presentation"><a href="javascript:;"
                                                                           class="nav-link py-4 active"
                                                                           data-tw-target="#dashboard"
                                                                           aria-controls="dashboard"
                                                                           aria-selected="true" role="tab">
                    Dashboard </a></li>
            <li id="account-and-profile-tab" class="nav-item" role="presentation"><a href="javascript:;"
                                                                                     class="nav-link py-4"
                                                                                     data-tw-target="#account-and-profile"
                                                                                     aria-selected="false" role="tab">
                    Account &amp; Profile </a></li>
            <li id="activities-tab" class="nav-item" role="presentation"><a href="javascript:;" class="nav-link py-4"
                                                                            data-tw-target="#activities"
                                                                            aria-selected="false" role="tab">
                    Activities </a></li>
            <li id="tasks-tab" class="nav-item" role="presentation"><a href="javascript:;" class="nav-link py-4"
                                                                       data-tw-target="#tasks" aria-selected="false"
                                                                       role="tab"> Tasks </a></li>
        </ul>--}}
    </div>

@endsection
