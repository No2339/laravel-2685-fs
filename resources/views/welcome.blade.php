 <head> @if (session('success'))
<div id="successMessage" class="bg-green-100 border border-green-400 text-center text-green-700 px-2 py-2 rounded transition-opacity duration-500">
    {{ session('success') }}
</div>
@endif
 <title>@yield('page-title', 'Admin Dashboard')</title>
    @vite('resources/css/app.css')</head>
<body class="bg-gray-100">

    <!-- button menu-->
    <button id="toggleSidebar" class="md:hidden bg-gray-800 text-white p-3 absolute top-6 left-4 rounded">
        ☰ Menu
    </button>

    <div class="flex flex-col md:flex-row">
        <!-- sider -->
    <aside id="sidebar" class="bg-gray-900 text-white fixed  w-full md:w-64 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:relative z-40">
            <button id="closeSidebar" class="md:hidden absolute top-4 right-4  text-2xl p-2 rounded">✖</button>
            @include('layouts.aside')
        </aside>

        <!-- main-->
        <main class="flex-1 p-6 ">
        <h1 class="text-4xl font-bold text-blue-600 mb-9 sm:ml-24">📊 Admin Dashboard</h1>


            <!-- total-->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold">👤{{ $countusers }} </h2>
                    <p class="text-lg">Total Users</p>
                </div>
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold">📝 {{ $countposts }}</h2>
                    <p class="text-lg">Total Posts</p>
                </div>
                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold">💬 {{ $countComments }}</h2>
                    <p class="text-lg">Total Comments</p>
                </div>
                <div class="bg-red-500 text-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold">❤️ {{ $countreaction }}</h2>
                    <p class="text-lg">Total Reactions</p>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="mt-10 bg-white p-6 shadow-lg rounded-lg">
                <h2 class="text-xl font-bold mb-4">📌 Recent Activity</h2>
                <ul>
                    @if ($users)
                        <li class="mb-2">📝 User <strong>{{ $users->user->name }}</strong> posted <strong>{{ $users->title }}</strong> </li>
                    @endif  
                    @if ($comments)
                        <li class="mb-2">💬 <strong>{{ $comments->user->name }}</strong> commented on <strong>{{ $comments->comment }}</strong></li>
                    @endif
                    @if ($latestUser)
                        <li class="mb-2">👤 New user <strong>{{ $latestUser->name }}</strong> joined the platform.</li>
                    @endif
                    @if ($latestDelete)
                        <li class="mb-2">🗑️ User <strong>{{ $latestDelete->name }}</strong> was deleted.</li>
                    @endif
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="mt-6 flex flex-wrap gap-4">
                <a href="/users/create" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700">+ Add User</a>
                <a href="/posts/create" class="bg-yellow-600 text-white px-6 py-3 rounded-lg hover:bg-yellow-700">+ New Post</a>
            </div>
        </main>
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
        setTimeout(function() {
        let successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.opacity = '0';
            setTimeout(() => successMessage.style.display = 'none', 100); 
        }
    }, 2000);
    </script>

</body>

