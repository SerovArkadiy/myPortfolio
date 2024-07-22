@extends('layouts.app')

@section('content')
    <div class="form container mb-3" style="max-width: 50%;">

        <form action="{{route('store')}}" method="post">
            @csrf
            <div class="container mb-3">
                <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                <input value="{{old('title')}}" class="form-control" name="title" id="title">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="container mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Описание задачи</label>
                <textarea class="form-control" id="task" name="task" rows="3">{{old('task')}}</textarea>
                @error('task')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Применить</button>
        </form>
    </div>


    <div class="container" style="max-width: 70%;">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($tasks as $task)
                @if($task->specification->completed == 1)

                    <div class="col p-2">
                        <div class="card text-white bg-secondary">
                            <div class="card-body">
                                <h5 class="card-title">{{$task->title}}</h5>
                                <p class="card-text">{{$task->task}}</p>
                            </div>
                            <div class="d-flex justify-content-between">

                                <div class="d-flex align-items-end">
                                    <form action="{{route('update', $task->id)}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" value="patch" class="btnUpdateTrue btn btn-primary m-2">Вернуть обратно</button>
                                    </form>

                                </div>


                                <div class="d-flex align-items-end">
                                    <form action="{{route('destroy', $task->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        @can('delete', $task)
                                            <button type="submit" value="delete" class="btnDeleteTrue btn btn-danger m-2">Удалить</button>
                                        @endcan
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>


                @else



                    <div class="col p-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$task->title}}</h5>
                                <p class="card-text">{{$task->task}}</p>
                            </div>
                            <div class="d-flex justify-content-between">

                                <div class="d-flex align-items-end">
                                    <form action="{{route('update', $task->id)}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" value="patch" class="btnUpdateFalse btn btn-success m-2">Выполнить</button>
                                    </form>

                                </div>


                                <div class="d-flex align-items-end">
                                    <form action="{{route('destroy', $task->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
{{--                                    Мда, а в 10, 9, 8, 7, 6, 5 не требовалась эта штука ОБЯЗАТЕЛЬНО(может её вообще не было), --}}
{{--                                    сделано круто, если каким-то образом какой-то другой таск не текущего пользователя попадёт ему --}}
{{--                                    на сайте, то кнопки делит не будет на экране--}}
                                        @can('delete', $task)
                                        <button type="submit" value="delete" class="btnDeleteFalse btn btn-danger m-2">Удалить</button>
                                        @endcan
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                @endif
            @endforeach


        </div>
    </div>

@endsection

