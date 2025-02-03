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
        <h1 class="my-4 text-sm font-semibold text-neutral-800">SISWA YANG TELAH MEMBACA {{$subject->title}}</h1>
        <div class="min-w-full px-4 pt-4 pb-2 mb-4 rounded-xl bg-main shadow-md">
            <table id="example" class="min-w-full text-neutral-800">
                <thead>
                    <tr>
                        <th class="border-b uppercase text-sm">No</th>
                        <th class="border-b uppercase text-sm">PP</th>
                        <th class="border-b uppercase text-sm">Nama</th>
                        <th class="border-b uppercase text-sm">Selesai</th>
                        <th class="border-b uppercase text-sm">Reward</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subject->subjectReadeds->where('is_readed', true) as $subjectReaded) 
                        <tr>
                            <td class="border-b text-base">{{$loop->iteration}}</td>
                            <td class="border-b text-base"><img class="w-8 aspect-square" src="{{asset($subjectReaded->user->photo)}}" alt="profile picture"></td>
                            <td class="border-b text-base">{{$subjectReaded->user->name}}</td>
                            <td class="border-b text-base">{{$subjectReaded->created_at->setTimezone('Asia/Jakarta')->format('d M Y (H:i T)')}}</td>
                            <td class="border-b text-base">{{$subjectReaded->score}} XP</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-teacher-layout>