<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Views Analytics</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen">

    <div class="max-w-6xl mx-auto px-4 py-8">
        <header class="flex justify-between items-center mb-8 border-b pb-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Analytics Dashboard</h1>
                <p class="text-slate-500 mt-1">Real-time page views tracked in MongoDB</p>
            </div>
            <a href="/" class="px-4 py-2 bg-slate-950 text-white rounded-md text-sm font-semibold hover:bg-slate-800 transition">
                Visit Home Page
            </a>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-slate-200">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Page Views</span>
                <div class="text-4xl font-extrabold text-indigo-600 mt-2">{{ $totalVisits }}</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left: Breakdown Table -->
            <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow-sm border border-slate-200">
                <h2 class="text-lg font-bold text-slate-900 mb-4 border-b pb-2">Page Breakdown</h2>
                <div class="divide-y divide-slate-100">
                    @forelse($urlStats as $url => $count)
                        <div class="flex justify-between py-3 text-sm">
                            <span class="font-medium text-slate-600 truncate max-w-[200px]" title="{{ $url }}">{{ $url }}</span>
                            <span class="bg-indigo-50 text-indigo-700 font-semibold px-2.5 py-0.5 rounded-full text-xs">{{ $count }} visits</span>
                        </div>
                    @empty
                        <p class="text-slate-400 text-sm py-4">No data logged yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Right: Recent Activity Log -->
            <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-sm border border-slate-200">
                <h2 class="text-lg font-bold text-slate-900 mb-4 border-b pb-2">Recent Visits Log (Last 10)</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="text-slate-400 border-b border-slate-100">
                                <th class="pb-3 font-semibold">URL</th>
                                <th class="pb-3 font-semibold">IP Address</th>
                                <th class="pb-3 font-semibold">User Agent</th>
                                <th class="pb-3 font-semibold text-right">Time</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($recentViews as $view)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="py-3 font-medium text-slate-700 truncate max-w-[150px]" title="{{ $view->url }}">{{ $view->url }}</td>
                                    <td class="py-3 text-slate-500 font-mono">{{ $view->ip_address }}</td>
                                    <td class="py-3 text-slate-500 truncate max-w-[200px]" title="{{ $view->user_agent }}">{{ $view->user_agent }}</td>
                                    <td class="py-3 text-slate-400 text-right text-xs">{{ $view->viewed_at ?? $view->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-8 text-center text-slate-400">No recent activity.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
