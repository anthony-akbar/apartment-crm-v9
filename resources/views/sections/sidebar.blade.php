<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <ul>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="" class="side-menu side-menu{{ request()->is("/") ? "--active" : "" }}">
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
        {{--<li>
            <a href="side-menu-light-inbox.html" class="side-menu">
                <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
                <div class="side-menu__title"> Clients</div>
            </a>
        </li>--}}

    </ul>
</nav>
<!-- END: Side Menu -->
