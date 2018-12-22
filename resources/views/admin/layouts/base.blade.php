<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Panel | @yield('title')</title>
        <link rel="stylesheet" href="/css/app.css" />
    </head>
    <body>
        <div class="off-canvas position-left reveal-for-large" id="offCanvas" data-off-canvas>
            <ul class="vertical menu">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
            </ul>
        </div>
        <div class="off-canvas-content" data-off-canvas-content>
            <div class="title-bar">
                <div class="title-bar-left">
                    <button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
                    <span class="title-bar-title">{{ getenv('APP_NAME') }}</span>
                </div>
            </div>
            @yield('content')
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
