<x-teacher-layout title="Rekap Nilai">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/{{$class->id}}/{{$lesson->id}}/{{$essay->id}}/essay/create" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <h1 class="my-4 text-sm font-semibold">REKAP NILAI ESSAY {{$essay->title}}</h1>
        <div class="min-w-full p-4 rounded-xl bg-neutral-900">
            <table id="example" class="min-w-full">
                <thead>
                    <tr>
                        <th class="border border-neutral-800 uppercase text-sm">No</th>
                        <th class="border border-neutral-800 uppercase text-sm">PP</th>
                        <th class="border border-neutral-800 uppercase text-sm">Nama</th>
                        <th class="border border-neutral-800 uppercase text-sm">Nilai</th>
                        <th class="border border-neutral-800 uppercase text-sm">Selesai</th>
                        <th class="border border-neutral-800 uppercase text-sm">Reward</th>
                        <th class="border border-neutral-800 uppercase text-sm">Status</th>
                        <th class="border border-neutral-800 uppercase text-sm">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1
                    @endphp
                    @foreach ($users as $user) 
                        @if($user->essayScores && !$user->essayScores->where("task_id", $essay->id)->isEmpty())
                            <tr>
                                <td class="border border-neutral-800 text-base">{{$counter++}}</td>
                                <td class="border border-neutral-800 text-base"><img class="w-8 aspect-square" src="{{asset($user->photo)}}" alt="profile picture"></td>
                                <td class="border border-neutral-800 text-base">{{$user->name}}</td>
                                <td class="border border-neutral-800 text-base">{{$user->essayScores->where("task_id", $essay->id)->first()->score}}</td>
                                <td class="border border-neutral-800 text-base">{{$user->essayScores->where("task_id", $essay->id)->first()->created_at->setTimezone('Asia/Jakarta')->format('d M Y (H:i T)')}}</td>
                                <td class="border border-neutral-800 text-base">{{$user->essayScores->where("task_id", $essay->id)->first()->XP}} XP</td>
                                <td class="{{$user->essayScores->where("task_id", $essay->id)->first()->status ? "text-lime-500" : "text-red-500"}} border border-neutral-800 text-sm">{{$user->essayScores->where("task_id", $essay->id)->first()->status ? "Sudah dinilai" : "Belum dinilai"}}</td>
                                <td class="border border-neutral-800"><a class="uppercase text-xs font-semibold bg-lime-500 py-2 px-6 rounded-md" href="/teacher/recap/{{$user->id}}/{{$essay->id}}/essay/answer">Lihat jawaban</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-teacher-layout>