@extends('Layout')

@section('content')

<div class="mx-4">
    <div
        class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Gig
            </h2>
            <p class="mb-4">Post a gig to find a developer</p>
        </header>

        <form action="/listing" method="post" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="mb-6">
                <label
                    for="company"
                    class="inline-block text-lg mb-2"
                    >Company Name</label
                >
                <input
                value="{{old("company")}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company"
                />
                @error('company')
                <div class=" dark:text-red-400" role="alert">
                    <span class="font-medium">Danger alert!</span> {{$message}}
                  </div>
                @enderror
                
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                    >Job Title</label
                >
                <input value="{{old("title")}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Senior Laravel Developer"
                />
                @error('title')
                <div class=" dark:text-red-400" role="alert">
                    <span class="font-medium">Danger alert!</span> {{$message}}
                  </div>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="location"
                    class="inline-block text-lg mb-2"
                    >Job Location</label
                >
                <input value="{{old("location")}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    placeholder="Example: Remote, Boston MA, etc"
                />
                @error('location')
                <div class=" dark:text-red-400" role="alert">
                    <span class="font-medium">Danger alert!</span> {{$message}}
                  </div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Contact Email</label
                >
                <input value="{{old("email")}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                />
                @error('email')
                <div class=" dark:text-red-400" role="alert">
                    <span class="font-medium">Danger alert!</span> {{$message}}
                  </div>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="website"
                    class="inline-block text-lg mb-2"
                >
                    Website/Application URL
                </label>
                <input value="{{old("website")}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="website"
                />
                @error('website')
                <div class=" dark:text-red-400" role="alert">
                    <span class="font-medium">Danger alert!</span> {{$message}}
                  </div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input value="{{old("tags")}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                />
                @error('tags')
                <div class=" dark:text-red-400" role="alert">
                    <span class="font-medium">Danger alert!</span> {{$message}}
                  </div>
                @enderror
            </div>

           <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />
                @error('logo')
                <div class=" dark:text-red-400" role="alert">
                    <span class="font-medium">Danger alert!</span> {{$message}}
                  </div>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea 
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{"description"}}</textarea>
                @error('description')
                <div class=" dark:text-red-400" role="alert">
                    <span class="font-medium">Danger alert!</span> {{$message}}
                  </div>
                @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Create Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</div>
@endsection