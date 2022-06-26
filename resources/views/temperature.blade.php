<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Weather</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .justify-center {
            justify-content: center
        }

        .mt-8 {
            margin-top: 2rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem;
            color: #a0aec0;
        }

        .p-6 a {
            color: #ffffff;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .relative {
            position: relative
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .grid-cols-1 {
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        .the_form input {
            min-height: 30px;
            border-radius: 5px;
        }

        .the_form label {
            color: #c8d2e0;
        }

        @media (min-width: 640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            @media (min-width: 768px) {
                .md\:border-t-0 {
                    border-top-width: 0
                }

                .md\:border-l {
                    border-left-width: 1px
                }

                .md\:grid-cols-2 {
                    grid-template-columns:repeat(2, minmax(0, 1fr))
                }
            }

            @media (min-width: 1024px) {
                .lg\:px-8 {
                    padding-left: 2rem;
                    padding-right: 2rem
                }
            }

            @media (prefers-color-scheme: dark) {
                .dark\:bg-gray-800 {
                    --bg-opacity: 1;
                    background-color: #2d3748;
                    background-color: rgba(45, 55, 72, var(--bg-opacity))
                }

                .dark\:bg-gray-900 {
                    --bg-opacity: 1;
                    background-color: #1a202c;
                    background-color: rgba(26, 32, 44, var(--bg-opacity))
                }

                .dark\:border-gray-700 {
                    --border-opacity: 1;
                    border-color: #4a5568;
                    border-color: rgba(74, 85, 104, var(--border-opacity))
                }

                .dark\:text-white {
                    --text-opacity: 1;
                    color: #fff;
                    color: rgba(255, 255, 255, var(--text-opacity))
                }

                .dark\:text-gray-400 {
                    --text-opacity: 1;
                    color: #cbd5e0;
                    color: rgba(203, 213, 224, var(--text-opacity))
                }

                .dark\:text-gray-500 {
                    --tw-text-opacity: 1;
                    color: #6b7280;
                    color: rgba(107, 114, 128, var(--tw-text-opacity))
                }
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-1">
            <div class="p-6">
                <label class="label" for="country">Country: {{ $country }}</label><br>
                <label class="label" for="city">City: {{ $city }}</label><br>
                <label class="label" for="city">Temperature: {{ $temperature }}</label><br>
                <a href="{{ route('home') }}">Back</a>
            </div>
        </div>
    </div>

</div>
</body>
</html>
