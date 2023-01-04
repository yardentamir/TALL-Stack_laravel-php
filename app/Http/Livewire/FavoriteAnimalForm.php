<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FavoriteAnimalForm extends Component
{
    public $listOfAnimals = array("Rabbit", "Parrot", "Dog", "Cat");
    public $selectedAnimal = "";

    public function render()
    {
        return view('livewire.favorite-animal-form');
    }
}
