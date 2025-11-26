@include('template.header', ['title' => 'profile'])
<main>
    <form action="" method="POST" class="flex flex-col items-center space-y-2 mb-2">
                @csrf
                <div class="flex items-center justify-center space-y-1.5 flex-col">
                    <select name="skill" id="">
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->label }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" name="" class="bg-orange-500 rounded-lg text-white p-1 w-fit cursor-pointer">
            </form>
</main>
@include('template.footer')