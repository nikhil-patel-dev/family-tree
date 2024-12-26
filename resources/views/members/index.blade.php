<!DOCTYPE html>
<html>
<head>
    <title>Family Tree</title>
</head>
<body>
    <h1>Family Members</h1>
    <ul>
        @foreach($members as $member)
            <li>
                {{ $member->name }} - {{ $member->role }}
                @if($member->profile_photo)
                    <img src="{{ asset('storage/' . $member->profile_photo) }}" width="50" />
                @endif
            </li>
        @endforeach
    </ul>
    <a href="{{ route('members.create') }}">Add Member</a>
</body>
</html>
