@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium my-10">Добавление клиента</h2>
    <form class="intro-y box p-8 w-4/5" action="{{ route('clients.store') }}" method="post">
        @csrf
            <div class="mt-3">
                <label for="firstname" class="form-label">Фамилия</label>
                <input name="firstname" id="firstname" type="text"
                       class="form-control"
                       placeholder="Фамилия">
            </div>

            <div class="mt-3">
                <label for="name" class="form-label">Имя</label>
                <input name="name" id="name" type="text"
                       class="form-control"
                       placeholder="Имя">
            </div>

            <div class="mt-3">
                <label for="fathersname" class="form-label">Отчество</label>
                <input name="fathersname" id="fathersname" type="text"
                       class="form-control"
                       placeholder="Отчество">
            </div>

            <div class="mt-3">
                <div class="grid grid-cols-12 gap-2">
                    <label for="gender" class="md:col-span-2 grid form-label my-auto">Пол</label>
                    <select name="gender" id="gender"
                            class="md:col-span-2 tom-select">
                        <option value="Мужской">Мужcкой</option>
                        <option value="Женский">Женский</option>
                    </select>
                    <label for="birth" class="md:col-span-2 form-label my-auto mx-auto">Дата рождения</label>
                    <div class="relative w-56 mx-auto">
                        <div
                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                            <i data-lucide="calendar" class="w-4 h-4"></i></div>
                        <input name="birth" id="birth" type="text" class="datepicker form-control pl-12"
                               data-single-mode="true">
                    </div>
                </div>
            </div>

            <div class="mb-3 mt-3 w-full border-t border-slate-200/60 dark:border-darkmode-400 border-dashed"></div>

            <div class="mt-3">
                <div class="grid grid-cols-12 gap-2">
                    <label for="passportId" class=" md:col-span-2 form-label my-auto">Серия паспорта</label>
                    <input name="passportId" id="passportId" type="text" class="form-control col-span-4"
                           placeholder="ID/AN XXXXXX"
                           aria-label="default input inline 1">
                    <label for="pin" class="form-label my-auto mx-auto">ИНН</label>
                    <input id="pin" name="pin" type="number"
                           class="form-control col-span-5"
                           placeholder="XXXXXXXXXXXXXX"
                           aria-label="default input inline 2">
                </div>
            </div>

            <div class="mt-3">
                <div class="grid grid-cols-12 gap-2">
                    <label for="given" class=" md:col-span-2 form-label my-auto">Выдан</label>
                    <input id="given" name="given" type="text" class="form-control col-span-4"
                           placeholder="MKK XXX-XXX"
                           aria-label="default input inline 1">
                    <label for="givendate" class="form-label my-auto mx-auto">Дата выдачи</label>
                    <div class="relative w-56 mx-auto">
                        <div
                            class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                            <i data-lucide="calendar" class="w-4 h-4"></i></div>
                        <input id="givendate" name="givendate" type="text" class="datepicker form-control pl-12"
                               data-single-mode="true">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <label for="phone" class="form-label">Номер телефона</label>
                <input name="phone" id="phone" type="text"
                       class="form-control"
                       placeholder="+996(XXX) XXX-XXX">
            </div>

            <div class="mt-3">
                <label for="address" class="form-label">Адрес проживания</label>
                <input name="address" id="address" type="text"
                       class="form-control"
                       placeholder="Адрес">
            </div>


            <div class="mt-3">
                <label for="status" class="form-label">Статус</label>
                <input id="status" name="status" type="text"
                       class="form-control"
                       placeholder="Select menu">
            </div>

            <div class="mt-3">
                <label for="source" class="form-label">Источник</label>
                <input name="source" id="source" type="text"
                       class="form-control"
                       placeholder="Источник">
            </div>

        <div class="mt-3">
            <label for="e-mail" class="form-label">Электронная почта</label>
            <input name="e-mail" id="e-mail" type="text"
                   class="form-control"
                   placeholder="e-mail">
        </div>

        <button class="btn btn-secondary mt-5 w-24 mr-2" data-tw-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary w-24 text-">Submit</button>
        </form>
        </div>
@endsection
