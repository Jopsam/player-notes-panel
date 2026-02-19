<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">
                    Players
                </h1>
                <p class="mt-1 text-sm text-gray-500">
                    Manage player notes and activity.
                </p>
            </div>
        </div>

        <!-- Card -->
        <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">

            @if($players->count())
                <div class="overflow-x-auto w-full">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($players as $player)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $player->id }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $player->name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $player->email }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                        <a
                                            href="{{ route('players.notes', $player->id) }}"
                                            wire:navigate
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                            >
                                            Manage Notes
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                        {{ $players->links() }}
                    </div>
                </div>

            @else
                <!-- Empty State -->
                <div class="px-6 py-16 text-center">
                    <div class="mx-auto h-12 w-12 text-gray-400">
                        <svg fill="none" stroke="currentColor" stroke-width="1.5"
                             viewBox="0 0 24 24" class="w-12 h-12 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.5 7.5h-9m9 4.5h-9m9 4.5h-9M3 6h18M3 18h18" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-medium text-gray-900">
                        No players found
                    </h3>
                    <p class="mt-2 text-sm text-gray-500">
                        There are currently no registered players.
                    </p>
                </div>
            @endif

        </div>
    </div>
</div>
