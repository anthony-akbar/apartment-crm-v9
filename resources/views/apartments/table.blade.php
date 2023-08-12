@foreach(array_unique($apartments->pluck('floor')->toArray()) as $key => $floor)
    <tr class="intro-x">
        <div id="faq-accordion-{{ $floor }}" class="accordion my-5">
            <div class="accordion-item intro-x my-10">
                <div id="faq-accordion-content-{{ $floor }}" class="accordion-header">
                    <button class="accordion-button text-center {{ $key !== 0 ? "collapsed" : "" }}" type="button"
                            data-tw-toggle="collapse"
                            data-tw-target="#faq-accordion-collapse-{{ $floor }}" aria-expanded="true"
                            aria-controls="faq-accordion-collapse-{{ $floor }}"> {{ $floor }} - Этаж
                    </button>
                </div>
                <div id="faq-accordion-collapse-{{ $floor }}"
                     class="accordion-collapse collapse {{ $key === 0 ? "show" : "" }}"
                     aria-labelledby="faq-accordion-content-{{ $floor }}" data-tw-parent="#faq-accordion-{{ $floor }}">
                    <div class="accordion-body text-slate-600 dark:text-slate-500 leading-relaxed">
                        <table class="table table-report my-auto">
                            @foreach($apartments->where('floor', $floor) as $apartment)
                                <tr class="intro-x box cursor-pointer" data-tw-toggle="modal" data-tw-target="#apartment-{{ $apartment->id }}">
                                    <td class="text-center   w-20">
                                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#apartment-{{ $apartment->id }}">{{ $apartment->number }}
                                        </a>
                                    </td>
                                    <td class="text-center text-center w-40">{{ $apartment->rooms }}</td>
                                    <td class="text-center w-40">{{ $apartment->floor  }} этаж</td>
                                    <td class="text-center w-40">{{ $apartment->square }} м²</td>
                                    <td class="text-center w-40">{{ $apartment->block }} блок</td>
                                    <td class="text-center w-56">{{ number_format($apartment->price, 0, '.', ' ') }} {{ $apartment->currency }}</td>
                                    <td class="text-center w-40">{{ number_format($apartment->total, 0, '.', ' ') }} {{ $apartment->currency }}</td>
                                    <td class="w-56 @if($apartment->staus === 4) text-success @elseif($apartment->status === 2) text-warning
                                    @elseif($apartment->status === 1) text-success @elseif($apartment->status === 3) text-danger
                                       @endif text-center">
                                        @if($apartment->staus === 4)
                                            Свободно
                                        @elseif($apartment->status === 2)
                                            <i class="inline-block px-1" data-lucide="tag"></i>Забронировано
                                        @elseif($apartment->status === 1)
                                            <i class="inline-block px-1" data-lucide="check-square"></i>Свободно
                                        @elseif($apartment->status === 3)
                                            <i class="inline-block px-1" data-lucide="x-square"></i>Продано
                                        @endif
                                    </td>

                                </tr>
                                <!-- BEGIN: Modal Content -->
                                <div id="apartment-{{ $apartment->id }}" class="modal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-body p-5 text-center">
                                                <div class="intro-y px-3 pt-5 mt-5">
                                                    <div class="flex flex-col lg:flex-row pb-5 -mx-5">
                                                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                                                            <img src="{{ asset($apartment->image) }}" data-action="zoom" data-tw-toggle="modal" data-tw-target="#apartment-{{ $apartment->id }}">
                                                        </div>
                                                        <div
                                                            class="mt-6 lg:mt-0 flex-1 px-3 border-l border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                                                            <div class="font-medium text-3xl text-center lg:text-left lg:mt-3">Квартира
                                                                №{{ $apartment->number }}</div>
                                                            <div class="px-5 py-3 flex flex-col justify-center flex-1">
                                                                <div class="grid grid-cols-2 pt-3">
                                                                    <div class="grid-cols-1 px-3">
                                                                        <div class="text-left text-slate-500 text-xs">ПЛОЩАДЬ</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-base">{{ $apartment->square }} м²</div>
                                                                        </div>
                                                                        <div class="text-left text-slate-500 text-xs mt-5">ЭТАЖ</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-base">{{ $apartment->floor }}</div>
                                                                        </div>
                                                                        <div class="text-left text-slate-500 text-xs mt-5">ЦЕНА ЗА м²</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-base">{{ number_format($apartment->price, 0, '.', ' ') }} {{ $apartment->currency }}</div>
                                                                        </div>

                                                                        <div class="text-left text-slate-500 text-xs mt-5 pr-3">СТАТУС</div>
                                                                        <div class="mt-2">
                                                                            <select id="status-select" onchange="redirect(this, {{ $apartment->id }})" class="tom-select w-full">
                                                                                <option value="1" {{ $apartment->status === 1 ? 'selected="true"' : '' }}>СВОБОДНО</option>
                                                                                <option value="2" {{ $apartment->status === 2 ? 'selected="true"' : '' }}>БРОНЬ</option>
                                                                                <option value="3" {{ $apartment->status === 3 ? 'selected="true"' : '' }}>ПРОДАНО</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="grid-cols-1 px-3">
                                                                        <div class="text-left text-slate-500 text-xs">ПЛАНИРОВКА КВАРТИРЫ</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-base">{{ $apartment->rooms }}
                                                                                комнат{{ $apartment->rooms === 1 ? 'а' : '' }}</div>
                                                                        </div>
                                                                        <div class="text-left text-slate-500 text-xs mt-5">БЛОК</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-base">{{ $apartment->block ?? '1' }}</div>
                                                                        </div>
                                                                        <div class="text-left text-slate-500 text-xs mt-5">СТОИМОСТЬ</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-left text-base">{{ number_format($apartment->total ?? 0, 0, '.', ' ') }} {{ $apartment->currency }}</div>
                                                                        </div>
                                                                        @if($apartment->client !== null)

                                                                        <div class="text-left text-slate-500 text-xs mt-5">КЛИЕНТ</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-left text-base">{{ $apartment->client->firstname . ' ' . $apartment->client->name ?? '- - - -' }}</div>
                                                                        </div>
                                                                        @endif
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Modal Content -->
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </tr>
@endforeach
