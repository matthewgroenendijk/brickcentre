@extends('components.master')
@section('title', 'All orders')
@section('content')
    <div class="mx-auto container text-white">

        {{-- New --}}
        <div class="rounded-md w-full">
            <div class="flex items-center justify-between pb-6">
                <div class="w-full border-b border-gray-300 dark:border-gray-700 py-5">
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
                <div class="inline-block min-w-full rounded-lg border border-gray-200 overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Ordernummer
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Productnaam
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Betaalstatus
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Orderstatus
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    KlantID
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-white uppercase tracking-wider">
                                    Acties
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $order)
                                <tr>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">{{ $order->id }}
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                            {{ str_replace(['[', ']', '"'], ' ', $order->product_name) }}
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                            @if ($order->payment_status == 'Bevestigd')
                                                <p class="text-green-400 font-bold whitespace-no-wrap">
                                                    Bevestigd
                                                </p>
                                            @elseif ($order->payment_status == 'Pending')
                                                <p class="text-orange-400 font-bold whitespace-no-wrap">
                                                    Pending
                                                </p>
                                            @elseif ($order->payment_status == 'Niet betaald')
                                                <p class="text-red-400 font-bold whitespace-no-wrap">
                                                    Niet betaald
                                                </p>
                                            @endif
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                            @if ($order->order_status == 'Order compleet')
                                                <p class="text-green-400 font-bold whitespace-no-wrap">
                                                    Order compleet
                                                </p>
                                            @elseif ($order->order_status == 'Order in behandeling')
                                                <p class="text-yellow-400 font-bold whitespace-no-wrap">
                                                    Order in behandeling
                                                </p>
                                            @elseif ($order->order_status == 'Bevestiging ontvangen')
                                                <p class="text-orange-400 font-bold whitespace-no-wrap">
                                                    Pending
                                                </p>
                                            @elseif ($order->order_status == 'Geen bevestiging ontvangen')
                                                <p class="text-red-500 font-bold whitespace-no-wrap">
                                                    Geen bevestiging ontvangen
                                                </p>
                                            @endif
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                            {{ $order->user_id }}
                                        </p>
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-600 text-sm">
                                        <div class="flex justify-start w-full">
                                            <a href="{{ route('orders.show', $order->id) }}">
                                                <i class="fas fa-eye text-blue-500 text-lg"></i>
                                            </a>
                                            {{-- <a class="ml-2" href="{{ route('orders.edit', $order->id) }}">
                                                <i class="fas fa-pencil-alt text-yellow-500 text-lg"></i>
                                            </a> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div
                        class="px-5 py-5 bg-white dark:bg-gray-600  flex flex-col xs:flex-row items-center xs:justify-between">
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
