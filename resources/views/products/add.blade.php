@extends('components.master')
@section('title', 'Add Product')
@section('content')
    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgb(131, 131, 131);
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #FFCF00;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #FFCF00;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <form method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
        @csrf
        <div class="bg-white dark:bg-gray-800">
            <div class="container mx-auto bg-white dark:bg-gray-800 rounded">
                <div class="xl:w-full border-b border-gray-300 dark:border-gray-700 py-5 bg-white dark:bg-gray-800">
                    <div class="flex w-11/12 mx-auto xl:w-full xl:mx-0 items-center">
                        <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Algemeene Product Informatie</p>
                        <div class="ml-2 cursor-pointer text-gray-600 dark:text-gray-400">
                            <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg"
                                alt="info">
                            <img class="dark:block hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg" alt="info">
                        </div>
                    </div>
                </div>
                <div class="mx-auto">
                    <div class="xl:w-9/12 w-11/12 mx-auto xl:mx-0">
                        <div class="rounded relative mt-8 h-48">
                            <img alt="thumbnail" id="thumbnail_img"
                                class="w-full h-full object-cover rounded absolute shadow" />
                            <div class="absolute bg-black opacity-50 top-0 right-0 bottom-0 left-0 rounded"></div>
                            <div class="flex items-center px-3 py-2 rounded absolute right-0 mr-4 mt-4 cursor-pointer">
                                <label for="thumbnail" class="text-xs cursor-pointer text-gray-100">Verander Thumbnail
                                    Foto</label>
                                <label for="thumbnail" class="ml-2  cursor-pointer text-gray-100">
                                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg1.svg"
                                        alt="Edit">
                                </label>
                                <input type="file" id="thumbnail" name="image_thumbnail" hidden accept="image/*"
                                    onchange="showPreview(event);" />
                            </div>
                        </div>
                        <div class="mt-8 flex flex-col xl:w-2/6 lg:w-1/2 md:w-1/2 w-full">
                            <label for="name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Product
                                Naam</label>
                            <input type="text" id="name" name="name" required
                                class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 bg-transparent placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                placeholder="Camp Nou" />
                        </div>
                        <div class="mt-8 flex flex-col xl:w-3/5 lg:w-1/2 md:w-1/2 w-full">
                            <label for="description"
                                class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Beschrijving</label>
                            <textarea id="description" name="description" required
                                class="bg-transparent border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 resize-none placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                placeholder="Let the world know who you are" maxlength="800" rows="5" required></textarea>
                            <p class="w-full text-right text-xs pt-1 text-gray-600 dark:text-gray-400">Character Limit: 200
                            </p>
                        </div>

                        <div class="container mx-auto bg-gray-100 rounded w-full dark:bg-gray-700 pb-6">
                            <div class="px-8">
                                <div class="flex justify-between items-center mb-4 mt-8">
                                    <div class="w-9/12 pt-4">
                                        <p class="text-sm pt-6 text-gray-800 dark:text-gray-100 font-bold  pb-1">Verkoop
                                        </p>
                                        <p id="cb1" class="text-sm text-gray-600 dark:text-gray-400">Word dit product
                                            gebruikt voor verkoop?</p>
                                    </div>
                                    <div class="cursor-pointer rounded-full mt-4 bg-gray-200 relative shadow-sm">
                                        <!-- Rounded switch -->
                                        <label class="switch">
                                            <input type="checkbox" id="accept" onclick="toggleVerkoop()" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto bg-white dark:bg-gray-800 mt-10 rounded">
                <div class="xl:w-full border-b border-gray-300 dark:border-gray-700 py-5">
                    <div class="flex w-11/12 mx-auto xl:w-full xl:mx-0 items-center">
                        <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Aanvullend Product Informatie</p>
                        <div class="ml-2 cursor-pointer text-gray-600 dark:text-gray-400">
                            <img class="dark:hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg" alt="info">
                            <img class="dark:block hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg" alt="info">
                        </div>
                    </div>
                </div>
                <div class="mx-auto pt-4">
                    <div class="container mx-auto">
                        <div class="my-6 w-11/12 mx-auto xl:w-full xl:mx-0 grid grid-cols-2 gap-4">
                            <div class="xl:w-full lg:w-full md:w-1/2 flex flex-col mb-6">
                                <label for="bricks_amount" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">
                                    Hoeveelheid Steentjes</label>
                                <input type="number" id="bricks_amount" name="bricks_amount" required
                                    class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="1345" min="1" max="6000" />
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="set_number" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">
                                    Lego Set Nummer</label>
                                <input type="number" id="set_number" name="set_number" required
                                    class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="10272" />
                            </div>
                        </div>
                        <div class="my-6 w-11/12 mx-auto xl:w-full xl:mx-0 gap-4">
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="category" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">
                                    Categorie</label>
                                <div class="border border-gray-300 dark:border-gray-700 shadow-sm rounded flex">
                                    <select name="category" id="category"
                                        class="pl-3 py-3 w-full text-sm focus:outline-none border border-transparent focus:border-yellow-500 bg-transparent rounded placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                        required>
                                        <option value="ninjago">Ninjago</option>
                                        <option value="creator_expert">Creator Expert</option>
                                        <option value="architecture">Architecture</option>
                                    </select>
                                </div>
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="price" id="verhuur"
                                    class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Price
                                    Per
                                    Week (in
                                    €)</label>
                                <label for="price" id="verkoop"
                                    class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Price
                                    Per (in
                                    €)</label>
                                <input type="number" id="price" name="price"
                                    class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="€7,50" />
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6" id="verhuurWeeks">
                                <label for="max_weeks" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Max
                                    Weeks</label>
                                <div class="border border-gray-300 dark:border-gray-700 shadow-sm rounded flex">
                                    <select name="max_weeks" id="max_weeks"
                                        class="pl-3 py-3 w-full text-sm focus:outline-none border border-transparent focus:border-yellow-500 bg-transparent rounded placeholder-gray-500 text-gray-600 dark:text-gray-400">
                                        <option value="1">1 Week</option>
                                        <option value="2">2 Weeks</option>
                                        <option value="3">3 Weeks</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="my-6 w-11/12 mx-auto xl:w-full xl:mx-0 grid grid-cols-3 gap-4">
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="length"
                                    class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Lengte
                                    (in cm)</label>
                                <input type="number" id="length" name="length" required
                                    class="border bg-transparent border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="80" />
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="width"
                                    class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Breedte (in
                                    cm)</label>
                                <input type="number" id="width" name="width" required
                                    class="border bg-transparent border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="45" />
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="height"
                                    class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Hoogte
                                    (in cm)</label>
                                <input type="number" id="height" name="height" required
                                    class="border bg-transparent border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="120" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto mt-10 rounded bg-gray-100 dark:bg-gray-700 w-11/12 xl:w-full">
                <div class="xl:w-full py-5 px-8">
                    <div class="flex items-center mx-auto">
                        <div class="container justify-between flex mx-auto">
                            <div class="mx-auto xl:w-full">
                                <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Product Placement</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 pt-1">Geef hier aan of het product op de
                                    voorpagina geplaatst wordt. Zoja, waar wordt het product geplaatst?</p>
                            </div>
                            <div
                                class="border border-gray-300 dark:border-gray-700 w-full shadow-sm rounded bg-gray-300 flex">
                                <select name="spotlight" id="spotlight"
                                    class="pl-3 py-3 w-full text-sm focus:outline-none border border-transparent focus:border-yellow-500 bg-transparent rounded placeholder-gray-700 text-500 dark:text-gray-500"
                                    required>
                                    <option value="niet">Niet op voorpagina</option>
                                    <option value="uitgelicht">Uitgelicht</option>
                                    <option value="nieuw">Nieuw Binnen</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center mt-8 mx-auto">
                        <div class="container justify-between flex mx-auto">
                            <div class="mx-auto xl:w-full">
                                <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Voorraad</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 pt-1">Geef hier aan of het product of
                                    voorraad is of niet.</p>
                            </div>
                            <div
                                class="border border-gray-300 dark:border-gray-700 w-full shadow-sm rounded bg-gray-300 flex">
                                <select name="voorraad" id="voorraad"
                                    class="pl-3 py-3 w-full text-sm focus:outline-none border border-transparent focus:border-yellow-500 bg-transparent rounded placeholder-gray-700 text-500 dark:text-gray-500"
                                    required>
                                    <option value="op_voorraad">Op voorraad</option>
                                    <option value="moet_besteld_worden">Moet besteld worden</option>
                                    <option value="tijdelijk_niet_leverbaar">Tijdelijk niet leverbaar</option>
                                    <option value="niet_meer_leverbaar">Niet meer leverbaar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto w-11/12 xl:w-full">
                <div class="w-full py-4 sm:px-0 bg-white dark:bg-gray-800 flex justify-end">
                    <button role="button" aria-label="cancel form"
                        class="bg-gray-200 focus:outline-none transition duration-150 ease-in-out hover:bg-gray-300 dark:bg-gray-700 rounded text-yellow-500 dark:text-yellow-500 px-6 py-2 text-xs mr-4 focus:ring-2 focus:ring-offset-2 focus:ring-gray-700">Cancel</button>
                    <button role="button" aria-label="Save form"
                        class="focus:ring-2 focus:ring-offset-2 focus:ring-yellow-600 bg-yellow-500 focus:outline-none transition duration-150 ease-in-out hover:bg-yellow-700 rounded text-black px-8 py-2 text-sm"
                        type="submit">Save</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("thumbnail_img");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function toggleVerkoop() {
            var verhuur = document.getElementById("verhuur");
            var verhuurWeeks = document.getElementById("verhuurWeeks");
            var verkoop = document.getElementById("verkoop");

            const checked = document.querySelector('#accept:checked');
            if (checked !== null) {
                verkoop.style.display = "block";
                verhuur.style.display = "none";
                verhuurWeeks.style.display = "none";
            }
            if (checked === null) {
                verkoop.style.display = "none";
                verhuur.style.display = "block"
                verhuurWeeks.style.display = "block";
            }
        }
        window.onload = toggleVerkoop;
    </script>
@endsection
