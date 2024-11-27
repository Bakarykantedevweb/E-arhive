<?php

namespace App\Http\Livewire\Admin\Cadre;

use App\Models\Cadre;
use Livewire\Component;

class Index extends Component
{
    public $cadre_id,$nom;
    public $cadres;
    
    public function mount()
    {
        $this->cadres = Cadre::get();
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

    public function SaveCadre()
    {
        $validatedData = $this->validate();
        $classe = new Cadre();
        if($this->cadre_id)
        {
            $classe = Cadre::find($this->cadre_id);
        }
        $classe->nom = $validatedData['nom'];
        $classe->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/cadres');
    }

    public function editCadre($id)
    {
        $classe = Cadre::find($id);
        if($classe){
            $this->cadre_id = $classe->id;
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
        return view('livewire.admin.cadre.index');
    }
}
