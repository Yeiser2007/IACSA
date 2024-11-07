<?php

namespace App\Livewire\Employees;

use App\Models\Employees;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeesComponent extends Component
{
    use WithPagination;
    public $search;
    public $name;
    public $id;
    protected $paginationTheme = 'bootstrap';   
    public function render()
    {
        $employees = Employees::where('employee_number', 'like', '%' . $this->search . '%')->paginate();

        return view('livewire.employees.employees-component',compact('employees'));
    }
    public function destroy($id){
        $user = Employees::find($id);
        $user->delete();
        $this->dispatch('deleteEmployee');
    }
    public function assignName($id,$name){
        $this->name = $name;
        $this->id = $id;
    }
}
