<title>@yield('page-title', ' USER DETAILS')</title>
@vite('resources/css/app.css')
<div class="max-w-4xl mx-auto my-8 p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-6">User Details</h2>

    <div class="p-6 border rounded-lg shadow-md bg-gray-50">
        <h1 class="text-2xl font-semibold text-blue-600 mb-3">User ID: {{ $snigelusers->id }}</h1>
        <p class="text-lg text-gray-700"><strong>Name:</strong> {{ $snigelusers->name }}</p>
        <p class="text-lg text-gray-700"><strong>Email:</strong> {{ $snigelusers->email }}</p>
        <p class="text-lg text-gray-700"><strong>Total Posts:</strong> {{ $usersCount }}</p>
        <p class="text-lg text-gray-700"><strong>Joined On:</strong> {{ $snigelusers->created_at->format('F j, Y') }}</p>
    </div>

    <h2 class="text-2xl font-semibold text-blue-600 mt-6">User Posts:</h2>
    <ul class="mt-4 space-y-4">
        @foreach ($snigelusers->posts as $post)
            <li class="p-4 bg-white shadow-md rounded-lg border-l-4 border-blue-500">
                <h3 class="text-lg font-semibold text-gray-800">{{ $post['title'] }}</h3>
                <p class="text-gray-600">{{ $post['body'] }}</p>
                <p class="text-sm text-gray-500">Created on: {{ $post['created_at'] }}</p>
            </li>
        @endforeach
    </ul>

    <h2 class="text-2xl font-semibold text-blue-600 mt-6">Latest Post:</h2>
    <div class="mt-4 p-6 bg-blue-100 shadow-md rounded-lg">
        <h3 class="text-lg font-semibold text-blue-800">{{ $latest_post->title }}</h3>
        <p class="text-gray-700">{{ $latest_post->body }}</p>
        <p class="text-sm text-gray-600">Created on: {{ $latest_post->created_at }}</p>
    </div>
</div>
