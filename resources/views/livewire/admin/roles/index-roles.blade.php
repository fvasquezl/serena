<div>
    <div class="bg-white shadow">
        <div class="flex items-baseline justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class=" font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin/Roles') }}
            </h2>
            <div class="mr-2">
                <x-jet-button wire:click="$emitTo('admin.roles.index-roles', 'createModal')"
                    class="bg-green-500 hover:bg-green-700">
                    <i class="fas fa-plus"></i>&nbsp; {{ __('Create Role') }}
                </x-jet-button>
            </div>
        </div>
    </div>


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-table>
                    <div class="px-6 py-4 flex items-center">
                        <div class="flex items-center">
                            <span>Show</span>
                            <select class="mx-2 form-control" wire:model='show'>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span>Search:</span>
                        </div>
                        <x-jet-input class="flex-1 mx-4" placeholder="Search.." type="text" wire:model="search" />
                        {{-- @livewire('admin.roles.create-roles') --}}
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        @if ($roles->count())
                            <thead class="bg-purple-50">
                                <tr>
                                    <th scope="col"
                                        class="px-4 py-3 cursor-pointer text-center text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        wire:click="order('id')">
                                        Id
                                        @if ($sort == 'id')
                                            @if ($direction == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right"></i>
                                        @endif
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 cursor-pointer text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        wire:click="order('name')">
                                        Name
                                        @if ($sort == 'name')
                                            @if ($direction == 'asc')
                                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                            @else
                                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort float-right"></i>
                                        @endif
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Options
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($roles as $role)
                                    <tr class="hover:bg-gray-100 text-gray-900">
                                        <td class="px-4 py-2 text-center whitespace-nowrap">
                                            {{ $role->id }}
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap">
                                            {{ $role->name }}
                                        </td>
                                        <td class="px-4 py-2 whitespace-nowrap text-center text-sm font-medium">
                                            <x-jet-button
                                                wire:click="$emitTo('admin.roles.index-roles', 'updateModal',{{ $role->id }} )"
                                                class="bg-green-500 hover:bg-green-700">
                                                <i class="fas fa-edit"></i>
                                            </x-jet-button>
                                            <x-jet-button wire:click="$emit('deleterole',{{ $role->id }})"
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
                        {{ $roles->links() }}
                    </div>
                </x-table>
            </div>
        </div>
    </div>

    {{-- modal form --}}
    @include('livewire.admin.roles.partials.modal')


    @push('js')
        <script>
            Livewire.on('deleterole', roleId => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(roleId);

                        Livewire.emitTo('admin.roles.index-roles', 'delete', roleId)

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
