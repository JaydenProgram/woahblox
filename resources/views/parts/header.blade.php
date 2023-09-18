<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tesst</title>
    @vite('resources/css/app.css')

</head>
<body class="text-gray-700">
    <div> <!-- Header -->
        <div>
            <nav class ="font-semibold text-lg flex bg-gray-200">
                <div class="m-2 pr-6 w-36">
                        <a href="/"><img src="{{ Vite::asset('resources/images/woahlogo.png') }}"></a>
                </div>
                <div class="flex m-2">
                <ul class="flex space-x-20">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Discover</a>
                    </li>
                    <li>
                        <a href="#">Marketplace</a>
                    </li>
                    <li>
                        <a href="#">Create</a>
                    </li>
                </ul>
                <div>
                    <form class="ml-24 mr-20">
                        <label for="search">Search</label>
                        <input type="text" id="search" name="search">
                    </form>
                </div>
                <div class ="font-semibold text-lg ml-96">
                    <a href="#">Log in</a>
                    <a href="#" class="ml-2">Sign up</a>
                </div>
                </div>
            </nav>
        </div> <!-- End nav -->
    </div>
</body>
</html>
