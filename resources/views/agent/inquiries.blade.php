<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Inquiries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <h3 class="text-lg font-medium mb-4">Properties Inquiries</h3>

                    @if($inquiries->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-3 px-4 text-left">Date</th>
                                        <th class="py-3 px-4 text-left">Property</th>
                                        <th class="py-3 px-4 text-left">From</th>
                                        <th class="py-3 px-4 text-left">Message</th>
                                        <th class="py-3 px-4 text-left">Status</th>
                                        <th class="py-3 px-4 text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($inquiries as $inquiry)
                                        <tr class="{{ $inquiry->read ? '' : 'bg-blue-50' }}">
                                            <td class="py-3 px-4">{{ $inquiry->created_at->format('M d, Y h:i A') }}</td>
                                            <td class="py-3 px-4">
                                                <a href="{{ route('property.details', $inquiry->property_id) }}" class="text-blue-600 hover:underline">
                                                    {{ $inquiry->property->property_name }}
                                                </a>
                                            </td>
                                            <td class="py-3 px-4">{{ $inquiry->sender_username }}</td>
                                            <td class="py-3 px-4">{{ \Illuminate\Support\Str::limit($inquiry->message, 50) }}</td>
                                            <td class="py-3 px-4">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $inquiry->read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                    {{ $inquiry->read ? 'Read' : 'Unread' }}
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex space-x-2">
                                                    @if(!$inquiry->read)
                                                        <a href="{{ route('inquiry.mark-read', $inquiry->id) }}" class="text-blue-600 hover:text-blue-900">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('inquiry.delete', $inquiry->id) }}" class="text-red-600 hover:text-red-900" 
                                                       onclick="return confirm('Are you sure you want to delete this inquiry?');">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="bg-gray-100 p-4 rounded">
                            <p class="text-gray-600">You don't have any inquiries yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>