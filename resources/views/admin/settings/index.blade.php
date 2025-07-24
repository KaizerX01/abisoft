<x-admin-layout>
    <h1 class="text-2xl font-bold mb-6">Site Settings</h1>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto w-full max-w-3xl">
        <table class="table table-zebra w-full">
            <tbody>
                <tr>
                    <th>Facebook</th>
                    <td><a href="{{ $setting->facebook }}" target="_blank" class="link link-primary">{{ $setting->facebook }}</a></td>
                    <td rowspan="5" class="w-32">
                        <a href="{{ route('settings.edit', $setting) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
                <tr>
                    <th>LinkedIn</th>
                    <td><a href="{{ $setting->linkedin }}" target="_blank" class="link link-primary">{{ $setting->linkedin }}</a></td>
                </tr>
                <tr>
                    <th>Instagram</th>
                    <td><a href="{{ $setting->instagram }}" target="_blank" class="link link-primary">{{ $setting->instagram }}</a></td>
                </tr>
                <tr>
                    <th>Position</th>
                    <td>{{ $setting->position }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $setting->phone }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-admin-layout>
