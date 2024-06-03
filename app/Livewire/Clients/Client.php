<?php

namespace App\Livewire\Clients;

use App\Models\{Address, Client as ClientModel};
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\{DB, Log};
use Livewire\Component;
use WireUi\Traits\Actions;

class Client extends Component
{
    use Actions;

    public ClientModel $client;

    public Address $address;

    public string $title = 'Cadastrar Cliente';

    protected array $rules = [
        'client.name'          => 'required|string|min:3|max:180',
        'client.email'         => 'required|email',
        'client.phone_one'     => 'required|string|min:10|max:11',
        'client.phone_two'     => 'nullable|string|min:10|max:11',
        'client.document'      => 'required|string|min:11|max:14',
        'client.document_type' => 'required|string|in:cpf,cnpj',
        'client.birth_date'    => 'required|date',
        'client.notes'         => 'nullable|string|max:255',
        'address.address'      => 'required|string|min:3|max:180',
        'address.number'       => 'nullable|string|max:10',
        'address.neighborhood' => 'required|string|min:3|max:180',
        'address.city'         => 'required|string|min:3|max:180',
        'address.state'        => 'required|string|min:2|max:2',
        'address.zip_code'     => 'required|string|min:7|max:8',
        'address.complement'   => 'nullable|string|min:3|max:180',
        'address.landmark'     => 'nullable|string|min:3|max:180',
    ];

    public function mount(ClientModel $client): void
    {
        if ($client->id) {
            $this->title = 'Editar Cliente';
        }

        $this->client  = $client->load('address');
        $this->address = Address::find($client->address_id) ?? new Address();
    }

    public function save(): void
    {
        $this->validate();

        try {

            DB::transaction(function () {
                $this->address->save();

                $this->client->address_id = $this->address->id;
                $this->client->save();
            }, 5);

            $this->notification()->success(
                $title       = 'Dados salvos com sucesso!',
                $description = 'Dados do cliente salvos com sucesso!'
            );

        } catch (\Exception $e) {
            Log::error($e);
            $this->notification()->error(
                $title       = 'Erro ao salvar dados!',
                $description = 'Erro ao salvar dados do cliente!'
            );

            return;
        }
    }

    public function updatedAddressZipCode(): void
    {
        if (strlen($this->address->zip_code) >= 7) {
            $response = Http::get("https://viacep.com.br/ws/{$this->address->zip_code}/json/");
            $data     = $response->json();

            if (is_array($data) && !isset($data['erro'])) {
                $this->address->address      = $data["logradouro"] ?? null;
                $this->address->neighborhood = $data["bairro"] ?? null;
                $this->address->city         = $data["localidade"] ?? null;
                $this->address->state        = $data["uf"] ? strtolower($data["uf"]) : null;
            }
        }
    }

    public function render(): View
    {
        return view('livewire.clients.client');
    }
}
