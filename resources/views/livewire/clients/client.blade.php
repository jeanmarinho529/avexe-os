@section('title', $title)
@section('page', $title)

<div>
    <x-notifications />

    <form wire:submit="save">
        <div>
            <h2 class="text-base font-semibold leading-7 text-gray-900">Dados pessoais do cliente</h2>

            <div class="border-b border-gray-900/10 pb-12 mt-10 grid grid-cols gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="col-span-full">
                    <x-input label="Nome Completo" wire:model.defer="client.name" class="base-form-input" />
                </div>

                <div class="sm:col-span-2">
                    <x-inputs.maskable label="Documento" wire:model.defer="client.document"
                        mask="['###.###.###-##', '##.###.###/####-##']" class="base-form-input" />
                </div>

                <div class="sm:col-span-2">
                    <x-native-select label="Tipo do Documento" wire:model.defer="client.document_type"
                        placeholder="Selecionar" option-label="name" class="base-form-input" option-value="id"
                        :options="[['name' => 'CPF', 'id' => 'cpf'], ['name' => 'CNPJ', 'id' => 'cnpj']]" />
                </div>

                <div class="sm:col-span-2">
                    <x-datetime-picker label="Data de Nascimento" without-time="false" without-tips="false"
                        wire:model.defer="client.birth_date" />
                </div>

                <div class="sm:col-span-2">
                    <x-inputs.phone label="Celular/WhatsApp" wire:model.defer="client.phone_one"
                        mask="['(##) #####-####']" class="base-form-input mb-1" />
                    {{-- <x-checkbox id="right-label" label="É WhatsApp" wire:model.defer="model"/> --}}
                </div>

                <div class="sm:col-span-2">
                    <x-inputs.phone label="Celular 2" wire:model.defer="client.phone_two" mask="['(##) #####-####']"
                        class="base-form-input" />
                </div>

                <div class="sm:col-span-2">
                    <x-input label="Email" wire:model.defer="client.email" class="base-form-input" />
                </div>

                <div class="col-span-full">
                    <x-textarea label="Anotações" wire:model.defer="client.notes"
                        placeholder="Escreva aqui anotações ou observações do cliente" />
                </div>
            </div>

            <h2 class="mt-5 text-base font-semibold leading-7 text-gray-900">Dados do endereço</h2>

            <div class="mt-5 grid grid-cols gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <x-input label="CEP" wire:model.lazy="address.zip_code" class="base-form-input" />
                    {{-- <x-inputs.maskable label="CEP" wire:model.lazy="address.zip_code" name="address.zip_code"
                    mask="['#####-###', '####-###']" class="base-form-input" />  --}}
                </div>

                <div class="sm:col-span-3">
                    <x-input label="Endereço" wire:model.defer="address.address" class="base-form-input" />
                </div>

                <div class="sm:col-span-1">
                    <x-input label="Número" wire:model.defer="address.number" class="base-form-input" />
                </div>

                <div class="sm:col-span-2">
                    <x-input label="Bairro" wire:model.defer="address.neighborhood" class="base-form-input" />
                </div>

                <div class="sm:col-span-2">
                    <x-input label="Cidade" wire:model.defer="address.city" class="base-form-input" />
                </div>

                <div class="sm:col-span-2">
                    <x-native-select label="Estado" placeholder="Selecionar" option-label="name" option-value="id"
                        wire:model="address.state" class="base-form-input" :options="[
                            ['name' => 'RN', 'id' => 'rn'],
                            ['name' => 'AC', 'id' => 'ac'],
                            ['name' => 'AL', 'id' => 'al'],
                            ['name' => 'AP', 'id' => 'ap'],
                            ['name' => 'AM', 'id' => 'am'],
                            ['name' => 'BA', 'id' => 'ba'],
                            ['name' => 'CE', 'id' => 'ce'],
                            ['name' => 'DF', 'id' => 'df'],
                            ['name' => 'ES', 'id' => 'es'],
                            ['name' => 'GO', 'id' => 'go'],
                            ['name' => 'MA', 'id' => 'ma'],
                            ['name' => 'MT', 'id' => 'mt'],
                            ['name' => 'MS', 'id' => 'ms'],
                            ['name' => 'MG', 'id' => 'mg'],
                            ['name' => 'PA', 'id' => 'pa'],
                            ['name' => 'PB', 'id' => 'pb'],
                            ['name' => 'PR', 'id' => 'pr'],
                            ['name' => 'PE', 'id' => 'pe'],
                            ['name' => 'PI', 'id' => 'pi'],
                            ['name' => 'RJ', 'id' => 'rj'],
                            ['name' => 'RN', 'id' => 'rn'],
                            ['name' => 'RS', 'id' => 'rs'],
                            ['name' => 'RO', 'id' => 'ro'],
                            ['name' => 'RR', 'id' => 'rr'],
                            ['name' => 'SC', 'id' => 'sc'],
                            ['name' => 'SP', 'id' => 'sp'],
                            ['name' => 'SE', 'id' => 'se'],
                            ['name' => 'TO', 'id' => 'to'],
                        ]" />
                </div>

                <div class="sm:col-span-3">
                    <x-input label="Complemento" wire:model.defer="address.complement" class="base-form-input" />
                </div>

                <div class="sm:col-span-3">
                    <x-input label="Ponto de Referência" wire:model.defer="address.landmark" class="base-form-input" />
                </div>
            </div>
        </div>




        {{-- <div class="bg-gray-100 p-6 md:hidden w-full md:relative bottom-6 md:static right-6 md:right-auto fixed bottom-6 w-full md:w-auto">
            <x-button type="submit" positive label="Salvar" class="w-full md:w-auto" />
        </div> --}}

        <div class="mt-6 flex items-center justify-end gap-x-6">
            {{-- <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button> --}}

            <x-button type="submit" positive label="Salvar" class="w-full md:w-auto" />
        </div>

    </form>
</div>
