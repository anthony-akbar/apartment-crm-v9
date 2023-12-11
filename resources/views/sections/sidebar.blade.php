<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <ul>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="{{ route('home') }}" class="side-menu side-menu{{ request()->is("/") ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="home"></i>
                </div>
                <div class="side-menu__title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;.html"
               class="side-menu {{ request()->is("commercial") || request()->is('/commercial/*') ||
                                    request()->is("apartments") || request()->is('/apartments/*') ||
                                    request()->is("parking") || request()->is('/parking/*') ? "side-menu--active" : "" }}">
                <div class="side-menu__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         icon-name="home" data-lucide="home" class="lucide lucide-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                </div>
                <div class="side-menu__title">
                    Объекты
                    <div class="side-menu__sub-icon {{ request()->is("commercial") || request()->is('/commercial/*') ||
                                    request()->is("apartments") || request()->is('/apartments/*') ||
                                    request()->is("parking") || request()->is('/parking/*') ? "transform rotate-180" : "" }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </a>
            <ul class="{{ request()->is("commercial") || request()->is('/commercial/*') ||
                                    request()->is("apartments") || request()->is('/apartments/*') ||
                                    request()->is("parking") || request()->is('/parking/*') ? "side-menu__sub-open" : "" }}">
                <li>
                    <a href="{{ route('apartments') }}"
                       class="side-menu side-menu{{ request()->is("apartments") || request()->is('/apartments/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title"> Квартиры</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('parking') }}"
                       class="side-menu side-menu{{ request()->is("parking") || request()->is('/parking/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Парковка</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('commercial.index') }}"
                       class="side-menu side-menu{{ request()->is("commercial") || request()->is('/commercial/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Коммерческий</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;.html"
               class="side-menu {{ request()->is("booking") || request()->is('booking/*') ? "side-menu--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="tag"></i>
                </div>
                <div class="side-menu__title">
                    Брони
                    <div class="side-menu__sub-icon {{ request()->is("booking") || request()->is('booking/*') ? "transform rotate-180" : "" }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </a>
            <ul class="{{ request()->is("booking") || request()->is('booking/*') ? "side-menu__sub-open" : "" }}">
                <li>
                    <a href="{{ route('bookings.apartments') }}"
                       class="side-menu side-menu{{ request()->is("booking/apartments") || request()->is('booking/apartments/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title"> Квартиры</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('booking.parking') }}"
                       class="side-menu side-menu{{ request()->is("booking/parkings") || request()->is('booking/parkings/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Парковка</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('booking.commercial') }}"
                       class="side-menu side-menu{{ request()->is("booking/commercial") || request()->is('booking/commercial/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Коммерческий</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;.html"
               class="side-menu {{ request()->is("contracts") || request()->is('contracts/*')  ? "side-menu--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="clipboard"></i>
                </div>
                <div class="side-menu__title">
                    Договора
                    <div class="side-menu__sub-icon {{ request()->is("contracts") || request()->is('contracts/*') ? "transform rotate-180" : "" }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </a>
            <ul class="{{ request()->is("contracts") || request()->is('contracts/*')  ? "side-menu__sub-open" : "" }}">
                <li>
                    <a href="{{ route('contracts.apartments') }}"
                       class="side-menu side-menu{{ request()->is("contracts/apartments") || request()->is('contracts/apartments/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title"> Квартиры</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-2.html"
                       class="side-menu side-menu{{ request()->is("parking") || request()->is('/parking/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title"> Парковка</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-3.html"
                       class="side-menu side-menu{{ request()->is("commercial") || request()->is('/commercial/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Коммерческий</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('dairy') }}" class="side-menu side-menu{{ request()->is("dairy") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="edit"></i></div>
                <div class="side-menu__title">Отчеты</div>
            </a>
        </li>
        <li>
            <a href="{{ route('auto') }}" class="side-menu side-menu{{ request()->is("auto") ? "--active" : "" }}">
                <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-car-front"><path d="m21 8-2 2-1.5-3.7A2 2 0 0 0 15.646 5H8.4a2 2 0 0 0-1.903 1.257L5 10 3 8"/><path d="M7 14h.01"/><path d="M17 14h.01"/><rect width="18" height="8" x="3" y="10" rx="2"/><path d="M5 18v2"/><path d="M19 18v2"/></svg></div>
                <div class="side-menu__title">Авто</div>
            </a>
        </li>
        <li>
            <a href="{{ route('clients') }}"
               class="side-menu side-menu{{ request()->is("clients") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="users"></i></div>
                <div class="side-menu__title">Клиенты</div>
            </a>
        </li>
        <li>
            <a href="{{ route('safe.index') }}"
               class="side-menu side-menu{{ request()->is("safe") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
                <div class="side-menu__title">Сейф</div>
            </a>
        </li>
        <li>
            <a href="{{ route('articles.index') }}"
               class="side-menu side-menu{{ request()->is("articles") || request()->is("articles/*") ? "--active" : "" }}">
                <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-receipt"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1-2-1Z"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 17V7"/></svg></div>
                <div class="side-menu__title">Статьи</div>
            </a>
        </li>
        <li>
            <a href="{{ route('payments') }}"
               class="side-menu side-menu{{ request()->is("payments") || request()->is("payments/*") ? "--active" : "" }}">
                <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-coins"><circle cx="8" cy="8" r="6"/><path d="M18.09 10.37A6 6 0 1 1 10.34 18"/><path d="M7 6h1v4"/><path d="m16.71 13.88.7.71-2.82 2.82"/></svg></div>
                <div class="side-menu__title">Оплаты</div>
            </a>
        </li>
        <li>
            <a href="{{ route('report.dashboard') }}"
               class="side-menu side-menu{{ request()->is("report") || request()->is("report/*") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="dollar-sign"></i></div>
                <div class="side-menu__title">Отчеты</div>
            </a>
        </li>
        @can('view', auth()->user())
        <li>
            <a href="javascript:;.html"
               class="side-menu {{ request()->is("settings") || request()->is('settings/*')  ? "side-menu--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="align-justify"></i>
                </div>
                <div class="side-menu__title">
                    Настройки
                    <div class="side-menu__sub-icon {{ request()->is("settings") || request()->is('settings/*') ? "transform rotate-180" : "" }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </a>
            <ul class="{{ request()->is("settings") || request()->is('settings/*')  ? "side-menu__sub-open" : "" }}">
                <li>
                    <a href="{{ route('settings.apartments.create') }}"
                       class="side-menu side-menu{{ request()->is("settings/apartments") || request()->is('settings/apartments/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Квартиры</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-2.html"
                       class="side-menu side-menu{{ request()->is("parking") || request()->is('/parking/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title"> Парковка</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-3.html"
                       class="side-menu side-menu{{ request()->is("commercial") || request()->is('/commercial/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Коммерческий</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.files') }}"
                       class="side-menu side-menu{{ request()->is("commercial") || request()->is('/commercial/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Файлы</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.files') }}"
                       class="side-menu side-menu{{ request()->is("commercial") || request()->is('/commercial/*') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Пользователь</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.info') }}"
                       class="side-menu side-menu{{ request()->is("settings") || request()->is('/settings/info') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">О компании</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.report') }}"
                       class="side-menu side-menu{{ request()->is("settings") || request()->is('/settings/report') ? "--active" : "" }}">
                        <div class="side-menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                 class="lucide lucide-activity">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="side-menu__title">Отчёты</div>
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        {{--<li>
            <a href="side-menu-light-inbox.html" class="side-menu">
                <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
                <div class="side-menu__title"> Clients</div>
            </a>
        </li>--}}

    </ul>
</nav>
<!-- END: Side Menu -->
