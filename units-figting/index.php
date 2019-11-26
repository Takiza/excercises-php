<?php
echo "<font color=\"grey\">";
echo "<body style=\"background-color:black\">";
require_once "classes/Unit.php";

function createTeam($n){
    for($i = 0; $i < $n; $i++){
        $team[$i] = new Unit(rand(10, 15), rand(2, 5));
    }
    return $team;
}

function fight($team1, $team2){
    $counter = 0;
    $t1 = sizeof($team1)-1;
    $t2 = sizeof($team2)-1;
    while(($team1[0] != NULL) && ($team2[0] != NULL)){
        $team2[$t2]->HP -= $team1[$t1]->Damage;
        echo "Юнит ".($t1+1)." команды 1 наносит <font color=\"green\">".$team1[$t1]->Damage."</font> урона юниту ".($t2+1)." команды 2<br>";
        if ($team2[$t2]->HP <= 0){
            echo "<font color=\"green\">Юнит ".($t2+1)." команды 2 уничтожен</font><br>";
            unset($team2[$t2]);
            $t2--;
        }
        if ($team2[$t2]->HP > 0){
            $team1[$t1]->HP -= $team2[$t2]->Damage;
            echo "Юнит ".($t2+1)." команды 2 наносит <font color=\"red\">".$team2[$t2]->Damage."</font> урона юниту ".($t1+1)." команды 1<br>";
            if ($team1[$t1]->HP <= 0){
                echo "<font color=\"red\">Юнит ".($t1+1)." команды 1 уничтожен</font><br>";
                unset($team1[$t1]);
                $t1--;
            }
            $counter++;
        }
        $counter++;
    }
    return $r = array($counter, (($t1 > $t2) ? $t1+1 : $t2+1));
}

$team1 = createTeam(10);
$team2 = createTeam(10);
$winner = fight($team1, $team2);
echo "Team 1 wins after ".$winner[0]." turns. ".$winner[1]." units left.";
