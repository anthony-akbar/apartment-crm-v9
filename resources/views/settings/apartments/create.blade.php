@extends('admin')

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center p-10">
        <h2 class="text-lg font-medium mr-auto">Добавление квартир</h2>
    </div>

    <form action="{{ route('test.store') }}" method="POST">
        @csrf

        <div class=" intro-y m-3 p-5" id="fields">
            <div>
                <div class="inline-block box mx-3 px-3 pb-3 w-2/4">
                    <div class="intro-y flex flex-col sm:flex-row items-center p-5">
                        <h2 class="text-lg font-medium mr-auto">Квартиры</h2>
                        <input type="text" class="form-control w-24 px-3" placeholder="Этаж">
                        <button id="addButton" type="button" class=" mx-3 btn btn-primary">+</button>
                    </div>

                    <div id="fieldsApartment">
                        <div class="grid grid-cols-3">
                            <div class="grid-cols-1 px-3 form-inline">
                                <label for="rooms" class="form-label">Комнаты</label>
                                <input id="rooms" name="rooms[]" type="number" class="form-control"
                                       placeholder="Комнаты">
                            </div>
                            <div class="grid-cols-1 px-3 form-inline">
                                <label for="block" class="form-label">Блок</label>
                                <input id="block" name="block[]" type="text" class="form-control" placeholder="Блок">
                            </div>
                            <div class="grid-cols-1 px-3 form-inline">
                                <label for="square" class="form-label">Площадь</label>
                                <input id="square" name="square[]" type="text" class="form-control"
                                       placeholder="Площадь">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="inline-block box mx-3 pb-3 px-3 mt-auto">
                    <div class="intro-y flex flex-col sm:flex-row items-center p-5">
                        <h2 class="text-lg font-medium mr-auto">Цены</h2>
                        <button id="addPrice" type="button" class="btn btn-primary">+</button>
                    </div>
                    <div id="priceFields">
                        <div class="grid grid-cols-3">

                            <div class="grid-cols-1">
                                <label for="rooms" class="form-label">Комнаты</label>
                                <input id="rooms" name="rooms[]" type="number" class="form-control"
                                       placeholder="Комнаты">
                            </div>

                            <div class="grid-cols-1">
                                <label for="rooms" class="form-label">Комнаты</label>
                                <input id="rooms" name="rooms[]" type="number" class="form-control"
                                       placeholder="Комнаты">
                            </div>

                            <div class="grid-cols-1">
                                <label for="rooms" class="form-label">Комнаты</label>
                                <input id="rooms" name="rooms[]" type="number" class="form-control"
                                       placeholder="Комнаты">
                            </div>

                        </div>
                    </div>


                </div>


            </div>


            {{--<div class="col col-lg-2">

                <div class="col-10 box">
                    <div class="grid grid-cols-3">
                        <div class="grid-cols-1 px-3 form-inline">
                            <label for="rooms" class="form-label">Комнаты</label>
                            <input id="rooms" name="rooms[]" type="number" class="form-control" placeholder="Комнаты">
                        </div>
                        <div class="grid-cols-1 px-3 form-inline">
                            <label for="block" class="form-label">Блок</label>
                            <input id="block" name="block[]" type="text" class="form-control" placeholder="Блок">
                        </div>
                        <div class="grid-cols-1 px-3 form-inline">
                            <label for="square" class="form-label">Площадь</label>
                            <input id="square" name="square[]" type="text" class="form-control" placeholder="Площадь">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="grid-cols-1 px-3 form-inline">
                        <label for="rooms" class="form-label">Комнаты</label>
                        <input id="rooms" name="rooms[]" type="number" class="form-control" placeholder="Комнаты">
                    </div>
                    <div class="grid-cols-1 px-3 form-inline">
                        <label for="block" class="form-label">Блок</label>
                        <input id="block" name="block[]" type="text" class="form-control" placeholder="Блок">
                    </div>
                </div>


            </div>!--}}


        </div>

        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5 intro-y">
            <button id="addButton" type="button"
                    class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Добавить
                запись
            </button>
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Сохранить</button>
        </div>
    </form>

@endsection

@section('script')
    <script>

        function addFields() {
            $('#fieldsApartment').append(`
            <div class="grid grid-cols-3 mt-3">
                <div class="grid-cols-1 px-3 form-inline">
                    <label for="rooms" class="form-label">Комнаты</label>
                    <input id="rooms" name="rooms[]" type="number" class="form-control" placeholder="Комнаты">
                </div>
                <div class="grid-cols-1 px-3 form-inline">
                    <label for="block" class="form-label">Блок</label>
                    <input id="block" name="block[]" type="text" class="form-control" placeholder="Блок">
                </div>
                <div class="grid-cols-1 px-3 form-inline">
                    <label for="square" class="form-label">Площадь</label>
                    <input id="square" name="square[]" type="text" class="form-control" placeholder="Площадь">
                </div>
            </div>
            `)
        }

        $('#addButton').click(addFields)

        function addPriceFields() {
            $('#priceFields').append(`
            <div class="grid grid-cols-3">

                            <div class="grid-cols-1">
                                <label for="rooms" class="form-label">Комнаты</label>
                                <input id="rooms" name="rooms[]" type="number" class="form-control"
                                       placeholder="Комнаты">
                            </div>

                            <div class="grid-cols-1">
                                <label for="rooms" class="form-label">Комнаты</label>
                                <input id="rooms" name="rooms[]" type="number" class="form-control"
                                       placeholder="Комнаты">
                            </div>

                            <div class="grid-cols-1">
                                <label for="rooms" class="form-label">Комнаты</label>
                                <input id="rooms" name="rooms[]" type="number" class="form-control"
                                       placeholder="Комнаты">
                            </div>

                        </div>
            `)
        }

        $('#addPrice').click(addPriceFields)

    </script>
@endsection
