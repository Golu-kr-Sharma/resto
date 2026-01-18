<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

include("../includes/db.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM foods WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $desc = $_POST['description'];

    if(!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "../assets/images/food/".$image);

        $sql = "UPDATE foods SET 
                name='$name',
                description='$desc',
                price='$price',
                category='$category',
                image='$image'
                WHERE id=$id";
    } else {
        $sql = "UPDATE foods SET 
                name='$name',
                description='$desc',
                price='$price',
                category='$category'
                WHERE id=$id";
    }

    mysqli_query($conn, $sql);
    header("Location: manage-food.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resto | Edit Dish</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --gold: #c5a059;
            --bg: #0a0a0a;
            --card: #161616;
            --input: #222222;
        }

        body {
            background-color: var(--bg);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .header-area {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 40px;
            border-bottom: 1px solid rgba(197, 160, 89, 0.2);
            padding-bottom: 20px;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            color: var(--gold);
            margin: 0;
        }

        .back-link {
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .back-link:hover { color: var(--gold); }

        /* --- STUDIO LAYOUT --- */
        .edit-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 50px;
            background: var(--card);
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.5);
        }

        /* --- IMAGE SIDE --- */
        .image-preview-section {
            text-align: center;
        }

        .current-img-label {
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 15px;
            display: block;
        }

        .img-container {
            width: 100%;
            height: 350px;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #333;
            margin-bottom: 20px;
            position: relative;
        }

        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .btn-upload {
            border: 1px dashed var(--gold);
            color: var(--gold);
            background: transparent;
            padding: 15px;
            border-radius: 10px;
            width: 100%;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-upload:hover { background: rgba(197, 160, 89, 0.05); }

        /* --- FORM SIDE --- */
        .form-group { margin-bottom: 25px; }

        label {
            font-size: 0.75rem;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            display: block;
        }

        input, textarea {
            width: 100%;
            padding: 15px;
            background: var(--input);
            border: 1px solid #333;
            border-radius: 12px;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
            transition: 0.3s;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--gold);
            background: #2a2a2a;
        }

        .update-btn {
            width: 100%;
            padding: 20px;
            background: var(--gold);
            color: #000;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: 0.4s;
            margin-top: 10px;
        }

        .update-btn:hover {
            background: #fff;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

    </style>
</head>
<body>

<div class="container">
    <div class="header-area">
        <h2>Refine Dish</h2>
        <a href="manage-food.php" class="back-link">← Return to Inventory</a>
    </div>

    <form method="post" enctype="multipart/form-data" class="edit-grid">
        
        <div class="image-preview-section">
            <span class="current-img-label">Current Masterpiece</span>
            <div class="img-container">
                <img src="../assets/images/food/<?php echo $row['image']; ?>" id="main-preview">
            </div>
            
            <label>Update Imagery</label>
            <div class="file-input-wrapper">
                <input type="file" name="image" id="file-input" onchange="previewImage(this)" style="display:none;">
                <button type="button" class="btn-upload" onclick="document.getElementById('file-input').click()">
                    Change Dish Photo
                </button>
            </div>
        </div>

        <div class="form-side">
            <div class="form-group">
                <label>Dish Name</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            </div>

            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" value="<?php echo $row['category']; ?>" required>
            </div>

            <div class="form-group">
                <label>Price (₹)</label>
                <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>" required>
            </div>

            <div class="form-group">
                <label>Culinary Description</label>
                <textarea name="description" rows="5" required><?php echo $row['description']; ?></textarea>
            </div>

            <button name="update" class="update-btn">Confirm Changes</button>
        </div>
    </form>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('main-preview').src = e.target.result;
                document.getElementById('main-preview').style.opacity = '0.7';
                setTimeout(() => { document.getElementById('main-preview').style.opacity = '1'; }, 200);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>
</html>