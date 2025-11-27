@include('template.header', ['title' => 'Inscription'])
<main>
    <div class="p-2">
        <ul>
            <a href="/skill/create" >
                <li class="bg-orange-500 rounded-lg text-white p-1 w-fit cursor-pointer">create</li>
            </a>
        </ul>
    </div>
    <ul class="my-1">
        @foreach ($catg as $elem)
        <li class="flex w-1/3 justify-between space-x-2 ml-2 border border-gray-400 p-2 items-center"> <p>{{ $elem->label }}</p> <a class="bg-orange-500 rounded-lg text-white p-1 w-fit cursor-pointer" href="/skill/edit/{{ $elem->id }}">edit</a> </li>
        @endforeach
    </ul>
</main>
@include('template.footer')
