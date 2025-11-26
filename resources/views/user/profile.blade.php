@include('template.header', ['title' => 'profile'])
<main>
    <div>
        <fieldset class="border-2 border-solid border-black p-2 flex">
            <legend class="text-2xl">Vos informations</legend>
            <div>
                <p class="text-center text-xl font-semibold">{{ $info['name'] }}</p>
            </div>
            <div class="flex flex-col justify-center ml-4 space-y-2">
                <p>email: {{ $info['email'] }}</p>
                <a href="/profile/edit">modifier votre profile</a>
            </div>
        </fieldset>
        <fieldset class="border-2 border-solid border-black p-2 flex flex-col">
            <legend class="text-2xl">Vos compétences</legend>
            <a href="/profile/skill">addSkill</a>
            <ul>
                @foreach ($info["listSkillOffered"] as $skill)
                <li class="ml-2">
                    - {{ $skill->label }}
                </li>
                @endforeach
            </ul>
        </fieldset>
    </div>
</main>
@include('template.footer')
