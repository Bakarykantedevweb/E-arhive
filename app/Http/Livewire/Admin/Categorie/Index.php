<?php

namespace App\Http\Livewire\Admin\Categorie;

use App\Models\Categorie;
use Livewire\Component;

class Index extends Component
{
    public $categorie_id,$nom;
    public $categories;
    
    public function mount()
    {
        $this->categories = Categorie::get();
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

    public function SaveCategorie()
    {
        $validatedData = $this->validate();
        $categorie = new Categorie();
        if($this->categorie_id)
        {
            $categorie = Categorie::find($this->categorie_id);
        }
        $categorie->nom = $validatedData['nom'];
        $categorie->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/categories');
    }

    public function editCategorie($id)
    {
        $categorie = Categorie::find($id);
        if($categorie){
            $this->categorie_id = $categorie->id;
            $this->nom = $categorie->nom;
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
        return view('livewire.admin.categorie.index');
    }
}
