<?php


/*$url = 'http://e-learning.alaji.fr/webservice/rest/server.php?moodlewsrestformat=json&wstoken=92e270ed7da760d3d6df191e5582337b&wsfunction=core_user_get_users&criteria[0][key]=id&criteria[0][value]=240';
$essai = file_get_contents($url);
$decode = json_decode($essai);
var_dump($decode);
echo '<br>';
echo '<br>';

$url = 'http://e-learning.alaji.fr/webservice/rest/server.php?moodlewsrestformat=json&wstoken=92e270ed7da760d3d6df191e5582337b&wsfunction=mod_quiz_get_user_attempts&quizid=202&userid=240';
$essai = file_get_contents($url);
$decode = json_decode($essai);
var_dump($decode);
echo '<br>';
echo '<br>';
echo '<br>';

$url = 'http://e-learning.alaji.fr/webservice/rest/server.php?moodlewsrestformat=json&wstoken=92e270ed7da760d3d6df191e5582337b&wsfunction=mod_quiz_get_attempt_review&attemptid=437';
$essai = file_get_contents($url);
$decode = json_decode($essai);
var_dump($decode);*/

const BASE_URL = 'http://e-learning.alaji.fr/webservice/rest/server.php?moodlewsrestformat=json&wstoken=92e270ed7da760d3d6df191e5582337b&wsfunction=';



$donnees = file_get_contents(BASE_URL. 'core_user_get_users&criteria[0][key]=id&criteria[0][value]='.USER_ID);
$student = json_decode($donnees, true);
//echo ($student['users'][0]["fullname"]);


/*$donnees = file_get_contents(BASE_URL. 'core_user_get_users&criteria[0][key]=id&criteria[0][value]=%');
$all_student = json_decode($donnees, true);
var_dump ($all_student);
echo '<br>';*/

$donnees = file_get_contents(BASE_URL. 'mod_quiz_get_user_attempts&quizid=202&userid='.USER_ID);
$essai = json_decode($donnees, true);
$nbr_essai = $essai ["attempts"][0];
//var_dump ($nbr_essai["attempt"]);
//echo ($nbr_essai["attempt"]);


$donnees = file_get_contents(BASE_URL. 'mod_quiz_get_attempt_review&attemptid='.$nbr_essai['id']);
$result = json_decode($donnees, true);

$reponse = $result ["questions"];
$question1 = $reponse[0];
$question2 = $reponse[1];
$question3 = $reponse[2];
$question4 = $reponse[3];
//echo ($question1 ["mark"]);

const BASE_URL = 'http://e-learning.alaji.fr/webservice/rest/server.php?moodlewsrestformat=json&wstoken=92e270ed7da760d3d6df191e5582337b&wsfunction=';

$donnees = file_get_contents(BASE_URL. 'core_user_get_users&criteria[0][key]=id&criteria[0][value]=240');
$students = json_decode($donnees, true);
var_dump ($students);



 ?>
