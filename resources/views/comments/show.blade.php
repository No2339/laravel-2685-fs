@vite('resources/css/app.css')
<title>@yield('page-title', '💬 User Single Comments')</title>
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-gray-300 pb-3">
    <p class="text-gray-600 mt-2">
    📝 Total Comments: <span class="text-blue-500 font-semibold">{{ $allcomments->user->comments->count() }}</span>
</p>
    User: <span class="text-blue-600">{{ $allcomments->user->name }}</span>  
        <span class="text-gray-500 text-sm">ID: {{ $allcomments->user->id }}</span>
    </h2>

    <h3 class="mt-6 text-lg font-semibold text-gray-700 flex items-center">
        💬 User's Comments on Other Posts:
    </h3>

    <ul class="mt-4 space-y-4">
        @foreach($allcomments->user->comments as $comment)
            <li class="bg-gray-100 p-4 rounded-lg shadow-md">
                <div class="text-sm text-gray-600">Comment ID: <span class="font-bold">{{ $comment->id }}</span></div>
                <div class="mt-1 text-gray-900">
                    <strong>🗨 Comment:</strong> {{ $comment->comment }}
                </div>
                <div class="mt-1">
                    <strong class="text-blue-500">📍 On Post:</strong>
                    <span class="text-blue-600 font-semibold">{{ $comment->post->title }}</span>
                </div>
                <div class="text-sm text-gray-500 mt-2">
                    📅 Comment Date: {{ $comment->created_at->format('Y-m-d H:i') }}
                </div>
            </li>
        @endforeach
    </ul>
</div>
