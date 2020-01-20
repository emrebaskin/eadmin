<table id="{{ $id }}" class="table {{ $class }}" style="width:100%">

    <thead>
    @foreach($columns as $column)
        <th>{{ $column }}</th>
    @endforeach
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
