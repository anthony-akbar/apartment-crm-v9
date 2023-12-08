<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        <ul class="scrollable__content py-2">
            <li class="side-nav__devider my-6"></li>
            <li>
                <a href="{{ route('home') }}" class="menu menu{{ request()->is("/") ? "--active" : "" }}">
                    <div class="menu__icon">
                        <i data-lucide="home"></i>
                    </div>
                    <div class="menu__title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="javascript:;.html"
                   class="menu {{ request()->is("commercial") || request()->is('/commercial/*') ||
                                    request()->is("apartments") || request()->is('/apartments/*') ||
                                    request()->is("parking") || request()->is('/parking/*') ? "menu--active" : "" }}">
                    <div class="menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             icon-name="home" data-lucide="home" class="lucide lucide-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <div class="menu__title">
                        Объекты
                        <div class="menu__sub-icon {{ request()->is("commercial") || request()->is('/commercial/*') ||
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
                                    request()->is("parking") || request()->is('/parking/*') ? "menu__sub-open" : "" }}">
                    <li>
                        <a href="{{ route('apartments') }}"
                           class="menu menu{{ request()->is("apartments") || request()->is('/apartments/*') ? "--active" : "" }}">
                            <div class="menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                            <div class="menu__title"> Квартиры</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('parking') }}"
                           class="menu menu{{ request()->is("parking") || request()->is('/parking/*') ? "--active" : "" }}">
                            <div class="menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                            <div class="menu__title">Парковка</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('commercial.index') }}"
                           class="menu menu{{ request()->is("commercial") || request()->is('/commercial/*') ? "--active" : "" }}">
                            <div class="menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                            <div class="menu__title">Коммерческий</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;.html"
                   class="menu {{ request()->is("booking") || request()->is('booking/*') ? "menu--active" : "" }}">
                    <div class="menu__icon">
                        <i data-lucide="tag"></i>
                    </div>
                    <div class="menu__title">
                        Брони
                        <div class="menu__sub-icon {{ request()->is("booking") || request()->is('booking/*') ? "transform rotate-180" : "" }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
                <ul class="{{ request()->is("booking") || request()->is('booking/*') ? "menu__sub-open" : "" }}">
                    <li>
                        <a href="{{ route('bookings.apartments') }}"
                           class="menu menu{{ request()->is("booking/apartments") || request()->is('booking/apartments/*') ? "--active" : "" }}">
                            <div class="menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                            <div class="menu__title"> Квартиры</div>
                        </a>
                    </li>
                    <li>
                        <a href=""
                           class="menu menu{{ request()->is("booking/parking") || request()->is('booking/parking/*') ? "--active" : "" }}">
                            <div class="menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                            <div class="menu__title">Парковка</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('booking.commercial') }}"
                           class="menu menu{{ request()->is("booking/commercial") || request()->is('booking/commercial/*') ? "--active" : "" }}">
                            <div class="menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                            <div class="menu__title">Коммерческий</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;.html"
                   class="menu {{ request()->is("contracts") || request()->is('contracts/*')  ? "menu--active" : "" }}">
                    <div class="menu__icon">
                        <i data-lucide="clipboard"></i>
                    </div>
                    <div class="menu__title">
                        Договора
                        <div class="menu__sub-icon {{ request()->is("contracts") || request()->is('contracts/*') ? "transform rotate-180" : "" }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                </a>
                <ul class="{{ request()->is("contracts") || request()->is('contracts/*')  ? "menu__sub-open" : "" }}">
                    <li>
                        <a href="{{ route('contracts.apartments') }}"
                           class="menu menu{{ request()->is("contracts/apartments") || request()->is('contracts/apartments/*') ? "--active" : "" }}">
                            <div class="menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                            <div class="menu__title"> Квартиры</div>
                        </a>
                    </li>
                    <li>
                        <a href="menu-light-dashboard-overview-2.html"
                           class="menu menu{{ request()->is("parking") || request()->is('/parking/*') ? "--active" : "" }}">
                            <div class="menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                            <div class="menu__title"> Парковка</div>
                        </a>
                    </li>
                    <li>
                        <a href="menu-light-dashboard-overview-3.html"
                           class="menu menu{{ request()->is("commercial") || request()->is('/commercial/*') ? "--active" : "" }}">
                            <div class="menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" icon-name="activity" data-lucide="activity"
                                     class="lucide lucide-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                            <div class="menu__title">Коммерческий</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('dairy') }}" class="menu menu{{ request()->is("dairy") ? "--active" : "" }}">
                    <div class="menu__icon"><i data-lucide="edit"></i></div>
                    <div class="menu__title">Отчеты</div>
                </a>
            </li>
            <li>
                <a href="{{ route('auto') }}" class="menu menu{{ request()->is("dairy") ? "--active" : "" }}">
                    <div class="menu__icon"><i data-lucide="edit"></i></div>
                    <div class="menu__title">Авто</div>
                </a>
            </li>
            <li>
                <a href="{{ route('clients') }}"
                   class="menu menu{{ request()->is("clients") ? "--active" : "" }}">
                    <div class="menu__icon"><i data-lucide="users"></i></div>
                    <div class="menu__title">Клиенты</div>
                </a>
            </li>
            <li>
                <a href="{{ route('safe.index') }}"
                   class="menu menu{{ request()->is("safe") ? "--active" : "" }}">
                    <div class="menu__icon"><i data-lucide="inbox"></i></div>
                    <div class="menu__title">Сейф</div>
                </a>
            </li>
            <li>
                <a href="{{ route('articles.index') }}"
                   class="menu menu{{ request()->is("articles") || request()->is("articles/*") ? "--active" : "" }}">
                    <div class="menu__icon"><i data-lucide=""></i></div>
                    <div class="menu__title">Статьи</div>
                </a>
            </li>
            <li>
                <a href="{{ route('payments') }}"
                   class="menu menu{{ request()->is("payments") || request()->is("payments/*") ? "--active" : "" }}">
                    <div class="menu__icon"><i data-lucide="dollar-sign"></i></div>
                    <div class="menu__title">Оплаты</div>
                </a>
            </li>
            <li>
                <a href="{{ route('report.dashboard') }}"
                   class="menu menu{{ request()->is("report") || request()->is("report/*") ? "--active" : "" }}">
                    <div class="menu__icon"><i data-lucide="dollar-sign"></i></div>
                    <div class="menu__title">Отчеты</div>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Mobile Menu -->
