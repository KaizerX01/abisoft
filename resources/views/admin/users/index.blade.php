<x-admin-layout>
    <div class="p-6 space-y-6">
        

        @if (session('success'))
            <div class="alert alert-success shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6"
                     fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2l4 -4m6 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-md">
            <table class="table table-zebra w-full text-sm">
                <thead class="bg-base-200 text-base-content">
                    <tr>
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Role</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="py-2 px-4">{{ $user->name }}</td>
                            <td class="py-2 px-4">{{ $user->email }}</td>
                            <td class="py-2 px-4">
                                <div class="badge badge-outline badge-accent">
                                    {{ $user->roles->pluck('name')->join(', ') }}
                                </div>
                            </td>
                            <td class="py-2 px-4 text-right space-x-1">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                   class="btn btn-sm btn-outline btn-info">Edit</a>

                                <form action="{{ route('admin.users.destroy', $user) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-outline btn-error">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-400">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
