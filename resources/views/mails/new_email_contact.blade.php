

<html>
<head>
    <title>Nuovo contatto da form Bnb</title>
</head>
<body>
    <h1>Nuovo Messaggio da Form Bnb</h1>

<p>Nome: {{ $messageData['name'] }}</p>
<p>Cognome: {{ $messageData['surname'] }}</p>
<p>Email: {{ $messageData['email'] }}</p>
<p>Messaggio: {{ $messageData['message'] }}</p>
<p>ID dell'appartamento: {{ $messageData['apartment_id'] }}</p>
</body>
</html>