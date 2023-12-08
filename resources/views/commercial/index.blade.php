@extends('admin')

@section('content')


    <div class="mt-3 intro-y flex flex-col sm:flex-row items-center p-5">
        <h2 class="text-lg font-medium mr-auto">Коммерческое помещение</h2>
    </div>

    <div class="grid grid-cols-12 gap-5 mt-5 pt-5">

        @foreach($commercials as $commercial)


            <a href="javascript:;" onclick="getInfo({{ $commercial->id }})" data-tw-toggle="modal"
               data-tw-target="#commercial-view" class="intro-y block">
                <div style="background-color: {{ $commercial->status === 1 ? "green" : "" }}{{ $commercial->status === 2 ? "yellow" : "" }}{{ $commercial->status === 3 ? "red" : "" }}; width: 140px;
                /*height: 150px;*/ background-size: cover" class="text-center pb-3 rounded-md relative zoom-in">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                         width="100%" height="100px"  viewBox="0 0 1000.000000 1080.000000"
                         preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,1080.000000) scale(0.100000,-0.100000)"
                           fill="#FFFFFF" stroke="none">
                            <path d="M6150 9280 c-210 -13 -607 -66 -637 -85 -38 -25 -63 -75 -63 -125 0
-74 -28 -181 -66 -259 -69 -140 -220 -259 -374 -295 -72 -17 -115 -51 -129
-103 -16 -58 36 -405 100 -663 182 -739 550 -1299 1173 -1784 166 -130 215
-160 240 -148 36 16 257 185 367 280 199 172 413 405 551 602 296 422 492 981
559 1591 12 110 12 118 -7 150 -22 38 -58 58 -160 88 -164 49 -305 186 -365
355 -11 32 -23 97 -28 144 -9 99 -29 145 -71 167 -29 15 -301 55 -500 74 -163
15 -430 20 -590 11z m475 -100 c243 -18 559 -61 573 -78 6 -9 12 -36 12 -61 0
-77 27 -179 71 -269 74 -153 237 -292 394 -337 104 -30 105 -31 105 -71 0 -61
-39 -309 -76 -479 -129 -607 -378 -1082 -779 -1494 -152 -156 -277 -267 -434
-385 l-114 -85 -76 56 c-342 252 -648 571 -844 881 -187 296 -322 635 -406
1019 -36 166 -84 488 -76 513 4 12 27 23 73 35 107 27 216 89 296 170 117 118
176 242 198 413 6 48 16 92 22 98 12 13 372 61 543 73 156 12 369 12 518 1z"/>
                            <path d="M6115 8860 c-155 -13 -256 -28 -271 -41 -7 -6 -20 -34 -30 -62 -25
-78 -99 -218 -153 -289 -62 -82 -157 -169 -251 -230 -41 -27 -78 -54 -81 -60
-9 -14 -3 -52 33 -221 120 -561 350 -998 723 -1373 150 -150 262 -244 293
-244 55 0 375 312 529 517 211 280 360 596 451 953 46 177 77 343 69 364 -3 7
-43 38 -90 69 -184 120 -330 311 -401 525 -10 28 -21 54 -26 57 -4 3 -66 12
-137 20 -158 19 -510 27 -658 15z m536 -101 c196 -16 185 -10 225 -106 81
-197 225 -372 401 -491 42 -27 52 -39 48 -56 -3 -11 -16 -75 -31 -141 -35
-160 -84 -330 -129 -446 -96 -244 -249 -504 -413 -700 -76 -90 -357 -369 -372
-369 -15 0 -233 205 -310 292 -259 292 -414 563 -533 934 -43 132 -108 401
-107 441 1 11 25 34 63 58 78 50 221 191 274 270 45 68 114 201 132 257 12 35
14 37 69 44 197 25 475 30 683 13z"/>
                            <path d="M3843 9260 c-58 -35 -58 -30 -63 -473 l-5 -409 -245 -118 c-135 -64
-495 -237 -800 -384 -391 -187 -563 -275 -582 -296 l-28 -30 0 -1993 c0 -1988
0 -1993 20 -2015 11 -12 31 -24 43 -27 12 -3 1254 -4 2760 -3 l2739 3 19 24
c19 23 19 62 19 1575 0 1382 -2 1554 -15 1574 -21 29 -147 102 -178 102 -30 0
-50 -22 -45 -52 2 -16 24 -34 73 -63 l70 -42 3 -1511 2 -1512 -640 0 -640 0 0
1035 0 1035 -25 16 c-23 15 -27 15 -50 0 l-25 -16 0 -1035 0 -1035 -420 0
-420 0 0 413 0 414 -23 22 c-24 21 -29 22 -323 22 l-299 0 -22 -26 -23 -26 0
-410 0 -409 -420 0 -420 0 2 2783 3 2782 730 2 730 3 18 21 c22 27 21 35 -3
59 -20 20 -33 20 -752 20 -708 0 -734 -1 -765 -20z m-63 -3320 l0 -2330 -780
0 -780 0 2 1957 3 1957 775 373 c426 205 776 373 778 373 1 0 2 -1048 2 -2330z
m1530 -1940 l0 -390 -245 0 -245 0 0 390 0 390 245 0 245 0 0 -390z"/>
                            <path d="M2695 7479 c-45 -26 -45 -21 -45 -465 0 -289 4 -431 11 -447 20 -44
44 -47 335 -47 287 0 322 5 338 45 3 9 6 209 6 445 0 406 -1 429 -19 451 l-19
24 -294 2 c-201 2 -299 -1 -313 -8z m545 -474 l0 -385 -245 0 -245 0 0 385 0
385 245 0 245 0 0 -385z"/>
                            <path d="M2671 6124 c-21 -26 -21 -37 -21 -456 l0 -429 25 -24 24 -25 296 0
296 0 24 25 25 24 0 429 c0 419 0 430 -21 456 l-20 26 -304 0 -304 0 -20 -26z
m569 -454 l0 -390 -245 0 -245 0 0 390 0 390 245 0 245 0 0 -390z"/>
                            <path d="M2695 4808 c-45 -26 -44 -23 -45 -474 0 -419 1 -431 20 -452 11 -12
31 -24 43 -27 12 -3 150 -5 305 -3 l284 3 19 24 c18 22 19 45 19 451 0 236 -3
436 -6 445 -16 40 -50 45 -341 45 -190 -1 -284 -4 -298 -12z m545 -473 l0
-385 -245 0 -245 0 0 385 0 385 245 0 245 0 0 -385z"/>
                            <path d="M4592 8923 c-7 -3 -19 -18 -27 -33 -22 -43 -22 -837 0 -879 19 -37
31 -41 134 -41 92 0 111 8 111 45 0 35 -20 45 -92 45 l-68 0 0 390 0 390 308
0 c324 0 332 1 332 45 0 44 -7 45 -354 44 -182 0 -337 -3 -344 -6z"/>
                            <path d="M4583 7406 l-28 -24 0 -437 0 -437 28 -24 28 -24 390 0 c250 0 397 4
410 10 22 12 26 59 7 78 -9 9 -109 12 -390 12 l-378 0 0 385 0 385 141 0 c77
0 149 5 160 10 12 7 19 21 19 40 0 19 -7 33 -19 40 -11 6 -89 10 -180 10 -155
0 -161 -1 -188 -24z"/>
                            <path d="M6765 5925 c-25 -24 -25 -27 -25 -200 l0 -177 29 -29 29 -29 167 0
c172 0 215 8 229 45 3 9 6 96 6 194 0 236 16 221 -229 221 -180 0 -182 0 -206
-25z m340 -200 l0 -130 -132 -3 -133 -3 0 136 0 136 133 -3 132 -3 0 -130z"/>
                            <path d="M4592 5913 c-7 -3 -19 -18 -27 -33 -13 -24 -15 -97 -15 -440 0 -432
2 -457 45 -474 9 -3 223 -6 476 -6 l460 0 24 25 25 24 0 431 0 431 -25 24 -24
25 -463 -1 c-255 0 -469 -3 -476 -6z m888 -473 l0 -390 -415 0 -415 0 0 390 0
390 415 0 415 0 0 -390z"/>
                            <path d="M6765 5175 c-25 -24 -25 -27 -25 -200 l0 -177 29 -29 29 -29 167 0
c172 0 215 8 229 45 3 9 6 96 6 194 0 236 16 221 -229 221 -180 0 -182 0 -206
-25z m340 -200 l0 -130 -132 -3 -133 -3 0 136 0 136 133 -3 132 -3 0 -130z"/>
                            <path d="M6769 4431 c-23 -19 -24 -24 -27 -200 l-3 -181 30 -30 29 -30 167 0
c172 0 215 8 229 45 3 9 6 96 6 194 0 236 16 221 -227 221 -163 0 -183 -2
-204 -19z m339 -208 l3 -133 -135 0 -136 0 0 128 c0 71 3 132 7 136 4 3 63 5
132 4 l126 -3 3 -132z"/>
                            <path d="M1794 2857 c-2 -7 -3 -67 -2 -133 l3 -119 135 0 135 0 3 53 3 52
2929 0 2929 0 3 -52 3 -53 135 0 135 0 0 130 0 130 -135 0 -135 0 -3 -52 -3
-53 -2929 0 -2929 0 -3 53 -3 52 -133 3 c-103 2 -134 0 -138 -11z m224 -119
l3 -88 -91 0 -90 0 0 83 c0 46 3 87 7 91 4 4 43 5 88 4 l80 -3 3 -87z m6140 0
l3 -88 -91 0 -90 0 0 83 c0 46 3 87 7 91 4 4 43 5 88 4 l80 -3 3 -87z"/>
                        </g>
                    </svg>
                    <span class="font-medium" style="font-size: 24px;">
                    {{ $commercial->square }} М²
                </span>
                </div>
            </a>

        @endforeach

    </div>

    <!-- BEGIN: Modal Content -->
    <div id="commercial-view" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"> <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Broadcast Message</h2>
                    <button class="btn btn-outline-secondary hidden sm:flex">
                        <i data-lucide="file" class="w-4 h-4 mr-2"></i> Download Docs
                    </button>
                    <div class="dropdown sm:hidden"><a class="dropdown-toggle w-5 h-5 block" href="javascript:;"
                                                       aria-expanded="false" data-tw-toggle="dropdown"> <i
                                data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content">
                                <li><a href="javascript:;" class="dropdown-item"> <i data-lucide="file"
                                                                                     class="w-4 h-4 mr-2"></i> Download
                                        Docs </a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- END: Modal Header --> <!-- BEGIN: Modal Body -->
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">


                    <div class="col-span-12 sm:col-span-6 px-3">
                        <img src="{{ URL::to('/commercial.svg') }}">
                    </div>
                    <div class="col-span-12 sm:col-span-6 px-5">
                        <label for="modal-form-2" class="form-label">To</label>
                        <input id="modal-form-2" type="text" class="form-control" placeholder="example@gmail.com">

                        <label for="modal-form-3" class="form-label">Subject</label>
                        <input id="modal-form-3" type="text" class="form-control" placeholder="Important Meeting">

                        <label for="modal-form-4" class="form-label">Has the Words</label>
                        <input id="modal-form-4" type="text" class="form-control" placeholder="Job, Work, Documentation">

                        <label for="modal-form-5" class="form-label">Doesn't Have</label>
                        <input id="modal-form-5" type="text" class="form-control" placeholder="Job, Work, Documentation">

                        <label for="modal-form-6" class="form-label">Size</label>
                        <select id="modal-form-6" class="form-select">
                            <option>10</option>
                            <option>25</option>
                            <option>35</option>
                            <option>50</option>
                        </select>

                    </div>
                </div> <!-- END: Modal Body --> <!-- BEGIN: Modal Footer -->
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel
                    </button>
                    <button type="button" class="btn btn-primary w-20">Send</button>
                </div> <!-- END: Modal Footer --> </div>
        </div>
    </div> <!-- END: Modal Content -->


@endsection

@section('script')
    <script>

        function getInfo(id) {
            $.ajax({
                type: 'get',
                url: '{{ route('parkings.search') }}',
                data: {
                    'data': id
                },
                success: (data) => {
                    $('#modal-form-2').val(data['id'])
                    console.log(data)
                }
            })
        }

    </script>
@endsection
