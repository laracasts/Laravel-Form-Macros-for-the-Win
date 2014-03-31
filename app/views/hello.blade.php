<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>

<div class="container" style="margin-top: 50px;">
    {{ Form::textField('username', 'Username:') }}
    {{ Form::textField('email', 'Email:') }}
    {{ Form::textField('age', 'Age:') }}
</div>

</body>
</html>
