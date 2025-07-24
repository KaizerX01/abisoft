<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Partners</h1>
        <a href="{{ route('partners.create') }}" class="btn btn-primary">+ Add Partner</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($partners as $partner)
            <div class="card bg-white shadow-md rounded-lg border p-4 flex flex-col items-center">
                <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" class="w-24 h-24 object-cover rounded-full mb-3">
                <h2 class="text-lg font-semibold mb-2">{{ $partner->name }}</h2>

                <div class="flex gap-2 mt-auto">
                    <a href="{{ route('partners.edit', $partner) }}" class="btn btn-sm btn-outline">Edit</a>

                    <form action="{{ route('partners.destroy', $partner) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-error ">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500">No partners found.</div>
        @endforelse
    </div>
</x-admin-layout>
