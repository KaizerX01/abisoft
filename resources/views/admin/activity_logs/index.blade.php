<x-admin-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-4">Activity Logs</h2>

        <div class="overflow-x-auto">
            <table class="table w-full table-zebra">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>User</th>
                        <th>Action</th>
                        <th>Target</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $activity->user->name ?? 'Unknown' }}</td>
                            <td>{{ $activity->action }}</td>
                            <td>{{ $activity->target }}</td>
                            <td>{{ $activity->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $activities->links() }}
        </div>
    </div>
</x-admin-layout>
