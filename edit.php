<?php
include "db.php";

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $sql = $conn->prepare("select * from products where pid = ?");
    $sql->bind_param("i", $pid);
    $sql->execute();

    $user = $sql->get_result()->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $pname = $_POST["pname"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $description=$_POST["description"];
    $sql = $conn->prepare("update products set pname = ?, category = ?, price = ?, quantity = ?, description=? where pid = ?" );
    $sql->bind_param("ssdisi", $pname,$category,$price,$quantity,$description,$pid);
    if ($sql->execute()) {
        header("Location: home.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="en" data-bs-theme="light">

<head>

    <title>Edit Product</title>

    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    />

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    />

</head>

<body>

<main>

<div class="container col-5 p-3 border mt-4 rounded shadow">

    <form action="" method="POST">
        <input
        type="hidden"
        name="pid"
        value="<?php echo $user['pid']; ?>"
    >

        <div class="form-floating mb-3">

            <input
                type="text"
                class="form-control"
                name="pname"
                id="pname"
                placeholder=""
                value="<?php echo $user['pname']; ?>"
            />

            <label for="pname">
                Product Name
            </label>

        </div>
        <div class="form-floating mb-3">

            <input
                type="text"
                class="form-control"
                name="category"
                id="category"
                placeholder=""
                value="<?php echo $user['category']; ?>"
    
            />

            <label for="category">
                Category
            </label>

        </div>
        <div class="form-floating mb-3">

            <input
                type="number"
                class="form-control"
                name="price"
                id="price"
                placeholder=""
                value="<?php echo $user['price']; ?>"
            />

            <label for="pprice">
                Product Price
            </label>

        </div>
        <div class="form-floating mb-3">

            <input
                type="number"
                class="form-control"
                name="quantity"
                id="quantity"
                placeholder=""
                value="<?php echo $user['quantity']; ?>"

            />

            <label for="quantity">
                Quantity
            </label>

        </div>
        <div class="form-floating mb-3">

            <input
                type="text"
                class="form-control"
                name="description"
                id="description"
                placeholder=""
                value="<?php echo $user['description']; ?>"
    
            />

            <label for="category">
                Description
            </label>

        </div>
        <button
            type="submit"
            class="btn btn-primary"
        >
            Update
        </button>

    </form>

</div>

</main>

</body>

</html>