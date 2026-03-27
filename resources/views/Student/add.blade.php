<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color:black;">
    <div style=" width:100%; padding:0;display:flex;margin:20px auto;">
     <div style="border:1px solid; width:70%;margin:10px auto; background-image:linear-gradient(60deg,purple,blue,violet,yellow);">
        <h1 style="text-align:center;">Add Student</h1>
        <form action="{{ URL("student/create") }}" method="POST" style="width:70% ;margin:5px auto;background-color:transparent; display:flex;flex-direction:column; gap:15px">
            @csrf
            <input type="text" name="name" placeholder="Enter your name" style="padding:15px 4px;width:100%;focus:outline:0;border:1px solid white;border-radius:3px;">
            <input type="text" name="lastName" placeholder="Enter your lastName" style="padding:15px 4px;width:100%;focus:outline:0;border:1px solid white;border-radius:3px;">
            <input type="number" name="age" placeholder="Enter your Age" style="padding:15px 4px;width:100%;focus:outline:0;border:1px solid white;border-radius:3px;">
            <input type="number" name="score" placeholder="Enter your score" style="padding:15px 4px;width:100%;focus:outline:0;border:1px solid white; border-radius:3px;">
            <label for="" style="color:white;font-size:25px">Gender</label>
            <div style="width:100%;display:flex;gap:20px;color:white;">
            male <input type="radio" name="gender" value="m"/>
            female <input type="radio" name="gender" value="f"/>
            </div>
            <button type="submit" style="padding:10px 0; background-color:transparent;border:0; box-shadow:3px 3px 5px black;color:white;font-size:20px; margin:10px 0;">Save</button>
        </form>
     </div>
    </div>
</body>
</html>
