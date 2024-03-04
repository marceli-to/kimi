<?php
namespace App\Livewire;
use Livewire\Attributes\Validate; 
use Livewire\Component;

class MathTasks extends Component
{
  public $tasks = [];
  public $answers = [];

  public $type = 'add_sub';
  public $amount = 10;

  public function mount()
  {
    // if the type is add_sub, then generate addition and subtraction tasks
    if ($this->type == 'add_sub')
    {
      $this->generateAddSubTasks();
    }
    // if the type is mul_div, then generate multiplication and division tasks
    else if ($this->type == 'mul_div')
    {
      $this->generateMulDivTasks();
    }
  }

  public function render()
  {
    return view('livewire.pages.math.tasks');
  }

  public function generateAddSubTasks()
  {
    for ($i = 0; $i < $this->amount; $i++)
    {
      $operation = rand(0, 1) ? '+' : '-';
      $firstNumber = rand(0, 100);
      $secondNumber = rand(0, 100);

      // Ensure subtraction doesn't result in negative numbers
      if ($operation == '-' && $firstNumber < $secondNumber)
      {
        list($firstNumber, $secondNumber) = [$secondNumber, $firstNumber];
      }

      $this->tasks[] = [
        'question' => "{$firstNumber} {$operation} {$secondNumber}",
        'firstNumber' => $firstNumber,
        'secondNumber' => $secondNumber,
        'operation' => $operation,
        'answer' => $operation == '+' ? $firstNumber + $secondNumber : $firstNumber - $secondNumber,
      ];

      // Initialize answers array
      $this->answers[$i] = '';
    }

    // Shuffle tasks for random order
    shuffle($this->tasks);
  }

  public function generateMulDivTasks()
  {
    // Generate multiplication and division tasks in the same way as addition and subtraction
    // it should be easy to understand and only have numbers from 1 to 10
    for ($i = 0; $i < $this->amount; $i++)
    {
      $operation = rand(0, 1) ? '∙' : ':';
      $secondNumber = rand(1, 10);
  
      if ($operation == '∙')
      {
        // For multiplication, both numbers can be freely chosen from 1 to 10
        $firstNumber = rand(1, 10);
      }
      else
      {
        // For division, choose a multiplier for the second number that ensures the product is <= 10
        $maxMultiplier = floor(10 / $secondNumber);
        $multiplier = rand(1, $maxMultiplier);
        $firstNumber = $secondNumber * $multiplier; // This ensures the result is a whole number and <= 10
      }
  
      $this->tasks[] = [
        'question' => "{$firstNumber} {$operation} {$secondNumber}",
        'firstNumber' => $firstNumber,
        'secondNumber' => $secondNumber,
        'operation' => $operation,
        'answer' => $operation == '*' ? $firstNumber * $secondNumber : $firstNumber / $secondNumber,
      ];
  
      // Initialize answers array
      $this->answers[$i] = '';
    }
  

  }
  
}
