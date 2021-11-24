@extends('layouts.app')

@section('title', 'TODOアプリ')

@section('content')

<header>
    <h1 class="mb-5">TODOアプリ</h1>
</header>
<main>
    <section>
        <h2 class="mb-3">現在のタスク</h2>
        <!-- タスクの表示 -->
        <table class="table table-striped table-bordered w-50">
            <tbody>
                @if (count($tasks) > 0)
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>
                            <form action="{{ route('todoDelete', ['task' => $task->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{  $task->id }}">
                                <button type="submit" class="btn btn-outline-info">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </section>
    <section>
        <form action="{{ route('todoCreate') }}" method="post" class="form-horizontal mt-3">
            @csrf
            新規タスク
            <input type="text" name="name" class="form-controll">
            <button type="submit" class="btn btn-outline-dark">登録</button>
        </form>
    </section>
</main>

@endsection