@include('template.header', ['title' => 'profile'])
<main>
    <div>
        <fieldset class="border-2 border-solid border-black p-2 flex">
            <legend class="text-2xl">{{ $public->name }}</legend>
            
            <div class="flex flex-col justify-center ml-4 space-y-2">
                <p>email: {{ $public['email'] }}</p>
            </div>
        </fieldset>
        <fieldset class="border-2 border-solid border-black p-2 flex">
            <legend class="text-2xl">Compétences</legend>
            <ul>
                @foreach ($public["listSkillOffered"] as $skill)
                <li class="ml-2">
                    - {{ $skill->label }}
                </li>
                @endforeach
            </ul>
        </fieldset>
    </div>
</main>
@include('template.footer')