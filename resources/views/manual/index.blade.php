<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            【マニュアルの作成手順】<br><br>
            １…「新規作成」を選択し、マニュアル名を決める<br>
            ２…「STEPを編集する」を選択<br>
            ３…マニュアルの中身(各ステップ)を作成
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

    {{-- マニュアル一覧表示用のコード --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{$user->name}}さんがログインしています。
        @foreach ($manuals as $manual)
            <div class="mx-4 sm:p-8">
                <div class="mt-4">
                    <div class="bg-white w-full  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                        <div class="mt-4">
                            <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer float-left pt-4">
                                <a href="{{route('manual.show', $manual)}}">{{ $manual->title }}</a>
                            </h1>

                            <a style="margin-left: 10px;" href="{{route('step.add', ['manual_id' => $manual->id])}}">
                                <x-button2 class="mt-4 bg-teal-700 float-right">
                                    STEPを編集する
                                </x-button2><br><br>
                            </a>

                            <hr class="w-full">

                            <div class="text-sm font-semibold flex flex-row-reverse">
                                <p>{{ $manual->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
