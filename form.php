<?php

require 'test.php';

if (isset($_POST['question1']) && ($_POST['question1'] === '0' || $_POST['question1'] === '1')) {
    $question1 = (int) $_POST['question1'];

    var_dump ($question1);
}
if (isset($_POST['question2']) && ($_POST['question2'] === '0' || $_POST['question2'] === '1')) {
    $question2 = (int) $_POST['question2'];

    var_dump ($question2);
}

if (isset($_POST['question3']) && ($_POST['question3'] === '0' || $_POST['question3'] === '1')) {
    $question3 = (int) $_POST['question3'];

    var_dump ($question3);
}

if (isset($_POST['question4']) && ($_POST['question4'] === '0' || $_POST['question4'] === '1')) {
    $question4 = (int) $_POST['question4'];

    var_dump ($question4);

echo '<br>';

$result1 = $question1 * 0.77;
echo $result1;
echo '<br>';
$result2 = $question2 * 0.11;
echo $result2;
echo '<br>';
$result3 = $question3 * 0.48;
echo $result3;
echo '<br>';
$result4 = $question4 * 0.66;
echo $result4;
echo '<br>';


}

?>

<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="stylesheet" href="https://bootswatch.com/4/solar/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
                <div class="card-header"><h2>TEST ORAL</h2></div>
                <div class="card-body text-center">
                    <form method="post">
                        <div class="form-group">
                            critére 1
                            <input type="number" name="question1" min="0" max="1" required/><br>
                            critére 2
                            <input type="number" name="question2" min="0" max="1" required/><br>
                            critére 3
                            <input type="number" name="question3" min="0" max="1" required/><br>
                            critére 4
                            <input type="number" name="question4" min="0" max="1" required/><br>
                        </div>
                        <button type="submit" class="btn btn-primary"style="float:right;" >Valider</button>
                    </form>
                </div>
            </div>

        </div>
    </body>
