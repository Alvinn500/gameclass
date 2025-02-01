<x-teacher-layout title="Rekap Nilai">
    <x-breadcrumbs :breadcrumbs="$breadcrumbs"/>
    <x-teacher-sub-nav 
        classPath="/teacher/lesson/{{$lesson->id}}/subject/{{$subject->id}}" 
        activityPath="/teacher/{{$class->id}}/activity" 
        gradePath="/teacher/{{$class->id}}/recap" 
        studentPath="/teacher/{{$class->id}}/list/student" 
        settingPath="/teacher/{{$class->id}}/setting"
    />
    <div>
        <h1 class="my-4 text-sm font-semibold">SISWA YANG TELAH MEMBACA {{$subject->title}}</h1>
        <div class="min-w-full p-4 rounded-xl bg-neutral-900">
            <table id="example" class="min-w-full">
                <thead>
                    <tr>
                        <th class="border border-neutral-800 uppercase text-sm">No</th>
                        <th class="border border-neutral-800 uppercase text-sm">PP</th>
                        <th class="border border-neutral-800 uppercase text-sm">Nama</th>
                        <th class="border border-neutral-800 uppercase text-sm">Selesai</th>
                        <th class="border border-neutral-800 uppercase text-sm">Reward</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subject->subjectReadeds->where('is_readed', true) as $subjectReaded) 
                        <tr>
                            <td class="border border-neutral-800 text-base">{{$loop->iteration}}</td>
                            <td class="border border-neutral-800 text-base"><img class="w-8 aspect-square" src="{{asset($subjectReaded->user->photo)}}" alt="profile picture"></td>
                            <td class="border border-neutral-800 text-base">{{$subjectReaded->user->name}}</td>
                            <td class="border border-neutral-800 text-base">{{$subjectReaded->created_at->setTimezone('Asia/Jakarta')->format('d M Y (H:i T)')}}</td>
                            <td class="border border-neutral-800 text-base">{{$subjectReaded->score}} XP</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-teacher-layout>