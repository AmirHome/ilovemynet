@extends('layouts.master')

@section('content')

<p>{!! link_to_route('persons.create', 'Add New' , null, array('class' => 'btn btn-success')) !!}</p>

@if ($persons->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">List</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>Name</th>
<th>Birthday</th>
<th>Gender</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($persons as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
<td>{{ $row->birthday }}</td>
<td>{{ $row->gender }}</td>

                            <td>
                                {!! link_to_route('addresses.index', 'Addresses', array($row->id), array('class' => 'btn btn-xs btn-success')) !!}

                                {!! link_to_route('persons.edit', 'Edit', array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure?');",  'route' => array('persons.destroy', $row->id))) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
	</div>
@else
    No entries found.
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('Are you sure?')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@stop