<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css">
    <title>Le mauvais coin</title>
</head>
<body>
<h1>Home</h1>

<a href="/new">Nouvelle annonce</a>

@if(session('status'))
    <div>
        <h3>{{session('status')}}</h3>
    </div>
@endif
<div class="liste-annonce">
    @foreach ($ads as $ad)
        <div class="card" style="background-color: grey; display: inline-block; padding: 30px">
            <div class="card-header">
                <h2>{{ $ad->title }}</h2>
                <p>{{ $ad->location }}</p>
            </div>
            <div class="card-body">
                <p>{{ $ad->description }}</p>
                <span>{{ $ad->price }}</span>
            </div>
            <div class="card-footer">
                {{ $ad->name }}
                <a href="/ad-delete/{{$ad->token}}">Supprimer l'annonce</a>
                <a href="/ad/{{$ad->token}}">Voir l'annonce</a>
            </div>

        </div>
    @endforeach

</div>
</body>
</html>
