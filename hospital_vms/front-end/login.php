<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Visitor Entry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main-container">

    <div class="left-panel">
        <h1>Hospital Visitor System</h1>
        <p>Secure Visitor Registration Portal</p>
    </div>

    <div class="right-panel">
        <div class="form-card">

            <h2>Visitor Entry</h2>

            <form action="save.php" method="POST">

                <div class="input-group">
                    <input type="text" name="v_name" placeholder="Visitor Name" required>
                </div>

                <div class="input-group">
                    <input type="text" name="v_phone" placeholder="Phone Number" required>
                </div>

                <div class="input-group">
                    <input type="text" name="v_meet" placeholder="Person to Meet" required>
                </div>

                <div class="input-group">
                    <textarea name="v_purpose" placeholder="Reason for Visit" required></textarea>
                </div>

                <button type="submit">Submit Record</button>

            </form>

        </div>
    </div>

</div>

</body>


</html>