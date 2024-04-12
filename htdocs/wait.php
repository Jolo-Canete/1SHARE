<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verification</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 400px;
            width: 90%;
        }

        h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .spinner {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top-color: #0fc9e7;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .availability {
            font-size: 1rem;
            color: red;
        }

        .emoji {
            font-size: 3rem;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="emoji">🔍👀</div>
        <h1>HANG TIGHT!</h1>
        <p>Your account is currently under review by our super hardworking admin.</p>
        <p>Please be patient, it'll be worth the wait!</p>
        <div class="spinner"></div>
        <p class="availability">Please note: Account verification may take between 30 minutes to 6 hours and is only applicable during Monday to Friday (excluding holidays).</p>
    </div>
</body>

</html>