@can('admin')
    <ul>
        <li><a href="{{ route('admin.users') }}">Users</a></li>
        <li><a href="{{ route('admin.students') }}">Students</a></li>
        <li><a href="{{ route('admin.violations') }}">Violations</a></li>
        {{-- <li><a href="{{ route('admin.roles') }}">Roles</a></li> --}}
    </ul>
@endcan
