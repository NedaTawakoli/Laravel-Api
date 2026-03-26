<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
            background-color: black;
        }
        .search{
         max-width: 960px;
         margin:12px auto;
         width:100%;
        }
        div.search>form{
            display: flex;
            padding:12px;
            gap:5px;
        }
        input{
            padding:13px 22px;
            width: 90%;
            border:1px solid purple;
            box-shadow: 3px 4px 15px purple;
        }
        button{
            padding:10px 23px;
            border-radius: 5px;
            border: 1px solid purple;
            color:white;
            background-image: linear-gradient(60deg,blue,purple,pink)
        }
    </style>
</head>
<body>
    <div class="search">
     <form action="" method="post">
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
     </form>
    </div>
</body>
</html>
