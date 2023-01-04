<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            *{
                margin: 0px;
                padding: 0px;
            }
            body {
                font-family: 'Nunito', sans-serif;
            }
            .main-content{
                width: 100vw;
                height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 4rem 2rem;
            }
            .content{
                height: auto;
                width: 40%;
                padding: 2rem .5rem;
                background: #eee;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .Heading-cnt{
                font-size: 35px;
                padding: 1rem .5rem;
            }
            .form-container{
                padding: 1rem .5rem;
                width: 100%;
                display: flex;
                justify-content: center;
            }
            .form-container #taskName{
                height: 1.5rem;
                width: 70%;
                border-radius: 6px;
                border: 1px solid black;
            }
            .tasks, .task-list{
                width:100%;
            }
            .task-list{
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .task{            
                width: 75%;
                margin: .5rem 0rem;
                padding: .5rem 1rem;
                display: flex;
                justify-content: space-between;
                border:1px solid black;
                border-radius: 6px;
            }
            #submit-task{
                height: 1.5rem;
            }
            .btns-cnt{
                display: flex;
            }
            .btns-cnt form , .btns-cnt a{
                margin: .5rem;
            }


        </style>
    </head>
    <body>
        <!-- navbar -->

        <!-- main content of the app -->
        <section class="main-content">
            <div class="content">
                <div class="Heading">
                    <h1 class="Heading-cnt">Todo List</h1>
                </div>
                <div class="form-container">
                    <!-- form -->
                    <form name="add-task" action="{{route('addtask')}}" method="post">
                        @csrf
                        <div class="form-inputs">
                        <label for="taskName">Task name: </label>
                        <input type="text" name="task_name" id="taskName">
                        <input type="submit" value="submit" id="submit-task">
                        </div>
                    </form>
                </div>
                <div class="tasks">
                    <!-- tasks list -->
                    <ul class="task-list">
                        @foreach ($tasks as $task)
                        <li class="task">
                            <p class="task-name">{{$task->taks_name}}</p>
                            <div class="btns-cnt">
                                <form action="{{route('deleteTask', $task->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="delete-task" submit='submit'>Delete</button>
                                </form>
                                    <a href="{{route('editTask', $task->id)}}">
                                        <button class="delete-task" submit='submit'>update</button>
                                    </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </body>

</html>