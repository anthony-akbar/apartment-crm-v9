@extends('layouts.app')

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Logo" class="w-10" src="{{asset('individual/main-white-cut.png')}}">
                    <span class="text-white text-lg ml-3">Business House KG</span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                         src="{{asset('individual/main-white.png')}}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Высокая связь с городом
                    </div>
                </div>
            </div>
            <!-- END: Register Info -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Регистраия
                    </h2>
                    <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">
                        Зарегистрируйтесть чтобы войти в панель управления
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="intro-x mt-8">
                            <input type="text" name="name" class="intro-x login__input form-control py-3 px-4 block"
                                   placeholder="Полное имя" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <input type="email" name="email"
                                   class="intro-x login__input form-control py-3 px-4 block mt-4"
                                   placeholder="Электронная почта" required autocomplete="new-email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <input type="password" name="password"
                                   class="intro-x login__input form-control py-3 px-4 block mt-4"
                                   placeholder="Пароль" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <input type="password" name="password_confirmation" required autocomplete="new-password" class="intro-x login__input form-control py-3 px-4 block mt-4"
                                   placeholder="Подтвердите пароль">
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Регистрация</button>
                            <a href="{{route('login')}}"
                               class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">
                                Войти
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Register Form -->
        </div>
    </div>

@endsection
