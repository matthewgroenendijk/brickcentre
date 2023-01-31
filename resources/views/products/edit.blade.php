@extends('components.master')
@section('title', 'Edit Product')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')
        <div class="bg-white dark:bg-gray-800">
            <div class="container mx-auto bg-white dark:bg-gray-800 rounded">
                <div class="xl:w-full border-b border-gray-300 dark:border-gray-700 py-5 bg-white dark:bg-gray-800">
                    <div class="flex w-11/12 mx-auto xl:w-full xl:mx-0 items-center">
                        <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">General Product Information</p>
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
                                src="{{ asset('storage/images/products/' . $product->image_thumbnail) }}"
                                class="w-full h-full object-cover rounded absolute shadow" />
                            <div class="absolute bg-black opacity-20 top-0 right-0 bottom-0 left-0 rounded"></div>
                        </div>
                        <div class="mt-8 flex flex-col xl:w-2/6 lg:w-1/2 md:w-1/2 w-full">
                            <label for="name" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Product
                                Name</label>
                            <input type="text" id="name" name="name" required
                                class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 bg-transparent placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                placeholder="Camp Nou" value="{{ $product->name }}" />
                        </div>
                        <div class="mt-8 flex flex-col xl:w-3/5 lg:w-1/2 md:w-1/2 w-full">
                            <label for="description"
                                class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Description</label>
                            <textarea id="description" name="description" required
                                class="bg-transparent border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 resize-none placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                placeholder="{{ $product->description }}" maxlength="200" rows="5" required></textarea>
                            <p class="w-full text-right text-xs pt-1 text-gray-600 dark:text-gray-400">Character Limit: 200
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mx-auto bg-white dark:bg-gray-800 mt-10 rounded">
                <div class="xl:w-full border-b border-gray-300 dark:border-gray-700 py-5">
                    <div class="flex w-11/12 mx-auto xl:w-full xl:mx-0 items-center">
                        <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Additional Product Information</p>
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
                                    Bricks Amount</label>
                                <input type="number" id="bricks_amount" name="bricks_amount" required
                                    class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="1345" value="{{ $product->bricks_amount }}" min="1"
                                    max="6000" />
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="set_number" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">
                                    Lego Set Number</label>
                                <input type="number" id="set_number" name="set_number" required
                                    class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="10272" value="{{ $product->set_number }}" />
                            </div>
                        </div>
                        <div class="my-6 w-11/12 mx-auto xl:w-full xl:mx-0 gap-4">
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="category" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">
                                    Categorie</label>
                                <div class="border border-gray-300 dark:border-gray-700 shadow-sm rounded flex">
                                    <select name="category" id="category" value="{{ $product->category }}"
                                        class="pl-3 py-3 w-full text-sm focus:outline-none border border-transparent focus:border-yellow-500 bg-transparent rounded placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                        required>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->categorie_naam }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="price" id="verkoop"
                                    class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Price
                                    Per (in
                                    €)</label>
                                <input type="number" id="price" name="price" value="{{ $product->price }}"
                                    class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="€7,50" />
                            </div>
                        </div>
                        <div class="my-6 w-11/12 mx-auto xl:w-full xl:mx-0 grid grid-cols-3 gap-4">
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="length" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Length
                                    (in cm)</label>
                                <input type="number" id="length" name="length" required
                                    class="border bg-transparent border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="80" value="{{ $product->length }}" />
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="width"
                                    class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Width (in
                                    cm)</label>
                                <input type="number" id="width" name="width" required
                                    class="border bg-transparent border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="45" value="{{ $product->width }}" />
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="height"
                                    class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Height
                                    (in cm)</label>
                                <input type="number" id="height" name="height" required
                                    class="border bg-transparent border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="120" value="{{ $product->height }}" />
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
                                    voorpagina geplaatst wordt.</p>
                            </div>
                            <div
                                class="border border-gray-300 dark:border-gray-700 w-full shadow-sm rounded bg-gray-300 flex">
                                <select name="spotlight" id="spotlight" value="{{ $product->spotlight }}"
                                    class="pl-3 py-3 w-full text-sm focus:outline-none border border-transparent focus:border-yellow-500 bg-transparent rounded placeholder-gray-700 text-500 dark:text-gray-500"
                                    required>
                                    <option value="niet" <?php if ($product->spotlight == null) {
                                        echo 'selected';
                                    } ?>>Niet op voorpagina</option>
                                    <option value="uitgelicht" <?php if ($product->spotlight == 'uitgelicht') {
                                        echo 'selected';
                                    } ?>>Uitgelicht</option>
                                    <option value="nieuw" <?php if ($product->spotlight == 'nieuw') {
                                        echo 'selected';
                                    } ?>>Nieuw Binnen</option>
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
                                    <option value="op_voorraad" <?php if ($product->voorraad == 'op_vooraad') {
                                        echo 'selected';
                                    } ?>>Op voorraad</option>
                                    <option value="moet_besteld_worden" <?php if ($product->voorraad == 'moet_besteld') {
                                        echo 'selected';
                                    } ?>>Moet besteld worden</option>
                                    <option value="tijdelijk_niet_leverbaar" <?php if ($product->voorraad == 'tijdelijk_niet_leverbaar') {
                                        echo 'selected';
                                    } ?>>Tijdelijk niet leverbaar
                                    </option>
                                    <option value="niet_meer_leverbaar" <?php if ($product->voorraad == 'niet_meer_leverbaar') {
                                        echo 'selected';
                                    } ?>>Niet meer leverbaar</option>
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
    </script>
@endsection
