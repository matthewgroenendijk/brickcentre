@extends('components.master')
@section('title', 'All Products')
@section('content')
    <div class="mx-auto container text-white">

        {{-- New --}}
        <div class="rounded-md w-full">
            <div class="flex items-center justify-between pb-6">
                <div class="w-full border-b border-gray-300 dark:border-gray-700 py-5 bg-white dark:bg-gray-800">
                    <div class="flex mx-auto w-full xl:mx-0 items-center justify-between">
                        <h1 class="text-lg text-gray-800 dark:text-gray-100 font-bold">Products Overview</h1>
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
                        <div class="ml-2  text-gray-600 dark:text-gray-400">
                            <a href="{{ route('products.create') }}"
                                class="bg-yellow-500 px-4 py-2 rounded-md text-white dark:text-gray-800 font-semibold tracking-wide cursor-pointer">Create
                                New Product</a>
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
                                    ID
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Product Naam
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Setnummer
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Spotlight
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Voorraad
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $product)
                                <tr>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">{{ $product->id }}</p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">{{ $product->name }}
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                            {{ $product->set_number }}
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                            {{ $product->spotlight }}
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        @if ($product->voorraad == 'op_voorraad')
                                            <p class="text-green-400 font-bold whitespace-no-wrap">
                                                Op voorraad
                                            </p>
                                        @elseif ($product->voorraad == 'moet_besteld_worden')
                                            <p class="text-yellow-400 font-bold whitespace-no-wrap">
                                                Moet besteld worden
                                            </p>
                                        @elseif ($product->voorraad == 'tijdelijk_niet_leverbaar')
                                            <p class="text-orange-400 font-bold whitespace-no-wrap">
                                                Tijdelijk niet leverbaar
                                            </p>
                                        @elseif ($product->voorraad == 'niet_meer_leverbaar')
                                            <p class="text-red-400 font-bold whitespace-no-wrap">
                                                Niet meer leverbaar
                                            </p>
                                        @endif
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                            class="flex justify-start w-full">
                                            <a class="mr-2" href="{{ route('products.edit', $product->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="text-yellow-500 w-5 h-5">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                                </svg>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="text-red-500 w-5 h-5">
                                                    <path fill-rule="evenodd"
                                                        d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div
                        class="px-5 py-5 bg-white dark:bg-gray-600  flex flex-col xs:flex-row items-center xs:justify-between">
                        {{-- <span class="text-xs xs:text-sm text-gray-900 dark:text-white">
                            Showing 1 to 5 of 50 Entries
                        </span> --}}
                        <div class="inline-flex mt-2 xs:mt-0">
                            {!! $data->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <!-- Code block starts -->
            <div class="flex items-center justify-center px-4 message">
                <div role="alert" id="alert"
                    class="transition duration-150 ease-in-out w-full lg:w-11/12 mx-auto bg-white shadow rounded flex flex-col py-4 md:py-0 items-center md:flex-row justify-between">
                    <div class="flex flex-col items-center md:flex-row">
                        <div class="mr-3 p-4 bg-green-400 rounded md:rounded-tr-none md:rounded-br-none text-white">
                            <img class="focus:outline-none"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple-with-action-button-warning-svg1.svg"
                                alt="warning" />
                        </div>
                        <p class="mr-2 text-base font-bold text-gray-800 dark:text-gray-800 mt-2 md:my-0">Success</p>
                        <div class="h-1 w-1 bg-gray-300  rounded-full mr-2 hidden xl:block"></div>
                        <p
                            class="text-sm lg:text-base dark:text-gray-400 text-gray-600 lg:pt-1 xl:pt-0 sm:mb-0 mb-2 text-center sm:text-left">
                            {{ $message }}</p>
                    </div>
                    <div class="flex xl:items-center lg:items-center sm:justify-end justify-center pr-4">
                        <button
                            class="focus:outline-none focus:text-gray-400 hover:text-gray-400 text-sm cursor-pointer text-gray-600 dark:text-gray-400"
                            onclick="closeAlert()">Dismiss</button>
                    </div>
                </div>
            </div>
            <!-- Code block ends -->
        @endif

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
