<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<main class="container">

    <form method="POST">

        NAME : <input class="form-control" type="text" name="r1" required />

        YOUR SPECIALITY (PATIENT,HOSPITAL,...) <input class="form-control" type="text" name="r2" required />

        PHONE NUMBER <input class="form-control" type="text" name="r3" required />

        GROUP <input class="form-control" type="text" name="r4" required />

        GOVERNMENT <input class="form-control" type="text" name="r5" required />


        <button class="btn btn-danger mt-3" type="submit" name="sb">Sign up</button>

    </form>

    <?php

    $dsn = 'mysql:host=localhost; dbname=mydata; charset=utf8';
    $username = 'root';
    $password = '';

    $db = new PDO($dsn, $username, $password);

    if ($db) {
        if (isset($_POST['sb'])) {

            $sql = $db->prepare("INSERT INTO donor_data(NAME, SPECIALITY, PHONE, GROUP_, GOVERNMENT) VALUES(:n, :s, :p, :gr , :gov)");
            $sql->bindParam("n", $_POST['r1']);
            $sql->bindParam("s", $_POST['r2']);
            $sql->bindParam("p", $_POST['r3']);
            $sql->bindParam("gr", $_POST['r4']);
            $sql->bindParam("gov", $_POST['r5']);
            $sql->execute();

           echo '<div class="alert alert-info" >
             Successfully Submit
        </div>';
    }
        } 
     else {
        '<div class="alert alert-danger" >
             Error....Faild Connection 
        </div>';
    }



    ?>




</main>