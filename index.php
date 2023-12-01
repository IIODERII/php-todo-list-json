<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP ToDo List JSON</title>
</head>

<body>

    <div id="app">
        <div class="container py-3">
            <header class="text-center p-3">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Pirate_Flag.svg/2560px-Pirate_Flag.svg.png
                " alt="logo">
                <div class="d-sm-flex justify-content-around py-4 align-items-center">
                    <select name="filter" id="filter" v-model="filterValue" class="bg-dark text-white">
                        <option value="">Tutti</option>
                        <option value="done">Fatti</option>
                        <option value="undone">Da fare</option>
                    </select>
                    <input type="text" class="form-control w-75 mx-3 bg-dark text-white my-3 mx-auto mx-sm-2"
                        v-model="newTask" @keyup.enter="addTask">
                    <button class="btn btn-dark text-nowrap" @click="addTask">Add Task</button>
                </div>
                <p class="text-white fs-3">Bene capitano, queste sono tutte le cose che sono rimaste da fare prima di
                    salpare
                </p>
            </header>
            <main>
                <ul class="list-group" v-if="filteredTasks.length > 0">

                    <li class="list-group-item list-group-item-action d-flex justify-content-between bg-dark text-white"
                        v-for="(todo,index) in filteredTasks" :key="todo.id">
                        <span :class="{'done': todo.done}" @click="toggleDone(todo.id)">{{todo.text}}</span>
                        <i class="fa-solid fa-trash" @click="removeTask(todo.id)"></i>
                    </li>

                </ul>
                <div v-else class="text-center">
                    <h3 class="text-white fs-1 display-1 fw-bold">Tutto fatto! Ora è il momento di salpare</h3>
                </div>
            </main>
        </div>
    </div>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="js/script.js"></script>
</body>

</html>