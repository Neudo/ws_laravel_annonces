<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css">
    <title>Le mauvais coin - Annonce</title>
</head>
<body>


<h1>Voir Annonce : {{ $ad->title }}</h1>

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
    </div>

</div>


</body>
</html>
