<?php

$filecontent = file_get_contents("todo-list.json");

// var_dump($filecontent);

$list = json_decode($filecontent, true);

if (isset($_POST['addTask'])) {
    $newTask = [
        'text' => $_POST['addTask'],
        'done' => false
    ];
    $list[] = $newTask;
    file_put_contents('todo-list.json', json_encode($list));
}

if (isset($_POST['deleteTask'])) {
    $index = $_POST['deleteTask'];
    array_splice($list, $index, 1);
    file_put_contents('todo-list.json', json_encode($list));
}

if (isset($_POST['toggleDone'])) {
    $index = $_POST['toggleDone'];
    $list[$index]['done'] = !$list[$index]['done'];
    file_put_contents('todo-list.json', json_encode($list));
}


header('Content-Type: application/json');

echo json_encode($list);
?>