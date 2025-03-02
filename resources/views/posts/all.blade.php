<title>@yield('page-title', '📂 Manage Posts')</title>
@vite('resources/css/app.css')

<body class="bg-gray-100">

    <!-- button open menu -->
    <button id="toggleSidebar" class="md:hidden bg-gray-800 text-white p-3 fixed top-4 left-4 rounded">
        ☰ Menu
    </button>

    <div class="flex ">
        <!-- sider-->
        <aside id="sidebar" class="bg-gray-900 text-white fixed w-full  md:w-64 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:relative z-40">
            <button id="closeSidebar" class="md:hidden absolute top-4 right-4  text-2xl p-2 rounded">✖</button>
            @include('layouts.aside')
        </aside>    

        <!-- main-->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 ml-24">📂 Posts List</h1>

            <!-- tailwindcss tabalt and mobile-->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6 lg:hidden">
                @foreach ($posts as $post)
                <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-xl transition-all duration-300">
                    <h1 class="text-lg font-semibold text-gray-700">🆔 ID: <span class="text-gray-900">{{ $post->id }}</span></h1>
                    <h2 class="text-xl font-bold text-blue-600 mt-2">📌 {{ $post->title }}</h2>
                    <p class="text-gray-600 mt-1">📝 {{ Str::limit($post->body, 100) }}</p>
                    <p class="text-black">👤 {{ $post->user->name }}</p>

                    <div class="mt-4">
                        <span class="px-2 py-1 rounded text-xs font-semibold
                            @if($post->post_status->type == 'Published') bg-green-100 text-green-700 
                            @elseif($post->post_status->type == 'Pending') bg-orange-100 text-orange-700 
                            @elseif($post->post_status->type == 'Postponed') bg-blue-100 text-blue-700 
                            @elseif($post->post_status->type == 'Private') bg-gray-200 text-gray-700 
                            @elseif($post->post_status->type == 'Cancelled') bg-red-100 text-red-700 
                            @elseif($post->post_status->type == 'Rejected') bg-purple-100 text-purple-700 
                            @endif">
                            {{ $post->post_status->type }}
                        </span>
                    </div>

                    <div class="mt-4 flex space-x-3">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition">🗑 Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- tailwindcss camputer-->
            <div class="hidden lg:block bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                <table class="w-full border-collapse text-xs">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-left">
                            <th class="p-2">🆔 ID</th>
                            <th class="p-2">📌 Title</th>
                            <th class="p-2">📝 Content</th>
                            <th class="p-2">👤 User</th>
                            <th class="p-2 text-right">📅 Status</th>
                            <th class="p-2 text-right">⚡ Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="p-2 text-gray-600">{{ $post->id }}</td>
                            <td class="p-2 font-medium text-blue-600 truncate">{{ $post->title }}</td>
                            <td class="p-2 font-medium text-blue-600 text-xs whitespace-normal break-words">{{ Str::limit($post->body, 50) }}</td>
                            <td class="p-2 text-gray-500">{{ $post->user->name }}</td>

                            <td class="p-2 text-right">
                                <span class="px-2 py-1 rounded text-xs font-semibold
                                    @if($post->post_status->type == 'Published') bg-green-100 text-green-700 
                                    @elseif($post->post_status->type == 'Pending') bg-orange-100 text-orange-700 
                                    @elseif($post->post_status->type == 'Postponed') bg-blue-100 text-blue-700 
                                    @elseif($post->post_status->type == 'Private') bg-gray-200 text-gray-700 
                                    @elseif($post->post_status->type == 'Cancelled') bg-red-100 text-red-700 
                                    @elseif($post->post_status->type == 'Rejected') bg-purple-100 text-purple-700 
                                    @endif">
                                    {{ $post->post_status->type }}
                                </span>
                            </td>

                            <td class="p-2 text-right">
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-1 py-0.5 rounded shadow hover:bg-red-600 transition text-xs">
                                        🗑 Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 
            <div class="mt-6">
                {{ $posts->links() }}
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


