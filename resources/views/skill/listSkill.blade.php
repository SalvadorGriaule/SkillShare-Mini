@include('template.header', ['title' => 'Inscription'])
<main>
    <div>
        <ul>
            <a href="/skill/create">
                <li>create</li>
            </a>
        </ul>
    </div>
    <ul>
        @foreach ($catg as $elem)
        <li class="flex space-x-2"> <p>{{ $elem->label }}</p> <a href="/skill/edit/{{ $elem->id }}">edit</a> </li>
        @endforeach
    </ul>
</main>
@include('template.footer')
