<x-app-layout>

    <div class="container mx-auto xl:px-72 lg:px-36 px-4 py-4 text-white">
        <h2 class="text-3xl font-bold">Personal-access-token</h2>
        {{$errors}}
        @if(session('message'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            <span class="font-medium">Success alert!</span> {{session('message')}}
        </div>
        @endif
       <div class="w-48 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
           @forelse(auth()->user()->tokens as $token)
           <a href="#" aria-current="true" class="text-black block py-2 px-4 w-full rounded-t-lg border-b border-gray-200 cursor-pointer dark:bg-gray-800 dark:border-gray-600">
                    {{$token->name}}
                </a>
           @empty
               <a href="" class="text-black block py-2 px-4 w-full rounded-t-lg border-b border-gray-200 cursor-pointer dark:bg-gray-800 dark:border-gray-600">You have no token yet</a>
           @endforelse
       </div>
        <hr class="my-2">
        <form method="post" action="{{route('create-token')}}">
            @csrf
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-white dark:text-gray-300">Token name</label>
                <input name="token_name" type="text" id="token" class="text-black bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-white dark:text-gray-300">Ability</label>
                <div class="flex items-center mb-4">
                    <input id="default-checkbox" type="checkbox" name="ability[]" value="repo:create" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-white">Create repo</label>
                </div>
                <div class="flex items-center">
                    <input checked="" id="checked-checkbox" type="checkbox" name="ability[]" value="repo:delete" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checked-checkbox" name="ability" class="ml-2 text-sm font-medium text-white">Delete repo</label>
                </div>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
</x-app-layout>
