<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Confirmacion de cuenta en ManLab</h1>
    <p>¡Gracias por registrarte en nuestro sitio! {{ $user->name }} Por favor, confirma tu dirección de correo electrónico haciendo clic en el siguiente botón:</p>
    <a href="{{ route('send-email.confirm', ['token' => $user->token]) }}" target="_blank" style="background-color: #007BFF; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Confirmar Correo Electrónico</a>
    
</body>
</html>