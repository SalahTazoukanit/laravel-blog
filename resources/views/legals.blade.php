<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>legals</title>
</head>
<body>
   

    <h1>{{ $title }}</h1>

    {{$content}}

    @if(count( $items ) > 0)

        @foreach ($items as $item)
        
            <p>{{$item}}</p>

        @endforeach  

    @else
        No items ;
    
    @endif
    


</body>
</html>