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
    <form action="{{route('login.post')}}" method="POST">
        @csrf
        <label>Email</label>
        <input type="text" name="email" id="email" size="20" maxlength="25" /><br>
        <label>Password:</label>
        <input type="password" name="password" id="password" size="20" maxlength="25" /><br>
        
        <button type="submit" name="submitted" value="TRUE" class="btn btn-primary">Login</button>
        <button type="reset" class="btn btn-primary">Clear</button>
        <p>
            Not registered yet? <a href="registration">register</a>
        </p>
        </form>
    </div>
    </div>
    </div>
</body>
</html>