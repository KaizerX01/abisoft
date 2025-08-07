<x-admin-layout>
    <div class="p-6 space-y-8 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        @if (session('success'))
            <div class="alert alert-success shadow-lg bg-gradient-to-r from-green-100 to-green-200 border border-green-300 rounded-xl p-4 animate-fade-in">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4 -4m6 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                </svg>
                <span class="text-gray-800 font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white/90 backdrop-blur-md rounded-2xl border border-gray-200/50 shadow-lg p-6 transition-all duration-300 hover:shadow-xl">
            <h2 class="text-2xl font-extrabold text-gray-800 mb-6">Gestion des Utilisateurs</h2>
            <div class="overflow-x-auto">
                <table class="table w-full text-sm">
                    <thead class="bg-gray-100 text-gray-700 uppercase">
                        <tr>
                            <th class="py-3 px-4 text-left">Nom</th>
                            <th class="py-3 px-4 text-left">Email</th>
                            <th class="py-3 px-4 text-left">Rôle</th>
                            <th class="py-3 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($users as $user)
                            <tr class="hover:bg-gray-50 transition-all duration-200">
                                <td class="py-3 px-4 text-gray-800">{{ $user->name }}</td>
                                <td class="py-3 px-4 text-gray-600">{{ $user->email }}</td>
                                <td class="py-3 px-4">
                                    <div class="badge badge-outline badge-accent text-sm">
                                        {{ $user->roles->pluck('name')->join(', ') }}
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-right space-x-2">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                       class="btn btn-sm btn-outline btn-info bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700">
                                        Modifier
                                    </a>

                                    <form action="{{ route('admin.users.destroy', $user) }}"
                                          method="POST"
                                          class="inline-block"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-outline btn-error bg-gradient-to-r from-red-500 to-red-600 text-white hover:from-red-600 hover:to-red-700">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-gray-500">
                                    Aucun utilisateur trouvé.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>