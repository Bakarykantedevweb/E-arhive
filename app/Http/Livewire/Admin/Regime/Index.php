<?php

namespace App\Http\Livewire\Admin\Regime;

use App\Models\Regimes;
use Livewire\Component;

class Index extends Component
{
    public $regime_id,$nom;
    public $regimes;
    public function mount()
    {
        $this->regimes = Regimes::get();
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

    public function SaveRegime()
    {
        $validatedData = $this->validate();
        $regime = new Regimes();
        if($this->regime_id)
        {
            $regime = Regimes::find($this->regime_id);
        }
        $regime->nom = $validatedData['nom'];
        $regime->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/regimes');
    }

    public function editRegime($id)
    {
        $regime = Regimes::find($id);
        if($regime){
            $this->regime_id = $regime->id;
            $this->nom = $regime->nom;
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
        return view('livewire.admin.regime.index');
    }
}
