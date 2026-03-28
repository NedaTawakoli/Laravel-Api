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
            color:wheat
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
     <form action="{{ URL('student') }}" method="GET">
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
     </form>
     <table style="width: 100%;border-collapse:collapse;margin-top:20px; background-image:linear-gradient(60deg,purple,orange,blue,violet,pink,red);border-radius:0 0 0 8px;">
        <tr>
            <th style="border: 1px solid;background-image:linear-gradient(60deg,rgb(211, 205, 205),rgb(247, 243, 243),rgb(235, 224, 224));color:purple; padding:15px 10px;">ID</th>
            <th style="border: 1px solid;background-image:linear-gradient(60deg,rgb(211, 205, 205),rgb(247, 243, 243),rgb(235, 224, 224));color:purple; padding:15px 10px;">Name</th>
            <th style="border: 1px solid;background-image:linear-gradient(60deg,rgb(211, 205, 205),rgb(247, 243, 243),rgb(235, 224, 224));color:purple; padding:15px 10px;">LastName</th>
            <th style="border: 1px solid;background-image:linear-gradient(60deg,rgb(211, 205, 205),rgb(247, 243, 243),rgb(235, 224, 224));color:purple; padding:15px 10px;">Gender</th>
            <th style="border: 1px solid;background-image:linear-gradient(60deg,rgb(211, 205, 205),rgb(247, 243, 243),rgb(235, 224, 224));color:purple; padding:15px 10px;">Age</th>
            <th style="border: 1px solid;background-image:linear-gradient(60deg,rgb(211, 205, 205),rgb(247, 243, 243),rgb(235, 224, 224));color:purple; padding:15px 10px;">Score</th>
            <th style="border: 1px solid;background-image:linear-gradient(60deg,rgb(211, 205, 205),rgb(247, 243, 243),rgb(235, 224, 224));color:purple; padding:15px 10px;">Update</th>
            <th style="border: 1px solid;background-image:linear-gradient(60deg,rgb(211, 205, 205),rgb(247, 243, 243),rgb(235, 224, 224));color:purple; padding:15px 10px;">Delete</th>
            {{-- <th style="border: 1px solid;background-image:linear-gradient(60deg,rgb(211, 205, 205),rgb(247, 243, 243),rgb(235, 224, 224));color:purple; padding:15px 10px;">Data-Of_birth</th> --}}
        </tr>
        @foreach ($student as $st)
        <tr>
        <td style="border: 1px solid;padding:5px 10px; color:white;text-align:center">{{ $st->id }}</td>
        <td style="border: 1px solid;padding:5px 10px; color:white;text-align:center">{{ $st->name }}</td>
        <td style="border: 1px solid;padding:5px 10px; color:white;text-align:center">{{ $st->lastName }}</td>
        <td style="border: 1px solid;padding:5px 10px; color:white;text-align:center">{{ $st->gender }}</td>
        <td style="border: 1px solid;padding:5px 10px; color:white;text-align:center">{{ $st->Age }}</td>
        <td style="border: 1px solid;padding:5px 10px; color:white;text-align:center">{{ $st->score }}</td>
        <td style="border: 1px solid;padding:5px 10px; color:white;text-align:center"><a href=" { URL('student/update/'.{{ $st->id }})}" > Update</a></td>
        <td style="border: 1px solid;padding:5px 10px; color:white;text-align:center"><a href="">Delete</a></td>
        {{-- <td style="border: 1px solid;padding:5px 10px; color:white">{{ $st->Date-of-bir }}</td> --}}
        </tr>
        @endforeach
     </table>
     <div style="display: flex;justify-content:space-between; color:purple;width:100%; gap:3px;">
        {{ $student->appends(request()->query())->links() }}
     </div>
    </div>
</body>
</html>
