@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">Файлы</h2>

   <div class="intro-x py-auto px-auto box">
       <ul class="nav nav-tabs mt-2" role="tablist">
           <li id="apartment-tab" class="nav-item flex-1" role="presentation">
               <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#apartment-tab-1"
                       type="button" role="tab" aria-controls="apartment-tab-1" aria-selected="true"> Квартиры
               </button>
           </li>
           <li id="parking-tab" class="nav-item flex-1" role="presentation">
               <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#parking-tab-2" type="button"
                       role="tab" aria-controls="example-tab-2" aria-selected="false">Парковка
               </button>
           </li>
           <li id="commercial-2-tab" class="nav-item flex-1" role="presentation">
               <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#commercial-tab-2" type="button"
                       role="tab" aria-controls="example-tab-2" aria-selected="false"> Комерческое помещение
               </button>
           </li>
       </ul>
       <div class="tab-content border-l border-r border-b">
           <div id="apartment-tab-1" class="tab-pane leading-relaxed p-5 active" role="tabpanel"
                aria-labelledby="apartment-tab">

               <div class="grid grid-cols-2">

                   <div class="grid grid-cols-1">
                       <div class="form-inline">
                           <label for="kgs-contract" class="form-label w-56">Договор сомовый образец</label>
                           <input id="kgs-contract" type="file" class="" placeholder="Apartments Sample">
                       </div>

                       <div class="form-inline mt-3">
                           <label for="kgs-contract" class="form-label w-56">Договор долларовый образец</label>
                           <input id="kgs-contract" type="file" class="" placeholder="Apartments Sample">
                       </div>

                       <div class="form-inline mt-3">
                           <label for="kgs-contract" class="form-label">Email</label>
                           <input id="kgs-contract" type="text" class="form-control" placeholder="example@gmail.com">
                       </div>
                   </div>

                   <div class="grid grid-cols-1">
                       <div class="form-inline">
                           <label for="kgs-contract" class="form-label w-56">Email</label>
                           <input id="kgs-contract" type="text" class="form-control" placeholder="example@gmail.com">
                       </div>

                       <div class="form-inline mt-3">
                           <label for="kgs-contract" class="form-label w-56">Email</label>
                           <input id="kgs-contract" type="text" class="form-control" placeholder="example@gmail.com">
                       </div>

                       <div class="form-inline mt-3">
                           <label for="kgs-contract" class="form-label">Email</label>
                           <input id="kgs-contract" type="text" class="form-control" placeholder="example@gmail.com">
                       </div>
                   </div>
               </div>


           </div>
           <div id="parking-tab-2" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="parking-2-tab"> It
               is a long established fact that a reader will be distracted by the readable content of a page when looking
               at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
               as opposed to using 'Content here, content here', making it look like readable English. Many desktop
               publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for
               'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the
               years, sometimes by accident, sometimes on purpose (injected humour and the like).
           </div>
           <div id="commercial-tab-2" class="tab-pane leading-relaxed p-5" role="tabpanel" aria-labelledby="commercial-2-tab"> It
               is a long established fact that a reader will be distracted by the readable content of a page when looking
               at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,
               as opposed to using 'Content here, content here', making it look like readable English. Many desktop
               publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for
               'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the
               years, sometimes by accident, sometimes on purpose (injected humour and the like).
           </div>
       </div>
   </div>

@endsection
