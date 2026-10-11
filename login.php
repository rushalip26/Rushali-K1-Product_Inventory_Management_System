<?php
include "db.php";
session_start();
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $uname=$_POST["uname"];
    $pass=$_POST["password"];
    $sql=$conn->prepare("select id,name,password from users where username=?");
    $sql->bind_param("s",$uname);
    $sql->execute();
    $sql->bind_result($id,$name,$password);
    $sql->fetch();
    if (password_verify($pass,$password)) {
        $id=$_SESSION["id"];
        $uname=$_SESSION["uname"];
        $name=$_SESSION["name"];
        header("Location:home.php");
    }
}
?>
<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <h2 class="text-center pt-4">Login Here!!!</h2>
            <div
                class="container col-5 border rounded shadow p-4"
            >
                <form action="" method="POST">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="uname"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="formId1"
                            placeholder=""
                        />
                        <label for="formId1">Password</label>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>
                    
                </form>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
