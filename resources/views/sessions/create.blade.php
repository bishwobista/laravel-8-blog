<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-100 border border-gray-200 p-8 rounded-xl">
            <h1 class="text-center font-bold text-xl">LogIn</h1>

            <form method="POST" action="/login" class="mt-10">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email"> Email

                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" value="{{ old('email') }}" required>

                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password"> Password

                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" value="{{ old('password') }}" required>

                    @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">

                    <button class="border border-gray-400 p-2 w-full bg-blue-500 text-white font-bold" type="submit"> Login </button>
                </div>

                {{--                @foreach($errors->all() as $error )--}}
                {{--                    <li class="text-red-500 text-xm">{{ $error }}</li>--}}
                {{--                @endforeach--}}
            </form>
        </main>
    </section>
</x-layout>
