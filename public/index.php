<?php
require './functions.php';

if (isset($_POST['submit'])) {



    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Dit is geen geldige email ";
        print_r($emailErr);
        return;
      }

    $soort = 0;


    if (isset($_POST['some']) && isset($_POST['all'])) {
        $soort = 3;
     }elseif(isset($_POST['all'])){
        $soort = 1;
     }elseif(isset($_POST['some']) ){
        $soort = 2;

     }  
     else{
        $checkboxErr = "Je moet één nieuwsbrief selecteren";
        print_r($checkboxErr);
        return;
     }

    $conn = $functions->dbConnect();


    $sql = "INSERT INTO emails (email,soort)
                VALUES (:email, :soort);";
    $statement = $conn->prepare($sql);
    $params = [
        'email' => $email,
        'soort' => $soort

    ];

    $statement->execute($params);

}
?>

<link rel="stylesheet" href="style.css">

<body>
    <h1>Aanmelden Nieuwsbrief</h1>
    <form method="POST">
        <label for="email">
            Email:
            <input id="email" type="text" class="email" placeholder="naam@server.nl" name="email" required>
        </label>
        <div class="checkbox">
            <label for="all">
                Alle nieuwsbriefen:
                <input type="checkbox" id="all" name="all" value="1">
            </label>
            <label for="some">
            Alleen spoedbriefen:
            <input type="checkbox" id="some" name="some" value="1">

            </label>
        </div>
        <button name="submit" class="button" >Verstuur</button>

    </form>
</body>