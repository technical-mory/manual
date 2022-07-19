<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * 登録するステップに関連するmanual_idをURLから渡す
     */
    public function add($manual_id)
    {
        return view('step.create', [
            'manual_id' => $manual_id
        ]);
    }

    /**
     * 登録するステップに関連するmanual_idをURLから渡す
     */
    public function form(Request $request, $manual_id)
    {
        $inputs = $request->validate([
            'body' => 'required|max:500',
            'image' => 'image|max:1024'
        ]);
        if ($request->has('save')) {
            $return_save = $this->save($request, $manual_id);
            return $return_save;
        }elseif ($request->has('complete')){
            $return_complete = $this->complete($request, $manual_id);
            return $return_complete;
        }else {
            $return_add = $this->add($manual_id);
            return $return_add;
        }
    }

    /**
     * 登録するステップに関連するmanual_idをURLから渡す
     */
    public function save(Request $request, $manual_id)
    {
        $step = new Step();
        $step->body = $request->body;
        $step->manual_id = $manual_id;

        if (request('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images', $name);
            $step->image = $name;
        }

        $step->save();

        return redirect()->route('step.add', $manual_id)->with('message', 'このステップを保存しました');

    }

    /**
     * ステップの編集画面を表示する
     *
     * @param  \App\Models\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function edit(Step $step)
    {
        return view('step.edit', compact('step'));
    }

    /**
     * 指定されたステップの中身を書き換えて更新する
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Step  $step
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Step $step)
    {
        $inputs = $request->validate([
            'body' => 'required|max:500',
            'image' => 'image|max:1024'
        ]);

        $step->body=$request->body;

        if (request('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images', $name);
            $step->image = $name;
        }

        $step->save();
        return redirect()->route('manual.show', $step)->with('message','ステップを修正しました');
    }

/**
     * 新しく作成したステップを保存し、
     * ステップ作成プロセスを完了させる。
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request, $manual_id)
    {
        $step = new Step();
        $step->body = $request->body;
        $step->manual_id = $manual_id;

        if (request('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images', $name);
            $step->image = $name;
        }

        $step->save();
        return redirect()->route('manual.index')->with('message', 'マニュアルの中身が完成しました');
    }
}
