
<div class="flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         icon-name="clipboard" data-lucide="clipboard"
         class="lucide lucide-clipboard w-4 h-4 text-slate-500 mr-2">
        <path d="M16 4h2a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2h2"></path>
        <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
    </svg>
    Полщадь:
    <div id="square" class="ml-auto pr-10 text-right">
        {{ $apt->square ?? '--'}}
    </div>
</div>
<div class="flex items-center mt-3">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         icon-name="credit-card" data-lucide="credit-card"
         class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
        <line x1="1" y1="10" x2="23" y2="10"></line>
    </svg>
    Комнаты:
    <div class="ml-auto pr-10 text-right">
        {{ $apt->rooms ?? '--' }}
    </div>
</div>
<div class="flex items-center mt-3">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         icon-name="credit-card" data-lucide="credit-card"
         class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
        <line x1="1" y1="10" x2="23" y2="10"></line>
    </svg>
    Цена:
    <div class="my-auto ml-auto pr-10 text-right">
        <input id="aptprice" onkeyup="count()" value="{{ $apt->price ?? '' }}" type="number" class="form-control" placeholder="Цена">
    </div>
</div>
<div class="flex items-center mt-3">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         icon-name="credit-card" data-lucide="credit-card"
         class="lucide lucide-credit-card w-4 h-4 text-slate-500 mr-2">
        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
        <line x1="1" y1="10" x2="23" y2="10"></line>
    </svg>
    Стоимость:
    <div class="my-auto ml-auto pr-10 text-right">
        <input id="apttotal" value="{{ $apt->total ?? ''}}" type="number" class="form-control" placeholder="Стоимость">
    </div>
</div>
