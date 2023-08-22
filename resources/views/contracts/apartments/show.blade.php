@extends('admin')

@section('content')

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Договор №{{ $contract->id }}
        </h2>
    </div>

    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <img src="{{ asset($contract->apartment->image) }}" data-action="zoom">
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-3xl text-center lg:text-left lg:mt-3">Квартира
                    №{{ $contract->apartment->number }}</div>
                <div class="px-8 py-3 flex flex-col justify-center flex-1">
                    <div class="grid grid-cols-2 pt-3">
                        <div class="grid-cols-1">
                            <div class="text-slate-500 text-xs">ПЛОЩАДЬ</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $contract->apartment->square }} м²</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">ЭТАЖ</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $contract->apartment->floor }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">ЦЕНА ЗА м²</div>
                            <div class="mt-1.5 flex items-center">
                                <div
                                    class="text-base">{{ number_format($contract->price, 0, '.', ' ') }} {{ $contract->currency }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">ОПЛАЧЕНО</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $contract->paid }} {{ $contract->currency }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">ПРОСРОЧЕНО ДНЕЙ</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $contract->days_missed }}</div>
                            </div>

                        </div>

                        <div class="grid-cols-1">
                            <div class="text-slate-500 text-xs">ПЛАНИРОВКА КВАРТИРЫ</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $contract->apartment->rooms }}
                                    комнат{{ $contract->apartment->rooms === 1 ? 'а' : '' }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">БЛОК</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $contract->apartment->block ?? '1' }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">СТОИМОСТЬ</div>
                            <div class="mt-1.5 flex items-center">
                                <div
                                    class="text-base">{{ number_format($contract->amount, 0, '.', ' ') ?? '0' }} {{ $contract->currency }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">ОСТАТОК</div>
                            <div class="mt-1.5 flex items-center">
                                <div
                                    class="text-base">{{ number_format($contract->debt, 0, '.', ' ') }} {{ $contract->currency }}</div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                <div
                    class="font-medium text-3xl text-center lg:text-left lg:mt-3">{{ $contract->client->firstname }} {{ $contract->client->name }} {{ $contract->client->fathersname }}</div>
                <div class="px-8 py-3 flex flex-col justify-center flex-1">
                    <div class="grid grid-cols-2 pt-3">
                        <div class="grid-cols-1">
                            <div class="text-slate-500 text-xs">СЕРИЯ ПАСПОРТА</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $contract->client->passportId }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">НОМЕР ТЕЛЕФОНА</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $contract->client->phone }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">ДЕНЬ РОЖДЕНИЯ</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ date("d.m.Y", strtotime($contract->client->birth)) }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">АДРЕС</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $contract->client->address }}</div>
                            </div>

                        </div>

                        <div class="grid-cols-1">
                            <div class="text-slate-500 text-xs">ВЫДАН</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $contract->client->given }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">ДАТА ВЫДАЧИ</div>
                            <div class="mt-1.5 flex items-center">
                                <div
                                    class="text-base">{{ date("d.m.Y", strtotime($contract->client->givendate)) }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">ИНН</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $contract->client->pin }}</div>
                            </div>
                            @if($contract->client->email)
                                <div class="text-slate-500 text-xs mt-5">ЭЛЕКТРОННАЯ ПОЧТА</div>
                                <div class="mt-1.5 flex items-center">
                                    <div class="text-base">{{ $contract->client->email }}</div>
                                </div>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @if($contract->schedule->count() !== 0)

        <div class="intro-y flex items-center my-10 pr-3">
            <h2 class="text-lg font-medium">
                Рассрочка
            </h2>
        </div>
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr>
                    <th class="whitespace-nowrap">№</th>
                    <th class="whitespace-nowrap">Дата оплаты</th>
                    <th class="whitespace-nowrap text-center">Статус</th>
                    <th class="whitespace-nowrap text-center">Сумма</th>
                    <th class="whitespace-nowrap text-center">Остаток</th>
                </tr>
                </thead>
                <tbody>

                @foreach($contract->schedule as $key => $schedule)
                    <tr class="intro-x">
                        <td class="w-40 !py-4">{{ $schedule->status !== 'Перв.взнос' ? $key : ' ' }}</td>
                        <td class="w-40">
                            {{date("d.m.Y", strtotime($schedule->date_of_payment))  ?? '' }}
                        </td>
                        <td class="text-center
                        @if($schedule->amount === $schedule->paid)
                        text-success
                        @elseif($schedule->paid == 0)
                        text-danger
                        @elseif($schedule->paid > 0)
                        text-warning
                        @endif">
                            <i class="px-1 inline-block" data-lucide="check-square"></i>
                            @if($schedule->amount === $schedule->paid)
                                Оплачено
                            @elseif($schedule->paid == 0)
                                Не оплачено
                            @elseif($schedule->paid > 0)
                                Частичная оплата
                            @endif
                        </td>
                        <td class="text-center">
                            {{ number_format($schedule->amount, 0, '.', ' ')  }}
                        </td>
                        <td class="text-center">
                            {{ number_format($schedule->amount - $schedule->paid, 0, '.', ' ')  }}
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    @endif

@endsection
