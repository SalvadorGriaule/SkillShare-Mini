@include('template.header', ['title' => 'profile'])
<main class="flex justify-center">
    <div class="p-2 rounded-md shadow-2xl my-2 w-full">
        <fieldset class="border-2 border-solid border-black p-2 flex justify-center">
            <legend class="text-2xl">Email</legend>
            <form action="/profile/edit" method="POST" class="flex flex-col items-center space-y-2 mb-2">
                @csrf
                <div class="flex items-center justify-center space-y-1.5 flex-col">
                    <label for="email" class="mr-2">email:</label>
                    <input type="email" name="email" class="border-2 border-gray-500 border-solid p-1 placeholder:text-center" value="{{ $info["email"] }}">
                    <label for="pseudo" class="mr-2">pseudo:</label>
                    <input type="text" name="name" class="border-2 border-gray-500 border-solid p-1 placeholder:text-center" value="{{ $info["name"] }}">
                </div>
                <input type="submit" name="emailChange" class="bg-orange-500 rounded-lg text-white p-1 w-fit cursor-pointer">
            </form>
        </fieldset>
    </div>
</main>
@include('template.footer')