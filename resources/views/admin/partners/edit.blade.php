<x-admin-layout>
    <h1 class="text-2xl font-bold mb-6">Edit Partner</h1>

    <form action="{{ route('partners.update', $partner) }}" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-xl">
        @csrf
        @method('PUT')

        <div class="form-control">
            <label class="label font-medium">Name</label>
            <input type="text" name="name" required class="input input-bordered w-full" value="{{ old('name', $partner->name) }}">
        </div>

        <div class="form-control">
            <label class="label font-medium">Image</label>
            <input type="file" name="image" class="file-input file-input-bordered w-full" accept="image/*">
            <div class="mt-2">
                <img src="{{ asset('storage/' . $partner->image) }}" alt="" class="w-24 h-24 object-cover rounded-full">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Partner</button>
    </form>
</x-admin-layout>
