<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginComponent extends Component
{
    public $listOfAnimals = array("Rabbit", "Parrot", "Dog", "Cat");
    public $selectedAnimal = "";

    public $count = 0;
    public $isCountLimit = true;

    public $isOnMinLimit = true;
    public $isOnMaxLimit = false;

    protected $MAX_LIMIT = 20;
    protected $MIN_LIMIT = 0;
 
    public function increment()
    {
        $this->isCountLimit = false;
        $this->isOnMinLimit = false;

        if($this->count < $this->MAX_LIMIT){
            $this->count++;
        }
        if($this->count === $this->MAX_LIMIT){
            $this->isCountLimit = true;
            $this->isOnMaxLimit = true;
        }
    }

    public function decrement()
    {
        $this->isCountLimit = false;
        $this->isOnMaxLimit = false;

        if($this->count > $this->MIN_LIMIT){
            $this->count--;
        }
        if($this->count === $this->MIN_LIMIT){
            $this->isCountLimit = true;
            $this->isOnMinLimit = true;
        }
    }

    public function render()
    {
        return view('livewire.login-component');
    }
}
