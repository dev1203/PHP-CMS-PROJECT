<!DOCTYPE html>
<html>
<head>
    <title>Main Page</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./css/sign_style.css">
<body>
<div class="container box">
    <div class="row">
        <div class="col-sm-6 image">
            <p class="sign_up">We don't know each other, Why not<span id="new_register"> Sign Up</span>?</p>
        </div>
        <form method="post">
            <div class="col-sm-6 white">
                <div class="content">
                    <h3 class="text_area">SIGN IN</h3>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email_sign" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="Password_sign"placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit_sign">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="sign_up_page" class="container">
    <div class="row sign_up_style">
        <div class="col-sm-12 modal_page">
            <h3 class="text">SIGN UP</h3>
            <div class="form-group">
                <label for="Name">UserName</label>
                <input type="Name" class="form-control" id="Name" aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="	emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password"placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            <button type="submit" class="btn btn-primary" id="back">Back</button>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src='./js/sign_in_script.js'></script>
</body>
</html>