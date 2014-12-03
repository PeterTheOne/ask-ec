<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>List</title>
</head>
<body>
	<div>
	    <h1>New Question</h1>
        {{ Form::open(array('url' => 'question/new')) }}
        {{ Form::text('title'); }}
        {{ Form::text('fulltext'); }}
        {{ Form::submit('Click Me!'); }}
        {{ Form::close() }}
    </div>
</body>
</html>
