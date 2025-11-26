@include('template.header', ['title' => 'Inscription'])
<main>
    <ul>
        @foreach ($liste as $elem)
        <a href="/public/{{ $elem->id }}">
            <li>{{ $elem->name}}</li>
        </a>
        @endforeach
    </ul>
</main>
@include('template.footer')