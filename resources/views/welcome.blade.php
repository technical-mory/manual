<x-guest-layout>
<div class="h-screen pb-14 bg-right bg-cover">
    <div class="container pt-10 md:pt-18 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center bg-yellow-50">
        <!--左側-->
        <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden ">
            <h1 class="my-4 text-3xl md:text-5xl text-green-800 font-bold leading-tight text-center md:text-left slide-in-bottom-h1">マニュアルの作成支援♪</h1>
            <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">
                かんたんな解説を打ちこんでボタンを押すだけで、マニュアルをつくることができます
            </p>
            <div class="flex w-full justify-center md:justify-start pb-24 lg:pb-0 fade-in ">
                {{-- ボタン設定 --}}
                <a href="{{route('login')}}"><x-button1 class="mt-4 bg-teal-700 float-right">ログインはこちら</x-button1></a>
                <a href="{{route('register')}}"><x-button2 class="mt-4 mx-4 bg-teal-700 float-right">ご登録はこちら</x-button2></a>
            </div>
        </div>
        {{-- 右側 --}}
        <div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
            <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom rounded-lg shadow-xl" src="{{asset('logo/top_fukurou.jpg')}}">
        </div>
    </div>
    <div class="container pt-10 md:pt-18 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <div class="w-full pt-10 pb-6 text-sm md:text-left fade-in">
            <p class="text-gray-500 text-center">@2022 マニュアルつく～る</p>
        </div>
    </div>
</div>
</x-guest-layout>
