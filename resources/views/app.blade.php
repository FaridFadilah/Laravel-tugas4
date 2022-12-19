<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/svg" href="{{ asset('checklist.svg') }}">
  <title>{{ $title }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('trix.css') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        fontFamily:{
          "sans" : ['Montserrat', "sans-serif"]
        },
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
    </script>
</head>
<body class="font-sans">
  <x-navbar/>
  {{ $content }}
  <x-footer/>
  <script src="{{ asset('trix.js') }}"></script>
</body>
</html>