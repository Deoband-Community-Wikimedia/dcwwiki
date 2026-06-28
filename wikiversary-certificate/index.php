<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participation Certificate Zone - Deoband Community Wikimedia</title>
    <link rel="icon" type="image/svg+xml" href="../images/4/40/DCW_logo.svg">
</head>
    <style>
        :root {
            --primary-color: #007bff;
            --background: #f4f5f7;
            --card-bg: #ffffff;
            --text-color: #333333;
            --border-color: #e0e0e0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background);
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Wikiversary_%E2%80%94_9_February_2026_-_image_3.jpg/960px-Wikiversary_%E2%80%94_9_February_2026_-_image_3.jpg');
            display: flex;
            justify-content: center;
            display: flex;
            min-height: 100vh;
            color: var(--text-color);
            align-items: center;
            min-height: 100vh;
            color: var(--text-color);
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .container {
            background-color: var(--card-bg);
            padding: 30px 40px;
            border-radius: 6px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15); /* Slightly deeper shadow for contrast */
            width: 100%;
            max-width: 450px;
            box-sizing: border-box;
         
        }

        .container h1 {
            color: #222222;
            font-size: 22px;
            margin-top: 0;
            margin-bottom: 15px;
        }

        .subtitle {
            font-size: 14px;
            color: #444444;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            font-size: 13px;
            color: #555555;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            color: #333;
            transition: border-color 0.2s;
        }

        .form-group input::placeholder {
            color: #999999;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .btn-submit {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 20px;
            width: 100%;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #0069d9;
        }

        .error-message {
            color: #d9534f;
            background-color: #f9f2f2;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 13px;
            display: none;
        }

        .success-message {
            color: #155724;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 13px;
            display: none;
        }

        <?php if (isset($_GET['error'])): ?>
        .error-message {
            display: block;
        }
        <?php endif; ?>
    </style>
</head>
<body>

<div class="container">
    <h1>DCW Download Center</h1>
    <div class="subtitle">
        We are currently hosting <b>Wikiversary Conference</b> certificates only.
    </div>
    
    <div class="error-message">
        <?php 
            if (isset($_GET['error'])) {
                echo htmlspecialchars($_GET['error']);
            }
        ?>
    </div>

    <div class="success-message" id="successMsg">
        Verification successful, and certificate downloaded. Kindly check your Downloads Folder!
    </div>

    <form action="generate.php" method="POST" onsubmit="document.querySelector('.error-message').style.display='none'; setTimeout(() => { document.getElementById('successMsg').style.display='block'; }, 800);">
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" required placeholder="Striving tranquil">
        </div>
        
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required placeholder="xyz@dcwwiki.org">
        </div>
        
        <button type="submit" class="btn-submit">Verify & Download</button>
    </form>
</div>

</body>
</html>
<form action="generate.php" method="POST" onsubmit="document.querySelector('.error-message').style.display='none'; setTimeout(() => { document.getElementById('successMsg').style.display='block'; }, 800);">
 