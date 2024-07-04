<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSCL :: Something Went Wrong</title>
</head>

<body>
    <style>
        .error_container {
            padding: 50px;
        }

        .error_container h1 {
            margin: 0 auto;
            text-align: center;
            font-size: 120px;
        }

        .error_container h2,
        p {
            text-align: center;
        }

        .error_container .contant_box_404_animation {

            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            min-height: 350px;
            background-position: center;
            width: 80%;
            margin: 0 auto;
        }

        .error_container .link_404 {
            padding: 10px 20px;
            text-align: center;
            background-color: #cc050c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 0 auto;
        }

        .error_container .button_div {
            display: flex;
            justify-content: center;
        }

        @media(max-width: 576px) {
            .error_container .contant_box_404_animation {
                width: 100%;
            }

            .error_container {
                padding: 0px;
            }
        }
    </style>
    <div class="error_container">
        <h1>404</h1>
        <div class="error_body">
            <h2>Look like you're lost </h2>
        </div>
        <div class="contant_box_404_animation"></div>
        <p>the page you are looking for not available!</p>
        <div class="button_div">
            <a href="{{ route('/') }}" class="link_404">Go to Home</a>
        </div>
    </div>
</body>

</html>