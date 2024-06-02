<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles, Scripts -->
    @vite(['resources/css/app.css', 'resources/css/table.css', 'resources/js/app.js'])
    <script>
    </script>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50" style="padding-top: 25px;">
    <div class="content flex flex-col justify-center items-center">
        <div style="padding-bottom: 5px">
            <h1>
                👋 This thing is on!
            </h1>
        </div>
        <div>
            <table class="app-table">
                <caption class="font-semibold">
                    Status
                </caption>

                <tr>
                    <th>Status</th>
                    <th>Time</th>
                </tr>
                <tr>
                    <td>{{ $status }}</td>
                    <td>{{ $time }}</td>
                </tr>
            </table>
        </div>

        <div class="pt-3">
            <table class="app-table">
                <caption class="font-semibold">
                    Routes
                </caption>
                <tr>
                    <th>HTTP Method</th>
                    <th>URI</th>
                </tr>
                @foreach ($routes as $route)
                    <tr>
                        <td>{{ $route['methods'] }}</td>
                        <td>{{ $route['uri'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</body>
</html>
