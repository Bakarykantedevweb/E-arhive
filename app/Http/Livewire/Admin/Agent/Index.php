<?php

namespace App\Http\Livewire\Admin\Agent;

use App\Models\Agent;
use App\Models\Cadre;
use App\Models\Corps;
use App\Models\Regimes;
use Livewire\Component;
use App\Models\Position;
use App\Models\Ministere;

class Index extends Component
{
    public $agent_id, $matricule,$nom, $prenom,$email,$telephone,$photo, $date_naissance,
    $lieu_naissance,$sexe,$date_recrutement,$date_corps,$date_position,$date_ministere,$date_avancement, 
    $position_id, $cadre_id, $corps_id,$regime_id,$ministere_id;
    public $agents, $positions, $cadres,$corps,$regimes,$ministeres;
    public function mount()
    {
        $this->agents = Agent::get();
        $this->positions = Position::get();
        $this->cadres = Cadre::get();
        $this->corps = Corps::get();
        $this->regimes = Regimes::get();
        $this->ministeres = Ministere::get();



    }
    protected function rules()
    {
        return [
            'matricule' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|telephone',
            'photo' => 'required|date',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|date',
            'sexe' => 'required|string',
            'date_recrutement' => 'required|date',
            'date_corps' => 'required|date',
            'date_position' => 'required|date',
            'date_ministere' => 'required|date',
            'date_avancement' => 'required|date',
            'position_id' => 'required|integer',
            'cadre_id' => 'required|integer',
            'corps_id' => 'required|integer',
            'regime_id' => 'required|integer',
            'ministere_id' => 'required|integer',


        ];
    }
    public function updated($champs)
    {
        $this->validateOnly($champs);
    }

    public function SaveAgent()
    {
        $validatedData = $this->validate();
        $agent = new Agent();
        if ($this->agent_id) {
            $agent = Agent::find($this->agent_id);
        }
        $agent->matricule = $validatedData['matricule'];
        $agent->nom = $validatedData['nom'];
        $agent->prenom = $validatedData['prenom'];
        $agent->email = $validatedData['telephone'];
        $agent->photo = $validatedData['photo'];
        $agent->date_naissance = $validatedData['date_naissance'];
        $agent->lieu_naissance = $validatedData['lieu_naissance'];
        $agent->sexe = $validatedData['sexe'];
        $agent->date_recrutement = $validatedData['date_recrutement'];
        $agent->date_corps = $validatedData['date_corps'];
        $agent->date_position = $validatedData['date_position'];
        $agent->date_ministere = $validatedData['date_ministere'];
        $agent->date_avancement = $validatedData['date_avancement'];
        $agent->position_id = $validatedData['position_id'];
        $agent->cadre_id = $validatedData['cadre_id'];
        $agent->corps_id = $validatedData['corps_id'];
        $agent->regime_id = $validatedData['regime_id'];
        $agent->ministere_id = $validatedData['ministere_id'];
       $agent->save();
        toastr()->success('Operation effectuée avec Success');
        return redirect('admin/agents');
    }

    public function edit($id)
    {
        $agent = Agent::find($id);
        if ($agent) {
            $this->agent_id = $agent->id;
            $this->matricule = $agent->matricule;
            $this->nom = $agent->nom;
            $this->prenom = $agent->prenom;
            $this->telephone = $agent->telephone;
            $this->photo = $agent->photo;
            $this->date_naissance = $agent->date_naissance;
            $this->lieu_naissance = $agent->lieu_naissance;
            $this->sexe = $agent->sexe;
            $this->date_recrutement = $agent->date_recrutement;
            $this->date_corps = $agent->date_corps;
            $this->date_position = $agent->date_position;
            $this->date_ministere = $agent->date_ministere;
            $this->date_avancement = $agent->date_avancement;
            $this->position_id = $agent->position_id;
            $this->cadre_id = $agent->cadre_id;
            $this->corps_id = $agent->corps_id;
            $this->regime_id = $agent->regime_id;
            $this->ministere_id = $agent->ministere_id;

    
    }
}

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->matricule = '';
        $this->nom = '';
        $this->prenom = '';
        $this->telephone = '';
        $this->photo = '';
        $this->date_naissance = '';
        $this->lieu_naissance = '';
        $this->sexe = '';
        $this->date_recrutement = '';
        $this->date_corps = '';
        $this->date_position = '';
        $this->date_ministere = '';
        $this->date_avancement = '';
        $this->position_id = '';
        $this->cadre_id = '';
        $this->corps_id = '';
        $this->regime_id = '';
        $this->ministere_id = '';



    }
    public function render()
    {
        return view('livewire.admin.agent.index');
    }
}
