<?php

namespace App\Http\Livewire\Admin\Mention;

use App\Models\Mention;
use Livewire\Component;

class Index extends Component
{
    public $mention_id,$nom;
    public $mentions;
    public function mount()
    {
        $this->mentions = Mention::get();
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

    public function SaveMention()
    {
        $validatedData = $this->validate();
        $mention = new Mention();
        if($this->mention_id)
        {
            $mention = Mention::find($this->mention_id);
        }
        $mention->nom = $validatedData['nom'];
        $mention->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/mentions');
    }
    public function editMention($id)
    {
        $mention = Mention::find($id);
        if($mention){
            $this->mention_id = $mention->id;
            $this->nom = $mention->nom;
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
        return view('livewire.admin.mention.index');
    }
}
