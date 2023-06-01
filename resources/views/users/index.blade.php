@extends('components.master')
@section('title', 'All orders')
@section('content')
    <div class="mx-auto container text-white">

        {{-- New --}}
        <div class="rounded-md w-full">
            <div class="flex items-center justify-between pb-6">
                <div class="w-full border-b border-gray-300 dark:border-gray-700 py-5 bg-white dark:bg-gray-800">
                    <div class="flex mx-auto w-full xl:mx-0 items-center justify-between">
                        <h1 class="text-lg text-gray-800 dark:text-gray-100 font-bold">Orders Overzicht</h1>
                        <div class="flex bg-gray-50 dark:bg-gray-700 items-center p-2 rounded-lg shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input class="focus:outline-none ml-1" style="background: none" type="text" name=""
                                id="" placeholder="search...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Klantnummer
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Klantnaam
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Email adres
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Adres
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Postcode
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Acties
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">{{ $user->id }}
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                            {{ $user->name }}
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                            {{ $user->email }}
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                            {{ $user->address }}
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                            {{ $user->postal_code }}
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                            <a class="mr-2" href="{{ route('users.show', $user->id) }}">
                                                <i class="fas fa-eye text-blue-500 text-lg"></i>
                                            </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div
                        class="px-5 py-5 bg-white dark:bg-gray-600  flex flex-col xs:flex-row items-center xs:justify-between">
                        <span class="text-xs xs:text-sm text-gray-900 dark:text-white">
                            Showing 1 to 5 of 50 Entries
                        </span>
                        <div class="inline-flex mt-2 xs:mt-0">
                            {{-- <button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                                Prev
                            </button>
                            &nbsp; &nbsp;
                            <button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r">
                                Next
                            </button> --}}
                            {!! $data->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Alert --}}
    <script>
        var Alert = document.getElementById("alert");
        var close = document.getElementById("close-modal");
        Alert.style.transform = "translateY(0%)";

        function closeAlert() {
            setTimeout(function() {
                Alert.style.opacity = "0";
            }, 1000);
        }
    </script>
@endsection
