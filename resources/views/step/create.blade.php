<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            １…ステップの手順を書く→参考画像を添付(任意)→「ステップ保存」を選択<br>
            ２…ステップ保存を必要な回数くり返す<br>
            ３…すべてのステップを作り終えたら「マニュアル完成」を選択
        </h2>

        <x-validation-errors class="mb-4" :errors="$errors" />

        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">

            <form class="form-horizontal" method="POST"  action="{{route('step.form', ['manual_id' => $manual_id])}}" enctype="multipart/form-data">
                @csrf

                <div class="w-full flex flex-col">
                    <label for="body" class="font-semibold leading-none mt-4">ステップの手順</label>
                    <textarea name="body" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="body" cols="30" rows="10" placeholder="このステップの手順を入力してください。（最大500文字）">{{old('body')}}</textarea>
                </div>

                <div class="w-full flex flex-col">
                    <label for="image" class="font-semibold leading-none mt-4">参考画像を添付する（任意） </label>
                    <div>
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <x-button1 class="mt-4" name="save">
                        このステップを保存する
                </x-button1>

                <x-button2 class="mt-4" name="complete">
                        マニュアルを完成させる
                </x-button2>

            </form>
        </div>
    </div>

</x-app-layout>
