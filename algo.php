<?php

$q1w = 0;
$q2w = 0;
$q3w = 1;
$q4w = 1;

$q1o = 1;
$q2o = 1;
$q3o = 1;
$q4o = 1;

const coefe1 = 0.23;
const coefe2 = 0.89;
const coefe3 = 0.52;
const coefe4 = 0.34;

$re1 = $q1w * coefe1;
echo $re1;
echo '<br>';
$re2 = $q2w * coefe2;
echo $re2;
echo '<br>';
$re3 = $q3w * coefe3;
echo $re3;
echo '<br>';
$re4 = $q4w * coefe4;
echo $re4;
echo '<br>';

const coefo1 = 0.77;
const coefo2 = 0.11;
const coefo3 = 0.48;
const coefo4 = 0.66;

$ro1 = $q1o * coefo1;
echo $ro1;
echo '<br>';

echo '<br>';
$ro2 = $q2o * coefo2;
echo $ro2;
echo '<br>';
$ro3 = $q3o * coefo3;
echo $ro3;
echo '<br>';
$ro4 = $q4o * coefo4;
echo $ro4;
echo '<br>';
$r1 = $re1 + $ro1;
echo $r1;
if ($r1 > 0.5){echo 'admis';}else{echo 'non admis';}
echo '<br>';
$r2 = $re2 + $ro2;
echo $r2;
if ($r2 > 0.5){echo 'admis';}else{echo 'non admis';}
echo '<br>';
$r3 = $re3 + $ro3;
echo $r3;
if ($r3 > 0.5){echo 'admis';}else{echo 'non admis';}
echo '<br>';
$r4 = $re4 + $ro4;
echo $r4;
if ($r4 > 0.5){echo 'admis';}else{echo 'non admis';}
echo '<br>';

?>
