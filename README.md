# Laravel OpenAI

## Steps to run this project on local machine

Clone your project      
Go to the folder application using cd command on your cmd or terminal      
Run composer install on your cmd or terminal           
Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu       
No Database needed here
Run php artisan key:generate       
Run php artisan serve     

After signing to OpenAI go to https://platform.openai.com/account/api-keys    
and create a new secret key and paste it in .env as
OPENAI_API_KEY=YOUR_API_KEY_HERE

Go to http://localhost:8000/   


### Helpful code example from project

## How to Use guzzlehttp to fetch APIs inside your controllers in laravel
```
class ApiController extends Controller
{
    public function fetchApiData(Request $request)
    {
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            "headers" => [
                "Content-Type" => "application/json",
                "Authorization" => "Bearer ". env('OPENAI_API_KEY')
            ],
            "json" => [
                "model"=> "gpt-3.5-turbo",
                "messages"=> [
                    [
                        "role"=> "user",
                        "content" => $request->data
                    ]
                ]
            ]
        ]);

        $result = json_decode($response->getBody());
        echo json_encode($result, JSON_PRETTY_PRINT);
    }
```

This function provides description about any topics to frontend in response json_encoded.


### Route for above function
```
Route::post("festivalData", [ApiController::class, "fetchApiData"])->name("fetchFestival");
```


### Ajax used in front-side

```
    $.ajax({
      url: "{{route('fetchFestival')}}",
      type: 'POST',
      data:{
        '_token': "{{csrf_token()}}",
        'festival' : festival
      },
      success: function(res){
        res = JSON.parse(res);
        contentArea.innerHTML = res.choices[0].message.content;
      }
    })
```


### Debounce function used to decline accidental frequent presses on buttons which triggers apis
```
   function debounce(func, wait, immediate) {
      var timeout;
      return function() {
          var context = this, args = arguments;
          var later = function() {
              timeout = null;
              if (!immediate) func.apply(context, args);
          };
          var callNow = immediate && !timeout;
          clearTimeout(timeout);
          timeout = setTimeout(later, wait);
          if (callNow) func.apply(context, args);
      };  
    };
```


### Blade Starter code for 
![image](https://user-images.githubusercontent.com/104665278/235228449-48af7507-800b-4ab1-9a06-9c628e794d2f.png)

Main.blade.php
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    @stack('title')
</head>
<body>
    @include('layouts.head')
    <div class="container main-section">
        @yield('main-section')
    </div>
</body>
<script>
</script>
</html>
```

index.blade.php
```
@extends('layouts.main')
@section('main-section')

    @push('title')
        <title>Fetival India</title>
    @endpush
    
    <!--  Your code here  -->

@endsection
```
Same layout for about section, so it can extend main.py layout when clicked

![image](https://github.com/PrathameshPawar119/Laravel-OpenAI/assets/104665278/89cd2848-6d61-4dfb-a31d-fd7a91dcd621)

![image](https://github.com/PrathameshPawar119/Laravel-OpenAI/assets/104665278/035cc53a-c737-446c-bb58-a3b4cbda6739)



