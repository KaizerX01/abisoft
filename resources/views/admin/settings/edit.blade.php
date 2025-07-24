<x-admin-layout>
    <h1 class="text-2xl font-bold mb-6">Edit Site Settings</h1>

    <form action="{{ route('settings.update', $setting) }}" method="POST" class="max-w-xl space-y-6">
        @csrf
        @method('PUT')

        <div class="form-control">
            <label class="label font-medium">Facebook URL</label>
            <input type="url" name="facebook" value="{{ old('facebook', $setting->facebook) }}" class="input input-bordered w-full" placeholder="https://facebook.com/yourpage">
            @error('facebook') <p class="text-error mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="form-control">
            <label class="label font-medium">LinkedIn URL</label>
            <input type="url" name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}" class="input input-bordered w-full" placeholder="https://linkedin.com/in/yourprofile">
            @error('linkedin') <p class="text-error mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="form-control">
            <label class="label font-medium">Instagram URL</label>
            <input type="url" name="instagram" value="{{ old('instagram', $setting->instagram) }}" class="input input-bordered w-full" placeholder="https://instagram.com/yourprofile">
            @error('instagram') <p class="text-error mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="form-control">
            <label class="label font-medium">Position</label>
            <input type="text" name="position" value="{{ old('position', $setting->position) }}" class="input input-bordered w-full" placeholder="Your position/address">
            @error('position') <p class="text-error mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="form-control">
            <label class="label font-medium">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}" class="input input-bordered w-full" placeholder="+123 456 7890">
            @error('phone') <p class="text-error mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</x-admin-layout>
