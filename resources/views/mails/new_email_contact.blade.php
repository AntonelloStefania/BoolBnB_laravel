{{-- <h1>Nuovo contatto ricevuto da form Bnb</h1>
<p>
    <strong style="color:red">Hai ricevuto un nuovo messaggio</strong>
    <strong>Utente: </strong> {{ $message->name }}
    <strong>Utente: </strong> {{ $message->surname }}

    <strong>Email: </strong>  {{ $message->email }}
    <strong>Contenuto: </strong>  {{ $message->message }}
</p> --}}

<html>
<head>
    <title>Nuovo contatto da form Bnb</title>
</head>
<body>
    <h1>Nuovo Messaggio da Form Bnb</h1>
    
    <p>Nome: {{ $message->name }}</p>
    <p>Cognome: {{$message->surname }}</p>
    <p>Email: {{ $message->email }}</p>
    <p>Messaggio: {{ $message->message }}</p>
</body>
</html>