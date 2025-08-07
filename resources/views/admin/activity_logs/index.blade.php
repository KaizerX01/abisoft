<x-admin-layout>
    <div class="p-6 max-w-7xl mx-auto space-y-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">

        <!-- Page Header -->
        <div class="text-center space-y-4">
            <div class="flex items-center justify-center gap-3">
                <div class="w-14 h-14 bg-blue-100/80 rounded-full flex items-center justify-center shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <h1 class="text-4xl font-extrabold text-gray-900">Journaux d'Activité</h1>
            <p class="text-gray-600 text-lg">Suivi en temps réel des actions système et utilisateur</p>
            <div class="flex items-center justify-center gap-2">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-sm text-gray-500">Surveillance en direct active</span>
            </div>
        </div>

        <!-- Activity Timeline -->
        <div class="card bg-white/90 backdrop-blur-md rounded-2xl border border-gray-200/50 shadow-lg p-6">
            <div class="card-header bg-gray-100/50 p-6 rounded-t-2xl border-b border-gray-200/50">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Activité Récente</h2>
                        <p class="text-sm text-gray-500 mt-1">Événements système et actions utilisateur en temps réel</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                        <span class="text-xs text-gray-500">Actualisation automatique</span>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                @php
                    $activitiesByDate = $activities->groupBy(function ($activity) {
                        return $activity->created_at->format('Y-m-d');
                    });
                @endphp

                @foreach ($activitiesByDate as $date => $dayActivities)
                    <div x-data="{ open: true }" class="mb-8 last:mb-0">
                        <div @click="open = !open" class="flex items-center justify-between cursor-pointer p-4 bg-gray-50/80 rounded-lg border border-gray-200/50 hover:bg-gray-100 transition-all duration-300">
                            <h3 class="text-lg font-semibold text-gray-700">{{ \Carbon\Carbon::parse($date)->format('d M Y') }}</h3>
                            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transform rotate-180 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div x-show="open" x-collapse class="mt-4 space-y-4">
                            @foreach ($dayActivities as $activity)
                                <div class="flex items-start gap-4 p-4 bg-white/90 rounded-lg border border-gray-200/50 hover:bg-gray-50 transition-all duration-300">
                                    <div class="flex flex-col items-center mt-1">
                                        <div class="w-3 h-3 bg-blue-500 rounded-full group-hover:scale-125 transition-transform duration-200"></div>
                                        <div class="w-px h-full bg-gray-200"></div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-center mb-2">
                                            <div class="font-medium text-gray-800">{{ $activity->created_at->format('H:i') }}</div>
                                            <div class="badge badge-lg {{ $activity->action === 'CREATE' ? 'badge-success' : ($activity->action === 'UPDATE' ? 'badge-warning' : ($activity->action === 'DELETE' ? 'badge-error' : ($activity->action === 'LOGIN' ? 'badge-info' : ($activity->action === 'LOGOUT' ? 'badge-ghost' : 'badge-accent')))) }} gap-2">
                                                {{ strtoupper($activity->action) }}
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3 mb-2">
                                            <div class="avatar placeholder">
                                                <div class="bg-blue-100/80 text-blue-700 rounded-full w-8 h-8 flex items-center justify-center">
                                                    <span class="text-xs font-medium">
                                                        {{ $activity->user ? strtoupper(substr($activity->user->name, 0, 2)) : '?' }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-medium text-gray-700">{{ $activity->user->name ?? 'Inconnu' }}</div>
                                                <div class="text-xs text-gray-500">{{ $activity->user ? 'ID: ' . $activity->user->id : 'Système' }}</div>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-1">{{ $activity->target }}</p>
                                        <p class="text-xs text-gray-500 truncate max-w-xs" title="{{ $activity->description }}">{{ $activity->description }}</p>
                                        <div class="text-xs text-gray-400 mt-1">{{ $activity->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                @if ($activities->isEmpty())
                    <div class="text-center py-8 text-gray-500">
                        Aucun journal d'activité trouvé.
                    </div>
                @endif
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center">
            <div class="join">
                {{ $activities->links() }}
            </div>
        </div>
    </div>

    <!-- Auto-refresh Script -->
    <script>
        // Auto-refresh page every 30 seconds for live updates, preserving current page
        setInterval(function() {
            const currentUrl = window.location.href;
            window.location.href = currentUrl; // Reload with current page preserved
        }, 30000);
    </script>
</x-admin-layout>