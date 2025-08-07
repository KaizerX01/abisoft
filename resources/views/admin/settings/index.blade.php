<x-admin-layout>
    <div class="p-6 max-w-4xl mx-auto space-y-8 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        <!-- Page Header -->
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Paramètres du Site</h1>

        @if(session('success'))
            <div class="alert alert-success bg-gradient-to-r from-green-100 to-green-200 border border-green-300 rounded-lg p-4 text-gray-800 font-medium shadow-md animate-fade-in">{{ session('success') }}</div>
        @endif

        <div class="card bg-white/90 backdrop-blur-md rounded-xl border border-gray-200/50 shadow-lg p-6">
            <div class="overflow-x-auto">
                <table class="table w-full text-sm">
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition-all duration-200">
                            <th class="py-4 px-6 text-gray-700 font-medium">Facebook</th>
                            <td class="py-4 px-6">
                                <a href="{{ $setting->facebook }}" target="_blank" class="link link-primary text-blue-600 hover:text-blue-800 transition-colors">{{ $setting->facebook }}</a>
                            </td>
                            <td class="py-4 px-6 w-32">
                                <a href="{{ route('settings.edit', $setting) }}" class="btn btn-primary btn-sm bg-gradient-to-r from-blue-600 to-blue-700 text-white hover:from-blue-700 hover:to-blue-800 shadow-md hover:shadow-lg transition-all duration-200">Modifier</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all duration-200">
                            <th class="py-4 px-6 text-gray-700 font-medium">LinkedIn</th>
                            <td class="py-4 px-6">
                                <a href="{{ $setting->linkedin }}" target="_blank" class="link link-primary text-blue-600 hover:text-blue-800 transition-colors">{{ $setting->linkedin }}</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all duration-200">
                            <th class="py-4 px-6 text-gray-700 font-medium">Instagram</th>
                            <td class="py-4 px-6">
                                <a href="{{ $setting->instagram }}" target="_blank" class="link link-primary text-blue-600 hover:text-blue-800 transition-colors">{{ $setting->instagram }}</a>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all duration-200">
                            <th class="py-4 px-6 text-gray-700 font-medium">Position</th>
                            <td class="py-4 px-6 text-gray-800">{{ $setting->position }}</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-all duration-200">
                            <th class="py-4 px-6 text-gray-700 font-medium">Téléphone</th>
                            <td class="py-4 px-6 text-gray-800">{{ $setting->phone }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>