<div>
    <div class="bg-white shadow">
        <div class="flex items-baseline justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin/Users') }}
            </h2>
            <div class="mr-2">
                <x-jet-button wire:click="CreateShowModal" class="bg-blue-500 hover:bg-blue-700">
                    <i class="fas fa-plus"></i>&nbsp; {{ __('Create user') }}
                </x-jet-button>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-table>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Id
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($users->count())
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $user->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap text-right text-sm font-medium">
                                            <x-jet-button wire:click="updateShowModal({{ $user->id }})"
                                                class="bg-green-500 hover:bg-green-700">
                                                <i class="fas fa-edit"></i>
                                            </x-jet-button>
                                            <x-jet-button wire:click="deleteShowModal({{ $user->id }})"
                                                class="bg-red-500 hover:bg-red-700">
                                                <i class="fas fa-trash"></i>
                                            </x-jet-button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-nowrap" colspan="4">No results
                                        found
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="bg-white px-4 py-3 border-gray-200 sm:px-6">
                        {{ $users->links() }}
                    </div>
                </x-table>
            </div>
        </div>
    </div>

    {{-- modal form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Save User') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.debounce.80ms="name" />
                <x-jet-input-error for="name" />
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" wire:model.debounce.80ms="email" />
                <x-jet-input-error for="email" />
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password"
                    wire:model.debounce.80ms="password" />
                <x-jet-input-error for="password" />
            </div>


            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    wire:model.model.debounce.80ms="password_confirmation" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-button>
            @else
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

</div>
