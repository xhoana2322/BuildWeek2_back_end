<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <x-app-layout>
        <div class="bg-dark">
            <div class="hero bg-primary" style="margin-top: 0rem; height: 30rem;">
                <!-- Carosello Hero -->
                @include ('components.herocarousel')
            </div>
            <!-- Lista dei libri -->
            @include ('components.listalibricarousel')
        </div>
    </x-app-layout>
</body>

</html>