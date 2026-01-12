<div class="table-responsive mt-2">
    <table class="table table-bordered table-striped table-fixed">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Category</th>
                        <th>Designation</th>
                        <th>Hired At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="employee-table-body">
                    @foreach ($data as $hrm)
                        <tr> @php $notificationCount = \App\Models\ReminderNotification::where( 'user_id', $hrm->id, ) ->where('is_read', 0) ->where('entity_type', 'hrm') ->count(); @endphp <td>{{ $hrm->name }}</td>
                            <td>{{ $hrm->fname }}</td>
                            <td>{{ $hrm->category }}</td>
                            <td>{{ $hrm->designation }}</td>
                            <td>{{ $hrm->hired_at }}</td>
                            <td class="d-flex gap-2">
                                <div style="position: relative; display: inline-block;"> <a
                                        href="{{ route('hrms.notifications', $hrm->id) }}" style="color: inherit;"> <i
                                            class="fa fa-bell" style="font-size: 24px; cursor: pointer;"></i>
                                        @if ($notificationCount > 0)
                                            <span
                                                style="position: absolute; top: -8px; right: -8px; background: red; color: white; border-radius: 50%; padding: 3px 7px; font-size: 12px;">
                                                {{ $notificationCount }} </span>
                                            @endif
                                    </a> </div>
                                @if (Auth::user()->role = 'customer' && (Auth::user()->role = 'client'))
                                    <a href="{{ route('sub_hrms', ['id' => $hrm->id]) }}" class="btn btn-secondary"> <i
                                            class="fa-solid fa-user"></i> </a>
                                    @endif <a href="{{ route('viewhrm', ['id' => $hrm->id]) }}"
                                        class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                                    @if (Auth::user()->role !== 'customer' && Auth::user()->role !== 'client')
                                        <a href="{{ route('edithrm', ['id' => $hrm->id]) }}"
                                            class="btn btn-primary btn-sm "><i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        @endif @if (auth()->user()->hasAnyRole('Super Admin'))
                                            @if (auth()->user()->role !== 'client')
                                                <a href="{{ route('delete_hrm', ['id' => $hrm->id]) }}"
                                                    class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash"></i>
                                                </a>
                                            @endif
                                        @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
