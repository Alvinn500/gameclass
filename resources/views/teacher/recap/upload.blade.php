<x-teacher-layout title="Rekap Nilai">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/{{$class->id}}/{{$lesson->id}}/{{$upload->id}}/upload/create" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <h1 class="my-4 text-sm font-semibold text-neutral-800">REKAP NILAI ESSAY {{$upload->title}}</h1>
        <div class="min-w-full px-4 pt-4 pb-2 mb-4 rounded-xl bg-main shadow-md">
            <table id="example" class="min-w-full text-neutral-800">
                <thead>
                    <tr>
                        <th class="border-b uppercase text-sm">No</th>
                        <th class="border-b uppercase text-sm">PP</th>
                        <th class="border-b uppercase text-sm">Nama</th>
                        <th class="border-b uppercase text-sm">Nilai</th>
                        <th class="border-b uppercase text-sm">Selesai</th>
                        <th class="border-b uppercase text-sm">Reward</th>
                        <th class="border-b uppercase text-sm">Status</th>
                        <th class="border-b uppercase text-sm">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1
                    @endphp
                    @foreach ($users as $user) 
                        @if($user->uploadScores && !$user->uploadScores->where("upload_id", $upload->upload->id)->isEmpty())
                            <tr>
                                <td class="border-b text-base">{{$counter++}}</td>
                                <td class="border-b text-base"><img class="w-8 aspect-square" src="{{asset($user->photo)}}" alt="profile picture"></td>
                                <td class="border-b text-base">{{$user->name}}</td>
                                <td class="border-b text-base">{{$user->uploadScores->where("upload_id", $upload->upload->id)->first()->score}}</td>
                                <td class="border-b text-base">{{$user->uploadScores->where("upload_id", $upload->upload->id)->first()->created_at->setTimezone('Asia/Jakarta')->format('d M Y (H:i T)')}}</td>
                                <td class="border-b text-base">{{$user->uploadScores->where("upload_id", $upload->upload->id)->first()->XP}} XP</td>
                                <td class="{{$user->uploadScores->where("upload_id", $upload->upload->id)->first()->status ? "text-lime-500" : "text-red-500"}} border-b text-sm">{{$user->uploadScores->where("upload_id", $upload->upload->id)->first()->status ? "Sudah dinilai" : "Belum dinilai"}}</td>
                                <td class="border-b text-base"><a class="uppercase text-xs font-semibold bg-indigo-600 text-white py-2 px-6 rounded-md" href="/teacher/recap/{{$user->id}}/{{$upload->id}}/upload/answer">Lihat jawaban</a></td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-teacher-layout>