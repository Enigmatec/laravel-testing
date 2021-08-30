<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    @can('isUser')
    <button>User</button>
    @elsecan('isSubAdmin')
    <button>Sub-Admin</button>
    @elsecan('isAdmin')
    <button>Admin</button>
    @endcan
</body>
</html>