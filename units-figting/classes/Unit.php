<?php

class Unit
{
    public $HP;
    public $Damage;

    public function __construct($HP, $Damage)
    {
        $this->HP = $HP;
        $this->Damage = $Damage;
    }

    public function __destruct()
    {
        unset($this->HP, $this->Damage);
    }
}