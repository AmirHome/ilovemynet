@extends('layouts.master')

@section('content')

<p>{!! link_to_route('addresses.create', 'Add New' , $personId, array('class' => 'btn btn-success')) !!}</p>

@if ($addresses->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">List of <strong>{{$addresses[0]->persons->name}}</strong></div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>Post Code</th>
<th>City</th>
<th>Country</th>
<th>Person</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($addresses as $row)
                        <tr>
                            <td>{{ $row->post_code }}</td>
<td>{{ $row->city_name }}</td>
<td>{{ $row->country_name }}</td>
<td>{{ isset($row->persons->name) ? $row->persons->name : '' }}</td>

                            <td>
                                {!! link_to_route('addresses.edit', 'Edit', array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('Are you sure?');",  'route' => array('addresses.destroy', $row->id))) !!}
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