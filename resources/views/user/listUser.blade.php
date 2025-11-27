@include('template.header', ['title' => 'Inscription'])
<main class="p-1.5 flex justify-center">
    <div class="rounded-2xl w-fit shadow-2xl/50 p-4">
        <h2 class="text-xl">Liste des utilisateurs</h2>
        <ul class="p-2">
            @foreach ($liste as $elem)
            <a href="/public/{{ $elem->id }}">
                <li>{{ $elem->name}}</li>
            </a>
            @endforeach
        </ul>
    </div>
</main>
@include('template.footer')