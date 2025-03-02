@vite('resources/css/app.css')
<title>@yield('page-title', '💬 All Comments')</title>

<div class="flex min-h-screen bg-gray-100">
<!-- button menu -->
<button id="toggleSidebar" class="md:hidden bg-gray-800 text-white p-3 absolute top-6 left-4 rounded">
        ☰ Menu
    </button>
    <!--sider-->
 <aside id="sidebar" class="bg-gray-900 text-white fixed  w-full md:w-64 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:relative z-40">
            <button id="closeSidebar" class="md:hidden absolute top-4 right-4  text-2xl p-2 rounded">✖</button>
            @include('layouts.aside')
        </aside>

    <!-- main -->
    <div class="flex-1 flex flex-col items-center p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">💬 All Comments</h1>

        <div class="w-full max-w-5xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($comments as $comment)
                    <div class="bg-white shadow-lg rounded-lg p-6 transition-all hover:scale-105">
                        <h2 class="text-lg font-bold text-gray-900">{{ $comment->user->name }}</h2>
                        <p class="text-gray-600 mt-2">💬 {{ Str::limit($comment->content, 100) }}</p>

                        <a href="{{ route('comments.show', $comment->id) }}" 
                           class="text-blue-600 hover:text-blue-800 font-medium mt-3 inline-block transition-all duration-300">
                            🔗 Show all comments
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        
        <div class="mt-6 flex justify-center">
            {{ $comments->links() }}
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