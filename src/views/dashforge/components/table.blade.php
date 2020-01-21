
<table id="{{ $id }}" class="table {{ $class }}" style="width:100%">

    <thead>
    @foreach($columns as $column)
        <th>{{ $column }}</th>
    @endforeach
    @if (count($actionButtons) > 0)
        <th></th>
    @endif
    </thead>

    <tbody>
    @if($ajax === false)
        @foreach($datas as $row)
            <tr>
                @foreach($columns as $field => $column)
                    <td>{{ $row->{$field} }}</td>
                @endforeach

            </tr>
        @endforeach
    @endif
    </tbody>

</table>

@section('customScripts')
    @if($noScript === false)
        <script>
            $('#{{ $id }}').DataTable({
                responsive: true,

                @if($ajax !== false)
                    serverSide: true,
                    searchDelay: 1000,
                    ajax: {
                        "url": "{{ $ajax }}",
                        "type": "GET"
                    },
                    "columns": [
                        @foreach($columns as $field => $column)
                            {  "data": "{{ $field }}" },
                        @endforeach

                        @if($actionButtons)
                            { data: null, mRender: function ( data, type, row ) {
                                var buttons = '';

                                @if (isset($actionButtons['edit']))
                                    buttons += '<a href="{{ route($actionButtons['edit'], ":id") }}" class="btn btn-xs btn-dark ml-2">{{ __('Edit') }}</a>';
                                    buttons = buttons.replace(':id',data.id)
                                @endif

                                @if (isset($actionButtons['delete']))
                                    buttons += '<a href="{{ route($actionButtons['delete'], ":id") }}" class="btn btn-xs btn-danger ml-2">{{ __('Delete') }}</a>';
                                    buttons = buttons.replace(':id',data.id)
                                @endif

                                return buttons;
                            } },
                        @endif
                    ],
                @endif

                language: {
                    searchPlaceholder: '{{ __('Search..') }}',
                    sSearch: '',
                    lengthMenu: '_MENU_ {{ __('records') }}/{{ __('page') }}',
                }
            });
        </script>
    @endif
@endsection
