<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message</title>
</head>
<body>
    <h2>Hai ricevuto un nuovo messagio</h2>
    <div>
        <h3>Name:</h3>
        <p> {{ $lead->name }}</p>
        <h3>Email:</h3>
        <p> {{ $lead->email }}</p>
        <h3 >Message:</h3>
        <p> {{ $lead->message }}</p>
    </div>
    
</body>
</html>