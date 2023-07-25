<!-- BEGIN: Modal Toggle -->
<div class="text-center">
    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new"
       class="btn btn-primary">Подочет</a>
</div>
<!-- END: Modal Toggle -->

<!-- BEGIN: Modal Content -->
<div id="new" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('dairy.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Приход средств (Подочет)</h2>
                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <div class="modal-body gap-4 gap-y-3">
                    <div class="mt-3">
                        <div class="grid grid-cols-3 mx-auto">
                            <div class="grid-cols-1">
                                <label for="date" class="form-label">Дата</label>
                            </div>
                            <div class="grid-cols-2 px-5">
                                <input name="date" type="text" class="datepicker form-control w-56 block mx-auto" data-single-mode="true">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="rep" class="form-label">Ответсвенное лицо</label>
                        <input id="rep" type="text" name="representative" class="form-control" placeholder="Ответсвенное лицо" required>
                    </div>

                    <div class="mt-3">
                        <div class="w-3/4" style="display: inline-block">
                            <label for="payment" class="form-label">Сумма</label>
                            <input id="payment" type="number" name="payment" class="form-control" placeholder="Сумма" required>
                        </div>
                        <div class="w-20 px-3 mt-3 font-medium text-center items-center" style="display: inline-block">
                            <label for="currency" class="form-label"></label>
                            <select id="currency" name="currency" class="form-select" aria-label=".form-select-lg example">
                                <option>C</option>
                                <option>$</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 mt-3">
                        <label for="description" class="form-label w-full flex flex-col sm:flex-row">Дополнительная информация</label>
                        <textarea id="description" class="form-control" name="description" placeholder="Type your comments" minlength="5"></textarea>
                    </div>
                </div>
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">
                        Отменить
                    </button>
                    <button type="submit" class="btn btn-primary w-20">Сохранить</button>
                </div>
                <!-- END: Modal Footer -->
            </form>
        </div>
    </div>
</div> <!-- END: Modal Content -->
