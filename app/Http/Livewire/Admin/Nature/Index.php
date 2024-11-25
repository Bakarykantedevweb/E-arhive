<?php

namespace App\Http\Livewire\Admin\Nature;

use App\Models\Nature;
use Livewire\Component;

class Index extends Component
{
    public $nature_id,$nom;
    public $natures;
    public function mount()
    {
        $this->natures = Nature::get();
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

    public function SaveNature()
    {
        $validatedData = $this->validate();
        $nature = new Nature();
        if($this->nature_id)
        {
            $nature = Nature::find($this->nature_id);
        }
        $nature->nom = $validatedData['nom'];
        $nature->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/natures');
    }

    public function editNature($id)
    {
        $nature = Nature::find($id);
        if($nature){
            $this->nature_id = $nature->id;
            $this->nom = $nature->nom;
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
        return view('livewire.admin.nature.index');
    }
}
