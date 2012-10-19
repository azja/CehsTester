<?php
include ("../AbcdExercise.php");
include '../../Level/Level.php';
$v = new AbcdExercise(1,1,"Math","Basic exercise","Do you know?","a","b","c","d","it is correct answer");
echo ($v);

/*
__construct($id, $level, $field, $subject, $question, $answerA, $answerB, $answerC, $answerD, $correctAnswer){
                               parent::__construct($id, $level, $field, $subject, $question)
*/                               
?>
