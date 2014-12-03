<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>List</title>

    <script src="js/lib/jquery-1.11.1.min.js"></script>
    <script>
        $(function() {
            $('a.vote').on('click', function(event) {
                event.preventDefault();
                var link = $(this);
                $.post('question/' + $(this).data('id') + '/vote', function( data ) {
                    if (data.action == 'attached') {
                        link.html(data.voteCount + ' votes (voted)');
                    } else if (data.action == 'detached') {
                        link.html(data.voteCount + ' votes');
                    }
                });
            });
        });
    </script>
</head>
<body>
	<div>
	    <h1>List</h1>
        @foreach ($questions as $question)
        <div>
            <h1>{{ $question->title }}</h1>
            <p>{{ $question->fulltext }}</p>
            <a class="vote" data-id="{{$question->id}}" href="#">{{$question->voteCount}} votes</a>
        </div>
        @endforeach
    </div>
</body>
</html>
