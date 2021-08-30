<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="card" style="margin-top:100px;">
                    <div class="card-header">
                        Enter your login credential
                    </div>
                    <div class="card-body">
                        <form action="{{route('login.user')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="">Email Address:</label>
                                <input type="text" class="form-control" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <label for="">Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <button class="btn btn-block btn-primary mt-2">LOGIN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>