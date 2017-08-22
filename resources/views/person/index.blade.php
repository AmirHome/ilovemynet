@extends('layouts.master')

@section('content')

<p>{!! link_to_route('person.create', 'add_new' , null, array('class' => 'btn btn-success')) !!}</p>

@if ($person->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">index-list</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>

                        <th>Name</th>
<th>Birthday</th>
<th>Gender</th>
<th>Address</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($person as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
<td>{{ $row->birthday }}</td>
<td>{{ $row->gender }}</td>
<td>{{ isset($row->address->address) ? $row->address->address : '' }}</td>

                            <td>
                                {!! link_to_route('person.edit', 'edit', array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('are_you_sure');",  'route' => array('person.destroy', $row->id))) !!}
                                {!! Form::submit('delete', array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
	</div>
@else
   no_entries_found
@endif

@endsection