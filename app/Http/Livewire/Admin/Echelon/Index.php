<?php

namespace App\Http\Livewire\Admin\Echelon;

use App\Models\Echelon;
use Livewire\Component;

class Index extends Component
{
    public $echelon_id,$nom;
    public $echelons;
    
    public function mount()
    {
        $this->echelons = Echelon::get();
    }
    protected function rules()
    {
        return [
            'nom' => 'required|string',
        ];
    }
    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function SaveEchelon()
    {
        $validatedData = $this->validate();
        $echelon = new Echelon();
        if($this->echelon_id)
        {
            $echelon = Echelon::find($this->echelon_id);
        }
        $echelon->nom = $validatedData['nom'];
        $echelon->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/echelons');
    }
    public function editEchelon($id)
    {
        $echelon = Echelon::find($id);
        if($echelon){
            $this->echelon_id = $echelon->id;
            $this->nom = $echelon->nom;
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
    }
    public function render()
    {
        return view('livewire.admin.echelon.index');
    }
}
