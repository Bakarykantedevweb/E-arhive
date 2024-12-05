<?php

namespace App\Http\Livewire\Admin\Arrete;

use App\Models\Arrete;
use App\Models\Nature;
use App\Models\Mention;
use Livewire\Component;

class Index extends Component
{
    public $arrete_id,$numero,$date_signature,$nature_id,$mention_id;
    public $arretes,$natures,$mentions;
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
            'date_signature' => 'required|string',
           'nature_id' => 'required|integer',
           'mention_id' => 'required|integer',

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
        if($this->Arrete_id)
        {
            $arrete = Arrete::find($this->Arrete_id);
        }
        $arrete->numero = $validatedData['numero'];
        $arrete->date_signature = $validatedData['date_signature'];
       $arrete->nature_id = $validatedData['nature_id'];
       $arrete->mention_id = $validatedData['mention_id'];
      $arrete->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/arretes');
    }

    public function editArrete($id)
    {
        $arrete = Arrete::find($id);
        if($arrete){
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
        
        return view('livewire.admin.arrete.index');
    }
}
