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
        <div class="dark:bg-gray-800 grid grid-cols-3 gap-4">
            <div class="col-span-2">
                <div class="container mx-auto h-max bg-yellow-400 dark:bg-gray-800 rounded-2xl row-span-3">
                    <div class="xl:w-full dark:border-gray-700 rounded-t-2xl py-3 px-4 bg-yellow-400 dark:bg-gray-800">
                        <div class="flex w-full mx-auto xl:w-full xl:mx-0 items-center">
                            <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Algemene Product Informatie</p>
                            <div class="ml-2 cursor-pointer text-gray-600 dark:text-gray-400">
                                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg"
                                    alt="info">
                                <img class="dark:block hidden"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg" alt="info">
                            </div>
                        </div>
                    </div> 
                    <div class="mx-auto bg-white rounded-2xl shadow-inner shadow-gray-200 px-4 pt-4 pb-6">
                        <div class="w-full mx-auto xl:mx-0">
                            <div class="flex flex-row gap-2">
                                <div class="flex flex-col w-full">
                                    <label for="name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Product
                                        Naam</label>
                                    <input type="text" id="name" name="name" required
                                        class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 bg-transparent placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                        placeholder="Camp Nou" />
                                </div>
                                <div class="flex flex-col w-full">
                                    <label for="name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Slug</label>
                                    <input type="text" id="slug" name="slug" disabled
                                        class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 bg-transparent placeholder-gray-500 text-gray-600 dark:text-gray-400" />
                                </div>
                            </div>
                            <div class="mt-4 flex flex-col w-full">
                                <label for="description"
                                    class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Beschrijving</label>
                                <textarea id="description" name="description" required
                                    class="bg-transparent border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 resize-none placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="Let the world know who you are" maxlength="800" rows="5" required></textarea>
                                <p class="w-full text-right text-xs pt-1 text-gray-600 dark:text-gray-400">Character Limit: 200
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mx-auto h-max bg-yellow-400 dark:bg-gray-800 rounded-2xl row-span-3 my-8">
                    <div class="xl:w-full dark:border-gray-700 rounded-t-2xl py-3 px-4 bg-yellow-400 dark:bg-gray-800">
                        <div class="flex w-11/12 mx-auto xl:w-full xl:mx-0 items-center">
                            <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Afbeeldingen</p>
                            <div class="ml-2 cursor-pointer text-gray-600 dark:text-gray-400">
                                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg"
                                    alt="info">
                                <img class="dark:block hidden"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg" alt="info">
                            </div>
                        </div>
                    </div> 
                    <div class="mx-auto bg-white rounded-2xl shadow-inner shadow-gray-200 px-4 pt-4 pb-6">
                        <div class="w-full mx-auto xl:mx-0">
                            <label for="thumbnail"
                                    class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Thumbnail</label>
                            <input required type="file" name="thumbnail" id="thumbnail" class="mt-2" multiple>
                        </div>
                        <div class="w-full mx-auto xl:mx-0 pt-2">
                            <label for="images"
                                    class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Product foto's</label>
                            <input required type="file" name="images" id="images" class="mt-2" multiple>
                        </div>
                    </div>
                </div>
                

                <div class="container mx-auto h-max bg-yellow-400 dark:bg-gray-800 rounded-2xl row-span-3 my-8">
                    <div class="xl:w-full dark:border-gray-700 rounded-t-2xl py-3 px-4 bg-yellow-400 dark:bg-gray-800">
                        <div class="flex w-11/12 mx-auto xl:w-full xl:mx-0 items-center">
                            <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Aanvullend Product Informatie</p>
                            <div class="ml-2 cursor-pointer text-gray-600 dark:text-gray-400">
                                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg"
                                    alt="info">
                                <img class="dark:block hidden"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg" alt="info">
                            </div>
                        </div>
                    </div> 
                    <div class="mx-auto bg-white rounded-2xl shadow-inner shadow-gray-200 px-4 py-4">
                        <div class="w-full container mx-auto xl:mx-0">
                            <div class="mx-auto w-full grid grid-cols-2 gap-4">
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
                            <div class="w-11/12 mx-auto xl:w-full xl:mx-0 gap-4">
                                <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                    <label for="category" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">
                                        Categorie</label>
                                    <div class="border border-gray-300 dark:border-gray-700 shadow-sm rounded flex">
                                        <select name="category" id="category"
                                            class="pl-3 py-3 w-full text-sm focus:outline-none border border-transparent focus:border-yellow-500 bg-transparent rounded placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                            required>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->categorie_naam }}">
                                                    {{ $categorie->categorie_naam }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class=" w-11/12 mx-auto xl:w-full xl:mx-0 grid grid-cols-3 gap-4">
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
            </div>

            <div class="col-span-1">
                <div class="container mx-auto h-max bg-yellow-400 dark:bg-gray-800 rounded-2xl row-span-3 mb-8">
                    <div class="xl:w-full dark:border-gray-700 rounded-t-2xl py-3 px-4 bg-yellow-400 dark:bg-gray-800">
                        <div class="flex w-11/12 mx-auto xl:w-full xl:mx-0 items-center">
                            <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Voorraadbeheer</p>
                            <div class="ml-2 cursor-pointer text-gray-600 dark:text-gray-400">
                                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg"
                                    alt="info">
                                <img class="dark:block hidden"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg" alt="info">
                            </div>
                        </div>
                    </div> 
                    <div class="mx-auto bg-white rounded-2xl shadow-inner shadow-gray-200 px-4 pb-6 pt-4">
                        <div class="w-full mx-auto xl:mx-0">
                            <div class="flex items-center mx-auto">
                                <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                    <label for="price" id="verkoop"
                                        class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Price
                                        Per (in
                                        €)</label>
                                    <input type="number" id="price" name="price"
                                        class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                        placeholder="€7,50" />
                                </div>
                            </div>
                            <div class="flex items-center mx-auto">
                                <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                    <label for="quantity"
                                        class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Quantity</label>
                                    <input type="number" id="quantity" name="quantity"
                                        class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                        placeholder="8" />
                                </div>
                            </div>
                            <div class="flex items-center mx-auto">
                                <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                    <label for="security_stock"
                                        class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Security Stock</label>
                                    <input type="number" id="security_stock" name="security_stock"
                                        class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                        placeholder="2" />
                                </div>
                            </div>
                            <div class="flex items-center mx-auto">
                                <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col">
                                    <label for="security_stock"
                                        class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Barcode (EAN)</label>
                                    <input type="number" id="barcode" name="barcode"
                                        class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                        placeholder="2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mx-auto h-max shadow-inner bg-yellow-400 dark:bg-gray-800 rounded-2xl row-span-3">
                    <div class="xl:w-full dark:border-gray-700 rounded-t-2xl py-3 px-4 bg-yellow-400 dark:bg-gray-800">
                        <div class="flex w-11/12 mx-auto xl:w-full xl:mx-0 items-center">
                            <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Product Extra's</p>
                            <div class="ml-2 cursor-pointer text-gray-600 dark:text-gray-400">
                                <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg"
                                    alt="info">
                                <img class="dark:block hidden"
                                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4dark.svg" alt="info">
                            </div>
                        </div>
                    </div> 
                    <div class="mx-auto bg-white rounded-2xl shadow-inner shadow-gray-200 px-4 pb-6 pt-4">
                        <div class="w-full mx-auto xl:mx-0">
                            <div class="flex items-center mx-auto">
                                <div class="container justify-between mx-auto">
                                    <div class="mx-auto xl:w-full">
                                        <p class="text-md text-gray-800 dark:text-gray-100 font-bold">Product Placement</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 pt-1">Geef hier aan of het product op de
                                            voorpagina geplaatst wordt. Zoja, waar wordt het product geplaatst?</p>
                                    </div>
                                    <div class="border border-gray-200 dark:border-gray-700 w-full shadow-sm rounded bg-gray-200 mt-4">
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
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="w-full py-4 sm:px-0 dark:bg-gray-800">
                        <button role="button" aria-label="Save form"
                            class="focus:ring-2 focus:ring-offset-2 w-full mb-2 focus:ring-green-600 h-10 bg-green-500 focus:outline-none transition duration-150 ease-in-out hover:bg-green-700 rounded text-white px-8 py-2 text-sm"
                            type="submit">Opslaan</button>
                        <button role="button" aria-label="cancel form"
                            class="bg-red-500 w-full focus:outline-none transition duration-150 ease-in-out h-10 hover:bg-red-700 dark:bg-red-500 rounded text-white dark:text-white px-6 py-2 text-sm mr-4 focus:ring-2 focus:ring-offset-2 focus:ring-red-700">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<script>
    const slugify = (str) => str.toLowerCase()
                            .replace(/[^a-z0-9]+/g, '-')
                            .replace(/(^-|-$)+/g, '');

    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.setOptions({
        server: {
            url: '/products',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }
    })
    const inputThumbnail = document.getElementById('thumbnail');
    const pond1 = FilePond.create(inputThumbnail);

    const inputImages = document.getElementById('images');
    const pond2 = FilePond.create(inputImages);

    const name = document.getElementById('name');
    const slug = document.getElementById("slug");

    name.addEventListener("change", updateValue);

    function updateValue(e) {
        slug.value = slugify(e.target.value);
    }

</script>
@endsection
