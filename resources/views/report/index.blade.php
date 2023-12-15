@extends('admin')

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">Отчёты</h2>

    <div class="grid grid-cols-12">
        @foreach ($categories as $category)
            <div class="col-span-12 md:col-span-6 lg:col-span-3 mt-6 mx-4">
                <div class="intro-y block sm:flex items-center">
                    <h2 class="text-lg font-medium truncate mr-5">
                        {{ $category->title }}
                    </h2>
                    <div id="category-summ-{{$category->id}}" class="sm:ml-auto p-3 mt-3 sm:mt-0 box">

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
                            <div id="article-summ-{{$category->id}}" class="ml-auto">{{ $article->records->sum('amount') }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('script')
    <script>

        function summCalculate(id) {
            let categorySumm = $('#category-summ-' + id).val()
            let artilceSumm = $('#artilce-summ-' + id)
            console.log(articleSumm)
        }
        @foreach($categories as $category)
            summCalculate({{ $category->id }})
        @endforeach
    </script>
@endsection
