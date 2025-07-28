<x-admin-layout>
    <div class="p-6 max-w-7xl mx-auto space-y-8">
        <!-- Page Header -->
        <div class="text-center space-y-2">
            <div class="flex items-center justify-center gap-3 mb-2">
                <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <h1 class="text-4xl font-bold text-base-content">Activity Logs</h1>
            <p class="text-base-content/70 text-lg">Real-time system activity and user actions</p>
            <div class="flex items-center justify-center gap-2 mt-4">
                <div class="w-2 h-2 bg-success rounded-full animate-pulse"></div>
                <span class="text-sm text-base-content/60">Live monitoring active</span>
            </div>
        </div>



        <!-- Activity Timeline -->
        <div class="card bg-base-100 shadow-xl border border-base-200 overflow-hidden">
            <div class="card-header bg-base-200/50 p-6 border-b border-base-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-base-content">Recent Activity</h2>
                        <p class="text-sm text-base-content/60 mt-1">System events and user actions in real-time</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-success rounded-full animate-pulse"></div>
                        <span class="text-xs text-base-content/60">Auto-refresh</span>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead class="bg-base-200/30">
                        <tr class="border-base-300">
                            <th class="py-4 px-6 font-semibold text-base-content">Timeline</th>
                            <th class="py-4 px-6 font-semibold text-base-content">User</th>
                            <th class="py-4 px-6 font-semibold text-base-content">Action</th>
                            <th class="py-4 px-6 font-semibold text-base-content">Target</th>
                            <th class="py-4 px-6 font-semibold text-base-content">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr class="hover:bg-base-200/20 transition-all duration-200 group">
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="flex flex-col items-center">
                                            <div class="w-3 h-3 bg-primary rounded-full group-hover:scale-125 transition-transform duration-200"></div>
                                            <div class="w-px h-8 bg-base-300 mt-2"></div>
                                        </div>
                                        <div>
                                            <div class="font-medium text-base-content">{{ $activity->created_at->format('H:i') }}</div>
                                            <div class="text-xs text-base-content/50">{{ $activity->created_at->format('M d, Y') }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="avatar placeholder">
                                            <div class="bg-primary/10 text-primary rounded-full w-8 h-8 flex items-center justify-center">
                                                <span class="text-xs font-medium">
                                                    {{ $activity->user ? strtoupper(substr($activity->user->name, 0, 2)) : '?' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-medium text-base-content">{{ $activity->user->name ?? 'Unknown' }}</div>
                                            <div class="text-xs text-base-content/50">
                                                {{ $activity->user ? 'ID: ' . $activity->user->id : 'System' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    @php
                                        $actionColors = [
                                            'CREATE' => 'badge-success',
                                            'UPDATE' => 'badge-warning',
                                            'DELETE' => 'badge-error',
                                            'LOGIN' => 'badge-info',
                                            'LOGOUT' => 'badge-ghost',
                                            'VIEW' => 'badge-accent',
                                        ];
                                        $actionIcons = [
                                            'CREATE' => 'M12 6v6m0 0v6m0-6h6m-6 0H6',
                                            'UPDATE' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z',
                                            'DELETE' => 'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16',
                                            'LOGIN' => 'M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1',
                                            'LOGOUT' => 'M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1',
                                            'VIEW' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'
                                        ];
                                        $actionUpper = strtoupper($activity->action);
                                        $badgeClass = $actionColors[$actionUpper] ?? 'badge-outline';
                                        $iconPath = $actionIcons[$actionUpper] ?? 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z';
                                    @endphp
                                    <div class="badge {{ $badgeClass }} badge-lg gap-2 font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}" />
                                        </svg>
                                        {{ $activity->action }}
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-accent rounded-full"></div>
                                        <span class="font-medium text-base-content">{{ $activity->target }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="max-w-xs">
                                        <p class="text-sm text-base-content/80 truncate" title="{{ $activity->description }}">
                                            {{ $activity->description }}
                                        </p>
                                        <div class="text-xs text-base-content/40 mt-1">
                                            {{ $activity->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
        // Auto-refresh page every 30 seconds for live updates
        setInterval(() => {
            const currentUrl = window.location.href;
            if (!currentUrl.includes('page=')) {
                // Only auto-refresh if on first page to avoid disrupting pagination
                window.location.reload();
            }
        }, 30000);
    </script>
</x-admin-layout>