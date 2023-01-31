@extends('components.master')
@section('title', 'All orders')
@section('content')
    <header aria-label="Page Header">
        <div class="pb-12 lg:pb-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-white sm:text-3xl">
                        Bestelling - #{{ $order->id }}
                    </h1>

                    <p class="mt-1.5 text-sm text-gray-500">
                        Bekijk hier alle beschikbare data! 🎉
                    </p>
                </div>

                <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
                    <a class="inline-flex items-center justify-center dark:text-white inline-block px-0 py-2.5 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-in bg-150 text-sm active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 text-slate-700 rounded-lg border border-gray-200 bg-gray-400 px-5 py-3 text-gray-900 transition hover:bg-gray-50 hover:text-gray-700"
                        href="{{ route('pdf', $order->id) }}">
                        <i class="mr-1 text-lg leading-none fas fa-file-pdf"></i> PDF
                    </a>

                    {{-- <button
                        class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring"
                        type="button">
                        Create Post
                    </button> --}}
                </div>
            </div>
        </div>
    </header>
    <div class="grid-cols-3 grid gap-4 mb-4">
        <div
            class="relative flex flex-col min-w-0 break-words bg-slate-700 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto py-4 px-2">
                <div class="flex flex-row">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p
                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                Payment Status</p>
                            <h5
                                class="text-orange-400 py-1 px-2 mt-1 w-fit border-orange-400 bg-orange-400 bg-opacity-20 border rounded-full text-sm font-bold whitespace-no-wrap">
                                <i class="far fa-dot-circle"></i> {{ $order->payment_status }}
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div
                            class="inline-block w-12 h-12 text-center rounded-xl bg-gradient-to-tl from-yellow-400 to-yellow-600">
                            <i class="fas fa-wifi text-lg relative top-3.5 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="relative flex flex-col min-w-0 break-words bg-slate-700 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto py-4 px-2">
                <div class="flex flex-row">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p
                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                Order Status</p>
                            <h5
                                class="text-red-400 py-1 px-2 mt-1 w-fit border-red-400 bg-red-400 bg-opacity-20 border rounded-full text-xs font-bold whitespace-no-wrap">
                                <i class="far fa-dot-circle"></i> {{ $order->order_status }}
                            </h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div
                            class="inline-block w-12 h-12 text-center rounded-xl bg-gradient-to-tl from-yellow-400 to-yellow-600">
                            <i class="fas fa-balance-scale-right relative top-3.5 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="relative flex flex-col min-w-0 break-words bg-slate-700 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto py-4 px-2">
                <div class="flex flex-row">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p
                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                Totaal bedrag</p>
                            <h5 class="mb-2 text-sm font-bold dark:text-white">€{{ $order->total_price }},-</h5>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div
                            class="inline-block w-12 h-12 text-center rounded-xl bg-gradient-to-tl from-yellow-400 to-yellow-600">
                            <i class="fas fa-money-check-alt text-white relative top-3.5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full mx-auto">
        <div class="flex flex-wrap -mx-3">


            <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white dark:bg-slate-700 border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid py-4 px-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0 dark:text-white/80">Klant Gegevens</p>
                            <button type="button"
                                class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-yellow-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Wijzig</button>
                        </div>
                    </div>
                    <div class="flex-auto px-6 pb-6 pt-2">
                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Klant
                            Informatie</p>
                        <div class="flex flex-wrap -mx-3">

                            <div class="w-full max-w-full px-3 shrink-0 md:w-1/3 md:flex-0">
                                <div class="mb-4">
                                    <label for="first name"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Naam</label>
                                    <input type="text" name="first name" value="{{ $customer->name }}" disabled
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm dark:bg-slate-600 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-yellow-500 focus:outline-none" />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-1/3 md:flex-0">
                                <div class="mb-4">
                                    <label for="email"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Email
                                        adres</label>
                                    <input type="email" name="email" value="{{ $customer->email }}" disabled
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white dark:bg-slate-600 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-yellow-500 focus:outline-none" />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-1/3 md:flex-0">
                                <div class="mb-4">
                                    <label for="last name"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Telefoonnummer</label>
                                    <input type="text" name="last name" value="Lucky" disabled
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm dark:bg-slate-600 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-yellow-500 focus:outline-none" />
                                </div>
                            </div>
                        </div>
                        <hr
                            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Verzend
                            Informatie</p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                <div class="mb-4">
                                    <label for="address"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Address</label>
                                    <input type="text" name="address" disabled value="{{ $customer->address }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm dark:bg-slate-600 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-yellow-500 focus:outline-none" />
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-0">
                                <div class="mb-4">
                                    <label for="city"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">City</label>
                                    <input type="text" name="city" value="{{ $customer->city }}" disabled
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm dark:bg-slate-600 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-yellow-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-0">
                                <div class="mb-4">
                                    <label for="postal code"
                                        class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Postal
                                        code</label>
                                    <input type="text" name="postal code" value="{{ $customer->postal_code }}"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm dark:bg-slate-600 leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-yellow-500 focus:outline-none" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 lg:w-1/3 lg:flex-none">
                <div
                    class="relative flex flex-col pb-2 h-content min-w-0 break-words bg-white dark:bg-slate-700 border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0 dark:text-white">Producten</h6>
                            </div>
                            <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                <p
                                    class="inline-block px-8 py-2 mb-0 text-xs font-bold leading-normal text-center text-yellow-500 align-middle transition-all ease-in bg-transparent border border-yellow-500 border-solid rounded-lg shadow-none cursor-default bg-150 active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 hover:opacity-75">
                                    2
                                    Items</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto p-4 pb-0">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            @foreach (json_decode($order->product_name) as $item)
                                @foreach (json_decode($order->product_prices) as $prices)
                                    @foreach (json_decode($order->product_quantity) as $quantity)
                                        <li
                                            class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                                            <div class="flex flex-col">
                                                <h6
                                                    class="mb-1 text-sm font-semibold leading-normal dark:text-white text-slate-700">
                                                    {{ $item }}</h6>
                                                <span class="text-xs leading-tight dark:text-white dark:opacity-80">Aantal:
                                                    {{ $quantity }}x</span>
                                            </div>
                                            <div class="flex items-center text-sm leading-normal dark:text-white/80">
                                                €{{ $prices }}
                                                <button
                                                    class="dark:text-white inline-block px-0 py-2.5 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-in bg-150 text-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 text-slate-700">
                                                    <i class="fas fa-link mr-1"></i>Bekijk</button>
                                            </div>
                                        </li>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
