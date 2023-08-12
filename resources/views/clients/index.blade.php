@extends('admin')

@section('content')

    <h2 class="intro-y text-lg font-medium mt-10">Клиенты</h2>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{ route('clients.create') }}" class="btn btn-primary shadow-md mr-2">Добавить клиента</a>
        <div class="dropdown">
            <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                <span class="w-5 h-5 flex items-center justify-center">
                <i data-lucide="plus"></i>
                </span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="" class="dropdown-item">
                            <i class="px-1" data-lucide="printer"></i> Print </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <i class="px-1" data-lucide="file-text"></i>
                            Export to Excel </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">
                            <i class="px-1" data-lucide="file-text"></i>
                            Export to PDF </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="hidden md:block mx-auto text-slate-500">Клиенты {{ $clients->count() }} из {{ $clients->count() }}</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Поиск...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        @include('clients.table')
    </div>

@endsection
