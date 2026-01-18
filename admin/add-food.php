<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

include("../includes/db.php");

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $desc = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../assets/images/food/".$image);

    $sql = "INSERT INTO foods (name,description,price,image,category)
            VALUES ('$name','$desc','$price','$image','$category')";
    mysqli_query($conn, $sql);
    $success = "Dish added successfully to the vault.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resto | Add New Creation</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --gold: #c5a059;
            --bg: #0f0f0f;
            --card: #1a1a1a;
            --input: #252525;
        }

        body {
            background-color: var(--bg);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--gold);
            margin: 0;
        }

        .back-link {
            color: #888;
            text-decoration: none;
            transition: 0.3s;
        }

        .back-link:hover { color: var(--gold); }

        /* --- FORM GRID --- */
        .add-food-card {
            background: var(--card);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(255,255,255,0.05);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .form-group { margin-bottom: 20px; }

        label {
            display: block;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--gold);
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            background: var(--input);
            border: 1px solid #333;
            border-radius: 8px;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        input:focus { outline: 1px solid var(--gold); border-color: var(--gold); }

        /* --- IMAGE UPLOAD PREVIEW --- */
        .image-upload-box {
            width: 100%;
            height: 100%;
            min-height: 300px;
            background: #121212;
            border: 2px dashed #333;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        #preview-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
            position: absolute;
        }

        .upload-placeholder { text-align: center; color: #555; }

        .btn-submit {
            grid-column: span 2;
            padding: 18px;
            background: var(--gold);
            color: #000;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover { transform: translateY(-3px); background: #fff; }

        .success-banner {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid rgba(46, 204, 113, 0.2);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-flex">
        <h2>Add New Creation</h2>
        <a href="manage-food.php" class="back-link">← Cancel and Exit</a>
    </div>

    <?php if(isset($success)) echo "<div class='success-banner'>$success</div>"; ?>

    <form method="post" enctype="multipart/form-data" class="add-food-card">
        
        <div class="details-side">
            <div class="form-group">
                <label>Dish Name</label>
                <input type="text" name="name" placeholder="e.g. Truffle Risotto" required>
            </div>

            <div class="form-group">
                <label>Price (₹)</label>
                <input type="number" name="price" placeholder="499" required>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select name="category">
                    <option>Starters</option>
                    <option>Main Course</option>
                    <option>Desserts</option>
                    <option>Drinks</option>
                </select>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="4" placeholder="Describe the flavors..."></textarea>
            </div>
        </div>

        <div class="image-side">
            <label>Food Portrait (AI Image)</label>
            <div class="image-upload-box" onclick="document.getElementById('image-input').click();">
                <img id="preview-img">
                <div class="upload-placeholder" id="placeholder-text">
                    <span style="font-size: 2rem;">📷</span><br>
                    Click to Upload Image
                </div>
                <input type="file" name="image" id="image-input" style="display:none;" onchange="previewFile()" required>
            </div>
        </div>

        <button type="submit" name="add" class="btn-submit">Save to Menu</button>
    </form>
</div>

<script>
    function previewFile() {
        const preview = document.getElementById('preview-img');
        const file = document.getElementById('image-input').files[0];
        const reader = new FileReader();
        const placeholder = document.getElementById('placeholder-text');

        reader.addEventListener("load", function () {
            preview.src = reader.result;
            preview.style.display = "block";
            placeholder.style.display = "none";
        }, false);

        if (file) { reader.readAsDataURL(file); }
    }
</script>

</body>
</html>