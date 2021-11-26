@extends('layouts.app')

@section('title', 'TODOアプリ')

@section('content')

<header>
    <h1 class="container mb-5">TODOリスト</h1>
</header>
<main>
    <section>
        <div class="container">
            <div class="user">
                <div class="user-icon float-left">
                    @if ($user->avatar === 'noimage.png')
                        <img src="{{ asset('storage/images/noimage.png') }}" alt="ユーザー画像" class="d-block mx-auto rounded-circle">
                        <p class="text-center">{{ $user->name }}</p>
                    @else
                        <img src="{{ asset('storage/images/'. $user->avatar) }}" alt="ユーザー画像" class="d-block mx-auto rounded-circle">
                        <p class="text-center">{{ $user->name }}</p>
                    @endif
                </div>
            </div>
            <form action="{{ route('todoCreate') }}" method="post" class="form-inline mt-3 mb-5">
                @csrf
                <div class="form-group">
                    <label class="mr-3" for="task-name">新規タスク</label>
                    <input type="text" name="name" class="form-control mr-3">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">登録</button>
                </div>
        　　</form>
        </div>
    </section>
    <section>
        <div class="container">
            <h3 class="mb-3">現在のタスク</h3>
            <!-- タスクの表示 -->
            <table class="table table-bordered table-hover w-50">
                <tbody>
                    @if (count($tasks) > 0)
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="col-sm-8">{{ $task->name }}</td>
                            <td class="col-sm-4 text-center">
                                <form action="{{ route('todoDelete', ['task' => $task->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{  $task->id }}">
                                    <button type="submit" class="btn btn-outline-info">完了</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</main>

@endsection