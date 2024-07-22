@extends('layouts.app')

@section('content')


<main class="container">
    <div class="flex justify-center">
        <h1 style="text-align: center">Тестовое задание Backend</h1>
        <h2 style="text-align: center">ToDo list на Laravel</h2>
        <div><p>Задача состоит в написании ToDo листа, на php фреймворке Laravel.
                Для выполнения задания нужны базовые знания PHP и прочитать документацию
                по фреймворку.</p></div>
        <div><p>На позицию <b>Стажер</b>, необходимо сделать:</p></div>
        <div><p>Написать сайт для работы с ToDo листом,  реализовать авторизацию, добавление/удаление
                заданий, задания должны быть у каждого пользователя свои (Потребуется связать задания
                с пользователями).</p></div>
        @foreach($testTasks as $testTask)
            <div>
                <p style="text-align: center">{{$testTask->requirement}}</p><br>
            </div>
            <div>
                <p>{{$testTask->done}}</p><br>
            </div>

        @endforeach

    </div>
</main>
@endsection
