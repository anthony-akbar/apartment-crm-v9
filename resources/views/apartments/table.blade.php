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
                                    <td class="text-center   w-20">{{ $appartment->number }}</td>
                                    <td class="text-center   w-32">{{ $appartment->rooms }}</td>
                                    <td class="text-center   w-40">{{ $appartment->floor  }}</td>
                                    <td class="text-center   w-40">{{ $appartment->square }}</td>
                                    <td class="text-center   w-40">{{ $appartment->terace }}</td>
                                    <td class="text-center   w-40">{{ $appartment->price }}</td>
                                    <td class="text-center   w-56">{{ $appartment->total }}</td>
                                    <td class="text-center   w-20">{{ $appartment->status }}</td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="javascript:;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                     stroke-linejoin="round"
                                                     icon-name="check-square" data-lucide="check-square"
                                                     class="lucide lucide-check-square w-4 h-4 mr-1">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path
                                                        d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                                </svg>
                                                Edit </a>
                                            <a class="flex items-center text-danger" href="javascript:;"
                                               data-tw-toggle="modal"
                                               data-tw-target="#delete-confirmation-modal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                     stroke-linejoin="round"
                                                     icon-name="trash-2" data-lucide="trash-2"
                                                     class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                                Delete </a>
                                        </div>
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
