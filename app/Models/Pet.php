<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_animal;',
        'owner',
        'address'
    ];
    //SELECT
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type_animal;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getAddress()
    {
        return $this->address;
    }
    //UPDATE
    public function setName($value)
    {
        $this->name = $value;
        return $this->save();
    }

    public function setType($value)
    {
        $this->type_animal = $value;
        return $this->save();
    }

    public function setOwner($value)
    {
        $this->owner = $value;
        return $this->save();
    }

    public function setAddress($value)
    {
        $this->address = $value;
        return $this->save();
    }

    public function isMammal()
    {
        return ($this->type_animal == 'Mammal');
    }

    public function isBird()
    {
        return ($this->type_animal == 'Bird');
    }

    public function isFish()
    {
        return ($this->type_animal == 'Fish');
    }

    public function isReptile()
    {
        return ($this->type_animal == 'Reptile');
    }

    public function isAmphibian()
    {
        return ($this->type_animal == 'Amphibian');
    }

    public function isArthropod()
    {
        return ($this->type_animal == 'Arthropod');
    }

    public function isInvertebre()
    {
        return ($this->type_animal == 'Invertebrate');
    }
}
