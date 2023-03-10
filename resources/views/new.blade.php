<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css">
    <title>Le mauvais coin - Ajouter une annonce</title>
</head>
<body>

@if(session('status'))
    <div>
        <h3>{{session('status')}}</h3>
    </div>
@endif

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form style="margin: 50px auto" action="" method="POST">
    @csrf
    <label for=""> Titre de l'annonce
        <input id="title" name="title" type="text">
    </label>

    <label for="">
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </label>

    <label for=""> Prix
        <input name="price" type="number" step="0.01">
    </label>

    <label for="">Ville de l'annonce
        <input name="location" type="text">
    </label>

    <label for="">Nom du vendeur
        <input name="name" type="text">
    </label>

    <label for="">Adresse email du vendeur
        <input name="email" type="email">
    </label>

    <button type="submit">Envoyer</button>

</form>

</body>
</html>
