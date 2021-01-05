<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito';
                justify-content: center;
                display: flex;
            }

            form {
                margin-top: 1em;
            }

            label {
                display: block;
            }

            .field {
                padding-bottom: 1em;
            }
        </style>
    </head>
    <body class="antialiased">
        <form action="/" method="POST">
            @csrf

            <div class="field">
                <label>Email</label>
                <input name="email" required>
            </div>

            <div class="field">
                <label>Queue?</label>
                <input type="checkbox" name="should_queue" checked>
            </div>

            <button style="display: block" type="submit">Send</button>
        </form>
    </body>
</html>
