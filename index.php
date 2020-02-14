<?php
const BASE_URL = 'http://e-learning.alaji.fr/webservice/rest/server.php?moodlewsrestformat=json&wstoken=92e270ed7da760d3d6df191e5582337b&wsfunction=';
const coefe1 = 0.23;
const coefe2 = 0.89;
const coefe3 = 0.52;
const coefe4 = 0.34;

const coefo1 = 0.77;
const coefo2 = 0.11;
const coefo3 = 0.48;
const coefo4 = 0.66;

define('USER_ID', $_GET['id']);//pr l'avoir ds l'url

$donnees = file_get_contents(BASE_URL. 'core_user_get_users&criteria[0][key]=id&criteria[0][value]='.USER_ID);
$student = json_decode($donnees, true);

$isPost = count($_POST);
//condition du post
if ($isPost) {
    if (isset($_POST['questionO1']) && ($_POST['questionO1'] === '0' || $_POST['questionO1'] === '1')) {
        $questionO1 = (int) $_POST['questionO1'];
        $questionO1 = $questionO1 ? 1 : 0;
    }

    if (isset($_POST['questionO2']) && ($_POST['questionO2'] === '0' || $_POST['questionO2'] === '1')) {
        $questionO2 = (int) $_POST['questionO2'];
        $questionO2 = $questionO2 ? 1 : 0;
    }

    if (isset($_POST['questionO3']) && ($_POST['questionO3'] === '0' || $_POST['questionO3'] === '1')) {
        $questionO3 = (int) $_POST['questionO3'];
        $questionO3 = $questionO3 ? 1 : 0;
    }

    if (isset($_POST['questionO4']) && ($_POST['questionO4'] === '0' || $_POST['questionO4'] === '1')) {
        $questionO4 = (int) $_POST['questionO4'];
        $questionO4 = $questionO4 ? 1 : 0;
    }

    $donnees = file_get_contents(BASE_URL. 'mod_quiz_get_user_attempts&quizid=202&userid='.USER_ID);
    $essai = json_decode($donnees, true);
    $nbr_essai = $essai ["attempts"][0];
    //var_dump ($nbr_essai["attempt"]);
    //echo ($nbr_essai["attempt"]);
    //recuperation de l'ecrit

    $donnees = file_get_contents(BASE_URL. 'mod_quiz_get_attempt_review&attemptid='.$nbr_essai['id']);
    $result = json_decode($donnees, true);

    $reponse = $result ["questions"];
    $question1 = $reponse[0];
    $question2 = $reponse[1];
    $question3 = $reponse[2];
    $question4 = $reponse[3];
    //recuperation de l'ecrit
}
 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Alaji</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown">
                <div class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Candidats :
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php foreach ($users as $value){ ?>
                        <a class="dropdown-item" href="#"><?php echo $value ['users']?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link">Tableau <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Connexion</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <blockquote class="blockquote mt-4"style="float:right;">
                <span class="badge badge-pill badge-warning"><h1><?php echo ($student['users'][0]["fullname"]); ?></span></h1>
            </blockquote>
            <?php if (!$isPost) { ?>
                <div class="card text-white bg-secondary mb-3 mt-3" style="max-width: 20rem;">
                    <div class="card-header"><h2>TEST ORAL</h2></div>
                    <div class="card-body text-center">
                        <form method="post">
                            <div class="form-group text-center">
                                critére 1 :
                                <input type="number" name="questionO1" min="0" max="1" required/><br>
                                critére 2 :
                                <input type="number" name="questionO2" min="0" max="1" required/><br>
                                critére 3 :
                                <input type="number" name="questionO3" min="0" max="1" required/><br>
                                critére 4 :
                                <input type="number" name="questionO4" min="0" max="1" required/><br>
                            </div>
                            <button type="submit" class="btn btn-warning" style="float:right;">Valider</button>
                        </form>
                    </div>
                </div>
            <?php } else { ?>
                <table class="table table-dark mt-4 text-center" id="oral" >
                <thead>
                    <tr>
                        <th scope="col">Critères</th>
                        <th scope="col">Test écrit</th>
                        <th scope="col">Moyenne écrit</th>
                        <th scope="col">Test oral</th>
                        <th scope="col">Moyenne oral</th>
                        <th scope="col">Résultat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-primary">
                        <th scope="row">Critère 1</th>
                        <td><?php $q1w = (int)($question1 ["mark"]); echo $q1w;?></td>
                        <td><?php $re1 = $q1w * coefe1; echo $re1;?></td>
                        <td><?php echo isset($questionO1) ? $questionO1 : '--'; ?></td>
                        <td><?php echo isset($questionO1) ? $ro1 = ($questionO1 * coefo1) : '--';?></td>
                        <td><?php $r1 = $re1 + $ro1; if ($r1 > 0.5){echo 'admis';}else{echo 'non admis';}?></td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row">Critère 2</th>
                        <td><?php $q2w = (int)($question2 ["mark"]); echo $q2w;?></td>
                        <td><?php $re2 = $q2w * coefe2; echo $re2;?></td>
                        <td><?php echo isset($questionO2) ? $questionO2 : '--'; ?></td>
                        <td><?php echo isset($questionO2) ? $ro2 = ($questionO2 * coefo2) : '--';?></td>
                        <td><?php $r2 = $re2 + $ro2; if ($r2 > 0.5){echo 'admis';}else{echo 'non admis';}?></td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row">Critère 3</th>
                        <td><?php $q3w = (int)($question3 ["mark"]);echo $q3w;?></td>
                        <td><?php $re3 = $q3w * coefe3; echo $re3;?></td>
                        <td><?php echo isset($questionO3) ? $questionO3 : '--'; ?></td>
                        <td><?php echo isset($questionO3) ? $ro3 = ($questionO3 * coefo3) : '--';?></td>
                        <td><?php $r3 = $re3 + $ro3; if ($r3 > 0.5){echo 'admis';}else{echo 'non admis';}?></td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row">Critère 4</th>
                        <td><?php $q4w = (int)($question4 ["mark"]);echo $q4w;?></td>
                        <td><?php $re4 = $q4w * coefe4; echo $re4;?></td>
                        <td><?php echo isset($questionO4) ? $questionO4 : '--'; ?></td>
                        <td><?php echo isset($questionO4) ? $ro4 = ($questionO4 * coefo4) : '--';?></td>
                        <td><?php $r4 = $re4 + $ro4; if ($r4 > 0.5){echo 'admis';}else{echo 'non admis';}?></td>
                    </tr>
                </tbody>
            </table>
            <?php } ?>
            <div class="logo">
                <img src="alaji.png" alt="logo alaji">
            </div>
        </div>
        <footer>
            <div class="card-footer bg-dark text-center text-light mt-4">
                Copyright © Your Website 2020
            </div>
        </footer>
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
