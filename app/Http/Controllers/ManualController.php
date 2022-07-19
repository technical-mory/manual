<?php

namespace App\Http\Controllers;

use App\Models\Manual;
use App\Models\Step;
use Illuminate\Http\Request;

class ManualController extends Controller
{
    /**
     * 登録されたマニュアル一覧を表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manuals = Manual::orderBy('created_at', 'desc')->get();
        $user = auth()->user();
        return view('manual.index', compact('manuals', 'user'));
    }

    /**
     * マニュアルタイトルの新規作成画面を表示する
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manual.create');
    }

    /**
     * マニュアルタイトルを保存する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required|max:30',
        ]);

        $manual = new Manual();
        $manual->title = $request->title;
        $manual->user_id = auth()->user()->id;
        $manual->save();

        return redirect()->route('manual.index')->with('message', 'タイトルを保存しました');
    }

    /**
     * マニュアルタイトルと
     * マニュアルに紐づくステップを表示する
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function show(Manual $manual)
    {
        $steps = Step::where('manual_id', $manual->id)->get();
        return view('manual.show', compact('manual', 'steps'));
    }

    /**
     * マニュアルタイトルの編集画面を表示する
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function edit(Manual $manual)
    {
        return view('manual.edit', compact('manual'));
    }

    /**
     * マニュアルタイトルを書き換えて更新する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manual $manual)
    {
                $inputs = $request->validate([
                    'title' => 'required|max:30',
                ]);

                $manual->title = $request->title;
                $manual->save();

                return redirect()->route('manual.show', $manual)->with('message', 'タイトルを更新しました');
    }

    /**
     * 指定したマニュアルをデータベースから削除する
     * 同時に関連するステップもデータベースから削除する
     *
     * @param  \App\Models\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manual $manual)
    {
        $manual->delete();
        return redirect()->route('manual.index')->with('message', 'マニュアルを削除しました');
    }
}
