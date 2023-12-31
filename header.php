<?php include"php/connection.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Leave Feedback</title>
    <style>
        .fadeOut{
            background-color: green;
            padding: 10px;
            color: white;
            opacity: 0;
            animation:fadeOut 5s forwards;
        }@keyframes fadeOut {
            0%{
                opacity: 1;
                filter: blur(0px);
            }
            100%{
                opacity: 0;
                filter: blur(5px);
            }
                 }
         .flex{
             display: flex;
             flex-direction: column;
             gap: 10px;
             justify-content: center;
             align-items: center;
         }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Traversy Media</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback.php">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/php-crash/feedback/about.html">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container d-flex flex-column align-items-center">