@extends('admin')

@section("content")
    <h2 class="intro-y text-lg font-medium mt-10">Отчёты</h2>

    <div class="grid grid-cols-12">
        @foreach ($categories as $category)
            <div class="col-span-12 md:col-span-6 lg:col-span-3 mt-6 mx-4">
                <div class="intro-y block sm:flex items-center">
                    <h2 class="text-lg font-medium truncate mr-5">
                        {{ $category->title }}
                    </h2>
                    <div id="category-summ-{{ $category->id }}" class="sm:ml-auto p-3 mt-3 sm:mt-0 box">

                    </div>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div
                        class="flex text-slate-500 border-b border-slate-200 dark:border-darkmode-300 border-dashed pb-3 mb-3">
                        <div>Артикли</div>
                        <div class="ml-auto">Сумма</div>
                    </div>

                    @foreach($category->articles as $article)
                        <div class="flex items-center mb-5">
                            <div class="flex items-center">
                                <div>{{ $article->title }}</div>
                            </div>
                            <div class="article-summ-{{ $category->id }} ml-auto">{{ number_format($article->records->sum('amount'), 0, ',', ' ') }}</div>
                        </div>
                    @endforeach


                    {{--<button
                        class="btn btn-outline-secondary w-full border-slate-300 dark:border-darkmode-300 border-dashed relative mb-0 justify-start mb-2">
                        <span class="truncate mr-5">View Full Report</span>
                        <span
                            class="w-8 h-8 absolute flex justify-center items-center right-0 top-0 bottom-0 my-auto ml-auto mr-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 icon-name="arrow-right" data-lucide="arrow-right"
                                 class="lucide lucide-arrow-right w-4 h-4"><line x1="5" y1="12" x2="19"
                                                                                 y2="12"></line><polyline
                                    points="12 5 19 12 12 19"></polyline></svg>
                        </span>
                    </button>--}}
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('script')
    <script>

        function summCalculate(id) {

            const options1 = { style: 'currency', currency: 'RUB' };
            const numberFormat1 = new Intl.NumberFormat('ru-RU', options1);
            let summ = 0
            let data = document.getElementsByClassName('article-summ-' + id)
            for(let i = 0; i < data.length; i++) {
               console.log(data[i].innerText.replaceAll(" ", ""))
                summ+=parseInt(data[i].innerText.replaceAll(" ", ""))
            }
            $('#category-summ-' + id).html(summ.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " "))

        }
        @foreach($categories as $category)
        summCalculate({{ $category->id }})
        @endforeach
    </script>
@endsection
