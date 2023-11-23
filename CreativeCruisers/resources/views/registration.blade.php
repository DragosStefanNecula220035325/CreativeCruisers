<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="d-flex p-2">
    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h2>Register</h2>
    <form method = "{{route('registration.post')}}" method="post" >
        Name: <input type="text" name="name" /><br>
        Password: <input type="password" name="password" /><br><br>
        Email: <input type="text" name="email" /><br><br>

        <button type="submit" name="submitted" value="TRUE" class="btn btn-primary">Register</button>
        <button type="reset" class="btn btn-primary">Clear</button>
    </form>  
    <p> Already a user? <a href="login">Log in</a>  </p>
    </div>
    </div>
    </div>
    
</body>
</html>