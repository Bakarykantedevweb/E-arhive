<?php

namespace App\Http\Livewire\Admin\Position;

use App\Models\Position;
use Livewire\Component;

class Index extends Component
{
    public $ministere_id,$nom;
    public $positions;

    public function mount()
    {
        $this->positions = Position::get();
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

    public function SavePosition()
    {
        $validatedData = $this->validate();
        $ministere = new Position;
        if($this->ministere_id)
        {
            $ministere = Position::find($this->ministere_id);
        }
        $ministere->nom = $validatedData['nom'];
        $ministere->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/positions');
    }

    public function editPosition($id)
    {
        $ministere = Position::find($id);
        if($ministere){
            $this->ministere_id = $ministere->id;
            $this->nom = $ministere->nom;
        }
    }

    public function render()
    {
        return view('livewire.admin.position.index');
    }
}
