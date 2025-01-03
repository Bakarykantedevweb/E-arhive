<?php

namespace App\Http\Livewire\Admin\Test;

use Carbon\Carbon;
use App\Models\Arrete;
use App\Models\Nature;
use App\Models\Mention;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $arrete_id, $numero, $type,$fichier, $date_signature, $nature_id, $mention_id;
    public $arretes, $natures, $mentions;
    public function mount()
    {
        $this->arretes = Arrete::get();
        $this->natures = Nature::get();
        $this->mentions = Mention::get();
    }
    protected function rules()
    {
        return [
            'numero' => 'required|string',
            'date_signature' => 'required|date',
            'nature_id' => 'required|integer',
            'mention_id' => 'required|integer',
            'type' => 'required|string',

        ];
    }
    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function SaveArrete()
    {
        $validatedData = $this->validate();
        $arrete = new Arrete();
        if ($this->arrete_id) {
            $arrete = Arrete::find($this->arrete_id);
        }
        $arrete->type = $validatedData['type'];
        $arrete->numero = $validatedData['numero'];
        $arrete->date_signature = $validatedData['date_signature'];
        $arrete->nature_id = $validatedData['nature_id'];
        $arrete->mention_id = $validatedData['mention_id'];
         // Gestion de l'upload de la fichier
         if ($this->fichier) {
            $imageName = Carbon::now()->timestamp . '.' . $this->fichier->extension();
            $this->fichier->storeAs('admin/document/', $imageName);
            $arrete->fichier = $imageName;
        }
        $arrete->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/arretes');
    }

    public function edit($id)
    {
        $arrete = Arrete::find($id);
        if ($arrete) {
            $this->arrete_id = $arrete->id;
            $this->numero = $arrete->numero;
            $this->date_signature = $arrete->date_signature;
            $this->nature_id = $arrete->nature_id;
            $this->mention_id = $arrete->mention_id;
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->numero = '';
        $this->date_signature = '';
        $this->nature_id = '';
        $this->mention_id = '';
    }
    public function render()
    {
        return view('livewire.admin.test.index');
    }
}
