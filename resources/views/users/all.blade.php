
    <title>@yield('page-title', '👤 All Users')</title>
    @vite('resources/css/app.css')

<body class="bg-gray-100">

    <!-- button menu -->
    <button id="toggleSidebar" class="  bg-gray-800 text-white p-3 absolute top-4 left-4 rounded">
        ☰ Menu
    </button>

    <div class="flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-gray-900 text-white fixed  w-full md:w-64 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:relative z-40">
            <button id="closeSidebar" class="md:hidden absolute top-4 right-4  text-2xl p-2 rounded">✖</button>
            @include('layouts.aside')
        </aside>
        <!-- Main Content -->
        <div class="flex-1 p-6 ">
            <!-- Search  -->
            <form action="{{ route('search') }}" method="GET" class="mb-4 flex justify-center items-center">
                <input type="text" name="query" placeholder="Search A User" class="p-2 border rounded w-full max-w-xs">
                <button type="submit" class="p-2 bg-blue-500 text-white rounded ml-2">Search</button>
            </form>

            @if (!request()->has('query') || empty(request('query')))
            <div class="mt-10 bg-white p-6 shadow-lg rounded-lg">
                <h2 class="text-xl font-bold mb-4">📌 Recent Users</h2>
                <ul>
                    @if ($userslast)
                    <li class="border-b py-2 flex justify-between items-center">
                        👤 {{ $userslast->id }} - {{ $userslast->name }}
                        <span class="text-gray-500 text-sm">{{ $userslast->created_at->diffForHumans() }}</span>
                    </li>
                    @endif 
                </ul> 
            </div>
            @endif
<!-- Users List -->
            <h2 class="text-4xl font-bold text-gray-800 p-6 mb-6">👤 All Users</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-6">
                @foreach ($users as $user)
                <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-xl transition-all duration-300">
                    <h1 class="text-lg font-semibold text-gray-700">🆔 ID: <span class="text-gray-900">{{ $user->id }}</span></h1>
                    <h2 class="text-xl font-bold text-blue-600 mt-2">👤 {{ $user->name }}</h2>
                    <p class="text-gray-600 mt-1">📧 <span class="font-medium">{{ $user->email }}</span></p>
                    <p class="text-gray-600">📱 <span class="font-medium">{{ $user->mobile }}</span></p>

                    <!-- Buttons -->
                    <div class="  mt-4 lg:space-x-4 ">
                        <a href="{{ route('users.show', $user->id) }}" class="bg-blue-500 text-white px-4 py-2.5 rounded-lg shadow-md hover:bg-blue-600 transition">View</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white px-4 py-2.5 rounded-lg shadow-md hover:bg-yellow-600 ">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2.5 rounded-lg shadow-md hover:bg-red-600 transition">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach 
            </div>

            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            let sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });

        document.getElementById('closeSidebar').addEventListener('click', function () {
            let sidebar = document.getElementById('sidebar');
            sidebar.classList.add('-translate-x-full');
        });
    </script>

</body>

