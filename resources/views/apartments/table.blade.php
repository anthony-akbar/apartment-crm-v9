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
                                <tr onclick="showModal({{ $apartment->id }})" class="intro-x box cursor-pointer">
                                    <td class="text-center w-20">
                                        <a {{--data-tw-toggle="modal"
                                           data-tw-target="#apartment-{{ $apartment->id }}"--}}>{{ $apartment->number }}
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round" icon-name="check-square"
                                                 class="lucide lucide-check-square inline-block px-1"
                                                 data-lucide="check-square">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                            </svg>Свободно
                                        @elseif($apartment->status === 3)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round" icon-name="x-square"
                                                 class="lucide lucide-x-square inline-block px-1"
                                                 data-lucide="x-square">
                                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                            </svg>Продано
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </tr>
@endforeach
