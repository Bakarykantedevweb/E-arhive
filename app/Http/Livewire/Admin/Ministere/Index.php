<?php

namespace App\Http\Livewire\Admin\Ministere;

use App\Models\Ministere;
use Livewire\Component;

class Index extends Component
{
    public $ministere_id,$nom;
    public $ministeres;

    public function mount()
    {
        $this->ministeres = Ministere::get();
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

    public function SaveMinistere()
    {
        $validatedData = $this->validate();
        $ministere = new Ministere;
        if($this->ministere_id)
        {
            $ministere = Ministere::find($this->ministere_id);
        }
        $ministere->nom = $validatedData['nom'];
        $ministere->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/ministeres');
    }

    public function editMinistere($id)
    {
        $ministere = Ministere::find($id);
        if($ministere){
            $this->ministere_id = $ministere->id;
            $this->nom = $ministere->nom;
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
        return view('livewire.admin.ministere.index');
    }
}
