<?php

namespace App\Http\Livewire\Admin\Agent;

use Log;
use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Cadre;
use App\Models\Corps;
use App\Models\Regimes;
use Livewire\Component;
use App\Models\Position;
use App\Models\Ministere;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;
    public $agent_id, $matricule, $nom, $prenom, $email, $telephone, $photo, $date_naissance,
        $lieu_naissance, $sexe, $date_recrutement, $date_corps, $date_position, $date_ministere, $date_avancement,
        $position_id, $cadre_id, $corps_id, $regime_id, $ministere_id;
    public $agents, $positions, $cadres, $corps, $regimes, $ministeres;

    public $agentDetail;

    public $afficherListes = True;
    public $createAgent = False;
    public $profileAgent = False;

    public $searchMatricule = '';
    public $searchNom = '';
    public $searchPrenom = '';

    public $acte_naissance;
    public $diplome;
    public $nationnalite;

    public function create()
    {
        $this->createAgent = True;
        $this->afficherListes = False;
    }

    public function retour()
    {
        $this->afficherListes = True;
        $this->createAgent = False;
    }

    public function mount()
    {
        $this->agents = Agent::query()
            ->when($this->searchMatricule, function ($query) {
                $search = strtolower($this->searchMatricule);
                $query->whereRaw('LOWER(matricule) LIKE ?', ["%$search%"]);
            })
            ->when($this->searchNom, function ($query) {
                $search = strtolower($this->searchNom);
                $query->whereRaw('LOWER(nom) LIKE ?', ["%$search%"]);
            })
            ->when($this->searchPrenom, function ($query) {
                $search = strtolower($this->searchPrenom);
                $query->whereRaw('LOWER(prenom) LIKE ?', ["%$search%"]);
            })
            ->orderBy('prenom', 'asc')
            ->get();

        $this->positions = Position::get();
        $this->cadres = Cadre::get();
        $this->corps = Corps::get();
        $this->regimes = Regimes::get();
        $this->ministeres = Ministere::get();
    }
    protected function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:agents,email',
            'telephone' => 'required|string|max:15',
            //'photo' => 'required|image|max:1024', // Limite à 1 Mo
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'sexe' => 'required|in:Masculin,Feminin',
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
        try {
            // Validation des données
            $validatedData = $this->validate();

            // Création d'un nouvel agent
            $agent = new Agent();
            $agent->matricule = '00000'; // Temporaire
            $agent->nom = $validatedData['nom'];
            $agent->prenom = $validatedData['prenom'];
            $agent->email = $validatedData['email'];
            $agent->telephone = $validatedData['telephone'];

            // Gestion de l'upload de la photo
            if ($this->photo) {
                $imageName = Carbon::now()->timestamp . '.' . $this->photo->extension();
                $this->photo->storeAs('admin/agent/', $imageName);
                $agent->photo = $imageName;
            }

            // Remplissage des autres champs
            $agent->date_naissance = $validatedData['date_naissance'];
            $agent->lieu = $validatedData['lieu_naissance'];
            $agent->sexe = $validatedData['sexe'];
            $agent->date_recrutement = $validatedData['date_recrutement'];
            $agent->date_corps = $validatedData['date_corps'];
            $agent->date_position = $validatedData['date_position'];
            $agent->date_ministere = $validatedData['date_ministere'];
            $agent->date_avancement = $validatedData['date_avancement'];
            $agent->position_id = $validatedData['position_id'];
            $agent->cadre_id = $validatedData['cadre_id'];
            $agent->corps_id = $validatedData['corps_id'];
            $agent->regimes_id = $validatedData['regime_id'];
            $agent->ministere_id = $validatedData['ministere_id'];

            // Enregistrement dans la base de données
            $agent->save();

            // Mise à jour du matricule
            $matricule = 'MA-' . str_pad($agent->id, 3, '0', STR_PAD_LEFT);
            $agent->matricule = $matricule;
            $agent->save();


            // Notification de succès
            toastr()->success('Opération effectuée avec succès');
            return redirect('admin/agents');
        } catch (\Exception $e) {
            dd($e->getMessage());
            // Notification de l'erreur à l'utilisateur
            toastr()->error('Une erreur est survenue : ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
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

    public function profile($id)
    {
        $this->agentDetail = Agent::find($id);
        $this->profileAgent = TRUE;
        $this->createAgent = FALSE;
        $this->afficherListes = FALSE;
    }

    public function saveDocument()
    {
        $agent = Agent::find($this->agentDetail->id);
        if ($this->acte_naissance) {
            $imageActe = Carbon::now()->timestamp . '.' . $this->acte_naissance->extension();
            $this->acte_naissance->storeAs('admin/acte/', $imageActe);
            $agent->acte_naissance = $imageActe;
        }

        if ($this->nationnalite) {
            $imageNatio = Carbon::now()->timestamp . '.' . $this->nationnalite->extension();
            $this->nationnalite->storeAs('admin/nationnalite/', $imageNatio);
            $agent->nationnalite = $imageNatio;
        }

        if ($this->diplome) {
            $imageDiplome = Carbon::now()->timestamp . '.' . $this->diplome->extension();
            $this->diplome->storeAs('admin/diplome/', $imageDiplome);
            $agent->diplome = $imageDiplome;
        }

        $agent->save();
        toastr()->success('Operation effectue avec success');
        return redirect('admin/agents');
        
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
