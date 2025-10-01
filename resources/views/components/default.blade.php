<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="font-family:Verdana, Geneva, Tahoma, sans-serif;">
    {{ $slot }}
</body>

</html>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .bg-color {
        background-color: #fffcfa;
    }
    .border-color {
        border-color: #f9ebe7;
    }
    .input-color {
        background-color: #fdf7f3;
    }
    .btn-color {
        background-color: #f9ebe7;
    }
    .border-brown {
        border-color: #e9dbd6;
    }

    input:focus-within {
        outline-offset: 2px;
        outline-style: solid;
        outline-width: 0px;
        outline-color: gray;
        box-shadow: none;
    }
</style>