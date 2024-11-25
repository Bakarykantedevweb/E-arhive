<?php

namespace App\Http\Livewire\Admin\Classe;

use App\Models\Classe;
use Livewire\Component;

class Index extends Component
{
    public $classe_id,$nom;
    public $classes;
    public function mount()
    {
        $this->classes = Classe::get();
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

    public function SaveClasse()
    {
        $validatedData = $this->validate();
        $classe = new Classe();
        if($this->classe_id)
        {
            $classe = Classe::find($this->classe_id);
        }
        $classe->nom = $validatedData['nom'];
        $classe->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/classes');
    }

    public function editClasse($id)
    {
        $classe = Classe::find($id);
        if($classe){
            $this->classe_id = $classe->id;
            $this->nom = $classe->nom;
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
        return view('livewire.admin.classe.index');
    }
}
