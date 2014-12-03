<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>List</title>
</head>
<body>
	<div>
	    <h1>Login</h1>
        {{ Form::open(array('url' => 'login', 'method' => 'post')); }}

        <!-- username field -->
        <p>
            {{ Form::label('username', 'Username'); }}<br/>
            {{ Form::text('username', Input::old('username')); }}
        </p>

        <!-- password field -->
        <p>
            {{ Form::label('password', 'Password'); }}<br/>
            {{ Form::password('password'); }}
        </p>

        <!-- submit button -->
        <p>{{ Form::submit('Login'); }}</p>

        {{ Form::close(); }}
    </div>
</body>
</html>
