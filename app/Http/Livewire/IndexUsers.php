<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUsers extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modelId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $listeners = [
        'render',
        'delete',
        'createModal' => 'createShowModal',
        'updateModal' => 'updateShowModal'
    ];

    /**
     * rules
     *
     * @return void
     */
    public function rules()
    {
        $rules =  [
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($this->modelId)],
        ];

        if ($this->password || $this->modelId == null) {
            $rules['password'] = ['confirmed', 'min:6'];
        }

        return $rules;
    }

    /**
     * The livewire mount function
     *
     * @return void
     */
    public function mount()
    {   //Resets the pagination after reloading the page
        $this->resetPage();
    }

    /**
     * the create function
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        User::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();
        $this->emit('alert', 'The user was create successfully');
    }

    /**
     * The read function
     *
     * @return void
     */
    public function read()
    {
        return User::paginate(5);
    }



    /**
     * the update function
     *
     * @return void
     */
    function update()
    {
        $this->validate();
        User::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;

        $this->emit('alert', 'The user was updated successfully');
    }

    /**
     * the delete function
     *
     * @return void
     */
    function delete(User $user)
    {

        $user->delete();
        $this->resetPage();
    }


    /**
     * Shows the form modal
     * of the create function
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modalFormVisible = true;
    }

    /**
     * Show s the form modal
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    /**
     * loads the model model
     * in this component
     *
     * @return void
     */
    public function loadModel()
    {
        $data = User::find($this->modelId);
        $this->name = $data->name;
        $this->email = $data->email;
    }

    /**
     * the data for de model mapped
     * in this component
     *
     * @return void
     */
    public function modelData()
    {
        $user =  [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if ($this->password != null) {
            $user['password'] = $this->password;
        }

        return $user;
    }

    /**
     * Resets all the cariables
     * to null
     *
     * @return void
     */
    public function resetVars()
    {
        $this->modelId = null;
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->password_confirmation = null;
    }



    /**
     * The render function
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.index-users', [
            'users' => $this->read(),
        ]);
    }
}
