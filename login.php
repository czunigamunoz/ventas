<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Pragma" content="no-cache">
<script type="text/javascript">
    if (history.forward(1))
        location.replace(history.forward(1));
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>The Wood Knot - Login</title>
</head>

<body>
    <div class="container">
        <form class="form" action="checkuser.php" method="POST">
            <div class="logo">
                <span class="logo-text">WK</span>
            </div>
            <h1 class="title">The Wood Knot</h1>
            <div class="container-area">
                <input class="input" id="email" type="email" name="email" autocomplete="email" onchange="valid()" required>
                <label class="label" for="email">Email</label>
                <span class="alert">Email is incorrect</span>
            </div>
            <div class="container-area">
                <input class="input" type="password" name="password" required>
                <label class="label" for="password">Password</label>
            </div>
            <input type="submit" class="btn" name="Login" value="LOGIN"> 
        </form>
    </div>
    <script>
        function valid(){
            const email = document.getElementById('email');
            const msn = document.querySelector('.alert');
            const reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            if(!reg.test(email.value)){
                msn.classList.add("alert-active");
            }else{
                msn.classList.remove("alert-active");
            }
        }        
    </script>
</body>

</html>