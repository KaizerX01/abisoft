<x-admin-layout>
    <h1 class="text-2xl font-bold mb-6">Add New Partner</h1>

    <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-xl">
        @csrf

        <div class="form-control">
            <label class="label font-medium">Name</label>
            <input type="text" name="name" required class="input input-bordered w-full" value="{{ old('name') }}">
        </div>

        <div class="form-control">
            <label class="label font-medium">Image</label>
            <input type="file" name="image" required class="file-input file-input-bordered w-full" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Add Partner</button>
    </form>
</x-admin-layout>
