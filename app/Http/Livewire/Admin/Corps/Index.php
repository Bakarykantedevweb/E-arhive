<?php

namespace App\Http\Livewire\Admin\Corps;

use App\Models\Categorie;
use App\Models\Corps;
use Livewire\Component;

class Index extends Component
{
    public $Corps_id,$nom,$categorie_id;
    public $corps,$categories;
    public function mount()
    {
        $this->corps = Corps::get();
        $this->categories = Categorie::get();
    }
    protected function rules()
    {
        return [
            'nom' => 'required|string',
            'categorie_id' => 'required|integer',
        ];
    }
    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function SaveCorps()
    {
        $validatedData = $this->validate();
        $corps = new corps();
        if($this->Corps_id)
        {
            $corps = corps::find($this->Corps_id);
        }
        $corps->nom = $validatedData['nom'];
        $corps->categorie_id = $validatedData['categorie_id'];
        $corps->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/corps');
    }

    public function editCorps($id)
    {
        $corps = corps::find($id);
        if($corps){
            $this->Corps_id = $corps->id;
            $this->nom = $corps->nom;
            $this->categorie_id = $corps->categorie_id;
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nom = '';
        $this->categorie_id = '';
    }

    public function render()
    {
        return view('livewire.admin.corps.index');
    }
}
