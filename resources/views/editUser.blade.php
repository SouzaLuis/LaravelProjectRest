<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <form action="{{ route('users.editUser', ['user' => $user->id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="">Username</label>
        <input type="text" name="username" value="{{ $user->name }}">

        <label for="">Email</label>
        <input type="email" name="email" value="{{ $user->email }}">

        <label for="">Password</label>
        <input type="password" name="password">

        <input type="submit" value="Edit User">
        <button><a href="{{ route('users.listAll') }}">Voltar</a></button>
    </form>
</body>
</html>