@extends('admin')

@section('content')
    <h2 class="text-lg font-medium truncate my-10 mr-5">
        General Report
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="shopping-cart" data-lucide="shopping-cart"
                             class="lucide lucide-shopping-cart report-box__icon text-primary">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path>
                        </svg>
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success tooltip cursor-pointer"> 33%
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up"
                                     class="lucide lucide-chevron-up w-4 h-4 ml-0.5">
                                    <polyline points="18 15 12 9 6 15"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                    <div class="text-base text-slate-500 mt-1">Item Sales</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="credit-card" data-lucide="credit-card"
                             class="lucide lucide-credit-card report-box__icon text-pending">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-danger tooltip cursor-pointer"> 2%
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down"
                                     class="lucide lucide-chevron-down w-4 h-4 ml-0.5">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">3.721</div>
                    <div class="text-base text-slate-500 mt-1">New Orders</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="monitor" data-lucide="monitor"
                             class="lucide lucide-monitor report-box__icon text-warning">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success tooltip cursor-pointer"> 12%
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up"
                                     class="lucide lucide-chevron-up w-4 h-4 ml-0.5">
                                    <polyline points="18 15 12 9 6 15"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">2.149</div>
                    <div class="text-base text-slate-500 mt-1">Total Products</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="user" data-lucide="user"
                             class="lucide lucide-user report-box__icon text-success">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-success tooltip cursor-pointer"> 22%
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up"
                                     class="lucide lucide-chevron-up w-4 h-4 ml-0.5">
                                    <polyline points="18 15 12 9 6 15"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="text-3xl font-medium leading-8 mt-6">152.040</div>
                    <div class="text-base text-slate-500 mt-1">Unique Visitor</div>
                </div>
            </div>
        </div>
    </div>


    <div class="grid grid-cols-2 mt-5 intro-y h-[400px] overflow-hidden ">
        <div class="box p-5 rounded-md grid-cols-1 mx-3">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                <div class="font-medium text-base truncate">Рассрочки в эту неделю</div>
            </div>

            <div class="overflow-auto lg:overflow-visible">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="whitespace-nowrap">ФИО</th>
                        <th class="whitespace-nowrap text-right">Дата</th>
                        <th class="whitespace-nowrap text-right">Сумма</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($schedules as $schedule)
                        <tr>
                            <td class="!py-4">
                                {{ $schedule->contract->client->firstname }} {{ $schedule->contract->client->name }}
                            </td>
                            <td class="text-right">{{ $schedule->date_of_payment }}</td>
                            <td class="text-right">{{ $schedule->amount }}  {{ $schedule->contract->currency }}</td>
                            <td class="text-right">{{ $schedule->status }}</td>
                        </tr>

                    @endforeach

                    <tr>
                        <td class="!py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone - HTML Admin Template" class="rounded-lg border-2 border-white shadow-md tooltip" src="dist/images/preview-2.jpg">
                                </div>
                                <a href="" class="font-medium whitespace-nowrap ml-4">Nike Tanjun</a>
                            </div>
                        </td>
                        <td class="text-right">$25,000.00</td>
                        <td class="text-right">2</td>
                        <td class="text-right">$50,000.00</td>
                    </tr>
                    <tr>
                        <td class="!py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone - HTML Admin Template" class="rounded-lg border-2 border-white shadow-md tooltip" src="dist/images/preview-9.jpg">
                                </div>
                                <a href="" class="font-medium whitespace-nowrap ml-4">Nike Tanjun</a>
                            </div>
                        </td>
                        <td class="text-right">$69,000.00</td>
                        <td class="text-right">2</td>
                        <td class="text-right">$138,000.00</td>
                    </tr>
                    <tr>
                        <td class="!py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone - HTML Admin Template" class="rounded-lg border-2 border-white shadow-md tooltip" src="dist/images/preview-7.jpg">
                                </div>
                                <a href="" class="font-medium whitespace-nowrap ml-4">Oppo Find X2 Pro</a>
                            </div>
                        </td>
                        <td class="text-right">$20,000.00</td>
                        <td class="text-right">2</td>
                        <td class="text-right">$40,000.00</td>
                    </tr>
                    <tr>
                        <td class="!py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone - HTML Admin Template" class="rounded-lg border-2 border-white shadow-md tooltip" src="dist/images/preview-2.jpg">
                                </div>
                                <a href="" class="font-medium whitespace-nowrap ml-4">Sony Master Series A9G</a>
                            </div>
                        </td>
                        <td class="text-right">$51,000.00</td>
                        <td class="text-right">2</td>
                        <td class="text-right">$102,000.00</td>
                    </tr>
                    <tr>
                        <td class="!py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone - HTML Admin Template" class="rounded-lg border-2 border-white shadow-md tooltip" src="dist/images/preview-8.jpg">
                                </div>
                                <a href="" class="font-medium whitespace-nowrap ml-4">Apple MacBook Pro 13</a>
                            </div>
                        </td>
                        <td class="text-right">$115,000.00</td>
                        <td class="text-right">2</td>
                        <td class="text-right">$230,000.00</td>
                    </tr>
                    <tr>
                        <td class="!py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone - HTML Admin Template" class="rounded-lg border-2 border-white shadow-md tooltip" src="dist/images/preview-10.jpg">
                                </div>
                                <a href="" class="font-medium whitespace-nowrap ml-4">Dell XPS 13</a>
                            </div>
                        </td>
                        <td class="text-right">$87,000.00</td>
                        <td class="text-right">2</td>
                        <td class="text-right">$174,000.00</td>
                    </tr>
                    <tr>
                        <td class="!py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone - HTML Admin Template" class="rounded-lg border-2 border-white shadow-md tooltip" src="dist/images/preview-1.jpg">
                                </div>
                                <a href="" class="font-medium whitespace-nowrap ml-4">Apple MacBook Pro 13</a>
                            </div>
                        </td>
                        <td class="text-right">$45,000.00</td>
                        <td class="text-right">2</td>
                        <td class="text-right">$90,000.00</td>
                    </tr>
                    <tr>
                        <td class="!py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone - HTML Admin Template" class="rounded-lg border-2 border-white shadow-md tooltip" src="dist/images/preview-11.jpg">
                                </div>
                                <a href="" class="font-medium whitespace-nowrap ml-4">Nike Tanjun</a>
                            </div>
                        </td>
                        <td class="text-right">$41,000.00</td>
                        <td class="text-right">2</td>
                        <td class="text-right">$82,000.00</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>



@endsection
