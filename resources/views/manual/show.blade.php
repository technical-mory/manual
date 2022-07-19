<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            選択したマニュアルの詳細
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <div class="px-10 mt-4">

                <div class="bg-white w-full  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">
                            {{ $manual->title }}
                        </h1>

                        <div class="flex justify-end">
                            <a href="{{route('manual.edit', $manual)}}"><x-button1 class="bg-teal-700 float-right">マニュアルタイトルを編集</x-button1></a>

                            <form method="post" action="{{route('manual.destroy', $manual)}}">
                                @csrf
                                @method('delete')
                                <x-button3 class="bg-red-700 float-right ml-4" onClick="return confirm('本当に削除しますか？');">このマニュアルを削除</x-button3>
                            </form>


                        </div>
                    </div>

                </div>

                <!-- ステップ1～最終ステップまでを繰り返し処理で表示する -->
                <?php $i=1; ?>
                @foreach ($steps as $step)
                    <div class="mx-4 sm:p-8">
                        <div class="mt-4">
                            <div class="bg-white w-full  rounded-2xl px-10 py-1 shadow-lg hover:shadow-2xl transition duration-500">
                                <div class="mt-4">
                                    <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer float-left pt-4">
                                        ステップ{{$i}}
                                    </h1>
                                </div><br><br>
                                <hr class="w-full">

                                <p class="mt-4 text-xl text-gray-600 py-4">{{ $step->body }}</p>

                                @if($step->image)
                                    <img src="{{ asset('storage/images/'.$step->image)}}" class="mx-auto" style="height:300px;">
                                @endif
                                <?php $i++; ?>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div>
                    <form method="post" action="{{route('manual.destroy', $manual)}}">
                            @csrf
                            @method('delete')
                            <x-button3 class="bg-red-700 float-right ml-4" onClick="return confirm('本当に削除しますか？');">このマニュアルを削除</x-button3>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
