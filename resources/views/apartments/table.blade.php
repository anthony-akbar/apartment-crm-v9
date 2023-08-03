@foreach(array_unique($appartments->pluck('floor')->toArray()) as $key => $floor)
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
                            @foreach($appartments->where('floor', $floor) as $appartment)
                                <tr class="intro-x box">
                                    <td class="text-center   w-20">
                                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#apartment-{{ $appartment->id }}">{{ $appartment->number }}
                                        </a>
                                    </td>
                                    <td class="text-center   w-32">{{ $appartment->rooms }}</td>
                                    <td class="text-center   w-40">{{ $appartment->floor  }}</td>
                                    <td class="text-center   w-40">{{ $appartment->square }}</td>
                                    <td class="text-center   w-40">{{ $appartment->block }}</td>
                                    <td class="text-center   w-40">{{ $appartment->price }}</td>
                                    <td class="text-center   w-56">{{ $appartment->total }}</td>
                                    <td class="text-center   w-20">{{ $appartment->status }}</td>
                                </tr>
                                <!-- BEGIN: Modal Content -->
                                <div id="apartment-{{ $appartment->id }}" class="modal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-body p-5 text-center">
                                                <div class="intro-y px-3 pt-5 mt-5">
                                                    <div class="flex flex-col lg:flex-row pb-5 -mx-5">
                                                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                                                            <img src="{{ asset($appartment->image) }}" data-action="zoom" data-tw-toggle="modal" data-tw-target="#apartment-{{ $appartment->id }}">
                                                        </div>
                                                        <div
                                                            class="mt-6 lg:mt-0 flex-1 px-3 border-l border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                                                            <div class="font-medium text-3xl text-center lg:text-left lg:mt-3">Квартира
                                                                №{{ $appartment->number }}</div>
                                                            <div class="px-5 py-3 flex flex-col justify-center flex-1">
                                                                <div class="grid grid-cols-2 w-72 pt-3">
                                                                    <div class="grid-cols-1">
                                                                        <div class="text-left text-slate-500 text-xs">ПЛОЩАДЬ</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-base">{{ $appartment->square }} м²</div>
                                                                        </div>
                                                                        <div class="text-left text-slate-500 text-xs mt-5">ЭТАЖ</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-base">{{ $appartment->floor }}</div>
                                                                        </div>
                                                                        <div class="text-left text-slate-500 text-xs mt-5">ЦЕНА ЗА м²</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-base">{{ $appartment->price }}</div>
                                                                        </div>

                                                                    <div class="grid-cols-1">
                                                                        <div class="text-left text-slate-500 text-xs">ПЛАНИРОВКА КВАРТИРЫ</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-base">{{ $appartment->rooms }}
                                                                                комнат{{ $appartment->rooms === 1 ? 'а' : '' }}</div>
                                                                        </div>
                                                                        <div class="text-left text-slate-500 text-xs mt-5">БЛОК</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-base">{{ $appartment->block ?? '1' }}</div>
                                                                        </div>
                                                                        <div class="text-left text-slate-500 text-xs mt-5">СТОИМОСТЬ</div>
                                                                        <div class="mt-1.5 flex items-center">
                                                                            <div class="text-left text-base">{{ $appartment->total ?? '0' }}</div>
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
