<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wikiversary Download Portal</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; background: #f4f4f9; display: flex; justify-content: center; }
        .portal-container { max-width: 400px; width: 100%; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input[type="text"], input[type="email"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .download-btn { width: 100%; background: #007bff; color: white; border: none; padding: 12px; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 16px; margin-top: 10px; }
        .download-btn:hover { background: #0056b3; }
    </style>
</head>
<body>

<div class="portal-container">
    <h2>DCW Download Center</h2>
    <p>Please enter your details to download <strong>Wikiversary Certificate</strong>.</p>
    
    <!-- The form submits to download.php via POST -->
<!-- Change this line inside portal.php -->
<form action="https://dcwwiki.org/download.php" method="POST">
        <!-- Hidden input tells the script which file is being requested -->
        <input type="hidden" name="file" value="Aafi.svg">

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required placeholder="Striving tranquil">
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required placeholder="xyz@dcwwiki.org">
        </div>

        <button type="submit" class="download-btn">Verify & Download</button>
    </form>
</div>

</body>
</html>