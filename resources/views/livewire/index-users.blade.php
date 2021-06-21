<div>
    <x-slot name="header">
        <h2 class="flex items-baseline justify-between font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            <x-jet-button wire:click="CreateShowModal">
                {{ __('Create') }}
            </x-jet-button>
        </h2>
    </x-slot>
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
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <x-jet-button wire:click="updateShowModal({{ $user->id }})">
                                                {{ __('Update') }}
                                            </x-jet-button>
                                            <x-jet-danger-button wire:click="deleteShowModal({{ $user->id }})">
                                                {{ __('Delete') }}
                                            </x-jet-danger-button>
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
