<title>@yield('page-title', 'Add Users')</title>
@vite('resources/css/app.css')

<div class="flex min-h-screen bg-gray-100">
   <!-- button menu -->
<button id="toggleSidebar" class="md:hidden bg-gray-800 text-white p-3 fixed top-4 left-4 rounded">
        ☰ Menu
    </button>

    <!-- sider-->
    <aside id="sidebar" class="bg-gray-900 text-white fixed  w-full md:w-64 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out md:relative z-40">
            <button id="closeSidebar" class="md:hidden absolute top-4 right-4  text-2xl p-2 rounded">✖</button>
            @include('layouts.aside')
        </aside>

    <!-- main-->
    <div class="flex-1 flex flex-col items-center justify-center p-6">
        <div class="w-full max-w-xl bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Add New User</h2>

            <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name:</label>
                    <input type="text" name="name"
                           class="w-full border rounded p-2 focus:ring focus:ring-blue-300"
                           value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-700 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" name="email"
                           class="w-full border rounded p-2 focus:ring focus:ring-blue-300"
                           value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-700 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mobile -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Mobile Number:</label>
                    <input type="text" name="mobile"
                           class="w-full border rounded p-2 focus:ring focus:ring-blue-300"
                           placeholder="Example: +966512345678"
                           value="{{ old('mobile') }}">
                    @error('mobile')
                        <div class="text-red-700 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Role:</label>
                    <select name="roles"
                            class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
                        <option value="">Select Role</option>
                        <option value="admin" {{ old('roles') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="moderator" {{ old('roles') == 'moderator' ? 'selected' : '' }}>Moderator</option>
                        <option value="user" {{ old('roles') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="guest" {{ old('roles') == 'guest' ? 'selected' : '' }}>Guest</option>
                    </select>
                    @error('roles')
                        <div class="text-red-700 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Password:</label>
                    <input type="password" name="password"
                           class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
                    @error('password')
                        <div class="text-red-700 text-xs">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                        Add User
                    </button>
                </div>
            </form>
        </div>
    </div> <!-- JavaScript -->
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
</div>

