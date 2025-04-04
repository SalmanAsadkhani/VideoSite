<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://fonts.cdnfonts.com/css/iranian-sans" rel="stylesheet">

    <style>
        @font-face {
            font-family: "Iranian Sans";
            url('https://fonts.cdnfonts.com/css/iranian-sans');
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Iranian Sans', sans-serif;
            height: 100vh;
            background-image: linear-gradient(to top, #2e1753, #1f1746, #131537, #0d1028, #050819);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden
        }

        .text {
            position: absolute;
            top: 10%;
            color: #fff;
            text-align: center
        }

        h1 {
            font-size: 50px
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #fff;
            right: 0;
            animation: starTwinkle 3s infinite linear
        }

        .astronaut img {
            width: 100px;
            position: absolute;
            top: 55%;
            animation: astronautFly 6s infinite linear
        }

        @keyframes astronautFly {
            0% {
                left: -100px
            }
            25% {
                top: 50%;
                transform: rotate(30deg)
            }
            50% {
                transform: rotate(45deg);
                top: 55%
            }
            75% {
                top: 60%;
                transform: rotate(30deg)
            }
            100% {
                left: 110%;
                transform: rotate(45deg)
            }
        }

        @keyframes starTwinkle {
            0% {
                background: rgb(255 255 255 / .4)
            }
            25% {
                background: rgb(255 255 255 / .8)
            }
            50% {
                background: rgb(255 255 255)
            }
            75% {
                background: rgb(255 255 255 / .8)
            }
            100% {
                background: rgb(255 255 255 / .4)
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var body = document.body;
            setInterval(createStar, 100);

            function createStar() {
                var right = Math.random() * 500;
                var top = Math.random() * screen.height;
                var star = document.createElement("div");
                star.classList.add("star");
                body.appendChild(star);
                setInterval(runStar, 10);
                star.style.top = top + "px";

                function runStar() {
                    if (right >= screen.width) {
                        star.remove()
                    }
                    right += 3;
                    star.style.right = right + "px"
                }
            }
        })
    </script>

</head>
<body>
<div class="text">
    <div>ارور</div>
    <h1>@yield('code')</h1>
    <hr>
    <div>@yield('message')</div>
</div>
<div class="astronaut"><img
            src="https://images.vexels.com/media/users/3/152639/isolated/preview/506b575739e90613428cdb399175e2c8-space-astronaut-cartoon-by-vexels.png"
            alt="" class="src"></div>
</body>

</html>
