<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>List</title>
</head>
<body>
	<div>
	    <h1>List</h1>
        @foreach ($questions as $question)
        <div>
            <h1>{{ $question->title }}</h1>
            <p>{{ $question->fulltext }}</p>
        </div>
        @endforeach
    </div>
</body>
</html>
