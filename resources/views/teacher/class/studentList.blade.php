<x-teacher-layout title="Rekap Nilai">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/class/{{$class->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <h1 class="my-4 text-sm font-semibold text-neutral-800">DAFTAR SISWA</h1>
        <div class="min-w-full px-4 pt-4 pb-2 mb-4 rounded-xl bg-main shadow-md">
            <table id="example" class="min-w-full text-neutral-800">
                <thead>
                    <tr>
                        <th class="border-b uppercase text-sm">No</th>
                        <th class="border-b uppercase text-sm">PP</th>
                        <th class="border-b uppercase text-sm">Nama</th>
                        <th class="border-b uppercase text-sm">Skor</th>
                        <th class="border-b uppercase text-sm">Level</th>
                        <th class="border-b uppercase text-sm">Email</th>
                        <th class="border-b uppercase text-sm">Nomor Telepon</th>
                        <th class="border-b uppercase text-sm">Opsi</th>
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
                                <td class="border-b text-base">{{$counter++}}</td>
                                <td class="border-b text-base"><img class="w-8 aspect-square" src="{{asset($user->photo)}}" alt="profile picture"></td>
                                <td class="border-b text-base">{{$user->name}}</td>
                                <td class="border-b text-base">
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
                                <td class=" border-b text-neutral-800 text-base">
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
                                <td class=" border-b text-neutral-800 text-sm">{{$user->email}}</td>
                                <td class=" border-b text-neutral-800 text-sm">{{$user->phone}}</td>
                                <td class=" border-b text-sm relative">
                                    <div class="tooltip absolute hidden bg-neutral-200 rounded-xl w-fit -top-14 left-1.5 z-50">
                                        <p class="text-neutral-800 font-semibold text-xs px-4 py-2">Keluarkan Dari Kelas</p>
                                    </div>
                                    <button id="deleteUser">
                                        <img id="item" class="w-8 cursor-pointer" src="{{asset('image/delete-user.png')}}" alt="delete student icon">
                                    </button>
                                    {{-- <a href="/teacher/class/{{$class->id}}/student/{{$user->id}}">
                                        <img class="w-8 mx-auto" src="{{asset('image/user-delete.png')}}" alt="delete student icon">
                                    </a> --}}
                                </td>
                            </tr>
                        @endif
                        <div id="confirm_overlay" class="fixed hidden justify-center items-center z-50 bg-black bg-opacity-45 w-full h-full top-0 left-0">
                            <div id="confirm_modal" class="bg-white rounded-lg p-4 w-96 flex flex-col gap-4">
                                <h2 class="font-semibold text-center text-neutral-800">Keluarkan Siswa</h2>
                                <p class="text-center text-sm text-neutral-500">Apakah anda yakin ingin mengeluarkan siswa dari kelas ini?</p>
                                <div class="flex justify-between gap-2">
                                    <button id="unconfirm" class="bg-indigo-600 py-2.5 px-14 rounded-lg shadow-lg text-xs font-semibold uppercase">Batal</button>
                                    <form action="/teacher/leave/class/{{$class->id}}/{{$user->id}}" method="post">
                                        @csrf
                                        <button id="confirm" class="bg-red-600 py-2.5 px-16 rounded-lg shadow-lg text-xs font-semibold uppercase">Iya</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-teacher-layout>