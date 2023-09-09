@extends('admin')

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center p-10">
        <h2 class="text-lg font-medium mr-auto">О компании</h2>
    </div>

    <form class="form-control" action="{{ asset('/test/store') }}">
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Информация о компании
                </h2>
            </div>
            <div class="p-5">
                <div class="flex flex-col-reverse xl:flex-row flex-col">
                    <div class="flex-1 mt-6 xl:mt-0">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 2xl:col-span-6">
                                <div>
                                    <label for="title" class="form-label">Жилой комплекс</label>
                                    <input id="title" name="title" type="text" class="form-control" placeholder="Business House KG">
                                </div>
                                <div class="mt-3">
                                    <label for="address" class="form-label" id="update-profile-form-2-ts-label">Адрес</label>
                                    <input id="address" name="address" type="text" class="form-control" placeholder="г. Ош, ул. К. Датка 584">
                                </div>
                            </div>
                            <div class="col-span-12 2xl:col-span-6">
                                <div class="mt-3 2xl:mt-0">
                                    <label for="deadline" class="form-label" id="update-profile-form-3-ts-label">Срок сдачи</label>
                                    <input id="deadline" name="deadline" type="number" class="form-control" placeholder="36">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                        <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                <img class="rounded-md" alt="Midone - HTML Admin Template" src="dist/images/profile-10.jpg">
                                <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </div>
                            </div>
                            <div class="mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                <input type="file" name="image" class="w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
                        </div>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary w-20 mt-3">Сохранить</button>
            </div>

        </div>
    </form>
@endsection
