<x-admin-layout>
    <div class="p-6 max-w-xl mx-auto">
        <h2 class="text-2xl font-semibold mb-6">Edit User</h2>

        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="form-control">
                <label class="label">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="input input-bordered w-full" required>
            </div>

            <div class="form-control">
                <label class="label">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input input-bordered w-full" required>
            </div>

            <div class="form-control">
                <label class="label">Role</label>
                <select name="role" class="select select-bordered w-full" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role }}" {{ $user->hasRole($role) ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-6">
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline ml-2">Cancel</a>
            </div>
        </form>
    </div>
</x-admin-layout>
