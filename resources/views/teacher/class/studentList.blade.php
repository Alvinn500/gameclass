<x-teacher-layout title="Rekap Nilai">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <h1 class="my-4 text-sm font-semibold">DAFTAR SISWA</h1>
        <div class="min-w-full p-4 rounded-xl bg-neutral-900">
            <table id="example" class="min-w-full">
                <thead>
                    <tr>
                        <th class="border border-neutral-800 uppercase text-sm">No</th>
                        <th class="border border-neutral-800 uppercase text-sm">PP</th>
                        <th class="border border-neutral-800 uppercase text-sm">Nama</th>
                        <th class="border border-neutral-800 uppercase text-sm">Skor</th>
                        <th class="border border-neutral-800 uppercase text-sm">Level</th>
                        <th class="border border-neutral-800 uppercase text-sm">Email</th>
                        <th class="border border-neutral-800 uppercase text-sm">Nomor Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1
                    @endphp
                    @foreach ($users as $user) 
                        @if($user)
                            <tr>
                                {{-- {{dd($user->classScores->sum("score"))}} --}}
                                <td class="border border-neutral-800 text-base">{{$counter++}}</td>
                                <td class="border border-neutral-800 text-base"><img class="w-8 aspect-square" src="{{asset("photo_profile/" . $user->photo)}}" alt="profile picture"></td>
                                <td class="border border-neutral-800 text-base">{{$user->name}}</td>
                                <td class="border border-neutral-800 text-base">
                                    @php
                                        $total = 0;

                                        if($user->uploadScores) {
                                            $total += $user->uploadScores->where("class_id", $class->id)->sum("XP");
                                        }

                                        if($user->essayScores) {
                                            $total += $user->essayScores->where("class_id", $class->id)->sum("XP");
                                        }

                                        if($user->classScores) {
                                            $total += $user->classScores->where("class_id", $class->id)->sum("score");
                                        }
                                    @endphp
                                    {{$total}}
                                    {{-- {{$user->uploadScores->sum("XP") + $user->essayScore->sum("XP") + $user->classScores->sum("score")}} --}}
                                </td>
                                <td class="border border-neutral-800 text-base">
                                    @php
                                        $totalXP = $user->uploadScores->sum("XP") ?? 0 + $user->essayScores->sum("XP") ?? 0 + $user->classScores->sum("score") ?? 0;
                                        $level = 0;
                                        if ($totalXP >= 500 && $totalXP <= 1000) {
                                            $level = 1;
                                        }

                                        if ($totalXP >= 1000 && $totalXP <= 2000) {
                                            $level = 2;
                                        }

                                        if ($totalXP >= 2000 && $totalXP <= 4000) {
                                            $level = 3;
                                        }

                                        if ($totalXP >= 4000 && $totalXP <= 8000) {
                                            $level = 4;
                                        }

                                        if ($totalXP >= 8000) {
                                            $level = 5;
                                        }

                                        // echo $level
                                    @endphp
                                    {{$level}}
                                </td>
                                <td class="border border-neutral-800 text-sm">{{$user->email}}</td>
                                <td class="border border-neutral-800 text-sm">{{$user->phone}}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-teacher-layout>