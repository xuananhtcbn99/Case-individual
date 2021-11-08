<?php
session_start();

include_once "Controller/NoteController.php";
include_once "Controller/TypeController.php";

$noteController = new NoteController();
$typeController = new TypeController();

$page = $_GET["page"] ?? null;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="navbar">
        <a href="index.php?page=note-list">Notes</a>
        <a href="index.php?page=type-list">Type</a>
    </div>
    <?php
    switch ($page) {
        case "note-list":
            $noteController->index();
            break;

        case "type-list":
            $typeController->index();
            break;

        case "note-create":
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                //show form create
                $noteController->showFormCreate();
            } else {
                //tao san pham
                $noteController->create($_REQUEST);
            }
            break;
        case "note-delete":
            $noteController->deleteNote($_REQUEST["id"]);
            break;
        case "note-detail":
            $id = $_GET["id"];
            $noteController->showDetail($id);
            break;
        case "note-update":
            $id = $_GET["id"];
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $noteController->showFormUpdate();
            } else {
                $noteController->editNote($id, $_REQUEST);
            }

            break;


        case "type-create":
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                //show form create
                $typeController->showFormCreate();
            } else {
                //tao san pham
                $typeController->create($_REQUEST);
            }
            break;
        case "type-delete":
            $typeController->deleteType($_REQUEST["id"]);
            break;
        case "type-detail":
            $id = $_GET["id"];
            $typeController->showDetail($id);
            break;
        case "type-update":
            $id = $_GET["id"];
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $typeController->showFormUpdate();
            } else {
                $typeController->editType($id, $_REQUEST);
            }

            break;
        default:
            $noteController->index();
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>