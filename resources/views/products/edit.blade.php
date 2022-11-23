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
                            <img class="dark:hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg4.svg" alt="info">
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
                            <div class="absolute bg-black opacity-50 top-0 right-0 bottom-0 left-0 rounded"></div>
                            <div class="flex items-center px-3 py-2 rounded absolute right-0 mr-4 mt-4 cursor-pointer">
                                <label for="thumbnail" class="text-xs cursor-pointer text-gray-100">Change Thumbnail
                                    Photo</label>
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
                                    placeholder="1345" value="{{ $product->bricks_amount }}" min="1" max="6000" />
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="set_number" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">
                                    Lego Set Number</label>
                                <input type="number" id="set_number" name="set_number" required
                                    class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="10272" value="{{ $product->set_number }}" />
                            </div>
                        </div>
                        <div class="my-6 w-11/12 mx-auto xl:w-full xl:mx-0 grid grid-cols-3 gap-4">
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="category" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">
                                    Category</label>
                                <div class="border border-gray-300 dark:border-gray-700 shadow-sm rounded flex">
                                    <select name="category" id="category" value="{{ $product->category }}"
                                        class="pl-3 py-3 w-full text-sm focus:outline-none border border-transparent focus:border-yellow-500 bg-transparent rounded placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                        required>
                                        <option value="1">Ninjago</option>
                                        <option value="2">Creator Expert</option>
                                        <option value="3">Architecture</option>
                                    </select>
                                </div>
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="price" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Price Per
                                    Week (in
                                    €)</label>
                                <input type="number" id="price" name="price" required
                                    class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm bg-transparent rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="€7,50" value="{{ $product->price }}" />
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="max_weeks" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Max
                                    Weeks</label>
                                <div class="border border-gray-300 dark:border-gray-700 shadow-sm rounded flex">
                                    <select name="max_weeks" id="max_weeks" value="{{ $product->max_weeks }}"
                                        class="pl-3 py-3 w-full text-sm focus:outline-none border border-transparent focus:border-yellow-500 bg-transparent rounded placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                        required>
                                        <option value="1">1 Week</option>
                                        <option value="2">2 Weeks</option>
                                        <option value="3">3 Weeks</option>
                                    </select>
                                </div>
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
                                <label for="width" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Width (in
                                    cm)</label>
                                <input type="number" id="width" name="width" required
                                    class="border bg-transparent border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="45" value="{{ $product->width }}" />
                            </div>
                            <div class="xl:w-full lg:w-1/2 md:w-1/2 flex flex-col mb-6">
                                <label for="height" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Height
                                    (in cm)</label>
                                <input type="number" id="height" name="height" required
                                    class="border bg-transparent border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-yellow-500 placeholder-gray-500 text-gray-600 dark:text-gray-400"
                                    placeholder="120" value="{{ $product->height }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="container mx-auto mt-10 rounded bg-gray-100 dark:bg-gray-700 w-11/12 xl:w-full">
                <div class="xl:w-full py-5 px-8">
                    <div class="flex items-center mx-auto">
                        <div class="container mx-auto">
                            <div class="mx-auto xl:w-full">
                                <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Alerts</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 pt-1">Get updates of any new activity or
                                    features. Turn on/off your preferences</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto pb-6">
                    <div class="px-8">
                        <div class="flex justify-between items-center mb-8 mt-4">
                            <div class="w-9/12">
                                <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Comments</p>
                                <p id="cb1" class="text-sm text-gray-600 dark:text-gray-400">Get notified when a post or
                                    comment is made</p>
                            </div>
                            <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                <input tabindex="0" aria-labelledby="cb1" type="checkbox" name="email_comments" id="toggle1"
                                    class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                <label
                                    class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mb-8">
                            <div class="w-9/12">
                                <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Job Applications</p>
                                <p id="cb2" class="text-sm text-gray-600 dark:text-gray-400">Get notified when a candidate
                                    applies to a job posting</p>
                            </div>
                            <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                <input aria-labelledby="cb2" tabindex="0" type="checkbox" name="email_job_application"
                                    id="toggle2"
                                    class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                <label
                                    class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mb-8">
                            <div class="w-9/12">
                                <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Product Updates</p>
                                <p id="cb3" class="text-sm text-gray-600 dark:text-gray-400">Get notifitied when there is a
                                    new product feature or upgrades</p>
                            </div>
                            <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                <input aria-labelledby="cb3" tabindex="0" type="checkbox" name="email_update"
                                    id="toggle3"
                                    class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                <label
                                    class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                            </div>
                        </div>
                    </div>
                    <div class="pb-4 border-b border-gray-300 dark:border-gray-700 px-8">
                        <div class="flex items-center text-gray-800 dark:text-gray-100">
                            <img class="dark:hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg8.svg" alt="notification">
                            <img class="dark:hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/simple_form-svg8dark.svg"
                                alt="notification">
                            <p class="text-sm font-bold ml-2 text-gray-800 dark:text-gray-100">Push Notifications</p>
                        </div>
                    </div>
                    <div class="px-8">
                        <div class="flex justify-between items-center mb-8 mt-4">
                            <div class="w-9/12">
                                <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Comments</p>
                                <p id="cb4" class="text-sm text-gray-600 dark:text-gray-400">Get notified when a post or
                                    comment is made</p>
                            </div>
                            <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                <input aria-labelledby="cb4" tabindex="0" type="checkbox" name="notification_comment"
                                    id="toggle4"
                                    class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                <label
                                    class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mb-8">
                            <div class="w-9/12">
                                <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Job Applications</p>
                                <p id="cb5" class="text-sm text-gray-600 dark:text-gray-400">Get notified when a candidate
                                    applies to a job posting</p>
                            </div>
                            <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                <input aria-labelledby="cb5" tabindex="0" type="checkbox" name="notification_application"
                                    id="toggle5"
                                    class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                <label
                                    class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mb-8">
                            <div class="w-9/12">
                                <p class="text-sm text-gray-800 dark:text-gray-100 pb-1">Product Updates</p>
                                <p id="cb6" class="text-sm text-gray-600 dark:text-gray-400">Get notifitied when there is a
                                    new product feature or upgrades</p>
                            </div>
                            <div class="cursor-pointer rounded-full bg-gray-200 relative shadow-sm">
                                <input aria-labelledby="cb6" tabindex="0" type="checkbox" name="notification_updates"
                                    id="toggle6"
                                    class="focus:outline-none checkbox w-6 h-6 rounded-full bg-white dark:bg-gray-400 absolute shadow-sm appearance-none cursor-pointer border border-transparent top-0 bottom-0 m-auto" />
                                <label
                                    class="toggle-label block w-12 h-4 overflow-hidden rounded-full bg-gray-300 dark:bg-gray-800 cursor-pointer"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
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
@endsection
